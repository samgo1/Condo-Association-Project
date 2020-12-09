<div class="mail">
    <div class="inboxContainer">
        <?php
            include '../controllers/getmails.php';
        ?>
    </div>
    <div class="messageContainer">
        <div class="bar">
            <button class="btn" onclick="messageShow('newMail')">New mail</button>
        </div>
        <div id="messageArea" class="messageArea">
        </div>
    </div>
</div>
<script src="controllers\mail.js"></script>