from py2neo import neo4j,cypher
import sys
import json
import simplejson as js
g=neo4j.GraphDatabaseService()
def func(user):
	#fp=open("details.json",'w')
	s="MATCH (n:People) WHERE n.name=""'"+user+"'"" RETURN n"
	a=cypher.execute(g,s)[0]
	d={}
	for i in a[0][0]:
		d[i]=a[0][0][i]
	for i in d.keys():
		if i=='day' or i=='year' or i=='month' or i=='passWord' or i=='cpassWord' or i=="photo":
			continue
		else:
			print i+"=>"+d[i]
	print "Birthday: "+d['day']+" "+d['month']+" "+d['year']
if __name__=="__main__":
	func(sys.argv[1])
