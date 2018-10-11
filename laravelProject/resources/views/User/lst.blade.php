使用php原生语法访问变量
<?php echo $name; ?>
使用插值表达式，模板标签
{{ $name }}
使用php函数
<?php echo time(); ?>
{{ time() }}


@foreach($data as $v)
    {{ $v['name'] }} : {{ $v['age'] }} <br />
@endforeach

<?php foreach($data as $key => $value): ?>
    <?php echo $value['name']; ?> : <?php echo $value['age']; ?> <br />
<?php endforeach ?>