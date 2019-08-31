<?php
namespace Ming\Route;

// Routing:: Route('url', 'Controller_Name@function')

#메인 뷰
Routing:: Route('home', 'Post@index');
#회원가입 뷰
Routing:: Route('Sign-up', 'Post@create');
#아이디 중복 체크 뷰
Routing:: Route('Sign-up/checkId', 'Auth@checkId');
#채용공고 등록 뷰
Routing:: Route('jobOpening', 'Enterprise@create');
#채용공고 리스트 뷰
Routing:: Route('list-g', 'Enterprise@index');
#채용공고 게시판 뷰
Routing:: Route('list-g/board', 'Enterprise@show');
#채용공고 게시판 수정 뷰
Routing:: Route('list-g/modify', 'Enterprise@update');
#채용공고 지도 뷰
Routing:: Route('list-g/map', 'API@map');



#회원가입 처리
Routing:: Route('SignUpProcess', 'Post@store');
#로그인 로그아웃 처리
Routing:: Route('Auth/login', 'Auth@login');
Routing:: Route('Auth/logout', 'Auth@logout');
#카카오 로그인 처리
Routing:: Route('Auth/loginKakao', 'Auth@loginKakao');
#채용공고 정보 저장 처리
Routing:: Route('jobOpening/register', 'Enterprise@store');
#채용공고 게시판 삭제 처리
Routing:: Route('list-g/del', 'Enterprise@destroy');
