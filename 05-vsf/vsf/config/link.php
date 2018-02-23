<?php

/**
 * @Author: sunshine
 * @Date:   2018-02-22 23:36:53
 * @Last Modified by:   sunshine
 * @Last Modified time: 2018-02-23 19:51:32
 */
function getHostList() {
	$address1 = "csxiaoyao.com";
	$address2 = "csxiaoyao.cn";
	return array(
		$address1=>"",
		$address2=>"",
		"www.".$address1=>"",
		"www.".$address2=>"",
		"blog.".$address1=>"blog",
		"blog.".$address2=>"blog",
		"db.".$address1=>"db",
		"db.".$address2=>"db",
		"pan.".$address1=>"pan",
		"pan.".$address2=>"pan",
	);
}
function getLinkList() {
	return array(
		"index"=>"https://csxiaoyao.cn/index.html",
		"blog"=>"https://csxiaoyao.cn/blog/index.php",
		"db"=>"https://csxiaoyao.cn/phpmyadmin/index.php",
		"pan"=>"https://csxiaoyao.cn/pan",
		"console"=>"https://csxiaoyao.cn/webconsole",
		"ftp"=>"ftp://csxiaoyao.cn",
		"vpn"=>"",
		"api"=>"",
		"test"=>"",
		"tool"=>"",
		"game"=>"",
	);
}