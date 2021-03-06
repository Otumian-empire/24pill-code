# 24pill-code
This is a blogging platform, combining my interest and admiration of the effect that `Quora` and `Stackoverflow` has on developers. So I am trying to merge them or something like that or even far fetch from either, worse together. This project is purely written Php.

# Reach Me here
1. [Github](https://github.com/Otumian-empire)
1. [Gmail](mailto:popecan1000@gmail.com)
1. [Telegram](https://t.me/Otumian_empire)

# Disclaimer
Well, I am a human being and some statement may be read by other human beings and others would like to sue me. `I do not own any of the Brand names or registered names used here` or have anything doing with them directly or implied. I am only using those techs to make my work here, easier.`I do not also claim, should i just add, that I am related to these tech` or any tech that'd be mention or used with mentioning it.

# Techs
1. Php 7
1. Git
1. Bootstrap 4
1. Font-awesome-4.7.0
1. Tinymce
1. Jquery-3.4.1
1. PhpMailer
1. Gmail server (used once to test phpmailer)

# Coding standards
For now I am not glued to any standard as there is.
1. I am trying to imitate MVC pattern or at least I am convinced of it due to the file structure.
1. I mostly use snake case, `eg: var_name`, for everything, from variable naming to file naming.
1. My file naming appear consistent in the `controllers` directory where painfully, all file must end with processor. `eg: hello_world_processor.php`.
1. Anything that can or could be a function is made a function after implementation.

# File structure
1. controllers 
1. includes
1. statics (js, css, img)
1. templates
1. vendor (phpmailer)
1. anything else is a view or `LICENSE`, `README`, `.gitignore`, `24pill_code_db.sql`, `CODING_STANDARDS`, `TODO`, etc.

There is more files. `TODO` is my issue tracker file, any error I am not working on that pops up is reported there.

# Testing
There is no testing yet, those i intend to use PhpUnitTest and Qunit. Well, I do test certain parts that needs trial before implementation.

# Todo - after this
This is a Php version of this project, without a framework (I don't really like the idea of a framework even with its merits). I intend to use a Php framework perhaps Laravel or CodeIgniter or Symfony. I am not sure because I am not into frameworks, if they are not seen as extensions. I will write the same (or similar) project using:
1. Python, considerably `flask`.
1. JavaScript, `nodejs` and a front-end framework like `vue.js` but not sure yet.

# Things I did quietly
In offline mode I use the actual files in the tech stated above but when i am pushing, I'd wanted to comment them out and use the available CDNs. So if it happens to crush or behave unpredictably, kindly check to see if the dependencies are met.

# How to set up [24pill-code](https://github.com/Otumian-empire/24pill-code) on your local server
Here I assume you have Xammp/Lammp/Mammp installed and you are familiar with how to fire it up and surely do your way around. You git set up and a registered github account. I am using Xammp.
1. First clone [24pill-code](https://github.com/Otumian-empire/24pill-code). Click on the green button with the text `Clone or Download`.
1. Copy the url - `https://github.com/Otumian-empire/24pill-code.git` from the url field.
1. Create a folder and initialize git. This is what I meant. Do the following:
    1. `Ctrl + Alt + T` - opens terminal
    1. `cd /opt/lammp/htdocs` - moves you to the htdocs directory
    1. `mkdir 24pill-code` - creates a new folder called 24pill-code
    1. `cd 24pill-code` - moves you into the new folder
    1.  `git init` - starts gits
    1. or at step 3, just do `git init 24pill-code` then `cd 24pill-code`
1. `git pull https://github.com/Otumian-empire/24pill-code.git`
1. finally, `sudo /opt/lammp/lammp start` to fire up xammp
1. Open your browser and enter, `localhost/24pill-code` into the address bar
1. In a new tab, open `localhost/phpmyadmin`
1. Create a database of name, `24pill_code_db`
1. Click on `import` then `browse` and then navigate to `24pill_code_db.sql` which is part of the files in the root directory, `24pill-code/` and select it.
1. Pull the scroll bar down and click on the `Go` button below.
1. Refresh the previous tab
1. Good job..You are done.


## Caution - Do this after pulling onto local server
Basically, just copy this lines and save it in this path `includes/gmail_configuration.php`. This contains email and password the app. This is note the recommended approach.
```php
<?php
    include_once "functions.php";
    // if (!check_session()) {
    //     redirect_to("https://en.wikipedia.org/wiki/Goliath");
    //     exit;
    //     exit;
    // }
    
    // configurations for the GMAIL ACCOUNT
    define('GUSERNAME', 'username');
    define('GPASSWORD', 'password');
    define('GEMAIL', 'email');

    // replace username, password and email

?>
```


# To contribute
Before you make any changes, locate the `TODO` file and see what you can do in it. Kindly remove that line when you are sure you are done. When you encounter any problem whilst working on another, kindly report it in `TODO` as descriptively as possible. 

Follow the steps above and create a **`new brach`** for your changes. Send a PR.