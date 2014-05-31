from py2neo import neo4j,cypher
import sys
from genId import genId
def update_info(user,path):
	tag=genId()
	id1=genId()
	id2=genId()
	id3=genId()	
	g=neo4j.GraphDatabaseService()
	s="CREATE (p:Photo {path:""'"+path+"'"",tag:""'"+tag+"'"",id1:""'"+id1+"'"",id2:""'"+id2+"'"",id3:""'"+id3+"'""})"
	cypher.execute(g,s)
	t="MATCH (n),(p) WHERE n.name= ""'"+user+"'"" AND p.path= ""'"+path+"'"" CREATE (n)-[:UPLOADS]->(p)"
	cypher.execute(g,t)
if __name__=="__main__":
	update_info(sys.argv[1],sys.argv[2])
