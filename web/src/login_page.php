<link rel="stylesheet" type="text/css" href="css/login_style.css">

<form action="/index.php?form=login_form" method="post">
<div class="imgcontainer">
    <img src="img/img_avatar2.png" alt="Avatar" class="avatar">
</div>

<div class="container">
    <label for="uname"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="uname" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>
        
    <button type="submit">Login</button>
</div>

<div class="container" style="background-color:#f1f1f1">
    <button type="button" class="cancelbtn">Cancel</button>
</div>
</form>