<?php $__env->startSection('SignUp'); ?>
        <article class="container">
            <div class="page-header">
                <div class="col-md-6 col-md-offset-3">
                <h3>회원가입 Form</h3>
                </div>
            </div>
            <div class="col-sm-6 col-md-offset-3">
                <form method="POST" action ="SignUpProcess" role="form">
                    <div class="forms required">
                        <label for="inputName">이름</label>
                        <input type="text" class="form-control" name="inputName"  id="inputName" placeholder="이름을 입력해 주세요" required>
                    </div>
                    <div class="forms required">
                        <label for="inputBirthday">생년월일</label>
                        <input type="text" class="form-control" name="inputBirthday"  id="inputBirthday" placeholder="EX)20190804 = 2019년 8월 4일" required>
                    </div>
                    <div class="forms required">
                        <label for="inputEmail">이메일 </label>
                        <input type="email" class="form-control" name="inputEmail" id="inputEmail" placeholder="이메일 주소를 입력해주세요" required>
                    </div>
                    <div class="forms required">
                        <label for="inputID">아이디</label>
                        <input type="text" class="form-control" name="inputID" id="inputID" placeholder="아이디를 입력해 주세요" required>
                    </div>
                    <div class="forms required">
                        <label for="inputPassword">비밀번호</label>
                        <input type="password" class="form-control" name="inputPassword" id="inputPassword" placeholder="비밀번호를 입력해주세요"required >
                    </div>
                    <div class="forms required">
                        <label for="inputPasswordCheck">비밀번호 확인</label>
                        <input type="password" class="form-control" name="inputPasswordCheck" id="inputPasswordCheck" placeholder="비밀번호 확인을 위해 다시한번 입력 해 주세요"required>
                    </div>
                    <div class="forms required">
                        <label for="inputMobile">휴대폰 번호</label>
                        <input type="tel" class="form-control" id="inputMobile" placeholder="휴대폰번호를 입력해 주세요"required>
                    </div>

                    <div class="form-group text-center">
                        <button type="submit" id="join-submit" class="btn btn-primary">
                            회원가입<i class="fa fa-check spaceLeft"></i>
                        </button>
                        <button type="submit" class="btn btn-warning">
                            가입취소<i class="fa fa-times spaceLeft"></i>
                        </button>
                    </div>
                </form>
            </div>

        </article>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout/layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/Job-Site/View/SignUp/SignUp.blade.php ENDPATH**/ ?>