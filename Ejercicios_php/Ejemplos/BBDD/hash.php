<?php
var_dump(password_hash('afgadgb', PASSWORD_DEFAULT));echo '<br/>';
var_dump(password_hash('yolanda', PASSWORD_DEFAULT));echo '<br/>';
var_dump(password_hash('ruben', PASSWORD_DEFAULT));echo '<br/>';
var_dump(hash('sha512','ruben'));echo '<br/>';
var_dump(hash_hmac("sha256", 'yolanda', 'pepito'));echo '<br/>';
var_dump(hash_hmac("sha256", 'yolanda', 'juanito'));echo '<br/>';

?>