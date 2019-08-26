@extends('layout/layout')
@section('Content')
<div class="container">
    <div class="row">
	<div class="col-md-offset-1 col-md-10">
	    <table class="table table-bordered">
		<thead>
		    <caption><h3>채용정보 상세보기</h3></caption>
		</thead>
		<tbody>
		    <tr>
			<td style="padding:0 30px 10px 30px;border-top: 2px solid #333">
			<h2 style="font-weight:bold;border-bottom: 1px solid #dfdfdf; color:#393f6d; padding:10px 0 30px; letter-spacing: -1.2px;">{{$listData['title']}}</h2>
			    <table>
				<tbody>
				    <tr>
					<td style="padding-right:100px;">
					    <table>
						<tbody>
				    		    <tr>
							<th><h4 style="color:#6c6c6c;">자격요건</h4></th>
				    		    </tr>
                                    		    <tr>
                                        		<th><p style="font-size:14px;letter-spacing:-1.2px;color:#999999;text-align:left;font-weight:normal;padding-right:30px;">경력</p></th>
                                        		<td>
                                            		    <p style="font-size:14px;color:#666;letter-spacing:-1.2px;">{{$listData['career']}}</p>
                                        		</td>
                                    		    </tr>
						    <tr>
                                        		<th><p style="margin-bottom: 40px;font-size:14px;letter-spacing:-1.2px;color:#999999;text-align:left;font-weight:normal;padding-right:30px;">성별</p></th>
                                        		<td>
                                            		    <p style="margin-bottom: 40px;font-size:14px;color:#666;letter-spacing:-1.2px;">{{$listData['sex']}}</p>
                                        		</td>
				    		    </tr>
						</tbody>
					    </table>
					</td>
					<td>
					    <table>
						<tbody>
						    <tr>
                                                        <th><h4 style="color:#6c6c6c;">근무환경</h4></th>
                                                    </tr>
                                                    <tr>
                                                        <th><p style="font-size:14px;letter-spacing:-1.2px;color:#999999;text-align:left;font-weight:normal;padding-right:30px;">고용형태</p></th>
                                                        <td>
                                                            <p style="font-size:14px;color:#666;letter-spacing:-1.2px;">{{$listData['hiring']}}</p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th><p style="font-size:14px;letter-spacing:-1.2px;color:#999999;text-align:left;font-weight:normal;padding-right:30px;">급여조건</p></th>
                                                        <td>
                                                            <p style="font-size:14px;color:#666;letter-spacing:-1.2px;">{{$listData['salary']}}&nbsp;&nbsp;{{$listData['money']}}</p>
							</td>
						    </tr>
                                                    <tr>
                                                        <th><p style="font-size:14px;letter-spacing:-1.2px;color:#999999;text-align:left;font-weight:normal;padding-right:30px;">근무지역</p></th>
                                                        <td>
                                                            <p style="font-size:14px;color:#666;letter-spacing:-1.2px;">{{$listData['area']}}</p>
							</td>
						    </tr>

						</tbody>
					    </table>
					</td>
				    </tr>
				</tbody>
	 		    </table>
			</td>
		    </tr>
		</tbody>
	    </table>
	</div>
    </div>


    <div class="row">
	<div class="col-md-offset-1 col-md-10">
            <table class="table table-striped">
                <thead>
                    <caption><h4 style="font-weight:bold;">| 담당자 정보</h4></caption>
                </thead>
                <tbody>
                    <tr>
			<th style="background-color:#f9f9f9;width:100px;"><p style="font-size:14px;letter-spacing:-1.2px;color:#999999;text-align:left;font-weight:normal;">담당자</p></th>
			<td style="background-color:#ffffff;">
			    <p style="font-size:14px;color:#666;letter-spacing:-1.2px;">{{$userData['name']}}</p>
			</td>
		    </tr>
                    <tr>
			<th style="background-color:#f9f9f9;width:100px;"><p style="font-size:14px;letter-spacing:-1.2px;color:#999999;text-align:left;font-weight:normal;">연락처</p></th>
			<td style="background-color:#ffffff;">
			    <p style="font-size:14px;color:#666;letter-spacing:-1.2px;">{{$userData['mobile']}}</p>
			</td>
		    </tr>
                    <tr>
			<th style="background-color:#f9f9f9;width:100px;"><p style="font-size:14px;letter-spacing:-1.2px;color:#999999;text-align:left;font-weight:normal;">이메일</p></th>
			<td style="background-color:#ffffff;">
			    <p style="font-size:14px;color:#666;letter-spacing:-1.2px;">{{$userData['email']}}</p>
			</td>
		    </tr>
		</tbody>
	    </table>
	</div>
    </div>

    <div class="row">
	<div class="col-md-offset-1 col-md-10">
            <table class="table table-bordered">
                <thead>
                    <caption><h4 style="font-weight:bold;">| 상세 정보</h4></caption>
                </thead>
                <tbody>	
		    <tr>
			<td>
			    <div>
				<img src="/Job-Site/assets/upload/{{$listData['image']}}" style="max-width: 100%; height: auto;" alt=''/>
			    </div>
			    <div style="white-space:pre">{{$listData['comment']}}</div>
			</td>
		    </tr>
		</tbody>
	    </table>
	</div>
    </div>
</div>
@stop
