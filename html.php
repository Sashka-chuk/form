<?php
    $_REQUEST = [];
?>

<!doctype html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>DoodleForm</title>
    </head>

    <body>
    <div class="reg-form"></div>
    <div>
        <form name="test" action="form.php" method="post">
            <label>Введите имя:</label>
            <label>
                <input type="text" name="Name1" placeholder="Имя"/>
            </label><br/>
            <label>Введите фамилию:</label>
            <label>
                <input type="text" name="LastName1" placeholder="Фамилия"/>
            </label><br/>
            <label>Введите логин:</label>
            <label>
                <input type="text" name="Login" placeholder="Логин"/>
            </label><br/>
            <label>Введите пароль:</label>
            <label>
                <input type="text" name="Password" placeholder="Пароль"/>
            </label><br/>
            <input type="submit" name="input" value="отправить"/>
        </form>
    </div>
    </body>
    </html>

<?php
$validate = valid($_POST);

if ($validate['error']) {
    var_dump($validate);
    foreach ($validate['messages'] as $message) {
        echo "<p style='color: #b22222'>$message </p>";
    }

}
if ($validate['success']){
    foreach ($validate['messages'] as $message) {
        echo "<p style='color: #228b22'> $message </p >";
    }
}
