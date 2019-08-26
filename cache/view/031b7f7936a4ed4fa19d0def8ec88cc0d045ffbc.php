<!DOCTYPE html>
<html>
<head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
	<link rel="stylesheet" href="/Job-Site/assets/css/main.css" />
<!-- 합쳐지고 최소화된 최신 CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css//bootstrap.min.css">

<!-- 부가적인 테마 -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">

<!-- 합쳐지고 최소화된 최신 자바스크립트 -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>


</head>
<link rel="shortcut icon" href="/Job-Site/assets/image/favicon.ico">
<link rel="icon" href="/Job-Site/assets/image/favicon.ico">
<body>

<!-- 네비게이션 -->
	<nav id="nav">
          <ul class="container">
	 <div class="logo">
	  <a href="/Job-Site/home" target="_blank"><img src="/Job-Site/assets/image/Ming_logo_blue.png" class="logo" alt="logo" border="3px" width="200px" height="75px" align="left"></a>
 	 </div>
           <li><a class="link" href="#top">Top</a></li>
           <li><a class="link" href="#work">Work</a></li>
           <li><a class="link" href="#portfolio">Portfolio</a></li>
           <li><a class="link" href="#contact">Contact</a></li>
          </ul>
        </nav>

<?php echo $__env->yieldContent('Content'); ?>
<?php echo $__env->yieldContent('SignUp'); ?>
	
</body>
</html>
<?php /**PATH /var/www/html/Job-Site/view/layout/layout.blade.php ENDPATH**/ ?>