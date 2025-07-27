
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Discover Maharashtra</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        :root {
            --primary-color: #FF6B6B;
            --secondary-color: #4ECDC4;
            --dark-color: #0000;
            --light-color: #ECF0F1;
        }

        body {
            background-color: var(--light-color);
        }

        /* Enhanced Navigation Styles */
        nav{
            background: #000000;
            padding: 1rem;
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
            box-shadow: 0 2px 15px rgba(0,0,0,0.1);
        }

        nav ul {
            display: flex;
            justify-content: center;
            list-style: none;
            gap: 3rem;
        }

        nav a {
            color: white;
            text-decoration: none;
            font-size: 1.5rem;
            position: relative;
            padding: 0;
        }

        nav a::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0;
            height: 2px;
            transition: width 0.3s ease;
        }

        nav a:hover::after {
            width: 100%;
        }

        .sidebar {
            left: 0;
            top: 0;
            height: 100%;
            width: 35px;
            background:none;
        
        }

        .logo-container {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background: #fff;
            margin: 5px ;
            display: flex;
            overflow: hidden;
        }

        .logo-container img {
            width: 60px;
            height: 60px;
        }

        .nav-list {
            list-style: none;
            height:100%;
            display: flex;
            flex-direction: column;
        }

        .nav-list li {
            height: 50px;
            display: flex;
            flex-direction: column;
        }
        /* Material Icons */
        .material-symbols-outlined {
            font-size: 25px;
        }
        /* Hero Section */
        .hero {
            height: 100vh;
            background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5));
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: white;
            padding: 0 20px;
        }

        .hero-content h1 {
            font-size: 4rem;
            font-family: sans-serif;
            margin-bottom: 20px;
            animation: fadeInUp 1s ease;
        }

        .hero-content p {
            font-size: 1.5rem;
            margin-bottom: 30px;
            animation: fadeInUp 1s ease 0.2s;
            font-family: sans-serif;
            animation-fill-mode: forwards;
        }

        .cta-button {
            padding: 15px 40px;
            font-size: 1.2rem;
            background-color: #e74c3c;
            color: white;
            border: none;
            border-radius: 30px;
            cursor: pointer;
            transition: transform 0.3s, background-color 0.3s;
            animation: fadeInUp 1s ease 0.4s;
            animation-fill-mode: forwards;
        }

        .cta-button:hover {
            transform: translateY(-5px);
            background-color: #c0392b;
        }
        a{
            text-decoration: none;
            color: #ffffff;

        }
        .video-background{
           position:fixed;
           top: 0%;
           left: 0%;
           width: 100%;
           height: 100%;
           overflow:hidden;
           z-index:-1; 
         }
         #bg-video{
            width: 100%;
           height: 100%;
           object-fit: cover;
         }
          /* Featured Destinations Section */
          .featured-destinations {
            padding: 15px 15px;
            background-color:rgba(179, 179, 179, 0.53);
        }


        .destinations-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .destination-card {
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            transition: transform 0.3s ease;
        }

        .destination-card:hover {
            transform: translateY(-5px);
        }

        .destination-card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }
    
        .card-content {
            padding: 20px;
        }

        .card-content h3 {
            margin-bottom: 10px;
            color: #333;
        }

        .card-content p {
            color: #666;
            line-height: 1.6;
        }

        /* Enhanced Slider Styles */
        .slider-container {
            margin-top: 80px;
            padding: 20px;
        }

        .slider {
            width: 100%;
            height: 450px;
            position: relative;
            overflow: hidden;
            margin-bottom: 20px;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
        }

        .slide {
            position: absolute;
            width: 100%;
            height: 100%;
            opacity: 0;
            transform: scale(1.1);
            transition: all 0.8s ease-in-out;
        }

        .slide.active {
            opacity: 1;
            transform: scale(1);
        }

        .slide img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .caption {
            position: absolute;
            bottom: 0;
            width: 100%;
            background: linear-gradient(transparent, rgba(0, 0, 0, 0.8));
            color: white;
            padding: 2rem;
            transform: translateY(100%);
            transition: transform 0.5s ease;
        }

        .slide.active .caption {
            transform: translateY(0);
        }

        .caption h3 {
            font-size: 1.8rem;
            margin-bottom: 0.5rem;
            color: var(--accent-color);
        }

        .caption p {
            font-size: 1.1rem;
            line-height: 1.6;
        }

        /* Progress Indicator */
        .progress-bar {
            position: absolute;
            bottom: 0;
            left: 0;
            height: 3px;
            background: var(--primary-color);
            width: 0;
            transition: width 3s linear;
        }

        .progress-bar.active {
            width: 100%;
        }

        /* Section Titles */
        .section-title {
            text-align: center;
            margin: 1rem 0;
            position: relative;
            padding-bottom: 0.5rem;
            color: whitesmoke; 
            font-size: 2.5rem;
        }
 
        .section-title1 {
            text-align: center;
            margin: 2rem 0;
            position: relative;
            padding-bottom: 1rem;
            color: rgb(0, 0, 0); 
            font-size: 2.5rem;
        }
        .section-title::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 100px;
            height: 3px;
            background: var(--primary-color);
        }

        /* Enhanced Footer */
        footer {
            background-color: #000000;
            color: white;
            padding: 3rem 2rem;
            text-align: center;
        }

        .footer-content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
            max-width: 1200px;
            margin: 0 auto;
        }

        .footer-section h3 {
            color: var(--accent-color);
            margin-bottom: 1rem;
        }

        .social-links {
            display: flex;
            justify-content: center;
            gap: 1.5rem;
            margin: 1.5rem 0;
        }

        .social-links a {
            color: white;
            text-decoration: none;
            font-size: 1.5rem;
            width: 45px;
            height: 45px;
            border-radius: 50%;
            background: rgba(255,255,255,0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
        }

        .social-links a:hover {
            background: var(--primary-color);
            transform: translateY(-3px);
        }

        /* Quick Info Cards */
        .quick-info {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 2rem;
            padding: 2rem;
            margin-bottom: 3rem;
        }

        .info-card {
            background: white;
            padding: 2rem;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            transition: transform 0.3s ease;
        }

        .info-card:hover {
            transform: translateY(-10px);
        }

        .info-card i {
            font-size: 2.5rem;
            color: var(--primary-color);
            margin-bottom: 1rem;
        }

        /* Weather Widget */
        .weather-widget {
            background: white;
            padding: 1rem;
            border-radius: 10px;
            margin-bottom: 1rem;
        }

        /* Newsletter Form */
        .newsletter-form {
            display: flex;
            gap: 1rem;
            margin-top: 1rem;
        }

        .newsletter-form input {
            padding: 0.8rem;
            border: none;
            border-radius: 5px;
            flex: 1;
        }

        .newsletter-form button {
            padding: 0.8rem 1.5rem;
            background: var(--primary-color);
            border: none;
            border-radius: 5px;
            color: white;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .newsletter-form button:hover {
            background: #ff5252;
        }
    </style>
    <script>
        // Function to handle logout
        function handleLogout() {
            window.location.href = 'login/logout.php';
        }

        // Function to handle login
        function handleLogin() {
            window.location.href = 'index.php';
        }
    </script>
</head>
<body>
<iframe
    src="https://www.chatbase.co/chatbot-iframe/aWeRoMeVXjbpZd0q0YPkf"
    width="0"
    style="height:0; min-height:0"
    frameborder="0"
></iframe>
<nav>
    <ul>
        <li><a href="main.php"><i class="fas fa-home"></i> Home</a></li>
        <li><a href="about_page.html"><i class="fa-solid fa-address-card"></i> About-us</a></li>
        <li><a href="contact.html"><i class="fa-solid fa-address-book"></i> Contact</a></li>
        <li><a href="Marathi Calender.html"><i class="fa-solid fa-calendar-days"></i> Calendar</a></li>
        <li><a href="form.html"><i class="fa-solid fa-hotel">‌</i>‌</i></i> Business</a></li>
        <li><a href="Service_Login_signup.php"><i class="fas fa-user-alt">‌</i>‌ Admin</a></li>
    </ul>
</nav>

    <nav class="sidebar">
        <div class="logo-container">
            <img src="logo.jpg" alt="Logo">
        </div>
        <ul class="nav-list">
        <!--Adventures-->
         <li><a href="#section3"><i class="fas fa-hiking"></i> </a></li>
            <!--Cuisines-->
            <li><a href="#section2"><i class="fas fa-utensils"></i></a></li>  
            <!--Festivals-->
            <li><a href="#section4"><i class="fa-solid fa-gift"></i></a></li>  
            <!--Social-->
            <li><a href="#section5"><i class="fas fa-hashtag"></i></a></li> 
            <!--Heritage-->
            <li><a href="#section1"><i class="fa-solid fa-person"></i></a></li>  
        
        </ul>
    </nav>
   <!--Video Section-->
   <div class="video-background">
    <video autoplay muted loop id="bg-video">
       <source src="Mainbg.mp4" type="video/mp4">
    </video>
</div>
<!-- Hero Section -->
<section class="hero" id="home">
    <div class="hero-content">
        <h1>Maharashtra Culture and Tourism </h1>
        <p>Discover Amazing Places and Create Unforgettable Memories in Maharashtra,<br>with the blind of Culture</p>
        <a href="User_Login_signup.php">Sign-in</a>
    </div>
</section>
<div class="quick-info">
        <div class="info-card">
            <i class="fas fa-sun"></i>
            <h3>Backbone of Maharashtra</h3>
            <p>Rich in Heritage,<br>blind of Culture</p>
            <div class="weather-widget">
                <button class="cta-button"><a href="Top10City.html">Check out</a></button>
            </div>
        </div>

        <div class="info-card">
            <i class="fas fa-calendar-check"></i>
            <h3>Upcoming Events</h3>
             <p>Marathi Calender<br>with Marathi Festivals</p>
             <div class="weather-widget">
                <button class="cta-button"><a href="Marathi Calender.html">Calender</a></button>
             </div>
        </div>
        <div class="info-card">
            <i class="fas fa-phone-alt"></i>
            <h3>Tourist Helpline</h3>
            <p>1800-123-4567</p>
            <p>Available 24/7</p>
        </div>
    </div>
    <section id="section1">
    <div class="slider-container" >
        <!-- Heritage Sites Slider -->
        <h2 class="section-title">Majestic Heritage</h2>
        <div class="slider" id="heritage-slider">
            <div class="slide active">
                <img src="Ajanta Caves.jpg" alt="Ajanta Caves">
                <div class="caption">
                    <h3>Ajanta Caves</h3>
                    <p>Ancient Buddhist cave monuments dating from the 2nd century BCE. Marvel at the intricate paintings and sculptures that have survived centuries.</p>
                </div>
                <div class="progress-bar active"></div>
            </div>
            <div class="slide">
                <img src="Gateway of India.jpg" alt="Gateway of India">
                <div class="caption">
                    <h3>Gateway of India</h3>
                    <p>An iconic arch monument built in the early 20th century, standing proudly as Mumbai's most recognized symbol.</p>
                </div>
                <div class="progress-bar"></div>
            </div>
            <div class="slide">
                <img src="Ellora Caves.jpg" alt="Ellora Caves">
                <div class="caption">
                    <h3>Ellora Caves</h3>
                    <p>A UNESCO World Heritage site featuring Buddhist, Hindu and Jain monuments carved into solid rock.</p>
                </div>
                <div class="progress-bar"></div>
            </div>
        </div>
            </section>    
        <section class="featured-destinations" id="section2">
            <h2 class="section-title1">Maharashtrian Cuisine</h2>
            <div class="destinations-grid">
                <!-- Puran Poli -->
                <div class="destination-card">
                    <img src="Puran Poli.jpg" alt="Puran Poli">
                    <div class="card-content">
                        <h3>Puran Poli</h3>
                        <p>Puran poli is an Indian sweet flatbread that is popular in South India and the state of Maharashtra. It is also known as puran puri, holige, obbattu, bobbatlu, poley, bakshamulu, and boli.</p>
                    </div>
                </div>
        
                <!-- MisalPav -->
                <div class="destination-card">
                    <img src="MisalPav.jpg" alt="MisalPav">
                    <div class="card-content">
                        <h3>MisalPav</h3>
                        <p>There are different versions of misal pav such as Pune misal, Khandeshi misal, Nashik misal and Ahmednagar misal. Other types are kalya masalyachi misal, shev misal, and dahi (yoghurt) misal.</p>
                    </div>
                </div>
        
                <!-- Vadapav -->
                <div class="destination-card">
                    <img src="VadaPav.jpg" alt="VadaPav">
                    <div class="card-content">
                        <h3>VadaPav</h3>
                        <p>Vada pav, alternatively spelt wada pao, is a vegetarian fast food dish native to the Indian state of Maharashtra. The dish consists of a deep-fried potato dumpling placed inside a bread bun (pav) sliced almost in half through the middle.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Adventure Slider -->
    <section id="section3">     
        <h2 class="section-title">Thrilling Adventures</h2>
        <div class="slider" id="adventure-slider">
            <div class="slide active">
                <img src="Paragliding.jpg" alt="Paragliding">
                <div class="caption">
                    <h3>Paragliding in Kamshet</h3>
                    <p>Soar through the skies and experience breathtaking views of the Western Ghats.</p>
                </div>
                <div class="progress-bar active"></div>
            </div>
            <div class="slide">
                <img src="Trekking.jpg" alt="Trekking">
                <div class="caption">
                    <h3>Trek to Harishchandragad</h3>
                    <p>Challenge yourself with one of Maharashtra's most exciting treks.</p>
                </div>
                <div class="progress-bar"></div>
            </div>
        </div>
            </section>
<section id="section4">
        <!-- Festivals Slider -->
        <h2 class="section-title">Vibrant Festivals</h2>
        <div class="slider" id="festivals-slider">
            <div class="slide active">
                <img src="Ganesh Chaturthi.jpg" alt="Ganesh Chaturthi">
                <div class="caption">
                    <h3>Ganesh Chaturthi</h3>
                    <p>Experience the grandeur of Mumbai's biggest festival with elaborate processions and celebrations.</p>
                </div>
                <div class="progress-bar active"></div>
            </div>
            <div class="slide">
                <img src="Diwali.jpg" alt="Diwali">
                <div class="caption">
                    <h3>Diwali</h3>
                    <p>The festival of lights transforms Maharashtra into a magical wonderland.</p>
                </div>
                <div class="progress-bar"></div>
            </div>
            <div class="slide">
                <img src="Holi.jpg" alt="Diwali">
                <div class="caption">
                    <h3>Holi</h3>
                    <p>The festival of Colors transforms Maharashtra into a magical wonderland.</p>
                </div>
                <div class="progress-bar"></div>
            </div>
            <div class="slide">
                <img src="Gudi.jpg" alt="Diwali">
                <div class="caption">
                    <h3>Gudi</h3>
                    <p>The festival of  transforms Maharashtra into a magical wonderland.</p>
                </div>
                <div class="progress-bar"></div>
            </div>
        </div>
    </div>
            </section>
<section id="section5">
            <footer>
        <div class="footer-content">
            <div class="footer-section">
                <h3>Connect With Us</h3>
                <div class="social-links">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-youtube"></i></a>
                </div>
            </div>
            <div class="footer-section">
                <h3>Maharashtra Culture & Tourism</h3>
                <p>This Website Provides you the Information About <br>
                Maharashtrian Culture,Heritages,Divercity.</p>
                </form>
            </div>
            <div class="footer-section">
                <h3>Quick Links</h3>
                <p>About Us</p>
                <p>Contact</p>
                <p>Privacy Policy</p>
                <p>Terms of Service</p>
            </div>
        </div>
        <p>&copy; 2024 Discover Maharashtra. All rights reserved.</p>
    </footer>
            </section>
    <script>
        function automateSlider(sliderId) {
            const slider = document.getElementById(sliderId);
            const slides = slider.getElementsByClassName('slide');
            const progressBars = slider.getElementsByClassName('progress-bar');
            let currentSlide = 0;

            function resetProgress() {
                progressBars[currentSlide].style.width = '0';
                progressBars[currentSlide].classList.remove('active');
            }

            function updateProgress() {
                progressBars[currentSlide].style.width = '100%';
                progressBars[currentSlide].classList.add('active');
            }

            function changeSlide() {
                resetProgress();
                slides[currentSlide].classList.remove('active');
                currentSlide = (currentSlide + 1) % slides.length;
                slides[currentSlide].classList.add('active');
                updateProgress();
            }

            // Initialize first slide
            updateProgress();

            // Change slide every 5 seconds
            setInterval(changeSlide, 5000);
        }

        // Initialize all sliders
        const sliders = [
            'heritage-slider',
            'adventure-slider',
            'festivals-slider'
        ];

        sliders.forEach(slider => automateSlider(slider));

    </script>
      <script>
    window.embeddedChatbotConfig = {
        chatbotId: "aWeRoMeVXjbpZd0q0YPkf",
        domain: "www.chatbase.co"
    }
</script>
<script
    src="https://www.chatbase.co/embed.min.js"
    chatbotId="aWeRoMeVXjbpZd0q0YPkf"
    domain="www.chatbase.co"
    defer>
</script>
</html>
