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

  <div class="signup-container row">
    <div class="signup-form-left d-inline-block col">
      <!-- style the google logo to be smaller -->
      <img id="google-logo-small" src="../frontend/assets/google-rect-logo.svg" alt="Google Logo">
        <div class="heading-text-width">
            <h1 id="heading-text">Privacy and Terms</h1>
        </div>
        
        <div class="privacy-and-terms">
            <p>To create a Google Account, you’ll need to agree to the <a href="https://policies.google.com/terms?hl=en&gl=US">Terms of Services</a> below.</p>
            <p>In addition, when you create an account, we process your information as described in our <a href="https://policies.google.com/privacy?hl=en&gl=US">Privacy Policy</a>, including these key points:</p>
            <div class="small-bold-heading">
                Data we process when you use Google:
            </div>
            <ul>
                <li>When you set up a Google Account, we store information you give us like your name, email address, and telephone number.</li>
                <li>When you use Google services to do things like write a message in Gmail or comment on a YouTube video, we store the information you create.</li>
                <li>When you search for a restaurant on Google Maps or watch a video on YouTube, for example, we process information about that activity – including information like the video you watched, device IDs, IP addresses, cookie data, and location.</li>
                <li>We also process the kinds of information described above when you use apps or sites that use Google services like ads, Analytics, and the YouTube video player.</li>
            </ul>
            <div class="small-bold-heading">
                Why we process it
            </div>
            <p>We process this data for the purposes described in our policy, including to:</p>
            <ul>
                <li>Help our services deliver more useful, customized content such as more relevant search results;</li>
                <li>Improve the quality of our services and develop new ones;</li>
                <li>Conduct analytics and measurement to understand how our services are used. We also have partners that measure how our services are used. Learn more about these specific advertising and measurement partners.</li>
            </ul>
            <div class="small-bold-heading">
                Combining Data
            </div>
            <p>We also combine this data among our services and across your devices for these purposes. For example, depending on your account settings, we show you ads based on information about your interests, which we can derive from your use of Search and YouTube, and we use data from trillions of search queries to build spell-correction models that we use across all of our services.</p>
            <div class="small-bold-heading">
                You're in control
            </div> 
            <p>Depending on your account settings, some of this data may be associated with your Google Account and we treat this data as personal information. You can control how we collect and use this data now by clicking “More Options” below. You can always adjust your controls later or withdraw your consent for the future by visiting My Account (myaccount.google.com).</p>
        </div>

        <div class="btn-group">
            <button type="button" class="btn btn-link"><a href="signup1.php">Cancel</a></button>
            <button type="button" class="btn btn-primary">I agree</button>
            <!-- After pressing the I agree button, user is redirected to signedin page -->
        </div>
    </div> 

    <div class="signup-form-right d-inline-block col">
      <figure class=security-image>
        <img src="../frontend/assets/google-controls.svg" role="presentation" class="figure-image-security">
        <figcaption class="security-image-caption">You’re in control of the data we collect & how it’s used</figcaption>
      </figure>
    </div>
  </div>
 </body>

 <?php
require('signup-footer.php');
?>