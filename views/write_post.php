<?php if(session_status() !== PHP_SESSION_ACTIVE) session_start();?>
  <h1> Write a post</h1>
  <p> writer: <?php echo $_SESSION["name"] ?></p>
  <form class="col s12" action="/controllers/post.php" method="post">
    <div class="row">
      <div class="input-field col s4">
        <textarea id="content_text" class="materialize-textarea" maxlength="255" data-length="255"></textarea>
        <label for="content_text">Enter your text</label>
      </div>
    </div>
    <button class="btn" type="submit">make post</button>
  </form>
  <script>
    $(document).ready(function() {
      $('input#input_text, textarea#content_text').characterCounter();
    });
  </script>
