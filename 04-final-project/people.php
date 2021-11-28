<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>People</title>
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
        <?php include 'connection.php'?>
        <h1 class="text-center">List Of People</h1>
        <a href="people-add.php" class="btn bg-color2 color1 btn-list">Insert</a>
        <table class="tablecontrol">
            <thead>
              <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th colspan="3">Action</th>
              </tr>
            </thead>
            <tbody>
                <?php

$displayquery = "SELECT * FROM peopleinfo";
$querydisplay = mysqli_query($con, $displayquery);



while ($row = mysqli_fetch_array($querydisplay)) {
    ?>
                        <tr>
                <td><?php echo $row['FirstName'] ?></td>
                <td><?php echo $row['LastName'] ?></td>
                <td><a href="people-update.php?id=<?php echo $row['ID']; ?>" class="btn bg-color2 color1">Edit</a></td>
                <td><a href="people-view.php?id=<?php echo $row['ID']; ?>" class="btn bg-color2 color1">View</a></td>
                <td><a href="people-delete.html" class="btn bg-color2 color1">Delete</a></td>
            </tr>

<?php
}

?>

            </tbody>

        </table>
    </section>
    <section class="footer">
        <a href="about.html">About App</a>
        <p class="text-center">copyright &copy; 2021</p>

    </section>




</body>

</html>