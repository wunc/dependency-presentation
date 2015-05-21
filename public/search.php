<?php
require '../vendor/autoload.php';
Dotenv::load(__DIR__.'/..');
use Adldap\Adldap;

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
	'domain_controllers' => [getenv('LDAP_DC')],
	'base_dn' => getenv('LDAP_DN'),
	'user_id_key' => getenv('LDAP_USERKEY'),
	'admin_username' => getenv('LDAP_USER'),
	'admin_password' => getenv('LDAP_PASS')
];



/**
 * Connect to LDAP
 */

try {
    $ad = new Adldap($config);

    echo "Connected to LDAP.";
} catch(AdldapException $e) {
    echo "Uh oh, looks like we had an issue trying to connect: $e";
}


/**
 * Perform the search
 */

$results = 'not yet implemented';


/**
 * Return response
 */
echo "<p>You searched for {$displayname}.</p>";
echo "<p>Results: {$results}</p>";