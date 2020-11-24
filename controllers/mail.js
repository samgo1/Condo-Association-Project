function messageShow(componentName){
    var componentPath= "./components/mail/" + componentName + ".php";
    $("#messageArea").load(componentPath);
}