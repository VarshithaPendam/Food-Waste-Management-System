
**India Eats - Your solution for food waste management**

This web application facilitates charity by connecting donors with NGOs and individuals in need. Donors can create accounts, list excess items like food, and make them visible to those in need, enabling direct contact for donations.

**Tools and Technologies**

• **Frontend**: HTML, CSS, JavaScript  
• **Backend**: PHP  
• **Web Server**: XAMPP Server  
• **Database**: MySQL

**The system consists of three modules:**

**Donor:** The donor module includes the login page and the donate now page, where donors specify the details of their excess food.

- Register
- Login
- Donate Now (Donation page)
- Update
- Logout

**User:** Users must register and log in to their accounts. They will have access to a food info page where the details of excess food and information about donors will be visible.

- Registration
- Login
- View food and donor details
- Update
- Logout

**Admin:** The admin manages database operations.

- View donor details
- Manage food details
- Add/Delete donors
- Add/Delete users


**Main Page :**
![1](https://github.com/user-attachments/assets/a24be4da-742a-41e9-b1ab-7fbb4eb84196)

**About Us Page :**
![2](https://github.com/user-attachments/assets/359bf26a-9073-4446-aaab-2c88d3e00c21)

**Contact Us Page:**
![3](https://github.com/user-attachments/assets/670ad9cf-fed0-4f71-a05b-207b293ecdd1)

The three pages above are the basic pages that are initially visible to new users of the website, allowing them to learn more about the website. Afterward, they need to log in. To do this, they should go to the index page, click on the icon, and then click the login button, which will redirect them to the login page.

**Login Page:**
![lo](https://github.com/user-attachments/assets/19667956-e4bd-4af9-b14c-1d7649f4ecea)

First, the person should select their role as either a user or donor. If they are new to the website, they should click on the 'Register Now' button, which will redirect them to the registration page. In case they have forgotten their password, they should click on the 'Forgot Password' button, which will take them to the password reset page.

**Register Now Page:**
![reg](https://github.com/user-attachments/assets/15ab902f-a95f-4443-a5a2-489b1c9abd60)

**Forgot Paasword Page:**
![fo](https://github.com/user-attachments/assets/dab3cfca-e368-4aba-95fa-d1ee8ed03a01)

On clicking the **back to login** it will be redirected to login page.

Depending on the role, the webpages will be adjusted to maintain security. If the role is 'donor' the following webpages will be shown.

**Donor Home Page:**
![don1](https://github.com/user-attachments/assets/fadac065-816e-415c-bdee-07c8c957face)

**Donor About Us Page:**
![us2](https://github.com/user-attachments/assets/8c642b93-8058-4bd4-9b9e-9deda83cd282)

**Donor Contact Us Page:**
![us3](https://github.com/user-attachments/assets/8eaf8c0a-7026-4f79-acc7-67fea06299eb)

**Donor Details Page:**
![us4](https://github.com/user-attachments/assets/b4c922b1-05d9-4729-b2ee-c9e31068d6f2)

It is the page where the donor should enter their personal details as well as the food information.

If the selected role is 'user', the following webpages will be visible.

**User Home Page:**
![user](https://github.com/user-attachments/assets/4b403964-b9f3-42b8-ac13-2d2a765a0426)

**User About Us Page:**
![do2](https://github.com/user-attachments/assets/a7d37256-bded-4fb2-962b-987247d291cf)

**User Contact Us Page:**
![do3](https://github.com/user-attachments/assets/af912e2d-1253-49e0-a2bb-95a1fd3041fa)

**Food Info Page:**
![user1](https://github.com/user-attachments/assets/4e91fa91-b005-48b2-bc2f-7771b934ea7c)

In this page, both food details and donor details are visible. If you want a particular food, you should click the 'Hide' button and contact the donor . Once you click 'Hide', the background color of that food item will change to indicate that it has been taken, and if another user is viewing the website, they will see that the food is no longer available. If you decide you do not want the food, clicking the 'Reset' button will revert the changes.

As you can see in the top right corner of the donor home page, the dropdown menu contains options for 'Logout' and 'Help.' Clicking on 'Logout' will redirect you to the main index page, while clicking on 'Help' will take you to the following page with a chatbot that can assist with any questions you may have.

**Help Page:**
![chat](https://github.com/user-attachments/assets/67292bf8-a4e0-4c8f-bf4d-e0c27fc35369)

**Features:**

-Chatbot Support

-Secured Login

**How To Run:**

-Download the project zip file

-Extract the file and copy the folder

-Paste inside root directory(for xampp xampp/htdocs, for wamp wamp/www, for lamp var/www/Html)

-Open PHPMyAdmin (http://localhost/phpmyadmin)

-Create a database

-Import demo.sql file

-Run the script http://localhost/folderName





   
