<?php

include '../components/connect.php';

session_start();

if(isset($_POST['submit'])){

   $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);
   $pass = sha1($_POST['pass']);
   $pass = filter_var($pass, FILTER_SANITIZE_STRING);

   $select_admin = $conn->prepare("SELECT * FROM `admins` WHERE name = ? AND password = ?");
   $select_admin->execute([$name, $pass]);
   $row = $select_admin->fetch(PDO::FETCH_ASSOC);

   if($select_admin->rowCount() > 0){
      $_SESSION['admin_id'] = $row['id'];
      header('location:dashboard.php');
   }else{
      $message[] = 'Incorrect username or password!';
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Login</title>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
   <link rel="stylesheet" href="../css/admin_style.css">

   <style>
      body, input, button, h3, label, span {
         font-family: 'Times New Roman', serif;
      }

      label {
         display: block;
         margin-bottom: 6px;
         font-size: 1.5rem;
         font-weight: bold;
         text-align: left;
      }

      .box {
         width: 100%;
         padding: 10px;
         margin-bottom: 15px;
         border: 1px solid #ccc;
         font-size: 1.5rem;
      }

      .btn {
         background-color: #007BFF;
         color: white;
         padding: 10px 20px;
         border: none;
         cursor: pointer;
         font-size: 1.5rem;
         transition: background-color 0.3s ease;
      }

      .btn:hover {
         background-color: #0056b3;
      }

      .form-container form {
         max-width: 400px;
         margin: auto;
         padding: 2rem;
         background-color: #f9f9f9;
         box-shadow: 0 0 10px rgba(0,0,0,0.1);
      }

      .form-container h3 {
         margin-bottom: 1.5rem;
         text-align: center;
         font-size: 1.5rem;
      }

      .message {
         background: #f2dede;
         color: #a94442;
         padding: 10px 15px;
         margin: 10px auto;
         width: 90%;
         max-width: 400px;
         border: 1px solid #ebccd1;
         font-family: 'Times New Roman', serif;
         position: relative;
      }

      .message i {
         position: left;
         right: 15px;
         top: 10px;
         cursor: pointer;
      }
   </style>

</head>
<body>

<?php
   if(isset($message)){
      foreach($message as $message){
         echo '
         <div class="message">
            <span>'.$message.'</span>
            <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
         </div>
         ';
      }
   }
?>

<section class="form-container">

   <form action="" method="post">
      <h3>Login</h3>

      <label for="name">Username:</label>
      <input type="text" id="name" name="name" required placeholder="Enter your username" maxlength="20" class="box" oninput="this.value = this.value.replace(/\s/g, '')">

      <label for="pass">Password:</label>
      <input type="password" id="pass" name="pass" required placeholder="Enter your password" maxlength="20" class="box" oninput="this.value = this.value.replace(/\s/g, '')">

      <input type="submit" value="Login Now" class="btn" name="submit">
   </form>

</section>

</body>
</html>
