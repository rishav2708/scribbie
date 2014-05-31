from py2neo import neo4j,cypher
import sys
from genId import genId
import json
def update_status(user):
	fp=open("photo.json","w+")
	g=neo4j.GraphDatabaseService()
	e="MATCH (n:People)-[:KNOWS]-(b)-[:UPLOADS]->(s) WHERE n.name= ""'"+user+"'"" RETURN b.name,s.path,s.tag,s.id1,s.id2,s.id3"
	f="MATCH (n:People)-[:UPLOADS]->(s) WHERE n.name= ""'"+user+"'"" RETURN n.name,s.path,s.tag,s.id1,s.id2,s.id3"
	b=cypher.execute(g,f)[0]
	a=cypher.execute(g,e)[0]
	for i in b:
		a.append(i)
	del b
	json.dump(a,fp)
	fp.close()
	for i in a:
		print i
if __name__=="__main__":
	update_status(sys.argv[1])
