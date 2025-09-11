
<?php
// Include the class file
require 'ClassAutoLoad.php';

// Create objects
$layout = new layouts();
$forms  = new forms();

// Call methods
$layout->header($conf);
$forms->signin();
$layout->footer($conf);
