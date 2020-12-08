<?php 

//Shows a single mail item in the 
function showMailItem($senderName, $senderID, $dateSent, $content){

    echo "<div class=\"inboxItem\" onclick=\"messageShow('message')\">
    <div name=\"sender\" class=\"sender\">$senderName $senderID</div>
    <div name=\"subject\" class=\"subject\">$dateSent</div></div>";
}

?>