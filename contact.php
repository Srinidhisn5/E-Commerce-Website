<?php

include 'components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};

if(isset($_POST['send'])){

   $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);
   $email = $_POST['email'];
   $email = filter_var($email, FILTER_SANITIZE_STRING);
   $number = $_POST['number'];
   $number = filter_var($number, FILTER_SANITIZE_STRING);
   $msg = $_POST['msg'];
   $msg = filter_var($msg, FILTER_SANITIZE_STRING);

   $select_message = $conn->prepare("SELECT * FROM `messages` WHERE name = ? AND email = ? AND number = ? AND message = ?");
   $select_message->execute([$name, $email, $number, $msg]);

   if($select_message->rowCount() > 0){
      $message[] = 'already sent message!';
   }else{

      $insert_message = $conn->prepare("INSERT INTO `messages`(user_id, name, email, number, message) VALUES(?,?,?,?,?)");
      $insert_message->execute([$user_id, $name, $email, $number, $msg]);

      $message[] = 'sent message successfully!';

   }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Contact</title>
   
   <!-- font awesome cdn link -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link -->
   <link rel="stylesheet" href="css/style.css">

   <style>
      body, h1, h2, h3, h4, h5, h6, p, input, textarea, button, a, label {
         font-family: "Times New Roman", Times, serif !important;
      }

      .form-container {
         max-width: 400px;
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
      }

      .form-container label {
         font-weight: bold;
         font-size: 15px;
         margin-top: 10px;
         display: block;
         color: #333;
         text-align: left;
      }

      .form-container .box {
         width: 100%;
         padding: 8px 10px;
         margin: 5px 0 15px 0;
         border: 1px solid #ccc;
         border-radius: 0px;
         font-size: 14px;
      }

      .form-container .btn {
         padding: 10px;
         border-radius: 0px;
         font-size: 14px;
         font-weight: bold;
         text-transform: capitalize;
         cursor: pointer;
         border: none;
         background-color: #3498db;
         color: white;
         transition: background 0.3s;
         width: 100%;
         margin-top: 10px;
      }

      .form-container .btn:hover {
         background-color: #2980b9;
      }
   </style>
</head>
<body>

<?php include 'components/user_header.php'; ?>

<section class="form-container">

   <form action="" method="post">
      <h3>Contact Us</h3>

      <label for="name">Name:</label>
      <input type="text" id="name" name="name" class="box" required placeholder="Enter your name" maxlength="20" pattern="[A-Za-z\s]+" title="Only letters allowed">

      <label for="email">Email:</label>
      <input type="email" id="email" name="email" class="box" required placeholder="Enter your email" maxlength="50">

      <label for="number">Phone Number:</label>
      <input type="number" id="number" name="number" class="box" required placeholder="Enter your number" min="1000000000" max="9999999999" oninput="if(this.value.length>10) this.value=this.value.slice(0,10);">

      <label for="msg">Message:</label>
      <textarea id="msg" name="msg" class="box" required placeholder="Enter your message" cols="30" rows="10" maxlength="1000"></textarea>

      <input type="submit" value="Send Message" name="send" class="btn">
   </form>

</section>

<?php include 'components/footer.php'; ?>

<script src="js/script.js"></script>

</body>
</html>
