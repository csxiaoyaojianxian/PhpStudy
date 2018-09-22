<?php

	//验证码工具类

	class Captcha{
		//属性：保存验证码图片基本数据
		private $width;
		private $height;
		private $length;
		private $font;		//字体
		private $dots;
		private $lines;

		public function __construct($arr = array()){
			$this->width = isset($arr['width']) ? $arr['width'] : 200;
			$this->height = isset($arr['height']) ? $arr['height'] : 40;
			$this->length = isset($arr['length']) ? $arr['length'] : 4;
			$this->font = isset($arr['font']) ? $arr['font'] : './Fonts/impact.ttf';
			$this->dots = isset($arr['dots']) ? $arr['dots'] : 100;
			$this->lines = isset($arr['lines']) ? $arr['lines'] : 10;
		}

		//制作验证码图片
		public function generate(){
			//制作画布
			$img = imagecreatetruecolor($this->width,$this->height);
			//背景色
			$bg_c = imagecolorallocate($img,mt_rand(200,255),mt_rand(200,255),mt_rand(200,255));
			imagefill($img,0,0,$bg_c);

			//内容：干扰和具体字符
			//干扰点：*代替
			for($i = 0;$i < $this->dots;$i++){
				$dots_c = imagecolorallocate($img,mt_rand(150,200),mt_rand(150,200),mt_rand(150,200));
				imagestring($img,mt_rand(1,5),mt_rand(0,$this->width),mt_rand(0,$this->height),'*',$dots_c);
			}

			//干扰线
			for($i = 0;$i < $this->lines;$i++){
				$lines_c = imagecolorallocate($img,mt_rand(100,150),mt_rand(100,150),mt_rand(100,150));
				imageline($img,mt_rand(0,$this->width),mt_rand(0,$this->height),mt_rand(0,$this->width),mt_rand(0,$this->height),$lines_c);
			}

			//增加内容
			$string_arr = array_merge(range(1,9),range('a','z'),range('A','Z'));
			$captcha = '';
			for($i = 0;$i < $this->length;$i++){
				//打乱顺序
				shuffle($string_arr);

				//保存内容
				$captcha .= $string_arr[0];

				//写入
				$str_c = imagecolorallocate($img,mt_rand(0,100),mt_rand(0,100),mt_rand(0,100));
				$ceil = ceil($this->width / ($this->length + 1));
				imagettftext($img,mt_rand(10,20),mt_rand(-45,45),$ceil * ($i + 1),mt_rand(20,30),$str_c,$this->font,$string_arr[0]);
			}

			//将字符串内容保存到session
			@session_start();
			$_SESSION['captcha'] = $captcha;

			//保存输出
			header('Content-type:image/png');
			imagepng($img);

			//销毁资源
			imagedestroy($img);
		}

		//验证验证码：用户提交的与session中保存的进行对比
		public static function checkCaptcha($captcha){
			//$captcha是用户提交的验证码数据：验证的时候不区分大小写
			@session_start();
			return strtolower($captcha) === strtolower($_SESSION['captcha']);
		}

	}

