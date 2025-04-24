<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <?php
  include('link.php');
  include("conn.php");
  ?>
</head>

<body>
  <div class="container">
    <?php
    if (isset($_POST['submit'])) {

    }
    ?>
    <p class="h3 text-success text-center">User Registration Form</p>
    <form action="" method="POST" onsubmit="return validateInput()">

      <div class="form-group">
        <label for="exampleInputEmail1">Name</label>
        <input type="text" class="form-control" id="name" placeholder="Enter Name" name="name"
          onfocus="hideError(this)">
      </div>

      <div class="form-group">
        <label for="exampleInputEmail1">Email address</label>
        <input type="email" class="form-control" id="email" placeholder="Enter email" name="email"
          onfocus="hideError(this)">
      </div>

      <div class="form-group">
        <label for="exampleInputEmail1">Mobile</label>
        <input type="text" class="form-control" id="phone" placeholder="Enter email" name="phone"
          onfocus="hideError(this)">
      </div>

      <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" class="form-control" id="pwd" autocomplete="on" placeholder="Password"
          onfocus="hideError(this)">
      </div>

      <div class="form-group">
        <label for="exampleInputPassword1">Confirm Password</label>
        <input type="password" class="form-control" id="cpwd" autocomplete="on" placeholder="Confirm Password"
          name="cpwd" onfocus="hideError(this)">
      </div>

      <div class="mt-2">
        <label for="exampleInputPassword1">Gender</label>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="">
          <label class="form-check-label" for="flexCheckDefault">Male
            <i class="mdi mdi-alert-circle-check-outline:"></i>
          </label>
        </div>

        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="" checked>
          <label class="form-check-label" for="flexCheckChecked">
            Female
          </label>
        </div>
      </div>

      <input type="submit" class="btn btn-success" name="submit" value="submit" />
    </form>
  </div>
  <script>
    function validateInput() {
      var name = document.getElementById('name');
      if (name.value.trim() === "") {
        name.style.cssText = "border:2px solid red";
        return false;
      }
      var email = document.getElementById('email');
      if (email.value.trim() === "") {
        email.style.cssText = "border:2px solid red";
        return false;
      }
      var phone = document.getElementById('phone');
      if (phone.value.trim() === "") {
        phone.style.cssText = "border:2px solid red";
        return false;
      }

      var pwd = document.getElementById('pwd');
      if (pwd.value.trim() === "") {
        pwd.style.cssText = "border:2px solid red";
        return false;
      }
      var cpwd = document.getElementById('cpwd');
      if (cpwd.value.trim() === "") {
        cpwd.style.cssText = "border:2px solid red";
        return false;
      }
      if (pwd.value !== cpwd.value) {
        pwd.style.cssText = "border:2px solid red";
        alert("password not match");
        return false;
      }
    }


    function hideError(e) {
      if (e.value.trim() !== "") {
        e.style.cssText = "border:2px solid green";
        return false;
      }
    }
  </script>
</body>

</html>