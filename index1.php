<?php
$hotels = json_decode(file_get_contents("hotels.json"), true);
$searchCity = isset($_GET['city']) ? strtolower(trim($_GET['city'])) : '';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Hotel List by City</title>
    <style>
/* Google Fonts Import */
@import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500;600;700&family=Raleway:wght@300;400;500;600&display=swap');

/* Reset & Base Styles */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Raleway', sans-serif;
    background-color: #f8f9fa;
    color: #343a40;
    line-height: 1.7;
    padding: 0;
    margin: 0;
}

.container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 20px;
}

/* Elegant Header */
header {
    background: linear-gradient(to right, #0a2342, #2d4059);
    color: white;
    padding: 60px 0 100px;
    position: relative;
    overflow: hidden;
}

header::before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: url('https://img.freepik.com/free-photo/swimming-pool_74190-2104.jpg?w=1800') no-repeat center center;
    background-size: cover;
    opacity: 0.2;
    z-index: 1;
}

header .container {
    position: relative;
    z-index: 2;
    text-align: center;
}

header h1 {
    font-family: 'Playfair Display', serif;
    font-size: 3.5rem;
    margin-bottom: 15px;
    font-weight: 700;
    letter-spacing: 1px;
}

header p {
    font-size: 1.2rem;
    max-width: 600px;
    margin: 0 auto;
    font-weight: 300;
}

/* Luxury Search Section */
.search-section {
    background-color: white;
    padding: 40px;
    border-radius: 12px;
    box-shadow: 0 15px 30px rgba(0,0,0,0.1);
    max-width: 900px;
    margin: -70px auto 60px;
    position: relative;
    z-index: 10;
}

h2 {
    font-family: 'Playfair Display', serif;
    color: #2d4059;
    margin-bottom: 30px;
    font-size: 2rem;
    text-align: center;
    position: relative;
    padding-bottom: 15px;
}

h2::after {
    content: "";
    position: absolute;
    left: 50%;
    bottom: 0;
    transform: translateX(-50%);
    width: 80px;
    height: 3px;
    background: linear-gradient(to right, #c3a984, #e6be8a);
}

form {
    display: flex;
    gap: 15px;
    align-items: center;
}

input[type="text"] {
    flex: 1;
    padding: 16px 20px;
    border: 2px solid #e9ecef;
    border-radius: 8px;
    font-size: 16px;
    transition: all 0.3s;
    font-family: 'Raleway', sans-serif;
}

input[type="text"]:focus {
    border-color: #c3a984;
    box-shadow: 0 0 0 4px rgba(195, 169, 132, 0.1);
    outline: none;
}

input[type="text"]::placeholder {
    color: #adb5bd;
}

button {
    background: linear-gradient(to right, #c3a984, #e6be8a);
    color: #2d4059;
    border: none;
    padding: 16px 30px;
    border-radius: 8px;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s;
    font-size: 16px;
    text-transform: uppercase;
    letter-spacing: 1px;
    position: relative;
    overflow: hidden;
}

button::before {
    content: "";
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, rgba(255,255,255,0), rgba(255,255,255,0.3), rgba(255,255,255,0));
    transition: left 0.7s;
}

button:hover {
    transform: translateY(-3px);
    box-shadow: 0 6px 15px rgba(195, 169, 132, 0.4);
}

button:hover::before {
    left: 100%;
}

hr {
    border: none;
    height: 1px;
    background: linear-gradient(to right, transparent, #dee2e6, transparent);
    margin: 40px 0;
}

/* Hotel Cards */
.hotel {
    background-color: white;
    border-radius: 16px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.05);
    margin-bottom: 40px;
    overflow: hidden;
    transition: all 0.4s ease;
    border: 1px solid #f1f3f5;
}

.hotel:hover {
    transform: translateY(-8px);
    box-shadow: 0 15px 40px rgba(0,0,0,0.12);
    border-color: rgba(195, 169, 132, 0.3);
}

.hotel h3 {
    background: linear-gradient(to right, #2d4059, #3a506b);
    color: white;
    padding: 20px 25px;
    margin: 0;
    font-family: 'Playfair Display', serif;
    font-size: 1.5rem;
    display: flex;
    justify-content: space-between;
    align-items: center;
    position: relative;
}

.hotel h3::after {
    content: "★★★★★";
    font-size: 0.8rem;
    letter-spacing: 2px;
    color: #e6be8a;
}

.hotel-content {
    display: flex;
    padding: 0;
}

.hotel-image {
    flex: 0 0 40%;
    position: relative;
    overflow: hidden;
}

.hotel-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.8s ease;
}

.hotel:hover .hotel-image img {
    transform: scale(1.05);
}

.hotel-details {
    flex: 1;
    padding: 25px;
}

.hotel p {
    margin: 15px 0;
    color: #495057;
    font-size: 15px;
    position: relative;
}

.hotel p strong {
    color: #2d4059;
    margin-right: 8px;
    font-weight: 600;
}

.hotel a {
    color: #c3a984;
    text-decoration: none;
    font-weight: 600;
    transition: all 0.2s;
    display: inline-block;
}

.hotel a:hover {
    color: #e6be8a;
    transform: translateX(3px);
}

.view-map {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: #f8f9fa;
    padding: 10px 16px;
    border-radius: 30px;
    font-size: 14px;
    margin-top: 5px;
    transition: all 0.3s;
    border: 1px solid #e9ecef;
}

.view-map:before {
    content: "📍";
}

.view-map:hover {
    background: #f1f3f5;
    border-color: #dee2e6;
}

.amenities {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
    margin: 20px 0;
}

.amenity {
    background: #f8f9fa;
    padding: 6px 12px;
    border-radius: 20px;
    font-size: 12px;
    color: #495057;
    border: 1px solid #e9ecef;
}

.price-tag {
    position: absolute;
    top: 20px;
    right: 20px;
    background: #c3a984;
    color: white;
    padding: 10px 20px;
    border-radius: 30px;
    font-weight: bold;
    font-size: 16px;
    box-shadow: 0 4px 10px rgba(0,0,0,0.1);
}

.no-hotels {
    text-align: center;
    padding: 60px 40px;
    background: white;
    border-radius: 12px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.05);
}

.no-hotels p {
    font-size: 1.2rem;
    color: #6c757d;
}

/* Contact icons */
.contact-info {
    display: flex;
    align-items: center;
    gap: 5px;
}

.contact-info::before {
    font-size: 18px;
    color: #c3a984;
    margin-right: 8px;
}

.phone::before {
    content: "📞";
}

.email::before {
    content: "✉️";
}

.address::before {
    content: "🏠";
}

.owner::before {
    content: "👤";
}

/* CTA Button */
.book-now {
    background: linear-gradient(to right, #c3a984, #e6be8a);
    color: white;
    padding: 12px 24px;
    border-radius: 30px;
    text-align: center;
    display: inline-block;
    margin-top: 15px;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 1px;
    font-size: 14px;
    transition: all 0.3s;
}

.book-now:hover {
    transform: translateY(-3px);
    box-shadow: 0 6px 15px rgba(195, 169, 132, 0.4);
}

/* Elegant Footer */
footer {
    background: #2d4059;
    color: #dee2e6;
    padding: 60px 0 30px;
    margin-top: 80px;
}

.footer-content {
    display: flex;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: 40px;
    margin-bottom: 40px;
}

.footer-column {
    flex: 1;
    min-width: 200px;
}

.footer-column h4 {
    font-family: 'Playfair Display', serif;
    color: white;
    margin-bottom: 20px;
    font-size: 1.3rem;
    position: relative;
    padding-bottom: 10px;
}

.footer-column h4::after {
    content: "";
    position: absolute;
    left: 0;
    bottom: 0;
    width: 40px;
    height: 2px;
    background: #c3a984;
}

.footer-column ul {
    list-style: none;
}

.footer-column ul li {
    margin-bottom: 10px;
}

.footer-column a {
    color: #adb5bd;
    text-decoration: none;
    transition: all 0.2s;
}

.footer-column a:hover {
    color: #e6be8a;
    padding-left: 5px;
}

.copyright {
    text-align: center;
    padding-top: 30px;
    border-top: 1px solid rgba(255,255,255,0.1);
    font-size: 14px;
    color: #adb5bd;
}

/* Animation */
@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.hotel {
    animation: fadeInUp 0.6s ease-out forwards;
}

/* Responsive Styles */
@media (max-width: 992px) {
    header {
        padding: 40px 0 80px;
    }
    
    header h1 {
        font-size: 2.8rem;
    }
    
    .search-section {
        margin-top: -50px;
        padding: 30px;
    }
}

@media (max-width: 768px) {
    .hotel-content {
        flex-direction: column;
    }
    
    .hotel-image {
        height: 250px;
    }
    
    form {
        flex-direction: column;
    }
    
    button {
        width: 100%;
    }
    
    header h1 {
        font-size: 2.2rem;
    }
    
    .footer-content {
        flex-direction: column;
        gap: 30px;
    }
}

@media (max-width: 576px) {
    .search-section {
        padding: 20px;
    }
    
    h2 {
        font-size: 1.5rem;
    }
    
    .hotel h3 {
        font-size: 1.2rem;
        flex-direction: column;
        align-items: flex-start;
        gap: 5px;
    }
    
    .hotel h3::after {
        position: static;
    }
}
    </style>
</head>
<body>
<header>
    <div class="container">
        <h1>Luxury Hotel Collection</h1>
        <p>Discover exceptional accommodations for an unforgettable experience</p>
    </div>
</header>
<div class="container">
    <div class="search-section">
        <h2>Search Hotels by City</h2>
        <form method="GET">
            <input type="text" name="city" placeholder="Enter city name..." value="<?= htmlspecialchars($searchCity) ?>">
            <button type="submit">Find Hotels</button>
        </form>
    </div>
</div>
<hr>
<?php
$foundHotels = [];

foreach ($hotels as $hotel) {
    // Match the city in the address (case-insensitive)
    if ($searchCity === '' || stripos($hotel['address'], $searchCity) !== false) {
        $foundHotels[] = $hotel;
    }
}

if (count($foundHotels) > 0):
    foreach ($foundHotels as $hotel): ?>
       <div class="hotel">
     <h3><?= htmlspecialchars($hotel['name']) ?></h3>
     <?php if (!empty($hotel['photo']) && file_exists($hotel['photo'])): ?>
    <img src="<?= htmlspecialchars($hotel['photo']) ?>" alt="Hotel Image" style="max-width: 300px;">
 <?php else: ?>
    <p><em>No image available</em></p>
 <?php endif; ?>
     <p><strong>Owner:</strong> <?= isset($hotel['owner']) ? htmlspecialchars($hotel['owner']) : 'Not Available' ?></p>
     <p><strong>Contact:</strong> <?= isset($hotel['phone']) ? htmlspecialchars($hotel['phone']) : 'Not Available' ?></p>
     <p><strong>Address:</strong> <?= htmlspecialchars($hotel['address']) ?></p>
     <p><a href="<?= htmlspecialchars($hotel['map']) ?>" target="_blank">View on Map</a></p>
     <p>Email: <?= htmlspecialchars($hotel['email']) ?></p>
</div>
<hr>

        <hr>
    <?php endforeach;
else:
    echo "<p>No hotels found in <strong>" . htmlspecialchars($searchCity) . "</strong>.</p>";
endif;
?>
<footer>
    <div class="container">
        <div class="footer-content">
            <div class="footer-column">
                <h4>About Us</h4>
                <p>We provide the best hotel booking experience with carefully selected luxury accommodations around the world.</p>
            </div>
            <div class="footer-column">
                <h4>Quick Links</h4>
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Destinations</a></li>
                    <li><a href="#">Special Offers</a></li>
                    <li><a href="#">Contact Us</a></li>
                </ul>
            </div>
            <div class="footer-column">
                <h4>Contact</h4>
                <ul>
                    <li>Email: info@luxuryhotels.com</li>
                    <li>Phone: +1 (555) 123-4567</li>
                    <li>Address: 123 Booking Street, NY</li>
                </ul>
            </div>
        </div>
        <div class="copyright">
            <p>&copy; 2025 Luxury Hotel Booking. All rights reserved.</p>
        </div>
    </div>
</footer>

</body>
</html>
