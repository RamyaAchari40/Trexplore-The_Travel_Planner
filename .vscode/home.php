<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>TREXPLORE</title>
  <link rel="stylesheet" href="Style.css">
  <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.min.css" rel="stylesheet">
  <script src="main.js"></script>


</head>

<body>
  <nav class="nav-bar" id="navbar">
   
    <div class="logo">
      <img src="project logo.png" alt="">
    </div>
    <div class="links">

      <ul class="navigation">
        <li class="link"><a href="#home">Home</a></li>
        <li class="link"><a href="profile.php">Profile</a></li>

        <li class="link"><a href="#about">about us</a></li>
        <li class="link"><a href="#next">next</a></li>
        <li class="link"><a href="#contact">contact</a></li>


      </ul>
    </div>

     <label for='bars' class="icon-bars"><i class="ri-bar-chart-2-fill"></i></label> 
    </div>
  </nav>

  <header class="home" id="home">
    <div class="content">
      <h1>The <strong>best</strong> way to <strong>plan your next</strong> adventure </h1>
      <h4>Explore the colourful world like never seen</h4>
      <button class="btn-explore"><a href="dest.php">Explore more <i class="ri-arrow-right-line"></i></a></button>

    </div>
  </header>
  <section class="about" id="about">
  <div class="content">
    <div class="items">
      <div class="image">
        <img src="https://t4.ftcdn.net/jpg/04/08/81/09/240_F_408810925_IG49PMSfC7ZolH4ZLYNZTVuy8YN0BhGK.jpg" alt="" srcset="">
      </div>
      <div class="item">
        <div class="item-content">
          <h2 class="about-title">
            About Us
          </h2>
          <div class="about-desc">
            <p>
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis laudantium maxime sunt ex quia,
              nulla qui officia modi provident consequatur!
            </p>
            <p>
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Corporis in vitae laudantium!
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>








  <section class="next" id="next">
    <div class="heading">
      <h1 class="title">discover the most attracative destinations</h1>
      <p class="subtitle">Let's see the world with your passion</p>
    </div>
    <div class="content">
      <div class="items">

        <div class="card">
          <div class="image">
            <img src="assets/album/hampi.webp" alt="" srcset="">
          </div>
          <div class="content-card">
            <h4>Karnataka</h4>
            <p>Hampi is a UNESCO World Heritage Site on the southern bank of the Tungabhadra river in the Vijayanagara
              district of Karnataka.

            </p>
            <button class="btn-read"
              onclick="window.location.href='https://https://www.karnatakatourismsociety.org/about-karnataka/'">read
              More</button>
          </div>
        </div>

        <div class="card">
          <div class="image">
            <img src="assets/album/pulak-bhagawati-GdlEMsUsOy0-unsplash.jpg" alt="" srcset="">
          </div>
          <div class="content-card">
            <h4>Sikkim</h4>
            <p>
              Planning to visit the tiniest states of India? Sikkim is a mesmerizing state filled with wonder as well as
              beauty. The snow-capped peaks, eye-catchy waterfalls, rambling tea garden, and beautiful green valleys of
              Sikkim are sure a treat to the eyes.
            </p>
            <button class="btn-read"
              onclick="window.location.href='https://sikkimtourism.gov.in/Public/ExperienceSikkim/history'">Read
              More</button>
          </div>
        </div>


        <div class="card">
          <div class="image">
            <img src="assets/album/dal lake.avif" alt="" srcset="">
          </div>
          <div class="content-card">
            <h4>Kashmir</h4>
            <p>
              Located on the banks of the Jhelum river, Kashmir is a beautiful valley in the heart of the Himalayas. The
              most visited places here include Pahalgam, Gulmarg, and Srinagar.
            </p>
            <button class="btn-read" onclick="window.location.href='https://en.wikipedia.org/wiki/Kashmir'">Read
              More</button>
          </div>
        </div>

      </div>


    </div>
    </div>
  </section>


  <section class="contact" id="contact">

    <div class="content">
      <div class="items">

        <div class="item">
          <div class="heading">
            <h1 class="title">CONTACT US</h1>
            <div class="subtitle">We are able to replay within 24 hours. we work in weeekend also </div>
          </div>
          <div class="row">
            
              <div class="card">
  <div class="line">
    <span><i class="ri-phone-line"></i></span>
    <h4>Call us</h4>
  </div>
  <p><a href="tel:+1601543532">+1 (601) 543 532</a></p>
</div>


<div class="card">
  <div class="line">
    <span><i class="ri-mail-line"></i></span>
    <h4>Mail us</h4>
  </div>
  <p><a href="mailto:contactus@Trexplore.com">contactus@Trexplore.com</a></p>
</div>

<div class="item">
    <form action="index2.html" method="post">
        <input type="email" name="user_email" class="input" placeholder="Your Email" required>
        <input type="text" name="user_phone" class="input" placeholder="Your Phone">
        <textarea name="user_message" rows="6" class="input" placeholder="Your Message" required></textarea>
        <button type="submit" class="btn-contact">Send a Message!</button>
    </form>
</div>


      </div>
    </div>
  </section>

  <footer class="footer">
    <div class="content">
      <h4>Trexplore</h4>
      <div class="quote">
        <p style="font-size: 18px; text-align: center;">
          <i class="ri-double-quotes-l"></i>
          “The greatest adventures are the ones that take us on an exciting journey within ourselves.”
          <i class="ri-double-quotes-r"></i>
        </p>
      </div>
    </div>

    <div class="rights">
      Copyrights &#169 <a href="http://" target="_blank" rel="noopener noreferrer">itcode</a>. all rights reserved
    </div>
  </footer>
  <script src="main.js"></script>



</body>

</html>