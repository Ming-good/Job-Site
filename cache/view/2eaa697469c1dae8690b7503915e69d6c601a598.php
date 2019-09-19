<?php $__env->startSection('Content'); ?>
<link rel="stylesheet" href="/Job-Site/assets/css/resume.css"/>
<div class="container">
    <div class="row">
	<div class="col-md-offset-1 col-md-10">
	    <h1>이력서 관리</h1>
	    <table class="table table-hover">
		<thead>
		    <tr>
			<th style="text-align:center;width:700px;">
			    이력서제목
			</th>
			<th colspan="2" style="text-align:center;width:230px;">
			    이력서관리
			</th>
		    </tr>
		</thead>
		<tbody>
		<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		    <tr>
			<td>
			    <a style="font-size:15px;font-weight:bold;margin-left:30px;" href="view?no=<?php echo e($row['order_id']); ?>"><?php echo e(empty($row['title']) ? '이력서' : $row['title']); ?></a>
			    <p style="margin-left:30px;;color:#999;font-size:12px;"><?php echo e($row['created']); ?></p>
			</td>
			<td>
                           <form action="/Job-Site/resume?no=<?php echo e($row['order_id']); ?>" method='POST'>
			        <input type="submit" value="수정" class="button2" style="float:right;">
                                <input type="hidden" name="_token" value="<?php echo e($_SESSION['token']); ?>"/>
                           </form>

			</td>
			<td>
                           <form onsubmit="return del();" action="/Job-Site/resume/destroy?no=<?php echo e($row['order_id']); ?>" method='POST'>
			        <input type="submit"  value="삭제" class="button2" style="float:left;">
                                <input type="hidden" name="_token" value="<?php echo e($_SESSION['token']); ?>"/>
                           </form>
			</td>
		    </tr>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</tbody>
	    </table>
	    <button id="btn" type="button" style="float:right;margin-top:20px;" class="button3">이력서 등록</button>
	</div>
    </div>
</div>
<script>
	function del() {
		var result = confirm('삭제하시겠습니까?');
		if(result) {
			return true;
		} else {
			return false;
		}
	}
$(document).ready(function(){
        $('#btn').click(function(){
                window.location.href ="/Job-Site/resume";
        })
})

</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout/layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/Job-Site/view/resume/management.blade.php ENDPATH**/ ?>