<?php

require_once('db.php');

function login_form() {
    if(login($_POST['uname'], $_POST['psw'])) {
        $_SESSION['route'] = 'posts_page';
    }
}

function addpost_form() {
    $user_reply = $_POST["user_reply"]; // -1 if none selected
    $post_content = $_POST["post_content"];
    $time = date("y.m.d");
    $user = $_SESSION['user'];

    add_post($user, $time, $post_content, $user_reply);
}

function filter_form() {
    $_SESSION["toggle"] = !$_SESSION["toggle"];
}

?>