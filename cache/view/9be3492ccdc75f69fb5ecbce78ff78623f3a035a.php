<?php $__env->startSection('Content'); ?>
<div class="container">
    <div class="row">
	<div class="col-md-offset-1 col-md-10">
	    <table class="table">
		<thead>
		    <caption><h3>채용공고관리</h3> <a href="/Job-Site/jobOpening"><input class="btn btn-danger pull-right" type="button" value="채용공고 등록"/></a></caption>	
		</thead>
		<tbody>
		 <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		    <tr>
			<td>
			    <table>
				<tbody>
				    <tr>
					<td>
			    		    <h5 class="wrapSize2 head"><?php echo e($row['company']); ?></h5>
					</td>
				    </tr>
				    <tr>
					<td >
			    		    <h4 class="wrapSize2"><a href="list-g/board?id=<?php echo e($row['order_id']); ?>" style="text-decoration:none;color:#333;font-weight:bold;"><?php echo e($row['title']); ?></a></h4>

					</td>
				    </tr>
				</tbody>
			    </table>
			    <table>
				<tbody style="line-height:10px">
				    <tr>
					<th><p style="font-size:13px;letter-spacing:-1.2px;color:#999999;text-align:left;font-weight:normal;padding-right:30px;">직종</p></th>
					<td>
					    <p style="font-size:13px;color:#666;letter-spacing:-1.2px;"><?php echo e($row['job1']); ?>&middot;<?php echo e($row['job2']); ?></p>
					</td>
				    </tr>
				    <tr>
					<th><p style="font-size:13px;letter-spacing:-1.2px;color:#999999;text-align:left;font-weight:normal;padding-right:30px;">급여</p></th>
					<td>
					    <p style="font-size:13px;color:#666;letter-spacing:-1.2px;"><?php echo e($row['salary']); ?>&nbsp;&nbsp;<?php echo e($row['money']); ?></p>
					</td>
				    </tr>
				    <tr>
					<th><p style="font-size:13px;letter-spacing:-1.2px;color:#999999;text-align:left;font-weight:normal;padding-right:30px;">경력</p></th>
					<td>
					    <p style="font-size:13px;color:#666;letter-spacing:-1.2px;"><?php echo e($row['career']); ?></p>
					</td>
				    </tr>
				</tbody>
			    </table>
			</td>
			<td class="wrapSize">
			    <div style="padding:35px 10px 20px 10px;line-height:24px;">
			        <p style="font-size:13px;color:#666;letter-spacing:-1.2px;">등록일 : <?php echo e($row['created']); ?></p>
			        <p style="font-size:13px;color:#666;letter-spacing:-1.2px;">수정일 : <?php echo e($row['modify']); ?></p>
			    </div>
			</td>
		    </tr>
		    <tr>
			<td colspan="2">
			    <a href="javascript:del('list-g/del?id=<?php echo e($row['order_id']); ?>')" class="btn btn-info btn-xs pull-right">삭제</a>
			    <a href="jobOpening?id=<?php echo e($row['order_id']); ?>&mode=modify" style="margin-right:10px;" class="btn btn-info btn-xs pull-right">수정</a>
			</td>
		    </tr>
			    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</tbody>
	    </table>
	</div>
    </div>
    <div class="row">
	<div style="text-align:center;">
	    <ul class="pagination">
		<li class="page-item"><a class="page-link" href="list-g?id=">Previous</a></li>
		<?php for($i=$nav['startPage'];$i<$nav['endPage'];$i++): ?>
			<?php if($nav['currentPage']==$i): ?>
			    <li class="page-item"><span class="page-link"><?php echo e($i+1); ?></span></li>
			<?php else: ?>    
			    <li class="page-item"><a class="page-link" href="list-g?id=<?php echo e($i); ?>"><?php echo e($i+1); ?></a></li>
			<?php endif; ?>
		<?php endfor; ?>
	
		<?php if($nav['nextPage']==TRUE): ?>
			<li class="page-item"><a class="page-link" href="list-g?id=<?php echo e($nav['endPage']); ?>">Next</a></li>
		<?php else: ?>
			<li class="page-item"><span class="page-link">Next</span></li>
		<?php endif; ?>
   	    </ul>
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


<?php echo $__env->make('layout/layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/Job-Site/view/enterprise/jobList.blade.php ENDPATH**/ ?>