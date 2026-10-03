<?php
session_start();
if(!isset($_SESSION['admin'])){
    header("Location: login.php");
    exit;
}

require_once "conn.php";

// Optional: filter by tour
$tour_filter = isset($_GET['tour']) ? $_GET['tour'] : '';

$sql = "SELECT * FROM bookings";
if($tour_filter) $sql .= " WHERE tour='$tour_filter'";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel</title>
</head>
<body>
<h2>Welcome, <?php echo $_SESSION['admin']; ?></h2>
<a href="logout.php">Logout</a>
<h3>Bookings</h3>

<form method="GET">
    <select name="tour">
        <option value="">All Tours</option>
        <option value="Peerchanasi">Peerchanasi</option>
        <option value="Danna">Neelum Valley</option>
        <option value="Rajpothi">Rajpothi</option>
    </select>
    <button type="submit">Filter</button>
</form>

<table border="1" cellpadding="5" cellspacing="0">
    <tr>
        <th>ID</th>
        <th>Email</th>
        <th>Tour</th>
        <th>Submitted At</th>
    </tr>
    <?php while($row = $result->fetch_assoc()): ?>
    <tr>
        <td><?php echo $row['id']; ?></td>
        <td><?php echo $row['email']; ?></td>
        <td><?php echo $row['tour']; ?></td>
        <td><?php echo $row['submitted_at']; ?></td>
    </tr>
    <?php endwhile; ?>
</table>

<!-- Optional Export to CSV -->
<form method="POST" action="export.php">
    <button type="submit">Export to CSV</button>
</form>

</body>
</html>

<?php $conn->close(); ?>
