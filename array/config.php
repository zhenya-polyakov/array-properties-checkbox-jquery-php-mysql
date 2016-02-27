<?php
$dblocation = "localhost";
$dbname = "polyakov_site_array";
$dbuser = "root";
$dbpasswd = "12345";

$dbcnx = @mysql_connect($dblocation, $dbuser, $dbpasswd);
if ($dbcnx)
	{
		mysql_query('SET character_set_database = utf8');
mysql_query('SET NAMES utf8');
	}
else		
	{
	echo("<p> В настоящий момент сервер бызы данных не доступен, поэтому корректное отображение страницы не возможно. </p>");
	exit();
	}	
if (! @mysql_select_db($dbname,$dbcnx) ){
	echo ("<p> В настоящий момент база данных не доступна, поэтому корректное отображение страницы не возможно. </p>");
	exit();
	}
function puterror($message)
	{
		echo("<p>$message</p>");
		echo "<p><b>Error: ".mysql_error()."</b></p>";
		exit();
		}
function do_html_URL($url, $name)
{
  // output URL as link and br
?>
  <a href="<?=$url?>"><?=$name?></a><br>
<?
}
?>