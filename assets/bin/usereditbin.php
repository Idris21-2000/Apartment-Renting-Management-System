<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="reg-form">
        <form action="" method="post">
            <input type="hidden" value="<?php echo $results['id'] ?>">
            <h1>Tenant registration</h1>
            <hr />
            <br />
            <br />
            <input type="text" name="fname" placeholder="First name" value="<?php echo $selected_row['fname'] ?>" />
            <input type="text" name="lname" placeholder="Last name" value="<?php echo $selected_row['lname'] ?>" />
            <br /><br />
            <input type="text" name="username" placeholder="User-name" value="<?php echo $selected_row['username'] ?>" />
            <input type="email" name="email" placeholder="eg: example@gmail.com" value="<?php echo $selected_row['email'] ?>" />
            <br /><br />
            <input type="password" name="pwd" placeholder="Password" value="<?php echo $selected_row['pwd'] ?>" />
            <input type="password" name="conf_pwd" placeholder="Confirm password" value="<?php echo $selected_row['conf_pwd'] ?>" />
            <br /><br />
            <input type="tel" name="phone" placeholder="Phone number" value="<?php echo $selected_row['phone'] ?>" />
            <input type="text" name="address" placeholder="Physical address" value="<?php echo $selected_row['address'] ?>" />
            <br /><br />
            <input type="text" name="user_type" placeholder="Enter type of the user" value="<?php echo $selected_row['user_type'] ?>" /><br><br>
            <button type="submit">Edit</button>
        </form>
</body>