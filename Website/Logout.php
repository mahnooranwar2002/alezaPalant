<?php
session_start();
unset( $_SESSION["userLogined"]);
echo "<script>
window.location.href = 'index.php';
</script>";

?>