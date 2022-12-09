import unittest
import selenium.common.exceptions as exceptions
from selenium import webdriver
from selenium.webdriver.firefox.options import Options
from selenium.webdriver.support import expected_conditions as EC
from selenium.webdriver.support.ui import WebDriverWait
from sqlalchemy import create_engine, text
from selenium.webdriver.common.by import By
from datetime import datetime

import pdb


class TestCase(unittest.TestCase):
    def setUp(self):
        options = Options()
        options.headless = False
        self.driver = webdriver.Firefox(options=options)
        self.port = 8080
        self.hostname = f"http://localhost:{self.port}"
        self.path = "oct27/ingweb_mundial"
        self.default_timeout = 100
        # database connection

        self.db_user = "admin"
        self.db_pwd = "EEmp10200!"
        self.db_hostname = "test.cxkegqcerito.us-east-1.rds.amazonaws.com"
        self.db_schema = "semestral"

        self.engine = create_engine(
            F"mysql+mysqlconnector://{self.db_user}:{self.db_pwd}@{self.db_hostname}/{self.db_schema}?charset=utf8&allow_local_infile=True&get_warnings=1", echo=False)
        self.conn = self.engine.connect()
        self.admin_email, self.admin_pwd = self.conn.execute(
            text("select email,password from user where is_admin=1 limit 1")).fetchall()[0]
        self.logging = True

    def login(self, user, password):
        self.driver.get(f"{self.hostname}/{self.path}/login.php")
        self.driver.find_element(By.NAME, "email").send_keys(user)
        self.driver.find_element(By.NAME, "pwd").send_keys(password)
        self.driver.find_element(By.ID, "botones").click()

    def logout(self):
        self.driver.get(f"{self.hostname}/{self.path}/logout.php")

    def tearDown(self):
        self.conn.close()
        self.engine.dispose()
        self.driver.close()

    def log(self, info: str):
        print(f"{datetime.now()}:", info)

    def check_element(self, by: By, identifier: str, contents=None):

        try:
            element = self.driver.find_element(by, identifier)
        except exceptions.NoSuchElementException as ex:
            element = None
        self.assertIsNotNone(element)
        if element and contents:
            self.assertEquals(element.text, contents)

    def get_login_cases(self, valid_email, valid_pwd):

        return [

            {
                "case": "6 empty user",
                "user": "",
                "pwd": valid_pwd,
                "assertion_method": self.check_element,
                "assert_by": (By.ID, "error-alert", "Por favor llena todos los campos"),
            },
            {
                "case": "4 empty password",
                "user": valid_email,
                "pwd": "",
                "assertion_method": self.check_element,
                "assert_by": (By.ID, "error-alert", "Por favor llena todos los campos"),
            },
            {
                "case": "8 both empty",
                "user": "",
                "pwd": "",
                "assertion_method": self.check_element,
                "assert_by": (By.ID, "error-alert", "Por favor llena todos los campos"),
            },
            {
                "case": "2 invalid user",
                "user": "invalid",
                "pwd": valid_pwd,
                "assertion_method": self.check_element,
                "assert_by": (By.ID, "error-alert", "correo o contraseña invalidos"),
            },
            {
                "case": "2 invalid password",
                "user": valid_email,
                "pwd": "invalid",
                "assertion_method": self.check_element,
                "assert_by": (By.ID, "error-alert", "correo o contraseña invalidos"),
            },
            {
                "case": "1 valid credentials",
                "user": valid_email,
                "pwd": valid_pwd,
                "assertion_method": self.check_element,
                "assert_by": (By.ID, "welcome"),
            },
        ]


class LimitValueTests(TestCase):
    """Pruebas de valor limite"""

    def setUp(self):
        super().setUp()

    def init(self):
        self.login(self.admin_email, self.admin_pwd)
        self.driver.get(f"{self.hostname}/{self.path}/results.php")

        WebDriverWait(self.driver, self.default_timeout).until(
            EC.presence_of_element_located((By.CLASS_NAME, "result-score")))

        box = self.driver.find_element(By.CLASS_NAME, "result-score")

        box.clear()
        return box

    def deinit_fail(self):
        WebDriverWait(self.driver, self.default_timeout).until(
            EC.presence_of_element_located((By.CLASS_NAME, "notification")))
        result = self.driver.find_element(By.CLASS_NAME, "notification").text
        self.assertNotIn("Your request was completed successfully", result)
        self.driver.find_element(By.CLASS_NAME, "notification-close").click()

    def deinit_success(self):
        WebDriverWait(self.driver, self.default_timeout).until(
            EC.presence_of_element_located((By.CLASS_NAME, "notification")))
        result = self.driver.find_element(By.CLASS_NAME, "notification").text
        self.assertIn("Your request was completed successfully", result)
        self.driver.find_element(By.CLASS_NAME, "notification-close").click()
    # first limit -1F 0C 1C

    def test_goals_below_zero(self):
        box = self.init()
        box.clear()
        box.send_keys(-1)
        self.deinit_fail()

    def test_goals_above_zero(self):
        box = self.init()
        box.clear()
        box.send_keys(1)
        self.deinit_success()

    def test_goals_in_zero(self):
        box = self.init()
        box.clear()
        box.send_keys(0)
        self.deinit_success()
    # second limit 30C 31C 32F

    def test_goals_below_31(self):
        box = self.init()
        box.clear()
        box.send_keys(30)
        self.deinit_success()

    def test_goals_above_31(self):
        box = self.init()
        box.clear()
        box.send_keys(32)
        self.deinit_fail()

    def test_goals_in_31(self):
        box = self.init()
        box.clear()
        box.send_keys(31)
        self.deinit_success()


class LoginTests(TestCase):
    """Pruebas de tabla de desición"""

    def setUp(self):
        super().setUp()

    def assert_login(self, case):
        self.log("Testing logging in: "+case["case"])
        self.login(case["user"], case["pwd"])
        case["assertion_method"](*case["assert_by"])
        self.logout()

    def test_login_empty_user(self):
        self.assert_login(self.get_login_cases(
            self.admin_email, self.admin_pwd)[0])

    def test_login_empty_password(self):
        self.assert_login(self.get_login_cases(
            self.admin_email, self.admin_pwd)[1])

    def test_login_both_empty(self):
        self.assert_login(self.get_login_cases(
            self.admin_email, self.admin_pwd)[2])

    def test_login_invalid_user(self):
        self.assert_login(self.get_login_cases(
            self.admin_email, self.admin_pwd)[3])

    def test_login_invalid_pwd(self):
        self.assert_login(self.get_login_cases(
            self.admin_email, self.admin_pwd)[4])

    def test_login_valid_credentials(self):
        self.assert_login(self.get_login_cases(
            self.admin_email, self.admin_pwd)[5])


if __name__ == "__main__":
    unittest.main(warnings='ignore')
