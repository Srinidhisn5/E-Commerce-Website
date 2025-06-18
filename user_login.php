<?php

include 'components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};

if(isset($_POST['submit'])){

   $email = $_POST['email'];
   $email = filter_var($email, FILTER_SANITIZE_STRING);
   $pass = sha1($_POST['pass']);
   $pass = filter_var($pass, FILTER_SANITIZE_STRING);

   $select_user = $conn->prepare("SELECT * FROM `users` WHERE email = ? AND password = ?");
   $select_user->execute([$email, $pass]);
   $row = $select_user->fetch(PDO::FETCH_ASSOC);

   if($select_user->rowCount() > 0){
      $_SESSION['user_id'] = $row['id'];
      header('location:home.php');
   }else{
      $message[] = 'incorrect username or password!';
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
   
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

   <style>
      body {
         font-family: "Times New Roman", Times, serif;
      }

      .form-container {
         max-width: 350px;
         margin: 30px auto;
         padding: 20px;
         border: 1px solid #ccc;
         border-radius: 0px;
         background-color: #f9f9f9;
         font-family: "Times New Roman", Times, serif;
      }

      .form-container h3 {
         text-align: center;
         margin-bottom: 20px;
         font-family: "Times New Roman", Times, serif !important;
      }

      .form-container form label {
         font-weight: bold;
         font-size: 15px;
         margin-top: 10px;
         display: block;
         color: #333;
         text-align: left;
         font-family: "Times New Roman", Times, serif;
      }

      .form-container form .box {
         width: 100%;
         padding: 8px 10px;
         margin: 5px 0 15px 0;
         border: 1px solid #ccc;
         border-radius: 0px;
         font-family: "Times New Roman", Times, serif;
         font-size: 14px;
      }

      .form-container form .btn {
         padding: 10px;
         border-radius: 0px;
         font-size: 14px;
         font-weight: bold;
         font-family: "Times New Roman", Times, serif;
         text-transform: capitalize;
         cursor: pointer;
         border: none;
         background-color: #3498db;
         color: white;
         transition: background 0.3s;
         display: inline-block;
         text-align: center;
         text-decoration: none;
         width: 100%;
         margin-top: 10px;
      }

      .form-container form .btn:hover {
         background-color: #2980b9;
      }

      .form-container form .option-btn {
         padding: 10px;
         border-radius: 0px;
         font-size: 14px;
         font-weight: bold;
         font-family: "Times New Roman", Times, serif;
         text-transform: capitalize;
         cursor: pointer;
         border: none;
         background-color: #3498db;
         color: white;
         transition: background 0.3s;
         display: inline-block;
         text-align: center;
         text-decoration: none;
         width: 100%;
         margin-top: 5px;
      }

      .form-container form .option-btn:hover {
         background-color: #2980b9;
      }

      .form-container p {
         text-align: center;
         font-size: 14px;
         margin-top: 10px;
         font-family: "Times New Roman", Times, serif;
      }
   </style>
</head>
<body>
   
<?php include 'components/user_header.php'; ?>

<section class="form-container">

   <form action="" method="post">
      <h3>Login</h3>

      <label for="email">Email:</label>
      <input type="email" id="email" name="email" required placeholder="enter your email" maxlength="50"  class="box" oninput="this.value = this.value.replace(/\s/g, '')">

      <label for="pass">Password:</label>
      <input type="password" id="pass" name="pass" required placeholder="enter your password" maxlength="20"  class="box" oninput="this.value = this.value.replace(/\s/g, '')">

      <input type="submit" value="login now" class="btn" name="submit">

      <p>Don't have an account?</p>
      <a href="user_register.php" class="option-btn">Register Now.</a>
   </form>

</section>

<?php include 'components/footer.php'; ?>

<script src="js/script.js"></script>

</body>
</html>
