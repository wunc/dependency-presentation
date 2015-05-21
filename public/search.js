/**
 * Search
 */

var preventAndSearch = function(e)
{
	e.preventDefault();
	search();
}

var search = function ()
{
	var xmlhttp= window.XMLHttpRequest ?
	new XMLHttpRequest() : new ActiveXObject("Microsoft.XMLHTTP");

	xmlhttp.onreadystatechange = function() {
	if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
		document.getElementById('searchresults').innerHTML = xmlhttp.responseText;
	}

	var name = document.getElementById('searchbox').value;

	xmlhttp.open("GET","search.php?displayname=" + name, true);
	xmlhttp.send();
}

document.getElementById('searchbtn').addEventListener(
    'click', preventAndSearch, false
);

document.getElementById('searchbox').focus();