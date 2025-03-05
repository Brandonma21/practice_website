<?php
$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "wine_booking"; 


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$error_message = "";  


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $table_number = $_POST['table_number'];

    
    $requested_datetime = date('Y-m-d H:i:s', strtotime("$date $time"));


    $sql = "SELECT * FROM bookings WHERE table_number = '$table_number' 
    AND date = '$date' 
    AND (
        
        (STR_TO_DATE(CONCAT(date, ' ', time), '%Y-%m-%d %H:%i:%s') BETWEEN DATE_SUB('$requested_datetime', INTERVAL 45 MINUTE) 
        AND DATE_ADD('$requested_datetime', INTERVAL 45 MINUTE)) 
        AND CONCAT(date, ' ', time) != '$requested_datetime'
    )";
    
    

    $result = $conn->query($sql);
    

    if ($result->num_rows > 0) {
        
        $error_message = "Sorry, this table is already booked for the selected date and time or within 45 minutes of the requested time. Please choose another time.";
    } else {
        
        $insert_sql = "INSERT INTO bookings (name, email, table_number, date, time, created_at) 
                       VALUES ('$full_name', '$email', '$table_number', '$date', '$time', NOW())";

if ($conn->query($insert_sql) === TRUE) {
    
    echo "<script>
        localStorage.setItem('bookingSuccess', 'true');
        window.location.href = '/Wine%20Website/index.html';
    </script>";
    exit();
} else {
            $error_message = "Error: " . $conn->error;  
        }
    }
}

$conn->close();
?>




<?php include 'header.php'; ?>

<div class="booking-form-container">
    <h2>Wine Tasting Booking</h2>

    <?php if ($error_message != ""): ?>
        <div class="error-message">
            <?php echo $error_message; ?>
        </div>
    <?php endif; ?>

    <form method="POST" action="booking.php">
        <label for="full_name">Full Name</label>
        <input type="text" id="full_name" name="full_name" required>

        <label for="email">Email Address</label>
        <input type="email" id="email" name="email" required>

        <label for="date">Booking Date</label>
        <input type="date" id="date" name="date" required>

        <label for="time">Booking Time</label>
        <input type="time" id="time" name="time" required>

        <label for="table_number">Table Number</label>
        <select id="table_number" name="table_number" required>
            <option value="1">Table 1 (2 people)</option>
            <option value="2">Table 2 (4 people)</option>
            <option value="3">Table 3 (6 people)</option>
            <option value="4">Table 4 (2 people)</option>
            <option value="5">Table 5 (4 people)</option>
        </select>

        <button type="submit">Book Now</button>
    </form>
</div>

<?php include 'footer.php'; ?>
