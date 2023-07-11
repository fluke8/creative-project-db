<!doctype html>
<html lang="ru">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Магазин ТПУ</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<?php $host='localhost';
$db = 'DB';
$username = 'postgres';
$password = 'postgres';

# Создаем соединение с базой PostgreSQL с указанными выше параметрами
$dbconn = pg_connect("host=localhost port=5432 dbname=DB user=postgres password=postgres");
 ?>
<body>
    <div class="container">
        <header>
            <a href="index.php"><img src="pics/logo.jpg" alt="logo" class="logo"></a>
            <div class="buttons-block">

                <a href="cart.php"><img src="pics/cart.png" alt="cart" class="item"></a>
                <a href="account.php"><img src="pics/account.png" alt="account" class="item"></a>
            </div>
        </header>
        <nav class="navbar navbar-expand-lg">

                <div class="dropdown">
                    <button onclick="location.href='catalog.php'" class="btn btn-secondary" type="button" id="dropdownMenuButton1" aria-expanded="false">
                        <b>Каталог</b>
                    </button>
                </div>


        </nav>
        <section class="top">
           <div class="row content">

            <div class="col-9 ads-block ">

                <div id="ads-carousel" class="carousel carousel-dark slide" data-bs-ride="carousel">

                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="ads">
                                <h2>Место для вашей рекламы</h2>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="ads">
                                <h2>Место для вашей рекламы</h2>
                            </div>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#ads-carousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Предыдущий</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#ads-carousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>

                    </button>
                </div>
            </div>
            <div class="col-3 ">
                <div class="regOrLog">
                    <p style="font-size: 40px;">Вход</p>
                    <p>Войдите, чтобы сделать покупки</p>
                    <button type="button" onclick="location.href='account.php'" class="btn btn-secondary btnlog"><b>Вход или регистрация</b></button>

                </div>
            </div>
            </div>

        </section>
        <section class="favourites">
            <div class="heading">
                <div class="row">
                    <div class="col-2">
                        <span>
                            <h3>Избранное</h3>
                        </span>
                    </div>
                    <div class="col-10">
                        <div class="line"></div>
                    </div>
                </div>
            </div>
            <div class="content">
            <div class="cards">
              <?php




              $res = pg_query($dbconn, "select name, pic, cost from product where favorite=True");
              if (!$res) {
              echo "Произошла ошибка.\n";
              }
              # Выведем список таблиц и столбцов в каждой таблице

              while ($roww = pg_fetch_row($res)) {
                echo "<div class=\"card\">
                                    <img src=\"$roww[1]\" class=\"card-img-top\" alt=\"...\">
                                    <div class=\"card-body\">
                                        <h5 class=\"card-title\">$roww[0]</h5>
                                        <br />\n
                                        <p class=\"card-text\">$roww[2]Р</p>
                                    </div>
                                </div>";
                      }

              ?>
            </div>
            </div>
        </section>
        <section class="new">
            <div class="heading">
                <div class="row">
                    <div class="col-3">
                        <span>
                            <h3>Новое</h3>
                        </span>
                    </div>
                    <div class="col-9">
                        <div class="line"></div>
                    </div>
                </div>
            </div>
            <div class="content">
            <div id="carouselGoods" class="carousel carousel-dark slide" data-bs-ride="carousel">

                <div class="carousel-inner col-10">

                  <?php




                  $res = pg_query($dbconn, "select name, pic, cost from product order by id desc fetch first 5 rows only");
                  if (!$res) {
                  echo "Произошла ошибка.\n";
                  }
                  # Выведем список таблиц и столбцов в каждой таблице

                  for($i=0; $i<pg_num_rows($res); $i++){
                    $row = pg_fetch_row($res);
                    if(($i+1)%4==1){
                      echo "<div class=\"carousel-item";
                      if($i==0){ echo " active";}

                      echo "\">
                          <div class=\"cards\">";
                    }

                    echo "<div class=\"card\">
                                        <img src=\"$row[1]\" class=\"card-img-top\" alt=\"...\">
                                        <div class=\"card-body\">
                                            <h5 class=\"card-title\">$row[0]</h5>
                                            <p class=\"card-text\">$row[2]Р</p>
                                        </div>
                                    </div>";
                    if(($i+1)%4==0 || ($i+1)==pg_num_rows($res)){
                      echo "</div>
                              </div>";
                    }
                  }

                  ?>
                </div>
                <?php
                if(pg_num_rows($res)>4){
                echo "<button class=\"carousel-control-next\" type=\"button\" data-bs-target=\"#carouselGoods\" data-bs-slide=\"next\">
                    <span class=\"carousel-control-next-icon\" aria-hidden=\"true\"></span>

                </button>";
              }
                ?>
            </div>
            </div>
        </section>
        <footer>
            © 2023 TPU-STORE Все права защищены
        </footer>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body></html>
