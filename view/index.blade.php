@extends('layout/layout')
@section('Content')
<!--공채 정보-->
    <div class = "cont_top">
	<div class="wrap_contant">
    	    <div class="wrap_Announce">	
	    </div>
@if(hash_equals($_SESSION['token'], $token))

<!--유저 프로필-->
	    <div class="wrap_my">
		<form method="POST" action="Auth/logout">
		    <div>
			<span>
			    <strong>{{$name}}</strong>님
			</span>
			<span class="my_info">
			@if($authority == 'u')
			    <a href="">이력서 등록하기 ></a>
			@else
			    <a href="jobOpening">채용공고 등록하기></a>
			@endif	
			</span>
		        <fieldset>
		            <button type="submit" class="btn_logout" >로그아웃</button>	
		        </fieldet>
		    </div>
		</form>
		<ul class="menu">
        	    <li><a href="">지원현황</a></li>
        	    <li><a href="">열람기업</a></li>
        	    <li><a href="">이력서 관리</a></li>
        	    <li><a href="">스마트매치</a></li>
    		</ul>
	    </div>
	</div>

@else
<!-- 로그인 -->
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
             </div>
         </form>
@endif
    </div>
@stop
