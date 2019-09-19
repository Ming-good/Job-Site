<?php
namespace Ming\Route;

// Routing:: Route('url', 'Controller_Name@function')

#메인 뷰
Routing:: Route('home', 'Auth\Post@index');
#개인 회원가입 뷰
Routing:: Route('userSign-up', 'Auth\Post@userCreate');
#기업 회원가입 뷰
Routing:: Route('enterpriseSign-up', 'Auth\Post@enterpriseCreate');
#아이디 중복 체크 뷰
Routing:: Route('checkId', 'Auth\Auth@checkId');
#채용공고 등록 뷰
Routing:: Route('jobOpening', 'Enterprise@create');
#채용공고 리스트 뷰
Routing:: Route('list-g', 'Enterprise@index');
#채용공고 게시판 뷰
Routing:: Route('list-g/board', 'Enterprise@show');
#채용공고 지도 뷰
Routing:: Route('list-g/map', 'API@map');
#채용정보 검색 뷰
Routing:: Route('allList', 'Search@index');
#이력서 등록 뷰
Routing:: Route('resume', 'User\Resume@create');
#이력서 관리 뷰
Routing:: Route('resume/management', 'User\Resume@show');
#이력서 뷰
Routing:: Route('resume/view', 'User\Resume@index');
#로그인 뷰
Routing:: Route('login', 'Auth\Auth@index');



#회원가입 처리
Routing:: Route('userStore', 'Auth\Post@userStore');
#회원가입 처리
Routing:: Route('enterpriseStore', 'Auth\Post@enterpriseStore');
#로그인 로그아웃 처리
Routing:: Route('Auth/login', 'Auth\Auth@login');
Routing:: Route('Auth/logout', 'Auth\Auth@logout');
#카카오 로그인 처리
Routing:: Route('Auth/loginKakao', 'Auth\Auth@loginKakao');
#채용공고 정보 저장 처리
Routing:: Route('jobOpening/register', 'Enterprise@store');
#채용공고 게시판 삭제 처리
Routing:: Route('list-g/del', 'Enterprise@destroy');
#채용공고 게시판 수정 뷰
Routing:: Route('list-g/modify', 'Enterprise@update');
#이력서 정보 저장 처리
Routing:: Route('resume/store', 'User\Resume@store');
#이력서 삭제 처리 
Routing:: Route('resume/destroy', 'User\Resume@destroy');
#이력서 업데이트 처리
Routing:: Route('resume/update', 'User\Resume@update');




