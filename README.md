# Wordpress-db-monitor
Monitors the wordpress db connection status, logs the last MySQL queries and sends an email report if database connection fails.

Tested on Wordpress v5.1.1

# Installation

1) Upload the file `db.php` to `wp-content/db.php` ( remember to add your email address inside the `db.php` file before uploading )
2) Upload the folder `wp-log-mysql` to `wp-content/plugins/wp-log-mysql` ( CHMOD file permissions for `sql_log.html` to writeable )
3) Activate the `WP Log MySQL` plugin in Wordpress admin area in the `Plugins` section.

# Todo

7.May.2019 - Currently an email will be sent for every visitor to the site during database downtime. Recommend setting a flag so the email gets sent only once each time the db goes down (eg. (a) send email only if tmp file doesnt exist, (b) create tmp file, (c) delete tmp file when db comes back online ).

# Disclaimer

This is a personal project, use at your own risk! ( Back up your site before testing )
