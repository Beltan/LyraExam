<link rel="stylesheet" type="text/css" href="css/page_style.css">

<?php 

require_once("db.php");

function print_container($data) {
  ?>
    <div class="container">
      <img src="/img/img_avatar2.png" alt="Avatar">
      <?php echo strtr('<p>content</p>', $data) ?>
      <?php echo strtr('<span class="time-right">date</span>', $data); ?>
    </div>
  <?php
}

function print_container_user($data) {
  ?>
    <div class="container darker">
      <img src="/img/img_avatar2.png" class="right" alt="Avatar">
      <?php echo strtr('<p>content</p>', $data) ?>
      <?php echo strtr('<span class="time-left">date</span>', $data); ?>
    </div>
  <?php
}

function print_messages($data) {
  while($post = $data->fetch_assoc()) {

    if($_SESSION['user'] == $post["id_user"]) {
      print_container_user($post);
    }
    else {
      print_container($post);
    }
    
  }
}

if ($_SESSION["toggle"]) {
  $posts = get_posts_filter();
} else {
  $posts = get_posts();
}

print_messages($posts);

?>

<form action="/index.php?form=filter_form" method="post">
  <button name="button" id="button">Filter messages</button>
</form>

<script>
  function update() {
    var http_request = null;
    if (window.XMLHttpRequest) {
      http_request = new XMLHttpRequest();
    } else if (window.ActiveXObject) {
      http_request = new ActiveXObject("Microsoft.XMLHTTP");
    }
    http_request.onreadystatechange = function(){
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("content").innerHTML = this.responseText;
      }
    };
    http_request.open("POST", '/index.php?ajax=update_posts', true);
    http_request.send();
  }

  function request() {
    setInterval(update, 5000);
  }

  request();
</script>