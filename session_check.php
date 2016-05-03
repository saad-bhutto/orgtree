<?php session_start();
if (!isset($_SESSION['role']))  {
 echo "<script>window.location= 'login.php'</script>";
}else { }
?>



