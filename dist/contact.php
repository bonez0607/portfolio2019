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


  $recipient = "email@domain.com";

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
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="./css/main.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/regular.css" integrity="sha384-aubIA90W7NxJ+Ly4QHAqo1JBSwQ0jejV75iHhj59KRwVjLVHjuhS3LkDAoa/ltO4" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/brands.css" integrity="sha384-1KLgFVb/gHrlDGLFPgMbeedi6tQBLcWvyNUN+YKXbD7ZFbjX6BLpMDf0PJ32XJfX" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/fontawesome.css" integrity="sha384-jLuaxTTBR42U2qJ/pm4JRouHkEDHkVqH0T1nyQXn1mZ7Snycpf6Rl25VBNthU4z0" crossorigin="anonymous">

  <title>Contact Me| Joseph Banegas' Portfolio</title>
  <meta name="author" content="name">
  <meta name="description" content="Joseph Banegas is a designer, front-end developer, and photographer based in Lincoln, NE">
  <meta name="keywords" content="design, photographer, front-end developer, web">
 </head>
  <body class="project-pages">
    <section class="hero">
      <nav>
        <ul class="nav-btns">
          <li class="logo"> <a href="./index.html">Joe Banegas</a></li>
          <li> <a href="./index.html#work">Work </a></li>
          <li> <a href="./about.html">About</a></li>
          <li> <a href="./contact.html">Contact</a></li>
        </ul>
        <ul class="profiles">
          <li> <a href="https://github.com/bonez0607"><i class="fab fa-github"></i></a></li>
          <li><a href="https://stackoverflow.com/users/story/4881490"><i class="fab fa-stack-overflow"></i></a></li>
        </ul>
      </nav>
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
    <footer><a class="logo" href="./index.html">Joe Banegas</a>
      <ul class="nav-btns">
        <li> <a href="./index.html#work">Work </a></li>
        <li> <a href="./about.html">About</a></li>
        <li> <a href="./contact.html">Contact</a></li>
      </ul>
      <div class="copyright">
        <p>&copy; 2018 Joseph Banegas. <br>All rights reserved.</p>
      </div>
      <ul class="profiles">
        <li> <a href="https://github.com/bonez0607"><i class="fab fa-github"></i></a></li>
        <li><a href="https://stackoverflow.com/users/story/4881490"><i class="fab fa-stack-overflow"></i></a></li>
      </ul>
      <div class="contact"><i class="far fa-envelope"></i>
        <p>Looking for someone who isn't afraid to get their hands dirty, solve annoying problems, and keep your clients happy? Then drop me a line: <a href="mailto:joebanegas@gmail.com"> Joebanegas@gmail.com</a></p>
      </div>
      <script src="js/main.js" type="text/javascript"></script>
    </footer>
  </body>
</html>