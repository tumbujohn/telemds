<?php
// === Logout Page ===
// File: logout.php

session_start();
session_unset();
session_destroy();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Logged Out</title>
    <link rel="stylesheet" href="css/logout.css" />
  </head>
  <body>
    <header>
      <div class="header-flex">
        <img src="images/logo.png" alt="Logo" class="header-logo" />
        <h1>TeleMDS</h1>
      </div>
      <nav>
        <ul>
          <li><a href="dashboard.php">Home</a></li>
          <li><a href="login.php">Login</a></li>
        </ul>
      </nav>
    </header>
    <main>
      <div class="logout-container">
        <h2>You have been logged out</h2>
        <p>Thank you for using the Telemedicine Platform.</p>
        <a href="login.php" class="btn">Login Again</a>
      </div>
      <script>
        // Clear session data
        localStorage.clear();
      </script>
    </main>
    <footer>
      <p>&copy; 2025 TeleMDS. All rights reserved.</p>
    </footer>
  </body>
</html>