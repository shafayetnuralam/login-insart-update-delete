<?php
require_once("auth.php");
include("db.php"); ?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  font-family: Arial, Helvetica, sans-serif;
  background-color: black;
}

* {
  box-sizing: border-box;
}

/* Add padding to containers */
.container {
  padding: 16px;
  background-color: white;
}

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

/* Overwrite default styles of hr */
hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}

/* Set a style for the submit button */
.registerbtn {
  background-color: #04AA6D;
  color: white;
  padding: 16px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

.registerbtn:hover {
  opacity: 1;
}

/* Add a blue text color to links */
a {
  color: dodgerblue;
}

/* Set a grey background color and center the text of the "sign in" section */
.signin {
  background-color: #f1f1f1;
  text-align: center;
}


table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
</head>
<body>

<form action="action_user.php" method="post">
  <div class="container">
    <h1>Register (<?php if(!empty($_GET['msg']) && $_GET['msg'] =='duplicate'){ print "Sorry Duplicate Entry !!!"; } if(!empty($_GET['msg']) && $_GET['msg']=='success'){ print "User Successfully Added !!!"; } ?>)</h1>
    <p>Please fill in this form to create an account.</p>
    <label for="User"><b>User</b></label>
    <input type="text" placeholder="Enter User id" name="user" id="user" value="<?php if(!empty($_GET['user'])){ print $_GET['user']; }?>" required>
    <label for="Password"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" id="password" value="<?php if(!empty($_GET['user'])){ print $_GET['password']; }?>"  required>
    <button type="submit" class="registerbtn">Register</button>
  </div>
  
  <div class="container signin">

    <p>Go To home <a href="home.php">Go Back</a>.</p>
    
    <p>Already have an account? <a href="index.php">Sign in</a>.</p>
  </div>
</form>

<div class="container">
    
<h2>User List</h2>

<table>
<tr>
    <th>User Id</th>
    <th>User</th>
    <th>Password</th>
  </tr>
<?php
$query = $conn->prepare("SELECT * FROM `operator`  ORDER BY `user` ASC "); 
$query->execute();
$fetch_brand = $query->fetchAll(PDO::FETCH_ASSOC);
foreach($fetch_brand AS $fetch) {
?>
<tr>
    <td><?php print $fetch['id']; ?></td>
    <td><?php print $fetch['user']; ?></td>
    <td><?php print $fetch['decrypt_password']; ?></td>

  <?php
}
?><tr>

  </tr>
  
</table>
</body>
</html>
