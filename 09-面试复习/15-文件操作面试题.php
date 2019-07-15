<?php
/**
 * 文件开头插入 Hello World
 */
// 打开文件
$file = './hello.txt';
$handle = fopen($file, 'r');
// 将文件的内容读取出来，在开头加入 Hello World
$content = fread($handle, filesize($file));
$content = 'Hello World'. $content;
fclose($handle);
// 将拼接好的字符串写回到文件当中
$handle = fopen($file, 'w');
fwrite($handle, $content);
fclose($handle);

/**
 * 遍历 test 目录
 */
$dir = './test';
function loopDir($dir)
{
    // 打开目录
    $handle = opendir($dir);
    // 读取目录当中的文件
    while(false!==($file = readdir($handle)))
    {
        // 如果文件类型是目录，继续打开目录
        if ($file != '.' && $file != '..')
        {
            // 如果文件类型是文件，输出文件名称
            echo $file. "\n";
            if (filetype($dir. '/'. $file) == 'dir')
            {
                // 读取子目录的文件
                loopDir($dir. '/'. $file);
            }
        }
    }
}
loopDir($dir);
// 关闭目录
