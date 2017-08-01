import unittest
import os

class StringTestSuite(unittest.TestCase):

	def test_if_the_string_is_empty(self) :
		input = ''
		self.assertTrue(len(input) == 0 , 'The imput string should not be empty')
	
	def test_if_string_is_valid_word(self):
		input = 'hey'
		isValidWord = True
		for eachItem in input :
			if eachItem.isdigit() :
				isValidWord = False
		self.assertTrue(isValidWord, 'The string provided is a valid word')
				
	def test_if_string_is_invalid_word(self)
		input = 'as6ds'
		invalidWord = False
		for eachItem in input :
			if eachItem.isdigit() :
				invalidWord = True
		self.assertTrue(invalidWord, 'The string provided is an invalid word')
		
	def refactor(aList):
		sum = 0
		if len(aList) == 0:
			return False, 0
		for eachItem in aList:
			isValidNumber = str(eachItem).isdigit()
			if isValidNumber == False:
				return False, 0
			else:
				sum = sum + eachItem
		return True, sum
		
		
def suite():
	suite = unittest.TestSuite()
	suite.addTest(unittest.makeSuite(StringTestSuite))
	return suite