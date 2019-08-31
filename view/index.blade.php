@extends('layout/layout')

@section('Content')
  <script src="/Job-Site/vender/ml/tf.js"></script>
  <script src="/Job-Site/vender/ml/web.js"></script>
  <script src="/Job-Site/assets/js/index.js" defer></script>
  <script src="//developers.kakao.com/sdk/js/kakao.min.js"></script>

<!--공채 정보-->
@if(hash_equals($_SESSION['token'], $token))
<div class="container">
    <div class="row">
        <div class="col-md-offset-1 col-md-10">
<!--유저 프로필-->
	@if($authority == 'u')
	    <div class="wrap_my">
		<form method="POST" action="Auth/logout">
		    <div>
			<span>
			    <strong>{{$name}}</strong>님&nbsp;<span style="color:#4876ef;font-size:13px;">(일반회원)</span>
			</span>
			<span class="my_info">
			    <a href="">이력서 등록하기 ></a>
			</span>
		        <fieldset>
		            <button type="submit" class="btn_logout" onclick="logoutKakao();">로그아웃</button>	
		        </fieldet>
		    </div>
		</form>
		<ul class="menu">
        	    <li><a href="list-g">채용공고관리</a></li>
        	    <li><a href="">열람기업</a></li>
        	    <li><a href="">이력서 관리</a></li>
        	    <li><a href="">스마트매치</a></li>
    		</ul>
	    </div>
	@else
	    <div class="wrap_my">
		<form method="POST" action="Auth/logout">
		    <div>
			<span>
			    <strong>{{$name}}</strong>님&nbsp;<span style="color:#4876ef;font-size:13px;">(기업회원)</span>
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
        	    <li><a href="">스마트매치</a></li>
    		</ul>
	    </div>
	</div>
	@endif	

@else
<!-- 로그인 -->
	<div style="width:364px;">
         <form method="POST" action="Auth/login">
             <div class="wrap_my">
                 <div >
                      <a class="user_login" href="Sign-up">회원가입</a>
                      <a class="user_finding"  href="">아이디/비밀번호 찾기</a>
                 </div>
                 <div class ="login_input">
                     <span class ="box_inp">
                         <input type="text" name="id" id="login_person_id"  class="inp_login" placeholder="아이디" >
                     </span>
                     <span class ="box_inp">
                         <input type="password" name="passwd" id="login_person_id"  class="inp_login" placeholder="비밀번호" >
                     </span>
                     <span>
                         <input type="submit" class="btn_login" value="로그인">
                     </span>
                 </div>
		      <a class="pull-right" style="margin-top:40px;"  href="javascript:loginKakao()"><img src="/Job-Site/assets/image/login.png"/></a>
             </div>
         </form>
	    
	</div>
	</div>
    </div>
</div>


@endif

    <script type='text/javascript'>

Kakao.init('db316ffdfc1b88f64685de057f89dc94');

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
						console.log(res);
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
@stop
