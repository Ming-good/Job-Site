@extends('layout/layout')
@section('Content')

<div class="container">
    <div class="wrap_board">
	<div class="col-sm-offset-2 col-sm-8">
	    <h2>채용공고</h2>
        	<form name="form" action="{{$mode=='modify' ? 'list-g/modify?id='.$_GET['id'] : 'jobOpening/register'}}" method="post" encType="multipart/form-data" onsubmit = "return datasubmit();">
                <div class="form-group">
                    <input type="text" class="form-control" name="inputTitle" id="title" placeholder="타이틀을 입력해주세요." value="{{$listData['title']}}">
                </div>
	        <table class="table table-striped">
    	            <thead>
        	        <caption><h3>기본정보</h3> </caption>
    	            </thead>
    		    <tbody>
			<tr>
			    <th style="width:80px;">업종선택: </th>
			<td>
			<table>
			    <tbody>
			       <tr>
			           <td>
				       <select id='job1' class="form-control" value="IT정보통신"  name="category1" onchange="setCategory()">
				           <option value="">-1차 직종선택-</option>
				           <option value="IT정보통신" {{$listData['job1']=="IT정보통신" ? 'selected' : ''}}>IT정보통신</option>
				           <option value="전문직,특수직" {{$listData['job1']=="전문직,특수직" ? 'selected' : ''}}>전문직,특수직</option>
				       </select>
			          </td>
			          <td>
				      <select id='job2' class="form-control"  name="category2">
				          <option value="">-2차 직종선택-</option>
				      </select>
			          </td>
			       </tr>
			    </tbody>
			</table>
			   <td>
			</tr>
			<tr>
			    <th style="width:80px;">고용형태:</th>
			    <td>
                		<input type="radio" name="radioHire" id="radio-1" class="custom-control-input" checked value="정규직">
                		<label class="custom-control-label" for="radio-1">정규직&nbsp;&nbsp;&nbsp;</label>
                		<input type="radio" name="radioHire" id="radio-1" class="custom-control-input" {{$listData['hiring']=='계약직' ? 'checked' : ''}} value="계약직">
                		<label class="custom-control-label" for="radio-1">계약직&nbsp;&nbsp;&nbsp;</label>
                		<input type="radio" name="radioHire" id="radio-1" class="custom-control-input" {{$listData['hiring']=='인턴직' ? 'checked' : ''}} value="인턴직">
                		<label class="custom-control-label" for="radio-1">인턴직&nbsp;&nbsp;&nbsp;</label>
			    </td>
			</tr>
            		<tr>
			    <th style="width:80px;">기업형태:</th>
	    		    <td>
                		<input type="radio" name="radioShape" id="shape-1" class="custom-control-input" checked value="대기업">
                		<label class="custom-control-label" for="shape-1">대기업&nbsp;&nbsp;&nbsp;</label>
                		<input type="radio" name="radioShape" id="shape-2" class="custom-control-input" {{$listData['shape']=='중소기업' ? 'checked' : ''}} value="중소기업">
                		<label class="custom-control-label" for="shape-2">중소기업&nbsp;&nbsp;&nbsp;</label>
                		<input type="radio" name="radioShape" id="shape-3" class="custom-control-input" {{$listData['shape']=='벤처기업' ? 'checked' : ''}} value="벤처기업">
                		<label class="custom-control-label" for="shape-3">벤처기업</label>
                		<input type="radio" name="radioShape" id="shape-4" class="custom-control-input" {{$listData['shape']=='공기업' ? 'checked' : ''}} value="공기업">
                		<label class="custom-control-label" for="shape-4">공기업</label>
                		<input type="radio" name="radioShape" id="shape-5" class="custom-control-input" {{$listData['shape']=='기타' ? 'checked' : ''}} value="기타">
                		<label class="custom-control-label" for="shape-5">기타</label>
	    		    </td>
            		</tr>
			<tr>
			    <th style="width:80px;">급여:</th>
			    <td>
                                <table>
			           <tbody>
				       <tr>
                                           <td style="width:140px;">
                                               <select class="form-control" style="width:140px;"  name="selectSalary">
                                                   <option value="">-타입 선택-</option>
						   <option value="면접후 결정" {{$listData['salary']== "면접후 결정" ? 'selected' : ''}}>면접후 결정</option>
                                                   <option value="시급" {{$listData['salary']=="시급" ? 'selected' : ''}}>시급</option>
                                                   <option value="일급" {{$listData['salary']=="일급" ? 'selected' : ''}}>일급</option>
                                                   <option value="주급" {{$listData['salary']=="주급" ? 'selected' : ''}}>주급</option>
                                                   <option value="월급" {{$listData['salary']=="월급" ? 'selected' : ''}}>월급</option>
                                               </select>
                                           </td>
				           <td>
					       <div><input value="{{$listData['money']}}" class="form-control" style="width:100px;" name="inputMoney" type="text"></div>
					    
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
			    <th style="width:80px;">근무지역:</th>
			    <td>
                            <table>
                               <tbody>
                                   <tr>
                                       <td style="width:140px;">
                                           <select class="form-control" style="width:140px;"  name="selectArea">
						<option  value="">지역선택</option> 
                				<option  value="서울" {{$listData['area']=="서울" ? 'selected' : ''}}>서울</option> 
                				<option  value="경기" {{$listData['area']=="경기" ? 'selected' : ''}}>경기</option> 
                				<option  value="인천" {{$listData['area']=="인천" ? 'selected' : ''}}>인천</option> 
                				<option  value="부천" {{$listData['area']=="부천" ? 'selected' : ''}}>부천</option> 
                				<option  value="춘천" {{$listData['area']=="춘천" ? 'selected' : ''}}>춘천</option> 
                				<option  value="강원" {{$listData['area']=="강원" ? 'selected' : ''}}>강원</option> 
                				<option  value="부산" {{$listData['area']=="부산" ? 'selected' : ''}}>부산</option> 
                				<option  value="울산" {{$listData['area']=="울산" ? 'selected' : ''}}>울산</option> 
                				<option  value="경남" {{$listData['area']=="경남" ? 'selected' : ''}}>경남</option> 
                				<option  value="대구" {{$listData['area']=="대구" ? 'selected' : ''}}>대구</option> 
                				<option  value="경북" {{$listData['area']=="경북" ? 'selected' : ''}}>경북</option> 
                				<option  value="전주" {{$listData['area']=="전주" ? 'selected' : ''}}>전주</option> 
                				<option  value="전북" {{$listData['area']=="전북" ? 'selected' : ''}}>전북</option> 
                				<option  value="광주" {{$listData['area']=="광주" ? 'selected' : ''}}>광주</option> 
                				<option  value="전남" {{$listData['area']=="전남" ? 'selected' : ''}}>전남</option> 
                				<option  value="청주" {{$listData['area']=="청주" ? 'selected' : ''}}>청주</option> 
                				<option  value="충북" {{$listData['area']=="충북" ? 'selected' : ''}}>충북</option> 
                				<option  value="대전" {{$listData['area']=="대전" ? 'selected' : ''}}>대전</option> 
                				<option  value="충남" {{$listData['area']=="충남" ? 'selected' : ''}}>충남</option> 
                				<option  value="제주" {{$listData['area']=="제주" ? 'selected' : ''}}>제주</option> 
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
                		<input type="radio" name="radioSex" id="sex-2" class="custom-control-input" value="여자" {{$listData['sex']=="여자" ? 'checked' : ''}}>
                		<label class="custom-control-label" for="sex-2">여자&nbsp;&nbsp;&nbsp;</label>
                		<input type="radio" name="radioSex" id="sex-3" class="custom-control-input" value="무관" {{$listData['sex']=="무관" ? 'checked' : ''}}>
                		<label class="custom-control-label" for="sex-3">무관</label>
	    		    </td>
			</tr>
			<tr>
			    <th>경력사항:</th>
	    		    <td>
                		<input type="radio" name="radioCareer" id="career-2" class="custom-control-input" checked='checked' value="신입">
                		<label class="custom-control-label" for="career-2">신입&nbsp;&nbsp;&nbsp;</label>
                		<input type="radio" name="radioCareer" id="career-3" class="custom-control-input" {{$listData['career']=="경력" ? 'checked' : ''}} value="경력">
                		<label class="custom-control-label" for="career-3">경력&nbsp;&nbsp;&nbsp;</label>
                		<input type="radio" name="radioCareer" id="career-1" class="custom-control-input" {{$listData['career']=="무관" ? 'checked' : ''}} value="무관">
                		<label class="custom-control-label" for="career-1">무관&nbsp;&nbsp;&nbsp;</label>
	    		    </td>
            		</tr>
		</table>
		<table class="table">
		    <thead>
		        <caption><h3>상세정보 및 이미지 등록</h3> </caption>
		    </thead>
			<tr>
			    <td colspan='2'>
				<div class="filebox bs3-primary" style="float:left;"> 
				    <label for="ex_file">이미지</label> 
				    <input type="file"  name="userfile" id="ex_file" > 

				</div>
				<input onclick="mapOpen();" type="button" class="btn btn-primary"  name="map" id="map" value="지도" > 

			        <iframe name="dhtmlframe"  style="height:450px;width: 100%;"></iframe>
				<TEXTAREA style="display:none;"  name="comment" ROWS="5">{{$listData['comment']}}</TEXTAREA>
				<textarea style="display:none;"  ROWS="5" name="mapInfo" id="mapInfo"></textarea>
			    </td>
			</tr>
    		    </tbody>
	        </table>

                <input type="submit" value="등록"  class="btn btn-primary pull-right"/>
                <input type="button" value="글 목록으로" class="btn btn-primary btn-rounded  pull-left" onclick="javascript:location.href='/Job-Site/list-g'"/>

		<input type="hidden" name="_token" value="{{$_SESSION['token']}}"/>

            </form>
	</div>
    </div>
</div>


<script>
dhtmlframe.document.designMode = "On"
setCategory();
select();
transform();

//이미지 미리보기
document.getElementById('ex_file').onchange = function() 
{
	//이미지 확장자 확인
	var fileName = document.getElementById('ex_file').value;
	fileName = fileName.split('.');

	var ext = fileName[fileName.length-1];
	ext = ext.toLowerCase();

	var findExt = ['jpg', 'png', 'gif'];
	var length = findExt.length;
	var bool = false;
	for(i=0 ; i<length ; i++) {
		if(ext.indexOf(findExt[i])==0) {
			bool = true;
		}
	}	
	if(!bool) {
		alert('확장자는 jpg, png, gif 만 사용해 주세요');
		return false;
	}

	var reader = new FileReader();
	reader.onload = function(e) 
	{        
		var img_tag = /<img(.*?)>/gi;

        	var str = dhtmlframe.document.body.innerHTML;
        	str = str.replace(img_tag, "");

		dhtmlframe.document.body.innerHTML = "<img id='image' style='max-width: 100%; height: auto;' alt=''/>"+str;
		dhtmlframe.document.getElementById('image').src = e.target.result;
	}
	reader.readAsDataURL(this.files[0]);
}
//데이터베이스에 정보를 iframe에디터로 옮김
function transform()
{
	var str = form.comment.value;
	var strAll = '';
	strArr = str.split('\n');
	length = strArr.length;
	for(i=0 ; i<length ; i++) {
		strAll = strAll+strArr[i]+'<br>';
	}
	dhtmlframe.document.body.innerHTML = "<img id='image' src='/Job-Site/assets/upload/{{$listData['image']}}' style='max-width: 100%; height: auto;' alt=''/><br>"+strAll;
}

function select(){
	  
	  var length = document.getElementById("job2").options.length;
	  
	  for(i = 0 ; i < length ; i ++){
		  if(document.getElementById("job2").options[i].value == "{{$listData['job2']}}"){
			  document.getElementById("job2").options[i].selected = true;
			  break;
		  }
	  }
	  
 } 
  

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


function datasubmit()
{
	var title = document.getElementById('title');	
	if(title.value=="") {
                 alert('제목을 입력해주세요');
                 form.inputTitle.focus();
                 return false;

	}

	//저장될 떄 이미지 태그 제거
	var img_tag = /<img(.*?)>/gi;

	//iframe에서 입력받은 데이터를texarea로 보냄
	var str = dhtmlframe.document.body.innerHTML;
	str = str.replace(img_tag, "");

	str = str.replace(/<div>|<br>/g, '\n');
	str = str.replace(/(<\/div>|<br\/>)/g, '');
        form.comment.value = str
}

//지도 팝업창
function mapOpen()
{
	//엘리먼트를 생성
	popup = document.createElement("div");
	popupContent = document.createElement("div");
	iframe = document.createElement("iframe");

	//iframe와 div블럭에 css 적용
	iframe.src = "/Job-Site/list-g/map";
	iframe.id = "view";
	popupContent.id = "popupContent";
	popup.id="popup";

	//popup < popupContent < iframe
	popup.appendChild(popupContent);
	popupContent.appendChild(iframe);
	document.body.appendChild(popup);


	//onclick시 클릭 대상이 popup이면 popup을 제거한다.
	window.onclick = function(e) { 
		if(e.target==popup){
			document.body.removeChild(popup);
		}
	}

}

function mapInfo(data)
{
	document.body.removeChild(popup);

	var mapInfo = document.getElementById('mapInfo');
	console.log(data[0]);
	for(i=0 ; i<data.length ; i++) {
		
		mapInfo.value = mapInfo.value+data[i]+'/';
		
	}


}

//카카오 맵 제거
function childShotdown()
{
	document.body.removeChild(popup);
}
</script>


@stop
