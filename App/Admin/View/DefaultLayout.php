<!DOCTYPE html>
<html lang="en">
<head>
    <script src="/phpframework/static/js/jquery 3.5.1/jquery-3.5.1.js"></script>
    <script src="/phpframework/static/js/bootstrap 4.5.2/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="/phpframework/static/css/bootstrap 4.5.2/bootstrap.min.css">
</head>

<body>


<div id="topheader">
  <nav class="topnav">
		<div class="container-fluid">
            <a class="<?php if ($_SERVER['REQUEST_URI'] == "/phpframework/{$type}/dashboard") echo 'active' ?>" href="/phpframework/<?php echo $type ?>/dashboard">Dashboard</a>
            <a class="<?php if ($_SERVER['REQUEST_URI'] == "/phpframework/{$type}/account/login") echo 'active' ?>" href="/phpframework/<?php echo $type ?>/account/login">Login</a>
            <a class="<?php if ($_SERVER['REQUEST_URI'] == "/phpframework/{$type}/account/signup") echo 'active' ?>" href="/phpframework/<?php echo $type ?>/account/signup">Signup</a>
            <a class="<?php if ($_SERVER['REQUEST_URI'] == "/phpframework/{$type}/account/logout") echo 'active' ?>" href="/phpframework/<?php echo $type ?>/account/logout">Logout</a>
		</div>
  </nav>
</div>

<style>

/* Add a black background color to the top navigation */
.topnav {
  background-color: #333;
  overflow: hidden;
}

/* Style the links inside the navigation bar */
.topnav a {
  float: left;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

/* Change the color of links on hover */
.topnav a:hover {
  background-color: #ddd;
  color: black;
}

/* Add a color to the active/current link */
.topnav a.active {
  background-color: #4CAF50;
  color: white;
}

.error_box {
  text-align:center;
  margin:5%;
  color:red;
  background-color: yellow;
  padding:2%;
  font-size: 21px;
  font-weight: bold;
  display:none;
}

.msg_box {
  text-align:center;
  margin:5%;
  color:red;
  background-color: yellow;
  padding:2%;
  font-size: 21px;
  font-weight: bold;
  display:none;
}

</style>

<div id="error_box" class="error_box" style=<?php if ($this->error!="") echo "display:block;" ?> > 
  <?php echo $this->error ?>
</div>

<div id="msg_box" class="msg_box" style=<?php if ($this->msg!="") echo "display:block;" ?> > 
  <?php echo $this->msg ?>
</div>

<script>
$(document).ready(function(){

})
</script>


</body>
</html>