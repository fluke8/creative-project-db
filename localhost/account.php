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
    <div class="heading account-heading">
        <div class="row">
            <div class="col-2">
                        <span>
                            <h3>Регистрация</h3>
                        </span>
            </div>
            <div class="col-10">
                <div class="line"></div>
            </div>
        </div>
    </div>
    <section class="registration">
        <div class="registration-content-wrapper container">
            <form action="#" method="post" class="registration-form">
                <fieldset class="registration-fieldset">
                    <legend class="registration-form-name-legend">Ваше имя</legend>
                    <input type="text" class="registration-form-input" id="name" placeholder="Имя">
                    <input type="text" class="registration-form-input" id="surname" placeholder="Фамилия">
                </fieldset>
                <fieldset class="registration-fieldset-radio">
                    <legend class="visually-hidden">Пол</legend>
                    <input type="radio" name="gender" id="male" class="registration-form-radio">
                    <label for="male" class="registration-form-gender">Муж</label>

                    <input type="radio" name="gender" id="female" class="registration-form-radio">
                    <label for="female" class="registration-form-gender">Жен</label>
                </fieldset>
                <fieldset class="registration-fieldset">
                    <legend class="registration-form-login-legend">Данные пользователя</legend>
                    <input type="email" class="registration-form-input" id="email" placeholder="Электронная почта">
                    <input type="password" class="registration-form-input" id="password" placeholder="Пароль">
                    <p class="registration-form-text">Пожалуйста, используйте 8 или более символов, по крайней мере, с 1 цифрой и
                        смесью прописных и строчных букв.</p>
                </fieldset>
                <button type="submit" class="registration-form-submit">Регистрация
                </button>
            </form>
            <div class="registration-text">
                <h3 class="registration-text-heading">В ЛОЯЛЬНОСТИ ЕСТЬ СВОИ ПРЕИМУЩЕСТВА</h3>
                <p class="registration-text-subheading">Участвуйте в программе лояльности, где вы можете зарабатывать
                    баллы и открывать серьезные привилегии. Начиная с этого, как только вы присоединитесь:</p>
                <ul class="registration-list">
                    <li class="registration-list-item">15% скидка на первое предложение</li>
                    <li class="registration-list-item">Бесплатная доставка, возврат и обмен на все заказы</li>
                    <li class="registration-list-item">Скидка 10 рублей на покупку в день рождения</li>
                    <li class="registration-list-item">Ранний доступ к продуктам</li>
                    <li class="registration-list-item">Эксклюзивные предложения и награды</li>
                </ul>
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
