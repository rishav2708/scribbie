import sys
from py2neo import neo4j,cypher
g=neo4j.GraphDatabaseService()
def view(user): #members other than the user itself are visible
	t="MATCH (b)-[:KNOWS]-(n) WHERE n.name= ""'"+user+"'"" RETURN b.name"
	s="MATCH n RETURN n.name "
	a=[str(i[0]) for i in cypher.execute(g,t)[0]]
	b=[str(i[0]) for i in cypher.execute(g,s)[0]]
	c=(set(b)-set(a))
	for i in c:
		if i==user:
			continue
		else:
			print i
if __name__=="__main__":
	view(sys.argv[1])
	
