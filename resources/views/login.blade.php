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

<div class="AutologinForm">
    <h2>Вход</h2>
    <form action="login.blade.php" method="post" class="form">
        <input type="email" class="form input" name="email" placeholder="Email..." required>
        <input type="password" class="form input" name="password" placeholder="Password..." required>
        <button class="form button" name="do_login" type="submit">LOGIN</button>
        <a href="signup-signup" class="form registration">REGISTRATION</a>
    </form>
</div>

<footer class="footer">
        <div class="contacts">
            <span class="contacts">Иванов Иван Иванович</span>
            <span class="contacts">inanov@urfu.ru</span>
            <span class="contacts"></span>
            <div class="contacts">2021</div>
    </div>
</footer>
</body>
</html>
