from selenium import webdriver
from webdriver_manager.chrome import ChromeDriverManager
from selenium.webdriver.common.keys import Keys

driver = webdriver.Chrome(ChromeDriverManager().install())
driver.get("https://ucam.uiu.ac.bd")

inputUsername= driver.find_element_by_id('logMain_UserName')
inputPass= driver.find_element_by_id('logMain_Password')
inputBtn= driver.find_element_by_id('logMain_Button1')

inputUsername.send_keys('SAhSh')
inputPass.send_keys('abcd')


oldTitle = driver.title
inputBtn.click()
newTitle = driver.title

if(oldTitle == newTitle):
	print('invalid pass')
else:
	print('logged in!')


while(True):
	continue
