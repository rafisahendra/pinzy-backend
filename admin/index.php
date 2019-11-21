<?php
if (!$_SESSION['id_admin']) {
    header('Location: login.php');
} else{
   header('location:pages/index.php');
}
?>


