<?php
    require_once "navigationBar.php";
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coordinator List</title>
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
        }
        .prj-action-buttons button {
            padding: 8px 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
        }
        .prj-edit-btn {
            background-color: #007BFF;
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
    </style>
 </head>
<body>
    <div class="prj-container">
        <div class="prj-search-bar">
            <input type="text" id="search-input" placeholder="Search coordinators by ID, Name, Email, or Institute...">
            <button id="search-btn" type="button">Search</button>
        </div>

        <table class="prj-table">
            <thead>
                <tr>
                    <th class="prj-th">PRJCOR ID</th>
                    <th class="prj-th">Name</th>
                    <th class="prj-th">Institute</th>
                    <th class="prj-th">Email</th>
                    <th class="prj-th">Joined Date</th>
                    <th class="prj-th">No of Projects</th>
                    <th class="prj-th">Actions</th>
                </tr>
            </thead>
            <tbody id="coordinator-list">

            <?php if (!empty($data)) : ?>
                <?php foreach ($data['coordinators'] as $coordinator): ?>
                    <tr class="prj-tr">
                        <td class="prj-td" id="coordinator-id-<?= htmlspecialchars($coordinator->id) ?>"><?= htmlspecialchars($coordinator->id) ?></td>
                        <td class="prj-td" id="coordinator-name-<?= htmlspecialchars($coordinator->id) ?>"><?= htmlspecialchars($coordinator->name) ?></td>
                        <td class="prj-td" id="coordinator-institute-<?= htmlspecialchars($coordinator->id) ?>"><?= htmlspecialchars($coordinator->institute) ?></td>
                        <td class="prj-td" id="coordinator-email-<?= htmlspecialchars($coordinator->id) ?>"><?= htmlspecialchars($coordinator->email) ?></td>
                        <td class="prj-td"><?= htmlspecialchars($coordinator->createdat) ?></td>
                        <td class="prj-td">5</td>
                        <td class="prj-td prj-action-buttons">
                            <button class="prj-edit-btn" onclick="editCoordinator('<?= htmlspecialchars($coordinator->id) ?>')">Visit</button>
                            <button class="prj-remove-btn" onclick="confirmDelete('<?= htmlspecialchars($coordinator->id) ?>')">Remove</button>
                        </td>
                    </tr>
                <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <div id="delete-modal" class="prj-modal">
        <div class="prj-modal-content">
            <p>Are you sure you want to delete <span class="bold" id="delete-name"></span>?</p>
            <div class="prj-modal-buttons">
                <form action="<?=ROOT?>/Admin/deleteCoordinator" method="post">
                    <!-- Hidden input field for ID -->
                    <input type="hidden" id="edit-id" name="id">
                    <button class="prj-yes-btn" type="submit">Yes</button>
                    <button type="button" class="prj-no-btn" onclick="closeModal()">No</button>
                </form>
            </div>
        </div>
    </div>


    <div id="edit-modal" class="prj-modal">
        <form action="<?=ROOT?>/Admin/updateCoordinator" method="post">
        <div class="prj-modal-content prj-edit-modal-content">
            <input type="hidden" id="edit-id" name="id">

            <label for="edit-name">Name:</label>
            <input type="text" id="edit-name" name ="name">
            <label for="edit-institute">Institute:</label>
            <input type="text" id="edit-institute" name ="institute">
            <label for="edit-email">Email:</label>
            <input type="email" id="edit-email" name ="email">
            <div class="prj-modal-buttons" >
                <button type="submit" class="prj-save-btn">Save</button>

               
                <button class="prj-no-btn" onclick="closeModal()">Cancel</button>
                
            </div>
        </div>
        </form>
    </div>

    <script>
    let selectedCoordinatorId;

    // Show the delete confirmation modal
    // Show the delete confirmation modal
        function confirmDelete(id) {
            selectedCoordinatorId = id;

            // Get the name of the coordinator for the confirmation message
            let name = document.getElementById('coordinator-name-' + id).textContent;

            // Set the name in the confirmation message
            document.getElementById('delete-name').textContent = name;

            // Pass the ID to the hidden input field in the form
            document.getElementById('edit-id').value = id;

            // Display the delete modal
            document.getElementById('delete-modal').style.display = 'block';
        }


    // Perform the delete action
    function deleteCoordinator() {
        // Here, you can send an AJAX request to delete the coordinator from the database
        alert('Coordinator ' + selectedCoordinatorId + ' deleted.');
        closeModal();
    }

    // Show the edit modal with the current coordinator details
    function editCoordinator(id) {
        selectedCoordinatorId = id;
        
        // Get the coordinator details dynamically
        let id1 = document.getElementById('coordinator-id-' + id).textContent;
        let name = document.getElementById('coordinator-name-' + id).textContent;
        let institute = document.getElementById('coordinator-institute-' + id).textContent;
        let email = document.getElementById('coordinator-email-' + id).textContent;

        // Populate the modal with existing data
        document.getElementById('edit-id').value = id1;
        document.getElementById('edit-name').value = name;
        document.getElementById('edit-institute').value = institute;
        document.getElementById('edit-email').value = email;

        document.getElementById('edit-modal').style.display = 'block';
    }

    

            document.getElementById("search-btn").addEventListener("click", function() {
            const searchTerm = document.getElementById("search-input").value.toLowerCase();
            const rows = document.querySelectorAll("#coordinator-list tr");

            rows.forEach(row => {
                const columns = row.querySelectorAll("td");
                const id = columns[0].textContent.toLowerCase();
                const name = columns[1].textContent.toLowerCase();
                const institute = columns[2].textContent.toLowerCase();
                const email = columns[3].textContent.toLowerCase();

                if (id.includes(searchTerm) || name.includes(searchTerm) || institute.includes(searchTerm) || email.includes(searchTerm)) {
                    row.style.display = "";
                } else {
                    row.style.display = "none";
                }
            });
        });


    // Close any open modal
    function closeModal() {
        document.getElementById('delete-modal').style.display = 'none';
        document.getElementById('edit-modal').style.display = 'none';
    }


</script>

</body>
</html>