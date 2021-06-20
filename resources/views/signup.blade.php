<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Check It!</title>
    <link rel="stylesheet" href="<?php echo asset('css/nikita.css');?>">
</head>

<body>
<header>
    <div class="logo-name">N<span class="pink">A</span>ILS</div>
</header>

<div class="registration-form">
    <h2>Регистрация</h2>
    <form action="signup.blade.php" method="post">
        <input type="email" class="form" name="email" id="email" placeholder="Введите Email"><br>
        <input type="text" class="form" name="name" id="user_name" placeholder="Введите имя" required><br>
        <input type="text" class="form" name="surname" id="family" placeholder="Введите фамилию" required><br>
        <input type="password" class="form" name="password" id="password" placeholder="Введите пароль"><br>
        <input type="password" class="form" name="password_2" id="password_2" placeholder="Повторите пароль"><br>
        <button class="form button" name="do_signup" type="submit">REGISTRATION</button>
    </form><br>
    <p style="text-align: center">Если вы зарегистрированы, тогда нажмите
        <a style="color: #AA4012; text-decoration: none" href="login.blade.php">здесь</a>.</p>
</div>

<footer class="footer">
    <div class="contacts">
        <span class="contacts">Иванов Иван Иванович</span>
        <span class="contacts">inanov@urfu.ru</span>
        <span class="contacts"></span>
        <div class="contacts">2021  </div>
    </div>
</footer>
</body>
</html>
