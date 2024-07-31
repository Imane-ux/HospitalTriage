## SetUp- How to run the code locally:

  1. Install MAMP or XAMPP and start the servers. Make sure to keep the default ports i.e 8888 for Apache...
  2. Clone or download this project and add it to the htdocs folder under the MAMP Document Root. MAMP>htdocs.
   
### DB Setup
   1. Access phpMyAdmin with this link: http://localhost:8888/phpMyAdmin5/
   2. Add a new database and name it "db_hospital_triage"
   3. After clicking on it, look for the import tab and import the sql file on this project.

##### Note if you're getting a database connectivity error. Make sure to keep the db password as "root" if you are also using MAMP. But if you are using XAMPP, you need to modify the database password to empty string "" on the dbconnect.php file under the includes folder: includes>dbconnect.php

This project can now be accessed successfully on your local machine through this link: http://localhost:8888/hospitalTriage/


## Admin User Guide

As an admin user, you are able to view and manage the priority list of all registered patients, and mark them as done (i.e Patient treated). You can also add new users as employees that will also be able to view and manage this patients' priority list.

Use these credentials for Admin Login:
      Email:     admin@gmail.com
      Password:  admin123


## Patient User Guide
As a patient user, you need to register first and retain your username and the 3-letter code that was assigned to you. After that, you will be able to log in to your account and view your waiting time. Once you have completed your treatment, your account will be automatically deleted from our database. You will need to create a new account if you require treatment a second time.


## Screenshots of interface:


**Patient Registration**

<img width="500" alt="Screenshot 2024-07-28 at 8 09 30 PM" src="https://github.com/user-attachments/assets/e5f52de0-5fec-4a29-b8b6-153ed33be5ed">



**User/Admin Login**

<img width="500" alt="Screenshot 2024-07-28 at 8 09 53 PM" src="https://github.com/user-attachments/assets/87792bf3-4370-4c04-bc76-1b7aecd81877">



**Patient Login**


<img width="500" alt="Screenshot 2024-07-28 at 8 10 02 PM" src="https://github.com/user-attachments/assets/5ef26b53-7325-4f2b-b96a-1d12359da53e">


**Admin profile viewing patient priority list**


<img width="500" src="https://github.com/user-attachments/assets/4646856f-8714-4b2f-992a-7ab81d524776">






