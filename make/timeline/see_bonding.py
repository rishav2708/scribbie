from py2neo import neo4j,cypher
from sys import argv
g=neo4j.GraphDatabaseService()
def friends(user):
	s="MATCH (n)-[k:KNOWS]-(b) WHERE n.name=""'"+user+"'"" RETURN b.name,k.heavy"
	a=cypher.execute(g,s)[0]
	for i in a:
		print i[0]+" bonds as:- "+i[1]
		
if __name__=="__main__":
	friends(argv[1])
