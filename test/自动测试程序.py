from selenium.webdriver import Chrome
import time
chrome = Chrome()
chrome.get("http://localhost/Banana_Lover/")
#测试登录功能
chrome.find_element_by_xpath("//div[@id='header']/div[5]/a[1]").click()
chrome.find_element_by_xpath("//div[@id='register']/form/label[1]/input").send_keys("蔡泽炬")
chrome.find_element_by_xpath("//div[@id='register']/form/label[2]/input").send_keys("6288423351")
chrome.find_element_by_xpath("//div[@id='register']/form/label[3]/input").send_keys("1111")
chrome.find_element_by_class_name("btn").click()
#等待网页跳转
time.sleep(4)
#测试搜索功能
chrome.find_element_by_class_name("keyword").send_keys("大家")
chrome.find_element_by_class_name("submit").click()








