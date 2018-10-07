<?php
namespace App\Http\Controllers;
// 引入空间类元素
use App\Http\Controllers\Controller;
class TestController extends Controller
{
    public function lst()
    {
        return "this is test controller@lst";
    }
}