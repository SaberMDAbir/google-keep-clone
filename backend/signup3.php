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
            <h1 id="heading-text">First Name, welcome to Google</h1>
            Display the Username here
            <!-- Use php and sql for the above -->
        </div>
        
        <form class="signup-view" action="signup3.php" method=POST>
            <div class="form-group form-row">
                <select name="countryCode" id="country-code">
                    <!-- Include the image by using jquery: https://jqueryui.com/selectmenu/#custom_render -->
                    <option value="1">United States +1</option>
                    <option value="93">Afghanistan +93</option>
                </select>
                <input type="tel" name="phoneNumber" class="col" placeholder="Phone number" aria-label="Phone number" autocomplete="off" value="">
            </div>
            <div class="small-letters-signup-page">
                We’ll use your number for account security. It won’t be visible to others.
            </div>
            <input type="text" name="recoveryEmail" class="form-control" placeholder="Recovery email address (optional)" aria-label="Recovery Email Address" autocomplete="off" spellcheck="False" autocapitalize="sentences" value=""">
            <div class="small-letters-signup-page">
                We’ll use it to keep your account secure
            </div>
            <div class="form-group form-row">
                <select name="monthDOB" id="month" aria-labelledby="month-label">
                    <option value="NULL">Month</option>
                    <option value="1">January</option>
                    <option value="2">February</option>
                    <option value="3">March</option>
                    <option value="4">April</option>
                    <option value="5">May</option>
                    <option value="6">June</option>
                    <option value="7">July</option>
                    <option value="8">August</option>
                    <option value="9">September</option>
                    <option value="10">October</option>
                    <option value="11">November</option>
                    <option value="12">December</option>
                </select>
                <input type="number" name="dayDOB" class="col" placeholder="Day" aria-label="Day" autocomplete="off" spellcheck="False" autocapitalize="sentences" value="">
                <input type="number" name="yearDOB" class="col" placeholder="Year" aria-label="Year" autocomplete="off" spellcheck="False" autocapitalize="sentences" value=""> 
            </div>
            <div class="small-letters-signup-page">
                Your birthday
            </div>
            <select name="gender" id="gender" aria-labelledby="gender-label">
                <option value="female">Female</option>
                <option value="male">male</option>
                <option value="ratherNotSay">Rather Not Say</option>
            </select>
            <div id="why-we-ask">
                <button type="button" class="btn btn-link"><a href="https://support.google.com/accounts/answer/1733224?hl=en">Why we ask for this information</a></button>
            </div>
            <div class="btn-group">
                <button type="button" class="btn btn-link"><a href="signup2.php">Back</a></button>
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