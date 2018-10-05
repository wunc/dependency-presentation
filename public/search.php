<?php
require '../vendor/autoload.php';
require 'Schemas/ActiveDirectoryUTD.php';
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
	'default' => [
		'account_suffix' => '',
		'hosts' => [getenv('LDAP_DC')],
		'port' => 389,
		'base_dn' => getenv('LDAP_DN'),
		'schema' => App\Ldap\Schemas\ActiveDirectoryUTD::class,
		'username' => getenv('LDAP_USER'),
		'password' => getenv('LDAP_PASS'),
	],
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
	->where('displayname','contains',$displayname)
	->select([
		'displayname',
		'dept',
		'class',
		'college',
		'title',
		'pea',
		'uid',
		'mail',
		'telephonenumber',
		'edupersonaffiliation'
	])
	->sortBy('displayname', 'asc')
	->get();

/**
 * Return response
 */
?>
<table class="table table-striped">
	<caption><?= count($results->all()) ?> result(s) for &ldquo;<?= $displayname ?>&ldquo;</caption>
	<thead>
		<tr>
			<th>Display Name</th>
			<th>NetID</th>
			<th>Department</th>
			<th>Class</th>
			<th>College</th>
			<th>Title</th>
			<th>Phone</th>
			<th>Email</th>
			<th>PEA</th>
			<th>Affiliations</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($results as $user) { ?>
		<tr>
			<td><?= $user->getFirstAttribute('displayname') ?></td>
            <td><?= $user->getFirstAttribute('uid') ?></td>
            <td><?= $user->getDepartment() ?></td>
            <td><?= $user->getFirstAttribute('class') ?></td>
            <td><?= $user->getFirstAttribute('college') ?></td>
            <td><?= $user->getTitle() ?></td>
            <td><?= $user->getTelephoneNumber() ?></td>
            <td><?= $user->getEmail() ?></td>
			<td><?= $user->getMailNickname() ?></td>
			<td>
				<?php $affiliations = $user->getAttribute('edupersonaffiliation'); ?>
				<?= is_array($affiliations) ? implode(', ', $affiliations) : '' ?>
			</td>
		</tr>
		<?php } ?>
	</tbody>
</table>