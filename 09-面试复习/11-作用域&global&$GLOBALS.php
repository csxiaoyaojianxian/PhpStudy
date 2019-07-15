<?php

$outer = 'str';

function myfunc1 () {
    global $outer;
    echo $outer; // 必须用global
}
function myfunc2 () {
    echo $GLOBALS['outer'];
}

myfunc1(); // str
myfunc2(); // str