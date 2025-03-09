<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marvels Academy</title>
    <style>
        /* General Reset */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Arial', sans-serif;
  }
  
  /* Trending and Professional Color Scheme */
  :root {
    --primary-color: #2563eb; /* Vibrant blue */
    --secondary-color: #f9fafb; /* Light gray */
    --accent-color: #f59e0b; /* Warm amber */
    --text-color: #1f2937; /* Dark gray */
    --success-color: #10b981; /* Green */
    --error-color: #ef4444; /* Red */
  }
  
  body {
    padding-top: 80px;
    background-color: var(--secondary-color);
    color: var(--text-color);
  }
  
  /* Header Styling */
  header {
    background: var(--primary-color);
    padding: 25px 20px;
    color: white;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    z-index: 1000;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
  }
  
  /* Container */
  .container {
    display: flex;
    justify-content: space-between;
    align-items: center;
    max-width: 1200px;
    margin: auto;
  }
  
  /* Navigation Links */
  .nav-links {
    list-style: none;
    display: flex;
    gap: 20px;
  }
  
  .nav-links li a {
    color: white;
    text-decoration: none;
    font-size: 1rem;
    font-weight: 500;
    padding: 8px 12px;
    transition: color 0.3s, background-color 0.3s;
    border-radius: 5px;
  }
  
  .nav-links li a:hover {
    color: var(--accent-color);
    background-color: rgba(255, 255, 255, 0.1);
  }
  
  /* Mobile Menu */
  .menu-toggle {
    font-size: 1.8rem;
    display: none;
    cursor: pointer;
  }
  
  /* Responsive Design */
  @media screen and (max-width: 768px) {
    .nav-links {
      display: none;
      flex-direction: column;
      position: absolute;
      background: var(--primary-color);
      width: 100%;
      top: 60px;
      left: 0;
      text-align: center;
      padding: 10px 0;
    }
  
    .nav-links.active {
      display: flex;
    }
  
    .menu-toggle {
      display: block;
    }
  }
  
  /* Home Section */
  .home {
    background: url('../images/home.jpg') no-repeat center center/cover;
    height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
    color: white;
    padding: 20px;
    position: relative;
  }
  
  /* Overlay for better readability */
  .home::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5); /* Dark overlay */
  }
  
  /* Content Styling */
  .home-content {
    position: relative;
    z-index: 1;
    max-width: 600px;
  }
  
  .home-content h1 {
    font-size: 2.5rem;
    margin-bottom: 10px;
  }
  
  .home-content p {
    font-size: 1.2rem;
    margin-bottom: 20px;
  }
  
  /* Register Button */
  .btn {
    background: var(--accent-color);
    color: white;
    padding: 12px 24px;
    text-decoration: none;
    font-size: 1rem;
    font-weight: bold;
    border-radius: 5px;
    display: inline-block;
    transition: background 0.3s, transform 0.3s;
  }
  
  .btn:hover {
    background: #d97706; /* Darker amber */
    transform: translateY(-2px);
  }
  
  /* Responsive Design */
  @media screen and (max-width: 768px) {
    .home-content h1 {
      font-size: 2rem;
    }
  
    .home-content p {
      font-size: 1rem;
    }
  
    .btn {
      font-size: 0.9rem;
      padding: 10px 20px;
    }
  }  
    </style>
</head>
<body>
    <!-- Header section -->
    <header>
        <div class="container">
            <div class="logo">Marvels Academy</div>
            <nav>
                <ul class="nav-links">
                    <li><a href="#home">Home</a></li>
                    <li><a href="#about">About Us</a></li>
                    <li><a href="#academic">Academics</a></li>
                    <li><a href="#admission">Admissions</a></li>
                    <li><a href="#event">Events</a></li>
                    <li><a href="#gallery">Gallery</a></li>
                    <li><a href="#contact">Contact</a></li>
                </ul>
                <div class="menu-toggle">&#9776;</div>
            </nav>
        </div>
    </header>
<!-- Home section -->
 <section id="home" class="home">
    <div class="home-content">
        <h1>Welcome to Marvels Academy</h1>
        <p>Empowering students for a brighter future.</p>
        <a href="./signup.php" class="btn">Register Now</a>
    </div>
</section>