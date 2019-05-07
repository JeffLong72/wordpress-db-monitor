# Wordpress-db-monitor
Monitors the wordpress db connection status, logs the last MySQL queries and emails report if database connection fails.

Tested on Wordpress v5.1.1

# Purpose
If the wordpress database goes offline, an email with the db connection error message and the last MySQL queries ran before the db went offline will be sent to the email provided in the wp-content/db.php file.

# Installation

1) Upload the file "db.php" to "wp-content/db.php" ( remember to add your email address inside the "db.php" file before uploading )
2) Upload the folder "wp-log-mysql" to "wp-content/plugins/wp-log-mysql" ( CHMOD file permissions for "sql_log.html" to writeable )
3) Activate the "wp-log-mysql" plugin in Wordpress admin area in the "Plugins" section.
