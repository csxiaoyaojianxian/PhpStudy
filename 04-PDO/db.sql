-- 创建数据库
create database project;
-- 选择数据库
use project;
-- 设置编码格式
set names gbk;
-- 创建数据表
create table tb_admin(
  id int not null auto_increment,
  username varchar(20) not null,
  password char(32) not null,
  addtime int,
  primary key(id)
) engine = myisam default charset=utf8;

-- MySQL中的预处理功能
-- 1、设置预处理语句
prepare stmt1 from 'insert into tb_admin values (null,?,?,?)';
-- 2、设置参数
set @username = 'csxiaoyao';
set @password = md5('123456');
set @time = unix_timestamp();
-- 3、执行预处理语句
execute stmt1 using @username,@password,@time;

-- MySQL中的事务处理功能
create table tb_bank(
  id int not null auto_increment,
  name varchar(20) not null,
  money decimal(11,2) default 0.00,
  primary key(id)
) engine = innodb default charset=utf8;

-- 插入测试数据
insert into tb_bank values (null,'小强',2000.00);
insert into tb_bank values (null,'旺财',0.10);
insert into tb_bank values (null,'如花',2000.00);