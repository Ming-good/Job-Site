<?php $__env->startSection('Content'); ?>
<link rel="stylesheet" href="/Job-Site/assets/css/resume.css"/>
<div class="container">
    <div class="row">
	<div class="col-md-offset-1 col-md-10">
	    <h2 style="font-weight:bold">인제정보관리</h2>
	    <table class="table table-hover">
		<tbody>
		<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		    <tr>
			<td>
                            <table>
                                <tbody>
                                    <tr>
                                        <td>
                                            <h4 class="wrapSize2"> <a href="list-g/board?id=<?php echo e($row['opening_no']); ?>" style="margin-left:10px;text-decoration:none;color:#333;font-weight:bold;"><?php echo e($row['title']); ?></a></h4>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
			</td>
			<td class="wrapSize" style="padding:20px 20px 20px 20px;">
			     <a href="/Job-Site/resume/view?no=<?php echo e($row['resume_no']); ?>" class="btnA blue small" style="text-decoration:none;">이력서보기</a>
			     <a href="javascript:del('guin_del?id=<?php echo e($row['order_id']); ?>')" class="btnA blue small" style="margin-top:5px;text-decoration:none;">삭제</a>
			    
			</td>
		    </tr>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</tbody>
	    </table>
	</div>
    </div>
</div>
<script>
        function del(location) {
                var msg='삭제하시겠습니까?';
                if (confirm(msg)){
                        $.ajax({
                                url:location,
                                type:"post",
                                data:{_token:"<?php echo e($_SESSION['token']); ?>"},
				success:function(){
                                        window.location.reload();
                                }
                        })

                        return true;
                } else {
                        return false;
                }
        }
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout/layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/Job-Site/view/apply/applicant.blade.php ENDPATH**/ ?>