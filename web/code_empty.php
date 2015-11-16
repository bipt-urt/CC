<!DOCTYPE html>
<html lang="zh-cn">
	<head>
        <meta charset="utf-8">
  		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="renderer" content="webkit">
  		<link rel="stylesheet" href="http://apps.bdimg.com/libs/bootstrap/3.3.0/css/bootstrap.min.css">  
  		<script src="http://apps.bdimg.com/libs/jquery/2.1.1/jquery.min.js"></script>
 		<script src="http://apps.bdimg.com/libs/bootstrap/3.3.0/js/bootstrap.min.js"></script>
		<title>云编译系统</title>
		<style>.dengkuan{font-family: consolas,ubuntu mono,menlo regular;}</style>
        <link href="http://121.42.141.42/urt/css/css.css" type="text/css" rel="stylesheet"></link>
        <link href="http://121.42.141.42/urt/css/bottom.css" type="text/css" rel="stylesheet"></link>
	</head>
	<body>

  
	<style>

	body{padding-top:50px;}</style>
	<form method="post" >
	<nav  class="navbar navbar-default navbar-fixed-top">
     <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="http://121.42.141.42/urt">OBS</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li> <button id="butt" type="submit" class="">执行代码</button></li>
		<li><a href="http://121.42.141.42/urt/code_empty.php">清空代码</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">更多 <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">说明文档</a></li>
            <li><a href="#">常见问题</a></li>
            <li><a href="#">使用终端编辑？
            </a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">OBS项目介绍</a></li>
          </ul>
        </li>
      </ul>
  
    </div><!-- /.navbar-collapse -->
   </div><!-- /.container-fluid -->
  </nav>
              
				
		
			
			<div class="bs-docs-header" id="content" tabindex="-1" >
			<div class="container">
       		 		<h1>云编译系统</h1>
					<p>Online Building System</p>	
				</div>
    		</div>
    	<div class="container-fluid">
            <div id="n2">
            </div>
				<div id="button">
                     <button type="submit" class="button button-glow button-border button-rounded button-primary">执行代码</button>

				</div>
            <!--<div class="n2" style="background-color:#999">
            </div>-->  
			<div class="row">
				<?php if(isset($_POST["test_1"])&&$_POST["test_1"]!=""): ?>
   	 			<div id="result" class="col-sm-12 col-xs-12 col-md-3 col-md-push-9">
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
							passthru("ulimit -t 10 && /tmp/".$test_name);  //最大执行时间
							}
							?><?php if(isset($_POST["test_1"])&&$_POST["test_1"]!=""): ?></pre><?php endif; ?>
						
				</div>
				<?php if(isset($_POST["test_1"])&&$_POST["test_1"]!=""): ?>
                <div id="codeArea" class="col-sm-12 col-md-9 col-md-pull-3 col-xs-12">
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
						?><?php endif; ?></textarea>

  	  			</div>    
            </div>   
		<div id="footer">
			<p>请在上面的文本框中编辑您的代码，然后单击提交按钮测试结果。</p>
			<p>Powered by Sourse Code</p>
		</div>
	</div>
	</form>
	</body>
</html>
