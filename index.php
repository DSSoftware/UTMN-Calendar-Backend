<style>
    html {
        font-family: system-ui;
    }

    .centerdiv {
        padding: 3%;
        width: fit-content;
        height: fit-content;

        border-radius: 5%;
        background-color: #ddd;
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

    .state{
        font-weight: bold;
    }
</style>

<div class="container">
    <div class="centerdiv">
        <h1>Вход в Google</h1>
        <span class="state" id="state">Проверяю ключ...</span>
        <p>Ты можешь закрыть это окно.</p>
        <a href="https://t.me/UTMNModeusBot">Перейти в бота</a>
    </div>
</div>

<script>
    function displayError(message){
        state.innerHTML = message;
        state.style.color = "#D22B2B";
    }

    function displaySuccess(message){
        state.innerHTML = message;
        state.style.color = "#228B22";
    }
</script>

<?php

require_once 'config.php';
require_once 'database.php';

$db = new database($database);

if ($_GET['code'] != null && $_GET['state'] != null) {
    $state_parts = explode("-", $_GET['state']);

    $state_user = $state_parts[0];
    $state_timestamp = $state_parts[1];
    $state_sign = $state_parts[2];

    if($state_timestamp < (time() - 5 * 60)){
        echo('<script>displayError("Время на подключение истекло.<br>Запроси новую ссылку.")</script>');
        die();
    }

    $correct_sign = hash("sha256", "{$state_user}-{$state_timestamp}-{$internal_key}");

    if($correct_sign != $state_sign){
        echo('<script>displayError("Неверный запрос.<br>Попробуй ещё раз.")</script>');
        die();
    }

    $db->saveGoogleCode($_GET['code'], $_GET['state_user']);
    echo('<script>displaySuccess("Ключ привязки будет проверен.<br>В случае успешной привязки ты получишь уведомление в Telegram.")</script>');
}
