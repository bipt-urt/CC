p
<!DOCTYPE html>
<html lang="zh-cn">
	<head>
        <meta charset="utf-8">
  		<meta name="viewport" content="width=device-width, initial-scale=1">
  		<link rel="stylesheet" href="http://apps.bdimg.com/libs/bootstrap/3.3.0/css/bootstrap.min.css">  
  		<script src="http://apps.bdimg.com/libs/jquery/2.1.1/jquery.min.js"></script>
 		<script src="http://apps.bdimg.com/libs/bootstrap/3.3.0/js/bootstrap.min.js"></script>
		<title>在线编译系统</title>
		<style>.dengkuan{font-family: consolas,ubuntu mono,menlo regular;}</style>
        <link href="http://121.42.141.42/urt/css/css.css" type="text/css" rel="stylesheet"></link>
	</head>
	<body>
		<form method="post" >
			<div class="bs-docs-header" id="content" tabindex="-1" >
			<div class="container">
       		 		<h1>在线编译系统</h1>
        			<p>Powered by Zero To One</p>
					</div>
    		</div>
    	<div class="container-fluid">
            <div class="n" style="background-color:#999">
            </div>
            <div id="n2">
            </div>
				<div id="button">
					 <button type="submit" class="btn btn-primary">执行代码</button>
				</div>
            <!--<div class="n2" style="background-color:#999">
            </div>-->  
			<div class="row">
				<?php if(isset($_POST["test_1"])): ?>
   	 			<div id="result" class="col-sm-12 col-xs-12 col-md-3">
				<h2>查看结果:</h2>
            			<pre rows="20" ><?php endif; ?><?php
							if(isset($_POST["test_1"]))
							{
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
							$test_name=$randCharObj->getRandChar(10);
							$handle = fopen("/tmp/".$test_name.".cpp","w+");
							$content = $_POST["test_1"];
							fwrite($handle,$content);
							fclose($handle);
							chmod("/tmp/".$test_name.".cpp",0777);
							exec("make /tmp/".$test_name);
							chmod("/tmp/".$test_name,0777);
							passthru("/tmp/".$test_name);
							}
							?><?php if(isset($_POST["test_1"])&&$_POST["test_1"]!=""): ?></pre><?php endif; ?>
						
				</div>
				<?php if(isset($_POST["test_1"])&&$_POST["test_1"]!=""): ?>
                <div id="codeArea" class="col-sm-12 col-md-9 col-xs-12">
				<?php else: ?>
                <div id="codeArea" class="col-sm-12 col-md-12 col-xs-12">
				<?php endif; ?>
                <h2>编辑您的代码：</h2>
						<textarea class="form-control dengkuan" rows="20" name="test_1"><?php
						if(isset($_POST["test_1"]))
						{
							print($_POST["test_1"]);
						}
						if(!isset($_POST["test_1"])):
						?>
//请输入您的代码 !0.0!
l

//示例如下：
#include<stdio.h>
int main()
{
	printf("Hello World\n");
	return 0;
}<?php endif; ?></textarea>

  	  			</div>    
            </div>   
		<div id="footer">
			<p>请在上面的文本框中编辑您的代码，然后单击提交按钮测试结果。</p>
		</div>
	</div>
	</form>
	</body>
</html>
