import sys
import simplejson as js
from py2neo import neo4j,cypher
g=neo4j.GraphDatabaseService()
def createNode(info):
	#print info
	info1=js.loads(info)
	l=info1.keys()
	a="MATCH (n) WHERE n.name= ""'"+info1[l[0]]+"'"" RETURN n"
	a=cypher.execute(g,a)
	a=a[0]
	if len(a)!=0:
		print "Already A member"
	else:
		b="CREATE (n:People {name:""'"+info1[l[0]]+"'""})"
		cypher.execute(g,b)
		for i in range(1,len(l)):
			b="MATCH n WHERE n.name= ""'"+info1[l[0]]+"'"" SET n."+l[i]+"= ""'"+info1[l[i]]+"'"
			cypher.execute(g,b)
		print "Successfully Done"
if __name__=="__main__":
	createNode(sys.argv[1])
