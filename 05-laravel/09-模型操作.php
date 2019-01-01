<?php
// /app/
// $ php artisan make:model Home/Member
/*
1.（必做）定义$table属性，值是无前缀表名
    如果不指定则使用类名的复数形式作为表名
    如果模型为Member则默认会去找members表
    修饰词：protected
2.（可选）定义$primaryKey属性，值是主键名称
    如果需要使用AR模式的find方法，则可能需要指定主键（Model::find(n)）
    在主键字段不是id的时候则需要指定主键
    修饰词：protected
3.（可选）定义$timestamps属性，值是false
    如果不设置为false，则默认会操作表中的created_at和updated_at字段
    表中一般没有这两个字段，所以设置为false，表示不要操作这两个字段
    修饰词：public
4.（可选）定义$fillable属性
    表示使用模型插入数据时，允许插入到数据库的字段信息
    修饰词：protected
*/

namespace App\Home;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    // 定义模型关联的数据表（一个模型只操作一个表）
    protected $table = 'member'; // 默认为 members 表
    //定义主键（可选）
    protected $primaryKey = 'id';
    //定义禁止操作时间
    public $timestamps = false;
    //设置允许写入的数据字段
    protected $fillable = ['id','name','age'];
    // 排除入库的字段
    protected $guarded = ['email'];
}

/**
 * 模型在控制器中的使用
 * ActiveRecord 使用方式有2种
 * 1. 调用静态方法，模型不需要实例化
 * Member::get() 等价于 DB::table('member') -> get()
 * 2. 实例化模型后使用
 * $model = new Member();
 * $model -> get();
 */
namespace App\Http\Controllers;
use Illuminate\Http\Request;
// 引入Member模型类
use App\Home\Member;
class TestController extends Controller
{
    public function testModel (Request $request) {
    	// 实例化模型，映射表和类
        $model = new Member();
        /**
         * save / create 添加操作
         */
        // 【 方式1 】不推荐
        // 属性赋值，映射表字段与类的属性
        $model -> name = 'sunshine';
        $model -> age = '28';
        $model -> email = 'sunshine@csxiaoyao.com';
        // 映射记录到实例
        $result = $model -> save();
        dd($result); // true

        // 【 方式2 】推荐
        $result = $model -> create($request -> all());
        dd($result); // object

        /**
         * find 查询操作
         */
        // 获取指定主键的一条数据
        $info = Member::find(2); // 静态方法调用，获取主键为2的数据
        // 结果集默认是一个对象，使用结果数据需要转化成数组
        $info = Member::find(2) -> toArray();
        dd($info);
        // 获取符合指定条件的第一条记录
        Member::where("id",'<=',2)->first(); // -> toArray()
        // 查询多行并且指定字段
        // all与get方法区别: all不支持连接其他辅助查询方法
        Member::all();
        Member::all(['name','age']);
        Member::get();
        Member::get(['name','age']);
        // Member::where('id','>',2)->all(); // 报错
        Member::where('id','>',2)->get(['name','age']);	// 数组选列
        Member::where('id','>',2)->select('name','age')->get(); // 字符串选列
        Member::where('id','>',2)->select(['name','age'])->get(); // 数组选列

        /**
         * save / update 修改操作
         */
        // 【 方式1 】save
        $data = Member::find(3); 
        // 赋值属性
        $data -> email = 'sunshine@csxiaoyao.com';
        // 实例映射到记录
        $result = $data -> save();
        dd($result);
        
        // 【 方式2 】update
        $result = Member::where('id',2) -> update([
            'age' => 18
        ]);
        dd($result);

        /**
         * delete 删除操作
         */
        $data = Member::find(2);
        $result = $data -> delete();
        dd($result);
    }
}
