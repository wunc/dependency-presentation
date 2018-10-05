<!DOCTYPE html>
<html lang="en-US">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>LDAP Search</title>
	<link rel="stylesheet" type="text/css" href="styles.css">
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/dist/css/bootstrap.min.css">
</head>
<body>

<div class="container-fluid">
<!-- Header -->
<section id="header" class="jumbotron row">
	<header class="col-lg-4 col-lg-offset-2">
		<h2>Search LDAP for People</h2>		
	</header>

	<!-- Search -->
	<h2 id="main" class="col-lg-4">
		<form id="searchform" class="form-horizontal" action="search.php" method="get" accept-charset="utf-8">
			<div class="input-group">
				<input id="searchbox" class="form-control" type="text" name="displayname" value="" placeholder="Search for people...">
				<span class="input-group-btn">
					<button id="searchbtn" type="submit" class="btn btn-default">
						<span class="glyphicon glyphicon-search" aria-hidden="true"></span>
					</button>
				</span>
			</div>
		</form>
	</h2>
</section>

<!-- Results -->
<section id="results" class="row">
	<div class="col-xs-12 col-xl-8 col-xl-offset-2">
		<div class="panel panel-default">
			<div class="panel-heading">
				<div class="panel-title">Results</div>
			</div>
			<div class="panel-body">
				<div id="searchresults">Use the search box above first.</div>
			</div>
		</div>
	</div>
</section>

</div>

<!-- Scripts -->
<script src="search.js"></script>
<script src="vendor/jquery/dist/jquery.min.js"></script>
<script src="vendor/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>