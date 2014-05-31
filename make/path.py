from py2neo import neo4j,cypher
import sys
def update_info(user,path):
	g=neo4j.GraphDatabaseService()
	s="MATCH n WHERE n.name= ""'"+user+"'"" SET n.photo= ""'"+path+"'"
	cypher.execute(g,s)
if __name__=="__main__":
	update_info(sys.argv[1],sys.argv[2])
