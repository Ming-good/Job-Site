<?php $__env->startSection('Content'); ?>
<link rel="stylesheet" href="/Job-Site/assets/css/resume.css"/>
<div class="container">
    <div class="row">
	<div class="col-md-offset-1 col-md-10">
	    <h2>스크랩</h2>
	    <table class="table table-hover">
		<thead>
		    <tr>
			<th style="text-align:center;width:700px;">
			    <p>제목</p>
			</th>
			<th  style="text-align:center;width:100px;">
			    <p class="wrapSize3">스크랩관리</p>
			</th>
		    </tr>
		</thead>
		<tbody>
		<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		    <tr>
			<td>
			    <h4 class="wrapSize2 resume"><a style="margin-left:30px;font-weight:bold;" href="/Job-Site/list-g/board?id=<?php echo e($row['opening_no']); ?>"><?php echo e($row['title']); ?></a></h4>
			</td>
			<td style="width:100px;text-align:center;">
			    <a class="btnA blue less" href="javascript:del('/Job-Site/scrap/del', <?php echo e($row['opening_no']); ?>)"style="text-decoration:none;">삭제</a>
			</td>
		    </tr>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</tbody>
	    </table>
	</div>
    </div>
</div>
<script>
	function del(location, no) {
		var result = confirm('삭제하시겠습니까?');
		if(result) {
                        $.ajax({
                                url:location,
                                type:"post",
				data:{_token:"<?php echo e($_SESSION['token']); ?>",
				      id:no
				     },
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

<?php echo $__env->make('layout/layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/Job-Site/view/scrap/list.blade.php ENDPATH**/ ?>