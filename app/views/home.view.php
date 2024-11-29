<html lang="en">
 <head>
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
  <title>
   Forge Logistics
  </title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&amp;display=swap" rel="stylesheet"/>
  <style>
   body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        header {
            background: url('https://cdn.pixabay.com/photo/2020/07/08/04/12/work-5382501_1280.jpg') no-repeat center center/cover;
            color: white;
            padding: 20px 0;
        }
        header .container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 20px;
        }
        header .logo {
            font-size: 24px;
            font-weight: 700;
            color: #003366; /* Dark blue color */
        }
        header nav ul {
            list-style: none;
            display: flex;
            gap: 20px;
        }
        header nav ul li {
            display: inline;
        }
        header nav ul li a {
            color: white;
            text-decoration: none;
            font-weight: 500;
        }
        header .cta {
            background: #003366;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            color: white;
            font-weight: 500;
        }
        .hero {
            text-align: center;
            padding: 100px 20px;
        }
        .hero h1 {
            font-size: 48px;
            margin-bottom: 20px;
        }
        .hero p {
            font-size: 18px;
            margin-bottom: 30px;
        }
        .hero .btn {
            background: #003366;
            padding: 15px 30px;
            border-radius: 5px;
            text-decoration: none;
            color: white;
            font-weight: 500;
            margin: 0 10px;
        }
        .services {
            background: #f8f9fa;
            padding: 50px 20px;
            text-align: center;
        }
        .services .service {
            display: inline-block;
            width: 30%;
            margin: 0 1.5%;
            background: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .services .service i {
            font-size: 40px;
            color: #003366;
            margin-bottom: 10px;
        }
        .services .service h3 {
            font-size: 24px;
            margin-bottom: 10px;
        }
        .services .service p {
            font-size: 16px;
        }
        .about {
            padding: 50px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .about .text {
            width: 50%;
        }
        .about .text h2 {
            font-size: 36px;
            margin-bottom: 20px;
        }
        .about .text p {
            font-size: 16px;
            margin-bottom: 20px;
        }
        .about .text .btn {
            background: #003366;
            padding: 15px 30px;
            border-radius: 5px;
            text-decoration: none;
            color: white;
            font-weight: 500;
        }
        .about .image {
            width: 45%;
        }
        .about .image img {
            width: 100%;
            border-radius: 5px;
        }
        .stats {
            background: #003366;
            color: white;
            padding: 50px 20px;
            text-align: center;
        }
        .stats .stat {
            display: inline-block;
            width: 30%;
            margin: 0 1.5%;
        }
        .stats .stat h3 {
            font-size: 36px;
            margin-bottom: 10px;
        }
        .stats .stat p {
            font-size: 16px;
        }
        .projects {
            padding: 50px 20px;
            text-align: center;
        }
        .projects h2 {
            font-size: 36px;
            margin-bottom: 20px;
        }
        .projects .project {
            display: inline-block;
            width: 30%;
            margin: 0 1.5%;
            background: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .projects .project img {
            width: 100%;
            border-radius: 5px;
            margin-bottom: 10px;
        }
        .projects .project h3 {
            font-size: 24px;
            margin-bottom: 10px;
        }
        .projects .project p {
            font-size: 16px;
        }
        .partners {
            background: #f8f9fa;
            padding: 50px 20px;
            text-align: center;
        }
        .partners img {
            width: 10%;
            margin: 0 1.5%;
        }
        .articles {
            padding: 50px 20px;
            text-align: center;
        }
        .articles h2 {
            font-size: 36px;
            margin-bottom: 20px;
        }
        .articles .article {
            display: inline-block;
            width: 30%;
            margin: 0 1.5%;
            background: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .articles .article img {
            width: 100%;
            border-radius: 5px;
            margin-bottom: 10px;
        }
        .articles .article h3 {
            font-size: 24px;
            margin-bottom: 10px;
        }
        .articles .article p {
            font-size: 16px;
        }
        .contact {
            background: #003366;
            color: white;
            padding: 50px 20px;
            text-align: center;
        }
        .contact h2 {
            font-size: 36px;
            margin-bottom: 20px;
        }
        .contact form {
            display: inline-block;
            width: 50%;
            text-align: left;
        }
        .contact form input,
        .contact form textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: none;
            border-radius: 5px;
        }
        .contact form button {
            background: white;
            color: #003366;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-weight: 500;
        }
        footer {
            background: #333;
            color: white;
            padding: 20px 0;
            text-align: center;
        }
        footer .container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 20px;
        }
        footer .logo {
            font-size: 24px;
            font-weight: 700;
        }
        footer nav ul {
            list-style: none;
            display: flex;
            gap: 20px;
        }
        footer nav ul li {
            display: inline;
        }
        footer nav ul li a {
            color: white;
            text-decoration: none;
            font-weight: 500;
        }
  </style>
 </head>
 <body>
  <header>
   <div class="container">
    <div class="logo" style="color: #003366;">
     Forge
    </div>
    <nav>
     <ul>
      <li>
       <a href="#">
        Home
       </a>
      </li>
      <li>
       <a href="#">
        About
       </a>
      </li>
      <li>
       <a href="#">
        Services
       </a>
      </li>
      <li>
       <a href="#">
        Projects
       </a>
      </li>
      <li>
       <a href="#">
        Contact
       </a>
      </li>
     </ul>
    </nav>
    <a class="cta" href="#">
     Get a Quote
    </a>
   </div>
   <div class="hero">
    <h1>
     Full Sustainable Cargo Solutions!
    </h1>
    <p>
     Providing the best logistics solutions for your business needs.
    </p>
    <a class="btn" href="#">
     Learn More
    </a>
    <a class="btn" href="#">
     Contact Us
    </a>
   </div>
  </header>
  <section class="services">
   <div class="service">
    <i class="fas fa-truck">
    </i>
    <h3>
     Freight Services
    </h3>
    <p>
     Reliable and efficient freight services for all your needs.
    </p>
   </div>
   <div class="service">
    <i class="fas fa-warehouse">
    </i>
    <h3>
     Warehouse Solutions
    </h3>
    <p>
     Secure and spacious warehousing solutions for your goods.
    </p>
   </div>
   <div class="service">
    <i class="fas fa-shipping-fast">
    </i>
    <h3>
     Fast Delivery
    </h3>
    <p>
     Quick and safe delivery services to ensure timely arrival.
    </p>
   </div>
  </section>
  <section class="about">
   <div class="text">
    <h2>
     Reliable Logistic &amp; Transport Solutions Saves Your Time!
    </h2>
    <p>
     We provide the best logistics solutions to save your time and money. Our services are designed to meet your specific needs and ensure the safe and timely delivery of your goods.
    </p>
    <a class="btn" href="#">
     Read More
    </a>
   </div>
   <div class="image">
    <img alt="Logistics and transport solutions" height="400" src="https://storage.googleapis.com/a1aa/image/ADjjohfNLMXiFyHZQtEpZpxiHlCBJiA4eCVP7BhoB5h0cd1TA.jpg" width="600"/>
   </div>
  </section>
  <section class="stats">
   <div class="stat">
    <h3>
     270+
    </h3>
    <p>
     Projects Completed
    </p>
   </div>
   <div class="stat">
    <h3>
     25+
    </h3>
    <p>
     Years of Experience
    </p>
   </div>
   <div class="stat">
    <h3>
     100+
    </h3>
    <p>
     Happy Clients
    </p>
   </div>
  </section>
  <section class="projects">
   <h2>
    Featured Projects
   </h2>
   <div class="project">
    <img alt="Project 1" height="300" src="https://storage.googleapis.com/a1aa/image/jHdfIP5fFavoc067uADGJWbdNTmJL3Tcm2eqmZn0Pp5W56qnA.jpg" width="400"/>
    <h3>
     Project One
    </h3>
    <p>
     Details about project one.
    </p>
   </div>
   <div class="project">
    <img alt="Project 2" height="300" src="https://storage.googleapis.com/a1aa/image/DmOHEUEBcU70DdIdERqmcZQ6EzbmaXhl0PA8Ahyj4y3LXX9E.jpg" width="400"/>
    <h3>
     Project Two
    </h3>
    <p>
     Details about project two.
    </p>
   </div>
   <div class="project">
    <img alt="Project 3" height="300" src="https://storage.googleapis.com/a1aa/image/7TAfDw2cJy00eUqGFGyEFanaSSLFFHLezG4jld21DKmY56qnA.jpg" width="400"/>
    <h3>
     Project Three
    </h3>
    <p>
     Details about project three.
    </p>
   </div>
  </section>
  <section class="partners">
   <img alt="Partner 1" height="100" src="https://storage.googleapis.com/a1aa/image/vUVYrz5F9GrdOxR6ddn0R70iHeF63ft2INAmls0NfUOs56qnA.jpg" width="200"/>
   <img alt="Partner 2" height="100" src="https://storage.googleapis.com/a1aa/image/PaaAc4t6wDKjI14nWJ5ZR7xDkzIJ6V8ZLoUxxXD1feapcd1TA.jpg" width="200"/>
   <img alt="Partner 3" height="100" src="https://storage.googleapis.com/a1aa/image/vAcL0XYuEN5uI1SVspbOAi71iL34F4ZE1OUGutGZyQvLXX9E.jpg" width="200"/>
   <img alt="Partner 4" height="100" src="https://storage.googleapis.com/a1aa/image/lVwpMw12ybqMLhxyPHziek3vYYn4ofVMSMwMZEVRo9yycd1TA.jpg" width="200"/>
   <img alt="Partner 5" height="100" src="https://storage.googleapis.com/a1aa/image/HDfBN6ljujymbCvtCD7mrrGrxlOGS8xYdc2Y9k3rOq1Yuu6JA.jpg" width="200"/>
  </section>
  <section class="articles">
   <h2>
    Recent Articles
   </h2>
   <div class="article">
    <img alt="Article 1" height="300" src="https://storage.googleapis.com/a1aa/image/UPiwYnXZxwqyG1ejgTXIhefceqfLYJGwg8nxJDaEkK58krreE.jpg" width="400"/>
    <h3>
     Article One
    </h3>
    <p>
     Details about article one.
    </p>
   </div>
   <div class="article">
    <img alt="Article 2" height="300" src="https://storage.googleapis.com/a1aa/image/6qJrzbeILcX5DKwLQSR3Lj91AXak3f5y0VKpRkDgpGkzcd1TA.jpg" width="400"/>
    <h3>
     Article Two
    </h3>
    <p>
     Details about article two.
    </p>
   </div>
   <div class="article">
    <img alt="Article 3" height="300" src="https://storage.googleapis.com/a1aa/image/tHOA1ufgqG2dHi15nXmzf39f1xwcIso6OzVpee2y5ZbBnrreE.jpg" width="400"/>
    <h3>
     Article Three
    </h3>
    <p>
     Details about article three.
    </p>
   </div>
  </section>
  <section class="contact">
   <h2>
    Contact Us
   </h2>
   <form>
    <input placeholder="Your Name" type="text"/>
    <input placeholder="Your Email" type="email"/>
    <textarea placeholder="Your Message"></textarea>
    <button type="submit">
     Send Message
    </button>
   </form>
  </section>
  <footer>
   <div class="container">
    <div class="logo">
     Forge
    </div>
    <nav>
     <ul>
      <li>
       <a href="#">
        Home
       </a>
      </li>
      <li>
       <a href="#">
        About
       </a>
      </li>
      <li>
       <a href="#">
        Services
       </a>
      </li>
      <li>
       <a href="#">
        Projects
       </a>
      </li>
      <li>
       <a href="#">
        Contact
       </a>
      </li>
     </ul>
    </nav>
   </div>
  </footer>
 </body>
</html>