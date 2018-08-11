<?php

require_once '../library/db.php';

$config = parse_ini_file('../library/config.ini');
$log_dir = $config['log_dir'];

function log_debug($line, $msg, $log_dir) {
    $debugMsg = date("Y/m/d h:i:sa")." [".__FILE__.":".$line."] - ".$msg."\r\n";
    error_log($debugMsg, 3, $log_dir.'/debug/debug_'.date("Ymd").'.log');
    echo $msg.'</br>';
}

ini_set('max_execution_time', 0);

try {   
    Class_db::getInstance()->db_connect();      
    
    $general_var = Class_db::getInstance()->db_select_single('ref_general', array('general_desc'=>'compliance_summary_start'), NULL, 1);
    if (empty($general_var['general_remark']))
        throw new Exception('(ErrCode:8011) [' . __LINE__ . '] - Parameter date_start from ref_general empty');    
    $date_start = $general_var['general_remark'];
    $arr_dates = Class_db::getInstance()->db_select('dt_list_date', array(), NULL, '1,10', 0, array('date_start'=>$date_start, 'date_end'=>'CURDATE() - INTERVAL 1 DAY'));
    foreach ($arr_dates as $dates) {            
        $yr = substr($dates['DAY'],2,2);        
        $table_summary = 'y'.$yr.'_data_daily';    
        if (Class_db::getInstance()->db_count('information_schema.tables', array('TABLE_SCHEMA'=>'cems', 'TABLE_NAME'=>$table_summary)) < 1) {
            throw new Exception('(ErrCode:8012) [' . __LINE__ . '] - Summary table not exist');
        }        
        $arr_data = Class_db::getInstance()->db_select('dt_compliance_summary', array(), 'industrial_id', NULL, 0, array('table_summary'=>$table_summary, 'date_pool_start'=>$dates['DAY']));
        if (empty($arr_data)) {
            log_debug(__LINE__, 'No active stack data on this date = '.$dates['DAY'], $log_dir);
            continue;
        }
        foreach ($arr_data as $data) {
            if (empty($data['indAll_id'])) {
                log_debug(__LINE__, 'Empty industrial_premiseId for indAll_id = '.$data['indAll_id'], $log_dir);
                continue;
            } else if (empty($data['indParam_limitValue'])) {
                log_debug(__LINE__, 'Empty indParam_limitValue for indAll_id = '.$data['indAll_id'], $log_dir);
                continue;
            } else if (empty($data['indAll_stackNo'])) {
                log_debug(__LINE__, 'Empty indAll_stackNo for indAll_id = '.$data['indAll_id'], $log_dir);
                continue;
            }
            $table_name = 'z'.$yr.'_'.preg_replace("/[^a-zA-Z0-9]/", "", $data['industrial_premiseId']);
            if (Class_db::getInstance()->db_count_2('information_schema.tables', array('TABLE_SCHEMA'=>'cems', 'TABLE_NAME'=>$table_name)) < 1) {
                log_debug(__LINE__, 'Table not exist = '.$table_name, $log_dir);
                continue;
            }        
            log_debug(__LINE__, 'Dates = '.$dates['DAY'], $log_dir);
            log_debug(__LINE__, 'Table name = '.$table_name, $log_dir);
            log_debug(__LINE__, 'indAll_stackNo = '.$data['indAll_stackNo'], $log_dir);             
            log_debug(__LINE__, 'inputParam_id = '.$data['inputParam_id'], $log_dir);
            log_debug(__LINE__, 'indParam_limitValue = '.$data['indParam_limitValue'], $log_dir);
            $result = '51';
            $not_comply = 0;
            $total_datas = Class_db::getInstance()->db_count_2($table_name, array('DATE(data_timestamp)'=>$dates['DAY'], 'stack_id'=>$data['indAll_stackNo'], 'data_'.$data['inputParam_id']=>'<>0', ' data_'.$data['inputParam_id']=>'is not NULL'));
            $total_data = intval($total_datas);
            if ($total_data >= 1080) {
                if ($data['inputParam_id'] == '8') {
                    $not_comply = Class_db::getInstance()->db_count_2($table_name, array('DATE(data_timestamp)'=>$dates['DAY'], 'stack_id'=>$data['indAll_stackNo'], 'data_8'=>'>'.$data['indParam_limitValue']));
                    $result = $not_comply > 15 ? '53' : '52';
                } else {
                    $arr_30minute = Class_db::getInstance()->db_select('dt_30min_by_stack', array(), NULL, NULL, 0, array('tablename'=>$table_name, 'data_timestamp'=>$dates['DAY'], 'stack_id'=>$data['indAll_stackNo'], 'inputParam_id'=>$data['inputParam_id']));
                    foreach ($arr_30minute as $data_30minute) {
                        if (intVal($data_30minute['counts']) > 0 && intVal($data_30minute['counts']) <30)
                            $not_comply++;
                        else if (($data_30minute['sums']/$data_30minute['counts']) > (2*floatval($data['indParam_limitValue']))) 
                            $not_comply++;
                    }
                    $result = $not_comply > 1 ? '53' : '52';
                }
            }
            log_debug(__LINE__, 'Total Data = '.$total_data, $log_dir);
            log_debug(__LINE__, 'Total Not Comply = '.$not_comply, $log_dir);
            if (Class_db::getInstance()->db_update($table_summary, array('ydaily_notComply'=>$not_comply, 'ydaily_count'=>$total_data, 'ydaily_result'=>$result, 'ydaily_timeUpdate'=>'Now()'), array('ydaily_date'=>$dates['DAY'], 'industrial_id'=>$data['industrial_id'], 'inputParam_id'=>$data['inputParam_id'], 'stack_id'=>$data['indAll_stackNo'])) == 0) {
                //Class_db::getInstance()->db_insert($table_summary, array('ydaily_date'=>$dates['DAY'], 'industrial_id'=>$data['industrial_id'], 'stack_id'=>$data['indAll_stackNo'], 'inputParam_id'=>$data['inputParam_id'], 'ydaily_count'=>$total_data, 'ydaily_notComply'=>$not_comply, 'ydaily_result'=>$result));
            }
            if ($result == '53') {
                // insert t_response
            }
        }
        Class_db::getInstance()->db_update('ref_general', array('general_remark'=>$dates['DAY']), array('general_desc'=>'compliance_summary_start'));
    }
} catch (Exception $e) {
    error_log(date("Y/m/d h:i:sa") . " [" . __FILE__ . ":" . __LINE__ . "] - " . $e->getMessage() . "\r\n", 3, '../logs/error/error_' . date("Ymd") . '.log');
}
Class_db::getInstance()->db_close();
echo 'Done';
exit;

?>