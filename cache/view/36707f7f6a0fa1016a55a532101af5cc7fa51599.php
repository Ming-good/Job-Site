<?php $__env->startSection('Content'); ?>
<div class="container">
    <div class="row">
	<div class="col-sm-offset-2 col-sm-8">
	    <h2>채용공고</h2>
        	<form name="form" action="jobOpening/register" method="post" encType="multipart/form-data" onsubmit = "return datasubmit();">
                <div class="form-group">
                    <input type="text" class="form-control" name="inputTitle" id="title" placeholder="타이틀을 입력해주세요.">
                </div>
	        <table class="table table-striped">
    	            <thead>
        	        <caption><h3>기본정보</h3> </caption>
    	            </thead>
    		    <tbody>
			<tr>
			    <th>업종선택: </th>
			<td>
			<table>
			    <tbody>
			       <tr>
			           <td style="width:200px;">
				       <select class="form-control"  name="category1" onchange="setCategory()">
				           <option value="">-1차 직종선택-</option>
				           <option value="IT정보통신">IT정보통신</option>
				           <option value="전문직,특수직">전문직,특수직</option>
				       </select>
			          </td>
			          <td style="width:200px;">
				      <select class="form-control"  name="category2">
				          <option value="">-2차 직종선택-</option>
				      </select>
			          </td>
			       </tr>
			    </tbody>
			</table>
			   <td>
			</tr>
			<tr>
			    <th>고용형태:</th>
			    <td>
                		<input type="radio" name="radioHire" id="radio-1" class="custom-control-input" checked="checked" value="정규직">
                		<label class="custom-control-label" for="radio-1">정규직&nbsp;&nbsp;&nbsp;</label>
                		<input type="radio" name="radioHire" id="radio-1" class="custom-control-input"  value="계약직">
                		<label class="custom-control-label" for="radio-1">계약직&nbsp;&nbsp;&nbsp;</label>
                		<input type="radio" name="radioHire" id="radio-1" class="custom-control-input"  value="인턴직">
                		<label class="custom-control-label" for="radio-1">인턴직&nbsp;&nbsp;&nbsp;</label>
			    </td>
			</tr>
            		<tr>
			    <th>기업형태:</th>
	    		    <td>
                		<input type="radio" name="radioShape" id="shape-1" class="custom-control-input" checked="checked" value="대기업">
                		<label class="custom-control-label" for="shape-1">대기업&nbsp;&nbsp;&nbsp;</label>
                		<input type="radio" name="radioShape" id="shape-2" class="custom-control-input" value="중소기업">
                		<label class="custom-control-label" for="shape-2">중소기업&nbsp;&nbsp;&nbsp;</label>
                		<input type="radio" name="radioShape" id="shape-3" class="custom-control-input" value="벤처기업">
                		<label class="custom-control-label" for="shape-3">벤처기업</label>
                		<input type="radio" name="radioShape" id="shape-4" class="custom-control-input" value="공기업">
                		<label class="custom-control-label" for="shape-4">공기업</label>
                		<input type="radio" name="radioShape" id="shape-5" class="custom-control-input" value="기타">
                		<label class="custom-control-label" for="shape-5">기타</label>
	    		    </td>
            		</tr>
			<tr>
			    <th>급여:</th>
			    <td>
                                <table>
			           <tbody>
				       <tr>
                                           <td style="width:140px;">
                                               <select class="form-control" style="width:140px;"  name="selectSalary">
                                                   <option value="">-타입 선택-</option>
						   <option value="면접후 결정">면접후 결정</option>
                                                   <option value="시급">시급</option>
                                                   <option value="일급">일급</option>
                                                   <option value="주급">주급</option>
                                                   <option value="월급">월급</option>
                                               </select>
                                           </td>
				           <td>
					       <div><input class="form-control" style="width:100px;" name="inputMoney" type="text"></div>
					    
				           </td>
				           <td>
				               <strong>원</strong>
				           </td>
			            </tbody>
		                </table>
			        <p style="clear:both; color:#999; letter-spacing:-1px; line-height:18px; padding-top:10px;">금액입력 (만)원 단위 글자를 포함해서 작성하여 주세요. (예: 2400~3600만원)</p>
			    </td>
			</tr>
			<tr>
			    <th>근무지역:</th>
			    <td>
                            <table>
                               <tbody>
                                   <tr>
                                       <td style="width:140px;">
                                           <select class="form-control" style="width:140px;"  name="selectArea">
						<option  value="">지역선택</option> 
                				<option  value="서울">서울</option> 
                				<option  value="경기">경기</option> 
                				<option  value="인천">인천</option> 
                				<option  value="부천">부천</option> 
                				<option  value="춘천">춘천</option> 
                				<option  value="강원">강원</option> 
                				<option  value="부산">부산</option> 
                				<option  value="울산">울산</option> 
                				<option  value="경남">경남</option> 
                				<option  value="대구">대구</option> 
                				<option  value="경북">경북</option> 
                				<option  value="전주">전주</option> 
                				<option  value="전북">전북</option> 
                				<option  value="광주">광주</option> 
                				<option  value="전남">전남</option> 
                				<option  value="청주">청주</option> 
                				<option  value="충북">충북</option> 
                				<option  value="대전">대전</option> 
                				<option  value="충남">충남</option> 
                				<option  value="제주">제주</option> 
                                           </select>
                                       </td>
                                    </tr>
                                </tboty>
                            </table>			    
			    </td>
			</tr>
    		    </tbody>
	        </table>


	        <table class="table table-striped">
    	            <thead>
        	        <caption><h3>지원자격</h3> </caption>
    	            </thead>
    		    <tbody>
            		<tr>
			    <th>성별:</th>
	    		    <td>
                		<input type="radio" name="radioSex" id="sex-1" class="custom-control-input" checked="checked" value="남자">
                		<label class="custom-control-label" for="sex-1">남자&nbsp;&nbsp;&nbsp;</label>
                		<input type="radio" name="radioSex" id="sex-2" class="custom-control-input" value="남자">
                		<label class="custom-control-label" for="sex-2">여자&nbsp;&nbsp;&nbsp;</label>
                		<input type="radio" name="radioSex" id="sex-3" class="custom-control-input" value="여자">
                		<label class="custom-control-label" for="sex-3">무관</label>
	    		    </td>
			</tr>
			<tr>
			    <th>경력사항:</th>
	    		    <td>
                		<input type="radio" name="radioCareer" id="career-1" class="custom-control-input" checked="checked" value="무관">
                		<label class="custom-control-label" for="career-1">무관&nbsp;&nbsp;&nbsp;</label>
                		<input type="radio" name="radioCareer" id="career-2" class="custom-control-input" value="신입">
                		<label class="custom-control-label" for="career-2">신입&nbsp;&nbsp;&nbsp;</label>
                		<input type="radio" name="radioCareer" id="career-3" class="custom-control-input" value="경력">
                		<label class="custom-control-label" for="career-3">경력</label>
	    		    </td>
            		</tr>
		</table>
		<table class="table">
		    <thead>
		        <caption><h3>상세정보 및 이미지 등록</h3> </caption>
		    </thead>
			<tr>
			    <td colspan='2'>
				<div class="filebox bs3-primary"> 
				    <label for="ex_file">이미지</label> 
				    <input type="file" name="userfile" id="ex_file"> 

				</div>
			        <iframe name="dhtmlframe" style="width: 100%;"></iframe>
				<TEXTAREA style="display:none;"  name="comment" ROWS="5"></TEXTAREA>
			    </td>
			</tr>
    		    </tbody>
	        </table>

                <input type="submit" value="등록"  class="btn btn-primary pull-right"/>
                <input type="button" value="글 목록으로" class="btn btn-primary btn-rounded  pull-left" onclick="javascript:location.href='home'"/>


            </form>
	</div>
    </div>
</div>




<script>
dhtmlframe.document.designMode = "On"


//1차, 2차 업종선택 함수
function setCategory()
{
	form=document.form;
	if(document.form.category1.value=='IT정보통신') {
		form.category2.length = 1;
		form.category2.options[1] = new Option("서버");
		form.category2.options[1].value = "서버";
		form.category2.options[2] = new Option("웹마스터");
		form.category2.options[2].value = "웹마스터";
		form.category2.options[3] = new Option("통신기술");
		form.category2.options[3].value = "통신기술";
	}

	if(document.form.category1.value=='전문직,특수직') {
		form.category2.length = 1;
		form.category2.options[1] = new Option("경영분석");
		form.category2.options[1].value = "경영분석";
	}


}

//편집툴바 함수 (명령어 실행과 폰트크기 조절)
function htmledit(excute,values)
{
        if(values==NULL)
        {
                dhtmlframe.document.execCommand(excute);
        }
        else
        {
                dhtmlframe.document.execCommand(excute,"",values);
        }
}

function datasubmit()
{
	var title = document.getElementById('title');	
	if(title.value=="") {
                 alert('제목을 입력해주세요');
                 form.inputTitle.focus();
                 return false;

	}

	//iframe에서 입력받은 데이터를texarea로 보냄
	var str = dhtmlframe.document.body.innerHTML;
	
	str = str.replace(/<div>/g, '\n');
	str = str.replace(/<\/div>/g, '');
        form.comment.value = str
}
</script>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout/layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/Job-Site/view/enterprise/register.blade.php ENDPATH**/ ?>