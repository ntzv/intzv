<?php				
/* создать соединение */ 
$conn = mysql_connect("mysql95.1gb.ru", "gb_ntzv", "ea5bebd9a");
//$conn = mysql_connect("localhost", "root", "hempmaster");

if (!$conn) { 
   echo "Ошибка подключения к базе данных. Код ошибки: ".mysqli_connect_error(); 
   exit; 
} 

$table0 = 'nomenklatura_o';

/* выбрать базу данных. Если произойдет ошибка - вывести ее */ 
mysql_select_db("gb_ntzv") or die(mysql_error());  

$path0 = '/home/virtwww/w_ntz-volhov_5cd59895/sync/';

$name0 = '20190329135909.csv';

$data0 = file($path0.$name0, FILE_SKIP_EMPTY_LINES);//массив строк импортируемых данных

function hack_str_replace($on){
	$on = str_replace("exit", "", $on);
	$on = str_replace("quit", "", $on);
	$on = str_replace(";", "", $on);
	$on = str_replace("drop", "", $on);
	$on = str_replace("delete", "", $on);
	$on = str_replace("alter", "", $on);
	$on = str_replace("_eq_", "=", $on);
	$on = str_replace("__", " ", $on);
	return $on;
}	

$result = mysql_query("DELETE FROM $table0 ", $conn); 

/* Выполнить запрос. Если произойдет ошибка - вывести ее. */ 
//$result = mysql_query("LOAD DATA INFILE '/home/virtwww/w_ntz-volhov_5cd59895/sync/20190329135909.csv' INTO TABLE `nomenklatura_o` COLUMNS TERMINATED BY ',' ENCLOSED BY '\&quot;' LINES TERMINATED BY '\n'", $conn); 
//$result = mysql_query("LOAD DATA INFILE '20190329135909.csv' INTO TABLE `nomenklatura_o` COLUMNS TERMINATED BY ',' ENCLOSED BY '\&quot;' LINES TERMINATED BY '\n'", $conn); 

$ignore = 0;
$field0 = '';
$field1 = '';
$field2 = '';
$field3 = '';
$field4 = '';
$field5 = '';
$field6 = '';
$field7 = '';
$field8 = '';
$field9 = '';
$fields = 0;
$rows = 0;

if (isset($_REQUEST['ignore']) && $_REQUEST['ignore'] != ""){
	$ignore = $_REQUEST['ignore'];
	$ignore = hack_str_replace($ignore);
	$ignore = $ignore * 1;
}	  

if (isset($_REQUEST['field0']) && $_REQUEST['field0'] != ""){
	$field0 = $_REQUEST['field0'];
	$field0 = hack_str_replace($field0);
	$field0 = trim($field0);
	$fields = 1;
}

if (isset($_REQUEST['field1']) && $_REQUEST['field1'] != ""){
	$field1 = $_REQUEST['field1'];
	$field1 = hack_str_replace($field1);
	$field1 = ', '.trim($field1);
	$fields = 2;
}

if (isset($_REQUEST['field2']) && $_REQUEST['field2'] != ""){
	$field2 = $_REQUEST['field2'];
	$field2 = hack_str_replace($field2);
	$field2 = ', '.trim($field2);
	$fields = 3;
}

if (isset($_REQUEST['field3']) && $_REQUEST['field3'] != ""){
	$field3 = $_REQUEST['field3'];
	$field3 = hack_str_replace($field3);
	$field3 = ', '.trim($field3);
	$fields = 4;
}

if (isset($_REQUEST['field4']) && $_REQUEST['field4'] != ""){
	$field4 = $_REQUEST['field4'];
	$field4 = hack_str_replace($field4);
	$field4 = ', '.trim($field4);
	$fields = 5;
}

if (isset($_REQUEST['field5']) && $_REQUEST['field5'] != ""){
	$field5 = $_REQUEST['field5'];
	$field5 = hack_str_replace($field5);
	$field5 = ', '.trim($field5);
	$fields = 6;
}

if (isset($_REQUEST['field6']) && $_REQUEST['field6'] != ""){
	$field6 = $_REQUEST['field6'];
	$field6 = hack_str_replace($field6);
	$field6 = ', '.trim($field6);
	$fields = 7;
}

if (isset($_REQUEST['field7']) && $_REQUEST['field7'] != ""){
	$field7 = $_REQUEST['field7'];
	$field7 = hack_str_replace($field7);
	$field7 = ', '.trim($field7);
	$fields = 8;
}

if (isset($_REQUEST['field8']) && $_REQUEST['field8'] != ""){
	$field8 = $_REQUEST['field8'];
	$field8 = hack_str_replace($field8);
	$field8 = ', '.trim($field8);
	$fields = 9;
}

if (isset($_REQUEST['field9']) && $_REQUEST['field9'] != ""){
	$field9 = $_REQUEST['field9'];
	$field9 = hack_str_replace($field9);
	$field9 = ', '.trim($field9);
	$fields = 10;
}

$count0 = count($data0);
//$count0 = 10;

for ($i = 0; $i < $count0; $i++){
	$field = split(';', $data0[$i]);
	if (count($field) == $fields){
		$fieldall = $field0.$field1.$field2.$field3.$field4.$field5.$field6.$field7.$field8.$field9;
		for ($j = 0; $j < $fields; $j++){
			$field[$j] = str_replace("\n", "", $field[$j]);
			$field[$j] = str_replace("\r", "", $field[$j]);
			$field[$j] = str_replace("\t", "", $field[$j]);
			$fieldn = $field[$j]*1;
			if (($fieldn.'' === $field[$j])) {
				$field[$j] = str_replace(",", ".", $field[$j]);
			}
			else{
				$field[$j] = "'".$field[$j]."'";
			}
		}
		$fieldsall = implode(', ', $field);
	}
	if ($i < $ignore) continue;
	
	//echo "INSERT INTO $table0 ($fieldall) VALUES ($fieldsall) <br>";
	
	$result = mysql_query("INSERT INTO $table0 ($fieldall) VALUES ($fieldsall)", $conn); 
	$rows++;
}

echo "Rows proceeded: $rows";

//LOAD DATA INFILE '/home/virtwww/w_ntz-volhov_5cd59895/sync/20190329135909.csv'
//INTO TABLE `nomenklatura_o`
//COLUMNS TERMINATED BY ',' ENCLOSED BY '\&quot;'
//LINES TERMINATED BY '\n';
//LOAD DATA LOCAL INFILE '/home/virtwww/w_ntz-volhov_5cd59895/http/wp-content/themes/semicolon/20190329135909.csv' INTO TABLE `nomenklatura_o` COLUMNS TERMINATED BY '\&quot;' LINES TERMINATED BY '\n' IGNORE 1 LINES kod, artikul, naimenovanie, zapret
 
//echo "Обработано строк: ".mysql_num_rows($result);

mysql_close( ); 

?>