function val1() {
  let firstname = document.getElementById('fname').value;
  if (firstname == '') {
    document.getElementById('error1').innerHTML="This Field is required";
      document.getElementById('fname').style.border = "2px solid red";
  } 
  else if(firstname.length<4)
  {
    document.getElementById('error1').innerHTML="Firstname should be greater than 3";
    document.getElementById('fname').style.border = "2px solid red";
  }
  else
      document.getElementById('fname').style.border = "3px solid green";
}

//For lastname
function val2() {
  let lastname = document.getElementById('lastname').value;
  if (lastname == '') {
    
    document.getElementById('error2').innerHTML="This Field is required";
      document.getElementById('lastname').style.border = "2px solid red";
  }
  else if(lastname.length<4)
  {
    document.getElementById('error2').innerHTML="Lastname should be greater than 3";
    document.getElementById('lastname').style.border = "2px solid red";
  }
  else
      document.getElementById('lastname').style.border = "3px solid green";

}
//For email
function val3() {
  let email = document.getElementById('email').value;
  // let ss=email.substring(email.indexOf("@")+1);
  if (email == '') {
    
    document.getElementById('error3').innerHTML="This Field is required";
      document.getElementById('email').style.border = "2px solid red";
  }
  else if(!email.includes("@"))
  {
    document.getElementById('error3').innerHTML="Please Enter valid email";
    document.getElementById('email').style.border="2px solid red";
  }
   else
      document.getElementById('email').style.border = "3px solid green";
}


//for phonenumber
function val4() {
  let number = document.getElementById('phonenumber').value;
  if (number == '') {
    document.getElementById('error4').innerHTML="This Field is required";
      document.getElementById('phonenumber').style.border = "2px solid red";
  } else if (number.length < 9 && number > 10) {
    document.getElementById('error4').innerHTML="Phone number should be 10 digit";
      document.getElementById('phonenumber').style.border = "2px solid red";
  } else
      document.getElementById('phonenumber').style.border = "3px solid green";

}

function validateform() {

  let state1 = val1();
  let state3 = val2();
  let state4 = val3();
  let state5 = val4();
  if (state1 && state3 && state4 && state5)
      return true;
  else
      return false;
}