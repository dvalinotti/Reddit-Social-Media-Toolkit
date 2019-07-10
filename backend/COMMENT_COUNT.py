import praw
import sys
import json
<<<<<<< HEAD
=======

#this code will count how many times everyone comments on a post and then list the top commentors 
>>>>>>> develop

reddit = praw.Reddit(client_id = 'pPciqPn--wkB9Q' ,
                     client_secret = 'pX5mKEZUUP2QP7w4bux1haeBDuc' ,
                     username = 'nullbreakers-1',
                     password ='DJKehoe',
                     user_agent ='testapp')

print(reddit.user.me())


def COMMENT_COUNT():
<<<<<<< HEAD

	COMMENT_TALLY = {}
	payload = []
	count=0

	IDSearch = sys.argv[1]

	#IDSearch = raw_input("What is the id for the post you are looking for?")#askes the user for the post id

	POST = reddit.submission(id=IDSearch)#makes Post a submission object. can now use submission comands/functions on POST

	# print(POST.title.encode('utf-8').strip())

	POST.comment_limit = 0
	POST.comments.replace_more(limit=0)

	#Goes though a title to see how many times someone posted
	for comment in POST.comments.list():
		if comment.author in COMMENT_TALLY:
			COMMENT_TALLY[comment.author] += 1
		else:
			COMMENT_TALLY[comment.author] = 1


	for user in sorted(COMMENT_TALLY, key=COMMENT_TALLY.get, reverse=True):
		count+=1
		payload.append(str(user) +';'+ str(COMMENT_TALLY[user]))
		if count == 5: break

	print(payload)
	print(json.dumps(payload))
	return json.dumps(payload)

	#print(sorted(COMMENT_TALLY.values()))
	#print(COMMENT_TALLY)

=======

	COMMENT_TALLY = {}
	payload = []
	count=0

	IDSearch = str(sys.argv[1])

	#IDSearch = raw_input("What is the id for the post you are looking for?")#askes the user for the post id

	POST = reddit.submission(id=IDSearch)#makes Post a submission object. can now use submission comands/functions on POST

	# print(POST.title.encode('utf-8').strip())

	POST.comment_limit = 0
	POST.comments.replace_more(limit=0)

	#Goes though a title to see how many times someone posted
	for comment in POST.comments.list():
		if comment.author in COMMENT_TALLY:
			COMMENT_TALLY[comment.author] += 1
		else:
			COMMENT_TALLY[comment.author] = 1


	for user in sorted(COMMENT_TALLY, key=COMMENT_TALLY.get, reverse=True):
		count+=1
		payload.append(str(user) +';'+ str(COMMENT_TALLY[user]))
		if count == 5: break

	print(payload)
	print(json.dumps(payload))
	return json.dumps(payload)

	#print(sorted(COMMENT_TALLY.values()))
	#print(COMMENT_TALLY)

>>>>>>> develop
COMMENT_COUNT()
