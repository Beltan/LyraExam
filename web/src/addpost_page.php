<link rel="stylesheet" type="text/css" href="css/addpost_style.css">

<div>
  <form action="/index.php?form=addpost_form" method="post">
    <label for="user_reply">Reply to</label>
    <select id="user_reply" name="user_reply">

        <option value="-1">None</option>

        <?php

        require_once('db.php');

        $users = get_users();

        // print all the users as options
        while($user = $users->fetch_assoc()) {
            echo strtr('<option value="id">user</option>', $user);
        }

        ?>

    </select>

    <label for="post_content">Post content</label>
    <textarea id="post_content" name="post_content">Text...</textarea>

    <input type="submit" value="Submit">
  </form>
</div>