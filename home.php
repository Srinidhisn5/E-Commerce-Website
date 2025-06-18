<?php

include 'components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};

include 'components/wishlist_cart.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Shop Nix</title>

   <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
   <link rel="stylesheet" href="css/style.css">

   <style>
      body, h1, h2 {
         font-family: "Times New Roman", Times, serif !important;
      }

      .btn {
         background-color: #3498db !important;
         color: white !important;
         transition: 0.3s;
      }

      .btn:hover {
         opacity: 0.8;
      }

      .category-grid {
         display: flex;
         flex-wrap: wrap;
         justify-content: center;
         gap: 20px;
         padding: 2rem;
      }

      .category-grid a {
         text-align: center;
         padding: 1rem;
         border: 2px solid #ccc;
         width: 250px;
         transition: transform 0.5s ease;
         text-decoration: none;
         font-family: "Times New Roman", Times, serif !important;
         color: inherit;
      }

      .category-grid a:hover {
         transform: scale(1.05);
         background-color: #f5f5f5;
      }

      .category-grid img {
         width: 100px;
         height: 100px;
         object-fit: contain;
         margin-bottom: 1.5rem;
      }

      .category-grid h3 {
         font-size: 1.5rem;
      }

      /* Intro overlay */
      #introOverlay {
         position: fixed;
         top: 0;
         left: 0;
         width: 100%;
         height: 100%;
         background: white;
         display: flex;
         align-items: center;
         justify-content: center;
         z-index: 9999;
         overflow: hidden;
         animation: fadeOut 1s ease forwards;
         animation-delay: 3s;
      }

      .intro-text span {
         font-size: 10rem;
         color: black;
         font-family: "Times New Roman", Times, serif;
         opacity: 0;
         display: inline-block;
         transform: translateY(30px);
         animation: fadeInUp 0.6s forwards;
      }

      @keyframes fadeInUp {
         to {
            opacity: 1;
            transform: translateY(0);
         }
      }

      @keyframes fadeOut {
         to {
            opacity: 0;
            visibility: hidden;
         }
      }

      .page-content {
         opacity: 0;
         animation: showPage 1s ease forwards;
         animation-delay: 3.2s;
      }

      @keyframes showPage {
         to {
            opacity: 1;
         }
      }
   </style>
</head>
<body>

<!-- Netflix-style intro overlay with single character animation -->
<div id="introOverlay">
   <div class="intro-text" id="introText"></div>
</div>

<div class="page-content">
<?php include 'components/user_header.php'; ?>

<div class="home-bg">

<section class="home">

   <div class="swiper home-slider">
   
   <div class="swiper-wrapper">

      <div class="swiper-slide slide">
         <div class="image">
            <img src="images/iPHONE.jpg" alt="">
         </div>
         <div class="content">
            <span>Upto 50% Off</span>
            <h3>Latest Smartphones</h3>
         </div>
      </div>

      <div class="swiper-slide slide">
         <div class="image">
            <img src="images/home-img-2.png" alt="">
         </div>
         <div class="content">
            <span>Upto 50% off</span>
            <h3>Latest Watches</h3>
         </div>
      </div>

   </div>

   </div>

</section>

</div>

<section class="category">

   <h1 class="heading">Shop by Category</h1>

   <div class="category-grid">

      <a href="category.php?category=laptop">
         <img src="images/icon-1.png" alt="">
         <h3>Laptop</h3>
      </a>

      <a href="category.php?category=camera">
         <img src="images/icon-3.png" alt="">
         <h3>Camera</h3>
      </a>

      <a href="category.php?category=smartphone">
         <img src="images/icon-7.png" alt="">
         <h3>Smartphone</h3>
      </a>

      <a href="category.php?category=watch">
         <img src="images/icon-8.png" alt="">
         <h3>Watch</h3>
      </a>

   </div>

</section>

<?php include 'components/footer.php'; ?>
</div>

<script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
<script src="js/script.js"></script>

<script>
// Swiper setup
var swiper = new Swiper(".home-slider", {
   loop:true,
   spaceBetween: 20,
   pagination: {
      el: ".swiper-pagination",
      clickable:true,
   },
});

var swiper = new Swiper(".products-slider", {
   loop:true,
   spaceBetween: 20,
   pagination: {
      el: ".swiper-pagination",
      clickable:true,
   },
   breakpoints: {
      550: {
         slidesPerView: 2,
      },
      768: {
         slidesPerView: 2,
      },
      1024: {
         slidesPerView: 3,
      },
   },
});

// Animate intro text character by character
const text = "Shop Nix";
const introTextDiv = document.getElementById("introText");

[...text].forEach((char, index) => {
   const span = document.createElement("span");
   span.textContent = char;
   span.style.animationDelay = `${index * 0.2}s`;
   introTextDiv.appendChild(span);
});
</script>

</body>
</html>
