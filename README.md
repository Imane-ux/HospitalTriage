##SetUp- How to run the code locally:

  1. Install MAMP or XAMPP and start the servers. Make sure to keep the default ports i.e 8888 for Apache...
  2. Clone or download this project and add it to the htdocs folder under the MAMP Document Root. MAMP>htdocs.
   
#DB Setup
   1. Access phpMyAdmin with this link: http://localhost:8888/phpMyAdmin5/
   2. Add a new database and name it "db_hospital_triage"
   3. After clicking on it, look for the import tab and import the sql file on this project.

This project can now be accessed successfully on your local machine through this link: http://localhost:8888/hospitalTriage/


## Admin User Guide

As an admin user, you are able to view and manage the priority list of all registered patients, and mark them as done (i.e Patient treated). You can also add new users as employees that will also be able to view and manage this patients' priority list.

Use these credentials for Admin Login:
      Email:     admin@gmail.com
      Password:  admin123


## Patient User Guide
As a patient user, you need to register first and retain your username and the 3-letter code that was assigned to you. After that, you will be able to log in to your account and view your waiting time. Once you have completed your treatment, your account will be automatically deleted from our database. You will need to create a new account if you require treatment a second time.
