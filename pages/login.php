<?php
$FUNG_ROOT = $_COOKIE['site_root'];
require_once $FUNG_ROOT . '/includes/bootstrap.inc';
$mysqli = sql_connect();

if (isset($_POST[strtolower('email')]) && isset($_POST['pswrd'])){

$useremail = filter_input(INPUT_POST, 'email');
$userpasswd = filter_input(INPUT_POST, 'pswrd');

$sql = "SELECT firstname FROM emp  WHERE email = '".$useremail.
        "' AND password = PASSWORD('".$userpasswd."')";

$result = mysqli_query($mysqli, $sql) or die(mysqli_error($mysqli));
}

else {
$login_html = file_get_contents($FUNG_ROOT . '/pages/login.html');
echo $login_html;
}

if (mysqli_num_rows($result) == 1) {

	//if authorized, get the values of f_name
	while ($info = mysqli_fetch_array($result)) {
		$f_name = stripslashes($info['firstname']);
	echo $f_name;	
}



	//header('Location:'. $FUNG_ROOT. '/pages/workflow.php');
}
mysqli_close($mysqli);

?>

