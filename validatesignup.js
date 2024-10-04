function SignUpForm(event) {

    
    var valid = true;

   
    var elements = event.currentTarget;
    var email = elements[2].value; //Email
    var date = elements[3].value;//Date
    var passwd = elements[4].value; //Password
    var passwdr = elements[5].value; //Confirm Password
    var choose_file = elements[6].value;

    
    var regex_email = /^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/;
    var regex_pswd = /^(?=.*[^a-zA-Z])[a-zA-Z\S]{6,}$/;
    var regex_date = /([12]\d{3}-(0[1-9]|1[0-2])-(0[1-9]|[12]\d|3[01]))/;

    
    var msg_email = document.getElementById("msg_email");
    var msg_date = document.getElementById("msg_date");
    var msg_pswd = document.getElementById("msg_pswd");
    var msg_pswdr = document.getElementById("msg_pswdr");
    var msg_file = document.getElementById("msg_file");
    msg_email.innerHTML = "";
    msg_date.innerHTML = "";
    msg_pswd.innerHTML = "";
    msg_pswdr.innerHTML = "";
    msg_file.innerHTML = "";

    var textNode;
    

    
    if (date == null || date == "") {
        textNode = document.createTextNode("Date is empty.");
        msg_date.appendChild(textNode);
        valid = false;
    }
    else if (regex_date.test(date) == false) {
        textNode = document.createTextNode("Date wrong format. ");
        msg_date.appendChild(textNode);
        valid = false;
    }
   
    if (email == null || email == "") {
        textNode = document.createTextNode("Email address empty.");
        msg_email.appendChild(textNode);
        valid = false;
    }
    else if (regex_email.test(email) == false) {
        textNode = document.createTextNode("Email address wrong format. example: username@somewhere.sth");
        msg_email.appendChild(textNode);
        valid = false;
    }
 
    if (passwd == null || passwd == "") {
        textNode = document.createTextNode("Password is empty. ");
        msg_pswd.appendChild(textNode);
        valid = false;
    }

    else if (regex_pswd.test(passwd) == false) {

        textNode = document.createTextNode("Password should contain at least a non-letter (6 characters or more). ");
        msg_pswd.appendChild(textNode);
        valid = false;
    }

    
    if (passwdr == null || passwdr == "") {
        textNode = document.createTextNode("Confirm password is empty. ");
        msg_pswdr.appendChild(textNode);
        valid = false;
    }

    else if (passwdr !== passwd) {
        textNode = document.createTextNode("Confirm Password and Password are not matching. ");
        msg_pswdr.appendChild(textNode);
        valid = false;
    }

    if (choose_file == null || choose_file == "") {
        textNode = document.createTextNode("Please choose a file to upload. ");
        msg_file.appendChild(textNode);
        valid = false;
    }

 
    if (!valid){
 
        event.preventDefault();
      
      }
    
    
}



