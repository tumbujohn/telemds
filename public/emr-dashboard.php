<?php /* ...existing code... */ ?>
<!--// === View EMR Dashboard Page === -->
<!--/* File: emr-dashboard.php */ -->

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>View Medical Records</title>
    <link rel="stylesheet" href="css/emr-dashboard.css" />
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
          <li><a href="emr-dashboard.php">Medical Records</a></li>
          <li><a href="logout.php">Logout</a></li>
        </ul>
      </nav>
    </header>
    <main>
      <div class="dashboard-container">
        <h2>My Medical Records</h2>

        <!-- EMR Table -->
        <table class="emr-table">
          <thead>
            <tr>
              <th>Date</th>
              <th>Doctor</th>
              <th>Summary</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>2025-06-10</td>
              <td>Dr. Joy Mbua</td>
              <td>Follow-up consultation and prescription</td>
              <td>
                <a href="records/emr-2025-06-10.pdf" class="btn" download
                  >Download</a
                >
              </td>
            </tr>
            <tr>
              <td>2025-05-12</td>
              <td>Dr. Susan Nkem</td>
              <td>General check-up. No concerns.</td>
              <td>
                <a href="records/emr-2025-05-12.pdf" class="btn" download
                  >Download</a
                >
              </td>
            </tr>
          </tbody>
        </table>

        <div class="nav-back">
          <a href="dashboard.php" class="card">← Back to Dashboard</a>
        </div>
      </div>
    </main>
    <footer>
      <p>&copy; 2025 TeleMDS. All rights reserved.</p>
    </footer>
  </body>
</html>