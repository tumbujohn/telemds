<?php
// superadmin-dashboard.php
// This page allows the super admin to approve doctors from the users table
include 'php/db.php';
session_start();

// Super admin demo credentials
$superadminPassword = 'superadmin2025';

// Check if super admin is logged in
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'superadmin') {
    // Show superadmin login form
    echo '<!DOCTYPE html><html lang="en"><head><meta charset="UTF-8"><title>Super Admin Login</title><link rel="stylesheet" href="css/style.css"></head><body style="text-align:center;padding:40px;">';
    echo '<h1>Super Admin Login</h1>';
    echo '<form method="POST" action="">
        <input type="text" name="username" placeholder="Username" required style="margin-bottom:10px;"><br>
        <input type="password" name="password" placeholder="Password" required style="margin-bottom:10px;"><br>
        <button type="submit">Login</button>
    </form>';
    echo '<div style="margin-top:20px;color:#333;background:#f8f8f8;padding:10px;border-radius:6px;">';
    echo '<strong>Super Admin Credentials (for demo):</strong><br>Username: <code>superadmin</code><br>Password: <code>' . htmlspecialchars($superadminPassword) . '</code></div>';
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $username = $_POST['username'] ?? '';
        $password = $_POST['password'] ?? '';
        if ($username === 'superadmin' && $password === $superadminPassword) {
            $_SESSION['user_id'] = 0;
            $_SESSION['name'] = 'Super Admin';
            $_SESSION['role'] = 'superadmin';
            header('Location: superadmin-dashboard.php');
            exit;
        } else {
            echo '<p style="color:red;">Invalid credentials.</p>';
        }
    }
    echo '</body></html>';
    exit;
}

// Fetch all users with doctor role and check if they are approved (in doctors table)
$doctors = [];
try {
    // Join on name since doctors table does not have doctor_id
    $stmt = $conn->query("SELECT u.id, u.name, u.email, d.id AS approved, d.specialty FROM users u LEFT JOIN doctors d ON u.name = d.name WHERE u.role = 'doctor'");
    $doctors = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (Exception $e) {
    echo '<div style=\'color:red\'>Error: ' . htmlspecialchars($e->getMessage()) . '</div>';
    $doctors = [];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Super Admin Dashboard</title>
    <link rel="stylesheet" href="css/admin-dashboard.css">
</head>

<body>
    <header>
        <div class="header-flex">
            <img src="images/logo.png" alt="Logo" class="header-logo" />
            <h1>Super Admin Dashboard</h1>
        </div>
        <nav>
            <ul>
                <li><a href="superadmin-dashboard.php">Super Admin Home</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <section>
            <h2>Doctor Approval Management</h2>
            <?php if (count($doctors) === 0): ?>
            <p>No doctors found.</p>
            <?php else: ?>
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Specialty</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($doctors as $doc): ?>
                    <tr>
                        <td><?= htmlspecialchars($doc['name']) ?></td>
                        <td><?= htmlspecialchars($doc['email']) ?></td>
                        <td><?= htmlspecialchars($doc['specialty'] ?? '') ?></td>
                        <td><?= $doc['approved'] ? '<span style="color:green;">Approved</span>' : '<span style="color:orange;">Pending</span>' ?>
                        </td>
                        <td>
                            <?php if (!$doc['approved']): ?>
                            <form method="post" action="php/approve_doctor.php" style="display:inline;">
                                <input type="hidden" name="user_id" value="<?= $doc['id'] ?>">
                                <input type="hidden" name="name" value="<?= htmlspecialchars($doc['name']) ?>">
                                <input type="hidden" name="email" value="<?= htmlspecialchars($doc['email']) ?>">
                                <input type="hidden" name="phone" value="<?= isset($doc['phone']) ? htmlspecialchars($doc['phone']) : '' ?>">
                                <input type="hidden" name="specialty" value="<?= htmlspecialchars($doc['specialty'] ?? '') ?>">
                                <button type="submit">Approve</button>
                            </form>
                            <?php else: ?>
                            <span style="color:gray;">—</span>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <?php endif; ?>
        </section>
    </main>
</body>

</html>