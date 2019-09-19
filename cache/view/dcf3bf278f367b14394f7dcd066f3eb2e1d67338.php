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
<script src="http://code.jquery.com/jquery-latest.min.js"></script>

</head>
<link rel="shortcut icon" href="/Job-Site/assets/image/favicon.ico">
<link rel="icon" href="/Job-Site/assets/image/favicon.ico">
<body style="padding-top:30px;">

<div class="container">
    <div class="row" style="padding-bottom:30px;">
        <div class="col-sm-12" style="margin-bottom:50px;">
	    <div>
		<div class="logo">
                    <a href="/Job-Site/home"><img src="/Job-Site/assets/image/menuLogo.png" width="260" height="80"/></a>
		</div>
                <div class="search">
                    <form action="allList" method='GET' onsubmit="return searchKey();">
                        <input value='<?php echo e($keyword); ?>'  type="search" class="searchForm" name="inputKeyword" id="inputKeyword"/>
                        <input type="submit" class="btnA blue" value="검색"/>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="GNB">
    <nav class="container">
        <ul class="ulA">
	    <li ><a href="/Job-Site/allList">채용공고</a></li>
	</ul>
	<button type="button" id="toggle" class="toggle" >OFF</button>
    	<ul class="ulB"  style="list-style:none;">
	<?php if($_SESSION['authority'] == 'u'): ?>
            <li ><a id="resume"  href="/Job-Site/resume/management">이력서 관리</a></li>
            <li ><a id="resume"  href="Auth/logout">로그아웃</a></li>
	<?php elseif($_SESSION['authority'] == 'e'): ?>
            <li ><a id="jobOpening" href="/Job-Site/list-g">채용공고 관리</a></li>
            <li ><a id="jobOpening"  href="Auth/logout">로그아웃</a></li>
	<?php else: ?>
            <li ><a id="resume"  href="/Job-Site/resume/management">이력서 관리</a></li>
            <li ><a id="jobOpening" href="/Job-Site/list-g">채용공고 관리</a></li>
            <li ><a id="login" href="login">로그인</a></li>
	<?php endif; ?>
    	</ul>
    </nav>
</div>


<?php echo $__env->yieldContent('home'); ?>
</body>
</html>
<script>
	function searchKey()
	{
		var keyword = document.getElementById('inputKeyword');
		keyword.value = keyword.value.trim();
		if(keyword.value.length<2) {
			alert('키워드는 최소 2글자 이상으로 입력해주세요.');
			return false;
		}
	}
	$(document).ready(function() {
		$('#jobOpening').click(function(){
                    if("<?php echo e($_SESSION['authority']); ?>" != 'e') {
                        alert('기업회원 서비스 입니다');
		    } 
		    
		});

		$('#resume').click(function(){
                    if("<?php echo e($_SESSION['authority']); ?>" != 'u') {
                        alert('개인회원 서비스 입니다');
                    }
		});

		//네비바 토글	
		$('#toggle').click(function(){
			if($(this).html() == 'OFF'){
			    $(this).html('ON');
			    $('.GNB').css('height','180px');
			    $('.ulB li a').css('float','none');
			    $('.ulB').css('width','160px');
			    $('.ulB').show();
			    $('.ulB li').css('margin-top','10px');
			} else {
			    $(this).html('OFF');
			    $('.GNB').css('height','80px');
			    $('.ulB li a').css('float','left');
			    $('.ulB').css('width','100%');
			    $('.ulB').hide();
			    $('.ulB li').css('margin-top','0');
			}
		});
		$(window).resize(function(){
			if($('.GNB').css('width').replace(/[^0-9]/g,'') >760) {
			    $('.ulB').show();
                            $('#toggle').html('OFF');
                            $('.GNB').css('height','80px');
                            $('.ulB li a').css('float','left');
                            $('.ulB').css('width','100%');
			    $('.ulB li').css('margin-top','0');
			} else {
			    $('.ulB').hide();
			}
		});

	});
</script>

<?php /**PATH /var/www/html/Job-Site/view/layout/search.blade.php ENDPATH**/ ?>