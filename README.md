#Readme

This file will be used to annotate important steps related to the project that were taken from the moment Laravel was installed on the machine.

It will make the set-up easier for future developments.

# Laravel
1. run composer install
2. [Set folder permissions for Laravel](#folder-permission-set-up)
3. copy .env.example to .env
4. run php artisan key:generate

## Folder Permission Set Up
```bash
# This line makes the webserver owner of the project folder:
$ sudo chown -R www-data:www-data /path/to/your/laravel/root/directory

# The next one fixes problems it may cause in case you have an FTP client logged in as your user (substitute ubuntu for your FTP user name):
$ sudo usermod -a -G www-data ubuntu

# Now Then you set all your directories to 755 and your files to 644:
$ sudo find /path/to/your/laravel/root/directory -type f -exec chmod 644 {} \;

# SET directory permissions:
$ sudo find /path/to/your/laravel/root/directory -type d -exec chmod 755 {} \;

# Give webserver permission to read and write to storage and cache:
# OBS: These two commands consider you are inside the directory /path/to/your/laravel/root/directory, if you aren't, you can append /path/to/your/laravel/root/directory before the folder locations
$ sudo chgrp -R www-data storage bootstrap/cache
$ sudo chmod -R ug+rwx storage bootstrap/cache

# If you want your user as owner:
$ sudo chown -R my-user:www-data /path/to/your/laravel/root/directory
```

# XDebug
in php.ini:
xdebug.remote_enable
xdebug.remote_host
xdebug.remote_port
xdebug.remote_connect_back # This option can be used if your development server is shared with multiple developers.
xdebug.remote_mode # default is "req": the debugger starts a session as soon as a script starts. "jit" makes sure it starts only when there is an exception/error.
1. You can run into a couple problems in this step, if you have vhosts enabled on WAMP server and are using phpstorm, then you don't want to set xdebug.remote_host, you will add a server under Settings > Languages & Frameworks > PHP > Servers with your alias as the Host, using port 80 and select XDebug from the dropdown to the right. 
2. Also, if you are running wamp you want to edit the php.ini file that can be selected on the WAMP icon in the tray, because there are more php.ini files and it can get confusing. 

By using the method above you make sure XDebug will run perfectly no matter what project you're on, you can just add more servers with the aliases paths to each project, i think it's more organized and works better this way.

### Starting XDebug
XDebug still won't start automatically with those settings, there are different ways you can make xdebug run:
1. add a parameter to the url (GET): XDEBUG_SESSION_START=session_name
2. add a POST parameter : XDEBUG_SESSION_START=session_name
3. add a cookie named XDEBUG_SESSION
4. Use the extension from chrome https://chrome.google.com/extensions/detail/eadndfjplgieldjbigjakmdgkmoaaaoc which adds the parameters automatically

## Laravel > PHPUnit
In windows, running phpunit from the console will give you an error, there are 2 workarounds:
1. run the command like this: $ php vendor/phpunit/phpunit/phpunit
2. create a file called phpunit.bat (or .cmd) at the root of your site containing this:
`@ECHO OFF
 SET BIN_TARGET=%~dp0/vendor/phpunit/phpunit/phpunit
 php "%BIN_TARGET%" %*`
