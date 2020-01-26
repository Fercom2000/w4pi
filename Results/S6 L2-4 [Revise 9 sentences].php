<php
S6: Revise PIL sentnences from PIL 2,3, and 4
	L4: Rank 9 options for 9 sentneces for PIL 4
		*Users: mtkReviser (flag:6419, idGroup:6419, )
		*Rankings: S6Ranking (flag:6419, g: 6419, idLeaflet: 4,idSentence:1-9, )
		CRWINS stored in mtkCrwRevision not S6Ranking
		OPTIONS stored in orgSentence (27) [SID,Sentence,Section,SMean,SStDev,SCoeVar,dateT,flag]

S5: Help reword 27 sentneces for PIL 4
	O9: 
		*Users: mtkReviser (flag: 419, idGroup:98, idLeaflet: 2-4, idSentence: 0-9)
		*Revisions: mtkCrwRevision (idGroup:98, idLeaflet: 2-4, idSentence: 0-9)

S3-4: Help reword 3 sentences each, apply Cloze procedure before rewording
	///Change order High, Med, Low (include Cloze, no Clz-Ins sub)///
	PIL2 CG/S2/V1/O321
	PIL2 CG/S2/V1/O312
		Users: (flag:312, idGroup:22)
		Clz: (flag:312, idGroup:22, idLeaflet:2)
		Crw: (flag:312, idGroup:22, idLeaflet:2)
	PIL2 CG/S2/V1/O231
	PIL2 CG/S2/V1/O213
	PIL2 CG/S2/V1/O132
	PIL2 CG/S2/V1/O123

	///Replace n-word in Cloze (No Clz-Ins sub)///
	INSERT INTO mtkReviser (rEmail,rInterest,rHealth,rAge,rEducation,flag,idGroup);
	INSERT INTO mtkClozeWords (idReviser,idLeaflet,idSentence,clozeField1,clozeField2,clozeField3,clozeField4,clozeField5,clozeField6,clozeField7,clozeField8,clozeField9,clozeField10,flag,idGroup);
	INSERT INTO mtkCrwRevision (idReviser,idLeaflet,idSentence,crwRevision,flag,idGroup);
	
	PIL2 CG/S2/V1/O123
		*Users: mtkReviser (flag:123, idGroup:23)
		*Clz: mtkClozeWords (flag:123, idGroup: 23, idLeaflet:2)
		*Crw: mtkCrwRevision (flag:123, idGroup: 23, idLeaflet:2)
	PIL2 CG/S2/V2/O123
		*Users: mtkReviser (flag:2123, idGroup:23)
		*Clz: mtkClozeWords (flag:2123, idGroup: 23, idLeaflet:2)
		*Crw: mtkCrwRevision (flag:2123, idGroup: 23, idLeaflet:2)
	PIL2 CG/S2/V3/O123
		*Users: mtkReviser (flag:3123, idGroup:23)
		*Clz: mtkClozeWords (flag:3123, idGroup: 23, idLeaflet:2)
		*Crw: mtkCrwRevision (flag:3123, idGroup: 23, idLeaflet:2)
	PIL2 CG/S2/V4/O123
	PIL2 CG/S2/V5/O123

	///Providing revision tips improve performance? (No Clz-Ins sub)///
	PIL2 CG/V1/O123
	PIL2 TG/V1/O123
	PIL2 CG/S2/V1/O123
	PIL2 CG/S3/V1/O123
	PIL2 TG/S2/V1/O123
	PIL2 TG/S3/V1/O123

	PIL3 CG/V1/O123
	PIL3 TG/V1/O123
		*Users: mtkReviser (flag: 123, idGroup: 131)
		*Clz: mtkClozeWords (flag: 123, idGroup: 131, idLeaflet: 3)
		*Crw: (flag: 123, idGroup: 131, idLeaflet: 3)
	PIL3 CG/S2/V1/O123
	PIL3 CG/S3/V1/O123
		*Users: mtkReviser (flag: 123, idGroup: 33)
		*Clz: mtkClozeWords (flag: 123, idGroup: 33, idLeaflet: 3)
		*Crw: (flag: 123, idGroup: 33, idLeaflet: 3)
	PIL3 TG/S2/V1/O123
		*Users: mtkReviser (flag: 123, idGroup: 132)
		*Clz: mtkClozeWords (flag: 123, idGroup: 132, idLeaflet: 3)
		*Crw: (flag: 123, idGroup: 132, idLeaflet: 3)
	PIL3 TG/S3/V1/O123

	PIL4 CG/V1/O123
	PIL4 TG/V1/O123
	PIL4 CG/S2/V1/O123
	PIL4 CG/S3/V1/O123
	PIL4 TG/S2/V1/O123
	PIL4 TG/S3/V1/O123

	///Revise 9 Sentences from PIL4 in different order///
	PIL234 CG/27S/O419
	PIL234 CG/27S/O428
	PIL234 CG/27S/O432
	PIL234 CG/27S/O443
	PIL234 CG/27S/O454
	PIL234 CG/27S/O465
	PIL234 CG/27S/O476
	PIL234 CG/27S/O487
	PIL234 CG/27S/O498
		*Users: mtkReviser (flag: 419, idGroup:98, idLeaflet: 2-4, idSentence: 0-9)
		*Revisions: mtkCrwRevision (flag:419, idGroup:98, idLeaflet: 2-4, idSentence: 0-9)

	///Rank 9 options for 9 sentence for each PIL///
	INSERT INTO S6Ranking (RID,idReviser,idLeaflet,idSentence,crwRevision,g,flag,revSent1,revSent2,revSent3,revSent4,revSent5,revSent6,revSent7,revSent8,revSent9);
	PIL234 CG/9S/S6L2
	PIL234 CG/9S/S6L3
	PIL234 CG/9S/S6L4	
		*Users: mtkReviser (flag:6419, idGroup:6419, )
		*Rankings: S6Ranking (flag:6419, g: 6419, idLeaflet: 4,idSentence:1-9, )

