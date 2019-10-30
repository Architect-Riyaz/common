<?php
include_once(dirname(dirname(__FILE__))."/staticData.php");
mysql_connect("localhost",StaticData::db_user,StaticData::db_password);
mysql_select_db(StaticData::db_name);

mysql_query('SET character_set_results=utf8');
mysql_query('SET names=utf8');
mysql_query('SET character_set_client=utf8');
mysql_query('SET character_set_connection=utf8');
mysql_query('SET character_set_results=utf8');
mysql_query('SET collation_connection=utf8_general_ci');

session_start();
?>