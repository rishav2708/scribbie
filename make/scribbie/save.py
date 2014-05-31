from py2neo import neo4j,cypher
import json
import sys
def set(user,friend,data):
	g=neo4j.GraphDatabaseService()
	s="CREATE (n:Scribbie {data:""'"+data+"'""})"
	cypher.execute(g,s)
	s="MATCH (n:People),(b:Scribbie) WHERE b.data=""'"+data+"'"" AND n.name=""'"+user+"'"" CREATE (n)-[s:SCRIBBLES {name:""'"+friend+"'""}]->(b)"
	cypher.execute(g,s)
if __name__=="__main__":
	set(sys.argv[1],sys.argv[2],sys.argv[3])
