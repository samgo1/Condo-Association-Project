<?php 

//Shows a single mail item in the 
function showMailItem($senderName, $senderID, $dateSent, $content, $mailID){

    echo "<div class=\"inboxItem\" onclick=\"showMessageItem('$senderName', '$senderID', '$dateSent', '$content')\">
    <div name=\"sender\" class=\"sender\">$senderName $senderID</div>
    <div name=\"subject\" class=\"subject\">$dateSent</div></div>";
}

?>