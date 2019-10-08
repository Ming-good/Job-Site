<?php $__env->startSection('Content'); ?>
<script type="text/javascript" src="//dapi.kakao.com/v2/maps/sdk.js?appkey=db316ffdfc1b88f64685de057f89dc94&libraries=services"></script>
<div class="container">
    <div class="wrap_board">
	<div class="col-md-offset-1 col-md-10">
	    <table class="table table-bordered">
		<thead>
		    <caption><h3>채용정보 상세보기</h3></caption>
		</thead>
		<tbody>
		    <tr>
			<td style="padding:0 30px 10px 30px;border-top: 2px solid #333">
			<table>
			    <tbody>
				<tr>
				    <td>
					<h4 style="padding:10px 0 0px;color:#6c6c6c;"><?php echo e($listData['company']); ?></h4>
				    </td>
				</tr>
				<tr>
				    <td>
					<h2 style="margin-top:0px;font-weight:bold;border-bottom: 1px solid #dfdfdf; color:#393f6d; padding:0px 0 30px; letter-spacing: -1.2px;"><?php echo e($listData['title']); ?></h2>
				    </td>
				</tr>
			    </tbody>
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
                                            		    <p class="font2"><?php echo e($listData['career']); ?></p>
                                        		</td>
                                    		    </tr>
						    <tr>
                                        		<th><p style="margin-bottom: 40px;font-size:14px;letter-spacing:-1.2px;color:#999999;text-align:left;font-weight:normal;padding-right:30px;">성별</p></th>
                                        		<td>
                                            		    <p style="margin-bottom: 40px;font-size:14px;color:#666;letter-spacing:-1.2px;"><?php echo e($listData['sex']); ?></p>
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
                                                            <p class="font2"><?php echo e($listData['hiring']); ?></p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th><p style="font-size:14px;letter-spacing:-1.2px;color:#999999;text-align:left;font-weight:normal;padding-right:30px;">급여조건</p></th>
                                                        <td>
                                                            <p class="font2"><?php echo e($listData['salary']); ?>&nbsp;&nbsp;<?php echo e($listData['money']); ?></p>
							</td>
						    </tr>
                                                    <tr>
                                                        <th><p style="font-size:14px;letter-spacing:-1.2px;color:#999999;text-align:left;font-weight:normal;padding-right:30px;">근무지역</p></th>
                                                        <td>
                                                            <p class="font2"><?php echo e($listData['area']); ?></p>
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
<?php if($_SESSION['authority'] != 'e'): ?>
	<button id="apply" class="btnA blue big" style="position:relative;left:50%;margin-left:-200px;margin-bottom:40px;margin-top:10px;text-decoration:none;">온라인 지원</button>
	<button id="scrap"  class="btnA white" style="position:relative;left:50%;margin-left:-0px;margin-bottom:40px;margin-top:10px;text-decoration:none;">&nbsp스크랩&nbsp&nbsp<span class="star">☆</span></button>
<?php endif; ?>
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
			<th style="background-color:#f9f9f9;width:100px;"><p class="font1" >담당자</p></th>
			<td style="background-color:#ffffff;">
			    <p class="font2"><?php echo e($userData['name']); ?></p>
			</td>
		    </tr>
                    <tr>
			<th style="background-color:#f9f9f9;width:100px;"><p class="font1">연락처</p></th>
			<td style="background-color:#ffffff;">
			    <p class="font2"><?php echo e($userData['mobile']); ?></p>
			</td>
		    </tr>
                    <tr>
			<th style="background-color:#f9f9f9;width:100px;"><p class="font1">이메일</p></th>
			<td style="background-color:#ffffff;">
			    <p class="font2"><?php echo e($userData['email']); ?></p>
			</td>
		    </tr>
		    <?php if(!empty($map[0])): ?>
		        <tr>
			    <td colspan='2'>
			        <div id="map" style="width:100%;height:400px;"></div>
			    </td>
		        </tr>
		    <?php endif; ?>
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
			    <div style="text-align:center;" id='image'>
				<img src="/Job-Site/assets/upload/<?php echo e($listData['image']); ?>" style="max-width: 100%; height: auto;" alt=''/>
			    </div>
			    <div style="white-space:pre"><?php echo e($listData['comment']); ?></div>
			</td>
		    </tr>
		</tbody>
	    </table>
	</div>
    </div>
</div>

<script>
$(document).ready(function(){
	var success = "<?php echo e($answer['success']); ?>";

	if(success == 1) {
		$('.star').html('★');
		$('.star').css('color','#ffe372');
	}


	$('#apply').click(function(){
		if("<?php echo e($_SESSION['authority']); ?>" == 'u' && "<?php echo e($bool); ?>" == true) {
            		//팝업창 위치
            		var _width='600';
            		var _height='800';
            		var _left = Math.ceil(( window.screen.width - _width )/2);
            		var _top = -Math.ceil(( window.screen.width - _height )/2);

            		url = "apply?id=<?php echo e($_GET['id']); ?>";
            		openWin=window.open(url, "chkid", 'width='+ _width +', height='+ _height +', left=' + _left + ', top='+ _top);
		} else if("<?php echo e($_SESSION['authority']); ?>" == 'u' && "<?php echo e($bool); ?>" == false) {
			alert('이미 입사지원하신 구직정보 입니다.');
		} else {
			if(confirm('개인회원 전용 서비스입니다.\n로그인 창으로 이동하시겠습니까?')) {

				window.location.href="/Job-Site/login";
			}
		}
	});

	$('#scrap').click(function(){
		if("<?php echo e($_SESSION['authority']); ?>" == 'u') {
		    var inputURL = "/Job-Site/scrap/create";
		    var delURL = "/Job-Site/scrap/del";

		    $.ajax({
		    url:(success == 1) ? delURL : inputURL,
			type:"post",
			data:{
				'title':"<?php echo e($listData['title']); ?>",
				'id':'<?php echo e($_GET["id"]); ?>',
				'_token':"<?php echo e($_SESSION['token']); ?>"
			},
			success:function(data) {
			    success = data;
			    
			    if(data == 1) {
			        $('.star').html('★');
			        $('.star').css('color','#ffe372');
			    } else {
				$('.star').html('☆');
				$('.star').css('color','rgba(140, 140, 140, 1);');
			    }
			}
		    });
		} else { 
                        if(confirm('개인회원 전용 서비스입니다.\n로그인 창으로 이동하시겠습니까?')) {
                                window.location.href="/Job-Site/login";
                        }
		}
	});
});
</script>
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
var coords = new kakao.maps.LatLng(<?php echo e($map[1]); ?>, <?php echo e($map[0]); ?>);
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
map.setZoomable(<?php echo e($map[2]); ?>); 
map.setDraggable(<?php echo e($map[3]); ?>);

</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout/layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/Job-Site/view/enterprise/jobBoard.blade.php ENDPATH**/ ?>