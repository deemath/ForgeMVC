<html>
 <head>
  <title>
   Project Forge
  </title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&amp;display=swap" rel="stylesheet"/>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
   body {
            font-family: 'Inter', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
            color: #333;
        }
        .container {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 0;
            position: fixed;
            top: 0;
            width: 100%;
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            z-index: 1000;
        }
        .header .logo {
            display: flex;
            align-items: center;
        }
        .header .logo img {
            height: 40px;
            margin-right: 10px;
        }
        .header nav {
            display: flex;
            gap: 20px;
        }
        .header nav a {
            text-decoration: none;
            color: #333;
            font-weight: 600;
            transition: color 0.3s ease;
        }
        .header nav a:hover {
            color: #6c63ff;
        }
        .header .actions {
            display: flex;
            gap: 10px;
        }
        .header .actions a {
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 5px;
            font-weight: 600;
            transition: background-color 0.3s ease, color 0.3s ease;
        }
        .header .actions .login {
            background-color: transparent;
            color: #333;
        }
        .header .actions .login:hover {
            background-color: #e0e0e0;
        }
        .header .actions .get-started {
            background-color: #6c63ff;
            color: #fff;
        }
        .header .actions .get-started:hover {
            background-color: #574b90;
        }
        .hero {
            text-align: center;
            padding: 100px 20px 60px;
            background-color: #f5f5f5;
            opacity: 0;
            transform: translateY(20px);
            animation: fadeInUp 1s forwards;
            animation-delay: 0.5s;
        }
        @keyframes fadeInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        .hero h1 {
            font-size: 48px;
            font-weight: 700;
            margin-bottom: 20px;
            white-space: nowrap;
            overflow: hidden;
            border-right: .15em solid #6c63ff;
            width: 0;
            animation: typing 3s steps(30, end), blink-caret .75s step-end infinite;
            animation-delay: 0.5s;
        }
        @keyframes typing {
            from {
                width: 0;
            }
            to {
                width: 100%;
            }
        }
        @keyframes blink-caret {
            from, to {
                border-color: transparent;
            }
            50% {
                border-color: #6c63ff;
            }
        }
        .hero h1 span {
            color: #ff9900;
        }
        .hero p {
            font-size: 18px;
            color: #666;
            margin-bottom: 40px;
        }
        .hero .buttons {
            display: flex;
            justify-content: center;
            gap: 20px;
        }
        .hero .buttons a {
            text-decoration: none;
            padding: 15px 30px;
            border-radius: 5px;
            font-weight: 600;
            transition: background-color 0.3s ease, color 0.3s ease;
        }
        .hero .buttons .learn-more {
            background-color: #6c63ff;
            color: #fff;
        }
        .hero .buttons .learn-more:hover {
            background-color: #574b90;
        }
        .hero .buttons .sign-up {
            background-color: #e0e0e0;
            color: #333;
        }
        .hero .buttons .sign-up:hover {
            background-color: #bdbdbd;
        }
        .screenshot {
            text-align: center;
            padding: 60px 20px;
            background-color: #f0f0f0;
            opacity: 0;
            transform: translateY(20px);
            animation: flowUp 1s forwards;
            animation-delay: 1s;
        }
        @keyframes flowUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        .screenshot img {
            width: 100%;
            max-width: 800px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .features {
            display: flex;
            justify-content: space-between;
            padding: 60px 20px;
            gap: 20px;
            background-color: #f7f7f7;
        }
        .features .feature {
            flex: 1;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border: 2px solid transparent;
            transition: all 0.3s ease;
        }
        .features .feature:nth-child(1) {
            border-color: #ffe0b2;
            background-color: #fff8e1;
        }
        .features .feature:nth-child(2) {
            border-color: #d1c4e9;
            background-color: #f3e5f5;
        }
        .features .feature:nth-child(3) {
            border-color: #c8e6c9;
            background-color: #e8f5e9;
        }
        .features .feature:hover {
            box-shadow: 0 8px 12px rgba(0, 0, 0, 0.2);
            transform: translateY(-5px);
            background-color: #fff;
        }
        .features .feature h3 {
            font-size: 20px;
            font-weight: 600;
            margin-bottom: 10px;
            font-family: 'Arial', sans-serif;
        }
        .features .feature p {
            font-size: 14px;
            color: #666;
            font-family: 'Verdana', sans-serif;
        }
        .benefits {
            text-align: center;
            padding: 60px 20px;
            background-color: #f5f5f5;
        }
        .benefits h2 {
            font-size: 36px;
            font-weight: 700;
            margin-bottom: 20px;
        }
        .benefits .benefit-container {
            display: flex;
            justify-content: space-between;
            gap: 20px;
        }
        .benefits .benefit {
            flex: 1;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border: 2px solid #d0e7ff;
            transition: all 0.3s ease;
        }
        .benefits .benefit:hover {
            box-shadow: 0 8px 12px rgba(0, 0, 0, 0.2);
            transform: translateY(-5px);
        }
        .benefits .benefit h3 {
            font-size: 20px;
            font-weight: 600;
            margin-bottom: 10px;
        }
        .benefits .benefit p {
            font-size: 14px;
            color: #666;
        }
        .feature-details {
            padding: 60px 20px;
            background-color: #f0f0f0;
        }
        .feature-details h2 {
            font-size: 36px;
            font-weight: 700;
            margin-bottom: 20px;
            text-align: center;
        }
        .feature-details .feature-item {
            background-color: #fff;
            padding: 20px;
 border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            transition: all 0.3s ease;
        }
        .feature-details .feature-item:hover {
            box-shadow: 0 8px 12px rgba(0, 0, 0, 0.2);
            transform: translateY(-5px);
        }
        .feature-details .feature-item h3 {
            font-size: 24px;
            font-weight: 600;
            margin-bottom: 10px;
        }
        .feature-details .feature-item p {
            font-size: 16px;
            color: #666;
        }
        .about-us {
            padding: 60px 20px;
            background-color: #f7f7f7;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-top: 40px;
        }
        .about-us h2 {
            font-size: 36px;
            font-weight: 700;
            margin-bottom: 20px;
            text-align: center;
        }
        .about-us p {
            font-size: 16px;
            color: #666;
            margin-bottom: 20px;
        }
        .about-us .values {
            display: flex;
            justify-content: space-between;
            gap: 20px;
        }
        .about-us .value {
            flex: 1;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border: 2px solid #e0c3fc;
            text-align: center;
            transition: all 0.3s ease;
        }
        .about-us .value:hover {
            box-shadow: 0 8px 12px rgba(0, 0, 0, 0.2);
            transform: translateY(-5px);
            background-color: #f0f0f0;
        }
        .about-us .value h3 {
            font-size: 20px;
            font-weight: 600;
            margin-bottom: 10px;
        }
        .about-us .value p {
            font-size: 14px;
            color: #666;
        }
        .contact-us {
            padding: 60px 20px;
            background-color: #e0e0e0;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-top: 40px;
        }
        .contact-us h2 {
            font-size: 36px;
            font-weight: 700;
            margin-bottom: 20px;
            text-align: center;
        }
        .contact-us p {
            font-size: 16px;
            color: #666;
            margin-bottom: 20px;
            text-align: center;
        }
        .contact-us .contact-details {
            text-align: center;
            margin-bottom: 40px;
        }
        .contact-us .contact-details p {
            font-size: 16px;
            color: #666;
            margin: 5px 0;
        }
        .alert {
            padding: 15px;
            margin-bottom: 20px;
            border: 1px solid transparent;
            border-radius: 5px;
            font-size: 14px;
            text-align: left;
        }

        .alert-danger {
            color: #721c24;
            background-color: #f8d7da;
            border-color: #f5c6cb;
        }

        .alert-danger ul {
            margin: 0;
            padding-left: 20px;
            list-style-type: disc;
        }
  </style>
 </head>
 <body>
  <div class="container">
   <header class="header">
    <div class="logo">
     <img alt="Project Forge Logo" height="40" src=""/>
     <span>
      Project Forge
     </span>
    </div>
    <nav>
     <a href="#home">
      Home
     </a>
     <a href="#features">
      Features
     </a>
     <a href="#about-us">
      About Us
     </a>
     <a href="#contact-us">
      Contact
     </a>
    </nav>
    <div class="actions">
     <a class="login" href="#">
      Login
     </a>
     <a class="get-started" href="#">
      Get Started
     </a>
    </div>
   </header>
   <section class="hero" id="home">
    <h1>
     Effortless project management,
     <span>
      anytime
     </span>
    </h1>
    <p>
     Manage projects easily with an all-in-one platform designed for seamless collaboration
    </p>
    <div class="buttons">
     <a class=" learn-more" href="#">
      Learn More
     </a>
     <a class="sign-up" href="#">
      Sign Up
     </a>
    </div>
   </section>
   <section class="screenshot">
    <img alt="Screenshot of Project Forge interface" height="400" src="<?=IMAGES?>banner.png" width="800"/>
   </section>
   <section class="features" id="features">
    <div class="feature">
     <h3>
      To-do List
     </h3>
     <p>
      Organize your tasks and stay on top of your work with our intuitive to-do list feature.
     </p>
     <p>
      <strong>
       Benefits:
      </strong>
      Increased productivity, better task management, and improved focus.
     </p>
    </div>
    <div class="feature">
     <h3>
      Team Member Tracking
     </h3>
     <p>
      Keep track of your team members' progress and ensure everyone is on the same page.
     </p>
     <p>
      <strong>
       Benefits:
      </strong>
      Enhanced team collaboration, accountability, and transparency.
     </p>
    </div>
    <div class="feature">
     <h3>
      Project Tracking
     </h3>
     <p>
      Monitor the progress of your projects and ensure timely completion with our project tracking tools.
     </p>
     <p>
      <strong>
       Benefits:
      </strong>
      Better project visibility, timely delivery, and efficient resource management.
     </p>
    </div>
   </section>
   <section class="benefits">
    <h2>
     Why Choose Project Forge
    </h2>
    <div class="benefit-container">
     <div class="benefit">
      <h3>
       Increased Productivity
      </h3>
      <p>
       Our platform helps you streamline your workflow, allowing you to complete tasks more efficiently and effectively.
      </p>
     </div>
     <div class="benefit">
      <h3>
       Better Collaboration
      </h3>
      <p>
       Enhance team collaboration with our built-in communication tools, ensuring everyone stays on the same page.
      </p>
     </div>
     <div class="benefit">
      <h3>
       Improved Project Visibility
      </h3>
      <p>
       Keep track of your project's progress with our project tracking tools, ensuring timely completion and efficient resource management.
      </p>
     </div>
    </div>
   </section>
   <section class="feature-details">
    <h2>
     Detailed Features
    </h2>
    <div class="feature-item">
     <h3>
      To-do List
     </h3>
     <p>
      Our to-do list feature helps you organize your tasks efficiently. You can create, edit, and prioritize tasks to ensure you stay on top of your work.
     </p>
    </div>
    <div class="feature-item">
     <h3>
      Team Member Tracking
     </h3>
     <p>
      Track the progress of your team members with ease. Our platform allows you to monitor tasks, set deadlines, and ensure everyone is aligned with the project goals.
     </p>
    </div>
    <div class="feature-item">
     <h3>
      Project Tracking
     </h3>
     <p>
      Keep an eye on your project's progress with our project tracking tools. You can view timelines, milestones, and ensure timely completion of all tasks.
     </p>
    </div>
    <div class="feature-item">
     <h3>
      Collaboration Tools
     </h3>
     <p>
      Enhance team collaboration with our built-in communication tools. Share files, leave comments, and work together seamlessly.
     </p>
    </div>
    <div class="feature-item">
     <h3>
      Reporting and Analytics
     </h3>
     <p>
      Gain insights into your project's performance with our reporting and analytics tools. Track key metrics, generate reports, and make data-driven decisions.
     </p>
    </div>
    <div class="feature-item">
     <h3>
      Customizable Workflows
     </h3>
     <p>
      Tailor the platform to your needs with customizable workflows. Create templates, set up automation, and streamline your processes.
     </p>
    </div>
   </section>
   <section>
   <div class="bg-white border border-gray-300 p-8 w-4/5">
                <h2 class="text-2xl font-bold mb-6 text-center">Register New Institute</h2>
                <form id="registration-form" class="space-y-5" action="<?=ROOT?>/Signup" method="post">
                  
                    <div>
                        <label for="institute-name" class="block text-gray-700 font-medium">Institute Name</label>
                        <input type="text" id="institute-name" name="institute" class="w-full p-3 border border-gray-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Enter institute name" required value="<?php echo (!empty($inputs) && isset($inputs[0]['institute'])) ? $inputs[0]['institute'] : ''; ?>">
                    </div>
               
                    <div>
                        <label for="address" class="block text-gray-700 font-medium">Address</label>
                        <input type="text" id="address" name="address" class="w-full p-3 border border-gray-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Enter address" required>
                    </div>
                
                    <div>
                        <label for="project-coordinator" class="block text-gray-700 font-medium">Project Coordinator</label>
                        <input type="text" id="project-coordinator" name="name" class="w-full p-3 border border-gray-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Enter project coordinator name" required>
                    </div>
                    <div>
                        <label for="project-coordinator" class="block text-gray-700 font-medium">Phone Number</label>
                        <input type="number" id="project-coordinator" name="phone" class="w-full p-3 border border-gray-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Enter project coordinator name" required>
                    </div>
                
                    <div>
                        <label for="email" class="block text-gray-700 font-medium">Email</label>
                        <input type="email" id="email" name="email" class="w-full p-3 border border-gray-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Enter email" required>
                    </div>
                  
                    <div>
                        <label for="password" class="block text-gray-700 font-medium">Password</label>
                        <input type="password" id="password" name="password" class="w-full p-3 border border-gray-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Enter password" required>
                    </div>
                    
                    <div>
                        <label for="confirm-password" class="block text-gray-700 font-medium">Confirm Password</label>
                        <input type="password" id="confirm-password" name="re-password" class="w-full p-3 border border-gray-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Re-enter password" required>
                    </div>
                    <?php if (!empty($data)) : ?>
                        <div class="alert alert-danger">
                            <?php foreach($errors as $error)
                                 echo htmlspecialchars($error) . "<br>";
                                
                            ?>
                            
                            
                            <!-- <php print_r( $data) ?> -->
                        </div> 
                    <?php endif; ?>
                    
                    <div>
                        <button type="submit" name="submit" class="w-full bg-blue-600 text-white p-3 mt-4 hover:bg-blue-700 transition duration-200">Register</button>
                    </div>

                    

                </form>
            </div>
   </section>
   <section class="about-us" id="about-us">
    <h2>
     About Us
    </h2>
    <p>
     Project Forge is dedicated to providing the best project management solutions to help teams collaborate and achieve their goals efficiently. Our platform is designed with user-friendliness and powerful features in mind, ensuring that you can manage your projects with ease.
    </p>
    <p>
     Our mission is to simplify project management and boost productivity for teams of all sizes. We believe in continuous improvement and are committed to delivering innovative solutions that meet the evolving needs of our users.
    </p>
    <div class="values">
     <div class="value">
      <h3>
       Innovation
      </h3>
      <p>
       We are committed to continuous improvement and delivering innovative solutions to meet the evolving needs of our users.
      </p>
     </div>
     <div class="value">
      <h3>
       Collaboration
      </h3>
      <p>
       Our platform is designed to enhance team collaboration, ensuring everyone stays on the same page and works together seamlessly.
      </p>
     </div>
     <div class="value">
      <h3>
       Efficiency
      </h3>
      <p>
       We help teams streamline their workflow, allowing them to complete tasks more efficiently and effectively.
      </p>
     </div>
    </div>
   </section>
   <section class="contact-us" id="contact-us">
    <h2>
     Contact Us
    </h2>
    <p>
     We would love to hear from you! Whether you have a question about our features, pricing, or anything else, our team is ready to answer all your questions.
    </p>
    <div class="contact-details">
     <p>
      Email: support@projectforge.com
     </p>
     <p>
      Phone: +1 234 567 890
     </p>
     <p>
      Address: 123 Project Forge Lane, Suite 100,
     </p>
    </div>
   </section>
  </div>
  <script>
   document.addEventListener("DOMContentLoaded", function() {
       const heroTitle = document.querySelector('.hero h1');
       const text = heroTitle.textContent;
       heroTitle.textContent = '';
       let index = 0;

       function typeWriter() {
           if (index < text.length) {
               heroTitle.textContent += text.charAt(index);
               index++;
               setTimeout(typeWriter, 100);
           }
       }
       typeWriter();
   });
  </script>
 </body>
</html>