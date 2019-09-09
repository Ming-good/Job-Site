<?php $__env->startSection('search'); ?>
<div class="container">
    <div class="row" style="border-bottom:groove">
        <div class="col-sm-12" style="margin-bottom:50px;">
            <div>
                <a href="/Job-Site/home"><img style="float:left;" src="/Job-Site/assets/image/menuLogo.png" width="260" height="80"/></a>
                <div style="width:400px;padding-top:40px; position:absolute; margin-left:450px;" class="form-group">
                    <form action="allList" method='GET' onsubmit="return searchKey();">
                        <input value='<?php echo e($keyword); ?>'  style="float:left;width:300px;" type="search" class="form-control" name="inputKeyword" id="inputKeyword"/>
                        <input type="submit" class="btn btn-primary" value="검색"/>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
	function searchKey()
	{
		var keyword = document.getElementById('inputKeyword');
		keyword.value = keyword.value.trim();
		if(keyword.value.length<2) {
			alert('키워드는 최소 2글자 이상으로 입력해주세요.');
			return false;
		}
	}
</script>
<?php echo $__env->yieldContent('home'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout/layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/Job-Site/view/layout/search.blade.php ENDPATH**/ ?>