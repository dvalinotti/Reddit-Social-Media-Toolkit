from imgurpython import	ImgurClient

import sys
import os

client_id = '9f10c5830b5b088'
secret_id = '8ebcf33726559c8a7103ea59547acbf345ba3e23'

def upload_img(img) :
	client = ImgurClient(client_id, secret_id)

	#print('Uploading file {}'.format(img))

	response = client.upload_from_path(img)

	return response['link']

print(upload_img('payload'))
