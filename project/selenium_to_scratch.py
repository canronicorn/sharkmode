from selenium.webdriver.chrome.options import Options
from selenium.webdriver.common.by import By
from selenium import webdriver
from selenium.webdriver.support.ui import WebDriverWait
from selenium.webdriver.support import expected_conditions as EC

import sys

def main():
    options = Options()
    options.add_argument("--headless")
    options.add_argument("window-size=1400,1500")
    options.add_argument("--disable-gpu")
    options.add_argument("--no-sandbox")
    options.add_argument("start-maximized")
    options.add_argument("enable-automation")
    options.add_argument("--disable-infobars")
    options.add_argument("--disable-dev-shm-usage")

    driver = webdriver.Chrome(options=options)


    get_normal_words(driver)

    get_shark_words(driver)

def get_normal_words(driver):
    url = "https://scratch.mit.edu/projects/798679228/"
    driver.get(url)
    driver.implicitly_wait(5)
    driver.find_element(By.XPATH, "//img[contains(@title,'Go')]").click()

    driver.implicitly_wait(5)
    generator_value = driver.find_element(By.XPATH, "//div[contains(@style,'background: rgb(255, 140, 26);')]").text

    normal_value = generator_value
    with open("output_normal.txt", "w") as output_file:
        output_file.write(normal_value)



def get_shark_words(driver):
    url = "https://scratch.mit.edu/projects/798634027/"
    driver.get(url)
    driver.implicitly_wait(5)
    driver.find_element(By.XPATH, "//img[contains(@title,'Go')]").click()

    driver.implicitly_wait(5)
    generator_value = driver.find_element(By.XPATH, "//div[contains(@style,'background: rgb(255, 140, 26);')]").text

    shark_value = generator_value
    with open("output_shark.txt", "w") as output_file:
        output_file.write(shark_value)




argument = "normal"

main()
