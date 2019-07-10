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



def CAMPAIGN_HISTORY_C():

	count = 1
	
	CAMPAIGN_payload = []
	COMMENTNUM_payload = []
	
	STEP_1 = sys.argv[1]
	
	#print (STEP_1)
	#remove the brakets from json input
	STEP_2 = STEP_1.replace("[","").replace("]","")

	#print(STEP_2)
	#Split at the [,] and make an array
	FINAL = STEP_2.split(",")
	
	#print(FINAL)
	#use the array to search
	
	for i in FINAL:	 
		temp = reddit.submission(id= i)
		CAMPAIGN_payload.append('Campaign #' +str(count))
		num_comments = temp.num_comments
		COMMENTNUM_payload.append(num_comments)
		count +=1
		
		#print(temp.title)

	#here is where the graph is made
	plt.figure(1,figsize=(16,16))
	CAMPAIGN_count = np.arange(len(CAMPAIGN_payload))
	plt.gcf().subplots_adjust(bottom=0.25)
	plt.style.use('ggplot')
	plt.title('Campaign Comments')
	plt.xlabel('Campaigns')
	plt.ylabel('Number of comments')
	plt.bar(CAMPAIGN_payload, COMMENTNUM_payload)
	
	plt.xticks(CAMPAIGN_count, CAMPAIGN_payload, fontsize=20, fontweight='bold', rotation=-90, multialignment='left')

	
	#plt.show()

	plt.savefig('payload', dpi=None, facecolor='w', edgecolor='b', orientation='portrait', papertype=None, format='png', transparent=False, bbox_inches=None, pad_inches=0.1, frameon=None, metadata=None)
	#upload.py starts as soon as it is imported
	import upload
		
		

CAMPAIGN_HISTORY_C()
