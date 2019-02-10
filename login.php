$host="localhost"; // Host name.
$db_user="root"; // MySQL username.
$db_password=""; // MySQL password.
$database="mydatabase"; // Database name.

$link = mysql_connect($host,$db_user,$db_password);
if (!$link) {
   die('Could not connect: ' . mysql_error());
}
else {
	echo "Mysql Connected Successfully";
}

$login = mysql_query("select * from table_name where (username = '" . $_POST['username'] . "') and (password = '" . md5($_POST['password']) . "')",$db);

$rowcount = mysql_num_rows($login);
if ($rowcount == 1) {
	$_SESSION['username'] = $_POST['username'];
	header("Location: MyWebPage2.html");
}
else {
	header("Location: index.html");
}

mysql_close($link);
?>