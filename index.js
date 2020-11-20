function show(viewName){
   var viewPath = "./views/" + viewName + ".php";
   $("#mainView").load(viewPath);
}