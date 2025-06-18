<?php
include 'components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};

if(isset($_POST['submit'])){

   $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);
   $email = $_POST['email'];
   $email = filter_var($email, FILTER_SANITIZE_STRING);
   $pass = sha1($_POST['pass']);
   $pass = filter_var($pass, FILTER_SANITIZE_STRING);
   $cpass = sha1($_POST['cpass']);
   $cpass = filter_var($cpass, FILTER_SANITIZE_STRING);

   $select_user = $conn->prepare("SELECT * FROM `users` WHERE email = ?");
   $select_user->execute([$email]);
   $row = $select_user->fetch(PDO::FETCH_ASSOC);

   if($select_user->rowCount() > 0){
      $message[] = 'email already exists!';
   }else{
      if($pass != $cpass){
         $message[] = 'confirm password not matched!';
      }else{
         $insert_user = $conn->prepare("INSERT INTO `users`(name, email, password) VALUES(?,?,?)");
         $insert_user->execute([$name, $email, $cpass]);
         $message[] = 'registered successfully, login now please!';
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
   <title>Register</title>
   
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
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

      .form-container form .btn,
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
         color: #fff;
         transition: background 0.3s;
         display: inline-block;
         text-align: center;
         text-decoration: none;
         width: 100%;
         margin-bottom: 10px;
      }

      .form-container form .btn:hover,
      .form-container form .option-btn:hover {
         background-color: #2980b9;
      }

      .form-container p {
         text-align: center;
         font-size: 14px;
         margin-top: 10px;
      }
   </style>
</head>
<body>
   
<?php include 'components/user_header.php'; ?>

<section class="form-container">

   <form action="" method="post" onsubmit="return validateForm();">
      <h3>Registration</h3>

      <label for="name">Username:</label>
      <input type="text" id="name" name="name" required placeholder="Enter your username" maxlength="20" class="box">

      <label for="email">Email:</label>
      <input type="email" id="email" name="email" required placeholder="Enter your email" maxlength="50" class="box" oninput="this.value = this.value.replace(/\s/g, '')">

      <label for="pass">Password:</label>
      <input type="password" id="pass" name="pass" required placeholder="Enter your password" maxlength="20" class="box" oninput="this.value = this.value.replace(/\s/g, '')">

      <label for="cpass">Confirm Password:</label>
      <input type="password" id="cpass" name="cpass" required placeholder="Confirm your password" maxlength="20" class="box" oninput="this.value = this.value.replace(/\s/g, '')">

      <input type="submit" value="Register Now" class="btn" name="submit">

      <p>Already have an account?</p>
      <a href="user_login.php" class="option-btn">Login Now</a>
   </form>

</section>

<?php include 'components/footer.php'; ?>

<script src="js/script.js"></script>

<script>
function validateForm() {
   const name = document.getElementById('name').value.trim();
   const email = document.getElementById('email').value.trim();
   const pass = document.getElementById('pass').value;
   const cpass = document.getElementById('cpass').value;

   const emailPattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/i;
   const passPattern = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{6,}$/;

   if(name === '') {
      alert('Username cannot be empty!');
      return false;
   }

   if(!emailPattern.test(email)) {
      alert('Please enter a valid email address!');
      return false;
   }

   if(!passPattern.test(pass)) {
      alert('Password must be at least 6 characters long and include both letters and numbers!');
      return false;
   }

   if(pass !== cpass) {
      alert('Passwords do not match!');
      return false;
   }

   return true;
}
</script>

</body>
</html>
