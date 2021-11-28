<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>People Details</title>
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
        <?php
        
         $id = $_GET['id'];
         $q = "SELECT * FROM peopleinfo WHERE id= $id";
         $querydetails = mysqli_query($con, $q);

         $row = mysqli_fetch_array($querydetails);
        
        ?>

        <h1 class="text-center">People Detail</h1>
        <div class="row">
            <div class="col5">
            <p><b>First Name:</b> <?php echo $row['FirstName'] ?></p>
            <p><b>Address:</b> <?php echo $row['Address'] ?></p>
            <p><b>Date Of Birth:</b> <?php echo $row['DateOfBirth'] ?></p>
            <p><b>Sport Car:</b> <?php echo $row['Car'] ?></p>
            <p><b>Picture:</b></p><img src="img/<?php echo $row['Photo'] ?>" alt="" height="150">
            </div>
            <div class="col2"></div>
            <div class="col3">
              <p><b>Last Name:</b> <?php echo $row['LastName'] ?></p>
              <p><b>Gender:</b> <?php echo $row['Gender'] ?></p>
              <p><b>Vehical:</b> <?php echo $row['Vehical'] ?></p>
            </div>
        </div>
    </section>
    <section class="footer">
        <a href="about.html">About App</a>
        <p class="text-center">copyright &copy; 2021</p>

    </section>




</body>

</html>