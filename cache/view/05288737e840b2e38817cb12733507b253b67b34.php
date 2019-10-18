<?php $__env->startSection('home'); ?>

<div class="container">
    <div class="row">
	<div class="col-sm-12">
            <h3><span style="font-weight:bold;">채용공고 상세검색</span></h3>
	    <div style="border-top:2px solid;border-left:1px solid #dfdfdf;border-right:1px solid #dfdfdf;padding:30px 30px 30px 30px;">
		    <form method="GET" action="allList" onsubmit="return searchKey2();">
			<div class="selectSpan">
			    <span style="width:70px; float:left;font-weight:bold;padding-top:5px;">지역선택:</span>
			    <span style="width:140px;">
			        <select class="form-control" style="width:140px;"  name="selectArea">
                                      <option  value="">지역선택</option>
                                      <option  value="서울" <?php echo e($_GET['selectArea']=="서울" ? 'selected' : ''); ?>>서울</option>
                                      <option  value="경기" <?php echo e($_GET['selectArea']=="경기" ? 'selected' : ''); ?>>경기</option>
                                      <option  value="인천" <?php echo e($_GET['selectArea']=="인천" ? 'selected' : ''); ?>>인천</option>
                                      <option  value="부천" <?php echo e($_GET['selectArea']=="부천" ? 'selected' : ''); ?>>부천</option>
                                      <option  value="춘천" <?php echo e($_GET['selectArea']=="춘천" ? 'selected' : ''); ?>>춘천</option>
                                      <option  value="강원" <?php echo e($_GET['selectArea']=="강원" ? 'selected' : ''); ?>>강원</option>
                                      <option  value="부산" <?php echo e($_GET['selectArea']=="부산" ? 'selected' : ''); ?>>부산</option>
                                      <option  value="울산" <?php echo e($_GET['selectArea']=="울산" ? 'selected' : ''); ?>>울산</option>
                                      <option  value="경남" <?php echo e($_GET['selectArea']=="경남" ? 'selected' : ''); ?>>경남</option>
                                      <option  value="대구" <?php echo e($_GET['selectArea']=="대구" ? 'selected' : ''); ?>>대구</option>
                                      <option  value="경북" <?php echo e($_GET['selectArea']=="경북" ? 'selected' : ''); ?>>경북</option>
                                      <option  value="전주" <?php echo e($_GET['selectArea']=="전주" ? 'selected' : ''); ?>>전주</option>
                                      <option  value="전북" <?php echo e($_GET['selectArea']=="전북" ? 'selected' : ''); ?>>전북</option>
                                      <option  value="광주" <?php echo e($_GET['selectArea']=="광주" ? 'selected' : ''); ?>>광주</option>
                                      <option  value="전남" <?php echo e($_GET['selectArea']=="전남" ? 'selected' : ''); ?>>전남</option>
                                      <option  value="청주" <?php echo e($_GET['selectArea']=="청주" ? 'selected' : ''); ?>>청주</option>
                                      <option  value="충북" <?php echo e($_GET['selectArea']=="충북" ? 'selected' : ''); ?>>충북</option>
                                      <option  value="대전" <?php echo e($_GET['selectArea']=="대전" ? 'selected' : ''); ?>>대전</option>
                                      <option  value="충남" <?php echo e($_GET['selectArea']=="충남" ? 'selected' : ''); ?>>충남</option>
                                      <option  value="제주" <?php echo e($_GET['selectArea']=="제주" ? 'selected' : ''); ?>>제주</option>
                                </select>
		    	    </span>
			</div>
			<div>
			    <div style="width:70px; float:left;font-weight:bold;padding-top:5px;">경력선택:</div>
                            <span style="width:140px; ">
				<select class="form-control" style="width:140px;"  name="selectCareer">
				    <option value="">경력선택</option>
				    <option value="신입" <?php echo e($_GET['selectCareer']=="신입" ? 'selected' : ''); ?>>신입</option>
				    <option value="경력" <?php echo e($_GET['selectCareer']=="경력" ? 'selected' : ''); ?>>경력</option>
				    <option value="무관" <?php echo e($_GET['selectCareer']=="무관" ? 'selected' : ''); ?>>무관</option>
				</select>
			    </span>
			</div>
                        <div style="margin-top:15px;">
                            <div style="width:70px; float:left;font-weight:bold;padding-top:5px;">성별선택:</div>
                            <span style="width:140px; ">
                                <select class="form-control" style="width:140px;"  name="selectSex">
                                    <option value="">성별선택</option>
                                    <option value="남자" <?php echo e($_GET['selectSex']=="남자" ? 'selected' : ''); ?>>남자</option>
                                    <option value="여자" <?php echo e($_GET['selectSex']=="여자" ? 'selected' : ''); ?>>여자</option>
                                    <option value="무관" <?php echo e($_GET['selectSex']=="무관" ? 'selected' : ''); ?>>무관</option>
                                </select>
                            </span>
                        </div>
			<div style="margin-top:15px;">
			    <span style="width:70px; float:left;font-weight:bold;padding-top:5px;">검색어:</span>
                            <input value='<?php echo e($keyword); ?>'  type="search" class="searchForm small" name="inputKeyword" id="inputKeyword2"/>
                            <input type="submit" class="btn btn-primary" style="margin-top:2px;" value="검색"/>
			</div>
		    </form>
	    </div>
	    <table class="table table-striped">
		<thead>
		    <caption><h4><span style="color:#4876ef;"><?php echo e($keyword); ?></span> 채용공고 정보</h4></caption>
		</thead>
                <tbody>
		 <?php if(empty($data)): ?>
		    <tr>
			<td>
			    <h1>검색결과가 없습니다.</h1>
			</td>
		    </tr>
		 <?php else: ?>
                 <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td>
                            <table>
                                <tbody>
                                    <tr>
                                        <td>
                                            <h5 class="wrapSize4 head"><?php echo e($row['company']); ?></h5>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h4 class="wrapSize4"><a href="list-g/board?id=<?php echo e($row['order_id']); ?>" style="text-decoration:none;color:#333;font-weight:bold;"><?php echo e($row['title']); ?></a></h4>

                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <table>
                                <tbody style="line-height:10px">
                                    <tr>
                                        <th><p style="font-size:13px;letter-spacing:-1.2px;color:#999999;text-align:left;font-weight:normal;padding-right:30px;">근무지역</p></th>
                                        <td>
                                            <p style="font-size:13px;color:#666;letter-spacing:-1.2px;"><?php echo e($row['area']); ?></p>
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
		    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		    <?php endif; ?>
                </tbody>
            </table>

	</div>
    </div>
    <div class="row">
        <div style="text-align:center;">
            <ul class="pagination">
                <li class="page-item"><a class="page-link" href="<?php echo e($addr); ?>?inputKeyword=<?php echo e($keyword); ?>&selectArea=<?php echo e($_GET['selectArea']); ?>&selectCareer=<?php echo e($_GET['selectCareer']); ?>&selectSex=<?php echo e($_GET['selectSex']); ?>&id=">Previous</a></li>
                <?php for($i=$nav['startPage'];$i<$nav['endPage'];$i++): ?>
                        <?php if($nav['currentPage']==$i): ?>
                            <li class="page-item"><span class="page-link"><?php echo e($i+1); ?></span></li>
                        <?php else: ?>
                            <li class="page-item"><a class="page-link" href="<?php echo e($addr); ?>?inputKeyword=<?php echo e($keyword); ?>&selectArea=<?php echo e($_GET['selectArea']); ?>&selectCareer=<?php echo e($_GET['selectCareer']); ?>&selectSex=<?php echo e($_GET['selectSex']); ?>&id=<?php echo e($i); ?>"><?php echo e($i+1); ?></a></li>
                        <?php endif; ?>
                <?php endfor; ?>

                <?php if($nav['nextPage']==TRUE): ?>
                        <li class="page-item"><a class="page-link" href="<?php echo e($addr); ?>?inputKeyword=<?php echo e($keyword); ?>&selectArea=<?php echo e($_GET['selectArea']); ?>&selectCareer=<?php echo e($_GET['selectCareer']); ?>&selectSex=<?php echo e($_GET['selectSex']); ?>&id=<?php echo e($nav['endPage']); ?>">Next</a></li>
                <?php else: ?>
                        <li class="page-item"><span class="page-link">Next</span></li>
                <?php endif; ?>
            </ul>
        </div>
    </div>

</div>
<script>
        function searchKey2()
        {
                var keyword = document.getElementById('inputKeyword2');
                keyword.value = keyword.value.trim();
                if(keyword.value.length<2 && keyword.value.length > 0) {
                        alert('키워드는 최소 2글자 이상으로 입력해주세요.');
                        return false;
                }
        }
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout/search', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/Job-Site/view/search/search.blade.php ENDPATH**/ ?>