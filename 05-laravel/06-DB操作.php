<?php
/*
create table member(
    id int primary key auto_increment,
    name varchar(32) not null,
    age tinyint unsigned not null,
    email varchar(32) not null
)engine myisam charset utf8;
*/

// 数据库在laravel框架中的配置
// 在.env文件里或在config目录下面的database.php文件里配置
// env函数表示先从.env文件里获取，如果获取失败则使用env函数的第二个参数
/*
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=sunshine
DB_USERNAME=root
DB_PASSWORD=19931128

'mysql' => [
    'driver' => 'mysql',
    'host' => env('DB_HOST', '127.0.0.1'),
    'port' => env('DB_PORT', '3306'),
    'database' => env('DB_DATABASE', 'sunshine'),
    'username' => env('DB_USERNAME', 'root'),
    'password' => env('DB_PASSWORD', '19931128')
]
*/

namespace App\Http\Controllers;
// 控制器中引入DB门面，DB门面在app.php中已经定义别名DB
use DB;
class TestController extends Controller
{
    // 添加方法
    public function add () {
    	// 获取操作member表的实例
        $db = DB::table('member');
    	// 【 insert 】(数组)可以同时添加一条或多条，返回值是布尔类型
    	$result = $db -> insert([
    		[
    			'name'	=>	'sunshine',
    			'age'	=>	'25',
    			'email' =>	'test1@csxiaoyao.com'
    		],
    		[
    			'name'	=>	'csxiaoyao',
    			'age'	=>	'26',
    			'email' =>	'test2@csxiaoyao.com'
    		],
    	]);
    	// 【 insertGetId 】(一维数组)，只能添加一条数据，返回自增的id
    	$result = $db -> insertGetId([
            'name'	=>	'sun',
            'age'	=>	'24',
            'email' =>	'test3@csxiaoyao.com'
        ]);
    	dd($result);
    }

    // 修改方法
    public function update () {
        $db = DB::table('member');
        // 【 update 】修改整个记录的全部字段，返回受影响的行数
    	$result = $db -> where('id','<','4') -> update([
    		'name' => '新用户名' // 需修改字段的键值对
        ]);
        // 【 increment & decrement 】修改数字字段的数值（记录登录次数、积分的增加），返回受影响的行数
        $result = $db -> where('id','=','1') -> increment('age'); // 每次+1
        $result = $db -> where('id','2') -> increment('age', 5); // 每次+5
        // 如果运算符为'='，第二个参数可以不写
    	dd($result);
    }

    // 查询方法
    public function select () {
    	$db = DB::table('member');
    	// 【 get 】查询全部数据
    	$data = $db -> get();
    	// 循环遍历数据
    	foreach ($data as $key => $value) {
    		echo "id：{$value -> id}，name：{$value -> name}，email：{$value -> email}<br/>";
    	}
    	// 查询id大于2并且年龄小于25的数据
    	$data = $db -> where('id','>','2') -> where('age','<','25') -> get();

        // 【 first 】取出单行记录
        // 返回值是一个对象，等价于limit 1
    	$data = $db -> first();

    	// 【 value 】取出指定字段的值
    	$data = $db->where('id','1')->value('email');
    	
    	// 【 select 】查询指定字段的值
    	$data = $db->select('name', 'email')->get();

        // 【 orderBy 】排序
    	$data = $db->orderBy('age','desc')->get();

        // 【 limit & offset 】分页操作
        // 组合等价于 limit start,size / limit 2,3
        $data = $db->offset(2)->limit(3)->get();
        
    	dd($data);
    }

    // 删除操作
    public function del () {
    	$db = DB::table('member');
    	// 【delete】删除记录，返回受影响的行数
        $result = $db->where('id','<','3')->delete();
        dd($result);
        // 【truncate】清空整个数据表
        $db -> truncate();
    }

    // 执行SQL
    public function runSql () {
    	// 执行任意的 insert update delete 语句【 影响记录的语句使用statement语法 】
        DB::statement("insert into member values(1,'cs',25,'sunjianfeng@csxiaoyao.com')");
        // 执行任意的 select 语句
        $res = DB::select("select * from member");
        dd($res);
    }
}
