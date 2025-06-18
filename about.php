<?php
include 'components/connect.php';
session_start();
if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>About Us</title>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
   <link rel="stylesheet" href="css/style.css">

   <style>
      body, .btn, .delete-btn, .option-btn {
         font-family: "Times New Roman", Times, serif !important;
         background-color: #f5f9ff;
         color: #333;
         margin: 0;
         padding: 0;
      }

      .section-heading {
         text-align: center;
         font-size: 2.8rem;
         color: #003366;
         margin-top: 4rem;
         margin-bottom: 2rem;
      }

      .about-container {
         max-width: 1200px;
         margin: auto;
         padding: 2rem;
      }

      .about-banner {
         display: flex;
         flex-wrap: wrap;
         align-items: center;
         background:rgb(255, 255, 255);
         padding: 3rem;
         box-shadow: 0 5px 15px rgba(0,0,0,0.05);
         margin-bottom: 3rem;
         gap: 2rem;
      }

      .about-banner .image {
         flex: 1 1 40%;
         text-align: center;
      }

      .about-banner .image img {
         width: 100%;
         max-width: 400px;
         box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
      }

      .about-banner .text {
         flex: 1 1 55%;
      }

      .about-banner .text h3 {
         font-size: 2.5rem;
         color: #003366;
         margin-bottom: 1rem;
      }

      .about-banner .text p {
         font-size: 1.2rem;
         line-height: 1.8;
         margin-bottom: 1rem;
      }

      .info-block {
         background-color: #ffffff;
         padding: 2rem;
         margin-bottom: 2rem;
         box-shadow: 0 3px 10px rgba(0,0,0,0.05);
      }

      .info-block p {
         font-size: 1.15rem;
         line-height: 1.9;
      }

      .btn-contact {
         display: inline-block;
         margin-top: 1.5rem;
         padding: 0.8rem 1.5rem;
         background: #007BFF;
         color: #fff;
         border-radius: 5px;
         text-decoration: none;
         transition: background 0.3s ease;
      }

      .btn-contact:hover {
         background: #0056b3;
      }
   </style>
</head>
<body>

<?php include 'components/user_header.php'; ?>

<section class="about-container">
   <div class="about-banner">
      <div class="image">
         <img src="images/23.png" alt="Our Team">
      </div>
      <div class="text">
         <h3>Who We Are</h3>
         <p>We are a passionate team of tech enthusiasts and creative minds dedicated to reshaping the online shopping experience in Nepal. Our mission is to bridge the gap between buyers and authentic sellers through an intuitive and secure digital platform that prioritizes transparency, convenience, and trust.</p>

<p>Founded by a group of university students with a shared dream, our journey began in a college dorm room with whiteboards full of ideas and countless lines of code. What started as a classroom project has now evolved into a real-world solution that empowers users to shop smarter, safer, and faster.</p>

<p>Each member of our team brings unique strengths — from front-end design to backend architecture, from data handling to customer engagement — all working in harmony to build a platform that delivers not just products, but exceptional experiences.</p>

<p>We believe in innovation driven by empathy. By constantly listening to user feedback and monitoring the latest tech trends, we ensure our platform evolves with the needs of our community. Our efforts are rooted in problem-solving, and our success lies in simplifying lives through technology.</p>

<p>Beyond just commerce, we envision becoming a part of every household’s digital lifestyle — enabling access to quality goods, supporting local vendors, and fostering a culture of digital trust in Nepal.</p>

         <a href="contact.php" class="btn-contact">Get in Touch</a>
      </div>
   </div>

   <h2 class="section-heading">Our Vision</h2>
   <div class="info-block">
      <p>Our vision is to become Nepal’s leading eCommerce platform that delivers not just products, but trust, speed, and satisfaction. We strive to empower small vendors, encourage digital adoption, and set new standards in service and customer care.</p>

<p>We envision a future where every individual — regardless of location or background — can access quality goods and services at their fingertips. By creating a seamless bridge between local businesses and nationwide customers, we aim to digitally transform traditional commerce into a more inclusive, efficient, and intelligent experience.</p>

<p>Our commitment is to set benchmarks in transparency, ethical operations, and user satisfaction. We’re not just building a website — we’re building an ecosystem where innovation meets integrity, and convenience meets community impact.</p>

<p>As we grow, we aspire to expand beyond borders, introduce AI-driven personalization, and integrate with smart logistics to redefine how Nepal shops, sells, and connects online. Our vision is bold, but so is our belief: that technology can and should uplift communities and create lasting value for all.</p>

   </div>

   <h2 class="section-heading">Core Values</h2>
   <div class="info-block">
      <p>✔ Transparency in every transaction<br>
         ✔ Customer-first mindset<br>
         ✔ Reliable logistics & order tracking<br>
         ✔ Continuous improvement through technology<br>
         ✔ Supporting local products and businesses
      </p>
   </div>

   <h2 class="section-heading">Our Story</h2>
   <div class="info-block">
      <p>What began as a student project has grown into a reliable shopping platform loved by hundreds. Our growth is driven by a shared passion for innovation, an eye for design, and a commitment to delivering value. We believe in dreaming big and building even bigger.</p>

<p>Our early days were filled with challenges — from debugging code at midnight to pitching our idea in front of skeptical eyes. But with each obstacle, we grew stronger and more determined. We stayed rooted in our mission and adapted quickly, fueled by a belief that technology can solve real-world problems.</p>

<p>As our user base expanded, so did our responsibilities. We upgraded our platform, improved security, enhanced the user interface, and established processes to support scalability — all while staying true to our core vision. Every line of code, every feature, and every decision was made with the customer in mind.</p>

<p>Today, we take pride in being more than just an eCommerce site — we are a story of grit, growth, and genuine impact. From local artisans to college students ordering essentials, our platform touches lives in meaningful ways. And this is just the beginning — we’re on a mission to turn our humble startup into a national success story.</p>

   </div>
</section>

<?php include 'components/footer.php'; ?>

<script src="js/script.js"></script>

</body>
</html>
