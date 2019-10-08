<?php $__env->startSection('home'); ?>
  <script src="//developers.kakao.com/sdk/js/kakao.min.js"></script>
<script>
if("<?php echo e($_SESSION['check']); ?>") {
	alert('잘못된 접근방식 입니다.');
	<?php echo e($_SESSION['check'] = false); ?>

}
</script>
<div class="container">
    <div  class="wrap">
	<div class="col-sm-8">
	    <div class="jobOpening">
		<table class="table">
		    <tbody>
			<tr style="height:45px;">
			    <th style="font-size:15px;width:50%;background-color:#f8f8f8;text-align:center;">최근 채용정보</th>
			    <th style="font-size:15px;background-color:#f8f8f8;text-align:center;">지역별 채용정보</th>
			</tr>
			<tr style="height:200px;">
			    <!--최근 채용정보--!>
			    <td>
			        <ul style="padding-left:0px;width:375px; list-style:none;">
					<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				    <li class="menuList">
					<a style="color:#333;font-size:14px;text-decoration:none;" href='list-g/board?id=<?php echo e($row['order_id']); ?>'><?php echo e($row['title']); ?></a>
					<p style="padding-top:5px;color:#666666;font-size:12px;">│ <?php echo e($row['company']); ?></p>
				    </li>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			        </ul>
			    </td>
			    <!--지역별 채용정보--!>
			    <td>
				<ul style="padding-left:0px;width:375px; list-style:none;">
				    <li class="menuList2">
					<a style="color:#666666;font-size:14px;text-decoration:none;" href='/Job-Site/allList?selectArea=서울'>서울</a>
				    </li>
				    <li class="menuList2">
					<a style="color:#666666;font-size:14px;text-decoration:none;" href='/Job-Site/allList?selectArea=경기'>경기</a>
				    </li>
				    <li class="menuList2">
					<a style="color:#666666;font-size:14px;text-decoration:none;" href='/Job-Site/allList?selectArea=인천'>인천</a>
				    </li>
				    <li class="menuList2">
					<a style="color:#666666;font-size:14px;text-decoration:none;" href='/Job-Site/allList?selectArea=부천'>부천</a>
				    </li>
				    <li class="menuList2">
					<a style="color:#666666;font-size:14px;text-decoration:none;" href='/Job-Site/allList?selectArea=춘천'>춘천</a>
				    </li>
				    <li class="menuList2">
					<a style="color:#666666;font-size:14px;text-decoration:none;" href='/Job-Site/allList?selectArea=강원'>강원</a>
				    </li>
				    <li class="menuList2">
					<a style="color:#666666;font-size:14px;text-decoration:none;" href='/Job-Site/allList?selectArea=부산'>부산</a>
				    </li>
				    <li class="menuList2">
					<a style="color:#666666;font-size:14px;text-decoration:none;" href='/Job-Site/allList?selectArea=울산'>울산</a>
				    </li>
				    <li class="menuList2">
					<a style="color:#666666;font-size:14px;text-decoration:none;" href='/Job-Site/allList?selectArea=경남'>경남</a>
				    </li>
				    <li class="menuList2">
					<a style="color:#666666;font-size:14px;text-decoration:none;" href='/Job-Site/allList?selectArea=대구'>대구</a>
				    </li>
				    <li class="menuList2">
					<a style="color:#666666;font-size:14px;text-decoration:none;" href='/Job-Site/allList?selectArea=경북'>경북</a>
				    </li>
				    <li class="menuList2">
					<a style="color:#666666;font-size:14px;text-decoration:none;" href='/Job-Site/allList?selectArea=전주'>전주</a>
				    </li>
				    <li class="menuList2">
					<a style="color:#666666;font-size:14px;text-decoration:none;" href='/Job-Site/allList?selectArea=전북'>전북</a>
				    </li>
				    <li class="menuList2">
					<a style="color:#666666;font-size:14px;text-decoration:none;" href='/Job-Site/allList?selectArea=광주'>광주</a>
				    </li>
				    <li class="menuList2">
					<a style="color:#666666;font-size:14px;text-decoration:none;" href='/Job-Site/allList?selectArea=전남'>전남</a>
				    </li>
				    <li class="menuList2">
					<a style="color:#666666;font-size:14px;text-decoration:none;" href='/Job-Site/allList?selectArea=청주'>청주</a>
				    </li>
				    <li class="menuList2">
					<a style="color:#666666;font-size:14px;text-decoration:none;" href='/Job-Site/allList?selectArea=충북'>충북</a>
				    </li>
				    <li class="menuList2">
					<a style="color:#666666;font-size:14px;text-decoration:none;" href='/Job-Site/allList?selectArea=대전'>대전</a>
				    </li>
				    <li class="menuList2">
					<a style="color:#666666;font-size:14px;text-decoration:none;" href='/Job-Site/allList?selectArea=충남'>충남</a>
				    </li>
				    <li class="menuList2">
					<a style="color:#666666;font-size:14px;text-decoration:none;" href='/Job-Site/allList?selectArea=제주'>제주</a>
				    </li>
				</ul>
			    </td>
			</tr>
		    </tbody>
		</table>
	    </div>
	</div>
	<div class="col-sm-4">
<!--공채 정보-->
<?php if(hash_equals($_SESSION['token'], $token)): ?>
<!--유저 프로필-->
	<?php if($authority == 'u'): ?>
	    <div class="wrap_my">
		<form method="POST" onsubmit="return logoutKakao();" action="Auth/logout">
		    <div>
			<span>
			    <strong><?php echo e($name); ?></strong>님&nbsp;<span style="color:#4876ef;font-size:13px;">(일반회원)</span>
			</span>
			<span class="my_info">
			    <a href="resume">이력서 등록하기 ></a>
			</span>
		        <fieldset>
		            <button type="submit" class="btn_logout">로그아웃</button>	
		        </fieldet>
		    </div>
		</form>
		<ul class="menu">
        	    <li><a href="resume/management">이력서 관리</a></li>
        	    <li><a href="/Job-Site/scrap/list">스크랩</a></li>
    		</ul>
	    </div>
	<?php else: ?>
	    <div class="wrap_my">
		<form method="POST" action="Auth/logout">
		    <div>
			<span>
			    <strong><?php echo e($name); ?></strong>님&nbsp;<span style="color:#4876ef;font-size:13px;">(기업회원)</span>
			</span>
			<span class="my_info">
	    		    <a href="jobOpening">채용공고 등록하기></a>
			</span>
		        <fieldset>
		            <button type="submit" class="btn_logout" >로그아웃</button>	
		        </fieldet>
		    </div>
		</form>
		<ul class="menu">
        	    <li><a href="list-g">채용공고관리</a></li>
        	    <li><a href="guin_management">인제정보관리</a></li>
    		</ul>
	    </div>
	<?php endif; ?>	

<?php else: ?>
<!-- 로그인 -->
         <div class="wrap_my">
         <form id="forms">
                 <div >
                      <a class="user_login" href="userSign-up">회원가입</a>
                 </div>
                 <div class ="login_input">
                     <span class ="box_inp">
                         <input autocomplete=off type="text" name="id" id="id"  class="inp_login" placeholder="아이디" >
                     </span>
                     <span class ="box_inp">
                         <input autocomplete=off type="password" name="passwd" id="passwd"  class="inp_login" placeholder="비밀번호" >
                     </span>
                     <span>
                         <input type="submit" id="execute" class="btn_login" value="로그인"/>
                     </span>
                 </div>
		      <a class="pull-right" style="margin-top:10px;"  href="javascript:loginKakao()"><img src="/Job-Site/assets/image/login.png"/></a>
            
         </form>
	    
	</div>


<?php endif; ?>
	<div class="search_Wrap">
	    <div style="margin-bottom:15px;">
		<h2 style="font-weight:bold;font-size:15px;">실시간 검색어 순위</h2>
	    </div>
	    <ol style="list-style:none;padding:0px;">
		    <?php $__currentLoopData = $searchData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<li class="searchKeyword">
			        <a style="text-decoration:none;color:#000;" href="/Job-Site/allList?inputKeyword=<?php echo e($row['keyword']); ?>">
				    <em class="rankBox"><?php echo e($row['rank']); ?></em>
				    <span class="keyword"><?php echo e($row['keyword']); ?></span>
				<?php if($row['RANKING'] == 0): ?>
				    <span class="searchIMG">
					<img src="/Job-Site/assets/image/unchanged.gif"/>
					<span style="font-size:12px;margin-left:10px;"><?php echo e($row['RANKING']); ?></span>
				    </span>
				<?php elseif($row['RANKING'] == 999): ?>
				    <span class="searchIMG">
					<img src="/Job-Site/assets/image/new.gif"/>
					<span style="font-size:12px;margin-left:10px;">0</span>
				    </span>
				<?php elseif($row['RANKING'] > 0): ?>
				    <span class="searchIMG">
					<img src="/Job-Site/assets/image/down.gif"/>
					<span style="font-size:12px;margin-left:10px;"><?php echo e($row['RANKING']); ?></span>
				    </span>
				<?php elseif($row['RANKING'] < 0): ?>
				    <span class="searchIMG">
					<img src="/Job-Site/assets/image/up.gif"/>
					<span style="font-size:12px;margin-left:10px;"><?php echo e($row['RANKING'] * -1); ?></span>
				    </span>
				<?php endif; ?>
			        </a> 
		</li>
		    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	    </ol>
	</div>


	</div>
    </div>
</div>
<script>
$(document).ready(function(){
	$('#forms').submit(function(){
		$.ajax({
			type:"post",
			url:"Auth/login",
			data:$('#forms').serialize(),
			success:function(data) {
				if(data == 'true') {
					window.location.reload();
				} else if(data == 'false') {
					alert('아이디 또는 비밀번호가 일치하지 않습니다.');
					window.location.href="/Job-Site/login";
				} else {
					alert(data);
				}
			}
		})
		return false;
	})
})
</script>

<script type='text/javascript'>


	Kakao.init('db316ffdfc1b88f64685de057f89dc94');
	
	function logoutKakao()
	{
		Kakao.Auth.logout();
	}

	//카카오 로그인
	function loginKakao() 
	{
		
		Kakao.Auth.cleanup();
		Kakao.Auth.loginForm({
        		persistAccessToken: true,
        		persistRefreshToken: true,
			success: function(authObj)
			{	
				Kakao.API.request({
                          		url: '/v1/user/me',
					success: function(res) 
					{
                				var userID = res.id;      //유저의 카카오톡 고유 id
                				var userEmail = res.kaccount_email   //유저의 이메일
                				var userNickName = res.properties.nickname; //유저가 등록한 별명
						var pw = authObj.access_token;
						submit(userID, userEmail, userNickName, pw);

                			},
					fail: function(error) 
					{
                         			alert(JSON.stringify(error));
                			}
        			});
			},
			fail:function(err) 
			{
				alert(JSON.stringify(err));
			}
	       	});
	}

	//카카오 사용자 정보 전송
	function submit(userID, userEmail, userNickName, pw)
	{
       	     var form = document.createElement("form");
             form.setAttribute("charset", "UTF-8");
             form.setAttribute("method", "Post");  //Post 방식
             form.setAttribute("action", "Auth/loginKakao"); //요청 보낼 주소


             var hiddenField = document.createElement("input");
             hiddenField.setAttribute("type", "hidden");
             hiddenField.setAttribute("name", "inputID");
             hiddenField.setAttribute("value", userID);
             form.appendChild(hiddenField);


             hiddenField = document.createElement("input");
             hiddenField.setAttribute("type", "hidden");
             hiddenField.setAttribute("name", "inputEmail");
             hiddenField.setAttribute("value", userEmail);
             form.appendChild(hiddenField);

	     
	     var hiddenField = document.createElement("input");
             hiddenField.setAttribute("type", "hidden");
             hiddenField.setAttribute("name", "inputName");
             hiddenField.setAttribute("value", userNickName);
             form.appendChild(hiddenField);


	     var hiddenField = document.createElement("input");
             hiddenField.setAttribute("type", "hidden");
             hiddenField.setAttribute("name", "inputPw");
             hiddenField.setAttribute("value", pw);
             form.appendChild(hiddenField);

             document.body.appendChild(form);
             form.submit();
	}


    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout/search', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/Job-Site/view/index.blade.php ENDPATH**/ ?>