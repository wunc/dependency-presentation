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

<div class="container">
<!-- Header -->
<div class="jumbotron row">
<header id="header" class="col-lg-5">
	<h2>Search LDAP for People</h2>		
</header>

<!-- Search -->
<section id="main" class="">
	<div class="col-lg-4 h2">
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
	</div>
</section>

</div>

<!-- Results -->
<section id="results" class="row panel panel-default">
<div class="panel-heading">
	<div class="panel-title">Results</div>
</div>
<div class="panel-body">
	<div id="searchresults">Use the search box above first.</div>
</div>
</section>

</div>

<!-- Scripts -->
<script src="search.js"></script>
<script src="vendor/jquery/dist/jquery.min.js"></script>
<script src="vendor/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>