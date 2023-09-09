<?php
session_start();
if(isset($_SESSION['email']) && $_SESSION['type']=='students'){
}
else{
	echo '<script>alert("Please Login");window.location.assign("../login.php");</script>';
}
?>