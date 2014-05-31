from py2neo import neo4j,cypher
import sys
from genId import genId
import json
def update_status(user):
	fp=open("status.json","w+")
	g=neo4j.GraphDatabaseService()
	e="MATCH (n:People)-[:KNOWS]-(b)-[:WRITES]->(s) WHERE n.name= ""'"+user+"'"" RETURN b.name,s.status,s.tag,s.id1,s.id2,s.id3"
	f="MATCH (n:People)-[:WRITES]->(s) WHERE n.name= ""'"+user+"'"" RETURN n.name,s.status,s.tag,s.id1,s.id2,s.id3"
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
