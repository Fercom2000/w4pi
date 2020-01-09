#!/usr/bin/env python3.5
#Turn on debug mode.
import cgitb
cgitb.enable()
#Print necessary headers.
print("Content-Type: text/html")
print()

import os
import sys
import re
import glob
def writeMysql(ins):
	#Connect to database.
	import pymysql
	conn=pymysql.connect(
		db='mydb',
		user='root',
		passwd='Fercom6621',
		host='localhost')
	c=conn.cursor()
	#insert some example data.
	c.execute(ins)
	conn.commit()
def askMysql(query):
	#Connect to database.
	import pymysql
	conn=pymysql.connect(
		db='mydb',
		user='root',
		passwd='Fercom6621',
		host='localhost')
	c=conn.cursor()
	#Print the contents of database.
	c.execute(query)
	#print([(r[0],r[1],"\n") for r in c.fetchall()])
#	for r in c.fetchall():
#		print()
#		print("<br>LINE"+str(i)+": <pre>",r[0],"</pre>","<pre>",r[1],"</pre>","<pre>",r[2],"</pre>")
	return c
def askMetricsF(u,f):
	import requests, json
	url = u+"?text="+readFile(f)
	d="'"+readFile(f)+"'"
	data={'text':d}
	#dataJson=json.dumps(data)
	#payload = {'json_payload':dataJson}
	headers = {'X-Mashape-Key': 'CsgdASusZSmsh50OJzFmmwCWyYHGp1zwahXjsntBAbwHoAB1VQ','Content-Type': 'application/x-www-form-urlencoded', 'Accept': 'application/json'}
	r = requests.post(url, headers=headers)
	print ("<br>Global Metrics:<br><pre>:",r.text,"</pre>")
def askMetrics(url,f):
	import requests, json,os
	d=readFile(f)
	d=d.replace("'","`")
	d=d.replace("\n"," ")
	headers = {'X-Mashape-Key': 'CsgdASusZSmsh50OJzFmmwCWyYHGp1zwahXjsntBAbwHoAB1VQ','Content-Type': 'application/x-www-form-urlencoded', 'Accept': 'application/json'}
	r = requests.post(url,data={'text':"'"+d+"'"},headers=headers)
	print ("<br>Global Metrics:<br><pre>:",r.text,"</pre>")
def askSentiment(f):
	import requests, json,os
	d=readFile(f)
	d=d[:4094]
	d=d.replace("'","`")
	d=d.replace("\n"," ")
	curl='curl -d "text='+d+'" http://text-processing.com/api/sentiment/'
	url="http://text-processing.com/api/sentiment/"
	headers = {'Content-Type': 'application/x-www-form-urlencoded', 'Accept': 'application/json'}
	r = requests.post(url,data={'text':"'"+d+"'"})
	print ("<br>Sentiment Analysis:<br><pre>:",r,r.text,"</pre>")

def getIndex(L, e):
	try: return L.index(e)
	except Exception as e: return -1
def readFileLinesF(fileName):
##    try:
	with open(fileName) as f:
		content = f.readlines()
	return content
def readFileLines(fileName):
	import io
	with io.open(fileName,'r',encoding='utf8') as f:
		text = f.readlines()
	return text
def readFile(fileName):
	import io
	with io.open(fileName,'r',encoding='utf8') as f:
		text = f.read()
	return text
def readFileF(fileName):
##    try:
	with open(fileName) as f:
		content = f.read()
	return content

def makeList(fname,i):
	file=open(fname)
	text= file.read()
	file.close()
	text= re.sub('[^a-zA-Z]+', ' ', text)
	text=text.lower()
	file=open("./pC"+str(i)+".txt","w")
	file.write(text)
	file.truncate()
	file.close()
	#print ("helloA"+str(i)+" "+fname)
def cleanText(text):
	text=re.sub('[^a-zA-Z]+', ' ', text)
	text=text.lower()
	return text
def checkList(l,word):
	try:
		i=l.index(word)
		return i
	except:
		return -1
def listString(l):
	try:
		s=','.join(str(x) for x in l)
		return s
	except:
		print ("Error at converting",l,"into a string")
		return ""
def makeQuery(l):
	s="SELECT c.type, c.condition, c.insight, c.idcomment FROM comment AS c LEFT JOIN comment2token AS c2t ON c.idcomment = c2t.idcomment LEFT JOIN token AS s ON c2t.idtoken = s.idtoken WHERE "
	for i,w in enumerate(l):
		s=s+"s.word= '"+str(l[i])
		if (i<len(l)-1):
			s=s+"' OR "
		else:
			s=s+"';"
	return s
def makeInserts(f):
	content=readFileLines(f)
	for index,line in enumerate(content):
		line=line.split(",")
		query="INSERT INTO comment VALUES ('"+line[0]+"','"+line[1]+"','"+line[2]+"','"+line[3]+"',NULL,NULL)"
		print (query)
		writeMysql(query)
		askMysql("SELECT * FROM mydb.comment;",index)
def processComments(l,c,i):
	s=''
	ids=[]
	for r in c.fetchall():
		cond=r[1]
		if(cond[-1]=='*'):
			cond=cond[:-1]
		if (getIndex(ids,r[3])<0 and cond in l):
		#print("<br> <pre>",r[0],"</pre>","<pre>",r[1],"</pre>","<pre>",r[2],"</pre>")
			if (r[0]=="modifySentence"):
				s=s+'<br><pre>Please consider changing "'+cond+'" for "'+r[2]+'"</pre>'
			if (r[0]=="generalKI"):
				s=s+'<br><pre>'+r[2]+' of "'+cond+'"</pre>'
			if (r[0]=="clarifySentence"):
				s=s+'<br><pre>'+r[2]+'"</pre>'
			ids=ids+[r[3]]
	if(s!=''):
		print("<br>LINE"+str(i)+": "+l)
		print (s)
def makeTokenList(fileName):
	content=readFileLines(fileName)
	askMetrics("https://ipeirotis-readability-metrics.p.mashape.com/getReadabilityMetrics",fileName)
	askSentiment(fileName)
	for index,line in enumerate(content):
		tokenBag=[]
		line2=cleanText(line)
		line2=line2.split(" ")
		line2=list(set(line2))
		line2.sort()
		#print ("TOKEN B"+ listString(line2)+"\n")
		c=askMysql(makeQuery(line2))
		if(c.rowcount>0):
			processComments(line,c,index)

#os.chdir("../Inputs")
i=1
#for fname in glob.glob("*.txt"):
while (i<5):
	fname="pil"+str(i)+".txt"#"p90.txt"#"p31.txt"#"p18.txt"#"FormatedInput.txt"#"p"+str(i)+".txt" "p134.txt"#
	try:
		askMetrics("https://ipeirotis-readability-metrics.p.mashape.com/getReadabilityMetrics",fname)
		askSentiment(fname)	
	except Exception as Argument:
		print("Unexpected error:",  Argument)
		print(" ------------->P"+str(i))
	i=i+1
#makeInserts("commentsInserts2.csv")
