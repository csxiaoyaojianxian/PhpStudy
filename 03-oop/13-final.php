<?php
/**
 * @Author: sunshine
 * @Date:   2018-06-01 11:32:35
 * @Last Modified by:   sunshine
 * @Last Modified time: 2018-06-02 09:46:52
 */

// final修饰的类不能被继承
// final修饰的方法不能重写

final class A {}
// class B extends A {}  // 报错

class C {
	final public function method() {}
}
class D extends C {
	// public function method() {} // 报错
}