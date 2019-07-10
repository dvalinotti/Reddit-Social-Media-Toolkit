#!usr/bin/env python
import pika

connection = pika.BlockingConnection(pika.ConnectionParameters('localhost'))
channel = connection.channel()

channel.queue_declare(queue='testqueue')

channel.basic_publish(exchange='testexchange', routing_key='login', body='Test')

print('success')

connection.close()