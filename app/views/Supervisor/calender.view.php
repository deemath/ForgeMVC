<?php 
require_once 'navigationbar.php'
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Fully Functional JS Calendar</title>
  <style>
    /* body {
      font-family: Arial, sans-serif;
      background: #f4f4f4;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
    } */

    .calendar {
        margin-top: auto;
        margin-bottom: auto;
        margin-left: auto;
        margin-right: auto;
      background: white;
      padding: 20px;
      box-shadow: 0 0 10px rgba(0,0,0,0.2);
      border-radius: 10px;
      width: 750px;
      height: 550px;
    }

    .calendar header {
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .calendar header h2 {
      margin: 0;
    }

    .calendar header button {
      background: #007BFF;
      color: white;
      border: none;
      padding: 6px 12px;
      border-radius: 5px;
      cursor: pointer;
    }

    .calendar table {
      width: 100%;
      margin-top: 10px;
      height: 80%;
      border-collapse: collapse;
    }

    .calendar th {
      color: #333;
      padding: 5px;
    }

    .calendar td {
      text-align: center;
      padding: 10px;
      cursor: pointer;
      height: auto;
      transition: background 0.2s;
    }

    .calendar td:hover {
      background: #e1f0ff;
    }

    .calendar .today {
      background: #007BFF;
      color: white;
      border-radius: 50%;
    }

  </style>
</head>
<body>

  <div class="calendar">
    <header>
      <button id="prev">◀</button>
      <h2 id="monthYear"></h2>
      <button id="next">▶</button>
    </header>
    <table>
      <thead>
        <tr>
          <th>Sun</th><th>Mon</th><th>Tue</th><th>Wed</th>
          <th>Thu</th><th>Fri</th><th>Sat</th>
        </tr>
      </thead>
      <tbody id="calendarBody">
        <!-- Days go here -->
      </tbody>
    </table>
  </div>

  <script>
    const calendarBody = document.getElementById('calendarBody');
    const monthYear = document.getElementById('monthYear');
    const prevBtn = document.getElementById('prev');
    const nextBtn = document.getElementById('next');

    let currentDate = new Date();
    let currentMonth = currentDate.getMonth();
    let currentYear = currentDate.getFullYear();

    const months = [
      "January", "February", "March", "April", "May", "June",
      "July", "August", "September", "October", "November", "December"
    ];

    function renderCalendar(month, year) {
      calendarBody.innerHTML = "";
      monthYear.textContent = `${months[month]} ${year}`;

      let firstDay = new Date(year, month, 1).getDay();
      let daysInMonth = new Date(year, month + 1, 0).getDate();

      let date = 1;

      for (let i = 0; i < 6; i++) {
        let row = document.createElement('tr');

        for (let j = 0; j < 7; j++) {
          let cell = document.createElement('td');
          if (i === 0 && j < firstDay) {
            cell.textContent = "";
          } else if (date > daysInMonth) {
            break;
          } else {
            cell.textContent = date;
            if (
              date === currentDate.getDate() &&
              month === currentDate.getMonth() &&
              year === currentDate.getFullYear()
            ) {
              cell.classList.add("today");
            }
            date++;
          }
          row.appendChild(cell);
        }

        calendarBody.appendChild(row);
        if (date > daysInMonth) break;
      }
    }

    prevBtn.addEventListener('click', () => {
      currentMonth--;
      if (currentMonth < 0) {
        currentMonth = 11;
        currentYear--;
      }
      renderCalendar(currentMonth, currentYear);
    });

    nextBtn.addEventListener('click', () => {
      currentMonth++;
      if (currentMonth > 11) {
        currentMonth = 0;
        currentYear++;
      }
      renderCalendar(currentMonth, currentYear);
    });

    renderCalendar(currentMonth, currentYear);
  </script>

</body>
</html>
