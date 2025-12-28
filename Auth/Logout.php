<?php
session_start();
unset( $_SESSION["adminLogined"]);
echo "<script>
window.location.href = '../Auth/login.php';
</script>";

?>