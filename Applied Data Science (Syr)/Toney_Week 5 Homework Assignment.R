#Step	1:	Load	the	data
#Read	in	the	following	JSON	dataset
#http://data.maryland.gov/api/views/pdvh-tf2u/rows.json?accessType=DOWNLOAD
json <- fromJSON("http://data.maryland.gov/api/views/pdvh-tf2u/rows.json?accessType=DOWNLOAD", simplifyDataFrame = TRUE)
summary(json)
jsonData <- json$data


#Step	2:	Clean	the	data
#After	you	load	the	data,	remove	the	first	8	columns,	and	then,	to	make	it	easier	to	work	
#with,	name	the	rest	of	the	columns	as	follows:
#  Note,	not	surprisingly, it	is	in	JSON	format.		You	should	be	able	to	see	that	the	first	result	is	
#the	metadata	(information	about	the	data)	and	the	second	is	the	actual	data.
#namesOfColumns <-
#  c("CASE_NUMBER","BARRACK","ACC_DATE","ACC_TIME","ACC_TIME_CODE","DAY_OF_WE
#    EK","ROAD","INTERSECT_ROAD","DIST_FROM_INTERSECT","DIST_DIRECTION","CITY_NA
#    ME","COUNTY_CODE","COUNTY_NAME","VEHICLE_COUNT","PROP_DEST","INJURY","COLLI
#    SION_WITH_1","COLLISION_WITH_2")
data <- do.call(rbind, lapply(jsonData, rbind))
newData <- data[, 9 : ncol(data)]
namesOfColumns <- c("CASE_NUMBER","BARRACK","ACC_DATE","ACC_TIME",
              "ACC_TIME_CODE","DAY_OF_WEEK","ROAD","INTERSECT_ROAD",
              "DIST_FROM_INTERSECT","DIST_DIRECTION","CITY_NAME",
              "COUNTY_CODE","COUNTY_NAME","VEHICLE_COUNT",
              "PROP_DEST","INJURY","COLLISION_WITH_1","COLLISION_WITH_2")
colnames(newData) <- namesOfColumns
install.packages("stringr")
library(stringr)
newData <- as.data.frame(apply(newData,2,function(x)gsub('\\s+', '',x)))


#Step	3:	Understand	the	data	using	SQL	(via	SQLDF)
#Answer	the	following	questions:
install.packages('sqldf')
library(sqldf)

#  • How	many	accidents	happen	on	SUNDAY
print(sqldf("SELECT DAY_OF_WEEK, COUNT(DAY_OF_WEEK) as COUNT FROM newData WHERE DAY_OF_WEEK == 'SUNDAY'"))

#  • How	many	accidents	had	injuries (might	need	to	remove	NAs	from	the	data)
print(sqldf("SELECT INJURY, COUNT(INJURY) as COUNT FROM newData WHERE INJURY == 'YES'"))

#  • List	the	injuries	by	day
print(sqldf("SELECT DAY_OF_WEEK, COUNT(INJURY) as COUNT FROM newData WHERE INJURY == 'YES' GROUP BY DAY_OF_WEEK" ))


#Step	4:	Understand	the	data	using	tapply
#Answer	the	following	questions	(same	as	before)	– compare	results:
#  • How	many	accidents	happen	on	Sunday
accidents_sun <- tapply(newData$DAY_OF_WEEK == "SUNDAY", newData$DAY_OF_WEEK, sum)
print(accidents_sun[[4]])

#  • How	many	accidents	had	injuries (might	need	to	remove	NAs	from	the	data)
injuries <- tapply(newData$INJURY == "YES", newData$INJURY, sum)
print(injuries[[3]])

#  • List	the	injuries	by	day
print(tapply(newData$INJURY == "YES", newData$DAY_OF_WEEK, sum))



## BONUS: Understand the data using aggregate
#Answer	the	following	questions	(same	as	before)	– compare	results:
#  • How	many	accidents	happen	on	Sunday
accidents_sun <- aggregate(list(ACCIDENTS=(newData$INJURY == "YES" | newData$INJURY == "NO")), by=list(DAY=(newData$DAY_OF_WEEK)), FUN = sum)
print(accidents_sun[4,])

#  • How	many	accidents	had	injuries (might	need	to	remove	NAs	from	the	data)
accidents_yes <- aggregate(list(COUNT=(newData$INJURY == "YES")), by=list(INJURY=(newData$INJURY)), FUN = sum)
print(accidents_yes[3,])

accidents_no <-aggregate(list(COUNT=(newData$INJURY == "NO")), by=list(INJURY=(newData$INJURY)), FUN = sum)
print(accidents_no[1,])

#  • List	the	injuries	by	day
injuries_by_day <- aggregate(list(SUM = (newData$INJURY == "YES")), by=list(DAY_OF_WEEK=newData$DAY_OF_WEEK), FUN = sum)
print(injuries_by_day)
