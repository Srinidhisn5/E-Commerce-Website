<?php

include '../components/connect.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:admin_login.php');
}

if(isset($_POST['submit'])){

   $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);
   $pass = sha1($_POST['pass']);
   $pass = filter_var($pass, FILTER_SANITIZE_STRING);
   $cpass = sha1($_POST['cpass']);
   $cpass = filter_var($cpass, FILTER_SANITIZE_STRING);

   $select_admin = $conn->prepare("SELECT * FROM `admins` WHERE name = ?");
   $select_admin->execute([$name]);

   if($select_admin->rowCount() > 0){
      $message[] = 'username already exist!';
   }else{
      if($pass != $cpass){
         $message[] = 'confirm password not matched!';
      }else{
         $insert_admin = $conn->prepare("INSERT INTO `admins`(name, password) VALUES(?,?)");
         $insert_admin->execute([$name, $cpass]);
         $message[] = 'new admin registered successfully!';
      }
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Register Admin</title>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
   <link rel="stylesheet" href="../css/admin_style.css">

   <style>
      body {
         font-family: 'Times New Roman', Times, serif;
      }

      .form-container form {
         max-width: 500px;
         margin: 0 auto;
         padding: 2rem;
         background: #fff;
         box-shadow: 0 0 10px rgba(0,0,0,0.1);
      }

      .form-container h3 {
         text-align: center;
         margin-bottom: 2rem;
         font-family: 'Times New Roman', Times, serif;
      }

      .form-group {
         display: flex;
         align-items: center;
         margin-bottom: 1.5rem;
      }

      .form-group label {
         width: 160px;
         font-size: 1.5rem;
         font-family: 'Times New Roman', Times, serif;
      }

      .form-group input {
         flex: 1;
      }

      .box {
         width: 100%;
         padding: 0.8rem;
         border: 1px solid #ccc;
         font-family: 'Times New Roman', Times, serif;
      }

      .btn {
         display: block;
         width: 100%;
         padding: 0.8rem;
         background: #333;
         color: #fff;
         text-align: center;
         border: none;
         border-radius: 0.4rem;
         font-size: 1.5rem;
         cursor: pointer;
         font-family: 'Times New Roman', Times, serif;
      }

      .btn:hover {
         background: #555;
      }
   </style>
</head>
<body>

<?php include '../components/admin_header.php'; ?>

<section class="form-container">

   <form action="" method="post">
      <h3>Register Now</h3>

      <div class="form-group">
         <label for="name">Username:</label>
         <input type="text" id="name" name="name" required placeholder="Enter your username" maxlength="20" class="box" oninput="this.value = this.value.replace(/\s/g, '')">
      </div>

      <div class="form-group">
         <label for="pass">Password:</label>
         <input type="password" id="pass" name="pass" required placeholder="Enter your password" maxlength="20" class="box" oninput="this.value = this.value.replace(/\s/g, '')">
      </div>

      <div class="form-group">
         <label for="cpass">Confirm Password:</label>
         <input type="password" id="cpass" name="cpass" required placeholder="Confirm your password" maxlength="20" class="box" oninput="this.value = this.value.replace(/\s/g, '')">
      </div>

      <input type="submit" value="Register Now" class="btn" name="submit">
   </form>

</section>

<script src="../js/admin_script.js"></script>

</body>
</html>
