@extends('layout/layout')
@section('Content')
<link rel="stylesheet" href="/Job-Site/assets/css/resume.css"/>
<div class="container">
    <div class="row">
	<div class="col-md-offset-1 col-md-10">
	    <h2>스크랩</h2>
	    <table class="table table-hover">
		<thead>
		    <tr>
			<th style="text-align:center;width:700px;">
			    <p>제목</p>
			</th>
			<th  style="text-align:left;width:100px;">
			    <p class="wrapSize3">스크랩관리</p>
			</th>
		    </tr>
		</thead>
		<tbody>
		@foreach($data as $row)
		    <tr>
			<td>
			    <h4 class="wrapSize2 resume"><a style="margin-left:30px;font-weight:bold;" href="/Job-Site/list-g/board?id={{$row['opening_no']}}">{{$row['title']}}</a></h4>
			</td>
			<td style="width:100px">
			    <a class="btnA blue less" href="javascript:del('/Job-Site/scrap/del', {{$row['opening_no']}})"style="text-decoration:none;">삭제</a>
			</td>
		    </tr>
		@endforeach
		</tbody>
	    </table>
	</div>
    </div>
</div>
<script>
	function del(location, no) {
		var result = confirm('삭제하시겠습니까?');
		if(result) {
                        $.ajax({
                                url:location,
                                type:"post",
				data:{_token:"{{$_SESSION['token']}}",
				      id:no
				     },
                                success:function(){
                                        window.location.reload();
                                }
                        })

			return true;
		} else {
			return false;
		}
	}

</script>
@stop
