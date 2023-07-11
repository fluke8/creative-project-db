<?php
$dbconn = pg_connect("host=localhost port=5432 dbname=DB user=postgres password=postgres");
$action1 = $_POST['buy'];

$query = "insert into cart(name, pic, cost)
          values((select name from product where id='$action1'), (select pic from product where id='$action1'), (select cost from product where id='$action1'));";


pg_query($dbconn, $query);

?>
