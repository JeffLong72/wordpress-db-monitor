# Wordpress-db-monitor
Monitors the wordpress db connection status, logs the last MySQL queries and sends an email report if database connection fails.

Tested on Wordpress v5.1.1

# Installation

1) Upload the file "db.php" to "wp-content/db.php" ( remember to add your email address inside the "db.php" file before uploading )
2) Upload the folder "wp-log-mysql" to "wp-content/plugins/wp-log-mysql" ( CHMOD file permissions for "sql_log.html" to writeable )
3) Activate the "wp-log-mysql" plugin in Wordpress admin area in the "Plugins" section.
