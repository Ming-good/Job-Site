<!DOCTYPE html>
<html>
<head>
    <title>map</title>
<meta charset="utf-8">
<!-- 합쳐지고 최소화된 최신 CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css//bootstrap.min.css">

<!-- 부가적인 테마 -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">

<!-- 합쳐지고 최소화된 최신 자바스크립트 -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
<script type="text/javascript" src="//dapi.kakao.com/v2/maps/sdk.js?appkey=db316ffdfc1b88f64685de057f89dc94&libraries=services"></script>

</head>
<body>

<div style="height:60px;vertical-align:middle; background-color:#555;"><p style="text-align:center;padding-top:20px;font-weight:bold;color:#fff;font-size:20px;">카카오 지도 삽입</p></div>
        <form method="GET" class="form-inline" onsubmit="return dataSubmit();">
    	    <table class="table table-bordered">
		<tbody>
	    	    <tr>
			<th style="padding-top:15px;;letter-spacing:-1.2px;width:100px; background-color:#f9f9f9;">주소검색</th>
	    		<td>
			    <input style="width:200px;float:left;" type="text" class="form-control" placeholder="주소 입력" id="keyword" size="15">
			    <input type="submit" id="keyword" class="btn btn-primary" value="검색" onclick="searchPlaces(); return false;"/>
			 	 
			</td>
			</tr>
			<tr>
			    <th style="padding-top:15px;;letter-spacing:-1.2px; background-color:#f9f9f9;">옵션</th>
			    <td>
			        <table>
				    <tbody>
				        <tr>
					    <td>
					        <input type="checkbox" id='zoom'  checked>줌기능
					    </td>
				        </tr>
				        <tr>
					    <td>
					         <input type="checkbox" id='drag'  checked>드래그기능
					    </td>
				        </tr>
				    </tbody>
			        </table>
			    </td>
	    	        </tr>
		        <tr>
			    <td colspan='2'>
			        <div id="map" style="width:500px;height:400px;margin-left:13%; margin-right:13%;"></div>
			    </td>
		        </tr>
		        <tr>
			    <td colspan='2' style="text-align:center;">
			        <input class="btn btn-primary btn-xs" type="submit" value="저장">
			        <input class="btn btn-primary btn-xs" type="button" value="취소" onclick="shotdown();">
		            </td>
		        </tr>
		    </tbody>
    	        </table>
	    </form>



<script>
//좌표
var x;
var y;

var mapContainer = document.getElementById('map'), // 지도를 표시할 div
    mapOption = {
        center: new kakao.maps.LatLng(37.566826005485716, 126.9786567859313), // 지도의 중심좌표
        level: 3 // 지도의 확대 레벨
    };

// 지도를 생성합니다
var map = new kakao.maps.Map(mapContainer, mapOption);

// 주소-좌표 변환 객체를 생성합니다
var geocoder = new kakao.maps.services.Geocoder();

// 인포윈도우로 장소에 대한 설명을 표시합니다
var infowindow = new kakao.maps.InfoWindow();

var marker = new kakao.maps.Marker();

function searchPlaces() {

    var keyword = document.getElementById('keyword').value;

    if (!keyword.replace(/^\s+|\s+$/g, '')) {
        alert('키워드를 입력해주세요!');
        return false;
    }

// 주소로 좌표를 검색합니다
geocoder.addressSearch(keyword, function(result, status) {

    // 정상적으로 검색이 완료됐으면
     if (status === kakao.maps.services.Status.OK) {

        marker.setMap(null);
        infowindow.close();
        var coords = new kakao.maps.LatLng(result[0].y, result[0].x);
                // 결과값으로 받은 위치를 마커로 표시합니다

        marker = new kakao.maps.Marker({
            map:map ,
            position: coords
                });
        infowindow = new kakao.maps.InfoWindow({
        content: '<div style="width:150px;text-align:center;padding:6px 0;">'+result[0].address.address_name+'</div>'
});
        infowindow.open(map, marker);
        // 지도의 중심을 결과값으로 받은 위치로 이동시킵니다
        map.setCenter(coords);

	y = result[0].y; 
	x = result[0].x;
    }
})
}

function shotdown()
{
	 window.parent.childShotdown();
}

function dataSubmit()
{
	var zoom = document.getElementById('zoom');
	var drag = document.getElementById('drag');
	var zChk1 =  zoom.checked;
	var dChk2 = drag.checked;

	if(zChk1) {
		zoom = true;
	} else {
		zoom = false;
	}

	if(dChk2) {
		drag = true;
	} else {
		drag = false;
	}

	var data = [x,y, zoom, drag];

	for(i=0 ; i<2 ; i++) {
		if(!data[i]) {
			alert('주소를 검색해주세요');
			return false;	
		} 
		
	}
	window.parent.mapInfo(data);
}
</script>
</body>
</html>

<?php /**PATH /var/www/html/Job-Site/view/enterprise/map.blade.php ENDPATH**/ ?>