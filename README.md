# cmangos-starter-website

A starter website for people using CMaNGOS. This will allow users to login and register on your CMaNGOS powered server.

## Installation Requirements

- PHP 7.1+
- Web server (ex. Apache or Nginx)
- CMaNGOS instance

## Installation Notes

- You can download this by clicking on the green Code button above. It will download a `.zip` file. Unzip the contents into your web space.
- You do not need to perform any `composer install` command, but you may want to use `composer update` if in the future an update is made to [Laizerox/php-wowemu-auth](https://github.com/Laizerox/php-wowemu-auth).
- Make sure to update the `configuration.php` file with your database settings. In this file you can also set the GM level and expansion pack value you want to give newly registered users.
- You can upload a new image for the site to the `assets/img` directory. If the name of the image is something other than `home-jumbotron.jpg` you'll want to edit the `home-jumbotron` CSS class in `assets/css/custom.css`.
- **You'll likely want to add some input validation and clensing.** Perhaps in the future I will do this via [HTML Purifier](http://htmlpurifier.org).
- I also recommend vieiwng the `register.php` and `login.php` pages and add your own code for handling successful and failed registrations and logins. As they are now they do not handle either, so the user will be presented with a blank white page regardless of whether or not the registration or login is successful or not.
