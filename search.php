<?php
/**
 * Read parameters
 */
if (array_key_exists('displayname',$_GET)) {
	$displayname = htmlspecialchars($_GET['displayname']);
} else {
	echo 'Sorry, wrong syntax.';
	http_response_code(400);
	return;
}



/**
 * LDAP Search Configuration
 */

$config = [
	'account_suffix' => '',
	'domain_controllers' => [''],
	'base_dn' => '',
	'admin_username' => '',
	'admin_password' => ''
];



/**
 * Connect to LDAP
 */

// #todo



/**
 * Perform the search
 */

$results = 'not yet implemented';



/**
 * Return response
 */
echo "<p>You searched for {$displayname}.</p>";
echo "<p>Results: {$results}</p>";