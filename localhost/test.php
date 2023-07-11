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
# Выполняем запрос на создание таблицы testtable

$sql = "CREATE TABLE IF NOT EXISTS testtable (
id serial PRIMARY KEY,
number character varying(20) NOT NULL UNIQUE,
name character varying(20) NOT NULL,
kol character varying(20) NOT NULL
)";

$res = pg_query($sql);
# Сделаем запрос на получение списка созданных таблиц
$res = pg_query($dbconn, "select table_name, column_name from information_schema.columns where table_schema='public'");
if (!$res) {
echo "Произошла ошибка.\n";
}
# Выведем список таблиц и столбцов в каждой таблице

while ($row = pg_fetch_row($res)) {
echo "tableName: $row[0] ColumnName: $row[1]";
echo "<br />\n";
}

# Добавим в созданную таблицу две строчки

$res = pg_query($dbconn, "INSERT INTO testtable (id,number,name,kol) VALUES(1,'2','Name1','4')");
$res = pg_query($dbconn, "INSERT INTO testtable (id,number,name,kol) VALUES(2,'3','Name2','4')");

# Сделаем запрос на получение строк с id=2
$res = pg_query($dbconn, "select name, kol from testtable where id=2");

# Выведем полученные строки
while ($row = pg_fetch_row($res)) {
echo "Name: $row[0] Kol: $row[1]";
echo "<br />\n";
}
}
?>
