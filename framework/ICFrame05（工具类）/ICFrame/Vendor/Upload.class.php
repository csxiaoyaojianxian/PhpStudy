<?php

	//文件上传类（图片）

	class Upload{
		//静态属性保存MIME类型
		private static $image_type = array('image/jpeg','image/jpg','image/gif','image/png');

		//记录错误信息
		public static $error = '';

		/*
		 * 文件上传
		 * @param1 array $file，上传的文件信息（5个要素）
		 * @param2 string $path，上传路径
		 * @return string $new_name，文件保存后的新名字（文件上传后会重命名）
		 */
		 public static function uploadImage($file,$path){
			//判定
			if(!is_array($file) || !isset($file['error'])){
				//不是上传文件数组
				self::$error = '错误操作！';
				return false;
			}

			//文件类型判断
			if(!in_array($file['type'],self::$image_type)){
				self::$error = '当前文件的类型不允许！';
				return false;
			}

			//判断文件是否上传成功
			switch($file['error']){
				case 1:
					self::$error = '文件过大！';
					return false;
				case 2:
					self::$error = '文件过大！';
					return false;
				case 3:
					self::$error = '文件上传部分成功！';
					return false;
				case 4:
					self::$error = '没有选中文件！';
					return false;
				case 6:
					self::$error = '临时文件夹不存在！';
					return false;
				case 7:
					self::$error = '文件上传失败！';
					return false;
			}

			//获取文件新名字：名字.后缀
			$new_name = self::getNewName($file['name']);

			//转移存储
			if(move_uploaded_file($file['tmp_name'],$path . '/' . $new_name)){
				//成功
				return $new_name;
			}else{
				//失败
				self::$error = '文件上传到指定文件夹失败！';
				return false;
			}
		 }


		 //获取新名字
		 private static function getNewName($filename){
			//名字规则：YYYYMMDDHHIISSXXX.后缀名
			$newname = date('YmdHis');

			//取得随机部分
			$arr = array_merge(range('a','z'),range('A','Z'));
			shuffle($arr);
			$newname .= $arr[0] . $arr[1] . $arr[2] . $arr[3];

			//补充后缀
			$newname .= '.' . strrchr($filename,'.');

			//返回
			return $newname;
		 }
	}