import httplib
import os

class UrlTestSuite(unittest.TestCase):

	def test_if_url_present(self) :
		conn = httplib.HTTPConnection('www.fakeurl.com')
		conn.request('HEAD', '')
		self.assertTrue( conn.getresponse().status !== 200, 'The url does not exist')
		
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
	suite.addTest(unittest.makeSuite(UrlTestSuite))
	return suite