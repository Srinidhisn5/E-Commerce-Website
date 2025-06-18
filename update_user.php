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

   $update_profile = $conn->prepare("UPDATE `users` SET name = ?, email = ? WHERE id = ?");
   $update_profile->execute([$name, $email, $user_id]);

   $empty_pass = 'da39a3ee5e6b4b0d3255bfef95601890afd80709';
   $prev_pass = $_POST['prev_pass'];
   $old_pass = sha1($_POST['old_pass']);
   $old_pass = filter_var($old_pass, FILTER_SANITIZE_STRING);
   $new_pass = sha1($_POST['new_pass']);
   $new_pass = filter_var($new_pass, FILTER_SANITIZE_STRING);
   $cpass = sha1($_POST['cpass']);
   $cpass = filter_var($cpass, FILTER_SANITIZE_STRING);

   if($old_pass == $empty_pass){
      $message[] = 'please enter old password!';
   }elseif($old_pass != $prev_pass){
      $message[] = 'old password not matched!';
   }elseif($new_pass != $cpass){
      $message[] = 'confirm password not matched!';
   }else{
      if($new_pass != $empty_pass){
         $update_admin_pass = $conn->prepare("UPDATE `users` SET password = ? WHERE id = ?");
         $update_admin_pass->execute([$cpass, $user_id]);
         $message[] = 'password updated successfully!';
      }else{
         $message[] = 'please enter a new password!';
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
   <title>Update Profile</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

   <style>
      body {
         font-family: "Times New Roman", Times, serif;
      }

      .form-container {
         max-width: 400px;
         margin: 30px auto;
         padding: 20px;
         border: 1px solid #ccc;
         border-radius: 0px;
         background-color: #f9f9f9;
      }

      .form-container h3 {
         text-align: center;
         margin-bottom: 20px;
         font-family: "Times New Roman", Times, serif;
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
         color: #fff;
         transition: background 0.3s;
         display: inline-block;
         text-align: center;
         text-decoration: none;
         width: 100%;
         margin-bottom: 10px;
      }

      .form-container form .btn:hover {
         background-color: #2980b9;
      }
   </style>
</head>
<body>

<?php include 'components/user_header.php'; ?>

<section class="form-container">

   <form action="" method="post">
      <h3>Profile</h3>

      <input type="hidden" name="prev_pass" value="<?= $fetch_profile["password"]; ?>">

      <label for="name">Username:</label>
      <input type="text" id="name" name="name" required placeholder="Enter your username" maxlength="20" class="box" value="<?= $fetch_profile["name"]; ?>">

      <label for="email">Email:</label>
      <input type="email" id="email" name="email" required placeholder="Enter your email" maxlength="50" class="box" oninput="this.value = this.value.replace(/\s/g, '')" value="<?= $fetch_profile["email"]; ?>">

      <label for="old_pass">Old Password:</label>
      <input type="password" id="old_pass" name="old_pass" placeholder="Enter your old password" maxlength="20" class="box" oninput="this.value = this.value.replace(/\s/g, '')">

      <label for="new_pass">New Password:</label>
      <input type="password" id="new_pass" name="new_pass" placeholder="Enter your new password" maxlength="20" class="box" oninput="this.value = this.value.replace(/\s/g, '')">

      <label for="cpass">Confirm New Password:</label>
      <input type="password" id="cpass" name="cpass" placeholder="Confirm your new password" maxlength="20" class="box" oninput="this.value = this.value.replace(/\s/g, '')">

      <input type="submit" value="Update Now" class="btn" name="submit">
   </form>

</section>

<?php include 'components/footer.php'; ?>

<script src="js/script.js"></script>

</body>
</html>
