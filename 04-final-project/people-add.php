<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>People Add</title>
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

         <h1 class="heading1 text-center">Insert People Info</h1>

         <form action="dashboard-message.php" method="POST" style="margin-left: 200px;" enctype="multipart/form-data">
             <label for="name">First Name:</label><br />
             <input type="text" class="input-text" name="firstname"><br />
             <label for="name">Last Name:</label><br />
             <input type="text" class="input-text" name="lastname"><br />
             <label for="gender">Gender:</label><br />
             <label class="input-radio">Male
                <input type="radio" name="gender" id="1" value="Male">
                <span class="checkmark-radio"></span>
              </label>
              <label class="input-radio">Female
                <input type="radio" name="gender" id="2" value="Female">
                <span class="checkmark-radio"></span>
              </label><br />
              <label for="date">Date Of Birth:</label><br />
              <input type="date" name="date" id="" class="input-date input-text"><br /><br />
              <label for="vehical">Vehical:</label><br />
              <label class="input-check">Bike
                <input type="checkbox" checked="checked" name="vehical" value="Bike">
                <span class="checkmark"></span>
              </label>
              <label class="input-check">Car
                <input type="checkbox" name="vehical" value="Car">
                <span class="checkmark"></span>
              </label>
              <label class="input-check">Boat
                <input type="checkbox" name="vehical" value="Boat">
                <span class="checkmark"></span>
              </label><br /><br />
              <label for="photo">Upload Photo:</label><br />
              <input type="file" name="photo" id="" class=""><br><br>
              <label for="sport">Choose a sport car</label>
              <div class="custome-select" style="width:200px;">
                <select name="car">
                  <option value="0">Select car:</option>
                  <option value="Audi">Audi</option>
                  <option value="BMW">BMW</option>
                  <option value="Citroen">Citroen</option>
                  <option value="Ford">Ford</option>
                  </select>
              </div><br>
              <label for="address">Address:</label><br />
              <textarea id="" name="address" rows="4" cols="20" class="input-txtarea"></textarea>
              <br>

              <input type="submit" class="btn bg-color2 color1" name="submit">
              <a href="people.php" class="btn bg-color4">Cancel</a>


         </form>

    </section>
    <section class="footer">
        <a href="about.html">About App</a>
        <p class="text-center">copyright &copy; 2021</p>

    </section>




</body>

</html>