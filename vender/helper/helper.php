<?php
function redirect($url)
{
        header('Location:/Job-Site/'.$url);
}

function upload($uploadDir, array $inputName)
{
		#파일이름 해시
		$fileHash = bin2hex(openssl_random_pseudo_bytes(8));

		
		#확장자 체크
		$ext = array_pop(explode('.', strtolower($inputName['name'])));
		if(!in_array($ext, array('jpg', 'png', 'gif'))) return false;

		#파일사이즈 5M이하로 제한
		if($inputName['size'] > 5242880	)return false;

		$fileName = $fileHash.'.'.$ext;
 		ini_set('display_errors', 1);
               	$uploadFile = $uploadDir.basename($fileName);
               	if(move_uploaded_file($inputName['tmp_name'], $uploadFile)) {
               		echo 'Success';
               	} else {
                       	echo 'Faile';
               	}

		return $fileName;

}
