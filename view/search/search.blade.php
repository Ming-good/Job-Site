@extends('layout/search')

@section('home')

<div class="container">
    <div class="row">
	<div class="col-sm-12">
            <h3><span style="font-weight:bold;">채용공고 상세검색</span></h3>
	    <div style="border-top:2px solid;border-left:1px solid #dfdfdf;border-right:1px solid #dfdfdf;padding:30px 30px 30px 30px;">
		    <form method="GET" action="allList">
			<div class="selectSpan">
			    <span style="width:70px; float:left;font-weight:bold;padding-top:5px;">지역선택:</span>
			    <span style="width:140px;">
			        <select class="form-control" style="width:140px;"  name="selectArea">
                                      <option  value="">지역선택</option>
                                      <option  value="서울" {{$_GET['selectArea']=="서울" ? 'selected' : ''}}>서울</option>
                                      <option  value="경기" {{$_GET['selectArea']=="경기" ? 'selected' : ''}}>경기</option>
                                      <option  value="인천" {{$_GET['selectArea']=="인천" ? 'selected' : ''}}>인천</option>
                                      <option  value="부천" {{$_GET['selectArea']=="부천" ? 'selected' : ''}}>부천</option>
                                      <option  value="춘천" {{$_GET['selectArea']=="춘천" ? 'selected' : ''}}>춘천</option>
                                      <option  value="강원" {{$_GET['selectArea']=="강원" ? 'selected' : ''}}>강원</option>
                                      <option  value="부산" {{$_GET['selectArea']=="부산" ? 'selected' : ''}}>부산</option>
                                      <option  value="울산" {{$_GET['selectArea']=="울산" ? 'selected' : ''}}>울산</option>
                                      <option  value="경남" {{$_GET['selectArea']=="경남" ? 'selected' : ''}}>경남</option>
                                      <option  value="대구" {{$_GET['selectArea']=="대구" ? 'selected' : ''}}>대구</option>
                                      <option  value="경북" {{$_GET['selectArea']=="경북" ? 'selected' : ''}}>경북</option>
                                      <option  value="전주" {{$_GET['selectArea']=="전주" ? 'selected' : ''}}>전주</option>
                                      <option  value="전북" {{$_GET['selectArea']=="전북" ? 'selected' : ''}}>전북</option>
                                      <option  value="광주" {{$_GET['selectArea']=="광주" ? 'selected' : ''}}>광주</option>
                                      <option  value="전남" {{$_GET['selectArea']=="전남" ? 'selected' : ''}}>전남</option>
                                      <option  value="청주" {{$_GET['selectArea']=="청주" ? 'selected' : ''}}>청주</option>
                                      <option  value="충북" {{$_GET['selectArea']=="충북" ? 'selected' : ''}}>충북</option>
                                      <option  value="대전" {{$_GET['selectArea']=="대전" ? 'selected' : ''}}>대전</option>
                                      <option  value="충남" {{$_GET['selectArea']=="충남" ? 'selected' : ''}}>충남</option>
                                      <option  value="제주" {{$_GET['selectArea']=="제주" ? 'selected' : ''}}>제주</option>
                                </select>
		    	    </span>
			</div>
			<div>
			    <div style="width:70px; float:left;font-weight:bold;padding-top:5px;">경력선택:</div>
                            <span style="width:140px; ">
				<select class="form-control" style="width:140px;"  name="selectCareer">
				    <option value="">경력선택</option>
				    <option value="신입" {{$_GET['selectCareer']=="신입" ? 'selected' : ''}}>신입</option>
				    <option value="경력" {{$_GET['selectCareer']=="경력" ? 'selected' : ''}}>경력</option>
				    <option value="무관" {{$_GET['selectCareer']=="무관" ? 'selected' : ''}}>무관</option>
				</select>
			    </span>
			</div>
                        <div style="margin-top:15px;">
                            <div style="width:70px; float:left;font-weight:bold;padding-top:5px;">성별선택:</div>
                            <span style="width:140px; ">
                                <select class="form-control" style="width:140px;"  name="selectSex">
                                    <option value="">성별선택</option>
                                    <option value="남자" {{$_GET['selectSex']=="남자" ? 'selected' : ''}}>남자</option>
                                    <option value="여자" {{$_GET['selectSex']=="여자" ? 'selected' : ''}}>여자</option>
                                    <option value="무관" {{$_GET['selectSex']=="무관" ? 'selected' : ''}}>무관</option>
                                </select>
                            </span>
                        </div>
			<div style="margin-top:15px;">
			    <span style="width:70px; float:left;font-weight:bold;padding-top:5px;">검색어:</span>
                            <input value='{{$keyword}}'  type="search" class="searchForm small" name="inputKeyword" id="inputKeyword"/>
                            <input type="submit" class="btn btn-primary" style="margin-top:2px;" value="검색"/>
			</div>
		    </form>
	    </div>
	    <table class="table table-striped">
		<thead>
		    <caption><h4><span style="color:#4876ef;">{{$keyword}}</span> 채용공고 정보</h4></caption>
		</thead>
                <tbody>
                 @foreach($data as $row)
                    <tr>
                        <td>
                            <table>
                                <tbody>
                                    <tr>
                                        <td>
                                            <h5 style="letter-spacing:-1.2px;">{{$row['company']}}</h5>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h4 style="margin-top:0px;font-size:16px;letter-spacing:-1.2px;padding-bottom:15px;overflow:hidden;height:32px;"><a href="list-g/board?id={{$row['order_id']}}" style="text-decoration:none;color:#333;font-weight:bold;">{{$row['title']}}</a></h4>

                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <table>
                                <tbody style="line-height:10px">
                                    <tr>
                                        <th><p style="font-size:13px;letter-spacing:-1.2px;color:#999999;text-align:left;font-weight:normal;padding-right:30px;">근무지역</p></th>
                                        <td>
                                            <p style="font-size:13px;color:#666;letter-spacing:-1.2px;">{{$row['area']}}</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th><p style="font-size:13px;letter-spacing:-1.2px;color:#999999;text-align:left;font-weight:normal;padding-right:30px;">급여</p></th>
                                        <td>
                                            <p style="font-size:13px;color:#666;letter-spacing:-1.2px;">{{$row['salary']}}&nbsp;&nbsp;{{$row['money']}}</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th><p style="font-size:13px;letter-spacing:-1.2px;color:#999999;text-align:left;font-weight:normal;padding-right:30px;">경력</p></th>
                                        <td>
                                            <p style="font-size:13px;color:#666;letter-spacing:-1.2px;">{{$row['career']}}</p>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                        <td class="wrapSize">
                            <div style="padding:35px 10px 20px 10px;line-height:24px;">
                                <p style="font-size:13px;color:#666;letter-spacing:-1.2px;">등록일 : {{$row['created']}}</p>
                                <p style="font-size:13px;color:#666;letter-spacing:-1.2px;">수정일 : {{$row['modify']}}</p>
                            </div>
                        </td>
                    </tr>
		    @endforeach
                </tbody>
            </table>

	</div>
    </div>
    <div class="row">
        <div style="text-align:center;">
            <ul class="pagination">
                <li class="page-item"><a class="page-link" href="{{$addr}}?inputKeyword={{$keyword}}&selectArea={{$_GET['selectArea']}}&selectCareer={{$_GET['selectCareer']}}&selectSex={{$_GET['selectSex']}}&id=">Previous</a></li>
                @for($i=$nav['startPage'];$i<$nav['endPage'];$i++)
                        @if($nav['currentPage']==$i)
                            <li class="page-item"><span class="page-link">{{$i+1}}</span></li>
                        @else
                            <li class="page-item"><a class="page-link" href="{{$addr}}?inputKeyword={{$keyword}}&selectArea={{$_GET['selectArea']}}&selectCareer={{$_GET['selectCareer']}}&selectSex={{$_GET['selectSex']}}&id={{$i}}">{{$i+1}}</a></li>
                        @endif
                @endfor

                @if($nav['nextPage']==TRUE)
                        <li class="page-item"><a class="page-link" href="{{$addr}}?inputKeyword={{$keyword}}&selectArea={{$_GET['selectArea']}}&selectCareer={{$_GET['selectCareer']}}&selectSex={{$_GET['selectSex']}}&id={{$nav['endPage']}}">Next</a></li>
                @else
                        <li class="page-item"><span class="page-link">Next</span></li>
                @endif
            </ul>
        </div>
    </div>

</div>
@stop
