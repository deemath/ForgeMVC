<?php
    require_once "navigationBar.php";
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
            overflow-y: auto;
            max-height: 90vh;
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
            border-collapse: collapse;
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
        .prj-tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        .prj-action-buttons {
            display: flex;
            gap: 10px;
            justify-content: space-around;
        }
        .prj-action-buttons button {
            padding: 8px 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
        }
        .prj-edit-btn {
            background-color: #4CAF50;
            color: white;
        }
        .prj-remove-btn {
            background-color: #f44336;
            color: white;
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
            border-radius: 4px;
            text-align: left;
        }
        .prj-modal-content p {
            margin: 10px 0;
        }
        .prj-modal-content .bold {
            font-weight: bold;
        }
        .prj-modal-buttons {
            justify-content: center;
            gap: 20px;
            justify-content: space-around;
        }
        .prj-modal-buttons button {
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
            justify-content: center;
            justify-content: space-around;
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

        .prj-modal {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
        justify-content: center;
        align-items: center;
        z-index: 1000;
    }

    .prj-modal-content {
        background-color: #fff;
        padding: 20px;
        border-radius: 4px;
        width: 400px;
        text-align: left;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    .prj-modal-header {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-bottom: 15px;
    }

    .warning-icon {
        font-size: 24px;
        color: #dc3545;
        margin-right: 10px;
    }

    .prj-modal-header h3 {
        font-size: 18px;
        color: #333;
        margin: 0;
    }

    .modal-description {
        font-size: 14px;
        color: #555;
        margin-bottom: 20px;
    }

    .bold {
        font-weight: bold;
    }

    .error-text {
        color: #dc3545;
        font-size: 10px;
        margin-top: 10px;
    }

    .note-text {
        color: #ffc107;
        font-size: 10px;
        margin-top: 5px;
    }
    .prj-yes-btn, .prj-no-btn {
        padding : 10px 20px;
        font-size: 14px;
        border-radius: 5px;
        cursor: pointer;
        transition: all 0.3s ease;
        margin-top: 10px;
        margin-bottom: 10px;
        margin-left: 10px;
        margin-right: 10px;
    }

    .prj-yes-btn {
        background-color: #dc3545;
        color: #fff;
        border: none;
    }

    .prj-yes-btn:hover {
        background-color: #c82333;
    }

    .prj-no-btn {
        background-color: #6c757d;
        color: #fff;
        border: none;
    }

    .prj-no-btn:hover {
        background-color: #5a6268;
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
                    <th class="prj-th">Project Coordinator</th>
                    <th class="prj-th">Created Date</th>
                    <th class="prj-th">Start Date</th>
                    <th class="prj-th">End Date</th>
                    <th class="prj-th">Percentage</th>
                    <th class="prj-th">Actions</th>
                </tr>
            </thead>
            <tbody id="project-list">

            <?php if (!empty($data)) : ?>
                <?php foreach ($data['projects'] as $project): ?>
                    <tr class="prj-tr">
                        <td class="prj-td" id="project-id-<?= htmlspecialchars($project->id) ?>"><?= htmlspecialchars($project->id) ?></td>
                        <td class="prj-td" id="project-title-<?= htmlspecialchars($project->id) ?>"><?= htmlspecialchars($project->title) ?></td>
                        <td class="prj-td" id="project-description-<?= htmlspecialchars($project->id) ?>"><?= htmlspecialchars($project->description) ?></td>
                        <td class="prj-td" id="project-coordinator-<?= htmlspecialchars($project->id) ?>"><?= htmlspecialchars($project->coordinatorid) ?></td>
                        <td class="prj-td"><?= htmlspecialchars($project->createdat) ?></td>
                        <td class="prj-td"><?= htmlspecialchars($project->startdate) ?></td>
                        <td class="prj-td"><?= htmlspecialchars($project->enddate) ?></td>
                        <td class="prj-td"><?= htmlspecialchars($project->id) ?>%</td>
                        <td class="prj-td prj-action-buttons">
                            <button class="prj-edit-btn" onclick="editProject('<?= htmlspecialchars($project->id) ?>')">Edit</button>
                            <button class="prj-remove-btn" onclick="confirmDelete('<?= htmlspecialchars($project->id) ?>')">Remove</button>
                        </td>
                    </tr>
                <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <div id="delete-modal" class="prj-modal">
        <div class="prj-modal-content">
            <div class="prj-modal-header">
                <span class="warning-icon">&#9888;</span>
                <h3>Delete Confirmation</h3>
            </div>
            <p>Are you sure you want to delete <span class="bold" id="delete-title"></span>?</p>
            <div class="prj-modal-buttons">
                    <br>
                    <span class="error-text">This action cannot be undone. Deleting this will permanently remove it from the system.</span>
                    <br>
                    <span class="note-text">Warning: This may cause issues if the coordinator is actively involved in ongoing projects. Please proceed with caution.</span>
                    <div class="prj-modal-buttons">
                        <form action="<?=ROOT?>/Admin/deleteProject" method="post">
                            <input type="hidden" id="delete-id" name="id">
                            <button class="prj-yes-btn" type="submit">Yes</button>
                            <button type="button" class="prj-no-btn" onclick="closeModal()">No</button>
                        </form>
                    </div>
            </div>
        </div>
    </div>

    <div id="edit-modal" class="prj-modal">
        <form action="<?=ROOT?>/Admin/updateProject" method="post">
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
        </form>
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