<!DOCTYPE html>
<html lang="en-US">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>LDAP Search</title>
	<link rel="stylesheet" href="styles.css">
</head>
<body>

<!-- Header -->
<header id="header" class="">
	<h2>Search LDAP for People</h2>		
</header>

<!-- Search -->
<section id="main">
	<form id="searchform" action="search.php" method="get" accept-charset="utf-8">
		<input id="searchbox" type="text" name="displayname" value="" placeholder="Search for people...">
		<button id="searchbtn" type="submit">Submit</button>
	</form>
</section>

<!-- Results -->
<section id="results">
	<h2>Results</h2>
	<div id="searchresults">Use the search box above first.</div>
</section>

<!-- Scripts -->
<script src="search.js"></script>
</body>
</html>