<!DOCTYPE html>
<html>
<head>
<meta charset="EUC-KR">
    <title>Child</title>
<!-- 합쳐지고 최소화된 최신 CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css//bootstrap.min.css">

<!-- 부가적인 테마 -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">

<!-- 합쳐지고 최소화된 최신 자바스크립트 -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>

 
</head>
<body>
    <br>
@if($overlap == true && $speCheck == true)
    <b><font size="5" color="gray">사용가능한 아이디 입니다.</font></b>
    <script>window.opener.transform(true);</script>
@elseif($overlap == false && $speCheck == true)
    <b><font size="5" color="gray">이미 시용중인 아이디 입니다.</font></b>
    <script>window.opener.transform(false);</script>
@else
    <b><font size="5" color="gray">특수문자 없이 입력해주세요.</font></b>
    <script>window.opener.transform(false);</script>
@endif
    <br><br>
 
    <input type="button" id="cInput" class='btn btn-info btn-xs' value="창닫기" onclick="window.close()">
</body>
</html>

