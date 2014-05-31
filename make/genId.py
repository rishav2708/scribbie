import random
def genId():
	#print status
	a=list("abcdefghijklmnopqrstuvwxyz")
	a=map(str,a)
	l=[]
	for i in range(10):
		l.append(a[random.randint(0,len(a)-1)])
	l="".join(l)
	return l
if __name__=="__main__":
	print genId()
