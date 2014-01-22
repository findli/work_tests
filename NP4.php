<?

echo 'file(1), user(2)'."\n";
$stdin = fgets(STDIN);
echo "\t" . $stdin.'<-stdin'.PHP_EOL;
$arr1 = [];
$arr2 = [];
if($stdin == 2){
	echo "enter values for two arrays; one line one value; for finish enter values to array press 'n'" . PHP_EOL;
	$arr_index = 1;
	while ($val = fgets(STDIN)) {
		if($val[0] === 'n'){
			$arr_index++;
			if($arr_index == 3)
				break;
		}else{
			${'arr' . $arr_index}[] = $val;
		}
	}	
}else{
	$path = rtrim(fgets(STDIN));
	if(!is_file(__DIR__ . DIRECTORY_SEPARATOR . $path)){
		echo 'this is not a file';
	}else{	
		$res = fopen(__DIR__ . DIRECTORY_SEPARATOR . $path, 'r');
		$arr_index = 1;
		while($value = fgets($res)) {
			if(rtrim($value) !== ''){
				var_dump($value);
				${'arr' . $arr_index}[] = $value;
			}else{
				$arr_index++;
			}
		}
		fclose($res);
	}
}
echo 'array a:';
print_r($arr1);
echo "array b:";
print_r($arr2);

echo 'Массив [а] не содежит следующие элементы массива [б]:';
print_r(array_diff($arr2, $arr1));
echo 'Массив [б] не содежит следующие элементы массива [а]:';
print_r(array_diff($arr1, $arr2));