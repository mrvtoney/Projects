# IST687	– Viz	Map HW:	Median	Income
# Download	the	dataset	from	the	LMS that	has	median	income	by	zip	code	(an	excel	file).


# Step	1: Load	the	Data
# 1) Read	the	data	– using	the	gdata	package	we	have	previously	used.	
install.packages("gdata")
library("gdata")
da <- read.xls("/Users/vincent/Downloads/MedianZIP.xlsx")

# 2) Clean	up	the	dataframe
# a. Remove	any	info	at	the	front	of	the	file	that’s	not	needed
# b. Update	the	column	names	(zip,	median,	mean,	population)
da <- da[-1,]
head(da)
colnames(da) <- c('zip', 'median', 'mean', 'population')

# 3) Load	the	‘zipcode’	package
install.packages("zipcode")
library(zipcode)
data(zipcode)

# 4) Merge	the	zip	code	information	from	the	two	data	frames	(merge	into	one	dataframe)
new_data <- merge(da, zipcode, by="zip", all=TRUE)
new_data <- new_data[complete.cases(new_data),]

# 5) Remove	Hawaii	and	Alaska	(just	focus	on	the	‘lower 48’	states)
new_data <- new_data[! new_data$state %in% c("HI", "AK"), ]

new_data$zipcode <- clean.zipcodes(new_data$zip)
new_data$stateName <- tolower(abbr2state(new_data$state))
new_data$median <- c(as.numeric(gsub(",", "", new_data$median)))
new_data$population <- as.numeric(gsub(",", "", new_data$population))


# Step	2: Show	the	income	&	population	per	state
# 1) Create	a	simpler	dataframe,	with	just	the	average	median	income	and	the	the	
# population	for	each	state.
install.packages("openintro")
library(openintro)
simple_data <- data.frame(matrix(ncol=4, nrow=length(new_data$median)))
colnames(simple_data) <- c("median", "population", "stateAbbre", "state")
simple_data$median <- c(as.numeric(gsub(",", "", new_data$median)))
simple_data$population <- as.numeric(gsub(",", "", new_data$population))

# 2) Add	the	state	abbreviations	and	the	state	names	as	new	columns	(make	sure	the	
# state	names	are	all	lower	case)
simple_data$stateAbbre <- new_data$state
simple_data$state <- tolower(abbr2state(new_data$state))

# 3) Show	the	U.S.	map,	representing	the	color	with	the	average	median	income	of	that state
install.packages("ggplot2")
install.packages("ggmap")
library(ggplot2)
library(ggmap)
us <- map_data("state")
income <- ggplot(simple_data, aes(map_id=state)) +
          geom_map(map=us, aes(fill=simple_data$median))  +
          expand_limits(x=us$long, y= us$lat) +
          coord_map() +
          ggtitle("Average median per state in U.S") 
income

# 4) Create	a	second	map	with	color	representing	the	population	of	the	state
us <- map_data("state")
population <- ggplot(simple_data, aes(map_id=state)) +
              geom_map(map=us, aes(fill=simple_data$population)) +
              expand_limits(x=us$long, y= us$lat) +
              coord_map() +
              ggtitle("Population per state in U.S") 
population


# Step	3:	Show	the	income	per	zip	code
# 1) Have	draw	each	zip	code	on	the	map,	 where	the	color	of	the	‘dot’	is	based	on	the	
# median	income.	To	make	the	map	look	appealing,	have	the	background	of	the	map	
# be	black.
us <- map_data("state")
zip <- ggplot(new_data, aes(map_id=stateName)) +
       geom_map(map=us, fill="black") +
       expand_limits(x=us$long, y= us$lat) +
       geom_point(data = new_data, aes(x = new_data$longitude, y = new_data$latitude, color=new_data$median), size=.15, alpha=.25) +
       coord_map() +
       scale_color_gradient(low="beige", high="blue") +
       ggtitle("Income per Zip code") 
zip


# Step 4: Show Zip Code Density
# create the density map based on the existing "mapZip"
# use geom_density_2d function to show the density
zipDensity <- zip + 
               geom_density2d(data = new_data, 
                              aes(x = new_data$longitude, y = new_data$latitude))
zipDensity <- zipDensity + 
               ggtitle("Zip code density") 
zipDensity


# ----------------------------------------------
# Step 5: Zoom in to the region around NYC
# 1) Repeat	steps	3	&	4,	but	have	the	image	/	map	be	of	the	northeast	U.S.	(centered	around	New	York).
nyc <- geocode("NYC, ny")
stateZip <-  zip + 
        geom_point(aes(x = nyc$lon, y = nyc$lat, color=new_data$median ~ new_data$zip), color="yellow", size = 2) +
        xlim(nyc$lon-10, nyc$lon+10) + 
        ylim(nyc$lat-10,nyc$lat+10) + 
        coord_map()
stateZip

# create the first zoomed map based on "mapD" and plot a point, which representing NYC
stateDensity <- zipDensity + 
                geom_point(aes(x = nyc$lon, y = nyc$lat), color="yellow", size = 2) +
                xlim(nyc$lon-10,nyc$lon+10) + 
                ylim(nyc$lat-10,nyc$lat+10) + 
                coord_map()
stateDensity
