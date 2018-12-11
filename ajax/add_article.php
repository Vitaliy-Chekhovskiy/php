<?php
    $title = trim(filter_var($_POST['title'],FILTER_SANITIZE_STRING));
    $intro = trim(filter_var($_POST['intro'],FILTER_SANITIZE_STRING));
    $text = trim(filter_var($_POST['text'],FILTER_SANITIZE_STRING));

    $error = '';

    if (strlen($title)<=3)
        $error = 'Введите Тайтл';
    else if (strlen($intro)<=3)
        $error = 'Введите Интро';
    else if (strlen($text)<=3)
        $error = 'Введите Текст';


    if ($error != ''){
        echo $error;
        exit();
    }


    require_once '../mysql_connect.php';


    $dns = 'mysql:host='.$host.';dbname='.$db;
     $pdo = new PDO($dns, $user, $password);
    $sql = 'INSERT INTO articles(title, intro, text, date, avtor) VALUE(?,?,?,?,?)';
    $query = $pdo->prepare($sql);

    $query->execute([$title,$intro,$text, time(),$_COOKIE['log']]);

    echo 'Готово';
?>
