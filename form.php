<?php
include 'html.php';// связь с html файлом

function valid($post): array {
    $validate = [
        'error' => false,
        'success' => false,
        'messages' => []
    ];

    if ($post['Name1'] && $post['LastName1'] && $post['Login'] && $post['Password']) { //условие переменная[значение]
        $Name1 = trim($post['Name1']);
        $LastName1 = trim($post['LastName1']);
        $Login = trim($post['Login']);
        $Password = trim($post['Password']);// trim -> удаляет пробелы

        $constrains = [
            'Name1' => 3,
            'LastName1' => 3,
            'Login' => 2,
            'Password' => 5
        ];// переменная с нужной длинной слов

        $validateForm = validNAndLNAndLAndP($Name1, $LastName1, $Login, $Password, $constrains);// присвоение

        if ($validateForm['Name1']) {
            $validate['error'] = true;
            array_push(
                $validate['messages'],
                "Имя должно иметь хотябы {$constrains['Name1']} букв."
            );
        }
        if ($validateForm['Name1']) {
            $validate['error'] = true;
            array_push(
                $validate['messages'],
                "Имя не содержит цифр, повторите ввод."
            );
        }
        if ($validateForm['LastName1']) {
            $validate['error'] = true;
            array_push(
                $validate['messages'],
                "Фамилия должна иметь хотябы {$constrains['LastName1']} букв."
            );
        }
        if ($validateForm['LastName1']) {
            $validate['error'] = true;
            array_push(
                $validate['messages'],
                "Фамилия не содержит цифр, повторите ввод."
            );
        }
        if (!$validateForm['Login']) {
            $validate['error'] = true;
            array_push(
                $validate['messages'],
                "Логин {$Login} должен содержать {$constrains['Login']} символов."
            );
        }
        if (!$validateForm['Password']) {
            $validate['error'] = true;
            array_push(
                $validate['messages'],
                "Пароль {$Password} должен содержать {$constrains['Password']} символов."
            );
        }
        if (!$validate['error']) {
            $validate['success'] = true;
            array_push(
                $validate['messages'],
                "Ваше имя: {$Name1}.",
                "Ваша фамилия: {$LastName1}.",
                "Ваш логин: {$Login}.",
                "Ваш пароль: {$Password}."
            );
        }
    } else {
        $validate = [
            'error' => true,
            'messages' => [
                'Форма не заполнена!'
            ]
        ];
    }
    return $validate;
}
return valid($_POST);

function validNAndLNAndLAndP(
    string $Name1,
    string $LastName1,
    string $Login,
    string $Password,
    array $constrains
): array {
    $validateForm = [
        'Name1'     => true,
        'LastName1' => true,
        'Login'     => true,
        'Password'  => true
    ];

    if (strlen($Name1) < $constrains['Name1']) {
        $validateForm['Name1'] = false;
    }
    if (!preg_match('/[0-9]/', $Name1)) {
        $validateForm['Name1'] = false;
    }
    if (strlen($LastName1) < $constrains['LastName1']) {
        $validateForm['LastName1'] = false;
    }
    if (!preg_match('/[0-9]/', $LastName1)) {
        $validateForm['LastName1'] = false;
    }
    if (strlen($Login) < $constrains['Login']) {
        $validateForm['Login'] = false;
    }
    if (strlen($Password) < $constrains['Password']) {
        $validateForm['Password'] = false;
    }

    return $validateForm;

}

