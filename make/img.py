import sys
import Image
import ImageDraw
import ImageFont
from random import randint
print sys.argv[0]
a="ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789"
b=""
for i in range(0,6):
	b=b+list(a)[randint(0,len(a)-1)]
im=Image.new('RGB',(100,50),(255,255,255))
f=ImageFont.truetype("/usr/share/fonts/truetype/nanum/NanumMyeongjoBold.ttf",10)
d=ImageDraw.Draw(im)
d.text((25,10),b,(0,0,0),f)
d.line((12,17,23,34),(0,240,0))
del d
for i in range(0,350):
	c=(randint(0,im.size[0]-10),randint(0,im.size[1]-10))
	im.putpixel(c,(0,240,0))
im.save('captcha.png')
print b
	


