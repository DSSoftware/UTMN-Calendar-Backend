<style>
    html {
        font-family: system-ui;
    }

    .centerdiv {

    }

    .container{
        display: flex;
        width: 100%;
        height: 100%;
        padding: 0;
        margin: 0;
        position: absolute;
        top: 0;
        left: 0;
        align-items: center;
        justify-content: center;
    }
</style>

<div class="container">
    <div class="centerdiv">
        <h1>Вход в Google</h1>
        <p>В случае успешной привязки ты получишь уведомление в Telegram.</p>
        <a href="https://t.me/UTMNModeusBot">Перейти в бота</a>
    </div>
</div>

<?php

require_once 'config.php';
require_once 'database.php';

$db = new database($database);

if ($_GET['code'] != null && $_GET['state'] != null) {
    $db->saveGoogleCode($_GET['code'], $_GET['state']);
}
