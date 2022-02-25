<?php
// Example of how the password_hash() function generates a hash
$hash = password_hash("password", PASSWORD_DEFAULT);
echo $hash;
?>
