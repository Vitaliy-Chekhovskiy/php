<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm" id="img">
    <h5 class="my-0 mr-md-auto font-weight-normal">@KERATIN_STUDIO_IRPIN</h5>
    <nav class="my-2 my-md-0 mr-md-3">
        <a class="btn btn-outline-primary mr-2 mb-2" href="/">Главная</a>
        <a class="btn btn-outline-primary mr-2 mb-2" href="/contacts.php">Контакты</a>
    </nav>
    <?php
    if ($_COOKIE['log'] != '')
        echo    ' <a class="btn btn-outline-primary mr-2 mb-2" href="/article.php">Добавить статью</a>';

    ?>
    <?php
    if ($_COOKIE['log'] == ''):
    ?>
    <a class="btn btn-outline-primary mr-2 mb-2" href="/auth.php">Войти</a>
    <a class="btn btn-outline-primary mr-2 mb-2" href="/reg.php">Регистрация</a>
    <?php
    else:
    ?>
    <a class="btn btn-outline-primary mr-2 mb-2" href="/auth.php">Кабинет пользователя</a>

    <?php
    endif;
    ?>
</div>