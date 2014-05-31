from py2neo import neo4j,cypher
import sys
import check_rate
def func(tag,user,rate):
	g=neo4j.GraphDatabaseService()
	a=check_rate.func(tag)
	if user in a:
		print "Already Rated"
		exit()
	s="MATCH (n),(b:People) WHERE n.tag= ""'"+tag+"'"" AND b.name= ""'"+user+"'"" CREATE (b)-[:RATES {rate:"+str(rate)+"}]->(n)"
	if(cypher.execute(g,s)):
		a=check_rate.func(tag)
		print str(len(a))
	else:
		print "No"
if __name__=="__main__":
	func(sys.argv[1],sys.argv[2],sys.argv[3])
