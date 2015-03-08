<?php
require('/config/DbConfig.php');
require('/classes/DbMysql.php');

$sql = file_get_contents('projectSqls.sql', true);
$db = DbMysql::getInstance();
$db->exec($sql);