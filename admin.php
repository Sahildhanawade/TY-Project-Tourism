<?php
$hotels = json_decode(file_get_contents("hotels.json"), true);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin - Hotel Management</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h2>Admin - Hotel Management</h2>

<form action="add_hotel.php" method="POST" enctype="multipart/form-data">
    <input type="text" name="name" placeholder="Hotel Name" required><br><br>
    <textarea name="address" placeholder="Address" required></textarea><br><br>
    <input type="url" name="map" placeholder="Google Map Link"><br><br>
    <input type="email" name="email" placeholder="Contact Email" required><br><br>
    <input type="text" name="owner" placeholder="Owner Name" required><br><br>
    <input type="text" name="phone" placeholder="Contact Number" required><br><br>
    <input type="file" name="photo" accept="image/*" required><br><br>
    <button type="submit" >Add Hotel</button>
</form>


<hr>
<h3>Existing Hotels</h3>
<?php foreach ($hotels as $index => $hotel): ?>
    <div class="hotel">
        <strong><?= htmlspecialchars($hotel['name']) ?></strong><br>
        <?= htmlspecialchars($hotel['address']) ?><br>
        <a href="delete_hotel.php?id=<?= $index ?>" onclick="return confirm('Delete this hotel?')">Delete</a>
    </div>
<?php endforeach; ?>
</body>
</html>
