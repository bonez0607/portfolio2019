<?

require("private/keys.php");
$statusmessage;

if (isset($_POST["submit"])) {

  $postData = $_POST;


  if(!empty($_POST["fullName"]) &&  !empty($_POST["email"]) && !empty($_POST["message"])) {


    if(isset($_POST["g-recaptcha-response"]) && !empty($_POST["g-recaptcha-response"])){

      //verify response
      $verifyResponse = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=". $secretkey ."&response=" . $_POST['g-recaptcha-response']);

      //decode json
      $responseData = json_decode( $verifyResponse );

      if($responseData->success){

        $name = $_POST["fullName"];

        $to = "joebanegas@gmail.com";
        $from = "joe@joebanegas.com";

        // Set the email subject.
        $subject = "Someone's checking out your site!";

        // Build the email content.
        $content = "Name: ".$_POST["fullName"]."\n";
        $content .= "Email: " . $_POST["email"] . "\n\n";
        $content .= "Message: \n" . $_POST["message"] . "\n";

        // Build the email headers.
        $headers = "From: joe@joebanegas.com";

        // Send the email.
        mail($to, $subject, $content, $headers, '-f'.$from);
        echo 'Thank You! Your message has been sent.';


      } else {
        $statusmessage = "Robot verification failed, please try again";
      }
    }else {
      $statusmessage = "Please check the reCaptcha Box";
    }

  } else {
    $statusmessage = "Please fill all the mandatory fields";
  }
} 
?>



<!DOCTYPE html>
<html>
  <head>
    <title>Contact Me| Joseph Banegas' Portfolio</title>
    <?php include("./includes/head.html") ?>
    <meta name='description', content=' We decided on an e-newsletter that would go out quarterly. In each issue we would feature some of the latest publications, some events, and then a section titles “more to explore” which would provide helpful agroforestry-related links to the reader. This is the process'/>
    <meta name='keywords', content='emaail, html, design, front-end developer, web, joe banegas, joseph banegas, banegas, benegas, bangas, banagas'/>

<script>

var recaptchachecked;
function recaptchaCallback() {
    return new Promise(function(resolve, reject) { 

    //Your code logic goes here

      //If we managed to get into this function it means that the user checked the checkbox.
    console.log('test')
    document.getElementById('submit').removeAttribute("disabled");
    recaptchachecked = true;

    //Instead of using 'return false', use reject()
    //Instead of using 'return' / 'return true', use resolve()
    resolve();

    });

  
}

</script>
 </head>
  <body class="project-pages contact">
    <?php if(!empty($statusmessage)){ ?>
        <p class='status'><?php echo $statusmessage; ?></p>
    <?php  } ?>
    <section class="hero">
      <?php include("./includes/nav-bar.html") ?>
      <img id="hero-contact" src="./assets/images/hero-contact.png" />
      <h1>Contact <br>
        <div class="last-name">Me</div>
      </h1>
    </section>
    <section class="copy">              
      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label for="first">Full Name</label>
        <input type="text" name="fullName" value="<?php echo htmlspecialchars($fullName);?>">
        <span class="error"><?php echo $nameErr;?></span>
        
        <label for="email">Email</label>
        <input type="email" name="email" value="<?php echo htmlspecialchars($email);?>">
        <span class="error"><?php echo $emailErr;?></span>
        
        <label for="message">Message</label>
        
        <textarea name="message" rows="15" value="<?php echo htmlspecialchars($message);?>"></textarea>
        <span class="error"><?php echo $messageErr;?></span>

        <div style="display: block; width: 100%;"  class="g-recaptcha" data-callback="recaptchaCallback" data-sitekey="<?php echo $sitekey ?>"></div>

        <button id="submit" class="btn purple" type="submit" name="submit" disabled>Send message</button>
      </form>
    </section>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

  </body>
</html>