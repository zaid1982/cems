<?php
//echo(apcu_fetch('arr_a'));
//$bar = 'ds';
//apcu_delete('foo');
//echo(apcu_fetch('foo'));
//echo "\n";
//$bar = 'NEVER GETS SET';
//apcu_add('foo', $bar);
echo(apcu_fetch('foo'));
echo "\n";
echo "Current version is PHP " . phpversion();
print_r(apcu_cache_info());
//$data[] = array('volume' => 67, 'edition' => 2);
//$data[] = array('volume' => 86, 'edition' => 1);
//$data[] = array('volume' => 85, 'edition' => 6);
//$data[] = array('volume' => 98, 'edition' => 2);
//$data[] = array('volume' => 86, 'edition' => 6);
//$data[] = array('volume' => 67, 'edition' => 7);
//
//foreach ($data as $key => $row) {
//    $volume[$key]  = $row['volume'];
//    $edition[$key] = $row['edition'];
//}

// Sort the data with volume descending, edition ascending
// Add $data as the last parameter, to sort by the common key
//array_multisort($volume, SORT_DESC, $edition, SORT_ASC, $data);

//print_r($data);
?>