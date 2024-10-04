function PostForm(event){


    var valid = true;
 
   var elements = event.currentTarget;
 
   var title = elements[1].value;
   var des = elements[2].value;
 
   var msg_title = document.getElementById("msg_title");
   var msg_des = document.getElementById("msg_des");
   msg_title.innerHTML="";
   msg_des.innerHTML="";
 
   var textNode;
 
   if (title == null || title == "") {
     textNode = document.createTextNode("Title is empty. ");
     msg_title.appendChild(textNode);
     valid = false;
 } 
 
 
 if (des == null || des == ""){
 
   textNode = document.createTextNode("Description is empty. ");
   msg_des.appendChild(textNode);
   valid = false;
 }
 

 
 if (!valid){
  
   event.preventDefault();
 
 }
 
 }