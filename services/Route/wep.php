<?php
namespace Ming\Route;

// Routing:: Route('url', 'Controller_Name@function')

#메인 뷰
Routing:: Route('home', 'Post@index');
#회원가입 뷰
Routing:: Route('Sign-up', 'Post@create');
#채용공고 등록 뷰
Routing:: Route('jobOpening', 'Enterprise@create');
#채용공고 리스트 뷰
Routing:: Route('list-g', 'Enterprise@index');
#채용공고 게시판 뷰
Routing:: Route('list-g/board', 'Enterprise@show');




#아이디 중복 체크 처리
Routing:: Route('Sign-up/checkId', 'Post@checkId');
#회원가입 처리
Routing:: Route('SignUpProcess', 'Post@store');
#로그인 로그아웃 처리
Routing:: Route('Auth/login', 'Auth@login');
Routing:: Route('Auth/logout', 'Auth@logout');
#채용공고 처리
Routing:: Route('jobOpening/register', 'Enterprise@store');
