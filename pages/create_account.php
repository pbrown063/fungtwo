<?php
require_once __DIR__ . '/bootstrap.php';

$mysqli = sql_connect();

if (isset($_POST['Fname']) && isset($_POST['Lname']) 
        && isset($_POST[strtolower('email')]) && isset($_POST['pswrd'])){

    $firstname = filter_input(INPUT_POST,'Fname');
    $lastname = filter_input(INPUT_POST,'Lname');
    $newemail = filter_input(INPUT_POST,'email');
    $pswrd = filter_input(INPUT_POST,'pswrd');  
	if (!empty($firstname) && !empty($lastname) && !empty($newemail) && !empty($pswrd)) {
		$sql = "INSERT INTO emp (firstname, lastname, email, reg_date, password)"
            . "VALUES('$firstname', '$lastname', '$newemail', NOW(), '$pswrd')";
		$result = mysqli_query($mysqli, $sql) or die(mysqli_error($mysqli));
	}
	$login_successful = file_get_contents($FUNG_ROOT . '/pages/account_created.html');
	echo $login_successful;
	exit();	
	
}

else {
	echo "SOMETHING WENT TERRIBLEY WRONG!";
}
?>


