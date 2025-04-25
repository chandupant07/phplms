<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <?php
  include('link.php');

  ?>
</head>

<body>
  <div class="container">
    <?php
    if (isset($_POST['submit'])) {
      function validateUser($data)
      {
        return addslashes(strip_tags(trim($data)));
      }
      $name = (isset($_POST['name'])) ? validateUser($_POST['name']) : '';
      $email = (isset($_POST['email'])) ? validateUser($_POST['email']) : '';
      $phone = (isset($_POST['phone'])) ? validateUser($_POST['phone']) : '';
      $pwd = (isset($_POST['pwd'])) ? validateUser($_POST['pwd']) : '';
      $newPass = password_hash($pwd, PASSWORD_DEFAULT);
      $gender = (isset($_POST['gender'])) ? validateUser($_POST['gender']) : '';

      $ip = $_SERVER['REMOTE_ADDR'];
      $token = md5(str_shuffle($name . $phone . time()));
      $status = 'inactivate';

      include("conn.php");

      mysqli_query($conn, "INSERT INTO reg(name,email,phone,password,gender,ip,token,status)
       values('$name','$email','$phone','$newPass','$gender','$ip','$token','$status')");
      if (mysqli_affected_rows($conn) === 1) {
        $msg = "Hi " . $name . "Thanks creating your account with us please click the below link activate your account
         <a href='http://localhost/lms/activate.php'>Activate Account</a>";
      } else {
        echo "Sorry! unable to create your account";
        echo mysqli_error($conn);
      }
    }
    ?>
    <p class="h3 text-success text-center">User Registration Form</p>
    <form action="" method="POST" onsubmit="return validateInput()">

      <div class="form-group">
        <label for="exampleInputEmail1">Name</label>
        <input type="text" class="form-control" id="name" placeholder="Enter Name" name="name" onfocus="hideError(this)"
          onblur="checkError(this)">
      </div>

      <div class="form-group">
        <label for="exampleInputEmail1">Email address</label>
        <input type="text" class="form-control" id="email" placeholder="Enter email" name="email"
          onfocus="hideError(this)" onblur="checkError(this)">
      </div>

      <div class="form-group">
        <label for="exampleInputEmail1">Mobile</label>
        <input type="text" class="form-control" id="phone" placeholder="Enter email" name="phone"
          onfocus="hideError(this)" onblur="checkError(this)">
      </div>

      <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" class="form-control" id="pwd" name="pwd" autocomplete="on" placeholder="Password"
          onfocus="hideError(this)" onblur="checkError(this)">
      </div>

      <div class="form-group">
        <label for="exampleInputPassword1">Confirm Password</label>
        <input type="password" class="form-control" id="cpwd" autocomplete="on" placeholder="Confirm Password"
          name="cpwd" onfocus="hideError(this)" onblur="checkError(this)">
      </div>

      <div class="mt-2">
        <label for="exampleInputPassword1">Gender</label>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="male" name="gender" checked>
          <label class="form-check-label" for="flexCheckDefault">Male</label>
        </div>

        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="female" name="gender">
          <label class="form-check-label" for="flexCheckChecked">Female</label>
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
      } else
        if (!emailValidation(email.value)) {
          email.style.cssText = "border:2px solid red";
          alert('please enter valid email');
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

      if (!(document.getElementsByName('gender')[0].checked == true || document.getElementsByName('gender')[1].checked == true)) {
        alert('Please select Gender');
        return false;
      }
    }

    function emailValidation(email) {
      const str = /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
      return str.test(String(email).toLowerCase());
    }
    function hideError(e) {
      if (e.value.trim() === "") {
        e.style.cssText = "border:2px solid green";
        return false;
      }
    }

    function checkError(e) {
      if (e.value.trim() !== "") {
        e.style.cssText = "border:2px solid green";
      } else {
        e.style.cssText = "border:2px solid red";
      }
    }
  </script>
</body>

</html>