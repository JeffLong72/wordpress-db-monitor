<?php
/*
 Plugin Name: WP Log MySQL
 Description: Saves the last MySQL Queries that ran to log file.
 Version:     1.0.0
 Author:      Jeff Long
 Author URI:  https://github.com/JeffLong72/wordpress-db-monitor
 */
 
function sql_logger() {
	
    // get wp db connection
    global $wpdb;
	
    // set log file we want to write too
    // ( note: use "w" not "a", as we only want the last mysql queries, 
    //   - we want to overwrite the log file to save on file size )
    $log_file = fopen(dirname(__FILE__).'/sql_log.html', 'w');
	
    // write date to log file
    fwrite($log_file, date("F j, Y, g:i:s a")."<br /><br />");
	
    // for each mysql query, write to log file
    foreach($wpdb->queries as $q) {
        fwrite($log_file, $q[0] . " - ($q[1] seconds)" . "<br /><br />");
    }
	
    // close file
    fclose($log_file);
}

// add the log entry just before PHP shuts down execution
// ( ref: https://codex.wordpress.org/Plugin_API/Action_Reference/shutdown )
add_action('shutdown', 'sql_logger');
