<?php
/*
【 1 linux 常用命令 】
系统安全：sudo、su、chmod、setfacl
进程管理：w、top、ps、kill、pkill、pstree、killall
用户管理：id、usermod、useradd、groupadd、userdel
文件系统：mount、umount、fsck、df、du
关机重启：shutdown、reboot
网络应用：curl、telnet、mail、elinks
网络测试：ping、netstat、host
网络配置：hostname、ifconfig
常用工具：ssh、creen、clear、who、date
软件管理：yum、rpm、apt-get
文件操作：查找比较 locate、find
        内容查看 head、tail、less、more
        文件处理 touch、unlink、rename、ln、cat
        目录操作 cd、mv、rm、pwd、tree、cp、ls
        权限属性 setfacl、chmod、chown、chgrp
        压缩解压 bzip2/bunzip2、gzip/gunzip、zip/unzip、tar
        文件传输 ftp、scp

【 2 定时任务 】
【 crontab 命令 】
创建 (分 时 日 月 周)  crontab -e * * * * *
例：每天0点重启服务器
# crontab -e 0 0 * * * reboot
【 at 命令 】
# at 2:00 tomorrow
at>/home/csxiaoyao/test
at>Ctrl+D

【 3 vi/vim 】

【 4 shell基础 】
【 脚本执行方式 】
赋予权限，直接执行，例：chmod + x test.sh;./test.sh
调用解释器执行脚本，例：bash、csh、ash、bsh、ksh...
source命令，例：source test.sh
【 编写基础 】
开头用 #! 指定脚本解释器，例： #!/bin/sh 、 #!/bin/bash
【 编写具体功能 】
 */