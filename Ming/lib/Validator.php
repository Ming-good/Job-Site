<?php
namespace Ming\lib;
use Ming\lib\helper;
class Validator
{
	public function required(array $data)
	{
		foreach($data as $row)
		{
			if(empty($row))
			{
				helper::redirect('Sign-up');
			}
		}
	}
}

