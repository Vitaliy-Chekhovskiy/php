<!doctype html>
<html lang="ru">
<head>

    <?php
    require_once 'mysql_connect.php';
    $sql = 'SELECT * FROM `articles` WHERE `id`= :id';
    $id= $_GET['id'];
    $query = $pdo->prepare($sql);
    $query->execute(['id'=>$_GET['id']]);
    $article = $query->fetch(PDO::FETCH_OBJ);



    $website_title = $article->title;
    require 'blocks/head.php';
    ?>
</head>
<body>
<?php require 'blocks/header.php' ?>
<main class="container mt-5">
    <div class="row">
        <div class="col-md-8 mb-3">
            <div class="jumbotron">
                <h1><?=$article->title?></h1>
                <p><b>Автор статьи:</b> <mark><?=$article->avtor?></mark></p>
                <?=date("d.m.Y", $article->date)?>
                <p>
                    <?=$article->intro?>
                    <br>
                    <?=$article->text?>
                </p>

            </div>
            <h3 class="mt-5">Коментарий</h3>

            <form action="/news.php?id=<?=$_GET['id']?>" method="post">
                <label for="username">Ваше имя</label>
                <input type="text" name="username" value="<?=$_COOKIE['log']?>" id="username" class="form-control">
                <label for="mess">Коментарий</label>
                <textarea name="mess" id="mess" class="form-control"></textarea>
                <button type="submit" id="mess_sent" class="btn btn-success mt-3 mb-5">
                    Добавить коментарий
                </button>
            </form>
            <?php
                if($_POST['username'] != '' && $_POST['mess'] != ''){

                    $username = trim(filter_var($_POST['username'],FILTER_SANITIZE_STRING));
                    $mess = trim(filter_var($_POST['mess'],FILTER_SANITIZE_STRING));
                    $id= $_GET['id'];

                    $sql = "INSERT INTO `comments`(name, mess, article_id) VALUE(?,?,?)";
                    $query = $pdo->prepare($sql);
                    $query->execute([$username, $mess, $id]);
                }
                $sql = 'SELECT * FROM `comments` WHERE `article_id` = :id ORDER BY  `id` DESC ';
                $query = $pdo->prepare($sql);
                $query->execute(['id' => $_GET['id']]);

                $comments = $query->fetchAll(PDO::FETCH_OBJ);

                foreach ($comments as $comment){
                    echo "<div class='alert alert-info mb-2'>
                            <h4>$comment->name</h4>
                            <p>$comment->mess</p>
                         </div>";

                }

            ?>



        </div>
        <?php require 'blocks/aside.php'?>
    </div>
</main>
<?php require 'blocks/footer.php'?>
</body>
</html>