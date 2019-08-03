@extends('layout/layout')
@section('Content')
<!-- 로그인 -->
        <div class = "cont_top">
         <form method="POST" action="">
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
                 <input type="text" name="passwd" id="login_person_id"  class="inp_login" placeholder="비밀번호
" >
            </span>
            <span>
              <input type="submit" class="btn_login" value="로그인">
             </span>
            </div>
          </div>
         </form>
        </div>

@stop
