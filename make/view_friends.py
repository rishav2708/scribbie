from py2neo import neo4j,cypher
import sys
import re
g=neo4j.GraphDatabaseService()
def goodfriends(user):
	s="MATCH (n)-[r:KNOWS]-(b) WHERE n.name= ""'"+user+"'"" RETURN b.name ORDER BY (r.bond)"
	a=cypher.execute(g,s)[0]
	for i in a[::-1]:
		print i[0]
if __name__=="__main__":
	l=re.findall('friends|friend|Friend|Friends|Buddy|Dost|Dosti|dost|dosti',sys.argv[1])
	
	if len(l)!=0:
		goodfriends(sys.argv[2])
