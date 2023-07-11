<?php
if(isset($_POST['removeFromCart'])){
  header("Location: /cart.php");
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
        <div class="heading cart-heading">
            <div class="row">
                <div class="col-2">
                        <span>
                            <h3>Корзина</h3>
                        </span>
                </div>
                <div class="col-10">
                    <div class="line"></div>
                </div>
            </div>
        </div>
        <section class="cart">

            <div class="cart-container">
                <div class="cart-wrapper">
                    <ul class="cart-list">

                      <?php
                      $host='localhost';
                      $db = 'DB';
                      $username = 'postgres';
                      $password = 'postgres';


                      # Создаем соединение с базой PostgreSQL с указанными выше параметрами
                      $dbconn = pg_connect("host=localhost port=5432 dbname=DB user=postgres password=postgres");


                      $item = pg_query($dbconn, "select name, pic, cost, color, size, id from cart order by name asc;");

                      while ($row = pg_fetch_row($item)) {
                        echo "<li class=\"cart-list-item\">
                            <img src=\"$row[1]\" alt=\"\" class=\"cart-list-img\">
                            <div class=\"cart-item-wrapper\">
                                <h3 class=\"cart-list-heading\">
                                    $row[0]
                                </h3>
                                <form method='POST'>
                                <button class=\"btn-removeFromCart\" type=submit name=\"removeFromCart\" value=\"$row[5]\">
                                <span class=\"btn-removeFromCart-icon\"> × </span>
                                </button>
                                </form>

                                <p class=\"cart-list-text\">Цвет: $row[3]</p>
                                <p class=\"cart-list-text\">Размер: $row[4]</p>
                                <p class=\"cart-list-text\">Цена: $row[2]Р</p>
                            </div>
                        </li>";
                      }
                      $action2 = $_POST['removeFromCart'];

                      $query = "delete
                                from cart
                                where id='$action2';";

                      pg_query($dbconn, $query);
                  ?>
                    </ul>
                </div>
            </div>
            <div class="cart-shipping-wrapper">
                <form action="post" class="cart-shipping">
                    <h3 class="cart-shipping-heading">Адрес доставки</h3>
                    <label for="city" class="visually-hidden">Город</label>
                    <input type="text" id="city" class="cart-shipping-input" placeholder="Город">
                    <label for="zip" class="visually-hidden">Почтовый индекс</label>
                    <input type="text" id="zip" class="cart-shipping-input" placeholder="Почтовый индекс">

                </form>
                <div class="cart-total">
                    <div class="cart-total-text-wrapper">
                        <p class="cart-grandtotal-text">Итого <?php echo 0+pg_fetch_row(pg_query($dbconn, "select sum(cost)
                                                                                            from cart;"))[0]; ?>Р</p>
                    </div>
                    <div class="cart-total-checkout-wrapper">
                        <hr class="cart-total-line">
                        <button type="submit" class="cart-total-checkout">Оформить заказ</button>
                    </div>
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
