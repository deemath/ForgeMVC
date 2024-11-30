<html lang="en">
 <head>
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
  <title>
   Login Selection
  </title>
  <script src="https://cdn.tailwindcss.com">
  </script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&amp;display=swap" rel="stylesheet"/>
  <style>
   .fly-away {
    animation: flyAway 0.5s forwards;
   }

   @keyframes flyAway {
    0% {
     transform: scale(1);
     opacity: 1;
    }
    100% {
     transform: scale(0.5) translateY(-1000px);
     opacity: 0;
    }
   }
  </style>
 </head>
 <body class="bg-gradient-to-r from-blue-500 via-purple-600 to-indigo-700 min-h-screen flex items-center justify-center font-roboto">
  <div class="text-center">
   <h3 class="text-4xl font-bold text-white mb-8">
    Login as
   </h3>
   <div class="flex flex-col md:flex-row gap-8 justify-center">
    <?php if(isset($_SESSION['coordinator_id'])) : ?>
    <div class="bg-white rounded-lg shadow-lg p-6 w-80 transition-transform duration-500" id="coordinator-card">
            <img alt="Illustration of a project coordinator managing tasks and schedules" class="w-full h-40 object-cover rounded-md mb-4" height="200" src="https://storage.googleapis.com/a1aa/image/kk5bR1S0l7awAd5OSv9lrHJA2aaUsphzmVuD4wWlO3xuJf6JA.jpg" width="300"/>
            <h2 class="text-2xl font-bold mb-4">
            Project Coordinator
            </h2>
            <p class="text-gray-600 mb-4">
            Manage projects, assign tasks, and oversee progress.
            </p>
            <form action="<?=ROOT?>/coordinator/Dashboard" method="post">
            <button class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600 transition duration-300" onclick="flyAwayCard('coordinator-card')" type="submit">
            Login as Coordinator
            </button>
            </form>
    </div>
   <?php endif ; ?>
   <?php if(isset($_SESSION['user_id'])) : ?>
    <div class="bg-white rounded-lg shadow-lg p-6 w-80 transition-transform duration-500" id="user-card">
            <img alt="Illustration of a regular user working on tasks and collaborating with team members" class="w-full h-40 object-cover rounded-md mb-4" height="200" src="https://storage.googleapis.com/a1aa/image/7hfKrJgjBa3iUSflJrVssTfnYgLosc16TFudefLQie6ruJf6JA.jpg" width="300"/>
            <h2 class="text-2xl font-bold mb-4">
            Regular User
            </h2>
            <p class="text-gray-600 mb-4">
            Work on assigned tasks and collaborate with your team.
            </p>
            <form action="<?=ROOT?>/reguser/commonInterface" method="post">
            <button class="bg-orange-500 text-white py-2 px-4 rounded hover:bg-orange-600 transition duration-300" onclick="flyAwayCard('user-card')" type="submit">
            Login as User
            </button>
            </form>
    </div>
    <?php endif ; ?>
   </div>
  </div>
  <script>
   function flyAwayCard(cardId) {
    document.getElementById(cardId).classList.add('fly-away');
    setTimeout(() => {
     window.location.href = '#'; // Replace '#' with the actual URL to navigate to
    }, 500);
   }
  </script>
 </body>
</html>