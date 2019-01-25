<?php

$conn = NULL;

function connect_db() {
    global $conn;
    $servername = "mariadb";
    $username = "testuser";
    $password = "testpassword";
    $db = "testdb";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $db);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
}

function close_db() {
    global $conn;
    $conn->close(); 
}

function login($usr, $psw) {

    global $conn;

    $ret = true;
    
    $sql = strtr("SELECT * FROM User WHERE user = '$usr'",
        array("$usr" => $usr));

    if ($result = $conn->query($sql)) {

        if($result->num_rows > 0) {
            $db_usr = $result->fetch_object();

            if(password_verify($psw, $db_usr->psw)) {
                $_SESSION['user'] = $db_usr->id;
            }
            else $ret = false;
        }
        else {
            $ret = register($usr, $psw);
        }

        $result->close();
    }
    else {
        $ret = false;
    }
    return $ret;
}

function register($usr, $psw) {

    global $conn;

    $sql = strtr("INSERT INTO User(user, psw) VALUES ('$usr', '$psw')", 
        array("$usr" => $usr, "$psw" => password_hash($psw, PASSWORD_DEFAULT)));


    if (mysqli_query($conn, $sql)) {
        $_SESSION['user'] = $db_usr->id;
        return true;
    } 
    else {
        return false;
    }
    
}

function get_users() {

    global $conn;

    $ret = true;
    
    $sql = "SELECT * FROM User";

    if ($result = $conn->query($sql)) {
        return $result;
    }
    
    return "ERROR";

}

function add_post($user, $time, $content, $user_reply = null) {

    global $conn;

    $sql = "INSERT INTO Post (id_user, id_user_reply, content, date)
    VALUES ( '" . $user . "','" . $user_reply . "','"  . $content . "','" . $time . "') ";    

    if (mysqli_query($conn, $sql)) {
        return true;
    } 
    else {
        return false;
    }

}

function get_posts() {
    global $conn;

    $ret = true;
    
    $sql = "SELECT * FROM Post ORDER BY date desc LIMIT 10";

    if ($result = $conn->query($sql)) {
        return $result;
    }
    
    return "ERROR";
}

function get_posts_filter() {
  global $conn;

  $ret = true;
  
  $sql = "SELECT * FROM Post WHERE '".$_SESSION["user"]."' = id_user OR '".$_SESSION["user"]."' = id_user_reply ORDER BY date desc LIMIT 10";

  if ($result = $conn->query($sql)) {
      return $result;
  }
  
  return "ERROR";
}

?>