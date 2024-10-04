function LoginForm(event){


   var valid = true;

  var elements = event.currentTarget;

  var email = elements[1].value;
  var pswd = elements[2].value;

  var regex_email = /^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/;
  var regex_pswd =  /^(?=.*[^a-zA-Z])[a-zA-Z\S]{6,}$/;
  
  var msg_email = document.getElementById("msg_email");
  var msg_pswd = document.getElementById("msg_pswd");
  msg_email.innerHTML="";
  msg_pswd.innerHTML="";

  var textNode;

  if (email == null || email == "") {
    textNode = document.createTextNode("Email address empty. ");
    msg_email.appendChild(textNode);
    valid = false;
} 
else if (regex_email.test(email) == false) {
  textNode = document.createTextNode("Email address wrong format. example: username@somewhere.sth");
  msg_email.appendChild(textNode);
  valid = false;
}

if (pswd == null || pswd == ""){

  textNode = document.createTextNode("Password is empty. ");
  msg_pswd.appendChild(textNode);
  valid = false;
}

else if (regex_pswd.test(pswd) == false){
 textNode = document.createTextNode("Password should contain at least a non-letter (6 characters or more). ");
 msg_pswd.appendChild(textNode);
 valid = false;
}
 

if (!valid){
 
  event.preventDefault();

}

}

