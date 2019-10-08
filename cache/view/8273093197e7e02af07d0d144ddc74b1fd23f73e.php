<!DOCTYPE html>
<html>
<head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
        <link rel="stylesheet" href="/Job-Site/assets/css/main.css" />

<!-- 합쳐지고 최소화된 최신 CSS -->
<link rel="stylesheet" href="/Job-Site/assets/bootstrap/css/bootstrap.min.css"/>
<script src="/Job-Site/assets/js/jquery-3.4.1.min.js"></script>

</head>
<body>
<div style="padding-top:30px;text-align:center;margin-top:-115px;background-color:#4876ef;width:100%;height:100px;">
    <span style="color:#fff;font-size:30px;font-weight:bold;">이력서 선택</span>
</div>
<div class="container">
    <form>
        <table class="table table-hover">
	    <tbody>
	        <tr>
   	            <th style="text-align:center;">이력서 제목</th>
	        </tr>
		<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	        <tr>
		    <td>
			<input type="radio" name="radioNo" id="radio-1" class="custom-control-input" value="<?php echo e($row['order_id']); ?>">
			<a onclick="moving(<?php echo e($row['order_id']); ?>);" href="#" style="margin-left:20px;font-size:14px;text-decoration:none;font-weight:bold;"><?php echo e($row['title']); ?></a>
		    </td>	
	        </tr>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	    </tboty>
        </table>
	<div style="margin-top:40px;">
	    <input id="execute" type="button" style="position:relative;left:50%;margin-left:-100px;" class="btnA blue big" value="지원하기">
	</div>
	<input type="hidden" name="_token" value="<?php echo e($_SESSION['token']); ?>"/>
    </form>
</div>
</body>
</html>
<script>
$(document).ready(function() {
	$('#execute').click(function(){
		if(!$('input:radio[name=radioNo]').is(':checked')) {
			alert('이력서를 선택해 주세요');
			return false;
		} else {
			$.ajax({
				url:"apply/store?id=<?php echo e($_GET['id']); ?>",
				type:"post",
				data:$('form').serialize(),
				success:function(data){
					self.close();
					window.opener.location.reload(true);
				}
			})
		}
	});
	if("<?php echo e($_SESSION['authority']); ?>" != 'u'){
               alert('개인회원 전용 서비스입니다.');
               window.location.href="/Job-Site/login";
	}
});
</script>

<script>
//부모 페이지가 이력서 뷰로 이동합니다.
function moving(no)
{
	window.opener.location.href="/Job-Site/resume/view?no="+no;
}
</script>
<?php /**PATH /var/www/html/Job-Site/view/apply/apply.blade.php ENDPATH**/ ?>