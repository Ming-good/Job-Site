<?php $__env->startSection('Content'); ?>

<link rel="stylesheet" href="/Job-Site/assets/css/resume.css"/>
<div class="container" id="test">
    <div class="row">
	<div class="col-md-offset-1 col-md-10">
	    <form onsubmit="return recodeCheck();" action="<?php echo e($mode == 'modify' ? 'resume/update?no='.$_GET['no'] : 'resume/store'); ?>" method="POST" name="form">
	    <h3 style="font-weight:bold;">인적사항</h3>
	    <div>
		<div class="inputName" id="box">
		    <label for="inputName" style="font-size:11px;color:#a8a8a8;">이름</label>
		    <input style="outline:none;height:30px;width:105px;border: 0 none;" type="text" name="inputName" id="inputName" value=<?php echo e($data['name']); ?>>
		</div>
		<div class="inputBirth" id="box">
		    <label for="inputBirth" style="font-size:11px;color:#a8a8a8;">생년월일</label>
		    <input maxlength="8" placeholder="19940403" style="outline:none;height:30px;width:105px;border: 0 none;" type="text" name="inputBirth" id="inputBirth" value=<?php echo e($data['birthday']); ?>>
		</div>
		<div class="inputEmail" id="box">
		    <label for="inputEmail" style="font-size:11px;color:#a8a8a8;">이메일</label>
		    <input style="outline:none;height:30px;width:200px;border: 0 none;" type="text" name="inputEmail" id="inputEmail" value=<?php echo e($data['email']); ?>>
		</div>
		<div class="inputMobile" id="box">
		    <label for="inputMobile" style="font-size:11px;color:#a8a8a8;">휴대폰번호</label>
		    <input maxlength="13" style="outline:none;height:30px;width:105px;border: 0 none;" type="text" name="inputMobile" id="inputMobile" placeholder="010-6687-7665" oninput="mobileCheck();" value=<?php echo e($data['mobile']); ?>>
		</div>
	    </div>
	    <h3 style="font-weight:bold; margin-top:40px;">학력</h3>
	    <div>
		<select class="form-control" style="width:120px;height:60px;float:left;"  name="selectGrade">
		    <option value="">학력선택</option>
		    <option value="고등학생">고등학생</option>
		    <option value="2,3년제">대학2~3년제</option>
		    <option value="4년제">대학4년제</option>
		    <option value="대학원">대학원</option>
		</select>
                <div class="inputSchool" id="box5">
                    <label for="inputSchool" style="font-size:11px;color:#a8a8a8;">학교명</label>
                    <input value="<?php echo e($data['school']); ?>" style="outline:none;height:30px;width:105px;border: 0 none;" type="text" name="inputSchool" id="inputSchool">
                </div>
	    </div>
	    <h3 style="font-weight:bold; margin-top:40px;">자기소개서</h3>
            <div class="form-group">
                <input  autocomplete=off value="<?php echo e($data['title']); ?>" style="height:50px;text-align:center;" type="text" class="form-control" name="inputTitle" id="inputTitle" placeholder="이력서 제목을 입력해주세요.">
	    </div>
	    <div class="form-group">
		<textarea  name="inputContent" class="form-control" rows='10'><?php echo e($data['content']); ?></textarea>
	    </div>
	    <div style="text-align:center;">
	        <input class="button1" type="submit" value="작성완료">
	    </div>
	        <input type="hidden" name="_token" value="<?php echo e($_SESSION['token']); ?>"/>
	    </form>
	</div>
    </div>
</div>

<script>
var beforeFocus;
var checkNum = 1;
window.onclick = function(e) 
{
	focus = e.target.parentNode;
	if(focus.id == 'box' && checkNum == 1) {
		focus.style.border = "1px solid #4876ef";
		beforeFocus = focus;
		checkNum = 0;
	} else if(focus.id == 'box' && checkNum == 0){
		focus.style.border = "1px solid #4876ef";
		beforeFocus.style.border = "1px solid #dfdfdf";
		beforeFocus = focus;
		checkNum = 0;
	} else {
		beforeFocus.style.border = "1px solid #dfdfdf";
		checkNum = 1;
	}

}

//휴대폰 번호를 입력할 때 - 가 출력되게 합니다.
function mobileCheck()
{
        var check = /(^01[0-9].*)/ig;
        var mobile = document.getElementById('inputMobile');
        mobile.addEventListener('keydown', function(event) {
            if(event.keyCode == 8 && (mobile.value.length==4 || mobile.value.length==9))
            {
                     form.inputMobile.value = form.inputMobile.value.replace(/(.*)(-)/, '$1');
            }

        },true);

        if((mobile.value.length==3 || mobile.value.length==8) && check.test(mobile.value)) {
                form.inputMobile.value = form.inputMobile.value.replace(check, '$1-');
        }
}

//이력서의 최대 개수를 넘으면 이력서 등록이 안되게 합니다.
function recodeCheck()
{
	var count = <?php echo e($count); ?>;
	if(count>=10) {
		alert('이력서가 너무 많습니다. 새로 등록하기 위해선 이력서를 삭제해 주세요.');
		window.location.href ="/Job-Site/resume/management";
		return false;
	} else {
		return true;
	}
}


</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout/layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/Job-Site/view/resume/enrollment.blade.php ENDPATH**/ ?>