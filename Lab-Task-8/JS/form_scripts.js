//NAME
function validateName()
{
  var name = document.getElementById("name").value; 
  var text;
  var error_message = document.getElementById("error_message");

  if(name.length < 1)
  {
    text = "Please Enter Name";
    error_message.innerHTML = text;
    error_message.style.background = "red";
    document.getElementById("name").style.borderColor = "red";
    return false;
  }
  else
  {
    text = "(1) Please Enter Your Full Name";
    error_message.innerHTML = text;
    error_message.style.background = "plum";
    document.getElementById("name").style.borderColor = "plum";
    return true;
  }
}

//EMAIL
function validateEmail()
{
  var email = document.getElementById("email").value;
  var text;
  var error_message = document.getElementById("error_message");

  if(email.length < 1)
  {
    text = "Please Enter Email";
    error_message.innerHTML = text;
    error_message.style.background = "red";
    document.getElementById("email").style.borderColor = "red";
    return false;
  }
  else
  {
    text = "(1) Must be a valid email_address :anything@example.com";
    error_message.innerHTML = text;
    error_message.style.background = "plum";
    document.getElementById("email").style.borderColor = "plum";
    return true;
  }
}

//USER NAME
function validateUname()
{
  var uname = document.getElementById("uname").value;
  var text;
  var error_message = document.getElementById("error_message");

  if(uname.length < 1)
  {
    text = "Please Enter User Name";
    error_message.innerHTML = text;
    error_message.style.background = "red";
    document.getElementById("uname").style.borderColor = "red";
    return false;
  }
  else
  {
    text = "(1) User Name can contain alpha numeric characters, period, dash or underscore only. (2) User Name must contain at least two (2) characters. (3) Also make sure it's a unique User Name";
    error_message.innerHTML = text;
    error_message.style.background = "plum";
    document.getElementById("uname").style.borderColor = "plum";
    return true;
  }
}

//PASSWORD
function validatePass()
{
  var pass = document.getElementById("pass").value;
  var text;
  var error_message = document.getElementById("error_message");

  if(pass.length < 1)
  {
    text = "Please Enter Password";
    error_message.innerHTML = text;
    error_message.style.background = "red";
    document.getElementById("pass").style.borderColor = "red";
    return false;
  }
  else
  {
    text = "(1) Password must not be less than eight (8) characters. (2) Password must contain at least one of the special characters (@, #, $, %)";
    error_message.innerHTML = text;
    error_message.style.background = "plum";
    document.getElementById("pass").style.borderColor = "plum";
    return true;
  }
}

//CONFIRM PASSWORD
function validateCpass()
{
  var cpass = document.getElementById("cpass").value;
  var text;
  var error_message = document.getElementById("error_message");

  if(cpass.length < 1)
  {
    text = "Please Retype Your Password";
    error_message.innerHTML = text;
    error_message.style.background = "red";
    document.getElementById("cpass").style.borderColor = "red";
    return false;
  }
  else
  {
    text = "(1) This Password Should Match With The Previously Typed Password";
    error_message.innerHTML = text;
    error_message.style.background = "plum";
    document.getElementById("cpass").style.borderColor = "plum";
    return true;
  }
}

//PROFILE PICTURE
function validateImage()
{
  var image = document.getElementById("image").value;
  var text;
  var error_message = document.getElementById("error_message");

  if(image.length < 1)
  {
    text = "Please Insert Image";
    error_message.innerHTML = text;
    error_message.style.background = "red";
    document.getElementById("image").style.borderColor = "red";
    return false;
  }
  else
  {
    text = "Make Sure It's A Clear Picture Of Yours";
    error_message.innerHTML = text;
    error_message.style.background = "plum";
    document.getElementById("image").style.borderColor = "plum";
    return true;
  }
}

//DATE OF BIRTH
function validateDob()
{
  var dob = document.getElementById("dob").value;
  var text;
  var error_message = document.getElementById("error_message");

  if(dob.length < 1)
  {
    text = "Please Enter Date Of Birth";
    error_message.innerHTML = text;
    error_message.style.background = "red";
    document.getElementById("dob").style.borderColor = "red";
    return false;
  }
  else
  {
    text = "(1) Must be valid numbers (dd: 1-31, mm: 1-12, yyyy: 1953-1998)";
    error_message.innerHTML = text;
    error_message.style.background = "plum";
    document.getElementById("dob").style.borderColor = "plum";
    return true;
  }
}