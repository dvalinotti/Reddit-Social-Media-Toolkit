#!/usr/bin/php
<?php

function lineStart($file) {
    $position = ftell($file);
    while (fgetc($file) != "\n") {
        fseek($file, --$position);
        if ($position == 0) break;
    }
    return $position;
}

function new_campaign_entry($subreddit, $subject, $content, $hour, $user)
{
    if ($hour >= 1) {
        $date = date('Y-m-d\TH:i:sP', time());
        $entry = array ($subreddit, $subject, $content, $hour, $date, $user);

        $file = fopen('autopost.csv', 'a');
        fputcsv($file, $entry);
        
    }
    else {
        echo "Hours cannot be 0: will not auto post.";
    }
}
$file = fopen('autopost.csv', 'r');
while (($line = fgetcsv($file)) !== false) {
    print_r($line);

    $date = date('Y-m-d\TH:i:sP', time());
    $date = date_create($date);
    $date2 = date_create($line[4]);
    echo gettype($date2);
    $diff = $date->diff($date2);

    $hours = $diff->h;

    if($hours >= $line[3]) {
        echo exec("python SUBREDDIT_POST.py '".$line[0]."' '".$line[1]."' '".$line[2]."' '".$line[5], $output, $result);
        lineStart($file);
        new_campaign_entry($line[0],$line[1],$line[2],$line[3],$line[5]);
        ftruncate($file, lineStart($file));
    }

}
fclose($file);
?>
