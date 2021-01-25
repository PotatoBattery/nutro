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
                'signup' => 'Register now',
                'errors' => array(
                    'wrong_password' => 'Invalid password entered',
                    'user_not_active' => 'Account not activated',
                    'user_not_exist' => 'The specified user is missing from the system',
                ),
                'forgot_password' => 'Забыли пароль?'
            ),
            'signup' => array(
                'title' => 'Registration',
                'header' => 'Registration',
                'email' => 'Email',
                'pass' => 'Password',
                'submit' => 'Register now',
                'success' => 'ОК',
                'errors' => array(
                    'user_exist' => 'The user with the specified email address already exists',
                    'email_not_valid' => 'The email address you provided is not correct',
                    'password_too_short' => 'The password you specified is too short, the minimum password length is 8 characters',
                    'password_too_long' =>  'The password you specified is too long, the maximum password length is 32 characters',
                ),
                'for_email' => array(
                    'theme' => 'Registration on Nutro.ru',
                    'message' => "You have just registered on Nutro.ru!\nTo activate your profile, follow the following link: http://nutro.local/signup/signup_end.php?profile=%s.\nIf the letter did not arrive, check your Spam folder, or wait a bit.This letter is generated automatically, do not reply to it.",
                    'from' => 'From: nutro.ru@gmail.com'
                ),
                'signin' => 'Come in',
                'signup_message' => 'We have sent you a letter to confirm registration by mail',
                'signip_end_message' => 'Profile activation completed successfully, enjoy your meditations!'
            ),
            'mainpage' => array(
                'title' => 'Nutro',
                'start_but' => 'Start'
            ),
            'profile' => array(
                'title' => 'Profile',
                'start_but' => 'Profile',
                'firstname' => 'Name',
                'lastname' => 'Surname',
                'email' => 'Email',
                'ch_password' => 'Change password',
                'logout' => 'Logout',
                'errors' => array(
                    'user_exist' => 'The user with the specified email address already exists',
                    'email_not_valid' => 'The email address you provided is not correct',
                ),
            ),
            'change_password' => array(
                'title' => 'Change Password',
                'header' => 'Change Password',
                'pass' => 'Password',
                'confirm_pass' => 'Confirm password',
                'submit' => 'Change',
                'errors' => array(
                    'passwords_not_equal' => 'The passwords you specified do not match',
                    'password_too_short' => 'The password you specified is too short, the minimum password length is 8 characters',
                    'password_too_long' =>  'The password you specified is too long, the maximum password length is 32 characters',
                ),
                'for_email' => array(
                    'theme' => 'Password change on Nutro.ru',
                    'message' => "You just changed your password on Nutro.ru!\nIn order to avoid mistakes and various troubles, your profile was blocked, to reactivate after changing your password - follow the link: http://nutro.local/change_password/reactivate.php?profile=%s.\nIf it was not you, then we ask you to contact the site administration by mail nutro.ru@gmail.com.\nIf the letter did not arrive, check your Spam folder, or wait a bit.This letter is generated automatically, please do not reply to it.\nBest regards, Nutro.ru team, enjoy your meditations.",
                    'from' => 'From: nutro.ru@gmail.com'
                ),
                'change_password_message' => 'We have sent a letter to complete the procedure for changing your password by email',
                'signip_end_message' => 'Reactivation of the profile has been successfully completed, enjoy your meditations!',
                'signin' => 'Сome in'
            ),
            'forgot_password' => array(
                'title' => 'Password reset',
                'header' => 'Password reset',
                'email' => 'Email',
                'pass' => 'Password',
                'confirm_pass' => 'Confirm password',
                'submit' => 'Reset',
                'errors' => array(
                    'user_not_exist' => 'The user with the specified email address is not logged in',
                    'passwords_not_equal' => 'The passwords you specified do not match',
                    'password_too_short' => 'The password you specified is too short, the minimum password length is 8 characters',
                    'password_too_long' =>  'The password you specified is too long, the maximum password length is 32 characters',
                ),
                'for_email' => array(
                    'theme' => 'Password reset on Nutro.ru',
                    'message' => "You have just reset your password on Nutro.ru!\nIn order to avoid errors and various troubles, your profile was blocked, in order to reactivate after resetting your password - follow the link: http://nutro.local/forgot_password/reactivate.php?profile=%s.\nIf it was not you, then we ask you to contact the site administration by mail nutro.ru@gmail.com.\nIf the letter did not arrive, check your Spam folder, or wait a bit.\nThis letter is generated automatically, please do not reply to it.\nBest regards, Nutro.ru team, enjoy your meditations.",
                    'from' => 'From: nutro.ru@gmail.com'
                ),
                'change_password_message' => 'We have sent an email to complete the password reset procedure.',
                'signip_end_message' => 'Reactivation of the profile has been successfully completed, enjoy your meditations!',
                'signin' => 'Сome in'
            ),
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
                'signup' => 'Зарегистрироваться',
                'errors' => array(
                    'wrong_password' => 'Указан неверный пароль',
                    'user_not_active' => 'Учетная запись не активирована',
                    'user_not_exist' => 'Указанный пользователь отсутствует в системе',
                ),
                'forgot_password' => 'Забыли пароль?'
            ),
            'signup' => array(
                'title' => 'Регистрация',
                'header' => 'Регистрация',
                'email' => 'Адрес эл. почты',
                'pass' => 'Пароль',
                'submit' => 'Зарегистрироваться',
                'success' => 'ОК',
                'errors' => array(
                    'user_exist' => 'Пользователь с указанным электронным адресом уже существует',
                    'email_not_valid' => 'Указанный Вами электронный адрес - не корректен',
                    'password_too_short' => 'Указанный Вами пароль слишком короткий, минимальная длина пароля - 8 символов',
                    'password_too_long' =>  'Указанный Вами пароль слишком длинный, максимальная длина пароля - 32 символа',
                ),
                'for_email' => array(
                    'theme' => 'Регистрация на сайте Nutro.ru',
                    'message' => "Вы только что зарегистрировались на сайте Nutro.ru!\nДля активации Вашего профиля перейдите по следующей ссылке: http://nutro.local/signup/signup_end.php?profile=%s.\nЕсли письмо не пришло проверьте папку «Спам», или подождите немного.\nЭто письмо сформировано автоматически, не отвечайте на него.",
                    'from' => 'From: nutro.ru@gmail.com'
                ),
                'signin' => 'Войти',
                'signup_message' => 'Мы выслали Вам письмо для подтверждения регистрации на почту',
                'signip_end_message' => 'Активация профиля успешно завершена, приятных Вам медитаций!'
            ),
            'mainpage' => array(
                'title' => 'Nutro',
                'start_but' => 'Начать'
            ),
            'profile' => array(
                'title' => 'Личный кабинет',
                'header' => 'Личный кабинет',
                'firstname' => 'Имя',
                'lastname' => 'Фамилия',
                'email' => 'Эл. почта',
                'ch_password' => 'Сменить пароль',
                'logout' => 'Выйти из аккаунта',
                'errors' => array(
                    'user_exist' => 'Пользователь с указанным электронным адресом уже существует',
                    'email_not_valid' => 'Указанный Вами электронный адрес - не корректен',
                ),
            ),
            'change_password' => array(
                'title' => 'Смена пароля',
                'header' => 'Смена пароля',
                'pass' => 'Пароль',
                'confirm_pass' => 'Подтвердите пароль',
                'submit' => 'Изменить',
                'errors' => array(
                    'passwords_not_equal' => 'Указанные Вами пароли не совпадают',
                    'password_too_short' => 'Указанный Вами пароль слишком короткий, минимальная длина пароля - 8 символов',
                    'password_too_long' =>  'Указанный Вами пароль слишком длинный, максимальная длина пароля - 32 символа',
                ),
                'for_email' => array(
                    'theme' => 'Смена пароля на сайте Nutro.ru',
                    'message' => "Вы только что изменили пароль на сайте Nutro.ru!\nВо избежание ошибок и различных неурядиц Ваш профиль был заблокирован, чтобы провести повторную активацию после смены пароля - перейдите по ссылке: http://nutro.local/change_password/reactivate.php?profile=%s.\nЕсли это были не Вы, то просим Вас связаться с администрацией сайта по почте nutro.ru@gmail.com.\nЕсли письмо не пришло проверьте папку «Спам», или подождите немного.\nДанное письмо сформировано автоматически, просим Вас не отвечать на него.\nС уважением команда сайта Nutro.ru, приятных медитаций.",
                    'from' => 'From: nutro.ru@gmail.com'
                ),
                'change_password_message' => 'Мы выслали письмо для окончания процедуры смены пароля Вам на почту',
                'signip_end_message' => 'Повторная активация профиля успешно завершена, приятных Вам медитаций!',
                'signin' => 'Войти'
            ),
            'forgot_password' => array(
                'title' => 'Сброс пароля',
                'header' => 'Сброс пароля',
                'email' => 'Эл. почта',
                'pass' => 'Пароль',
                'confirm_pass' => 'Подтвердите пароль',
                'submit' => 'Сбросить',
                'errors' => array(
                    'user_not_exist' => 'Пользователь с указанным электронным адресом отсутствует в системе',
                    'passwords_not_equal' => 'Указанные Вами пароли не совпадают',
                    'password_too_short' => 'Указанный Вами пароль слишком короткий, минимальная длина пароля - 8 символов',
                    'password_too_long' =>  'Указанный Вами пароль слишком длинный, максимальная длина пароля - 32 символа',
                ),
                'for_email' => array(
                    'theme' => 'Сброс пароля на сайте Nutro.ru',
                    'message' => "Вы только что сбросили пароль на сайте Nutro.ru!\nВо избежание ошибок и различных неурядиц Ваш профиль был заблокирован, чтобы провести повторную активацию после сброса пароля - перейдите по ссылке: http://nutro.local/forgot_password/reactivate.php?profile=%s.\nЕсли это были не Вы, то просим Вас связаться с администрацией сайта по почте nutro.ru@gmail.com.\nЕсли письмо не пришло проверьте папку «Спам», или подождите немного.\nДанное письмо сформировано автоматически, просим Вас не отвечать на него.\nС уважением команда сайта Nutro.ru, приятных медитаций.",
                    'from' => 'From: nutro.ru@gmail.com'
                ),
                'change_password_message' => 'Мы выслали Вам письмо для окончания процедуры сброса пароля Вам на почту',
                'signip_end_message' => 'Повторная активация профиля успешно завершена, приятных Вам медитаций!',
                'signin' => 'Войти'
            ),
        )
    );