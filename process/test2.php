<script type="text/javascript"> 
    
    
    var shown = true;
    setInterval(f_dcm_blink, 200);
    
    var cur_minute;
    var date_current = new Date();
    date_current.setDate(date_current.getDate() - 342);
    var date_fullyear = date_current.getFullYear();
    var date_year = date_fullyear.toString();
    date_year = date_year.substr(2,2); // new Date(Date.now()).toLocaleString()
    var minutes = date_current.getMinutes()>=10?date_current.getMinutes():'0'+date_current.getMinutes();
    var hours = date_current.getHours()>=10?date_current.getHours():'0'+date_current.getHours();
    cur_minute = hours+':'+minutes+':00';  
    //var stored_minute = cur_minute;
    var dcm_monitor_info = [
        {data_id:0, indAll_id:0, inputParam_id:0, total_rows:0, sum_rows:0, indParam_limitValue:0},
        {data_id:0, indAll_id:0, inputParam_id:0, total_rows:0, sum_rows:0, indParam_limitValue:0},
        {data_id:0, indAll_id:0, inputParam_id:0, total_rows:0, sum_rows:0, indParam_limitValue:0},
        {data_id:0, indAll_id:0, inputParam_id:0, total_rows:0, sum_rows:0, indParam_limitValue:0}
    ];
    
    $(document).ready(function () {
        
        pageSetUp();
        
        for (var i=0; i<4; i++) {
            $('#dcm_btn_removeMonitor_'+i).hide();
            $('#dcm_chart_'+i+'_1').html('<h1 class="padding-15"><i>** Compliance Monitor Slot is empty. Choose industrial premise\'s stack and input parameter from Limit Exceeding Report page to monitor.</i></h1>');
            $('#dcm_chart_'+i+'_2').html('');
            $('#dcm_chart_'+i+'_3').html('');
        }
        
        var arr_input_param = f_get_general_info_multiple('vw_monitor_compliance'); 
        $.each(arr_input_param, function(ux){            
            $('#dcm_btn_removeMonitor_'+ux).show();
            $('#dcm_indParam_id_'+ux).val(arr_input_param[ux].indParam_id);
            var units = '', chart_limit = '', total_rows = 0, sum_rows = 0;
            var data_plot = [];  
            var total_not_comply = 0;
            dcm_monitor_info[ux].indAll_id = arr_input_param[ux].indAll_id;
            dcm_monitor_info[ux].inputParam_id = arr_input_param[ux].inputParam_id;
            dcm_monitor_info[ux].indParam_limitValue = arr_input_param[ux].indParam_limitValue;
            if (arr_input_param[ux].inputParam_id >= '8') {
                if (check_table) {
                    var data_01 = f_get_general_info_multiple('z'+date_year+'_'+arr_input_param[ux].industrial_premiseId, {stack_id:arr_input_param[ux].indAll_stackNo, 'year(data_timestamp)':date_current.getFullYear(), 'month(data_timestamp)':date_current.getMonth()+1, 'day(data_timestamp)':date_current.getDate(), 'TIME(data_timestamp)':'<='+cur_minute}, null, null, 'data_timestamp');
                    $.each(data_01, function(u){
                        var times = data_01[u].data_timestamp;
                        var data_hour = parseInt(times.substr(11,2));
                        var data_minute = parseInt(times.substr(14,2));
                        //var data_index = data_hour*60 + data_minute;
                        var data_value = parseFloat(data_01[u]['data_'+arr_input_param[ux].inputParam_id]);
                        if (data_value != 0 && data_index < 1440) {
                            data_plot[data_index++] = {
                                x: Date.UTC(date_current.getFullYear(), date_current.getMonth(), date_current.getDate(), data_hour, data_minute),
                                y: parseFloat(data_value.toFixed(3))
                            };              
                            dcm_monitor_info[ux].data_id = parseInt(data_01[u].data_id);
                            sum_rows += data_value;
                            total_rows ++;
                            if (data_value > parseFloat(arr_input_param[ux].indParam_limitValue))
                                total_not_comply++;
                        } else if (data_value == 0) {
                            data_plot[data_index++] = {
                                x: Date.UTC(date_current.getFullYear(), date_current.getMonth(), date_current.getDate(), data_hour, data_minute),
                                y: null
                            };              
                            dcm_monitor_info[ux].data_id = parseInt(data_01[u].data_id);
                        }
                    });
                    
                }
                units = '%';
                chart_limit = parseInt(arr_input_param[ux].indParam_limitValue);
            } else {  
                if (check_table) {
                    var data_30 = f_get_general_info_multiple('dt_30_minute', {stack_id:arr_input_param[ux].indAll_stackNo, 'TIME(thirtyHourInterval)':'<='+cur_minute}, {tablename:'z'+date_year+'_'+arr_input_param[ux].industrial_premiseId, data_timestamp:mysqlDate(date_current)}, null, 'thirtyHourInterval');
                    $.each(data_30, function(u){
                        var times = data_30[u].thirtyHourInterval;
                        var data_hour = parseInt(times.substr(11,2));
                        var data_minute = parseInt(times.substr(14,2));
                        //var data_index = (data_hour*60 + data_minute) / 30;
                        var data_sum = parseFloat(data_30[u]['sum_'+arr_input_param[ux].inputParam_id]);
                        var data_count = parseFloat(data_30[u]['count_'+arr_input_param[ux].inputParam_id]);
                        if (data_count > 22 && data_index < 48 && data_sum != 0) {
                            var data_value = data_sum/data_count;
                            if (data_value > parseInt(2*arr_input_param[ux].indParam_limitValue)) {
                                data_plot[data_index++] = {
                                    x: Date.UTC(date_current.getFullYear(), date_current.getMonth(), date_current.getDate(), data_hour, data_minute),
                                    y: parseFloat(data_value.toFixed(3)),
                                    marker: { symbol: 'url(img/darkcloud.png)', height:25, width:35}
                                };
                                total_not_comply++;
                            } else {
                                data_plot[data_index++] = {
                                    x: Date.UTC(date_current.getFullYear(), date_current.getMonth(), date_current.getDate(), data_hour, data_minute),
                                    y: parseFloat(data_value.toFixed(3))
                                };
                            }  
                            dcm_monitor_info[ux].data_id = parseInt(data_30[u].data_id);                
                            sum_rows += data_value;
                            total_rows ++;
                        } else if (data_value == 0) {
                            data_plot[data_index++] = {
                                x: Date.UTC(date_current.getFullYear(), date_current.getMonth(), date_current.getDate(), data_hour, data_minute),
                                y: null
                            };
                        }
                    });
                }
                units = 'mg/m<sup>3</sup>';
                chart_limit = parseInt(arr_input_param[ux].indParam_limitValue)*2;
            }
            dcm_monitor_info[ux].sum_rows = sum_rows;
            dcm_monitor_info[ux].total_rows = total_rows;
            chart_dcm_1('dcm_chart_'+ux+'_1', '<p style="font-size:16px">'+arr_input_param[ux].wfGroup_name+',  '+arr_input_param[ux].city_desc+', '+arr_input_param[ux].state_desc+'</p>', 'Stack '+arr_input_param[ux].indAll_stackNo+', '+' Parameter '+arr_input_param[ux].inputParam_desc+', '+date_current.toDateString()+' (limit='+chart_limit+units+')', arr_input_param[ux].inputParam_desc, data_plot, chart_limit, ux, units);
            f_dcm_set_averageBar(arr_input_param[ux].inputParam_id, sum_rows, total_rows, parseInt(arr_input_param[ux].indParam_limitValue), units, ux, total_not_comply);
        });
                
    });
    
</script>   