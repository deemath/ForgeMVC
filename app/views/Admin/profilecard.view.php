<?php require_once "navigationBar.php"; ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coordinator Profile</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <style>
    body {
        margin: 0;
        background-color: #f4f6f8;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        color: #1f2937;
    }

    .main-wrapper {
        max-width: 1200px;
        margin: 50px auto;
        padding: 40px;
        background-color: #ffffff;
        border-radius: 16px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
    }

    .top-section {
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        margin-bottom: 40px;
    }

    .top-left {
        display: flex;
        align-items: center;
        flex-wrap: wrap;
    }

    .top-left img {
        width: 120px;
        height: 120px;
        border-radius: 50%;
        object-fit: cover;
        margin-right: 25px;
        border: 4px solid #e2e8f0;
    }

    .info h2 {
        font-size: 1.9rem;
        margin: 0;
        color: #1e293b;
    }

    .info p {
        font-size: 1.1rem;
        color: #4b5563;
        margin-top: 8px;
    }

    .divider {
        border-top: 2px solid #e2e8f0;
        margin: 30px 0;
    }

    .bottom-section {
        display: flex;
        gap: 40px;
        flex-wrap: wrap;
    }

    .info-box {
        flex: 1;
        background-color: #f9fafb;
        padding: 30px;
        border-radius: 12px;
        border: 1px solid #e5e7eb;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.03);
        min-width: 280px;
    }

    .info-box h3 {
        font-size: 1.5rem;
        margin-bottom: 18px;
        padding-bottom: 12px;
        border-bottom: 2px solid #e5e7eb;
        color: #1e293b;
    }

    .info-box p {
        font-size: 1.05rem;
        margin: 12px 0;
        color: #374151;
    }

    .info-box p strong {
        font-weight: 600;
        color: #111827;
    }

    .project-title {
        background-color: #e2e8f0;
        padding: 10px 14px;
        border-radius: 8px;
        margin: 10px 0;
        font-size: 1rem;
        color: #1e293b;
        font-weight: 500;
    }

    .active-btn, .disable-btn {
        padding: 0.3rem 1.0rem;
        font-size: 1rem;
        font-size: 12px;
        font-weight: 600;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        transition: all 0.3s ease;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.06);
        margin-top: 10px;
    }

    .active-btn {
        background-color:rgb(255, 255, 255);
        color:rgb(4, 131, 61);
        font-weight:100;
        border: 1px rgb(11, 77, 42) solid;
    }

    .active-btn:hover {
        background-color: #dc2626;
        color:rgb(255, 255, 255);
    }

    .disable-btn {
        background-color:rgb(255, 255, 255);
        color:rgb(131, 4, 4);
        font-weight:100;
        border: 1px rgb(68, 17, 17) solid;
    }

    .disable-btn:hover {
        background-color: #059669 ;
        color:rgb(255, 255, 255);
    }

    label[for="disable"] {
        display: block;
        font-size: 0.95rem;
        font-weight: 500;
        margin-bottom: 6px;
        color: #6b7280;
    }
    .dis-lable {
        display: inline-block;
        padding: 10px 20px;
        background-color: rgb(237, 21, 21);
        color: white;
        border: none;
        border-radius: 8px;
        font-weight: 500;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        cursor: pointer;
        text-align: center;
        
        text-decoration: none;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        transition: background-color 0.3s ease;
    }
    .dis-lable p{
        color:white;
        padding:0;
        margin:0;
    }

    .act-lable {
        display: inline-block;
        padding: 10px 20px;
        background-color: rgb(34, 154, 98);
        color: white;
        border: none;
        border-radius: 8px;
        font-weight: 500;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        cursor: pointer;
        text-align: center;
        
        text-decoration: none;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        transition: background-color 0.3s ease;
    }
    .act-lable p{
        color:white;
        padding:0;
        margin:0;
    }
    .back-btn {
        display: inline-block;
        margin-top: 2rem;
        padding: 10px 20px;
        background-color:rgb(247, 247, 248);
        border-color:rgb(5, 5, 5) ;
        color: #007bff;
        border:2px solid;
        border-radius: 6px;
        text-decoration: none;
        font-weight: 500;
        transition: all 0.3s ease;
    }
z
    .back-btn:hover {
        background-color: #0056b3;
        transform: translateY(-2px);
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        border-color: #0056b3; 
        color: #111827; 
    }

    @media (max-width: 768px) {
        .top-section {
            flex-direction: column;
            align-items: flex-start;
        }

        .top-left {
            margin-bottom: 20px;
        }

        .bottom-section {
            flex-direction: column;
        }
        
    }
</style>

</head>

<div class="main-wrapper">
    <?php if (isset($data['coordata'])) : ?>
        <?php $coordinator = $data['coordata']; ?>

        <!-- Top Section -->
        <div class="top-section">
            <div class="top-left">
                <?php if (!empty($coordinator->image)) : ?>
                    <img src="data:image/jpeg;base64,<?= base64_encode($coordinator->image) ?>" alt="<?= htmlspecialchars($coordinator->name) ?>">
                <?php else : ?>
                    <img src="<?= ROOT ?>/assets/img/default-avatar.png" alt="Default Avatar">
                <?php endif; ?>

                <div class="info">
                    <h2><?= htmlspecialchars($coordinator->name) ?></h2>
                    <p><i class="fas fa-envelope"></i> <?= htmlspecialchars($coordinator->email) ?></p>
                </div>
            </div>

            <div>
         
                    

            <form id="statusForm" method="POST" action="<?= ROOT ?>/Admin/<?= $data['coordata']->status == 1 ? 'activeCoordinator' : 'disableCoordinator' ?>">
                <input type="hidden" name="id" value="<?= $data['coordata']->id ?>">
                <?php if ($data['coordata']->status == 1): ?>
                    <label for="disable" class="dis-lable"><p>Deactive</p></label>
                    <button type="button" class="disable-btn" id="confirmButton">Click here to Active</button>  <!-- type="button" -->
                <?php else: ?>
                    <label for="disable" class="act-lable"><p>Active</p></label>
                    <button type="button" class="active-btn" id="confirmButton">Click here to Deactive</button> <!-- type="button" -->
                <?php endif; ?>
            </form>


            </div>
        </div>

        <!-- Divider -->
        <div class="divider"></div>

        <!-- Bottom Section -->
        <div class="bottom-section">
            <div class="info-box">
                <h3>Coordinator Details</h3>
                <p><strong>Name:</strong> <?= htmlspecialchars($coordinator->name) ?></p>
                <p><strong>Email:</strong> <?= htmlspecialchars($coordinator->email) ?></p>
                <p><strong>Phone:</strong> <?= htmlspecialchars($coordinator->phone) ?></p>
                <p><strong>Institute:</strong> <?= htmlspecialchars($coordinator->institute) ?></p>
                <p><strong>Address:</strong> <?= htmlspecialchars($coordinator->address) ?></p>
            </div>

            <div class="info-box">
                <h3>Assigned Projects</h3>
                <p><strong>Total:</strong> <?= $data['coordinatorprojectCount'][0]->count ?? 0 ?></p>
                <?php if (!empty($data['assignedProjects'])) : ?>
                    <?php foreach ($data['assignedProjects'] as $project) : ?>
                        <div class="project-title"><?= htmlspecialchars($project->title) ?></div>
                    <?php endforeach; ?>
                <?php else : ?>
                    <p>No assigned projects.</p>
                <?php endif; ?>
            </div>
        </div>

        <a href="<?= ROOT ?>/Admin/dashboard" class="back-btn">← Back to Projects</a>

    <?php endif; ?>
</div>


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<script>
   document.getElementById('confirmButton').addEventListener('click', function(event) {
    Swal.fire({
        title: 'Confirm Action',
        text: "You are about to " + (<?= $data['coordata']->status == 1 ? "'deactivate'" : "'activate'" ?>) + " this coordinator. This action cannot be undone.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#007bff',  // Professional blue color
        cancelButtonColor: '#d33',      // Red color for cancellation
        confirmButtonText: 'Yes, proceed',
        cancelButtonText: 'Cancel',
        reverseButtons: true,  // Make 'Yes' button appear first
        customClass: {
            popup: 'custom-popup',  // Custom class for the popup
            confirmButton: 'swal-confirm-btn',  // Custom button styling
            cancelButton: 'swal-cancel-btn'  // Custom button styling
        },
        backdrop: true,  // Add backdrop effect for focus
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById('statusForm').submit();
        }
    });
});


</script>
