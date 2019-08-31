@extends('layout/layout')
@section('Content')
<script type="text/javascript" src="//dapi.kakao.com/v2/maps/sdk.js?appkey=db316ffdfc1b88f64685de057f89dc94&libraries=services"></script>
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
		    @if(!empty($map[0]))
		        <tr>
			    <td colspan='2'>
			        <div id="map" style="width:100%;height:400px;"></div>
			    </td>
		        </tr>
		    @endif
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
			    <div style="text-align:center;">
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
<script>
// 마우스 휠로 지도 확대,축소 가능여부를 설정합니다
var mapContainer = document.getElementById('map'), // 지도를 표시할 div
    mapOption = {
        center: new kakao.maps.LatLng(33.450701, 126.570667), // 지도의 중심좌표
        level: 3 // 지도의 확대 레벨
    };

// 지도를 생성합니다
var map = new kakao.maps.Map(mapContainer, mapOption);


var geocoder = new kakao.maps.services.Geocoder();
var coords = new kakao.maps.LatLng({{$map[1]}}, {{$map[0]}});
var callback = function(result, status) {
    if (status === kakao.maps.services.Status.OK) {
                var marker = new kakao.maps.Marker({
            map: map,
            position: coords
        });

        // 인포윈도우로 장소에 대한 설명을 표시합니다
        var infowindow = new kakao.maps.InfoWindow({
            content: '<div style="width:150px;text-align:center;padding:6px 0;">' + result[0].road_address.address_name + '</div>'
        });
        infowindow.open(map, marker);

        // 지도의 중심을 결과값으로 받은 위치로 이동시킵니다
        map.setCenter(coords);
    }
};

geocoder.coord2Address(coords.getLng(), coords.getLat(), callback);

//줌기능, 드래그기능 가능여부
map.setZoomable({{$map[2]}}); 
map.setDraggable({{$map[3]}});

</script>
@stop
