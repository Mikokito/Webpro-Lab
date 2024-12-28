<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>About</title>
   <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
   <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="heading">
   <h3>ABOUT US</h3>
   <p><a href="index.php">Home</a> <span> / About</span></p>
</div>
<section class="about">
   <div class="row">
      <div class="content">
         <h3>ToDo List Application</h3>
         <p>Kami membuat aplikasi todo list ini agar dapat memudahkan pekerjaan dan menjadi pengingat apa yang harus dikerjakan. Lalu aplikasi todo list ini juga dapat lebih mengorganisir pekerjaan apa yang akan, sedang dan sudah dikerjakan.</p>
         <a href="index.php" class="btn">Our Application</a>
         <a href="https://www.elgatolafonte.tech/" class="btn">Our Other Web</a>
      </div>
      <div class="image">
         <img src="images/Kucing.jpeg" alt="">
      </div>
   </div>
</section>

<section class="reviews">
   <h1 class="title">About Us</h1>
   <div class="steps">
      <div class="box-container">
         <div class="box">
            <img src="images/kucing1.jpg" alt="">
            <h3>Jessen Vallensio (76210)</h3>
            <p>Hobiku mengganggu orang lain dan cita citaku pergi ke mars. Aku suka angka apalagi kalo banyak 0 nya terus bisa dibelanjain, Aku kaya</p>
         </div>
         <div class="box">
            <img src="images/kucing2.jpg" alt="">
            <h3>Vincentius Devon T. (68985)</h3>
            <p>Dep</p>
         </div>
         <div class="box">
            <img src="images/kucing3.jpg" alt="">
            <h3>Citra Nandariani I. (76059)</h3>
            <p>Panggil aku Miko. Aku suka HTML, CSS, PHP, sama Bootstrap. Tapi g paham JS sama react. Jadi ngerjain project = stress</p>
         </div>
         <div class="box">
            <img src="images/kucing4.jpg" alt="">
            <h3>Valent Joseph S. (75506)</h3>
            <p>Biar Hubungan tidak terputus. Pinjam dulu selatus</p>
         </div>
      </div>
      <div class="swiper-pagination"></div>
   </div>
</section>

<script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
<script src="js/script.js"></script>

<script>
var swiper = new Swiper(".reviews-slider", {
   loop:true,
   grabCursor: true,
   spaceBetween: 20,
   pagination: {
      el: ".swiper-pagination",
      clickable:true,
   },
   breakpoints: {
      0: {
      slidesPerView: 1,
      },
      700: {
      slidesPerView: 2,
      },
      1024: {
      slidesPerView: 3,
      },
   },
});
</script>
</body>
</html>
