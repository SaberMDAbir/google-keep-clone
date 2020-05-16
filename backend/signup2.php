<?php
require('signup-header.php');
?>

  <body>
<?php
require('keep_connect.php');
if ($_SERVER['REQUEST_METHOD']=='POST'){
  if (!empty($_POST['newUser'])&&!empty($_POST['newEmail'])&&!empty($_POST['newPass'])){ //form validation
    $tryName=$_POST['newUser'];
    $checkUserName="select user_name from users where user_name='$tryName'";
    $run=mysqli_query($dbc,$checkUserName);
    if (mysqli_num_rows($run)==0){
      $newUser=$_POST['newUser'];

      $email=$_POST['newEmail'];
      $password=$_POST['newPass'];

      $addNewUserToUsers="insert into users (user_name, email, password) values ('$newUser', '$email', sha1('$password'))";
      $run=mysqli_query($dbc,$addNewUserToUsers);
      echo "<p id='userNameAccepted'>Thank you! <br /> You've registered!</p>";
      header("Refresh:3, URL=signin.php");
    }else{
      echo "<p id='userNameError'>This username already exists, please choose a different username.</p>";
    }
  }else{
	  echo "Please fill out all fields";
  }
}
mysqli_close($dbc);
?>
    <div class="container">
        <div class="signup-container row justify-content-center">
            <div class="signup-form-left d-inline-block col">
            <!-- style the google logo to be smaller -->
            <img id="google-logo-small" src="../frontend/assets/google-rect-logo.svg" alt="Google Logo">
                <div class="heading-text-width">
                    <h1 id="heading-text">Verify your phone number</h1>
                    <p id="heading-subtext">
                        For your security, Google wants to make sure it’s really you. Google will send a text message with a 6-digit verification code. <span class="italicize-text">Standard rates apply</span> 
                    </p>
                    <!-- Italicize the above text -->
                </div>
                
                <form class="signup-view" action="signup2.php" method=POST>
                <div class="form-group form-row">
                    <select name="countryCode" id="country-code">
                        <!-- Include the image by using jquery: https://jqueryui.com/selectmenu/#custom_render -->
                        <option value="1">United States +1</option>
                        <option value="93">Afghanistan +93</option>
                    </select>
                    <input type="tel" name="phoneNumber" class="col" placeholder="Phone number" aria-label="Phone number" autocomplete="off" value="">
                </div>
                <div class="btn-group">
                    <button type="button" class="btn btn-link"><a href="#">Back</a></button>
                    <button type="button" class="btn btn-primary">Next</button>
                </div>
                </form>
            </div> 

            <div class="signup-form-right d-inline-block col">
            <figure class=security-image>
                <img src="../frontend/assets/google-lock.svg" role="presentation" class="figure-image-security">
                <figcaption class="security-image-caption">Your personal info is private & safe</figcaption>
            </figure>
            </div>
        </div>
    </div>
    </body>

 <?php
require('signup-footer.php');
?>