<?php
 function validateName($name) {
   if(strlen(trim ($name))< 3){
   return "error: name should have at least three characters ";
   }
   if(preg_match("/[0-9]/", $name)){
   return "Error: name should not contain numbers";
   }
  
    return "";
   
 }