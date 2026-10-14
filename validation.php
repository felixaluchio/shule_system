<?php
 function validateName($name) {
   if(strlen(trim ($name))< 3 ||preg_match("/[0-9]/", $name)){
   return "error: name should have at least three characters and name should not contain numbers ";
   }
    return "";
 }

 function validateEmail($email){
   if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
   return "Error: enter a valid email";
   }
   return "";
 }

 function validateCourse($course){
   if(strlen($course) < 3 || preg_match("/[^A-Za-z .]/", $course)){
   return "Error: course should have at least three characters and contain only letters, spaces, and periods";
   }
   return "";
 }