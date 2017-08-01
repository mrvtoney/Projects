import unittest
import os

class FileTestSuite(unittest.TestCase)

	def test_if_file_exist(self) :
		path = "C:\Ussers\Vince\Desktop\do_not_exist.txt"
		self.assertTrue(!os.path.isfile( path ), 'The file should not exist')
	
	def test_if_html_contains_div(self)
		html = "<body><div>here</div></body>"
		pos = html.find('<div>')
		self.assertTrue( len(pos) == 1, 'The HTML does contain div\'s')
		
	def test_if_html_does_not_contain_a_div(self)
		html = "<body>walla walla washington</body>"
		pos = html.find('<div>')
		self.assert( pos == -1, "The HTML does not contain div's")
		
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
	suite.addTest(unittest.makeSuite(UnitTestSuite))
	return suite