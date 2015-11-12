 <?php
 $name = "c";
 /*$handle = fopen($name.".c","w+");
 $content = fread($handle);
 //fwrite($handle,$content);
 fclose($handle);
 */passthru ("make ".$name);
 passthru("./".$name);
?>