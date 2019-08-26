<?php $__env->startSection('Content'); ?>
  <script src="/Job-Site/vender/ml/tf.js"></script>
  <script src="/Job-Site/vender/ml/web.js"></script>
  <script src="/Job-Site/assets/js/index.js" defer></script>
<!--공채 정보-->
    <div class = "cont_top">
	<div class="wrap_contant">
    	    <div class="wrap_Announce">	
	    </div>
<?php if(hash_equals($_SESSION['token'], $token)): ?>

<!--유저 프로필-->
	<?php if($authority == 'u'): ?>
	    <div class="wrap_my">
		<form method="POST" action="Auth/logout">
		    <div>
			<span>
			    <strong><?php echo e($name); ?></strong>님&nbsp;<span style="color:#4876ef;font-size:13px;">(일반회원)</span>
			</span>
			<span class="my_info">
			    <a href="">이력서 등록하기 ></a>
			</span>
		        <fieldset>
		            <button type="submit" class="btn_logout" >로그아웃</button>	
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
        	    <li><a href="">스마트매치</a></li>
    		</ul>
	    </div>
	</div>
	<?php endif; ?>	

<?php else: ?>
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
<?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout/layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/Job-Site/view/index.blade.php ENDPATH**/ ?>