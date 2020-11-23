<form action="\Condo-Association-Project\login\includes\signup.inc.php" style="border:1px solid #ccc" method="post" >
  <div class="container">
    <h1>Sign Up</h1>
    <p>register a new CON member: </p>
    <hr>

    <label for="name"><b>Name</b></label>
    <input type="text" placeholder="Enter name" name="name" required>
    <br>
   <input type="radio" id="active" name="status" value="active">
   <label for="active">active</label><br>

   <input type="radio" id="inactive" name="status" value="inactive">
   <label for="inactive">inactive</label><br>

    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" required><br>

    <label for="login_username"><b>login_username</b></label>
    <input type="text" placeholder="Enter Password" name="uid" required><br>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required><br>
   
   <label for="address"><b>Address</b></label>
    <input type="address" placeholder="Enter the address" name="address" required><br>

 <input type="radio" id="admin" name="privilege" value="admin">
   <label for="active">admin</label><br>

   <input type="radio" id="regular" name="privilege" value="regular">
   <label for="regular">regular</label><br>
INSERT INTO    member(login_username,name,status,civic_address,email,privilege,login_password)
                VALUES('khalil_u','khalil','active','hochelaga','gmail.com','regular','123');
  </div>
</form>