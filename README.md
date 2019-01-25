# Exam: Web basis

To make the exam: Create a branch with your name from master.
After doing the exam in your branch, make a merge request to master.


## Problem 1 (3 points)

Solve the problem inside the jutge_problem folder.

## Problem 2 (7 points)

In the web folder there are the sources you need to modify in order to solve the following problems and also the sql to create the tables in the database.

The page is a simple forum where users can post comments and reply to others.

The webpage has 3 pages:

1) Login page
2) View posts
3) Add new post

Don't forget to run the following commands to enable mysqli after doing `docker-compose up`
~~~~
docker exec -it web_php-apache_1 /bin/bash
>> docker-php-ext-install mysqli 
>> docker-php-ext-enable mysqli
>> apachectl restart
~~~~


### a) (0.5 points) Fix the login

The programmer that coded the webpage is a very good one, unfortunatly he makes some stupid mistakes sometimes. In this case, he forgot to ward the pages. Fix the error so no unauthenticated user can enter the pages by url.

### b) (1 point) The form for adding posts it's not finished.

After all the day programming, the developer was too tired for finishing that functionallity, so he let that for you because he know you can fill correctly the function addpost_form() in the forms.php and the add_post() function in db.php.

### c) (1.5 points) Add a navigation bar at the top of all the pages.

A new feature would be to add a navigation bar at the top of the page. Add the feature so users are able to navigate between View Posts / Add Post pages when clicking on a tab at the top of the 2 pages. Shouldn't appear in the login.

*Note: To earn points for this answer you can't duplicate any code.*


### d) (3 points) Implement a feature that allows the users only to see their comments and the answers to them.

Another new feature would be to allow the users to filter all the messages so they only see the messages that they did and the replies to them.
Add a button in the View Post page implementing this functionality.

*Note: You can reload the page if needed or use js, do as you want.*

### e) (1 point) Make new posts appear without having to reload the pages.

**Go for the 10!**

Right now you have to reload the page to see new posts that were done after you loaded the page, we don't want our users to lose content so we can add a functionality that 