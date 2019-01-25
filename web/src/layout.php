<?php

function echo_header() {
    ?>

    <!DOCTYPE html>
    <html>
    <head>
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
    <body>

    <div id="content">

    <?php
}


function echo_footer() {
    ?>

    </div>

    </body>
    </html>

    <?php
}

function echo_bar() {
  ?>

    <link rel="stylesheet" type="text/css" href="css/nav_style.css">

    <div class="topnav" id="myTopnav">
        <a href="/index.php?route=posts_page">Posts</a>
        <a href="/index.php?route=addpost_page">Add post</a>
    </div>

  <?php
}

?>