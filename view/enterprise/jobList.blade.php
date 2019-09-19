@extends('layout/layout')
@section('Content')
<div class="container">
    <div class="row">
	<div class="col-md-offset-1 col-md-10">
	    <table class="table">
		<thead>
		    <caption><h3>채용공고관리</h3> <a href="/Job-Site/jobOpening"><input class="btn btn-danger pull-right" type="button" value="채용공고 등록"/></a></caption>	
		</thead>
		<tbody>
		 @foreach($data as $row)
		    <tr>
			<td>
			    <table>
				<tbody>
				    <tr>
					<td>
			    		    <h5 style="letter-spacing:-1.2px;">{{$userData['company']}}</h5>
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
					<th><p style="font-size:13px;letter-spacing:-1.2px;color:#999999;text-align:left;font-weight:normal;padding-right:30px;">직종</p></th>
					<td>
					    <p style="font-size:13px;color:#666;letter-spacing:-1.2px;">{{$row['job1']}}&middot;{{$row['job2']}}</p>
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
		    <tr>
			<td colspan="2">
			    <form action="list-g/del?id={{$row['order_id']}}" method='POST' onsubmit = "return del();">
			        <input class="btn btn-info btn-xs pull-right" value="삭제" type="submit"/>
				<input type="hidden" name="_token" value="{{$_SESSION['token']}}"/>
			    </form>
			    <form action="jobOpening?id={{$row['order_id']}}" method='POST'>
			        <input style="margin-right:10px;"class="btn btn-info btn-xs pull-right" value="수정" type="submit"/>
				<input type="hidden" name="_token" value="{{$_SESSION['token']}}"/>
			    </form>
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
		<li class="page-item"><a class="page-link" href="list-g?id=">Previous</a></li>
		@for($i=$nav['startPage'];$i<$nav['endPage'];$i++)
			@if($nav['currentPage']==$i)
			    <li class="page-item"><span class="page-link">{{$i+1}}</span></li>
			@else    
			    <li class="page-item"><a class="page-link" href="list-g?id={{$i}}">{{$i+1}}</a></li>
			@endif
		@endfor
	
		@if($nav['nextPage']==TRUE)
			<li class="page-item"><a class="page-link" href="list-g?id={{$nav['endPage']}}">Next</a></li>
		@else
			<li class="page-item"><span class="page-link">Next</span></li>
		@endif
   	    </ul>
	</div>
    </div>
</div>
<script>
	function del() {
		var msg='삭제하시겠습니까?';
		if (confirm(msg)){
			return true;
		} else {
			return false;
		}	
	}
</script>
@stop

