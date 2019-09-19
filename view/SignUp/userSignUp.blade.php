@extends('layout/layout')
@section('SignUp')
        <div class="container">
		<div class="wrap_A">
   		    <ul style=" list-style:none;">
			<li ><a class="btnA on" id="A"  style="text-decoration:none;float:left" href="/Job-Site/userSign-up">개인회원</a></li>
			<li ><a class="btnA off" id="B" style="text-decoration:none;" href='/Job-Site/enterpriseSign-up'>기업회원</a></li>
		    </ul>
		</div>
                <div class="page-header"> 
                    <div class="col-md-6 col-md-offset-3">
                    <h3>인적사항</h3>
                    </div>
                </div>
            <div class="col-sm-6 col-md-offset-3">
                <form name="join" method="POST" onsubmit = "return validator();" action ="userStore" role="form">

                    <div class="forms required">
                        <label for="inputName">이름</label>
                        <input type="text" class="form-control" name="inputName"  id="inputName" placeholder="이름을 입력해 주세요" required>
                    </div>
                    <div class="forms required">
                        <label for="inputBirthday">생년월일</label>
                        <input Maxlength="8" type="text" class="form-control" name="inputBirthday"  id="inputBirthday" placeholder="EX)20190804 = 2019년 8월 4일" required>
                    </div>
                    <div class="forms required">
                        <label for="inputEmail">이메일 </label>
                        <input type="email" class="form-control" name="inputEmail" id="inputEmail" placeholder="이메일 주소를 입력해주세요" >
                    </div>
                    <div class="forms required">
                        <label for="inputID">아이디&nbsp;&nbsp;&nbsp;</label>
		    	<input type="button" class="btn btn-info btn-xs" id="ckId" value="중복검사" onclick="checkid();" />
                        <input type="text" class="form-control" name="inputID" id="inputID" placeholder="아이디를 입력해 주세요" required>
                    </div>
                    <div class="forms required">
                        <label for="inputPassword">비밀번호</label>
                        <input type="password" class="form-control" name="inputPassword" id="inputPassword" placeholder="영문, 숫자, 특수문자를 혼합하여 최소 8자리~ 최대 20자리 이내로 입력해주세요."required >
                    </div>
                    <div class="forms required">
                        <label for="inputPasswordCheck">비밀번호 확인</label>
                        <input type="password" class="form-control" name="inputPasswordCheck" id="inputPasswordCheck" placeholder="비밀번호 확인을 위해 다시한번 입력 해 주세요"required>
                    </div>
                    <div class="form-group">
                        <label for="inputMobile">휴대폰 번호</label>
                        <input maxlength="13" type="tel" class="form-control" name="inputMobile" id="inputMobile" placeholder="EX)010-6687-7665" oninput="mobileCheck();">
                    </div>


                    <div class="form-group text-center">
                        <button type="submit" id="join-submit" class="btn btn-primary">
                            회원가입<i class="fa fa-check spaceLeft"></i>
                        </button>
                        <button type="submit" id="cancel" class="btn btn-warning" onclick="javascript:location.href='home'">
                            가입취소<i class="fa fa-times spaceLeft"></i>
                        </button>
                    </div>
                </form>
            </div>

        </div>

<script>


//유효성 검사 함수
 function validator()
 {
	//패스워드 정규식 검사
	 var eng = /[a-zA-Z]/;
	 var num = /[0-9]/;
	 var spe = /[~!@#$%^&*<>]/;

	 //이메일 정규식 검사
	 var checkEmail = /([0-9a-zA-Z_-]+)@([0-9a-zA-Z_-]+)(.[0-9a-zA-Z_-]+){1,2}/i;

	 var name = document.getElementById('inputName');
	 var day = document.getElementById('inputBirthday');
	 var email = document.getElementById('inputEmail');
	 var pw = document.getElementById('inputPassword');
	 var id = document.getElementById('ckId');

	 //이름
	 if(name.value=="") {
		 alert('이름을 입력해주세요');
		 join.inputName.focus();
		 return false;

	 }

	 //생년월일
	 if(day.value=="") {
		alert('생년월일을 입력해 주세요');
		join.inputBirthday.focus();
		return false;
	 } else if (day.value.length!=8) {
		alert('생년월일을 정확히 입력해주세요.');
		join.inputBirthday.focus();
		return false;
	 }


	 //이메일
	 if(email.value=="") {
		 alert('이메일을 입력해 주세요');
		 join.inputEmail.focus();
		 return false;
	 } else if(!checkEmail.test(email.value)) {
		 alert('적합하지 않은 이메일 입니다');
		 join.inputEmail.focus();
		 return false;
	 }

	 if(id.value == '중복검사') {
		 alert('아이디 중복검사를 해주세요.');
		 return false;
	 }

	 //패스워드
	 if(join.inputPassword.value != join.inputPasswordCheck.value) {
		 alert('패스워드가 다릅니다. 다시 확인해 주세요.');
		 join.inputPassword.focus();
		 return false;
	 } else if(!eng.test(pw.value) || !num.test(pw.value) || !spe.test(pw.value)) {
		alert('영문, 숫자, 특수문자를 혼합하여 입력해주세요');
		 join.inputPassword.focus();
		return false;
	 } else if(pw.value.length <=7 || pw.value.length >= 15) {
		 alert('패스워드는 영문, 숫자, 특수문자를 혼합하여 최소 7자리 ~ 최대 15자리 이내로 입력해주세요.');
		 join.inputPassword.focus();
		return false;	 
	 }



 }

 //중복검사 폼을 검사완료로 변환시키는 함수
 function transform(data)
 {
	var id = document.getElementById('inputID');
	var ckId = document.getElementById('ckId');
	if (data) {
		ckId.value = "검사완료";
		id.readOnly = true;
		return true;
	} else {
		return false;
	}
 }

 //아이디 검사 함수
 function checkid()
 {
	 var idLeng = /[a-zA-Z0-9]{4,12}/;

	 var id = document.getElementById('inputID');
	 var ckId = document.getElementById('ckId');

	 //팝업창 위치
	 var _width='400';
	 var _height='200';
	 var _left = Math.ceil(( window.screen.width - _width )/2);
	 var _top = -Math.ceil(( window.screen.width - _height )/2);
	 
	 if(idLeng.test(id.value)) {
		url = 'checkId?id='+id.value;
		openWin=window.open(url, "chkid", 'width='+ _width +', height='+ _height +', left=' + _left + ', top='+ _top);
		return true;
	 } else {
                alert('아이디는 4~12자의 영문 대소문자와 숫자로만 입력해주세요');
                join.inputID.focus();
                return false;

	 }

 }

function mobileCheck()
{
        var check = /(^01[0-9].*)/ig;
        var mobile = document.getElementById('inputMobile');
        mobile.addEventListener('keydown', function(event) {
            if(event.keyCode == 8 && (mobile.value.length==4 || mobile.value.length==9))
            {
                     join.inputMobile.value = join.inputMobile.value.replace(/(.*)(-)/, '$1');
            }
        });

        if((mobile.value.length==3 || mobile.value.length==8) && check.test(mobile.value)) {
                join.inputMobile.value = join.inputMobile.value.replace(check, '$1-');
        }
}

</script>

@stop
