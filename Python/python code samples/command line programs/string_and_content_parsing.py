#! python 3

import http.client
import sys
import os
import string
import re
from urllib.request import urlopen

class Display () :

	def read_input_file() :
		print ("Please enter the path and name of the file you would like to open")
		userInput = input("Path and file name: ")
		if Display.file_exists( userInput ) == False :
			print ("Invalid path and file name. Please Try again ")
			Display.read_input_file()
		
		f = open( userInput, "r" )
		for line in f :
			print (line)
			
	def main_menu_display () :
		validOption = True
		while True :
			print ('*' * 30, ' Menu ' , '*' * 30)
			print (' ' * 30, ' ____ ' , '' * 30)
			print(' ' * 10, "R - Read an input file")
			print(' ' * 10,  "E - Print every even character from a string")
			print (' ' * 10, "W - Read in a web-based URL")
			print (' ' * 10, "L - Load file into a list")
			print (' ' * 10, "C - Capitalize each word in a string")
			print (' ' * 10, "D - Read in an HTML file, filter on <DIV>")
			print (' ' * 10, "Q - Quit")
			userInput = input("\n\nEnter in an option: ")
			if 123 > ord(userInput) and ord(userInput) > 96 :
				userInput = chr( ord(userInput) - 32 )
			
			if userInput == "R" :
				os.system("cls")
				Display.read_input_file()
				#break
			elif userInput == "E" :
				os.system("cls")
				Display.print_even_characters_from_string()
				#break
			elif userInput == "W" :
				os.system("cls")
				Display.read_in_url()
				#break
			elif userInput == "L" :
				os.system("cls")
				Display.load_file_into_list()
				#break
			elif userInput == "C" :
				os.system("cls")
				Display.capitalize_each_word_in_string()
				#break
			elif userInput == "D" :
				os.system("cls")
				Display.filter_div_from_html_file()
				#break	
			elif userInput == "Q" :
				os.system("cls")
				break
			else :
				print ("Invalid input")
	
	def read_in_url() :
		url = input("Please enter the an URL")
		if Display.url_exists( url ) :
			print("URL exists and is accessible")
		else :
			print("URL does not exists or is inaccessible")
			
	def url_exists( urlName ) :
		conn = http.client.HTTPConnection('www.fakeurl.com')
		conn.request('HEAD', urlName)
		if conn.getresponse().status == 200 :
			return True
		else :
			return False
				
				
	def file_exists( fileName ) :
		return os.path.isfile( fileName )
		
			
	def string_has_length( string ) :
		if len( string ) > 0 :
			return True
		else :
			return False
			
	def print_even_characters_from_string() :
		print ("Please enter a string ")
		userInput = input("Input string: ")
		if Display.string_has_length( userInput ) == False :
			print ("Invalid string!!!!!!")
			Display.print_even_characters_from_string()
		
		index = 1;
		for everyCharacter in userInput :
			if index % 2 == 0 :
				print (everyCharacter)
			index = index + 1;
				
				
	def load_file_into_list () :
		print ("Please enter the path and name of the file you would like to open")
		userInput = input("Path and file name: ")
		if Display.file_exists( userInput ) == False :
			print( "Invalid path and file name. Please Try again ")
			Display.load_file_into_list()
			
		f = open( userInput, "r" )
		lineList = []
		for line in f :
			lineList.append( line )
			print (line)
			
		print ("The contents of the ", userInput, " in a list format is : \n",  lineList)
	
	def capitalize_each_word_in_string() :
		userInput = input("Please enter a string: ")
		if Display.string_has_length( userInput ) == False :
			print("Invalid string provided")
			Display.capitalize_each_word_in_string()
		
		stringParts = userInput.split()
		newString = []
		newWord = []
		for eachString in stringParts :
			index = 0
			for charInWord in eachString :
				if  ord( charInWord ) > 96 and ord( charInWord ) < 123  and index == 0 :
					newWord.append( chr( ord( charInWord ) - 32 ))
				else :
					newWord.append( charInWord )
				index = index + 1
			stringWord = ''.join( newWord )
			newString.append( stringWord )
			del newWord
			newWord = []
		newString = ' '.join( newString )	
		print( newString  )
		
	def filter_div_from_html_file() :
		divStarts = []
		divEnds = []
		lineList = []
		rerun = data = open( 'foreverhomepage.html', "r" )
		lineNumber = 1;
		divStarted = False
		divList = []
		for line in data :
			if re.search( r'(<div).*(>)', line, re.DOTALL) :
				divStarts.append(lineNumber)
				divStarted = True
				lineList.append(line)
			elif re.search( r'(</div>)', line ) :
				divEnds.append(lineNumber)
			elif divStarted == True :
				lineList.append(line)
				
			if len(divEnds) != 0 and len(divStarts) != 0 :
				lineStartIndex = 1
				divSet = []
				compDiv = ''
				rerun = open( 'foreverhomepage.html', "r" )
				for subSection in rerun :
					if lineStartIndex >= divStarts[ len( divStarts ) -1 ] and lineStartIndex <= divEnds[ len( divEnds ) -1 ] :
						divSet.append(subSection)
					lineStartIndex = lineStartIndex + 1
				compDiv = ''.join( divSet )
				divList.append( compDiv )
				divStarts.remove( divStarts[ len( divStarts ) - 1  ] )
				divEnds.remove( divEnds[ len( divEnds ) - 1  ] )
				
			lineNumber = lineNumber + 1
			
		index = 0 
		for list in divList :
			print ("item in list is : " , index , " \t\t list: " , list)
			index = index + 1
		
Display.main_menu_display()