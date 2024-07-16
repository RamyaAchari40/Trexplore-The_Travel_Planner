<?php

$servername = "localhost";
$username = "root";
$password = "sanket@123";
$dbname = "trexplore";

$conn = new mysqli($servername, $username, $password, $dbname);

$sqlGoingFrom = "SELECT  DISTINCT going_from FROM destination";
$resultGoingFrom = $conn->query($sqlGoingFrom);

$optionsGoingFrom = "";
if ($resultGoingFrom->num_rows > 0) {
    while ($row = $resultGoingFrom->fetch_assoc()) {
        $cityName = $row['going_from'];
        $optionsGoingFrom .= "<option value='$cityName'>$cityName</option>";
    }
}


$sqlGoingTo = "SELECT DISTINCT going_to FROM destination";
$resultGoingTo = $conn->query($sqlGoingTo);

$optionsGoingTo = "";
if ($resultGoingTo->num_rows > 0) {
    while ($row = $resultGoingTo->fetch_assoc()) {
        $cityName = $row['going_to'];
        $optionsGoingTo .= "<option value='$cityName'>$cityName</option>";
    }
}


$conn->close();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Plan Your Trip</title>
    <style>
        body {
            background-image: url('https://images.unsplash.com/photo-1446038202205-1c96430dbdab?q=80&w=2069&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');
            background-repeat: no-repeat;
            background-size: cover;
            font-family: 'Arial', sans-serif;
        }

        center {
            text-align: center;
        }

        nav {
            background-color: transparent;
            padding: 10px;
            box-shadow: 0 -19px 19px 12px rgba(223, 202, 202, 0.1);
        }

        .navigation {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .navigation li {
            display: inline;
            margin-right: 20px;
        }

        .navigation li a {
            color: #000;
            font-size: 20px;
            font-weight: bold;
            font-family: 'Poppins', sans-serif;
            text-decoration: none;
        }

        .navigation li a:hover {
            color: #ff5733;
        }

        h1 {
            font-size: 80px;
            color: #352F44;
            font-family: 'Helvetica', sans-serif;
            margin-top: 50px;
        }

        form {
            width: 100%;
            margin: 0 auto;
            border:2px;
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-size: 20px;
            font-weight: bold;
        }

        select,
        input {
            width: 25%;
            padding: 10px;
            margin-bottom: 20px;
            box-sizing: border-box; 
            font-size: 14px;
        }

        button {
            background-color: #a12408;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            font-family: 'Verdana', sans-serif;
        }
        .error-message {
            color: black;
            font-size: 18px;
        }
        .error-message {
            color: black;
            font-size: 18px;
        }
    </style>
</head>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Plan Your Trip</title>
</head>

<body>
    <center>
        <nav class="nav-bar" id="navbar">
        <div class="links">

<ul class="navigation">
  <li class="link"><a href="home.php">Home</a></li>
  <li class="link"><a href="profile.php">Profile</a></li>

  <li class="link"><a href="home.php">About Us</a></li>

  <li class="link"><a href="home.php">Contact</a></li>


</ul>
        </nav>
        <section class="Destinations">
            <div class="dest">
                <h1>Find your Next tour!</h1><br>
            </div>
            <div class="search">
                <form method="post" action="summary.php" onsubmit="return validateForm()">
                    <label for="going_from">Where Are You Going From?</label>
                    <select id="going_from" name="going_from" class="input">
                        <option value="">Select departure</option>
                        <?php echo $optionsGoingFrom; ?>
                    </select>
                   <br>
                    <span id="goingFromError" class="error-message"></span>
                    
                    <label for="going_to">Where Are You Going To?</label>
                    <select id="going_to" name="going_to" class="input">
                        <option value="">Select destination</option>
                        <?php echo $optionsGoingTo; ?>
                    </select>
                 <br>
                    <span id="goingToError" class="error-message"></span>
                    <br><br>
                    <button type="submit" name="submit">Draft Your Travel Itinerary</button>
                </form>
            </div>
        </section>
    </center>

    <script>
        function validateForm() {
            var goingFrom = document.getElementById("going_from").value;
            var goingTo = document.getElementById("going_to").value;
            var goingFromError = document.getElementById("goingFromError");
            var goingToError = document.getElementById("goingToError");

       
            goingFromError.innerHTML = "";
            goingToError.innerHTML = "";

            
            if (goingFrom === "" && goingTo === "") {
                goingFromError.innerHTML = "Please select departure.";
                goingToError.innerHTML = "Please select destination.";
                setTimeout(function () {
                    goingFromError.innerHTML = "";
                    goingToError.innerHTML = "";
                }, 3000); 
                return false; 
            }

            
            if (goingFrom === "") {
                goingFromError.innerHTML = "Please select departure!!";
                setTimeout(function () {
                    goingFromError.innerHTML = "";
                }, 3000); 
                return false;
            }

            if (goingTo === "") {
                goingToError.innerHTML = "Please select destination!!";
                setTimeout(function () {
                    goingToError.innerHTML = "";
                }, 3000); 
                return false; 
            }

           
            if (goingFrom === goingTo) {
                goingFromError.innerHTML = "Departure and destination cannot be the same!";
                goingToError.innerHTML = "Departure and destination cannot be the same!";
                setTimeout(function () {
                    goingFromError.innerHTML = "";
                    goingToError.innerHTML = "";
                }, 3000); 
                return false; 
            }

            return true;
        }

      
    </script>
</body>

</html>
