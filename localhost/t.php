<?php
$cn = pg_connect("host=localhost port=5432 dbname=DB user=postgres password=postgres");
if($cn){
  echo "connect";
}

?>
