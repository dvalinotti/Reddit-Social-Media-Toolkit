#!/usr/bin/python
import smtplib
import praw
import sys
import json
import re


#Gmail info
glogin  = 'nullbreaker08@gmail.com'#login gmail
gpass = 'password862' #login password


#reddit info
reddit = praw.Reddit(client_id = 'pPciqPn--wkB9Q' ,
                     client_secret = 'pX5mKEZUUP2QP7w4bux1haeBDuc' ,
                     username = 'nullbreakers-1',
                     password ='DJKehoe',
                     user_agent ='testapp')




def CAMPAIGN_UPDATE():


	sent_from = 'nullbreaker08@gmail.com'   #where it is being sent from
	to = []  #array of emails


	subject = 'Campaign  Update.'  #subject
	body = "Hello " + str(sys.argv[3]) + " here is an update on your campaign(s):\n\n"#body



	#CAMPAIGN_ID = []
	
	STEP_1 = sys.argv[1]
	
	#print (STEP_1)
	#remove the brakets from json input
	STEP_2 = STEP_1.replace("[","").replace("]","")

	#print(STEP_2)
	#Split at the [,] and make an array
	FINAL = STEP_2.split(",")
	
	#print(FINAL)
	#use the array to search
	
	#where the emails from the DB get put into a local array
	for i in FINAL:	 
		to.append(i)

	
	STEP_3 = sys.argv[2]
	
	#print (STEP_1)
	#remove the brakets from json input
	STEP_4 = STEP_3.replace("[","").replace("]","")

	#print(STEP_2)
	#Split at the [,] and make an array
	FINAL2 = STEP_4.split(",")
	
	#print(FINAL)
	#use the array to search
	
	#where the campaigns from the DB get put into a local array
	count = 0
	
	for i in FINAL2:	 
		#CAMPAIGN_ID.append(i)

		#this fixs the ID
		#print(i.replace('"',""))

		
		POST = reddit.submission(id=i.replace('"',""))
		
		TITLE = str(POST.title)
		
		COMMENTS = str(POST.num_comments)

		KARMA = str(POST.score)

		SUBREDDIT_NAME = str(POST.subreddit.display_name)

		body += "Your post " + TITLE + " on " + SUBREDDIT_NAME + " has " + COMMENTS + " comments and has a karma score of " + KARMA +"."+"\n"+("-"*30)+"\n"
		count +=1
		if count==5: break

	
	message = 'Subject: {}\n\n{}'.format(subject,body) #formating

	#this the end when it sends the email
	server = smtplib.SMTP_SSL('smtp.gmail.com', 465) #setting up server
	server.ehlo()
	server.login(glogin,gpass) #login in
	server.sendmail(sent_from, to, message) #sending mail
	server.close() #close connection

	print ('Email Sent!')

CAMPAIGN_UPDATE()
