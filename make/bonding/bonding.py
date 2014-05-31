from py2neo import neo4j,cypher
import numpy as np
import networkx as nx
def getUsers():
	g=neo4j.GraphDatabaseService()
	s="MATCH (n)-[k:KNOWS]-(b) SET k.bond=0"
	cypher.execute(g,s)
	s="MATCH (s) RETURN s.tag"
	a=cypher.execute(g,s)[0]
	a=[str(i[0]) for i in a]
	return a

def updateBond(b):
	g=neo4j.GraphDatabaseService()
	b[1]=b[1]+b[3]
	s="MATCH (n)-[k:KNOWS]-(b) WHERE n.name= ""'"+b[0]+"'"" AND b.name= ""'"+b[2]+"'"" SET k.bond= "+str(b[1])
	cypher.execute(g,s)
	print b

def create(a):
	g=neo4j.GraphDatabaseService()
	for i in a:
		s="MATCH (s)<-[w:WRITES|UPLOADS]-(n)-[k:KNOWS]-(b)-[r:RATES]->(s) WHERE s.tag= ""'"+i+"'"" RETURN n.name,k.bond,b.name,r.rate "
		b=cypher.execute(g,s)[0]
		for j in b:
			updateBond(j)
	print a
def numberOfEdges(a):
	g=neo4j.GraphDatabaseService()
	for i in a:
		s="MATCH (a)<-[w:WRITES|UPLOADS]-(n)-[k:KNOWS]-(b) WHERE a.tag= ""'"+i+"'"" RETURN n.name,k.bond,b.name"
		b=cypher.execute(g,s)[0]
		for j in b:
			l=len(b)
			h=j[1]/float(l)
			t="MATCH (a)-[k:KNOWS]-(b) WHERE a.name= ""'"+j[0]+"'"" AND b.name= ""'"+j[2]+"'"" SET k.heavy=""'"+str(h)+"'"
			cypher.execute(g,t)
			print j
def createMatrix():
	 g=neo4j.GraphDatabaseService()
	 s="MATCH (a)-[k:KNOWS]-(b) RETURN a.name,k.heavy,b.name"
	 gr=nx.Graph()
	 b=cypher.execute(g,s)[0]
	 for i in b:
		 if i[1]==None:
			  gr.add_edge(str(i[0]),str(i[2]),weight=0)
		 else:
			  gr.add_edge(str(i[0]),str(i[2]),weight=float(i[1]))
	 a=nx.to_numpy_matrix(gr)
	 return a
def stochasticMatrix(a):
	a=a.tolist()
	for i in a:
		t=sum(i)
		if t==0:
			continue
		for j in range(len(i)):
			i[j]=i[j]/t
	return a
if __name__=="__main__":
	a=getUsers()
	create(a)
	numberOfEdges(a)
	a=createMatrix()
	print a
	a=stochasticMatrix(a)
	print "We Present here the given stochastic matrix"
	print np.matrix(a)
