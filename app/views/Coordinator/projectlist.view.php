<?php
    require_once "navbar.php";
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project List</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            font-size: 14px; /* Setting font size for the whole page */
        }
        .prj-container {
            width: 90%;
            margin: 0 auto;
            padding: 20px;
        }
        .prj-search-bar {
            display: flex;
            margin-bottom: 20px;
        }
        .prj-search-bar input {
            flex: 1;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px 0 0 4px;
            font-size: 14px;
        }
        .prj-search-bar button {
            padding: 10px 20px;
            border: 1px solid #ccc;
            border-left: none;
            border-radius: 0 4px 4px 0;
            background-color: #007BFF;
            color: white;
            cursor: pointer;
            font-size: 14px;
        }
        .prj-table {
            width: 100%;
            border-collapse: seperate;
            border-spacing: 0;
            border-radius: 12px;
            oveerflow: hidden;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            background-color: #fff;
        }
        .prj-th, .prj-td {
            padding: 12px;
            text-align: left;
            border: 1px solid #ddd;
        }
        .prj-th {
            background-color: #f2f2f2;
            font-weight: 500;
        }
        .prj-tr:hover {
            background-color: #eaf3ff;
        }
        .prj-tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        .prj-action-buttons {
            display: flex;
            gap: 10px;
        }
        .prj-action-buttons button {
            padding: 8px 14px;
            border: none;
            border-radius: 6px;
            font-weight: 500;
            cursor: pointer;
            font-size: 14px;
            transition: background 0.2s ease;
        }
        .prj-edit-btn {
            background-color: #17a2b8;
            color: white;
        }
        .prj-remove-btn {
            background-color: #dc3545;
            color: white;
        }
        .prj-edit-btn:hover {
            background-color: #138496;
        }

        .prj-remove-btn:hover {
            background-color: #c82333;
        }
        .prj-modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.4);
        }
        .prj-modal-content {
            background-color: #fff;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            max-width: 500px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.3);
            border-radius: 8px;
            text-align: left;
        }
        .prj-modal-content p {
            margin: 10px 0;
        }
        .prj-modal-content .bold {
            font-weight: bold;
        }
        .prj-modal-buttons {
            display: flex;
            justify-content: center;
            gap: 20px;
        }
        .prj-modal-buttons button {
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
        }
        .prj-yes-btn {
            background-color: #f44336;
            color: white;
        }
        .prj-no-btn {
            background-color: #ccc;
            color: black;
        }
        .prj-edit-modal-content input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            font-size: 14px;
        }
        .prj-edit-modal-content label {
            display: block;
            margin-top: 10px;
        }
        .prj-save-btn {
            width: 100px;
            background-color: #4CAF50;
            color: white;
        }
        input[type="text"],
        input[type="date"],
        input[type="number"] {
            border-radius: 6px;
            background-color: #fafafa;
            border: 1px solid #ccc;
            font-size: 14px;
        }

    </style>
</head>
<body>
    <div class="prj-container">
        <div class="prj-search-bar">
            <input type="text" id="search-input" placeholder="Search projects by ID, Title, or Coordinator...">
            <button id="search-btn" type="button">Search</button>
        </div>

        <table class="prj-table">
            <thead>
                <tr>
                    <th class="prj-th">Project ID</th>
                    <th class="prj-th">Project Title</th>
                    <th class="prj-th">Project Description</th>
                    <th class="prj-th">Created Date</th>
                    <th class="prj-th">Start Date</th>
                    <th class="prj-th">End Date</th>
                    <th class="prj-th">Percentage</th>
                    <th class="prj-th">Actions</th>
                </tr>
            </thead>
            <tbody id="project-list">

            <?php if (!empty($data['projects'])) : ?>
                <?php foreach ($data['projects'] as $project): ?>
                    <tr class="prj-tr">
                        <td class="prj-td" id="project-id-<?= htmlspecialchars($project->id) ?>"><?= htmlspecialchars($project->id) ?></td>
                        <td class="prj-td" id="project-title-<?= htmlspecialchars($project->id) ?>"><?= htmlspecialchars($project->title) ?></td>
                        <td class="prj-td" id="project-description-<?= htmlspecialchars($project->id) ?>"><?= htmlspecialchars($project->description) ?></td>
                        <td class="prj-td"><?= htmlspecialchars($project->createdat) ?></td>
                        <td class="prj-td"><?= htmlspecialchars($project->startdate) ?></td>
                        <td class="prj-td"><?= htmlspecialchars($project->enddate) ?></td>
                        <td class="prj-td"><?= htmlspecialchars($project->id) ?>%</td>
                        <td class="prj-td prj-action-buttons">
                            <form action="<?=ROOT?>/coordinator/loadupdateproject" method="post">
                                <input type="hidden" name="id" value="<?=$project->id?>">
                            <button class="prj-edit-btn" type="submit">View</button></form>
                            <div>
                            <button class="prj-remove-btn" onclick="confirmDelete('<?= htmlspecialchars($project->id) ?>')">Remove</button></div>
                        </td>
                    </tr>
                <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <div id="delete-modal" class="prj-modal">
        <div class="prj-modal-content">
            <p>Are you sure you want to delete <span class="bold" id="delete-title"></span>?</p>
            <div class="prj-modal-buttons">
                <form action="<?=ROOT?>/coordinator/deleteProject" method="post">
                    <input type="hidden" id="delete-id" name="id">
                    <button class="prj-yes-btn" type="submit">Yes</button>
                    <button type="button" class="prj-no-btn" onclick="closeModal()">No</button>
                </form>
            </div>
        </div>
    </div>

    <div id="edit-modal" class="prj-modal">
        <!-- <form action="<=ROOT?>/Admin/updateProject" method="post">
        <div class="prj-modal-content prj-edit-modal-content">
            <input type="hidden" id="edit-id" name="id">

            <label for="edit-title">Project Title:</label>
            <input type="text" id="edit-title" name="title">
            <label for="edit-description">Project Description:</label>
            <input type="text" id="edit-description" name="description">
            <label for="edit-coordinator">Project Coordinator:</label>
            <input type="text" id="edit-coordinator" name="coordinator">
            <label for="edit-start-date">Start Date:</label>
            <input type="date" id="edit-start-date" name="start_date">
            <label for="edit-end-date">End Date:</label>
            <input type="date" id="edit-end-date" name="end_date">
            <label for="edit-percentage">Percentage:</label>
            <input type="number" id="edit-percentage" name="percentage" min="0" max="100 " step="1">
            <div class="prj-modal-buttons">
                <button type="submit" class="prj-save-btn">Save</button>
                <button class="prj-no-btn" type="button" onclick="closeModal()">Cancel</button>
            </div>
        </div>
        </form> -->
    </div>

    <script>
    let selectedProjectId;

    // Show the delete confirmation modal
    function confirmDelete(id) {
        selectedProjectId = id;

        // Get the title of the project for the confirmation message
        let title = document.getElementById('project-title-' + id).textContent;

        // Set the title in the confirmation message
        document.getElementById('delete-title').textContent = title;

        // Pass the ID to the hidden input field in the form
        document.getElementById('delete-id').value = id;

        // Display the delete modal
        document.getElementById('delete-modal').style.display = 'block';
    }

    // Show the edit modal with the current project details
    function editProject(id) {
        selectedProjectId = id;

        // Get the project details dynamically
        let id1 = document.getElementById('project-id-' + id).textContent;
        let title = document.getElementById('project-title-' + id).textContent;
        let description = document.getElementById('project-description-' + id).textContent;
        let coordinator = document.getElementById('project-coordinator-' + id).textContent;
        let startDate = document.getElementById('project-start-date-' + id).textContent;
        let endDate = document.getElementById('project-end-date-' + id).textContent;
        let percentage = document.getElementById('project-percentage-' + id).textContent;

        // Populate the modal with existing data
        document.getElementById('edit-id').value = id1;
        document.getElementById('edit-title').value = title;
        document.getElementById('edit-description').value = description;
        document.getElementById('edit-coordinator').value = coordinator;
        document.getElementById('edit-start-date').value = startDate;
        document.getElementById('edit-end-date').value = endDate;
        document.getElementById('edit-percentage').value = percentage;

        document.getElementById('edit-modal').style.display = 'block';
    }

    // Close any open modal
    function closeModal() {
        document.getElementById('delete-modal').style.display = 'none';
        document.getElementById('edit-modal').style.display = 'none';
    }

    document.getElementById("search-btn").addEventListener("click", function() {
        const searchTerm = document.getElementById("search-input").value.toLowerCase();
        const rows = document.querySelectorAll("#project-list tr");

        rows.forEach(row => {
            const columns = row.querySelectorAll("td");
            const id = columns[0].textContent.toLowerCase();
            const title = columns[1].textContent.toLowerCase();
            const coordinator = columns[3].textContent.toLowerCase();

            if (id.includes(searchTerm) || title.includes(searchTerm) || coordinator.includes(searchTerm)) {
                row.style.display = "";
            } else {
                row.style.display = "none";
            }
        });
    });
    </script>

</body>
</html>