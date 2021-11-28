<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard</title>
    <link rel="stylesheet" href="css/normalization.css" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/custom.css" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
</head>

<body>

    <nav>
        <div class="container">
            <div class="menu">
                <ul>
                    <li><a href="dashboard.html">Dashboard</a></li>
                    <li><a href="people.php">People<i class="fa fa-caret-down" style="margin-left: 5px;"></i></a>
                        <ul>
                            <li><a href="people-add.php">Add</a></li>
                            <li><a href="people.php">List</a></li>
                        </ul>
                    </li>

                </ul>
                <a href="messages.html" class="btn bg-color2 nav-btn color1">Log Out</a>
            </div>
        </div>
    </nav>

    <section class="container">
        <?php include('connection.php') ?>
        <br><br>

        <?php 
        if (isset($_GET['msg']) && isset($_GET['message_type']) && $_GET['message_type'] == "update") {
            if ($_GET['msg'] == "success") {
        ?>
            <div class="alert alert-success text-center">Record updated successfully.</div>
        <?php
                } else {
        ?>
            <div class="alert alert-danger text-center">Fail to update the record.</div>
        <?php
                }
            }
        ?>
        
        <?php
           if(isset($_POST['submit'])){
               $firstName = $_POST['firstname'];
               $lastName = $_POST['lastname'];
               $gender = @$_POST['gender'];
               $dateOfBirth = $_POST['date'];
               $vehical = $_POST['vehical'];
               $photo = $_FILES['photo']['name'];
               $tempName = $_FILES['photo']['tmp_name'];
               $sportCar = $_POST['car'];
               $address = $_POST['address'];

            
               

               $folder = "img/".$photo;
              
               move_uploaded_file($tempName,$folder);

               $q = "INSERT INTO peopleinfo(FirstName, LastName, Gender, DateOfBirth, Vehical, Photo, Car, Address  ) 
               VALUES ('$firstName', '$lastName', '$gender', '$dateOfBirth', '$vehical', '$photo', '$sportCar', '$address')";

               $query = mysqli_query($con, $q);
               if($query){?>
                           <h1 class="heading1 text-center">Info Inserted Successfully</h1>
<?php
               } else{
                           echo "Insertion failed.".mysqli_error($con);
               }

           }
        ?>
        <div style="width: 100%;text-align: center;">
            <a href="people.php" class="btn bg-color2 color1">Go To List</a>

        </div>
        
    </section>
    <section class="footer">
        <a href="about.html">About App</a>
        <p class="text-center">copyright &copy; 2021</p>

    </section>




</body>

</html>