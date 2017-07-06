<?php
$mysqli = new mysqli("localhost", "root", "", "cne");
if ($mysqli->connect_errno) {
	echo "fallo al conectar a MySQL " . $mysqli->connect_error;
};
$mysqli->set_charset("utf8");

function redirect($url, $statusCode = 303)
{
   header('Location: ' . $url, true, $statusCode);
   die();
}

?>