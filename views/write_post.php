  <div class="row">
    <div class="col push-l2">
      <h1> Write a post</h1>
      <p> writer: <?php session_start(); echo $_SESSION['name']; ?></p>
    </div>
  </div>

  <form id="write_post_form" action="\Condo-Association-Project\controllers\post.php" method="post" enctype="multipart/form-data" >
    <div class="row">
      <div class="input-field col s4 push-l2">
        <textarea id="content_text" class="materialize-textarea" name="content_text" maxlength="255" data-length="255"></textarea>
        <label for="content_text">Enter your text</label>
      </div>
    </div>
    <div class="row">
      <div class="input-field col s4 push-l2">
        <select name="permission">
          <option value="view only" default>view only</option>
          <option value="view and comment">view and comment</option>
          <option value="view, comment and link">view, comment and link</option>
        </select>
        <label>post permission</label>
      </div>
    </div>
    <div class="row">
      <div class="col s4 push-l2">
        <label>post visibility</label>
        <select id="visibility_list" name="visibility[]" multiple="multiple">
          <?php
            $sql = "SELECT id, name FROM member WHERE id IN (
                      SELECT member_id FROM group_membership WHERE group_id IN (
                        SELECT group_id from group_membership WHERE member_id = '{$_SESSION['id']}'))
                    group by id;";

            include_once "../var.php";

            $conn = mysqli_connect($servername,$username,$password,$dbname);

            if (mysqli_connect_errno()) {
              echo "Failed to connect to MySQL: " . mysqli_connect_error();
              exit();
            }

            $result = $conn->query($sql);

            while ($row = $result->fetch_assoc()){
              //skipping self in making the options
              if ($row['id'] == $_SESSION['id']){
                continue;
              }
              echo "<option value=\"" . $row['id'] . "\">" . $row['name'] . "</option>";
            }
          ?>
        </select>
      </div>
    </div>
    <div class="row">
      <div class="col push-l2">
        <label for="file_to_upload">Upload an image</label>
      </div>
    </div>
    <input type="hidden" id="date_time" name="date_time" value="<?php echo date('Y-m-d H:i:s')?>" />
    <input type="hidden" name="author_id" value="<?php echo $_SESSION['id']?>"/>
    <div class="row">
      <div class="col push-l2">
        <input type="file" id="file_to_upload" name="file_to_upload">
      </div>
      <div class="col push-l2">
        <button class="btn" type="submit">make post</button>
      </div>
    </div>
    <div class="row">
      <div class="col push-l2">
        <div id="error_on_submit"></div>
      </div>
    </div>
  </form>

  <script>
    $(document).ready(function() {
      $('input#input_text, textarea#content_text').characterCounter();
    });
    $(document).ready(function(){
      $('select').formSelect();
    });
    function validate() {
      print("hello");

    }
  </script>
