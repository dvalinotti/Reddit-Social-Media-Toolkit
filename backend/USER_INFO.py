import praw
import time
import sys
import json

#this is the code that will retrive a Redditor's USER INFORMATION
#Such as: USERNAME; REDDIT ID; DATE THE ACCOUNT WAS CREATED;E-MAIL VERIFICATION



reddit = praw.Reddit(client_id = 'pPciqPn--wkB9Q' ,
	             client_secret = 'pX5mKEZUUP2QP7w4bux1haeBDuc' ,
	             username = 'nullbreakers-1',
	             password ='DJKehoe',
	             user_agent ='testapp')
<<<<<<< HEAD
print(reddit.user.me())
=======
#print(reddit.user.me())
>>>>>>> develop


def USER_INFO():
#userSearch = raw_input("Who are you looking for?")#askes the user who they are looking for
<<<<<<< HEAD
	print(sys.argv)
	userSearch = sys.argv[1]
=======
	#print(sys.argv)
	userSearch = str(sys.argv[1])
>>>>>>> develop
	try:
		USERNAME = reddit.redditor(name=userSearch).name
		REDDIT_ID = reddit.redditor(name=userSearch).id
		rB_DAY = time.strftime("%Y-%m-%d",time.localtime(reddit.redditor(name=userSearch).created_utc))
		EMAIL = reddit.redditor(name=userSearch).has_verified_email
				

	except :
		USERNAME = 'NULL'
		REDDIT_ID = 'NULL'
		rB_DAY = 'NULL'
		EMAIL = 'NULL'
<<<<<<< HEAD

	print('USERNAME: ' + USERNAME)
	print('REDDIT_ID: ' + REDDIT_ID)
	print('rB_DAY: ' + rB_DAY)
	print('EMAIL: ' + str(EMAIL))

	payload = [USERNAME, REDDIT_ID, rB_DAY, str(EMAIL)]
	
	print(payload)
	print(json.dumps(payload))
	return json.dumps(payload)
=======
	
	#Commented out to make it easier for the front end
	print(USERNAME)
	print(REDDIT_ID)
	print(rB_DAY)
	print(str(EMAIL))

	#payload = [USERNAME, REDDIT_ID, rB_DAY, str(EMAIL)]
	
	#print(payload)
	#print(json.dumps(payload))
	#return json.dumps(payload)
>>>>>>> develop
	#return USERNAME
	#return REDDIT_ID
	#return rB_DAY
	#return EMAIL
USER_INFO()
