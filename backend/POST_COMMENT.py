import praw
import sys
import json

#this code will make a comment on a post

reddit = praw.Reddit(client_id = 'pPciqPn--wkB9Q' ,
                     client_secret = 'pX5mKEZUUP2QP7w4bux1haeBDuc' ,
                     username = 'nullbreakers-1',
                     password ='DJKehoe',
                     user_agent ='testapp')

print(reddit.user.me())

def POST_COMMENT():

	POST_ID = str(sys.argv[1])	
	COMMENT_BODY = sys.argv[2]
	
	
	
	#POST = reddit.submission(id=IDSearch)#makes Post a submission object. can now use submission comands/functions on POST

	comment = reddit.submission(POST_ID)
	comment.save(category="view later")
	comment.reply(str(COMMENT_BODY))
	#print('You said :: ' + str(COMMENT_BODY))
	#print('On ' + reddit.submission(id=POST_ID).title.encode('utf-8').strip())
	print('www.reddit.com'+comment.permalink)

POST_COMMENT()
