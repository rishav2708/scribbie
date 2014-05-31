import sys
import re
import simplejson as js
import json
def func(d):
	a=js.loads(d)
	d={}
	for i in a:
		d[i['tag']]=[]
	for i in d.keys():
		for j in a:
			if j['tag']==i:
				d[i].append(j['token'])
	l=['NN','NN\n','NNP','NNP\n','NNS','NNS\n']
	m=['NNS\n','NNS']
	k=[]
	t=[]
	for i in l:
		if i in d.keys():
			for j in d[i]:
				k.append(j)
	for i in m:
		if i in d.keys():
			for j in d[i]:
				t.append(j)
	
	return k,t
def string_intersect(str1,str2):
	str1=str1.split(' ')
	str2=str2.split(' ')
	m=[i for i in str2 if i not in str1]
	str1=" ".join(str1)+" and "+" ".join(m)
	return str1

def suggestions(k,m): 
	options=[]
	for i in range(len(k)):
		k[i]=k[i].lower()
	fp=open('a.json','r')
	l=fp.read()
	s=js.loads(l)
	for i in s:
		if i in k:
			options.append(i)
	stri=["Places in X","Places near X","famous Places in X","Places in X with rating more than 5","Places in X with no wrong records","Places in X visited by my friends"]
	temp=[]
	for i in range(2,len(stri)-1):
		for j in range(i+1,len(stri)):
			l=string_intersect(stri[i],stri[j])
			temp.append(l)
	stri=stri+temp
	del temp
	sugg=[]
	if len(m)==1:
		t=m[0]
		for i in options:
			for j in stri:
				l=j.replace('X',i)
				l=l.replace('Places',t)
				sugg.append(l)
	else:
		mstri=['Places in X and having Y nearby','X having Places and Y within 10 kms']
		for i in options:
			for j in mstri:
				l=j.replace('X',i)
				l=l.replace('Places',m[0])
				l=l.replace('Y',m[1])
				sugg.append(l)
	if len(sugg)==0:
		for i in options:
			for j in stri:
				l=j.replace('X',i)
				print "<li class='list1'>"+l+"</li>"
	for i in sugg:
		print "<li class='list1' value=""'"+i+"'"">"+i+"</li>"
if __name__=="__main__":
	k,m=func(sys.argv[1])
	suggestions(k,m)
	#print k
	#dictofdicts(k)
