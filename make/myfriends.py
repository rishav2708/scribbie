from py2neo import neo4j,cypher
import os
import json
import sys
def func(user):
	s="MATCH (n)-[:KNOWS]-(b) WHERE n.name=""'"+user+"'"" RETURN b.photo,b.name;"
	g=neo4j.GraphDatabaseService()
	a=cypher.execute(g,s)
	a=a[0]
	myfile=open("data.json","w")
	json.dump(a,myfile)
	myfile.close()
if __name__=="__main__":
	func(sys.argv[1])
	
