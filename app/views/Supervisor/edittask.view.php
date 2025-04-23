<?php
require_once "navigationbar.php";

?>


<!DOCTYPE html>

<head>
  <meta charset="UTF-8">
  <title>Task Management UI</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #f4f4f4;
      /* padding: 20px; */
    }

    .container {
      max-width: 99%;
      min-height: max-content;
      margin: 3 auto;
      background: white;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }

    h2 {
      font-size: 24px;
      margin-bottom: 15px;
    }

    label {
      font-weight: bold;
      display: block;
      margin-bottom: 5px;
    }

    .section {
      margin-bottom: 20px;
    }

    select, input[type="date"], input[type="text"] {
      width: 100%;
      padding: 8px;
      margin-top: 5px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }

    .description-box, .info-box {
      background: #f1f1f1;
      padding: 10px;
      border-radius: 5px;
      display: flex;
      justify-content: space-between;
    }

    .grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
      gap: 20px;
    }

    .sub-tasks li,
    .assignees div {
      display: flex;
      justify-content: space-between;
      background: #eee;
      padding: 6px 10px;
      margin: 5px 0;
      border-radius: 5px;
    }

    .comments .comment {
      background: #fff;
      border: 1px solid #ddd;
      padding: 10px;
      margin-bottom: 10px;
      border-radius: 5px;
    }

    .comment small {
      display: block;
      color: gray;
      text-align: right;
    }

    .button-row {
      display: flex;
      justify-content: space-between;
      margin-top: 20px;
    }

    button {
      padding: 10px 20px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }

    .btn-primary {
      background: #007bff;
      color: white;
    }

    .btn-secondary {
      background: #6c757d;
      color: white;
    }

    .btn-link {
      background: none;
      color: #007bff;
      border: none;
      padding: 0;
      cursor: pointer;
      margin-top: 5px;
    }

    .status-dropdown {
      background-color: #d1e7dd;
      color: #0f5132;
    }
    .edit-btn{
      margin-right: 0;
      right: 0;
      padding: 0;
      
    }
  </style>
</head>

  <div class="container">
    <?php if (!empty($selected)): ?>
    <?php foreach($data['selected'] as $selected) : ?>

        <div style="display: flex; justify-content: space-between; align-items: center;">
        <h2 id="task-title"><?=$selected->title?></h2>
        <button class="edit-btn" onclick="editTitle(<?=$selected->id ?>, `<?=htmlspecialchars($selected->title, ENT_QUOTES)?>`)">✏️</button>

        </div>


    <div class="section">
      <label>Description</label>
      <div class="description-box">
        <div>
        <?=$selected->description?>
        </div>
        <div>
          <button class="edit-btn" onclick="editDescription(<?=$selected->id ?>, `<?=htmlspecialchars($selected->description, ENT_QUOTES)?>`)">✏️</button>

        </div>
      </div>
      
    </div>

    <div class="section grid">
      <div>
        <label>Status</label>
        <select class="status-dropdown">
          <option>On Progress</option>
          <option>To Do</option>
          <option>Complete</option>
          <option>Terminate</option>
        </select>
      </div>
      <div>
        <label>Flags</label>
        <select>
          <option>--None--</option>
          <option>Important</option>
          <option>Urgent</option>
          <option>Revise</option>
          <option>Good</option>
        </select>
      </div>
      <div>
        <label>Start Date</label>
        <input type="date" value="2024-01-01">
      </div>
      <div>
        <label>End Date</label>
        <input type="date" value="2024-01-10">
      </div>
    </div>

    <div class="section">
      <label>Sub-Tasks</label>
      <ul class="sub-tasks">
        <li>Sub-task 1 <button class="btn-link">✕</button></li>
        <li>Sub-task 2 <button class="btn-link">✕</button></li>
        <li>Sub-task 3 <button class="btn-link">✕</button></li>
      </ul>
      <button class="btn-link">+ Add Sub Tasks</button>
    </div>

    <div class="section">
      <label>Assign</label>
      <div class="assignees">
        <div>John Doe (john.doe@example.com) <button class="btn-link">✕</button></div>
        <div>Jane Smith (jane.smith@example.com) <button class="btn-link">✕</button></div>
      </div>
      <button class="btn-link">+ Assign Members</button>
    </div>

    <div class="section">
      <label>Created By</label>
      <div class="info-box">
        Admin User (admin@example.com) - Project Manager
      </div>
    </div>

    <div class="section comments">
      <label>Comments</label>
      <div class="comment">
        This is a comment about the task.
        <small>John Doe - Member - 12/08/2024</small>
      </div>
      <div class="comment">
        Another comment regarding the task.
        <small>Jane Smith - Member - 12/09/2024</small>
      </div>
      <input type="text" placeholder="Add Comment...">
      <button class="btn-primary" style="margin-top: 10px;">Post</button>
    </div>

    <div class="button-row">
      <button class="btn-secondary">Discard</button>
      <button class="btn-primary">Save</button>
    </div>



    <?php endforeach?>
    <?php endif?>
  </div>


        



  <!-- Edit Title  -->
        <div id="editTitle-div" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%;
        background: rgba(0,0,0,0.5); justify-content: center; align-items: center; z-index: 9999;">
        <div style="background: white; padding: 20px; border-radius: 10px; width: 300px; box-shadow: 0 0 10px rgba(0,0,0,0.3);">
            <h3>Edit Title</h3>
            <form action="editTitle" method="post">
            <input type="hidden" id="task_id" name="taskid">
            <input type="text" name="title" id="edit-title-input" style="width: 100%; padding: 8px; margin-top: 10px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 5px;">
            <div style="text-align: right;">
            <button type="button" onclick="closetitle()" style="padding: 6px 12px; background: #ccc; border: none; border-radius: 5px; margin-right: 10px;">Cancel </button>
            <button type="submit" style="padding: 6px 12px; background: #007bff; color: white; border: none; border-radius: 5px;">Save </button>
            </form>
          </div>
        </div>
        </div>



        <!-- description edit -->

        <div id="edit-descrp" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%;
              background: rgba(0,0,0,0.5); justify-content: center; align-items: center; z-index: 9999;">
        <div style="background: white; padding: 20px; border-radius: 10px; width: 300px; box-shadow: 0 0 10px rgba(0,0,0,0.3);">
            <h3>Edit Description</h3>

              <form action="editDescription" method ="post">

                <input type="hidden" id="task_id_des" name="taskid">
                <input type="text" id="edit-des-input" style="width: 100%; padding: 8px; margin-top: 10px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 5px;" name="description">
                <div style="text-align: right;">
                <button type="button" onclick="closeDescription()" style="padding: 6px 12px; background: #ccc; border: none; border-radius: 5px; margin-right: 10px;">Cancel</button>
                <button type="submit" style="padding: 6px 12px; background: #007bff; color: white; border: none; border-radius: 5px;">Save</button>
            
              </form>
              </div>
        </div>
        </div>



            <script>
                function editTitle(taskId, currenttitle){
                  document.getElementById('task_id').value = taskId;
                  document.getElementById('edit-title-input').value = currenttitle;
                  document.getElementById('editTitle-div').style.display = 'flex';
                }

                function closetitle() {
                  document.getElementById('editTitle-div').style.display = 'none';
                }
            

                function editDescription(taskId, currentDescription){
                  document.getElementById('task_id_des').value = taskId;
                  document.getElementById('edit-des-input').value = currentDescription;
                  document.getElementById('edit-descrp').style.display = 'flex';
                }
                function closeDescription() {
                  document.getElementById('edit-descrp').style.display = 'none';
                }

            </script>

      <!-- <pre>
      <php print_r($selected); ?>
      </pre> -->
</body>
</html>
