<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="./css/main.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/regular.css" integrity="sha384-aubIA90W7NxJ+Ly4QHAqo1JBSwQ0jejV75iHhj59KRwVjLVHjuhS3LkDAoa/ltO4" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/brands.css" integrity="sha384-1KLgFVb/gHrlDGLFPgMbeedi6tQBLcWvyNUN+YKXbD7ZFbjX6BLpMDf0PJ32XJfX" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/fontawesome.css" integrity="sha384-jLuaxTTBR42U2qJ/pm4JRouHkEDHkVqH0T1nyQXn1mZ7Snycpf6Rl25VBNthU4z0" crossorigin="anonymous">
  </head>
  <title>Contact Me| Joseph Banegas' Portfolio</title>
  <meta name="author" content="name">
  <meta name="description" content="Joseph Banegas is a designer, front-end developer, and photographer based in Lincoln, NE">
  <meta name="keywords" content="design, photographer, front-end developer, web">
  <link href="./final-products/interactive-map/css/map.css" rel="stylesheet">
  <body class="project-pages">
    <?php echo 'test' ?>
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
      <form>
        <label for="first">First Name</label>
        <input type="text" name="first">
        <label for="last">Last Name</label>
        <input type="text" name="last">
        <label for="email">Email</label>
        <input type="email" name="email">
        <label for="comments">Message</label>
        <textarea name="comments" rows="15"></textarea>
        <button class="btn purple" type="submit">Send message</button>
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