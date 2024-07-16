<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trexplore</title>
    <style>
         body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-size: cover;
            background: linear-gradient(to top, #0c0c0e, #293039bb), url(https://wallpapercave.com/wp/wp7029155.jpg);
        }
        p{
            color: white;
        }
        h3,h2{
            color:white;
        }

        
        header {
            background-color: #090909;
            color: white;
            text-align: center;
            padding: 1rem;
            position: relative;
        }

        header img {
            position: absolute;
            top: 10px;
            left: 10px;
            width: 120px; 

        }

        .welcome-section {
            text-align: center;
            padding: 2rem;
            background-color: #0e0d16;
            color: white;
        }

        .welcome-section h1 {
            margin-bottom: 1rem;
            font-size: 2.5rem;
        }

        .welcome-section p {
            font-size: 1.2rem;
            margin-bottom: 2rem;
        }

        .get-started-button {
            display: inline-block;
            padding: 10px 20px;
            font-size: 18px;
            background-color: #fff;
            color: #007bff;
            text-decoration: none;
            border-radius: 5px;
        }

        .responsive-images {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-wrap: wrap;
            padding: 2rem;
        }

        .box {
            overflow: hidden;
            box-shadow: 0 1rem 2rem rgba(0, 0, 0, .1);
            border: 1rem solid #fff;
            border-radius: .5rem;
            position: relative;
            transition: transform 0.2s ease-in-out;
            flex: 1 1 calc(33.33% - 20px);
            max-width: calc(33.33% - 20px);
            margin: 20px;
        }

        .box:hover {
            transform: scale(1.05);
        }

        .box img {
            width: 100%;
            height: 100%;
            display: block;
            border-radius: .5rem;
        }

        .image-description {
            text-align: center;
            margin: 10px;
            color: #0a0a0a;
        }

        .about-us {
            background-color:transparent;
            padding: 2rem;
            border-radius: 10px;
            margin: 20px;
        }
        html {
    scroll-behavior: smooth;
}
    </style>
</head>
<body>

<header>
    <h1>Trexplore</h1>
    <img src="project logo.png" alt="Trexplore Logo">
</header>

<div class="welcome-section">
    <h1>Welcome to Your Travel Adventure!</h1>
    <p>Plan your dream journey with our travel planner. Explore new destinations, create itineraries, and make memories that last a lifetime.</p>
    <a href="register.php" class="get-started-button">Embark Your Expedition</a>
</div>

<div class="responsive-images">
    <div class="box">
        <img src="https://th.bing.com/th/id/R.122b7a78266d023c95be8ac1790a6dfd?rik=TkS16bT%2bio%2b4MA&riu=http%3a%2f%2fi.huffpost.com%2fgen%2f930451%2fimages%2fo-TRAVEL-DESTINATIONS-facebook.jpg&ehk=HxSXRCNY5EJ3G%2fWCdaJsKZPw6gG9ZQNqkMLgRz5YcME%3d&risl=&pid=ImgRaw&r=0" alt="Mountain Paradise">
        <div class="image-description">
            <h3>Mountain Paradise</h3>
            <p>Explore the breathtaking landscapes of this mountainous paradise. Perfect for trekking and nature enthusiasts.</p>
        </div>
    </div>
    <div class="box">
        <img src="https://th.bing.com/th/id/R.e047a2e94cd51c1fcc13e8471b278aa1?rik=6k4bEfcCYwBnVg&riu=http%3a%2f%2ftravelblat.com%2fwp-content%2fuploads%2f2013%2f01%2fHow-to-Travel-to-Exotic-Destinations-for-Less.jpg&ehk=IkA1kPQ52DfUkjG%2fFUtXt7l9Hy%2bny7NM7jq8Yf9QQfQ%3d&risl=&pid=ImgRaw&r=0" alt="Tropical Oasis">
        <div class="image-description">
            <h3>Tropical Oasis</h3>
            <p>Discover the serenity of this tropical oasis. Crystal-clear waters and sandy beaches await your arrival.</p>
        </div>
    </div>
    <div class="box">
        <img src="https://lonelyplanetimages.imgix.net/a/g/hi/t/bbc886323ff07d295157ea35f423e121-gateway-of-india.jpg" alt="Gateway of India">
        <div class="image-description">
            <h3>Gateway of India</h3>
            <p>Marvel at the architectural beauty of the Gateway of India, a historical monument in Mumbai.</p>
        </div>
    </div>
    <div class="box">
        <img src="https://th.bing.com/th/id/OIP.SKCzSaHrKQ4AhxZTC-QpvwHaE7?rs=1&pid=ImgDetMain" alt="Majestic Waterfall">
        <div class="image-description">
            <h3>Lotus Mahal</h3>
            <p>Most famous architectural landmarks in Hampi. Its lotus-like structure immediately endears it to visitors and is a must-visit place.</p>
        </div>
    </div>
    <div class="box">
        <img src="https://lp-cms-production.imgix.net/2019-06/65830387.jpg?fit=crop&q=40&sharp=10&vib=20&auto=format&ixlib=react-8.6.4" alt="City Skyline">
        <div class="image-description">
            <h3>City Skyline</h3>
            <p>Enjoy the vibrant lights and energy of a bustling city skyline during the night.</p>
        </div>
    </div>
    <div class="box">
        <img src="https://th.bing.com/th/id/OIP.Z5PNLBtNzGuABiJvlL6kMAHaEo?rs=1&pid=ImgDetMain" alt="Sunset Serenity">
        <div class="image-description">
            <h3>Sunset Serenity</h3>
            <p>Witness the tranquil beauty of a serene sunset casting warm hues over the horizon.</p>
        </div>
    </div>
    <div class="box">
        <img src="https://www.explore.com/img/gallery/the-75-most-popular-american-tourist-destinations/l-intro-1667582509.jpg" alt="American Landmark">
        <div class="image-description">
            <h3>American Landmark</h3>
            <p>Explore one of the most popular American tourist destinations, filled with history and charm.</p>
        </div>
    </div>
    <div class="box">
        <img src="https://th.bing.com/th/id/R.9ec472a33291e3a193d6265f0055fdd8?rik=Ggo1nz38DBi4MA&riu=http%3a%2f%2fwallup.net%2fwp-content%2fuploads%2f2016%2f01%2f171481-landscape-Africa-trees.jpg&ehk=jUte5zoiT075hQBs3u%2fjrWgHIVxQcM7vbxZLBxXepcY%3d&risl=&pid=ImgRaw&r=0" alt="African Landscape">
        <div class="image-description">
            <h3>African Landscape</h3>
            <p>Immerse yourself in the beauty of the African landscape, featuring stunning trees and nature.</p>
        </div>
    </div>
    <div class="about-us">
        <h2>About Trexplore</h2>
        <p>Welcome to Trexplore, your go-to travel companion. At Trexplore, we are passionate about helping you plan unforgettable journeys to the most exciting destinations around the world. Our mission is to make travel planning seamless and enjoyable, allowing you to focus on creating lasting memories. Join us in the adventure of a lifetime!</p>
    </div>
</div>
</body>
</html>
