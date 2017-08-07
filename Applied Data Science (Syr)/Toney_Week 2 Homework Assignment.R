data("mtcars")
View(mtcars)

##Step 1: What is the hp (hp stands for "horse power")
##########################################################
max(mtcars$hp)
##[1] 335
mtcars[which.max(mtcars$hp),]
##Maserati Bora  15   8  301 335 3.54 3.57 14.6  0  1    5    8
##########################################################


##Step 2: Explore mpg(mpg stands for "miles per gallon")
##########################################################
max(mtcars$mpg)
##[1] 33.9
mtcars[which.max(mtcars$mpg),]
##Toyota Corolla 33.9   4 71.1 65 4.22 1.835 19.9  1  1    4    1

sort(mtcars$mpg)
## [1] 10.4 10.4 13.3 14.3 14.7 15.0 15.2 15.2 15.5 15.8 16.4 17.3 17.8 18.1 18.7
##[16] 19.2 19.2 19.7 21.0 21.0 21.4 21.4 21.5 22.8 22.8 24.4 26.0 27.3 30.4 30.4
##[31] 32.4 33.9
##########################################################

##Step 3: Which car has the "best" combination of mpg and hp
##########################################################
##6. I figured that the best car would get the most horse power per a mpg. In such a situation I think that 
##   horsepower will generally have more weight as its performance based.
mycars$mpg.hp <- mycars$hp / mycars$mpg
sort(mycars$mpg.hp)
##7. I as far as efficiency is concerned (getting the most horse power out of per a gallon), 
##   the Maserati Bora has the highest return of horse power per a mpg. 

##Step 4: Which car has "best" car combination of mpg and hp, where mpg and hp must be given equal weight?
##  I think the Merc 280 might be the best if mpg and hp are equal in weight. Not quite sure if I read it correctly.