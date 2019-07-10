import praw
import sys
import json
import matplotlib.pyplot as plt
import numpy as np

reddit = praw.Reddit(client_id = 'pPciqPn--wkB9Q' ,
                     client_secret = 'pX5mKEZUUP2QP7w4bux1haeBDuc' ,
                     username = 'nullbreakers-1',
                     password ='DJKehoe',
                     user_agent ='testapp')



def REDDIT_TITLE_GRAB():


	COMMENT_TALLY = {}
	NAME_payload = []
	TALLY_payload = []
	mark = 0

	#plt.figure(1,figsize=(9,3))
	plt.figure(1)

	#seachquest = raw_input("what are you looking for?")#askes the user for a topic
	seachquest = str(sys.argv[2])

	#[limit] is the amount of reasults it will return
	for submission in reddit.subreddit('all').search(seachquest,limit=20):
		try: 
			#starts to tally the comments that people make
			#print(submission.title.encode('utf-8').strip())
			TITLE_ID = submission.id
			POST = reddit.submission(id=TITLE_ID)

			POST.comment_limit = 0
			POST.comments.replace_more(limit=0)

			#Goes though a title to see how many times someone posted
			for comment in POST.comments.list():
				if comment.author in COMMENT_TALLY:
					COMMENT_TALLY[comment.author] += 1
				else:
					COMMENT_TALLY[comment.author] = 1
		except :
			continue
		
	#COMMENT_TALLY.pop("None")			
	for user in sorted(COMMENT_TALLY, key=COMMENT_TALLY.get, reverse=True):
		if str(user) == 'None': continue
		else:
			mark+=1
			NAME_payload.append(str(user))
			TALLY_payload.append(COMMENT_TALLY[user])
			print(str(user) +';'+ str(COMMENT_TALLY[user]))
		if mark == int(sys.argv[1]): break

	plt.figure(1,figsize=(16,16))
	NAME_count = np.arange(len(NAME_payload))
	plt.gcf().subplots_adjust(bottom=0.45)
	plt.style.use('ggplot')
	plt.title(seachquest)
	plt.xlabel('Redditors')
	plt.ylabel('Number of comments')
	plt.bar(NAME_payload, TALLY_payload)
	
	plt.xticks(NAME_count, NAME_payload, fontsize=10, fontweight='bold', rotation=-90, multialignment='left')

	
	#plt.show()

	plt.savefig('payload', dpi=None, facecolor='w', edgecolor='b', orientation='portrait', papertype=None, format='png', transparent=False, bbox_inches=None, pad_inches=0.1, frameon=None, metadata=None)
	#upload.py starts as soon as it is imported
	import upload
	#upload.upload_img()
	
REDDIT_TITLE_GRAB()
