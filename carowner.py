from selenium import webdriver
from webdriver_manager.chrome import ChromeDriverManager
from selenium.webdriver.common.keys import Keys

driver = webdriver.Chrome(ChromeDriverManager().install())
driver.get("http://localhost/carparkingapp/index.html")



btn = driver.find_element_by_id('car-owner')
btn.click()

# link= driver.find_element_by_xpath('/html/body/section[1]/div/div/div[1]/div[2]/div/button[1]')
# print(link)
# print(link.text)
username = driver.find_element_by_id("uemail")
password = driver.find_element_by_id("upass")
loginbtn = driver.find_element_by_id("sb")

username.send_keys("mehedi@pmail.com")
password.send_keys("1234")


loginbtn.click()



while(True):
	continue
