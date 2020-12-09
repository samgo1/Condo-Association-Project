function messageShow(componentName){

    var messageArea = document.getElementById('messageArea');

    messageArea.innerHTML = "";

    var componentPath= "./components/mail/" + componentName + ".php";
    $("#messageArea").load(componentPath);
}

function showMessageItem(senderName, senderID, dateSent, content){

    var messageArea = document.getElementById('messageArea');

    messageArea.innerHTML = "<div class=\"message\">" +
    "<div class=\"content\">" +
       "<div class=\"sender\">" +
            "From:" +
            "<span name=\"sender\">" + senderName + " " + senderID + "</span>" +
        "</div>" +
        "<div name=\"subject\" class=\"subject\">" + dateSent + "</div>" +
    "</div>" +
    "<div name=\"content\" class=\"content section\">" + content + 
    "</div></div>";
}