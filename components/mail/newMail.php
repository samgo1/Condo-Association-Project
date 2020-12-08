<?php 
   function mailer(){

    print("FUCK YOU ");
   }
?>

<div class="newMail">
    <form type="submit" action="mailer()" method="post">
       <label for="receiver_id">To</label>
        <textarea id="receiver_id" class="materialize-textarea" data-length="120"></textarea>
              <label for="message_content">Message</label>
       <textarea id="message_content" class="myTextarea" data-length="400"></textarea>
        </div>
        <div>
            <br>
          
            <button type="submit" class="btn">Send</button>
        </div>
    </form>
</div>

