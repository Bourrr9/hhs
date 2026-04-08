<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css"> </head>
<body>
    <header>
    <div class="header-content">
        <span class="logo">МВД РФ: База Данных</span>
        <nav>
            <a href="index.html">Главная</a>
            <a href="log.html">Вход</a>
            <a href="reg.html">Регистрация</a>
            <a href="profile.php">Профиль</a>
        </nav>
    </div>
</header>
    <div class="container"> <form method="POST">
            <input type="text" name="search" placeholder="Введите ФИО преступника" required>
            <input type="submit" value="Найти дело">
        </form>
<?php
session_start();
require_once 'connect.php';
if (!isset($_SESSION['login'])){
    die('Ошибка подключения');
}

if (isset($_POST['search'])) {
    $name = $_POST['search'];
    $sql = "SELECT * FROM sidevshie WHERE fullname = '$name'";
    $query = $conn->query($sql);

    if ($row = $query->fetch_assoc()) {
        echo "Личное дело найдено";
        echo "ФИО: " . $row['fullname'] ."<br>";
        echo "Текущее:" . $row['crime'] ."<br>";
        echo "Прошлое:" . $row['past_record']."<br>";
    } else {
        echo "Такого человека нету";
    }
}
?>

    </div>
</body>
</html>
