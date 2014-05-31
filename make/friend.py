import sys
from py2neo import neo4j,cypher
g=neo4j.GraphDatabaseService()
def createRels(user,person):
	a="MATCH (n)-[r:KNOWS]-(b)WHERE n.name=""'"+user+"'"" AND b.name=""'" +person+"'""RETURN r"
	a=cypher.execute(g,a)
	a=a[0]
	if len(a)==0:
		b="MATCH (n),(b) WHERE n.name=""'"+user+"'"" AND b.name=""'"+person+"'"" CREATE (n)-[r:KNOWS {bond:0}]->(b)"
		cypher.execute(g,b)
		print "Creation Successfully Done"
	else:
		print "Already They know each other"

if __name__=="__main__":
	createRels(sys.argv[1],sys.argv[2])
