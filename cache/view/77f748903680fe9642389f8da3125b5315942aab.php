<?php $__env->startSection('Content'); ?>
<div class="container">
    <div class="row">
	<div class="col-md-offset-1 col-md-10">
	    <h3 style="font-weight:bold;">이력서 상세보기</h3>
	    <table class="table table-striped">
		<thead>
		    <caption style="margin-bottom:20px;background-color:#e9e9e9;text-align:center;font-size:28px;font-weight:bold;"><?php echo e($data['title']); ?></caption>
		</thead>
		<tbody>
		    <tr>
			<th style="background-color:#f9f9f9;width:100px;">
			    <p class="font1">이름</p>
			</th>
			<td style="background-color:#fff">
			   <p class="font2"><?php echo e($data['name']); ?></p> 
			</td>
		    </tr>
		    <tr>
			<th style="background-color:#f9f9f9;width:100px;">
			    <p class="font1">생년월일</p>
			</th>
			<td style="background-color:#fff">
			   <p class="font2"><?php echo e($data['birth']); ?></p> 
			</td>
		    </tr>
		    <tr>
			<th style="background-color:#f9f9f9;width:100px;">
			    <p class="font1">이메일</p>
			</th>
			<td style="background-color:#fff">
			   <p class="font2"><?php echo e($data['email']); ?></p> 
			</td>
		    </tr>
		    <tr>
			<th style="background-color:#f9f9f9;width:100px;">
			    <p class="font1">휴대폰</p>
			</th>
			<td style="background-color:#fff">
			   <p class="font2"><?php echo e($data['mobile']); ?></p> 
			</td>
		    </tr>
		    <tr>
			<th style="background-color:#f9f9f9;width:100px;">
			    <p class="font1">학력</p>
			</th>
			<td style="background-color:#fff">
			   <p class="font2"><?php echo e($data['grade']); ?></p> 
			</td>
		    </tr>
		    <tr>
			<th style="background-color:#f9f9f9;width:100px;">
			    <p class="font1">졸업학교</p>
			</th>
			<td style="background-color:#fff">
			   <p class="font2"><?php echo e($data['school']); ?></p> 
			</td>
		    </tr>
		</tbody>
	    </table> 

	    <h4 style="font-weight:bold;">자기소개서</h4>
	    <div style="border:2px solid #ddd;padding:20px 20px;">
	        <div style="white-space:pre"><?php echo e($data['content']); ?></div>
	    </div>
	    <button class="btn btn-primary" id="btn" style="margin-top:20px;" type="button" >뒤로가기</button>
	</div>
    </div>
</div>
<script>
$(document).ready(function(){
	$('#btn').click(function(){
		window.location.href ="/Job-Site/resume/management";
	})
})
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout/layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/Job-Site/view/resume/board.blade.php ENDPATH**/ ?>