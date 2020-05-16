<?php
require('signup-header.php');
?>

  <body>
<?php
require('keep_connect.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
  if (!empty($_POST['newUser']) && !empty($_POST['newPass'])){ //form validation
    $tryName = $_POST['newUser'];
    $checkUserName = "SELECT user_name FROM users WHERE user_name='$tryName'";
    $run = mysqli_query($dbc,$checkUserName);
    if (mysqli_num_rows($run) == 0){
      $newUser = $_POST['newUser'];
      
      $email = $_POST['newUser'] . "@gmail.com";
      $password = $_POST['newPass'];

      $addNewUserToUsers = "INSERT INTO users(user_name, email, password) VALUES ('$newUser', '$email', sha1('$password'))";
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
        <div class="signup-form-left col">
          <!-- style the google logo to be smaller -->
          <img id="google-logo-small" src="../frontend/assets/google-rect-logo.svg" alt="Google Logo">
            <h1 id="heading-text">Create your Google Account</h1>
            <form class="register" action="signup.php" method=POST>
              <div class="form-group form-row">
                <input type="text" name="firstName" class="col" placeholder="First name" aria-label="First name" autocomplete="off" spellcheck="False" autocapitalize="sentences" value="">
                <input type="text" name="lastName" class="col" placeholder="Last name" aria-label="Last name" autocomplete="off" spellcheck="False" autocapitalize="sentences" value=""> 
              </div>
              <input type="text" name="newUser" class="username-signup-page form-control" placeholder="Username" aria-label="Username" autocomplete="off" spellcheck="False" autocapitalize="sentences" value="">
              <div class="small-letters-signup-page" aria-live="assertive">
                You can use letters, numbers & periods
              </div>
              <button type="button" class="alternative-email-button">Use my current email address instead</button>
              <!-- After clicking the button above, there is a change in view for the button text and the input with name username. Use ::after to deal with this-->
              <div class="form-group form-row">
                <input type="password" name="newPass" class="password-input col" placeholder="Password" autocomplete="new-password" spellcheck="false" tabindex="0" aria-label="Password" name="Password" autocapitalize="off" autocorrect="off" dir="ltr" data-initial-dir="ltr" data-initial-value="">
                <input type="password" name="confirmPass" class="password-confirm col" placeholder="Confirm" autocomplete="new-password" spellcheck="false" tabindex="0" aria-label="Confirm" name="ConfirmPasswd" autocapitalize="off" autocorrect="off" dir="ltr" data-initial-dir="ltr" data-initial-value="">
              </div>
              <div class="small-letters-signup-page" aria-live="assertive">
                Use 8 or more characters with a mix of letters, numbers &amp; symbols
              </div>
              <div class="btn-group">
                <button type="button" class="btn btn-link"><a href="#">Sign in instead</a></button>
                <button type="submit" class="btn btn-primary" value="Sign Up">Next</button>
              </div>
            </form>
        </div>  
        <div class="signup-form-right col">
          <figure class=security-image>
            <img src="../frontend/assets/google-security.svg" role="presentation" class="figure-image-security">
            <figcaption class="security-image-caption">One account. All of Google working for you.</figcaption>
          </figure>
        </div>
      </div>
    </div>
  </body>

 <?php
require('signup-footer.php');
?>