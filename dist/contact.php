<?

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $errors = false;

  if (empty($_POST["fullName"])) :
      $nameErr = "Missing";
      $errors = true;
  else :
      $name = trim(strip_tags($_POST["fullName"]));
  endif;


  if (empty($_POST["email"]))  {
      $emailErr = "Missing";
      $errors = true;
  }
  else {
      $email = trim(filter_var($_POST['email'], FILTER_SANITIZE_EMAIL));
  }


  if (empty($_POST["message"]))  {
      $messageErr = "Missing";
      $errors = true;
  }
  else {
      $message = trim($_POST["message"]);
  }


  $recipient = "joebanegas@gmail.com";

  // Set the email subject.
  $email_subject = "New contact from $name";

  // Build the email content.
  $email_content = "Name: $name\n";
  $email_content .= "Email: $email\n\n";
  $email_content .= "Subject:\nSomeone's checking out your site!\n";
  $email_content .= "Message:\n$message\n";

  // Build the email headers.
  $email_headers = "From:" .  $name . "<" . $email . ">";

  // Send the email.
  if ( !$errors ) {
      // Set a 200 (okay) response code.
      http_response_code(200);
      mail($recipient, $email_subject, $email_content, $email_headers);
      echo 'Thank You! Your message has been sent.';
  } else {
      // Set a 500 (internal server error) response code.
      http_response_code(500);
      echo "Oops! Something went wrong and we couldn't send your message.";
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



 </head>
  <body class="project-pages contact">
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

        <button class="btn purple" type="submit" name="submit">Send message</button>
      </form>
    </section>
    <?php include("./includes/footer.html")?>
  </body>
</html>