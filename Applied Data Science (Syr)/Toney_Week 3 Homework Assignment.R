readStates <- function ()
{
  ##Step	1:	Create	a	function	(named	readStates)	to	read	a	CSV	file	into	R
  ##1. Note	that	you	are	to	read	a	URL,	not	a	file	local	to	your	computer.
  ##2. The	file	is	a	dataset	on	state	populations	(within	the	United	States).
  states <- read.csv(url("https://www2.census.gov/programs-surveys/popest/tables/2010-2011/state/totals/nst-est2011-01.csv"), header = FALSE)

  
  
  ##Step	2:	Clean	the	dataframe
  ##3. Note	the	issues	that	need	to	be	fixed	(removing	columns,	removing	rows,	changing column	names).
  states <- states[grepl("^[.]", states$V1),]
  states$stateName <- gsub('.', '', states$V1)
  
  ##4. Within	your	function,	make	sure	there	are	51	rows	(one	per	state	+	the	district	of Columbia).	Make	sure	there	are	only	5	columns	with	the	columns	having	the
  ##following	names	(stateName,	 base2010,	base2011,Jul2010, Jul2011).
  ##5. Make	sure	the	last	four	columns	are	numbers	(i.e.	not	strings).
  states$base2010 <- as.numeric(gsub(",","", states$V2))
  states$base2011 <- as.numeric(gsub(",","",states$V3))
  states$Jul2010 <- as.numeric(gsub(",","",states$V4))
  states$Jul2011 <- as.numeric(gsub(",","",states$V5))
  
  
  
  ##Step	3:	Store	and	Explore	the	dataset
  ##6. Store		the dataset	into	a	dataframe,	called	dfStates.
  states <- states[,-grep("(V[0-9])", colnames(states))]
  dfStates <- states
  
  ##7. Test	your	dataframe	by	calculating	the	mean	for	the	July2011	data,	by	doing: mean(dfStates$Jul2011)
  ##à you	should	get	an	answer	of		6,109,645
  mean(dfStates$Jul2011)
  
  
  
  ##Step	4:	 Find	the	state	with	the	Highest	Population	
  ##8. Based	on	the	July2011	data,	what	is	the	population	of	the	state	with	the	highest	
  ##population?	What	is	the	name	of	that	state?
  states[which.max(dfStates$Jul2011),]  ##California
  
  ##9. Sort	the	data,	in	increasing	order,	based	on	the	July2011	data.	
  dfStates[order(dfStates$Jul2011),]
  return (dfStates)
}


##Step	5:	 Explore	the	distribution	of	the	states
##10. Write	a	function	that	takes	two	parameters.	The	first	is	a	vector	and	the	second	is	a	number.
##11. The	function	will	return	the	percentage	of	the	elements	within	the	vector	that	is	less	
##than	the	same	(i.e.	the	cumulative	distribution	below	the	value	provided).
##12. For	example,	if	the	vector	had	5	elements	(1,2,3,4,5),	with	2	being	the	number	
##passed	into	the	function,	the	function	would	return	0.2	(since	20%	of	the	numbers	were	below	2).
vect <- function(v, n) {
  if (!is.numeric(n) | !is.vector(v)) {
    return('Please enter a vector and a number')
  }
  
  return (sum(n > v) / length(v))
}

##13. Test	the	function	with	the	vector	‘dfStates$Jul2011Num’,	and	the	mean	of	dfStates$Jul2011Num’
##> vect(dfStates$Jul2011, mean(dfStates$Jul2011))
##[1] 0.666666666667