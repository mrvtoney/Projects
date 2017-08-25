##Step	1:	Write	a	summarizing	function	to	understand	the	distribution	of	a	vector
##1. The	function,	call	it	‘printVecInfo’ should	take	a	vector	as	input
##2. The	function	should	print	the	following	information:
##   a. Mean
##   b. Median
##   c. Min	&	max
##   d. Standard	deviation
##   e. Quantiles	(at	0.05	and	0.95)
##   f. Skewness
##   Note	for	skewness,	you	can	use	the	function	in	the	‘moments’	library.

##3. Test	the	function	with	a	vector	that	has	(1,2,3,4,5,6,7,8,9,10,50).	You	should	see	
##something	such	as:
##  [1]	"mean:	9.54545454545454"
##  [1]	"median:	6"
##  [1]	"min:	1		max:	50"
##  [1]	"sd:	13.7212509368762"
##  [1]	"quantile	(0.05	- 0.95):	1.5	-- 30"
##  [1]	"skewness:	2.62039633563579"

#install.packages('Hmisc', 'moments')
#library(Hmisc)
#library(moments)
printVecInfo <- function (v) {
  funcs <- c('mean' = mean, 'median' = median, 'min' = min, 'max' = max, 'sd' = sd, 'quantile' = quantile, 'skew' = skewness)
   h <- hash()
   .set(h, funcs)
   for (i in ls(funcs)) {
     if (as.character(i) == 'quantile') {
       val <- funcs[[i]](as.numeric(v), probs = c(0.05, 0.95), na.rm = TRUE)
     } else {
       val <- funcs[[i]](v)
     }
     print(paste('Function :', capitalize(as.character(i)), ', Value :', val, sep= ' '))
  }

}

##Step	2:	Creating	Samples	in	a	Jar
##  4. Create	a	variable	‘jar’	that	has	50	red	and	50	blue	marbles
##(hint:	the	jar	can	have	strings	as	objects,	with	some	of	the	strings	being	‘red’	and	
##  some	of	the	strings	being	‘blue’
jar <- rep(c('red', 'blue'), 50)
print(jar)

##  5. Confirm	there	are	50	reds	by	summing	the	samples	that	are	red
print(sum(samp == 'red')/ 10)

##  6. Sample	10	‘marbles’	(really	strings)	from	the	jar.	How	many	are	red?	What	was	the	
##  percentage	of	red	marbles?
samp <- sample(jar, 10, replace = TRUE)
print(samp)

#   7. Do	the	sampling	20	times,	using	the	‘replicate’	command.	This	should	generate	a	list	
#of	20	numbers.	Each	number	is	the	mean	of	how	many	reds	there	were	in	10	
#samples.	Use	your	printVecInfo to	see	information	of	the	samples.	Also	generate	a	
#histogram	of	the	samples.
##    a. Repeat step a. 10 times and calculate the mean (replicate)
repJar <- replicate(10, repJar)
print(colMeans(repJar == "red"))
hist(colMeans(repJar == "red"))
##    b. c. repeat a. and b. 20 times to get 20 means (replicate)
repJar <- replicate(20, repJar)
print(colMeans(repJar == "red"))
printVecInfo(colMeans(repJar == "red"))
hist(colMeans(repJar == "red"))

##  8. Repeat	#7,	but	this	time,	sample	the	jar	100	times.	You	should	get	20 numbers,	this	
##time	each	number	represents	the	mean	of	how	many	reds	there	were	in	the	100
##samples.	Use	your	printVecInfo	to	see	information	of	the	samples.	Also	generate	a	
##histogram	of	the	samples.
##    a. Sample 100 marbles and count how many red in the sample (sample size)
samp <- sample(jar, 100, replace = TRUE)
print(sum(samp == 'red'))

##    b. Repeat step a. 100 times and calculate the mean (replicate)
repJar <- replicate(100, sample(jar, 100, replace = TRUE))
##print(colMeans(repJar == "red"))
##printVecInfo(colMeans(repJar == "red"))
hist(colMeans(repJar == "red"))

##    c. repeat a. and b. 20 times to get 20 means (replicate)
repJar <- replicate(20, replicate(100, sample(jar, 100, replace = TRUE)))
##print(colMeans(repJar == "red"))
##printVecInfo(colMeans(repJar == "red"))
hist(colMeans(repJar == "red"))

##  9. Repeat	#8,	but	this	time,	replicate	the	sampling	100 times.	You	should	get	100	
##numbers,	this	time	each	number	represents	the	mean	of	how	many	reds	there	were	
##in	the	100	samples.	Use	your	printVecInfo	to	see	information	of	the	samples.	Also	
##generate	a	histogram	of	the	samples.
##    a. Sample 100 marbles and count how many red in the sample (sample size)
samp <- sample(jar, 100, replace = TRUE)
print(sum(samp == 'red'))

##    b. Repeat step a. 100 times and calculate the mean (replicate)
repJar <- replicate(100, sample(jar, 100, replace = TRUE))
print(colMeans(repJar == "red"))
printVecInfo(colMeans(repJar == "red"))
hist(colMeans(repJar == "red"))
##    c. repeat a. and b. 100 times to get 100 means (replicate)
repJar <- replicate(100, replicate(100, sample(jar, 100, replace = TRUE)))
print(colMeans(repJar == "red"))
printVecInfo(colMeans(repJar == "red"))
hist(colMeans(repJar == "red"))


##  What do the histograms from 7, 8, 9 tell you about the Law of large numbers and the Central Limit Theorem
## - It demonstrates the truth of the law of large numbers which is that regardless of the sample size, the average
##   of from the samples will eventually reflect the true nature of the dataset. 
## - Central limit theorem suggests that if the sample is large enough that the distribution (as seen by the histogram)
##   that the distribution will reflect the true distribution when the sample size is large enough. The difference between
##   using 10, 20 and 100 as the sample size. The lower the number sampled the less reflective it is of the group due to the
##   variance in the system.

##Step	3:	Explore	the	airquality	dataset
##  10. Store	the	‘airquality’	dataset	into	a	temporary	variable
tempVar <- airquality

##  11. Clean	the	dataset	(i.e.	remove	the	NAs)
print(tempVar)
## https://stackoverflow.com/questions/34619124/how-to-clean-or-remove-na-values-from-a-dataset-without-remove-the-column-or-row
tempVar <- as.data.frame(na.omit(tempVar))
print(as.data.frame(na.omit(tempVar)))

##  12. Explore	Ozone,	Wind	and	Temp	by	doing	a	‘printVecInfo’	on	each	as	well	as	
##      generating	a	histogram	for	each
##     a. Ozone hist
printVecInfo(tempVar$Ozone)
hist(tempVar$Ozone)

##     b. Wind hist
printVecInfo(tempVar$Wind)
hist(tempVar$Wind)

##     c. Temperature hist
printVecInfo(tempVar$Temp)
hist(tempVar$Temp)