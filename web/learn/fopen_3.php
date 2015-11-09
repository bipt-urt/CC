<?php

 class RandChar{

   function getRandChar($length){
   $str = null;
   $strPol = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz";
   $max = strlen($strPol)-1;
   for($i=0;$i<$length;$i++){
   $str.=$strPol[rand(0,$max)];
   }
    return $str;
  }
 }
 $randCharObj = new RandChar();
$name=$randCharObj->getRandChar(10);
 $handle = fopen($name.".c","w+");
 $content = fread($handle);
 fclose($handle);
 passthru ("make ".$name.".c");
 fpassthru("./".$name);
?>