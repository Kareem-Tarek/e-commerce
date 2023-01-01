## Full-Stack Web Development Project

* Project Title: Anywhere Anytime (AA) 
* Project Idea: E-commerce
* Developer: KareemDev 
* Developer's contact info: (Whatsapp: +201010110457, GitHub: KareemDev or Kareem-Tarek, Google: kareemtarekpk)
* Project Features: ...
    #### Website for consumers/customers (1st template).
        - Laravel socialite package: Signing In by creating an account in the website or by using a third-party app (OAuth) such as Facebook, Github or Google.
        - Users are allowed to sign in by using (email, username or phone number) and password.
        - Cart page.
        - Checkout page.
        - Favorites (Wishlist) page.
        - Products rating.
        - Latest Items page.
        - Search functionality.
        - Mailtrap (SMTP server) tool, used for email testing.
        - Verify email functionality.
        - Reset password (forgot password) functionality.
        - Change password functionality.
        - A variety of different product categories considered as product filters (such as clothing category or gender, type, accessories)
            - Clothing category or gender: Men, Women & Kids.
            - Clothing type: Formal, Casual & Sports Wear.
            - Accessories: is accessory or not?.
        - Products availablity.
        - Products discounts %.
        - Discounts page.
        - Single Page Application (SPA) for all the products.
        - New badge for products that lasts for 7 days only for the new added products to the website.
        - Home page.
        - Mission & Vision page.
        - FAQ's page.
        - About Us page.
        - Contact Us page.
        - Products sample page (quick view in a sliders).
        - Profile Management page (including "edit/showing profile data page" + "update profile data page").
        - Logout functionality.
    #### Dashboard for Admins & Moderators (2nd template).
        - Home page (including some statistics & counters for specific things in the business such as the number of men products that have sales only).
        - Single Page Application (SPA) for all the products.
        - The delete functionality is soft so anything will be deleted could also be restored "restore feature" + also there is permanent (force) delete feature.
        - Products with all their different varieties.
            - Admins (CRUD)
            - Moderators (CR)
        - Products' categories.
            - Admins (CRUD)
            - Moderators (CR)
        - Users.
            - Admins (CRUD)
            - Moderators (CR)
        - Amins & Moderators (RD) for carts.
___________________________________________________________________________________________________________________________________________________
## Steps for installing the project:
- In the project's directory type in the terminal..
    - Run `git clone https://github.com/Kareem-Tarek/e-commerce.git`.
    - After thhe previous step is done, type in the terminal "cd e-commerce" to go access the project's folder directory.
    - Then in the terminal run `composer install` or `composer update`.
    - Run `cp .env.example .env`.
    - Run `php artisan key:generate`.
    - Create DB in mysql DBMS (phpMyAdmin or HeidiSQL, etc.) with any name you want. And in the project's folder in ".env" file look up for the following code that says "DB_DATABASE=" then type after the "=" sign the same name of the DB name you created, so it will be like that "DB_DATABASE=the same name of the DB name you created".
    - Run in the terminal the following code `php artisan migrate:fresh --seed` in project's directory.
___________________________________________________________________________________________________________________________________________________
## Steps for running the project:
- In the project's directory (after the completing the the project's installation) type in the terminal..
    - Run `npm install` then `npm update` then `npm run dev`.
    - Run `php -S localhost:8000 -t public` or `php artisan serve --port=8000`.
    - Open any browser and type in the url "http://localhost:8000/" then press enter. Then you will be directed on the landing page of the website.
