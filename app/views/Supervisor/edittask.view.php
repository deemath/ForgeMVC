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

    <!-- create suitable dialog window for show errors is any in $data["errors"] -->
     <div>
    <?php if (!empty($data['errors'])): ?>
      <div style="background-color: #f8d7da; color: #721c24; padding: 10px; border-radius: 5px; margin-bottom: 20px;">
        <strong>Error:</strong>
        <ul>
          <?php foreach ($data['errors'] as $error): ?>
            <li><?= htmlspecialchars($error) ?></li>
          <?php endforeach; ?>
        </ul>
      </div>
    <?php endif; ?>
     </div>


  <div class="container">
    <?php if (!empty($selected)): ?>
    <?php foreach($data['selected'] as $selected) : ?>

        <div style="display: flex; justify-content: space-between; align-items: center;">
        <h2 id="task-title"><?=$selected->title?></h2>
        <?php if($_SESSION['user_role']==2 ||$_SESSION['user_role']==3 ) :?>
          <button class="edit-btn" onclick="editTitle(<?=$selected->id ?>, `<?=htmlspecialchars($selected->title, ENT_QUOTES)?>`)"> 🖋️</button>
        <?php endif; ?>
        </div>

        <!-- <pre>
        <php print_r($data); ?>
        </pre> -->
      <div class="section">
        <label>Description</label>
        <div class="description-box">
            <div>
            <?=$selected->description?>
            </div>
            <div>
              <?php if($_SESSION['user_role']==2 ||$_SESSION['user_role']==3 ) :?>
                <button class="edit-btn" onclick="editDescription(<?=$selected->id ?>, `<?=htmlspecialchars($selected->description, ENT_QUOTES)?>`)"> 🖋️</button>
              <?php endif; ?>
            </div>
        </div>
        
      </div>



    <?php
      $statusText = [
        1 => 'To Do',
        2 => 'In Progress',
        3 => 'Complete',
        4 => 'Terminated' // add more if needed
      ];
      ?>


    <div class="section grid">
        <div>
          <!-- <label>Status</label> -->
          <!-- <select class="status-dropdown" disabled>
            <php foreach ($statusText as $key => $value): ?>
              <option value="<= $key ?>" <= $selected->status == $key ? 'selected' : '' ?>>
                <= $value ?>
              </option>
            <php endforeach; ?>
          </select> -->
          <div>

            <label>Status</label>


            <div class="info-box" onclick="changestatus(<?=$selected->id ?>, `<?=htmlspecialchars($selected->status, ENT_QUOTES)?>`)" style="background-color:#fff">
              <!-- <= $statusText[$selected->status] ?? 'Unknown' ?> -->
              <?php
                  if ($selected->status == 1) {
                      $status = '<div style="padding: 8px; border: 2px solid #1e40af; border-radius: 1rem; background-color: #dbeafe; color: #1e3a8a;">
                                      To Do
                                </div>';
                  } elseif ($selected->status == 2) {
                      $status = '<div style="padding: 8px; border: 2px solid #065f46; border-radius: 1rem; background-color: #d1fae5; color: #064e3b;">
                                      In Progress
                                </div>';
                  } elseif ($selected->status == 3) {
                      $status = '<div style="padding: 8px; border: 2px solid #c2410c; border-radius: 1rem; background-color: #ffedd5; color: #9a3412;">
                                      Complete
                                </div>';
                  } elseif ($selected->status == 4) {
                      $status = '<div style="padding: 8px; border: 2px solid #374151; border-radius: 1rem; background-color: #f3f4f6; color: #1f2937;">
                                      Terminated
                                </div>';
                  } else {
                      $status = '<div style="padding: 8px; border: 2px solid #991b1b; border-radius: 1rem; background-color: #fee2e2; color: #7f1d1d;">
                                      Overdue
                                </div>';
                  }
                  echo $status;
                  ?>

            </div>
          </div>

        </div>

      <div>
        <label>Flags</label>
                <?php if(!empty($data['flags'])){
                  foreach ($data['flags'] as $flags){
                  if ($flags->flagid == 1) {
                      $flag = '<div style="padding: 8px; border: 2px solid #1e40af; border-radius: 0.5rem; background-color: #dbeafe; color:rgb(228, 19, 194);">
                                      Important
                                </div>';
                  } elseif ($flags->flagid == 2) {
                      $flag = '<div style="padding: 8px; border: 2px solid #065f46; border-radius: 0.5rem; background-color:rgb(3, 63, 176); color:rgb(255, 255, 255);">
                                      Revise
                                </div>';
                  } elseif ($flags->flagid == 3) {
                      $flag = '<div style="padding: 8px; border: 2px solidrgb(7, 117, 16); border-radius: 0.5rem; background-color:rgb(5, 125, 11); color:rgb(243, 249, 243);">
                                      Good
                                </div>';
                  } elseif ($flags->flagid == 4) {
                      $flag = '<div style="padding: 8px; border: 2px solidrgb(194, 29, 7); border-radius: 0.5rem; background-color: #f3f4f6; color:rgb(195, 8, 8);">
                                      Urgent
                                </div>';
                  } else {
                      $flag = '<div style="padding: 8px; border: 2px solidrgb(7, 7, 7); border-radius: 0.5rem; background-color: #fee2e2; color:rgb(0, 0, 0);">
                                     - None -
                                </div>';
                  }
                  echo $flag;
                }
                }else{
                  echo '<div style="padding: 8px; border: 1px solid rgb(7, 7, 7); border-radius: 0.5rem; background-color:rgba(82, 78, 78, 0.08); color:rgb(0, 0, 0);">
                                     - None -
                                </div>';
                }
                  ?>
                  <br>
                <?php if($_SESSION['user_role']==2 ||$_SESSION['user_role']==3 ) :?>
                <button style="padding: 6px 12px; background: #007bff; color: white; border: none; border-radius: 5px;" onclick="changeflags(<?=$data['flags'][0]->id ?? 0 ?>,<?=$data['flags'][0]->flagid ?? 0  ?>,<?=$selected->id ?>)"> Change </button>
                <?php endif; ?>
                <!-- <select>
          <option>--None--</option>
          <option>Important</option>
          <option>Urgent</option>
          <option>Revise</option>
          <option>Good</option>
        </select> -->
      </div>
      <div>
        <label>Start Date</label>

        <input type="date" value="<?=$selected->startdate ?>" onclick="changeStart(
        <?=$selected->id?>, 
        `<?=htmlspecialchars($selected->startdate, ENT_QUOTES)?>`,
        `<?=htmlspecialchars($selected->enddate, ENT_QUOTES)?>`,
        `<?=htmlspecialchars($data['project']->startdate, ENT_QUOTES)?>`,
        `<?=htmlspecialchars($data['project']->enddate, ENT_QUOTES)?>`)"
         style="background-color:rgb(255, 255, 255); color: #333; border: 1px solid #ccc; border-radius: 5px; padding: 8px;">
      </div>
      <div>
        <label>End Date</label>
        <input type="date" value="<?=$selected->enddate ?>" onclick="changeEnd
        (<?=$selected->id?>, 
        `<?=htmlspecialchars($selected->startdate, ENT_QUOTES)?>`,
        `<?=htmlspecialchars($selected->enddate, ENT_QUOTES)?>`,
        `<?=htmlspecialchars($data['project']->startdate, ENT_QUOTES)?>`,
        `<?=htmlspecialchars($data['project']->enddate, ENT_QUOTES)?>`)"
         style="background-color:rgb(255, 255, 255); color: #333; border: 1px solid #ccc; border-radius: 5px; padding: 8px;">
      </div>
    </div>

    <div class="section">
      <label>Sub-Tasks</label>
      <ul class="sub-tasks">
      <?php if(!empty($data['subtasks'])): ?>
      <?php foreach($data['subtasks'] as $subtask):?>
      <?php if($selected->id == $subtask->taskid): ?>
        <div style="display: flex; align-items: center; padding: 8px 0; border-bottom: 1px solid #ccc; width: 50%;">
          <li 
              onclick="editsubtask(<?= $selected->id?>, <?= $subtask->id?>, '<?= htmlspecialchars($subtask->title, ENT_QUOTES) ?>', '<?= htmlspecialchars($subtask->description, ENT_QUOTES) ?>')" 
              style="list-style: none; cursor: pointer; flex-grow: 1; padding-right: 10px; text-align: left;"
          >
              <div><b><?= $subtask->title ?></b></div>
              <div><?= $subtask->description ?></div>
          </li>
          
          <button 
              class="btn-link" 
              onclick="delsubtask(<?= $selected->id?>, <?= $subtask->id?>, '<?= htmlspecialchars($subtask->title, ENT_QUOTES) ?>', '<?= htmlspecialchars($subtask->description, ENT_QUOTES) ?>')" 
              style="background-color: white; color: red; border: none; padding: 5px 10px; border-radius: 4px; cursor: pointer; z-index: 100; position: relative;"
          >
              ✕
          </button>
      </div>



        <!-- <li>Sub-task 2 <button class="btn-link">✕</button></li>
        <li>Sub-task 3 <button class="btn-link">✕</button></li> -->
     
      <?php endif;?>
      <?php endforeach;?>
      <?php endif;?>
      </ul>
      <button class="btn-link" onclick="addsubtask(<?=$selected->id ?>)">+ Add Sub Tasks</button>
    </div>

    <div class="section">
      <label>Assign</label>
      <div class="assignees">

        <?php if(!empty($data['read'])): ?>
        <?php foreach($data['read'] as $read):?>
        <?php if($read->taskid == $selected->id): ?>

        <div><?=$read->user_name ?> (<?=$read->user_email?>) <button class="btn-link">✕</button></div>
        <!-- <div>Jane Smith (jane.smith@example.com) <button class="btn-link">✕</button></div> -->

        <?php endif;?>
        <?php endforeach;?>
        <?php endif;?>

      </div>
      <button class="btn-link" onclick="AssignMembers(<?=$selected->id?>)">+ Assign Members</button>
    </div>

    <div class="section">
      <label>Created By</label>
      <div class="info-box">
      

          <?=$selected->create_user ?> (<?=$selected->create_email?>) 
          <!-- <div>Jane Smith (jane.smith@example.com) <button class="btn-link">✕</button></div> -->

         
      </div>
    </div>

    <div class="section comments">
      <label>Comments</label>

        <?php if(!empty($data['comments'])): ?>
        <?php foreach($data['comments'] as $comment):?>
        <?php if($comment->taskid == $selected->id): ?>


         <?php if($comment->role==2){
            $urole = "Supervisor";
         } elseif($comment->role==3){
            $urole = "Co-supervisor";
         } elseif($comment->role==4){
            $urole = "Member";
         }else{
            $urole = "Undefined";
         }?>

              <div class="comment">
              <?=$comment->include ?>.
                <small><?=$comment->user_name ?> - <?=$urole ?> - <?=$comment->createdat ?></small>
              </div>

        <?php endif;?>
        <?php endforeach;?>
        <?php endif;?>

      <!-- <div class="comment">
        Another comment regarding the task.
        <small>Jane Smith - Member - 12/09/2024</small>
      </div> -->
      <form action="addcomment" method="post">
      <input type="hidden" name="taskid" value="<?=$selected->id?>">
      <input type="text" placeholder="Add Comment..." name="comment">
      <button class="btn-primary" style="margin-top: 10px;" type="submit">Post</button>
      </form>
    </div>

    <!-- <div class="button-row">
      <button class="btn-secondary">Discard</button>
      <button class="btn-primary">Save</button>
    </div> -->



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



        <!-- status edit window -->
        <div id="edit-status" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%;
              background: rgba(0,0,0,0.5); justify-content: center; align-items: center; z-index: 9999;">
        <div style="background: white; padding: 20px; border-radius: 10px; width: 300px; box-shadow: 0 0 10px rgba(0,0,0,0.3);">


            <form action="editStatus" method="POST">
            <input type="hidden" id="task_id_status" name="taskid">
              <label for="status">Select Status:</label>
              <select name="status" id="status">
                <option value="1">To Do</option>
                <option value="2">In Progress</option>
                <!-- <option value="3">Overdue</option> -->
                <option value="3">Complete</option>
                <option value="4">Terminated</option>
              </select>
              <br><br>
              <button type="button" onclick="closestatus()" style="padding: 6px 12px; background: #ccc; border: none; border-radius: 5px; margin-right: 10px;">Cancel</button>
              <button type="submit" style="padding: 6px 12px; background: #007bff; color: white; border: none; border-radius: 5px;">Update Status</button>
            </form>         
            </div>
        </div>


        <!-- change flags window -->
            <div id="edit-flags" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%;
                  background: rgba(0,0,0,0.5); justify-content: center; align-items: center; z-index: 9999;">
            <div style="background: white; padding: 20px; border-radius: 10px; width: 300px; box-shadow: 0 0 10px rgba(0,0,0,0.3);">


                <form action="Updateflags" method="POST">
                <input type="hidden" id="task_id_flags" name="id">
                <input type="hidden" id="taskIdflg" name="taskid">
                  <label for="status">Update flag </label>
                  <select name="flagid" id="flags">
                    <option value="0"> - None -</option>
                    <option value="1">Important</option>
                    <option value="2">Revise</option>
                    <!-- <option value="3">Overdue</option> -->
                    <option value="3">Good</option>
                    <option value="4">Urgent</option>
                  </select>
                  <br><br>
                  <button type="button" onclick="closeflags()" style="padding: 6px 12px; background: #ccc; border: none; border-radius: 5px; margin-right: 10px;">Cancel</button>
                  <button type="submit" style="padding: 6px 12px; background: #007bff; color: white; border: none; border-radius: 5px;">Update </button>
                </form>         
                </div>
            </div>


            <!-- add sub task window -->
            <div id="subtaskModal" class="modal" style="display:none; position:fixed; z-index:9999; left:0; top:0; width:100%; height:100%; overflow:auto; background-color:rgba(0,0,0,0.4);">
                <form method="post" action="addSubtask" class="modal-content" style="background-color:#fff; margin:10% auto; padding:20px; border-radius:10px; width:400px; max-width:90%; box-shadow:0 5px 15px rgba(0,0,0,0.3);">
                    
                    <h2 class="modal-title" style="margin-bottom:20px; font-size:24px; text-align:center;">Add Sub Task</h2>

                    <!-- Hidden Task ID -->
                    <input type="hidden" name="taskid" id="task_idsub" value="">

                    <label for="taskTitle" style="display:block; margin-bottom:5px;">Title</label>
                    <input type="text" name="title" id="taskTitle" required style="width:100%; padding:10px; margin-bottom:15px; border:1px solid #ccc; border-radius:5px;">

                    <label for="taskDesc" style="display:block; margin-bottom:5px;">Description</label>
                    <textarea name="description" id="taskDesc" rows="3" required style="width:100%; padding:10px; border:1px solid #ccc; border-radius:5px; margin-bottom:20px;"></textarea>

                    <div class="modal-actions" style="display:flex; justify-content:space-between;">
                        <button type="submit" class="btn-primary" style="background-color:#007bff; color:#fff; border:none; padding:10px 20px; border-radius:5px; cursor:pointer;">Add</button>
                        <button type="button" class="btn-secondary" onclick="closesubtast()" style="background-color:#6c757d; color:#fff; border:none; padding:10px 20px; border-radius:5px; cursor:pointer;">Cancel</button>
                    </div>
                </form>
            </div>


            <!-- edit subtask -->
            <div id="editsubtask" class="modal" style="display:none; position:fixed; z-index:9999; left:0; top:0; width:100%; height:100%; overflow:auto; background-color:rgba(0,0,0,0.4);">
                <form method="post" action="editSubtask" class="modal-content" style="background-color:#fff; margin:10% auto; padding:20px; border-radius:10px; width:400px; max-width:90%; box-shadow:0 5px 15px rgba(0,0,0,0.3);">
                    
                    <h2 class="modal-title" style="margin-bottom:20px; font-size:24px; text-align:center;">Edit Sub Task</h2>

                    <!-- Hidden Task ID -->
                    <input type="hidden" name="id" id="subtaskid" >
                    <input type="hidden" name="taskid" id="taskidsubedit" >

                    <label for="taskTitle" style="display:block; margin-bottom:5px;">Title</label>
                    <input type="text" name="title" id="subtaskTitle" required style="width:100%; padding:10px; margin-bottom:15px; border:1px solid #ccc; border-radius:5px;" >

                    <label for="taskDesc" style="display:block; margin-bottom:5px;">Description</label>
                    <textarea name="description" id="subtaskDesc" rows="3" required style="width:100%; padding:10px; border:1px solid #ccc; border-radius:5px; margin-bottom:20px;"></textarea>

                    <div class="modal-actions" style="display:flex; justify-content:space-between;">
                        <button type="submit" class="btn-primary" style="background-color:#007bff; color:#fff; border:none; padding:10px 20px; border-radius:5px; cursor:pointer;">Add</button>
                        <button type="button" class="btn-secondary" onclick="closeeditsubtask()" style="background-color:#6c757d; color:#fff; border:none; padding:10px 20px; border-radius:5px; cursor:pointer;">Cancel</button>
                    </div>
                </form>
            </div>


            <!-- delete subtask -->
            <div id="deletesubtask" class="modal" style="display:none; position:fixed; z-index:9999; left:0; top:0; width:100%; height:100%; overflow:auto; background-color:rgba(0,0,0,0.4);">
                <form method="post" action="deleteSubtask" class="modal-content" style="background-color:#fff; margin:10% auto; padding:20px; border-radius:10px; width:400px; max-width:90%; box-shadow:0 5px 15px rgba(0,0,0,0.3);">
                    
                    <h2 class="modal-title" style="margin-bottom:20px; font-size:24px; text-align:center;">Are you sure ?</h2>

                    <!-- Hidden Task ID -->
                    <input type="hidden" name="id" id="subtaskiddel" >
                    <input type="hidden" name="taskid" id="taskidsubeditdel" >

                    <label for="taskTitle" style="display:block; margin-bottom:5px;font-size:17px; text-align:center; font-weight: 100; " id="subtaskdeltitle"></label>
                    <!-- <input type="text" name="title" id="subtaskTitle" required style="width:100%; padding:10px; margin-bottom:15px; border:1px solid #ccc; border-radius:5px;" > -->

                    <label for="taskDesc" style="display:block; margin-bottom:5px; font-size:17px; text-align:center; font-weight: 100;" id="subtaskdeldes"></label>
                    <!-- <textarea name="description" id="subtaskDesc" rows="3" required style="width:100%; padding:10px; border:1px solid #ccc; border-radius:5px; margin-bottom:20px;"></textarea> -->

                    <div class="modal-actions" style="display:flex; justify-content:space-between;">
                        <button type="submit" class="btn-primary" style="background-color:brown; color:#fff; border:none; padding:10px 20px; border-radius:5px; cursor:pointer;">Delete</button>
                        <button type="button" class="btn-secondary" onclick="closedelsubtask()" style="background-color:#6c757d; color:#fff; border:none; padding:10px 20px; border-radius:5px; cursor:pointer;">Cancel</button>
                    </div>
                </form>
            </div>


            <!-- change start date model -->
            <div id="edit-startdate" class="modal" style="display:none; position:fixed; z-index:9999; left:0; top:0; width:100%; height:100%; overflow:auto; background-color:rgba(0,0,0,0.4);">
                <form method="post" action="editStartDate" class="modal-content" style="background-color:#fff; margin:10% auto; padding:20px; border-radius:10px; width:400px; max-width:90%; box-shadow:0 5px 15px rgba(0,0,0,0.3);">
                    
                    <h2 class="modal-title" style="margin-bottom:20px; font-size:24px; text-align:center;">Edit Start Date</h2>

                    <!-- Hidden Task ID -->
                    <input type="hidden" name="id" id="task_id_startdate"  >
                    Current date : <input type="hidden date" name="currentdate" id="currentdate" >
                    <br>Task end date :
                    <input type="hidden date" name="taskenddate" id="taskenddate" >
                    <br>Project Start date : 
                    <input type="hidden date" name="projectStartDate" id="projectStartDate" >
                    <br>Project end date : 
                    <input type="hidden date" name="projectEndDate" id="projectEndDate" >
                    <br>
                    
                    <!-- calender input -->
                     <input type="date" name="startdate" id="startdate"  required style="width:100%; padding:10px; margin-bottom:15px; border:1px solid #ccc; border-radius:5px; " >

                    
                    <div class="modal-actions" style="display:flex; justify-content:space-between;">
                        <button type="submit" class="btn-primary" style="background-color:#007bff; color:#fff; border:none; padding:10px 20px; border-radius:5px; cursor:pointer;">Edit</button>
                        <button type="button" class="btn-secondary" onclick="closetartdate()" style="background-color:#6c757d; color:#fff; border:none; padding:10px 20px; border-radius:5px; cursor:pointer;">Cancel</button>
                    </div>

                </form>
            </div>

            <!-- change end date model -->
                 <div id="edit-enddate" class="modal" style="display:none; position:fixed; z-index:9999; left:0; top:0; width:100%; height:100%; overflow:auto; background-color:rgba(0,0,0,0.4);">
                  <form method="post" action="editEndDate" class="modal-content" style="background-color:#fff; margin:10% auto; padding:20px; border-radius:10px; width:400px; max-width:90%; box-shadow:0 5px 15px rgba(0,0,0,0.3);">

                      <h2 class="modal-title" style="margin-bottom:20px; font-size:24px; text-align:center;">Edit End Date</h2>

                      <!-- Hidden Task ID -->
                      <input type="hidden" name="id" id="task_id_enddatei">

                      <!-- Hidden fields to submit extra data -->
                      <input type="hidden" name="currentdate" id="currentdate_hidden">
                      <input type="hidden" name="taskstartdate" id="taskstartdate_hidden">
                      <input type="hidden" name="projectStartDate" id="projectStartDate_hidden">
                      <input type="hidden" name="projectEndDate" id="projectEndDate_hidden">

                      <!-- Display fields (only visible to user) -->
                      <div style="margin-bottom:10px;">
                          Current End Date: <p id="currentdatei" style="display:inline; font-weight:bold;"></p>
                      </div>

                      <div style="margin-bottom:10px;">
                          Task Start Date: <p id="taskstartdatei" style="display:inline; font-weight:bold;"></p>
                      </div>

                      <div style="margin-bottom:10px;">
                          Project Start Date: <p id="projectStartDatei" style="display:inline; font-weight:bold;"></p>
                      </div>

                      <div style="margin-bottom:10px;">
                          Project End Date: <p id="projectEndDatei" style="display:inline; font-weight:bold;"></p>
                      </div>

                      <!-- Calendar input to select new End Date -->
                      <input type="date" name="enddate" id="enddate" required style="width:100%; padding:10px; margin-bottom:15px; border:1px solid #ccc; border-radius:5px;">

                      <div class="modal-actions" style="display:flex; justify-content:space-between;">
                          <button type="submit" class="btn-primary" style="background-color:#007bff; color:#fff; border:none; padding:10px 20px; border-radius:5px; cursor:pointer;">Edit</button>
                          <button type="button" class="btn-secondary" onclick="closeenddate()" style="background-color:#6c757d; color:#fff; border:none; padding:10px 20px; border-radius:5px; cursor:pointer;">Cancel</button>
                      </div>

                  </form>
              </div>



            <!-- assign members -->
            
            <div id="assignmembers" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%;
                  background: rgba(0,0,0,0.5); justify-content: center; align-items: center; z-index: 9999;">
                
                <div style="background: white; padding: 20px; border-radius: 10px; width: 300px; box-shadow: 0 0 10px rgba(0,0,0,0.3);">
                  <h3>Assign Member</h3>
                  
                  <form action="assignMembers" method="post">
                    <input type="hidden" id="task_id_assign" name="taskid">
                    
                    <!-- Single select dropdown -->
                    <select name="member" id="member" style="width: 100%; padding: 8px; margin-top: 10px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 5px;" required>
                      <option value="" disabled selected>Select a member</option>
                      <?php foreach($data['members'] as $member): ?>
                        <option value="<?= htmlspecialchars($member->id) ?>">
                          <?= htmlspecialchars($member->name) ?> (<?= htmlspecialchars($member->email) ?>)
                        </option>
                      <?php endforeach; ?>
                    </select>

                    <div style="text-align: right;">
                      <button type="button" onclick="closeassign()" style="padding: 6px 12px; background: #ccc; color: white; border: none; border-radius: 5px; margin-right: 10px;">Cancel</button>
                      <button type="submit" style="padding: 6px 12px; background: #007bff; color: white; border: none; border-radius: 5px;">Save</button>
                    </div>
                    
                  </form>
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


                function changestatus(taskId,currentStatus){
                  document.getElementById('edit-status').style.display = 'flex';
                  document.getElementById('task_id_status').value = taskId;
                  document.getElementById('status').value = currentStatus;
                }
                  
                

                function closestatus() {
                  document.getElementById('edit-status').style.display = 'none';
                }


                function changeflags(flagId,currentflag,taskId){
                  document.getElementById('edit-flags').style.display = 'flex';
                  document.getElementById('task_id_flags').value = flagId;
                  document.getElementById('flags').value = currentflag;
                  document.getElementById('taskIdflg').value = taskId;
                }
                  
                

                function closeflags() {
                  document.getElementById('edit-flags').style.display = 'none';
                }


                function addsubtask(taskId) {
                        document.getElementById('task_idsub').value = taskId;
                        document.getElementById('subtaskModal').style.display = 'block';
                    }

                function closesubtast() {
                    document.getElementById('subtaskModal').style.display = 'none';
                }
                function editsubtask(taskidsubeditId,taskId,subtaskTitle,subTaskDes) {
                        document.getElementById('subtaskid').value = taskId;
                        document.getElementById('subtaskTitle').value = subtaskTitle;
                        document.getElementById('subtaskDesc').value = subTaskDes;
                        document.getElementById('taskidsubedit').value = taskidsubeditId;
                        document.getElementById('editsubtask').style.display = 'block';
                    }

                function closeeditsubtask() {
                    document.getElementById('editsubtask').style.display = 'none';
                }

                function delsubtask(taskidsubdelId,taskdelId,subtaskdelTitle,subTaskDesdel) {
                        document.getElementById('subtaskiddel').value = taskdelId;
                        document.getElementById('subtaskdeltitle').textContent =  subtaskdelTitle;
                        document.getElementById('subtaskdeldes').textContent =  subTaskDesdel
                        document.getElementById('taskidsubeditdel').value = taskidsubdelId;
                        document.getElementById('deletesubtask').style.display = 'block';
                    }

                function closedelsubtask() {
                    document.getElementById('deletesubtask').style.display = 'none';
                }

                function changeStart(taskId,currentStartDate,taskenddate,projectStartDate,projectEndDate){ 
                    document.getElementById('task_id_startdate').value = taskId;
                    document.getElementById('edit-startdate').style.display = 'block';
                    document.getElementById('startdate').value = currentStartDate;
                    document.getElementById('currentdate').value = currentStartDate;
                    document.getElementById('projectStartDate').value = projectStartDate;
                    document.getElementById('taskenddate').value = taskenddate;
                    document.getElementById('projectEndDate').value = projectEndDate;

                }
                function closetartdate() {
                    document.getElementById('edit-startdate').style.display = 'none';
                }
                function changeEnd(taskId, taskstartdate, currentEndDate, projectStartDate, projectEndDate) { 
                      document.getElementById('task_id_enddatei').value = taskId;
                      document.getElementById('edit-enddate').style.display = 'block';

                      // Set visible values
                      document.getElementById('currentdatei').textContent = currentEndDate;
                      document.getElementById('taskstartdatei').textContent = taskstartdate;
                      document.getElementById('projectStartDatei').textContent = projectStartDate;
                      document.getElementById('projectEndDatei').textContent = projectEndDate;

                      // Set hidden input values for form submission
                      document.getElementById('currentdate_hidden').value = currentEndDate;
                      document.getElementById('taskstartdate_hidden').value = taskstartdate;
                      document.getElementById('projectStartDate_hidden').value = projectStartDate;
                      document.getElementById('projectEndDate_hidden').value = projectEndDate;

                      // Pre-fill calendar input
                      document.getElementById('enddate').value = currentEndDate;
                  }

                function closeenddate() {
                    document.getElementById('edit-enddate').style.display = 'none';
                }



                function AssignMembers(taskId){
                  document.getElementById('task_id_assign').value = taskId;
                  document.getElementById('assignmembers').style.display = 'flex';
                }

                function closeassign() {
                  document.getElementById('assignmembers').style.display = 'none';
                }
            </script>



                <!-- changing the header url of page -->
                <!-- <script>
                    // Get the PHP variable into JS
                    const fdtaskId = <= json_encode($selected->id) ?>;

                    // Update the URL with the task ID
                    window.history.pushState({}, '', `http://localhost/testmvc/public/task/edit/${fdtaskId}`);
                </script> -->



      
        <pre>
         <?php print_r($_SESSION)?>
       </pre>
</body>
</html>
