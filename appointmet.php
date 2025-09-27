<?php
// Database connection
$conn = mysqli_connect('localhost', 'root', 'Kaniti@123', 'contact_db') or die('Connection failed');

// Initialize message array
$message = [];

// Handle Appointment Form submission
if (isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $number = $_POST['number'];
    $date = $_POST['date'];

    // Insert appointment details into the database
    $insert = mysqli_query($conn, "INSERT INTO contact_form(name, email, number, date) VALUES('$name', '$email', '$number', '$date')") or die('Query failed');

    if ($insert) {
        echo '<script>alert("Appointment made successfully!");</script>';
    } else {
        echo '<script>alert("Appointment failed.");</script>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment Section</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            color: #333;
        }
        .appointment {
            padding: 50px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
            max-width: 900px;
            margin: 50px auto;
        }
        .heading {
            text-align: center;
            font-size: 2rem;
            color:rgb(27, 216, 200);
            margin-bottom: 20px;
        }
        .heading span {
            color: #007bff;
        }
        .row {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            align-items: center;
        }
        .image {
            flex: 1;
            text-align: center;
        }
        .image img {
            max-width: 100%;
            height: auto;
        }
        form {
            flex: 1;
            padding: 20px;
            background-color: #f8f9fa;
            border-radius: 10px;
        }
        form h3 {
            font-size: 1.5rem;
            margin-bottom: 20px;
            color: #0056b3;
        }
        form .box {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 1rem;
        }
        form .btn {
            width: 100%;
            padding: 10px;
            background-color:rgb(35, 233, 124);
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 1rem;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        form .btn:hover {
            background-color: #0056b3;
        }
        .message {
            background-color: #d4edda;
            color: #155724;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #c3e6cb;
            border-radius: 5px;
            text-align: center;
        }
    </style>
</head>
<body>
    <section class="appointment" id="appointment">

        <h1 class="heading"> <span>appointment</span> now </h1>    

        <div class="row">

            <div class="image">
                <img src="image/appointment-img.svg" alt="Appointment Illustration">
            </div>

            <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
            <?php
                if(isset($message)) {
                    foreach($message as $message) {
                    echo'<p class ="message">'.$message.'</p>';
                }
                }
            ?>
          
                <h3>Make Appointment</h3>
                <input type="text" name="name" placeholder="Your Name" class="box">
                <input type="number" name="number" placeholder="Your Number" class="box">
                <input type="email" name="email" placeholder="Your Email" class="box">
                <input type="date" name="date" class="box">
                <input type="submit" name="submit" value="Appointment Now" class="btn">
            </form>

        </div>

    </section>
</body>
</html>
