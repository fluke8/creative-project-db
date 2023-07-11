<?php
$host='localhost';
$db = 'DB';
$username = 'postgres';
$password = 'postgres';

# Создаем соединение с базой PostgreSQL с указанными выше параметрами
$dbconn = pg_connect("host=localhost port=5432 dbname=DB user=postgres password=postgres");

if (!$dbconn) {
die('Could not connect');
}
else {
echo ("Connected to local DB");
}
# Выполняем запрос на создание таблицы testtable

$sql = "CREATE TABLE IF NOT EXISTS testtable (
id serial PRIMARY KEY,
number character varying(20) NOT NULL UNIQUE,
name character varying(20) NOT NULL,
kol character varying(20) NOT NULL
)";

//$res = pg_query($sql);
# Сделаем запрос на получение списка созданных таблиц
$res = pg_query($dbconn, "select name, type, pic from product where favorite=True");
if (!$res) {
echo "Произошла ошибка.\n";
}
# Выведем список таблиц и столбцов в каждой таблице


while ($row = pg_fetch_row($res)) {
  echo "<br />\n";
  echo "<div class=\"card\">
                      <img src=\"$row[2]\" class=\"card-img-top\" alt=\"...\">
                      <div class=\"card-body\">
                          <h5 class=\"card-title\">$row[0]</h5>
                          <p class=\"card-text\"></p>
                      </div>
                  </div>";

}

echo pg_num_rows($res);

?>

<div class="card">
                    <img src="pics/papich2.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Туфли</h5>
                        <p class="card-text"></p>

                    </div>
                </div>
