## Get dataset
data <- read.csv("household_power_consumption.txt", 
                 header=T, 
                 sep=';', 
                 na.strings="?", 
                 nrows=2075259, 
                 check.names=F, 
                 stringsAsFactors=F, 
                 comment.char="", 
                 quote='\"')
data$Date <- as.Date(data$Date, format="%d/%m/%Y")

## data subset
dataSub <- subset(data, 
                  subset=(Date >= "2007-02-01" & Date <= "2007-02-02"))

## Remove from memory
rm(data)

## Convert date
datetime <- paste(as.Date(dataSub$Date), dataSub$Time)
dataSub$Datetime <- as.POSIXct(datetime)

## Plot3
with(dataSub, {
  plot(Sub_metering_1~Datetime, 
       type="l",
       ylab="Global Active Power (kilowatts)", 
       xlab="")
  lines(Sub_metering_2~Datetime,col='Red')
  lines(Sub_metering_3~Datetime,col='Blue')
})

##I am legend
legend("topright", 
       col=c("black", "red", "blue"), 
       lty=1, 
       lwd=2, 
       legend=c("Sub_metering_1", 
                "Sub_metering_2", 
                "Sub_metering_3"))


## Save image
dev.copy(png, file="plot3.png", height=480, width=480)
dev.off()