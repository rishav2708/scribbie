from py2neo import neo4j,cypher
import sys
g=neo4j.GraphDatabaseService()
def confirm(user,password):
	s="MATCH (n:People) WHERE n.name= ""'"+user+"'"" AND n.passWord= ""'"+password+"'"" RETURN n.name"
	a=cypher.execute(g,s)
	a=a[0]
	if len(a)==0:
		print 0
	else:
		print 1
if __name__=="__main__":
	confirm(sys.argv[1],sys.argv[2])
