from py2neo import neo4j,cypher
import sys
from genId import genId
def upload_status(status,user):
	if status=="":
		exit()
	t=genId()
	l=genId()
	k=genId()
	f=genId()
	g=neo4j.GraphDatabaseService()
	s="CREATE (n:Status {status:""'"+status+"'""})"
	d="MATCH (n:People),(b:Status) WHERE n.name= ""'"+user+"'"" AND b.status= ""'"+status+"'"" CREATE (n)-[:WRITES]->(b)"
	e="MATCH (n:Status) WHERE n.status= ""'"+status+"'"" SET n.tag= ""'"+f+"'"",n.id1=""'"+t+"'"",n.id2=""'"+l+"'"",n.id3=""'"+k+"'"
	cypher.execute(g,s)
	cypher.execute(g,d)
	cypher.execute(g,e)
if __name__=="__main__":
	upload_status(sys.argv[1],sys.argv[2])
