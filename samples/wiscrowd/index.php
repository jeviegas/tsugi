<?php
require_once "../../config.php";
require_once $CFG->dirroot."/pdo.php";
require_once $CFG->dirroot."/lib/lms_lib.php";

// Retrieve required launch data from session
$LTI = lti_require_data(array('user_id', 'user_displayname', 
    'context_title', 'role','link_id'));

$instructor = isset($LTI['role']) && $LTI['role'] == 1 ;
$p = $CFG->dbprefix;

// Add all of your POST handling code here.  Use $LTI['link_id']
// in each of the entries to keep a separate set of guesses for
// each link.

// Add the SQL to retrieve all the guesses for the $LTI['link_id']
// here and leave the list of guesses and average in variables to 
// fall through to the view below.

html_header_content(); // Start the document and begin the <head>
html_start_body(); // Finish the </head> and start the <body>
html_flash_messages(); // Print out the $_SESSION['success'] and error messages

// A partial form styled using Twitter Bootstrap
echo('<form method="post">');
echo("Enter guess:\n");
echo('<input type="text" name="guess" value=""> ');
echo('<input type="submit" class="btn btn-primary" name="send" value="Guess"> ');
echo("\n</form>\n");

// Dump out the session information
// This is here for initial debugging only - it should not be part of the final project.
// Note that sessionize() is not needed here because PHP autmatically handles
// PHPSESSID on anchor tags and in forms.
if ( $instructor ) {
    echo('<p><a href="debug.php" target="_blank">Debug Print Session Data</a></p>');
    echo("\n");
}

// Finish the body (including loading JavaScript for JQUery and Bootstrap)
// And put out the common footer material

html_footer_content();
