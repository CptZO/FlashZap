<?php
session_start();

session_unset();
session_destroy();

echo "<script>
alert('Logged Out !!');
window.location.href='http://localhost/EcommWEB/Client';  
</script>";
die;

?>