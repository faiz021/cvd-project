<?php

//1&1 Values:
$mysql_host = 'db560859270.db.1and1.com';
$mysql_user = 'dbo560859270';
$mysql_pass = 'alphateam01';
$mysql_dbn = 'db560859270';

//Check that a connection can be established:
if(!mysql_connect($mysql_host, $mysql_user, $mysql_pass) || !mysql_select_db($mysql_dbn)) die(mysql_error());

?>