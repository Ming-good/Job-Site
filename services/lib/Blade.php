<?php 
namespace Ming\lib;
use duncan3dc\Laravel\BladeInstance;
class Blade
{
	public static $obj;

        //view메소드를 받을경우 블레이드 템플릿 함수 render로 값 전달
        public static function __callstatic($method, array $args)
        {
                //블레이드 템플릿을 사용하기 위한 설정(view파일 경로, cache파일 경로)
                self::$obj = new BladeInstance("/var/www/html/Job-Site/view", "/var/www/html/Job-Site/cache/view");
                if($method == 'view')
                {

                        echo self::$obj->render(...$args);
                }


        }


}	
