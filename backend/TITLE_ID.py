import praw
import sys
import json

reddit = praw.Reddit(client_id = 'pPciqPn--wkB9Q' ,
                     client_secret = 'pX5mKEZUUP2QP7w4bux1haeBDuc' ,
                     username = 'nullbreakers-1',
                     password ='DJKehoe',
                     user_agent ='testapp')



def KEY_THREADS():


	
	count = 0
	#sys.argv[2] is the topic
	seachquest = str(sys.argv[1])

	

	for submission in reddit.subreddit('all').search(seachquest,limit=15):
		try: 
			print('Post ID: {}  Title: {}'.format(submission.id,submission.title.encode('utf-8').strip()))
		except :
			continue
		count+= 1
		
			
		
KEY_THREADS()
