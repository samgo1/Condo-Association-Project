<div class="mail">
    <div class="inboxContainer">
        <?php
            include '../controllers/getMailItem.php';
            showMailItem('Radley Carpio', '123', '2020/12/08', '','');
            showMailItem('Radley Carpio', '123', '2020/12/09', 'a;lkdsfjl;asdkfjlsjfalsdkfj','');
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


<?php 
?>