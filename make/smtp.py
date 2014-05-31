import sys
import os
from email.mime.text import MIMEText
from email.mime.image import MIMEImage
from email.mime.multipart import MIMEMultipart
import smtplib
msg = MIMEMultipart()
image=open('/var/www/captcha.png','rb').read()
From = 'scribbie.1993@gmail.com'
To  = sys.argv[1]
msg['Subject']='verification'
img=MIMEImage(image, name=os.path.basename('/var/www/captcha.png'))
msg.attach(img)
username = 'scribbie.1993@gmail.com'
password = 'scribbie@123'
server = smtplib.SMTP('smtp.gmail.com:587')
server.ehlo()
server.starttls()
server.login(username,password)
server.sendmail(From, To,  msg.as_string())
server.quit()
