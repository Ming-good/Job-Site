@extends('layout/layout')
@section('Content')
<link rel="stylesheet" href="/Job-Site/assets/css/resume.css"/>
<div class="container">
    <div class="row">
	<div class="col-md-offset-1 col-md-10">
	    <h1>이력서 관리</h1>
	    <table class="table table-hover">
		<thead>
		    <tr>
			<th style="text-align:center;width:700px;">
			    <p>이력서제목</p>
			</th>
			<th colspan="2" style="text-align:center;">
			    <p class="wrapSize3">이력서관리</p>
			</th>
		    </tr>
		</thead>
		<tbody>
		@foreach($data as $row)
		    <tr>
			<td>
			    <h4 class="wrapSize2 resume"><a style="margin-left:30px;font-weight:bold;" href="view?no={{$row['order_id']}}">{{$row['title']}}</a></h4>
			    <p style="margin-left:30px;;color:#999;font-size:12px;">{{$row['created']}}</p>
			</td>
			<td style="width:100px">
                            <a class="btnA blue less" href="/Job-Site/resume?no={{$row['order_id']}}&mode=modify" style="float:right;text-decoration:none;">수정</a>
			</td>
			<td style="width:100px">
			    <a class="btnA blue less" href="javascript:del('/Job-Site/resume/destroy?no={{$row['order_id']}}')"style="text-decoration:none;">삭제</a>
			</td>
		    </tr>
		@endforeach
		</tbody>
	    </table>
	    <button id="btn" type="button" style="float:right" class="button3">이력서 등록</button>
	</div>
    </div>
</div>
<script>
	function del(location) {
		var result = confirm('삭제하시겠습니까?');
		if(result) {
                        $.ajax({
                                url:location,
                                type:"post",
                                data:{_token:"{{$_SESSION['token']}}"},
                                success:function(){
                                        window.location.reload();
                                }
                        })

			return true;
		} else {
			return false;
		}
	}
$(document).ready(function(){
        $('#btn').click(function(){
                window.location.href ="/Job-Site/resume";
        })
})

</script>
@stop
