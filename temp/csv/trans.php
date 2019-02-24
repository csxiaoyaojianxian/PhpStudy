<?php
include('CsvReader.class.php');

$newFileName = 'new_csv_db4.csv';
$csv_file1 = 'new_db4_num1.csv';
$csv_file2 = 'db4_num2.csv';

$csv_file = 'new_csv_db3.csv.csv';
$csvreader = new CsvReader($csv_file);
$line_number = $csvreader->get_lines();
echo $line_number, chr(10);

$csvreader1 = new CsvReader($csv_file1);
$line_number1 = $csvreader1->get_lines();
// $line_number1 = 10;
$data1 = $csvreader1->get_data($line_number1);
echo $line_number1, chr(10);
// print_r($data1);

$csvreader2 = new CsvReader($csv_file2);
$line_number2 = $csvreader2->get_lines();
// $line_number2 = 10;
$data2 = $csvreader2->get_data($line_number2);
echo $line_number2, chr(10);
// print_r($data2);

// data2 to kv
for ($i = 0; $i < count($data2); $i++) {
    $data3[ $data2[$i][0] . '@' . $data2[$i][1] ] = 1;
}
// print_r($data3);


function DownloadData($name='',$header=array(),$data=array(),$is_header=true){
    set_time_limit(0);
    ini_set('memory_limit','2048M'); 
    try {
        if (!$name || !$data) {
            throw new BadRequestHttpException('参数不可为空');
        }
        $filePath = "./{$name}.csv";
        $header = implode(",",$header);
        $header = iconv('UTF-8', 'GBK//IGNORE', $header);
        $header = explode(",", $header);
        $fp = fopen($filePath, 'a+');   
        if (!empty($header) && is_array($header) && $is_header) {
            fputcsv($fp, $header);
        }
        foreach ($data as $row) {
            $str = implode("@@@@",$row);
            $str = iconv('UTF-8', 'GBK//IGNORE', $str);
            $str = str_replace(",","|",$str);
            $row = explode("@@@@", $str);
            fputcsv($fp, $row);
        }
        unset($data);  
        if(ob_get_level()>0){
            ob_flush();
        }  
        flush();    
    } catch (Exception $e) {
         throw new BadRequestHttpException($e->getMessage());//抛出异常
    }
    return [
        'filePath'=>ltrim($filePath,"./"),
        'name'=>$name.'.csv',
    ];
}

for ($i = 0; $i < count($data1); $i++) {
    $key = $data1[$i][0];
    $platId = $data1[$i][1];
    $num = (int)$data1[$i][2];
    if (isset($data3[$key . '@' . $platId])) {
        $num += 2;
        $data3[$key . '@' . $platId] = 0;
    }
    $retData[] = array($key, $platId, $num);
}
// print_r($retData);
foreach($data3 as $key => $val) {
    if ($val == 1) {
        $temp = explode('@', $key);
        $retData[] = array($temp[0], $temp[1], 2);
    }
}

DownloadData($newFileName, array(), $retData, false);
// print_r($retData);

echo "生成成功";