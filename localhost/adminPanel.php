<?php
if(isset($_POST['name']) || isset($_POST['type']) || isset($_POST['cost']) || isset($_POST['pic']) || isset($_POST['color']) || isset($_POST['size'])){
  echo $_POST['type'];
}

 ?>

<form method="post">
  <p>name</p>
  <input type="text" name="name" value="">
</br>
<p>type</p>
  <input type="text" name="type" value="">
  </br>
  <p>cost</p>
  <input type="text" name="cost" value="">
  </br>
  <p>pic</p>
  <input type="file" name="pic" value="">
  </br>
  <p>color</p>
  <input type="text" name="color" value="">
  </br>
  <p>size</p>
  <input type="text" name="size" value="">
  </br>

  <input type="submit" name="add" value="submit">
</form>
<?php
$host='localhost';
$db = 'DB';
$username = 'postgres';
$password = 'postgres';

$dbconn = pg_connect("host=localhost port=5432 dbname=DB user=postgres password=postgres");


$name = $_POST['name'];
$type = $_POST['type'];
$cost = (int) $_POST['cost'];
$pic = $_POST['pic'];
$color = $_POST['color'];
$size = $_POST['size'];



if($cost != 0){
 pg_query($dbconn, "insert into product(name, type, cost, pic, color, size)
                          values('$name', '$type', $cost, 'pics/$pic', '$color', '$size');");
}

 ?>
