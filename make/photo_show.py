from py2neo import neo4j,cypher
import sys
import json
g=neo4j.GraphDatabaseService()
def show(tag):
	fp=open('photo.json','w')
	s="MATCH (n:Photo)<-[:UPLOADS]-(p) WHERE n.tag=""'"+tag+"'"" RETURN n.path,p.name,p.photo"
	a=cypher.execute(g,s)[0]
	json.dump(a[0],fp)
if __name__=="__main__":
	show(sys.argv[1])
	
