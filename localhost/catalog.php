<?php
   if(isset($_POST['addtofavorites']) || isset($_POST['buy'])){

     header("Location: /catalog.php");
   }
    ?>
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
         <?php
            $host='localhost';
            $db = 'DB';
            $username = 'postgres';
            $password = 'postgres';


            # Создаем соединение с базой PostgreSQL с указанными выше параметрами
            $dbconn = pg_connect("host=localhost port=5432 dbname=DB user=postgres password=postgres");


            $type = pg_query($dbconn, "select distinct type from product order by type asc;");

            $j=0;
            while ($row = pg_fetch_row($type)) {
                echo "<section class=\"type\">
                    <div class=\"heading\">
                        <div class=\"row\">
                            <div class=\"col-2\">
                                    <span>
                                        <h3>$row[0]</h3>
                                    </span>
                            </div>
                            <div class=\"col-10\">
                                <div class=\"line\"></div>
                            </div>
                        </div>
                    </div>

                    <div class=\"content\">
                    <div id=\"carouselGoods$j\" class=\"carousel carousel-dark slide\" data-bs-ride=\"carousel\">

                        <div class=\"carousel-inner col-10\">";
                $cards = pg_query($dbconn, "select name, pic, cost, id
                                            from product
                                            where type='$row[0]'
                                            ORDER BY id ASC;");
                                            for($i=0; $i<pg_num_rows($cards); $i++){
                                              $roww = pg_fetch_row($cards);

                                              if(($i+1)%4==1){
                                                echo "<div class=\"carousel-item";
                                                if($i==0){ echo " active";}

                                                echo "\">
                                                    <div class=\"cards\">";
                                              }

                                              echo "<div class=\"card\">
                                                                  <img src=\"$roww[1]\" class=\"card-img-top\" alt=\"...\">
                                                                  <div class=\"card-body\">
                                                                      <h5 class=\"card-title\">$roww[0]</h5>
                                                                      <p class=\"card-text\">$roww[2]Р</p>
                                                                      </div>

                                                                      </br>

                                                                      <form method='POST'>
                                                                      <div class=\"card-buttons\">
                                                                      <button class=\"btn-addtofavorites\"  type=submit name=\"addtofavorites\" value=\"$roww[3]\">";
                                                                      if(pg_fetch_row(pg_query($dbconn, "select favorite
                                                                                                  from product
                                                                                                  where id='$roww[3]';"))[0]=='t'){
                                                                      echo "♥";

                                                                    }
                                                                    else{
                                                                      echo "♡";
                                                                    }
                                                                      echo "</button>


                                                                      <button class=\"btn-buy\" type=submit name=\"buy\" value=\"$roww[3]\">
                                                                      Купить
                                                                      </button>

                                                                      </div>
                                                                      </form>

                                                                      </div>";

                                              if(($i+1)%4==0 || ($i+1)==pg_num_rows($cards)){
                                                echo "</div>
                                                        </div>";
                                              }
                                            }
                    echo "</div>";
                    if(pg_num_rows($cards)>4){
                    echo "<button class=\"carousel-control-next\" type=\"button\" data-bs-target=\"#carouselGoods$j\" data-bs-slide=\"next\">
                            <span class=\"carousel-control-next-icon\" aria-hidden=\"true\"></span>

                        </button>";
                    }
                  echo "</div>
                    </div>";

                echo "</section>";
                $j=$j+1;
            }

            ?>

         <footer>
            © 2023 TPU-STORE Все права защищены
         </footer>
      </div>



      <?php
      $action1 = $_POST['buy'];

     $query = "insert into cart(name, pic, cost, color, size)
               values((select name from product where id=$action1),
               (select pic from product where id=$action1),
               (select cost from product where id=$action1),
               (select color from product where id=$action1),
               (select size from product where id=$action1));";

     pg_query($dbconn, $query);

     $action = $_POST['addtofavorites'];

     $query2 = "select favorite from product where id='$action';";

     $query1 = pg_query($dbconn, $query2);

     $check = pg_fetch_result($query1, 0, 0);

     if($check == 'f'){
     pg_query($dbconn, "update product
                         set favorite=True
                                 where id=$action;");
     }
     else{
       pg_query($dbconn, "update product
                           set favorite=False
                                   where id=$action;");
     }


         ?>
         <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
         <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
         <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
         <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
   </body>
</html>
