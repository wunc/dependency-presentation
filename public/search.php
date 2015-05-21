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
	'person_filter' => 'objectClass=person',
	'user_id_key' => getenv('LDAP_USERKEY'),
	'admin_username' => getenv('LDAP_USER'),
	'admin_password' => getenv('LDAP_PASS')
];



/**
 * Connect to LDAP
 */

try {
    $ad = new Adldap($config);

    //echo "Connected to LDAP.";
} catch(AdldapException $e) {
    echo "Uh oh, looks like we had an issue trying to connect: $e";
}


/**
 * Perform the search
 */

$results = 'not yet implemented';
$results = $ad->search()
	->where('displayname','=',$displayname)
	->select(['displayname','department','title','mail'])
	->get();

/**
 * Return response
 */
?>
<table>
	<caption>Search results for <?php echo $displayname; ?></caption>
	<thead>
		<tr>
			<th>Display Name</th>
			<th>Department</th>
			<th>Title</th>
			<th>Email</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($results as $result) { ?>
		<tr>
			<td><?php if (array_key_exists('displayname',$result)) echo $result['displayname']; ?></td>
			<td><?php if (array_key_exists('department',$result)) echo $result['department']; ?></td>
			<td><?php if (array_key_exists('title',$result)) echo $result['title']; ?></td>
			<td><?php if (array_key_exists('mail',$result)) echo $result['mail']; ?></td>
		</tr>
		<?php } ?>
	</tbody>
</table>