<?php
if(isset($_POST["code"]))
{
	$file=fopen("/tmp/".microtime(),"w");
	fwrite($file,$_POST["code"]);
	fclose($file);
	exec("make /tmp/".microtime()); //编译
	passthru("./tmp/".microtime()); //执行
}
?>