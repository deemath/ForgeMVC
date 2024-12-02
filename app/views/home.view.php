<html>
 <head>
  <title>
   Project Forge
  </title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&amp;display=swap" rel="stylesheet"/>
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
   function showForm(sectionId, formId) {
      const section = document.getElementById(sectionId);
      const form = document.getElementById(formId);
      section.classList.add("hidden");
      section.classList.remove("visible");
      form.classList.add("visible");
      form.classList.remove("hidden");
    }

    function hideForm(sectionId, formId) {
      const section = document.getElementById(sectionId);
      const form = document.getElementById(formId);
      form.classList.add("hidden");
      form.classList.remove("visible");
      section.classList.add("visible");
      section.classList.remove("hidden");
    }
  </script>
  <style>
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
   body {
            font-family: 'Inter', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
            color: #333;
            scroll-behavior: smooth; /* Enable smooth scrolling */
        }
        .container {
            width: 100%;
            max-width: 1200px;
            margin: 0  ;
            padding: 0px;
        }
        .dew{
          color: red;
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
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
            margin-left: 20px; /* Move logo to the left */
        }
        .header .logo img {
            height: 40px;
            margin-right: 10px;
        }
        .header nav {
            display: flex;
            gap: 20px;
            flex-grow: 1;
            justify-content: flex-end; /* Align nav items to the right */
            margin-right: 20px; /* Move nav items to the right */
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
            margin-right: 20px; /* Move actions to the right */
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
            padding: 260px 20px 60px; /* Adjusted padding to account for fixed header */
            background-color: #f5f5f5;
            animation: fadeIn 1s ease-in-out;
        }
        .hero h1 {
             font-size: 48px;
            font-weight: 700;
            margin-bottom: 20px;
            overflow: hidden;
            white-space: nowrap;
            border-right: 0.15em solid orange;
            animation: typing 3.5s steps(40, end), blink-caret 0.75s step-end infinite;
        }
        .hero h1 span {
            color: #ff9900;
        }
        .hero p {
             font-size: 18px;
            color: #666;
            margin-bottom: 40px;
            animation: fadeInText 2s ease-in-out;
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
            animation: fadeIn 1s ease-in-out;
        }
        .screenshot img {
            width: 100%;
            max-width: 800px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .features {
            padding: 160px 20px 60px; /* Adjusted padding to account for fixed header */
            background-color: #f7f7f7;
            animation: fadeIn 1s ease-in-out;
        }
        .features h2 {
            font-size: 36px;
            font-weight: 700;
            margin-bottom: 20px;
            text-align: center;
        }
        .features .feature-container {
            display: flex;
            justify-content: space-between;
            gap: 20px;
            margin-bottom: 40px;
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
            animation: fadeIn 1s ease-in-out;
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
            animation: fadeIn 1s ease-in-out;
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
            padding: 160px 20px 60px; /* Adjusted padding to account for fixed header */
            background-color: #f7f7f7;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-top: 40px;
            animation: fadeIn 1s ease-in-out;
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
        .about-us p1 {
            font-size: 16px;
            color: #fff;
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
            padding: 160px 20px 60px; /* Adjusted padding to account for fixed header */
            background-color: #e0e0e0;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-top: 40px;
            animation: fadeIn 1s ease-in-out;
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
      @keyframes fadeIn {
            from {
               opacity: 0;
            }
            to {
                opacity: 1;
            }
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
               border-color: orange;
            }
       }
        @keyframes fadeInText {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    
    .hidden {
      opacity: 0;
      pointer-events: none;
      transform: translateY(20px);
      transition: all 0.5s ease-in-out;
    }
    .visible {
      opacity: 1;
      pointer-events: auto;
      transform: translateY(0);
      transition: all 0.5s ease-in-out;
    }
    .transition-all {
      transition: all 0.5s ease-in-out;
    }
 
  </style>
 </head>
 <body>
  <div class="container">
   <header class="header">
    <div class="logo">
     <img alt="Project Forge Logo - A stylized anvil with a hammer striking it, symbolizing project creation and management" height="40" src="https://storage.googleapis.com/a1aa/image/4Qq44bpV9Z5NKRBeLf56QwjlyMJ60wifQ09dbT163ecC9wXPB.jpg" width="40"/><span>Project Forge</span>
    </div>
    <nav>
     <a href="#home">Home</a>
     <a href="#features">Features</a>
     <a href="#about-us">About Us</a>
     <a href="#contact-us">Contact</a>
    </nav>
    <div class="actions">
     <a class="login" href="<?=ROOT?>/login">Login</a>
     <a class="get-started" href="#register">Register</a>
    </div>
   </header>
   <section class="hero" id="home">
    <h1>Effortless project management,<span>anytime</span></h1>
    <p>Manage projects easily with an all-in-one platform designed for seamless collaboration</p>
    <div class="buttons">
     <a class="learn-more" href="#features">Learn More</a>
     <a class="sign-up" href="#register">Sign Up</a>
    </div>
   </section>
   <section class="screenshot">
    <img alt="Screenshot of Project Forge interface showing a dashboard with project tasks, team members, and progress tracking" height="400" src="<?=ROOT?>/assets/images/banner.png" width="800"/>
   </section>
   <section class="features" id="features">
    <h2>Features</h2>
    <div class="feature-container">
     <div class="feature">
      <h3>To-do List</h3>
      <p>Organize your tasks and stay on top of your work with our intuitive to-do list feature.</p>
      <p><strong>Benefits:</strong> Increased productivity, better task management, and improved focus.</p>
     </div>
     <div class="feature">
      <h3>Team Member Tracking</h3>
      <p>Keep track of your team members' progress and ensure everyone is on the same page.</p>
      <p><strong>Benefits:</strong> Enhanced team collaboration, accountability, and transparency.</p>
     </div>
     <div class="feature">
      <h3>Project Tracking</h3>
      <p>Monitor the progress of your projects and ensure timely completion with our project tracking tools.</p>
      <p><strong>Benefits:</strong> Better project visibility, timely delivery, and efficient resource management.</p>
     </div>
    </div>
    <div class="benefits">
     <h2>Why Choose Project Forge</h2>
     <div class="benefit-container">
      <div class="benefit">
       <h3>Increased Productivity</h3>
       <p>Our platform helps you streamline your workflow, allowing you to complete tasks more efficiently and effectively.</p>
      </div>
      <div class="benefit">
       <h3>Better Collaboration</h3>
       <p>Enhance team collaboration with our built-in communication tools, ensuring everyone stays on the same page.</p>
      </div>
      <div class="benefit">
       <h3>Improved Project Visibility</h3>
       <p>Keep track of your project's progress with our project tracking tools, ensuring timely completion and efficient resource management.</p>
      </div>
     </div>
    </div>
    <div class="feature-details">
     <h2>Detailed Features</h2>
     <div class="feature-item">
      <h3>To-do List</h3>
      <p>Our to-do list feature helps you organize your tasks efficiently. You can create, edit, and prioritize tasks to ensure you stay on top of your work.</p>
     </div>
     <div class="feature-item">
      <h3>Team Member Tracking</h3>
      <p>Track the progress of your team members with ease. Our platform allows you to monitor tasks, set deadlines, and ensure everyone is aligned with the project goals.</p>
     </div>
     <div class="feature-item">
      <h3>Project Tracking</h3>
      <p>Keep an eye on your project's progress with our project tracking tools. You can view timelines, milestones, and ensure timely completion of all tasks.</p>
     </div>
     <div class="feature-item">
      <h3>Collaboration Tools</h3>
      <p>Enhance team collaboration with our built-in communication tools. Share files, leave comments, and work together seamlessly.</p>
     </div>
    <div class="feature-item">
      <h3>Reporting and Analytics</h3>
      <p>Gain insights into your project's performance with our reporting and analytics tools. Track key metrics, generate reports, and make data-driven decisions.</p>
     </div>
     <div class="feature-item">
      <h3>Customizable Workflows</h3>
      <p>Tailor the platform to your needs with customizable workflows. Create templates, set up automation, and streamline your processes.</p>
     </div>
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
   <div class="value">
      <h3>
      Customer Focus
      </h3>
     <p>
       We prioritize our users' needs and continuously seek feedback to improve our platform and services.
</p>
    </div>
   </div>
   <section class="about-us" id="register">
   
  <html>
 <head>
  <title>
   Registration Page
  </title>
  <script src="https://cdn.tailwindcss.com">
  </script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <style>
   .hidden {
            display: none;
        }
  </style>
  <script>
   function showForm(sectionId, formId) {
            const section = document.getElementById(sectionId);
            const form = document.getElementById(formId);
            section.classList.add("hidden");
            section.classList.remove("visible");
            form.classList.add("visible");
            form.classList.remove("hidden");
        }

        function hideForm(sectionId, formId) {
            const section = document.getElementById(sectionId);
            const form = document.getElementById(formId);
            section.classList.add("visible");
            section.classList.remove("hidden");
            form.classList.add("hidden");
            form.classList.remove("visible");
        }
  </script>
 </head>
 <body class="bg-gray-100">
  <div class="bg-white rounded-lg shadow-lg flex flex-col md:flex-row w-full max-w-6xl min-h-[600px] mx-auto mt-10">
   <!-- Project Coordinator Section -->
   <div class="section bg-blue-600 text-white p-8 md:w-1/2 flex flex-col items-center justify-center transition-all visible min-h-[600px]" id="project-coordinator-section" onmouseenter="showForm('project-coordinator-section', 'project-coordinator-form')">
    <h2 class="text-2xl font-bold mb-4">
     Register as
    </h2>
    <img alt="Icon of a project coordinator" class="mb-4" height="100" src="https://storage.googleapis.com/a1aa/image/KAypvQHQ0saYItob9hMx5Nf6mm4sllW6nzv51iXGx6ZbGO7JA.jpg" width="100"/>
    <h3 class="text-xl font-bold mb-4">
     Project Coordinator
    </h3>
    <p1 class="text-center mb-4">
     As a Project Coordinator, you will be responsible for overseeing and managing various projects within your organization. Your role will involve planning, executing, and closing projects, ensuring they are completed on time and within budget. You will work closely with team members, stakeholders, and clients to achieve project goals and deliverables.
    </p1>
    <button class="bg-white text-blue-600 font-bold py-2 px-4 rounded hover:bg-gray-200">
     REGISTER HERE
    </button>
   </div>
   <!-- Project Coordinator Form -->
   <div class="hidden p-8 md:w-1/2 bg-blue-100 transition-all min-h-[600px]" id="project-coordinator-form" onmouseleave="hideForm('project-coordinator-section', 'project-coordinator-form')">
   <h2 class="text-xl font-serif font-bold mb-6 text-blue-600">Register as Project Coordinator</h2>

    <form action="<?=ROOT?>/register/coordinator" method="post">
     <div class="mb-4">
      <label class="block text-sm font-medium text-gray-700" for="name">
       Name
      </label>
       <input
    class="w-full border border-blue-300 rounded-md shadow-sm focus:ring-2 focus:ring-blue-400 focus:border-blue-500 p-2 text-sm text-gray-700 placeholder-gray-400"
    id="name"
    name="name"
    type="text"
    placeholder="Enter your full name"
    required
/>
     </div>
     
     <div class="mb-4">
      <label class="block text-sm font-medium text-gray-700" for="phone_number">
       Phone Number
      </label>
       <input
    class="w-full border border-blue-300 rounded-md shadow-sm focus:ring-2 focus:ring-blue-400 focus:border-blue-500 p-2 text-sm text-gray-700 placeholder-gray-400"
    id="phone"
    name="phone"
    type="tel"
    placeholder="Enter your phone number"
    required
/>
     </div>
     <div class="mb-4">
      <label class="block text-sm font-medium text-gray-700" for="phone_number">
       Address
      </label>
       <input
    class="w-full border border-blue-300 rounded-md shadow-sm focus:ring-2 focus:ring-blue-400 focus:border-blue-500 p-2 text-sm text-gray-700 placeholder-gray-400"
    id="phone"
    name="address"
    type="tel"
    placeholder="Enter your phone number"
    required
/>
     </div>
     <div class="mb-4">
      <label class="block text-sm font-medium text-gray-700" for="phone_number">
       Institute
      </label>
       <input
    class="w-full border border-blue-300 rounded-md shadow-sm focus:ring-2 focus:ring-blue-400 focus:border-blue-500 p-2 text-sm text-gray-700 placeholder-gray-400"
    id="phone"
    name="institute"
    type="tel"
    placeholder="Enter your phone number"
    required
/>
     </div>
     <div class="mb-4">
      <label class="block text-sm font-medium text-gray-700" for="email">
       Email
      </label>
<input
    class="w-full border border-blue-300 rounded-md shadow-sm focus:ring-2 focus:ring-blue-400 focus:border-blue-500 p-2 text-sm text-gray-700 placeholder-gray-400"
    id="email"
    name="email"
    type="email"
    placeholder="Enter your email address"
    required
/>
     </div>
     <div class="mb-4">
      <label class="block text-sm font-medium text-gray-700" for="password">
       Password
      </label>
<input
    class="w-full border border-blue-300 rounded-md shadow-sm focus:ring-2 focus:ring-blue-400 focus:border-blue-500 p-2 text-sm text-gray-700 placeholder-gray-400"
    id="password"
    name="password"
    type="password"
    placeholder="Enter your password"
    required
/>
     </div>
     <div class="mb-4">
      <label class="block text-sm font-medium text-gray-700" for="confirm_password">
       Confirm Password
      </label>
      <input
    class="w-full border border-blue-300 rounded-md shadow-sm focus:ring-2 focus:ring-blue-400 focus:border-blue-500 p-2 text-sm text-gray-700 placeholder-gray-400"
    id="confirm_password"
    name="confirm_password"
    type="password"
    placeholder="Confirm your password"
    required
/>
     </div>
     <div class="flex justify-between">
      <button class="bg-blue-600 text-white font-bold py-2 px-4 rounded hover:bg-purple-600" type="submit" name="submit">
       Submit
      </button>
      <button class="bg-gray-300 text-gray-700 font-bold py-2 px-4 rounded hover:bg-gray-400" onclick="hideForm('project-coordinator-section', 'project-coordinator-form')" type="button">
       Back
      </button>
     </div>
     <?php if (!empty($data)) : ?>
                        <div class="alert alert-danger">
                            <?php foreach($errors as $error)
                                 echo htmlspecialchars($error) . "<br>";
                            ?>
                            
                            
                            <!-- <php print_r( $data) ?> -->
                        </div> 
            <?php endif; ?>
    </form>
   </div>
   <!-- Regular User Section -->
   <div class="section bg-gray-200 text-gray-700 p-8 md:w-1/2 flex flex-col items-center justify-center transition-all visible min-h-[600px]" id="regular-user-section" onmouseenter="showForm('regular-user-section', 'regular-user-form')">
    <h2 class="text-2xl font-bold mb-4">
     Register as
    </h2>
    <img alt="Icon of a regular user" class="mb-4" height="100" src="https://storage.googleapis.com/a1aa/image/nR8lLgDfDNSBPibWM0gxVxB7bLowRfhRiFBBeBbbJ3YpZ4snA.jpg" width="100"/>
    <h3 class="text-xl font-bold mb-4">
     Regular User
    </h3>
    <p class="text-center mb-4">
     As a Regular User, you will have access to a variety of features and resources that will help you in your daily tasks. You can participate in discussions, access exclusive content, and connect with other users. This role is perfect for individuals looking to enhance their skills and knowledge in a supportive community.
    </p>
    <button class="bg-white text-gray-700 font-bold py-2 px-4 rounded hover:bg-gray-300">
     REGISTER HERE
    </button>
   </div>
   <!-- Regular User Form -->
   <div class="hidden p-8 md:w-1/2 bg-gray-100 transition-all min-h-[600px]" id="regular-user-form" onmouseleave="hideForm('regular-user-section', 'regular-user-form')">
    <h2 class="text-xl font-serif font-bold mb-6 text-black-600">Register as Regular User</h2>

    <form action="<?=ROOT?>/register/user" method="post">
     <div class="mb-4">
      <label class="block text-sm font-medium text-gray-700" for="name">
       Name
      </label>
     <input
    class="w-full border border-blue-300 rounded-md shadow-sm focus:ring-2 focus:ring-blue-400 focus:border-blue-500 p-2 text-sm text-gray-700 placeholder-gray-400"
    id="name"
    name="name"
    type="text"
    placeholder="Enter your full name"
    required
/>

     <div class="mb-4">
      <label class="block text-sm font-medium text-gray-700" for="phone_number">
       Phone Number
      </label>
     <input
    class="w-full border border-blue-300 rounded-md shadow-sm focus:ring-2 focus:ring-blue-400 focus:border-blue-500 p-2 text-sm text-gray-700 placeholder-gray-400"
    id="phone"
    name="phone"
    type="tel"
    placeholder="Enter your phone number"
    required
/>

     </div>
     <div class="mb-4">
      <label class="block text-sm font-medium text-gray-700" for="email">
       Email
      </label>
     <input
    class="w-full border border-blue-300 rounded-md shadow-sm focus:ring-2 focus:ring-blue-400 focus:border-blue-500 p-2 text-sm text-gray-700 placeholder-gray-400"
    id="email"
    name="email"
    type="email"
    placeholder="Enter your email address"
    required
/>

     </div>
     <div class="mb-4">
      <label class="block text-sm font-medium text-gray-700" for="password">
       Password
      </label>
     <input
    class="w-full border border-blue-300 rounded-md shadow-sm focus:ring-2 focus:ring-blue-400 focus:border-blue-500 p-2 text-sm text-gray-700 placeholder-gray-400"
    id="password"
    name="password"
    type="password"
    placeholder="Enter your password"
    required
/>

     </div>
     <div class="mb-4">
      <label class="block text-sm font-medium text-gray-700" for="confirm_password">
       Confirm Password
      </label>
     <input
    class="w-full border border-blue-300 rounded-md shadow-sm focus:ring-2 focus:ring-blue-400 focus:border-blue-500 p-2 text-sm text-gray-700 placeholder-gray-400"
    id="confirm_password"
    name="confirm_password"
    type="password"
    placeholder="Confirm your password"
    required
/>

     </div>
     <div class="flex justify-between">
      <button class="bg-gray-700 text-white font-bold py-2 px-4 rounded hover:bg-gray-800" type="submit" name="submit">
       Submit
      </button>
      <button class="bg-gray-300 text-gray-700 font-bold py-2 px-4 rounded hover:bg-gray-400" onclick="hideForm('regular-user-section', 'regular-user-form')" type="button">
       Back
      </button>
     </div>
     <?php if (!empty($data)) : ?>
                        <div class="alert alert-danger">
                            <?php foreach($errors as $error)
                                 echo htmlspecialchars($error) . "<br>";
                            ?>
                            
                            
                            <!-- <php print_r( $data) ?> -->
                        </div> 
            <?php endif; ?>
    </form>
   </div>
  </div>
 </body>
</html>
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
 </body>
</html>