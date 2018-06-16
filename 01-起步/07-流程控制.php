<?php

/**
 * 中止脚本运行：die() exit()
 */
// 输出一个消息并且退出当前脚本。
// void exit ([ string $status ] )


/**
 * 延缓脚本执行：sleep(n)
 */
// 延缓执行，相当于JS中的延时器setTimeout()
// int sleep ( int $seconds )
// $seconds是延缓的秒数


/**
 * 分支结构(if)
 */
if(){

}else if(){

}else{

}

/**
 * 分支结构(switch)
 */
switch(){
	case :
		break;
	deafult:
}

/**
 * 循环结构(while)
 */
while(){

}

/**
 * 循环结构(dowhile)
 */
do{

}while();

/**
 * 循环结构(for)
 */
for(;;){

}

/**
 * break语句
 */
// 中断各种循环(for、while、do while、foreach)和switch语句
// break [n]   n可选参数，默认为1。n为从1开始的正整数。用于决定跳出第几层循环
$a = 0;
while(++$a){
	while(10){
		while(true){
			break 3;
		}
	}
}

/**
 * continue语句
 */
// 结束本次循环，开始下一次循环
// continue [n]   n可选，默认值为1。从1开始的正整数。用于结束第几层循环

