<!doctype html>
<html lang="en">
<head>
    <?php
    $website_title = 'Регестрация на сайте';
    require 'blocks/head.php';
    ?>
</head>
<body>
<?php require 'blocks/header.php' ?>
<main class="container mt-5">
    <div class="row">
        <div class="col-md-8 mb-3">
            <h4> Форма регестрации</h4>
            <form action="" method="post">
                <label for="username">Ваше имя</label>
                <input type="text" name="username" id="username" class="form-control">

                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control">

                <label for="email">Логн</label>
                <input type="text" name="login" id="login" class="form-control">

                <label for="email">Пароль</label>
                <input type="password" name="pass" id="pass" class="form-control">

                <div class="alert alert-danger mt-3 errorBlock " id="errorBlock"></div>

                <button type="button" id="reg_user" class="btn btn-success mt-3">
                    Зарегесьрироватся
                </button>
            </form>
        </div>

    </div>
</main>

<?php require 'blocks/footer.php' ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script>
    $('#reg_user').click(function () {
        var name = $('#username').val();
        var email = $('#email').val();
        var login = $('#login').val();
        var pass = $('#pass').val();
        $.ajax({
            url: 'ajax/reg.php',
            type: 'POST',
            cache: false,
            data: {'username': name,'email': email,'login':login,'pass': pass},
            dataType:'html',
            success: function (data) {
                if (data == 'Готово'){
                    $('#reg_user').text('Все готово');
                    $('#errorBlock').hide();

                }
                else {
                    $('#errorBlock').show();
                    $('#errorBlock').text(data);

                }


            }
        })
    })
</script>
</body>
</html>