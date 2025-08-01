<?php /* ...existing code... */ ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Book & Manage Appointments</title>
    <link rel="stylesheet" href="css/book-dashboard.css" />
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
          <li><a href="book-dashboard.php">Book & Manage</a></li>
          <li><a href="logout.php">Logout</a></li>
        </ul>
      </nav>
    </header>
    <main>
      <div class="dashboard-container">
        <h2>Book & Manage Your Appointments</h2>

        <!-- Book New Appointment Form -->
        <form id="quickBookForm">
          <select name="specialty" required>
            <option value="">Select Specialty</option>
            <option value="general">General</option>
            <option value="cardiology">Cardiology</option>
            <option value="dermatology">Dermatology</option>
          </select>

          <select name="doctorId" required>
            <option value="">Select Doctor</option>
            <option value="1">Dr. Susan Nkem</option>
            <option value="2">Dr. Francis Ewule</option>
          </select>

          <input type="datetime-local" name="timeSlot" required />
          <button type="submit">Book Appointment</button>
        </form>

        <!-- Upcoming Appointments Section -->
        <div class="appointments-section">
          <h3>Upcoming Appointments</h3>
          <ul class="appointments-list">
            <li>
              <span>Dr. Susan Nkem</span> - 2025-07-15 10:00 AM
              <span class="status confirmed">Confirmed</span>
              <button class="cancel-btn">Cancel</button>
              <button class="reschedule-btn">Reschedule</button>
            </li>
            <li>
              <span>Dr. Francis Ewule</span> - 2025-07-20 02:00 PM
              <span class="status pending">Pending</span>
            </li>
          </ul>
        </div>

        <!-- Appointment History Section -->
        <div class="appointments-section">
          <h3>Booking History</h3>
          <ul class="appointments-list">
            <li>
              <span>Dr. Joy Mbua</span> - 2025-06-10 11:00 AM
              <span class="status completed">Completed</span>
              <a href="emr-dashboard.php" class="view-emr">View EMR</a>
            </li>
          </ul>
        </div>
      </div>
    </main>
    <footer>
      <p>&copy; 2025 TeleMDS. All rights reserved.</p>
    </footer>
  </body>
</html>