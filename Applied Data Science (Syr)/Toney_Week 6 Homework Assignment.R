# Step	1:	Load	the	data
# We	will	use	the	airquality	data	set,	which you	should	already	have	as	part	of	your	R	
# installation
airq <- na.omit(airquality)


# Step	2:	Clean	the	data
# After	you	load	the	data,	there	will	be	some	NAs	in	the	data.	You	need	to	figure	out	what	to	
# do	about	those	nasty	NAs.
airq <- na.omit(airq)

# Step	3:	Understand	the	data	distribution
# Create	the	following	visualizations using	ggplot:
#   • Histograms	for	each	of	the	variables		
ggplot(data=airq, aes(x=Ozone)) + geom_histogram()
ggplot(data=airq, aes(x=Solar.R)) + geom_histogram()
ggplot(data=airq, aes(x=Temp)) + geom_histogram()
ggplot(data=airq, aes(x=Wind)) + geom_histogram()
ggplot(data=airq, aes(x=Month)) + geom_histogram()
ggplot(data=airq, aes(x=Day)) + geom_histogram()

#   • Boxplot	for	Ozone
ggplot(airquality, aes(x=Month, y=Ozone)) +  geom_boxplot()

#   • Boxplot for	wind	values	(round	the	wind	to	get	a	good	number	of	“buckets”)
ggplot(airquality, aes(x=Month, y=round(airq$Wind, 0))) +  geom_boxplot()


# Step	3:	Explore	how	the	data	changes	over	time
# First,	make	sure	to	create	appropriate	dates	(this	data	was	from	1973).	Then	create	line	
# charts for	ozone,	temp,	wind	and	solar.R (one	line	chart	for	each,	and	then	one	chart	with	4	
# lines,	each	having	a	different	color).	Create	these	visualizations	using	ggplot.
airq$Date <- as.Date(paste("1973", airq$Month, airq$Day, sep="-"))
ggplot(data=airq, aes(y=Ozone, x=Date)) + geom_line(color="red", linetype="dashed") + geom_point()
ggplot(data=airq, aes(y=Wind, x=Date)) + geom_line(color="red", linetype="dashed") + geom_point()
ggplot(data=airq, aes(y=Solar.R, x=Date)) + geom_line(color="red", linetype="dashed") + geom_point()
ggplot(data=airq, aes(y=Temp, x=Date)) + geom_line(color="red", linetype="dashed") + geom_point()

# Note	that	for	the	chart	with	4	lines,	you	need	to	think	about	how	to	effectively	use	the	yaxis.
ggplot(data=airq, aes(Date)) + 
  geom_line(aes(y=Wind), colour="red") + 
  geom_line(aes(y=Ozone), colour="blue") + 
  geom_line(aes(y=Temp), colour="yellow") + 
  geom_line(aes(y=Solar.R), colour="green") 
  

# Step	4:	Look	at	all	the data	via	a	Heatmap
# Create a	heatmap,	with	each	day	along	the	x-axis	and	ozone,	temp,	wind	and	solar.r	along	
# the	y-axis,	and	days	as	rows	along	the	y-axis.	 Great	the	heatmap	using	geom_tile (this	
# defines	the	ggplot geometry	to	be	‘tiles’	as	opposed	to	‘lines’	and	the	other	geometry	we	
# have	previously	used).
# Note	that	you	need	to	figure	out	how	to	show	the	relative	change	equally	across	all	the	
# variables.
ggplot(data=airq, aes(Date)) +
  geom_tile(aes(y=Wind), colour="red") + 
  geom_tile(aes(y=Ozone), colour="blue") + 
  geom_tile(aes(y=Temp), colour="yellow") + 
  geom_tile(aes(y=Solar.R), colour="green") 

# Step	5:	Look	at	all	the	data	via	a	scatter	chart
# Create	a	scatter	chart (using	ggplot	geom_point),	with	the	x-axis	representing	the	wind,	the	
# y-axis	representing	the	temperature,	the	size	of	each	dot	representing	the	ozone	and	the	
# color	representing	the	solar.R
ggplot(data=airq, aes(x=Wind, y=Temp)) +
  geom_point(aes(size=Ozone, color=Solar.R))


# Step	6:	Final	Analysis
# • Do	you	see	any	patterns	after	exploring	the	data?		
#      That spikes in Solar and Ozone are related and that the wind will generally spike as well
# • What	was	the	most	useful	visualization?
#      I think the line plot was useful as far as aligning all of the data together at ones in a meaningful
#      way