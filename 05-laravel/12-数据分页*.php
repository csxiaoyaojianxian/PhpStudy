<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Home\Member;

class TestController extends Controller
{
    //数据分页，具体参考文档
    public function testPagination () {
        //查询数据，参数为每页记录条数
        $data = Member::paginate(10);
        //展示视图并且传递数据
        return view('home.test.test',compact('data'));
    }
}

/*

<table>
    <thead>
        <tr>
            <th>id</th>
            <th>名字</th>
            <th>年龄</th>
            <th>邮箱</th>
            <th>头像</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $val)
            <tr>
                <td>{{$val -> id}}</td>
                <td>{{$val -> name}}</td>
                <td>{{$val -> age}}</td>
                <td>{{$val -> email}}</td>
                <td><img src="{{ltrim($val -> avatar,'.')}}" width="80px" alt="头像"></td>
            </tr>
        @endforeach
    </tbody>
</table>
{{$data -> links()}}
    
*/