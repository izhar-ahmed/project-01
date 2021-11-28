<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>People Update</title>
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
<?php

if (isset($_POST['update_btn']) && $_POST['update_btn'] == "Update") {
  // echo "Running block";
    $id = $_POST['id'];
    // echo "<pre>". $id ."</pre>";
    $firstName = $_POST['first_name'];
    // echo "<pre>". $firstName ."</pre>";
    $lastName = $_POST['last_name'];
    $gender = $_POST['gender'];
    $dateOfBirth = $_POST['date'];
    $vehical = $_POST['vehical'];
    $car = $_POST['car'];
    $address = $_POST['address'];

    $old_photo = $_POST['old_photo'];
    // echo "<pre>".print_r($_FILES)."</pre>";
    
    if (empty($_FILES['photo']['name'])) {
      $photo = $old_photo;
    } else {
      // MARK: delete the old photo
      // echo "old photo: ".$old_photo;
      if (file_exists("img/".$old_photo)) {
        unlink("img/".$old_photo);
      }

      $photo = $_FILES['photo']['name'];
      $tempName = $_FILES['photo']['tmp_name'];
      $folder = "img/".$photo;
      move_uploaded_file($tempName,$folder);
    }
    $updateQuery = "UPDATE peopleinfo SET FirstName = '$firstName', LastName = '$lastName', Gender = '$gender', DateOfBirth = '$dateOfBirth',
     Vehical = '$vehical', Photo = '$photo', Car = '$car', Address = '$address' WHERE id = $id";
     $updateQueryRun = mysqli_query($con, $updateQuery);
     if($updateQueryRun){
       header("Location: dashboard-message.php?message_type=update&msg=success");
     }else{
       header("Location: dashboard-message.php?message_type=update&msg=failed");
    }
     
    
} else {

  $id = empty($_GET['id']) ? 0 : $_GET['id'];
  // echo "<pre>". $id ."</pre>";
  $q = "SELECT * FROM peopleinfo where id=$id";

  $result = mysqli_query($con, $q);
  $row = mysqli_fetch_array($result);
  $firstName = $row['FirstName'];
  $lastName = $row['LastName'];
  $gender = $row['Gender'];
  $dateOfBirth = $row['DateOfBirth'];
  $vehical = $row['Vehical'];
  $car = $row['Car'];
  $address = $row['Address'];
  $photo = $row['Photo'];
}


?>
<h1 class="heading1 text-center">Update People Info</h1>


<form action="people-update.php" method="POST" style="margin-left: 200px;" enctype="multipart/form-data">
    <label for="name">First Name:</label><br />
    <input type="text" class="input-text" name="first_name" value="<?php echo $firstName; ?>"><br />
    <label for="name">Last Name:</label><br />
    <input type="text" class="input-text" name="last_name" value="<?php echo $lastName; ?>"><br />
    <label for="gender">Gender:</label><br />
    <label class="input-radio">Male
       <input type="radio" name="gender" value="Male"<?php if ($gender == 'Male') {echo "checked";}?>>
       <span class="checkmark-radio"></span>
     </label>
     <label class="input-radio">Female
       <input type="radio" name="gender" value="Female"<?php if ($gender == 'Female') {echo "checked";}?>>
       <span class="checkmark-radio"></span>
     </label><br />
     <label for="date">Date Of Birth:</label><br />
     <input type="date" value="<?php echo $dateOfBirth; ?>" name="date" id="" class="input-date input-text"><br /><br />
     <label for="vehical">Vehical:</label><br />
     <label class="input-check">Bike
       <input type="checkbox" name="vehical" value="Bike" <?php if ($vehical == 'Bike') {echo "checked";}?>>
       <span class="checkmark"></span>
     </label>
     <label class="input-check">Car
       <input type="checkbox" name="vehical" value="Car" <?php if ($vehical == 'Car') {echo "checked";}?>>
       <span class="checkmark"></span>
     </label>
     <label class="input-check">Boat
       <input type="checkbox" name="vehical" value="Boat" <?php if ($vehical == 'Boat') {echo "checked";}?>>
       <span class="checkmark"></span>
     </label><br /><br />
     <label for="photo">Upload Photo:</label><br />
     <input type="file" name="photo" id="" class=""><br><br>
     <label for="sport">Choose a sport car</label>
     <div class="custome-select" style="width:200px;">
       <select name="car">
         <option value="0" selected>Select car:</option>
         <option value="1" <?php if ($car == 'Audi') {echo "selected";}?>>Audi</option>
         <option value="2" <?php if ($car == 'BMW') {echo "selected";}?>>BMW</option>
         <option value="3" <?php if ($car == 'Citroen') {echo "selected";}?>>Citroen</option>
         <option value="4" <?php if ($car == 'Ford') {echo "selected";}?>>Ford</option>
         </select>
     </div><br>
     <label for="address">Address:</label><br />
     <textarea id="address" name="address" rows="4" cols="20" class="input-txtarea"><?php echo $address ?></textarea>
     <br>
     <input type="hidden" name="id" value=<?php echo $id;?>>
     <input type="hidden" name="old_photo" value=<?php echo $photo;?>>
     <button type="submit" class="btn bg-color2 color1" name="update_btn" value="Update">Update</button>
     <a href="people.php" class="btn bg-color4">Cancel</a>


</form>


    </section>
    <section class="footer">
        <a href="about.html">About App</a>
        <p class="text-center">copyright &copy; 2021</p>

    </section>




</body>

</html>