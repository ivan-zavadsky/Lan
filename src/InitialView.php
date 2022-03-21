<?php

namespace Ivan\Lan;

class InitialView
{
    public static function render()
    {
        echo $view = '
            <html>
            <head>
                <meta charset="UTF-8">
                <meta name="viewport"
                      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
                <meta http-equiv="X-UA-Compatible" content="ie=edge">
                <title>Document</title>
                <script type="text/javascript" src="../script.js"></script>
                <style>
                    .margined {margin-left: 20px;}
                    .margined2 {margin-left: 40px;}
                </style>
            </head>
            <body>
                <h1>Пользователь ЭБС Лань</h1>
                <form action="#" method="post">
                    Введите токен:
                    <input type="text" id="load" name="token"/>
                    <input type="button" id="button" value="Загрузить"/>
                </form>
                <div id="journals-loader">
                    <img src="../load-loading.gif" alt="" width="100px" height="100px">
                </div>
                <div id="journals">
                </div>
<!--                <div id="issues" style="margin-left: 20px;"> -->
                </div>
            </body>
            </html>
';
    }
}