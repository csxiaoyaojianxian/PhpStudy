<?php
namespace App\Http\Controllers;
use DB;
class TestController extends Controller
{
    //联表查询
    public function test01(){
        //select  t1.id,t1.article_name,t2.author_name from article as t1 left join author as t2 on t1.author_id = t2.id;
        //查询
        $data = DB::table('article as t1') -> select('t1.id','t1.article_name','t2.author_name') -> leftJoin('author as t2','t1.author_id','=','t2.id') -> get();
        dd($data);
    }

    //一对一
    public function test02(){
        //查询数据
        $data = \App\Home\Article::get();
        //循环展示
        foreach ($data as $key => $value) {
            echo $value -> id . '&emsp;' . $value -> article_name . '&emsp;' . $value -> author -> author_name . '<br/>';
        }
    }

    //一对多
    public function test03(){
        //查询数据
        $data = \App\Home\Article::get();
        //循环输出
        foreach ($data as $key => $value) {
            echo "当前的文章名称为；" . $value -> article_name . '，其下有的评论为：<br/>';
            //获取当前文章下全部的评论，挨个输出
            foreach ($value -> comment as $k => $val) {
                echo '&emsp;' . $val -> comment . '<br/>';
            }
        }
    }

    //多对多
    public function test04(){
        //查询数据
        $data = \App\Home\Article::get();
        //循环输出
        foreach ($data as $key => $value) {
            echo "当前的文章名称为；" . $value -> article_name . '，其所使用的关键词：<br/>';
            //输出全部的关键词
            foreach ($value -> keyword as $k => $val) {
                echo '&emsp;' . $val -> keyword . '<br/>';
            }
        }
    }
}
