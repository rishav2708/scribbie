from py2neo import neo4j,cypher 
import sys
import json
def func(tag):
	g=neo4j.GraphDatabaseService()
	s=" MATCH (s)<-[r:RATES]-(b) WHERE s.tag= ""'"+tag+"'"" RETURN b.name,b.photo,r.rate"
	a=cypher.execute(g,s)[0]
	return a
if __name__=="__main__":
	fp=open('/var/www/likers.json','w')
	json.dump(func(sys.argv[1]),fp)

