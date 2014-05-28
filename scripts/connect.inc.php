<!---
Author Name: Ayush Sharma
College: Arya College Of engineering & IT.
Find me at:
ayush.sharma469@gmail.com
www.github.com/ayusharma

--->
<?php
  $host = 'localhost';
  $user = 'root';
  $password = 'nwxmi5050';
  $mysql_db = 'or';
  $conn_err = 'could not connect';

  if(!mysql_connect($host,$user,$password) || !mysql_select_db($mysql_db))
  {
    die($conn_err);
  }
  
?>
