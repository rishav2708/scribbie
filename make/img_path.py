from py2neo import neo4j,cypher
import sys
def func(user):
	s="MATCH n WHERE n.name= ""'"+user+"'"" RETURN n.photo"
	g=neo4j.GraphDatabaseService()
	a=cypher.execute(g,s)
	a=a[0]
	a=str(a[0][0])
	print "/"+a
if __name__=="__main__":
	func(sys.argv[1])
