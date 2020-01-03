<?php

namespace Val\DoctrineTool;

class Utils
{
	public static function randomString($length = 10): string
	{
		return substr(str_shuffle(str_repeat($x = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length / strlen($x)))), 1, $length);
	}
}