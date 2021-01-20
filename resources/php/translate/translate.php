<?php
    $lang = isset($_COOKIE['language']) ? $_COOKIE['language'] : 'ru';
    $translate = array(
        'en' => array(
            'settings' => array(
                'title' => 'Settings',
                'header' => 'Settings',
                'theme' => 'Theme',
                'lang' => 'Language',
                'after' => 'After meditation',
                'about' => 'About project',
                'logout' => 'Logout'
            ),
            'about' => array(
                'title' => 'About project',
                'header' => 'About project',
                'information' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque tincidunt vestibulum elementum. Aliquam varius, odio a ullamcorper lobortis, justo risus venenatis elit, id euismod turpis nisl a nunc. Cras eu semper tortor. Nullam finibus sodales quam sed interdum. Fusce mollis lorem at leo consequat, vitae molestie elit dictum. Sed elementum efficitur augue a fringilla. Ut massa leo, fermentum sit amet augue vitae, congue iaculis augue. Aenean hendrerit molestie est sed sagittis. Ut nulla nisl, efficitur nec interdum placerat, pretium at turpis. Vivamus tincidunt, nunc at elementum convallis, urna tellus posuere metus, nec porta lectus sapien nec turpis.'
            ),
            'signin' => array(
                'title' => 'SignIn',
                'header' => 'Sign in',
                'common' => 'Sign in with Email',
                'facebook' => 'Sign in with Facebook',
                'google' => 'Sign in with Google'
            ),
            'login' => array(
                'title' => 'LogIn',
                'header' => 'Login',
                'email' => 'Email',
                'pass' => 'Password',
                'submit' => 'OK',
                'signup' => 'Register now'
            ),
            'signup' => array(
                'title' => 'Registration',
                'header' => 'Registration',
                'email' => 'Email',
                'pass' => 'Password',
                'submit' => 'Register now'
            ),
            'mainpage' => array(
                'title' => 'Nutro',
                'start_but' => 'Start'
            )
        ),
        'ru' => array(
            'settings' => array(
                'title' => 'Настройки',
                'header' => 'Настройки',
                'theme' => 'Тема',
                'lang' => 'Язык',
                'after' => 'После медитации',
                'about' => 'Информация о проекте',
                'logout' => 'Выйти из аккаунта'
            ),
            'about' => array(
                'title' => 'Информация о проекте',
                'header' => 'Информация о проекте',
                'information' => 'Cras euismod sem diam, sit amet pulvinar urna sodales non. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas pretium et neque non convallis. Etiam nec lectus ligula. Sed imperdiet enim in lacinia posuere. Aenean sagittis laoreet nunc sed ullamcorper. Aliquam id ex sit amet felis laoreet eleifend. Donec nec quam sodales, faucibus neque a, gravida mi. Aliquam porta purus nec nibh fringilla convallis a at orci. Vivamus pulvinar accumsan arcu, sit amet feugiat ipsum fringilla at.'
            ),
            'signin' => array(
                'title' => 'Авторизация',
                'header' => 'Войти',
                'common' => 'Войти с помощью эл. почты',
                'facebook' => 'Войти с помощью Facebook',
                'google' => 'Войти с помощью Google'
            ),
            'login' => array(
                'title' => 'Авторизация',
                'header' => 'Войти',
                'email' => 'Адрес эл. почты',
                'pass' => 'Пароль',
                'submit' => 'ОК',
                'signup' => 'Зарегистрироваться'
            ),
            'signup' => array(
                'title' => 'Регистрация',
                'header' => 'Регистрация',
                'email' => 'Адрес эл. почты',
                'pass' => 'Пароль',
                'submit' => 'Зарегистрироваться',
                'errors' => array(
                    'user_exist' => 'Пользователь с указанным электронным адресом уже существует',
                    'email_not_valid' => 'Указанный Вами электронный адрес - не корректен',
                    'password_not_valid' => 'Пароль не может быть короче 8 символов и длиннее 32, так же пароль не может содержать в себе символы: ~, !, ?, <, >, *, /, |, \, {, }, [, ], (, ), %, $, &, @, #, :, ;, _, -, +, = - а так же различные кавычки, точки и запятые',
                    'password_too_short' => 'Указанный Вами пароль слишком короткий',
                    'password_too_long' =>  'Указанный Вами пароль слишком длинный',
                )
            ),
            'mainpage' => array(
                'title' => 'Nutro',
                'start_but' => 'Начать'
            )
        )
    );