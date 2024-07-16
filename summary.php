<?php
$servername = "localhost";
$username = "root";
$password = "sanket@123";
$dbname = "trexplore";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$goingFrom = $_POST['going_from'];
$goingTo = $_POST['going_to'];

$sqlGoingFrom = "SELECT going_from FROM destination WHERE going_from = ?";
$sqlGoingTo = "SELECT going_to FROM destination WHERE going_to = ?";

$stmtGoingFrom = $conn->prepare($sqlGoingFrom);
$stmtGoingFrom->bind_param("s", $goingFrom);
$stmtGoingFrom->execute();
$resultGoingFrom = $stmtGoingFrom->get_result();
$rowGoingFrom = $resultGoingFrom->fetch_assoc();

$stmtGoingTo = $conn->prepare($sqlGoingTo);
$stmtGoingTo->bind_param("s", $goingTo);
$stmtGoingTo->execute();
$resultGoingTo = $stmtGoingTo->get_result();
$rowGoingTo = $resultGoingTo->fetch_assoc();


$sqlTripId = "SELECT DISTINCT TripId FROM transportation WHERE going_to = ?";
$stmtTripId = $conn->prepare($sqlTripId);
$stmtTripId->bind_param("s", $goingTo);
$stmtTripId->execute();
$stmtTripId->bind_result($actualTripId);
$stmtTripId->fetch();
$stmtTripId->close();



function fetchDetails($conn, $mode, $transportationId)
{
    $details = '';

    
    $sql = "SELECT * FROM $mode WHERE TransportationId = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("s", $transportationId);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result) {
            while ($row = $result->fetch_assoc()) {
                
                foreach ($row as $key => $value) {
                    
                    if ($key !== 'TransportationId') {
                        $details .= "$key: $value<br>";
                    }
                }

                $details .= "<hr>"; 
            }

            
            $result->close();
        } else {
            
            $details .= "Error getting result set: " . $stmt->error . "<br>";
        }

       
        $stmt->close();
    } else {
       
        $details .= "Error preparing statement: " . $conn->error . "<br>";
    }

    return $details;
}


function generateDownloadFile($content)
{
    $filename = "trip_details.txt";
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="' . $filename . '"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    echo $content;
    exit;
}


if (isset($_POST['download'])) {
    
    $tripDetails = "Going From: " . $rowGoingFrom['going_from'] . "\n";
    $tripDetails .= "Going To: " . $rowGoingTo['going_to'] . "\n\n";
    $tripDetails .= "Travel Information:\n";

    
    $modes = array('train', 'bus', 'flight'); 

    foreach ($modes as $mode) {
        $tripDetails .= "\nMode: $mode\n";
        $tripDetails .= fetchDetails($conn, $mode, $actualTripId) . "\n";
    }

   
    generateDownloadFile($tripDetails);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Trip Details</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        header {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 10px;
        }

        section {
            margin: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table,
        th,
        td {
            border: 1px solid #ddd;
        }

        th,
        td {
            padding: 15px;
            text-align: left;
        }

        th {
            background-color: #333;
            color: #fff;
        }

        h2,
        h3 {
            color: #333;
        }

        .nested-table {
            margin-top: 10px;
        }

        .nested-table th,
        .nested-table td {
            border: 1px solid #ddd;
            padding: 10px;
        }

        .nested-table th {
            background-color: #666;
            color: #fff;
        }

        form {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        input[name="download"],
        input[name="back"] {
            background-color: #4caf50;
            border: none;
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            transition-duration: 0.4s;
            cursor: pointer;
            border-radius: 5px;
        }

        input[name="download"]:hover,
        input[name="back"]:hover {
            background-color: white;
            color: black;
            border: 2px solid #4caf50;
        }

        input[name="back"] {
            background-color: #008CBA;
            border: none;
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            transition-duration: 0.4s;
            cursor: pointer;
            border-radius: 5px;
        }

        input[name="back"]:hover {
            background-color: white;
            color: black;
            border: 2px solid #008CBA;
        }

        #summary {
            display: none;
        }
    </style>
</head>

<body>
    <header>
        <h1>Trip Details</h1>
    </header>

    <section>
        <h2>Your Destination :</h2>
        <table>
            <tr>
                <th>Going From</th>
            </tr>
            <tr>
                <td id='goingFrom'><?php echo $rowGoingFrom['going_from']; ?></td>
            </tr>
        </table>
    </section>

    <section>
        <h2>Your Departure:</h2>
        <table>
            <tr>
                <th>Going To</th>
            </tr>
            <tr>
                <td id='goingTo'><?php echo $rowGoingTo['going_to']; ?></td>
            </tr>
        </table>
    </section>

    <section>
        <h2>Travel Information</h2>
        <div class='nested-table' id='modeTable'>
            <h3>Mode of Travel</h3>
            <form method="post">
                <table>
                    <tr>
                        <th>Flight</th>
                        <th>Train</th>
                        <th>Bus</th>
                    </tr>

                    <?php
                    $sqlTransportationIds = "SELECT TransportationId, Mode FROM transportation WHERE TripId = ?";
                    $stmtTransportationIds = $conn->prepare($sqlTransportationIds);

                    if ($stmtTransportationIds) {
                        $stmtTransportationIds->bind_param("i", $actualTripId);

                        if ($stmtTransportationIds->execute()) {
                            $resultTransportationIds = $stmtTransportationIds->get_result();

                            if ($resultTransportationIds) {
                                while ($rowTransportationIds = $resultTransportationIds->fetch_assoc()) {
                                    $transportationId = $rowTransportationIds['TransportationId'];
                                    $mode = $rowTransportationIds['Mode'];

                                    switch ($mode) {
                                        case 'bus':
                                            $details = fetchDetails($conn, 'bus', $transportationId);
                                            break;
                                        case 'train':
                                            $details = fetchDetails($conn, 'train', $transportationId);
                                            break;
                                        case 'flight':
                                            $details = fetchDetails($conn, 'flight', $transportationId);
                                            break;
                                    }

                                    echo "<td>
                                            <table>
                                                <tr>
                                                    $details
                                                </tr>
                                            </table>
                                        </td>";
                                }

                                $resultTransportationIds->close();
                            } else {
                                echo "Error getting result set: " . $stmtTransportationIds->error;
                            }
                        } else {
                            echo "Error executing statement: " . $stmtTransportationIds->error;
                        }

                        $stmtTransportationIds->close();
                    } else {
                        echo "Error preparing statement: " . $conn->error;
                    }
                    ?>
                </table>
                <br>
            </form>
        </div>
    </section>

    <section>
        <h2>Tourist Attractions</h2>
        <div class='nested-table' id='attractionTable'>
            <table>
                <tr>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Cost</th>
                    <th>Description</th>
                </tr>

                <?php
                $sqlAttractions = "SELECT * FROM touristattractions WHERE TripId = ?";
                $stmtAttractions = $conn->prepare($sqlAttractions);

                if ($stmtAttractions) {
                    $stmtAttractions->bind_param("i", $actualTripId);
                    $stmtAttractions->execute();
                    $resultAttractions = $stmtAttractions->get_result();

                    if ($resultAttractions) {
                        while ($rowAttractions = $resultAttractions->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $rowAttractions['Name'] . "</td>";
                            echo "<td>" . $rowAttractions['Adress'] . "</td>";
                            echo "<td>" . $rowAttractions['Cost'] . "</td>";
                            echo "<td>" . $rowAttractions['Description'] . "</td>";
                            echo "</tr>";
                        }

                        $resultAttractions->close();
                    } else {
                        echo "Error getting Tourist Attractions result set: " . $stmtAttractions->error;
                    }

                    $stmtAttractions->close();
                } else {
                    echo "Error preparing Tourist Attractions statement: " . $conn->error;
                }
                ?>
            </table>
        </div>
    </section>

    <section>
        <h2>Your Accommodations</h2>
        <div class='nested-table' id='accommodationsTable'>
            <table>
                <tr>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Website</th>
                    <th>Reviews</th>
                    <th>About</th>
                </tr>

                <?php
                $sqlAccommodations = "SELECT * FROM accommodations WHERE TripId = ?";
                $stmtAccommodations = $conn->prepare($sqlAccommodations);

                if ($stmtAccommodations) {
                    $stmtAccommodations->bind_param("i", $actualTripId);
                    $stmtAccommodations->execute();
                    $resultAccommodations = $stmtAccommodations->get_result();

                    if ($resultAccommodations) {
                        while ($rowAccommodation = $resultAccommodations->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $rowAccommodation['Name'] . "</td>";
                            echo "<td>" . $rowAccommodation['Address'] . "</td>";
                            echo "<td><a href='" . $rowAccommodation['Website'] . "' target='_blank'>Visit Website</a></td>";
                            echo "<td>".$rowAccommodation['Reviews'] ."</td>";
                            echo "<td>" . $rowAccommodation['Description'] . "</td>";
                            echo "</tr>";
                            

                        }
                        
                        
                        $resultAccommodations->close();
                    } else {
                        echo "Error getting Accommodation result set: " . $stmtAccommodations->error;
                    }

                    $stmtAccommodations->close();
                } else {
                    echo "Error preparing Accommodation statement: " . $conn->error;
                }
                ?>
            </table>
        </div>
    </section>

    <section>
        <h2>Food Venues</h2>
        <div class='nested-table' id='restaurantTable'>
            <table>
                <tr>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Website</th>
                    <th>Reviews</th>
                    <th>About</th>
                </tr>

                <?php
                $sqlRestaurants = "SELECT * FROM restaurant WHERE TripId = ?";
                $stmtRestaurants = $conn->prepare($sqlRestaurants);

                if ($stmtRestaurants) {
                    $stmtRestaurants->bind_param("i", $actualTripId);
                    $stmtRestaurants->execute();
                    $resultRestaurants = $stmtRestaurants->get_result();

                    if ($resultRestaurants) {
                        while ($rowRestaurant = $resultRestaurants->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $rowRestaurant['Name'] . "</td>";
                            echo "<td>" . $rowRestaurant['Adress'] . "</td>";
                            echo "<td><a href='" . $rowRestaurant['webisite'] . "' target='_blank'>Visit Website</a></td>";
                            echo "<td>".$rowRestaurant['reviews'] . "</td>";
                            echo "<td>".$rowRestaurant['abouts'] . "</td>";


                            echo "</tr>";
                        }

                        $resultRestaurants->close();
                    } else {
                        echo "Error getting Restaurant result set: " . $stmtRestaurants->error;
                    }

                    $stmtRestaurants->close();
                } else {
                    echo "Error preparing Restaurant statement: " . $conn->error;
                }
                ?>
            </table>
        </div>
    </section>

    <form method="post" id="downloadForm">
        <input type="hidden" name="download" value="true">
        <input type="button" onclick="printAndDownload()" name="download" value="Download / Print">
        <a href="dest.php"><input type="button" name="back" value="Back"></a>
    </form>

    <script>
        function printAndDownload() {
            var printWindow = window.open('', '_blank');
            printWindow.document.write('<html><head><title>Trip Details Summary</title></head><body>');

            // Copy the content of each section to the new window
            copySection('You Are Going From:', 'goingFrom', printWindow);
            copySection('You Are Going To:', 'goingTo', printWindow);
            copySection('Travel Information', 'modeTable', printWindow);
            copySection('Tourist Attractions', 'attractionTable', printWindow);
            copySection('Where you can live', 'accommodationsTable', printWindow);
            copySection('Places to Eat', 'restaurantTable', printWindow);

            printWindow.document.write('</body></html>');
            printWindow.document.close();

          
            if ('onafterprint' in printWindow) {
                printWindow.onafterprint = function () {
                    printWindow.close();
                    window.location.href = 'dest.php';
                };
            } else {
               
                setTimeout(function () {
                    printWindow.close();
                    window.location.href = 'dest.php';
                }, 1000); 
            }

            printWindow.print();
        }

        function copySection(title, elementId, destination) {
            destination.document.write('<h2>' + title + '</h2>');
            destination.document.write(document.getElementById(elementId).outerHTML);
            destination.document.write('<br>');
        }
    </script>
</body>

</html>







