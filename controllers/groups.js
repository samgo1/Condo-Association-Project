function showGroups(){
    $("#groupsContainer").load("./components/groups/groups.php");
    $("#groupsButtons").load("./components/groups/create.php");
}

function showGroupForm(){
    $("#groupsContainer").load("./components/groups/form.php");
    $("#groupsButtons").load("./components/groups/cancel.php");
    console.log("FUCK ME");
}
