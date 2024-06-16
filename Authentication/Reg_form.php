<?php
require_once "../includes/config_session.inc.php";
require_once "../includes/views/reg_view.inc.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../css/reg-form.css" />
  <link rel="stylesheet" href="../css/message.css" />
  <title>Registration</title>
</head>

<body>
  <div class="navbar">
    <ul>
      <li><a href="../index.html">Home</a></li>
      <li><a href="">Guest-view</a></li>
      <li><a href="">About us</a></li>
    </ul>
  </div>
  <br /><br /><br /><br />
  <div class="reg-form">
    <form action="../includes/registration.inc.php" method="post">
      <h1>User registration</h1>
      <hr />
      <br />
      <br />
      <input type="text" name="fname" placeholder="First name" />
      <input type="text" name="lname" placeholder="Last name" />
      <br /><br />
      <input type="text" name="username" placeholder="User-name" />
      <input type="email" name="email" placeholder="eg: example@gmail.com" />
      <br /><br />
      <input type="password" name="pwd" placeholder="Password" />
      <input type="password" name="conf_pwd" placeholder="Confirm password" />
      <br /><br />
      <input type="tel" name="phone" placeholder="Phone number" />
      <input type="text" name="address" placeholder="Physical address" />
      <br /><br />
      <div class="divdrop">
        <select name="user_type" class="dropbox">
          <option value="">Registering as:</option>
          <option value="tenant">Tenant</option>
          <option value="landlord">Landlord</option>
          <option value="other">Other</option>
        </select>
      </div>
      <br /><br />
      <?php
      display_errors()
      ?>
      <button type="submit">Register</button><br />
      <br />
      <p>
        <span>You have an account already? login here</span>
        <a href="./Login.php">Login</a>
      </p>
    </form>
  </div>
</body>

</html>