<?php 
session_start();
require('connection.php');
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Contact Me</title>
    <link rel="stylesheet" href="styles.css" />
    <style>
      .card {
        border-radius: 11px;
        padding: 20px;
        box-shadow: 0 14px 18px 0 rgba(0, 0, 0, 0.2),
          0 16px 30px 0 rgba(0, 0, 0, 0.19);
        width: 90%;
        max-width: 600px;
        margin: auto;
        margin-top: 5%;
        text-justify: auto;
      }

      .contact-info h2,
      .contact-info p {
        margin-bottom: 20px;
      }

      .contact-info ul {
        list-style: none;
        padding: 0;
      }

      .contact-info ul li {
        margin-bottom: 10px;
      }

      .contact-info ul ul {
        margin-top: 5px;
      }

      .contact-info ul ul li {
        margin-bottom: 5px;
      }

      .social-icons img {
        width: 30px;
        height: auto;
        margin-right: 15px;


      }
    </style>
  </head>
  <body>

    <ul class="topnav">
      <li class="company"><strong>Spectro Gaming</strong></li>
      <li class="right"><a href="#" ><strong >Profile</strong> : <?php echo $_SESSION["uname"]; ?></a></li>
      <li class="right"><a href="logout.php">Logout</a></li>
      <li  class="right"><a class="active" href="contact.html">Contact Us</a></li>
      <li  class="right"><a  href="game.php">Home</a></li>
</ul>

    <div class="card">
      <div class="contact-info">
        <h2>Get in Touch</h2>
        <p>
          If you have any questions, feel free to reach out to me through the
          following channels:
        </p>
        <ul>
          <li>Email: desaiprince400@gmail.com</li>
          <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;       nishantdholakia2020@gmail.com</li>
          <li>Phone: +919408184689</li>
          <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;+918320829412</li>
        </ul>
      </div>
    </div>

    <div class="card">
      <h3>Follow Us</h3><BR>
      <p>Follow us on social media:</p><BR>
      <h4>Prince Desai : </h4>
      <div class="social-icons">
        <a href="https://www.instagram.com/princedesai_13/" target="_blank">
          <img src="insta.png" alt="Instagram" />
        </a>
        <a
          href="https://www.linkedin.com/in/prince-desai-981642287/"
          target="_blank"
        >
          <img src="link.png" alt="LinkedIn" />
        </a>
      </div>
      <br>
      <h4>Nishant Dholakia : </h4>
      <div class="social-icons">
        <a href="https://www.instagram.com/_nishantdholakia_0918/" target="_blank">
          <img src="insta.png" alt="Instagram" />
        </a>
        <a
          href="https://www.linkedin.com/in/nishant-dholakia-a43bb02a8/"
          target="_blank"
        >
          <img src="link.png" alt="LinkedIn" />
        </a>
      </div>
    </div>

    <div class="footer">
      <div class="copyright">
        &copy; 2024 SPECTRO GAMMING. All Rights Reserved.
      </div>
    </div>
  </body>
</html>
