<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta content="IE=edge" http-equiv="X-UA-Compatible">
	<meta content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no, width=device-width" name="viewport">
	<title><?php echo $argv[2]; ?> - blue's blog</title>
	<!-- css -->
	<link href="/css/base.min.css" rel="stylesheet">
	<link href="/css/project.min.css" rel="stylesheet">
	<link href="/css/styles.css" rel="stylesheet">


	<script type="text/x-mathjax-config">
  		MathJax.Hub.Config({tex2jax: {inlineMath: [['$','$'], ['\\(','\\)']]}});
	</script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.4/MathJax.js?config=TeX-AMS-MML_HTMLorMML"></script>

</head>
<body class="page-brand">
	
	<?php require_once("nav.php"); ?>

	<header class="header header-transparent header-waterfall ui-header">
		<ul class="nav nav-list pull-left hidden-md hidden-lg">
			<li>
				<a data-toggle="menu" href="#ui_menu">
					<span class="icon icon-lg">menu</span>
				</a>
			</li>
		</ul>
		<span class="header-logo header-affix visible-md-block visible-lg-block margin-right-no" data-offset-top="0" data-spy="affix">
			<p class="pagetitle"><?php echo $argv[2];?></p>
		</span>
		
		<ul class="nav nav-list pull-right">
			<li>
				<a data-toggle="menu" href="/ruanx/index.html">
					<span class="avatar avatar-sm"><img alt="blue" src="https://i.loli.net/2017/10/21/59eb6654682d2.png"></span>
				</a>
			</li>
		</ul>
	</header>
	<main class="content">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-lg-offset-3 col-md-10 col-md-offset-1">
					<section class="content-inner margin-top-no">
						<br>
						
<?php 

	system("python3 gen.py $argv[1]");
	$argv[1] = str_replace(".md","",$argv[1]);
	

?>
						
					</section>
				</div>
			</div>

			<div class="row">
				<div class="col-lg-6 col-lg-offset-3 col-md-10 col-md-offset-1">
					<section class="content-inner margin-top-no">
						<hr>
						
							CC0协议 @ ruanxingzhi 2017.
						<a style="float:right" href="/ruanx/CC0.html">CC0是啥玩意?</a>
					</section>
				</div>
			</div>


		</div>


	</main>
	
	<div class="fbtn-container">
		<div class="fbtn-inner">
			<a class="fbtn fbtn-lg fbtn-brand-accent waves-attach waves-circle waves-light" data-toggle="dropdown">
				<span class="fbtn-text fbtn-text-left">Home</span>
				<span class="fbtn-ori icon">apps</span>
				<span class="fbtn-sub icon">close</span>
			</a>
			<div class="fbtn-dropup">
				<a class="fbtn waves-attach waves-circle" href="/ruanx/about.html" target="_blank">
					<span class="fbtn-text fbtn-text-left">关于作者</span><span class="icon">perm_identity</span>
				</a>
				<a class="fbtn waves-attach waves-circle" href="https://coding.net/u/ruanxingzhi/p/blog/topic" target="_blank">
					<span class="fbtn-text fbtn-text-left">反馈</span><span class="icon">feedback</span>
				</a>
				<a class="fbtn fbtn-green waves-attach waves-circle" href="/ruanx/index.html" target="_self">
					<span class="fbtn-text fbtn-text-left">返回主页</span><span class="icon">home</span>
				</a>
			</div>
		</div>
	</div>

	

	<!-- js -->
	<script src="/js/jquery.min.js"></script>
	<script src="/js/base.min.js"></script>
</body>
</html>
