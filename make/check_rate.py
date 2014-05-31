from py2neo import neo4j,cypher
import sys
def func(tag):
	g=neo4j.GraphDatabaseService()
	s=" MATCH (s)<-[:RATES]-(b) WHERE s.tag= ""'"+tag+"'"" RETURN b.name"
	a=cypher.execute(g,s)[0]
	a=[str(i[0]) for i in a]
	return a
if __name__=="__main__":
	print len(func(sys.argv[1]))
