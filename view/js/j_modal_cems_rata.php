<script src="js/plugin/summernote/summernote.min.js"></script>

<script type="text/javascript">
    
    var mqj_otable;
    var mqj_load_type;
    var data_mqj_raNormal;
    var mqj_otable_raNormal;
    var data_mqj_drift;
    var mqj_otable_drift1;
    var mqj_otable_drift2;
    var mqj_otable_drift3;
    var data_mqj_responseTime;
    var mqj_otable_responseTime;
    var data_mqj_supportDoc;
    var mqj_otable_supportDoc;
    var arr_param = [];
    var mqj_qaDrift_id;
    
    $(document).ready(function () {
        
        var arr_input_param = f_get_general_info_multiple('t_input_parameter');
        $.each(arr_input_param, function(u){
            arr_param[parseInt(arr_input_param[u].inputParam_id)] = arr_input_param[u].inputParam_desc;
        });
        
        $('#mqj_snote_qa_message').summernote({
            height: 150,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'italic', 'underline', 'clear']],
                ['fontname', ['fontname']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['height', ['height']],
                ['table', ['table']]
            ]
        });   
        
        $('#mqj_snote_wfTask_verify').summernote({
            height: 150,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'italic', 'underline', 'clear']],
                ['fontname', ['fontname']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['height', ['height']],
                ['table', ['table']]
            ],
            callbacks: {
                onChange: function(contents, $editable) {
                    $('#form_mqj_verify').bootstrapValidator('revalidateField', 'mqj_snote_wfTask_verify');
                    $('#mqj_snote_wfTask_verify').val(contents);
                }
            }
        });  
        
        $('#mqj_qa_dateActual').datepicker({
            dateFormat: 'yy-mm-dd',
            defaultDate: '0',
            changeMonth: true,
            changeYear: true,
            maxDate: '0', 
            prevText: '<i class="fa fa-chevron-left"></i>',
            nextText: '<i class="fa fa-chevron-right"></i>',
            showButtonPanel: true,
            closeText:'Clear',
            beforeShow: function( input ) {
		setTimeout(function() {
                    var clearButton = $(input ).datepicker( "widget" ).find( ".ui-datepicker-close" );
                    clearButton.unbind("click").bind("click",function(){$.datepicker._clearDate( input );});
                    }, 1 );
            },
            onSelect: function( input ) {
                $('#form_mqj_form').bootstrapValidator('revalidateField', 'mqj_qa_dateActual');
            }
        });
        
        $('#mqj_indAll_datePoolStart').datepicker({
            dateFormat: 'yy-mm-dd',
            defaultDate: '0',
            changeMonth: true,
            changeYear: true,
            minDate: '0', 
            prevText: '<i class="fa fa-chevron-left"></i>',
            nextText: '<i class="fa fa-chevron-right"></i>',
            showButtonPanel: true,
            closeText:'Clear',
            beforeShow: function( input ) {
		setTimeout(function() {
                    var clearButton = $(input ).datepicker( "widget" ).find( ".ui-datepicker-close" );
                    clearButton.unbind("click").bind("click",function(){$.datepicker._clearDate( input );});
                    }, 1 );
            },
            onSelect: function( input ) {
                $('#form_mqj_form').bootstrapValidator('revalidateField', 'mqj_indAll_datePoolStart');
            }
        });     
        
        $('#form_mqj_form').bootstrapValidator({     
            excluded: ':disabled',
            fields: {  
                mqj_qa_dateActual : {
                    validators : {
                        notEmpty: {
                            message: 'Actual Test Date is required'
                        }                     
                    }
                },
                mqj_indAll_datePoolStart : {
                    validators : {
                        notEmpty: {
                            message: 'Pooling Start Date is required'
                        }                     
                    }
                }
            }
        });
        
        $('#form_mqj_form_2').bootstrapValidator({      
            excluded: ':disabled',
            fields: {  
            }
        });
        
        var datatable_mqj_raNormal = undefined; 
        mqj_otable_raNormal = $('#datatable_mqj_raNormal').DataTable({
            "paging": false,
            "ordering": false,
            "autoWidth": false,
            "info": false,
            "bFilter": false,
            "preDrawCallback": function () {
                if (!datatable_mqj_raNormal) {
                    datatable_mqj_raNormal = new ResponsiveDatatablesHelper($('#datatable_mqj_raNormal'), breakpointDefinition);
                }
            },
            "rowCallback": function (nRow, aData, index) {
                datatable_mqj_raNormal.createExpandIcon(nRow);
            },
            "drawCallback": function (oSettings) {
                datatable_mqj_raNormal.respond();
                var api = this.api();
                var visibleRows=api.rows().data();
                if(visibleRows.length >= 1){
                    for(var j=0;j<visibleRows.length;j++){
                        var bootstrapValidator = $("#form_mqj_form_2").data('bootstrapValidator');
                        bootstrapValidator.addField('mqj_qaRa_rmAverage_'+visibleRows[j].qaRa_id, {validators:{notEmpty:{message:'Required'},numeric:{message:'Must numeric',thousandsSeparator: '',decimalSeparator: '.'}}});
                        bootstrapValidator.addField('mqj_qaRa_average_'+visibleRows[j].qaRa_id, {validators:{notEmpty:{message:'Required'},numeric:{message:'Must numeric',thousandsSeparator: '',decimalSeparator: '.'}}});
                        bootstrapValidator.addField('mqj_qaRa_difference_'+visibleRows[j].qaRa_id, {validators:{notEmpty:{message:'Required'},numeric:{message:'Must numeric',thousandsSeparator: '',decimalSeparator: '.'}}});
                        bootstrapValidator.addField('mqj_qaRa_confCoeff_'+visibleRows[j].qaRa_id, {validators:{notEmpty:{message:'Required'},numeric:{message:'Must numeric',thousandsSeparator: '',decimalSeparator: '.'}}});
                    }
                }
            },
            "aoColumns":
                [
                    {mData: 'inputParam_id', sClass: 'text-center',
                        mRender: function (data, type, row) {
                            return arr_param[parseInt(data)];
                        }
                    },
                    {mData: 'qaRa_rmAverage', sClass: 'padding-5 text-center',
                        mRender: function (data, type, row) {
                            $label = '<div class="form-group margin-bottom-0"><div class="col-md-12">' +
                                '<input type="text" class="input-sm form-control" style="width:100%" name="mqj_qaRa_rmAverage_'+row.qaRa_id+'" id="mqj_qaRa_rmAverage_'+row.qaRa_id+'" value="'+(data!=null?data:'')+'"/>' +
                                '</div></div>';
                            return $label;
                        }
                    },
                    {mData: 'qaRa_average', sClass: 'padding-5 text-center',
                        mRender: function (data, type, row) {
                            $label = '<div class="form-group margin-bottom-0"><div class="col-md-12">' +
                                '<input type="text" class="input-sm form-control" style="width:100%" name="mqj_qaRa_average_'+row.qaRa_id+'" id="mqj_qaRa_average_'+row.qaRa_id+'" value="'+(data!=null?data:'')+'"/>' +
                                '</div></div>';
                            return $label;
                        }
                    },
                    {mData: 'qaRa_applStandard', sClass: 'text-right'},
                    {mData: 'qaRa_difference', sClass: 'padding-5 text-center',
                        mRender: function (data, type, row) {
                            $label = '<div class="form-group margin-bottom-0"><div class="col-md-12">' +
                                '<input type="text" class="input-sm form-control" style="width:100%" name="mqj_qaRa_difference_'+row.qaRa_id+'" id="mqj_qaRa_difference_'+row.qaRa_id+'" value="'+(data!=null?data:'')+'" onkeyup="f_mqj_calc_ra('+row.qaRa_id+');"/>' +
                                '</div></div>';
                            return $label;
                        }
                    },
                    {mData: 'qaRa_confCoeff', sClass: 'padding-5 text-center',
                        mRender: function (data, type, row) {
                            $label = '<div class="form-group margin-bottom-0"><div class="col-md-12">' +
                                '<input type="text" class="input-sm form-control" style="width:100%" name="mqj_qaRa_confCoeff_'+row.qaRa_id+'" id="mqj_qaRa_confCoeff_'+row.qaRa_id+'" value="'+(data!=null?data:'')+'" onkeyup="f_mqj_calc_ra('+row.qaRa_id+');"/>' +
                                '</div></div>';
                            return $label;
                        }
                    },
                    {mData: 'qaRa_ra', sClass: 'text-right',
                        mRender: function (data, type, row) {
                            $label = '<span id="lmqj_qaRa_ra_'+row.qaRa_id+'">'+(data!=null?formattedNumber(data,3):'')+'</span>';
                            $label += '<input type="hidden" name="mqj_qaRa_ra_'+row.qaRa_id+'" id="mqj_qaRa_ra_'+row.qaRa_id+'"  value="'+(data!=null?data:'')+'" />';
                            $label += '<input type="hidden" name="mqj_qaRa_applStandard_'+row.qaRa_id+'" id="mqj_qaRa_applStandard_'+row.qaRa_id+'"  value="'+row.qaRa_applStandard+'" />';
                            return $label;
                        }
                    },
                    {mData: 'qaRa_status', sClass: 'padding-5 text-center',
                        mRender: function (data, type, row) {
                            $label = '';
                            if (data == '36')
                                $label = '<b class="badge bg-color-green"> Pass </b>';
                            else if (data == '6')
                                $label = '<b class="badge bg-color-red"> Fail </b>';
                            return $label;
                        }
                    }
                ]
        });
                        
        var datatable_mqj_drift1 = undefined; 
        mqj_otable_drift1 = $('#datatable_mqj_drift1').DataTable({
            "paging": false,
            "ordering": false,
            "autoWidth": false,
            "info": false,
            "bFilter": false,
            "preDrawCallback": function () {
                if (!datatable_mqj_drift1) {
                    datatable_mqj_drift1 = new ResponsiveDatatablesHelper($('#datatable_mqj_drift1'), breakpointDefinition);
                }
            },
            "rowCallback": function (nRow, aData, index) {
                datatable_mqj_drift1.createExpandIcon(nRow);
            },
            "drawCallback": function (oSettings) {
                datatable_mqj_drift1.respond();
                var api = this.api();
                var visibleRows=api.rows().data();
                if(visibleRows.length >= 1){
                    for(var j=0;j<visibleRows.length;j++){
                        mqj_qaDrift_id = visibleRows[j].qaDrift_id;
                        var bootstrapValidator = $("#form_mqj_form_2").data('bootstrapValidator');
                        bootstrapValidator.addField('mqj_qaDrift_date_1_'+mqj_qaDrift_id, {validators:{notEmpty:{message:'Required'}}});
                        bootstrapValidator.addField('mqj_qaDrift_time_1_'+mqj_qaDrift_id, {validators:{notEmpty:{message:'Required'}}});
                        bootstrapValidator.addField('mqj_qaDrift_result_1_'+mqj_qaDrift_id, {validators:{notEmpty:{message:'Required'},numeric:{message:'Must numeric',thousandsSeparator: '',decimalSeparator: '.'}}});
                        bootstrapValidator.addField('mqj_qaDrift_date_2_'+mqj_qaDrift_id, {validators:{notEmpty:{message:'Required'}}});
                        bootstrapValidator.addField('mqj_qaDrift_time_2_'+mqj_qaDrift_id, {validators:{notEmpty:{message:'Required'}}});
                        bootstrapValidator.addField('mqj_qaDrift_result_2_'+mqj_qaDrift_id, {validators:{notEmpty:{message:'Required'},numeric:{message:'Must numeric',thousandsSeparator: '',decimalSeparator: '.'}}});
                        bootstrapValidator.addField('mqj_qaDrift_date_3_'+mqj_qaDrift_id, {validators:{notEmpty:{message:'Required'}}});
                        bootstrapValidator.addField('mqj_qaDrift_time_3_'+mqj_qaDrift_id, {validators:{notEmpty:{message:'Required'}}});
                        bootstrapValidator.addField('mqj_qaDrift_result_3_'+mqj_qaDrift_id, {validators:{notEmpty:{message:'Required'},numeric:{message:'Must numeric',thousandsSeparator: '',decimalSeparator: '.'}}});
                        $('#mqj_qaDrift_date_1_'+mqj_qaDrift_id).datepicker({
                            dateFormat: 'yy-mm-dd',
                            defaultDate: '0',
                            changeMonth: true,
                            changeYear: true,
                            maxDate: '0', 
                            prevText: '<i class="fa fa-chevron-left"></i>',
                            nextText: '<i class="fa fa-chevron-right"></i>',
                            showButtonPanel: true,
                            closeText:'Clear',
                            beforeShow: function( input ) {
                                setTimeout(function() {
                                    var clearButton = $(input ).datepicker( "widget" ).find( ".ui-datepicker-close" );
                                    clearButton.unbind("click").bind("click",function(){$.datepicker._clearDate( input );});
                                    }, 1 );
                            },
                            onSelect: function( input ) {
                                $('#form_mqj_form_2').bootstrapValidator('revalidateField', $(this).attr('id'));
                            }
                        });
                        $('#mqj_qaDrift_time_1_'+mqj_qaDrift_id).timepicker({
                            modalBackdrop : true,
                            defaultTime : false,
                            showMeridian : false
                        });
                        $('#mqj_qaDrift_time_1_'+mqj_qaDrift_id).timepicker('setTime', visibleRows[j].qaDrift_time_1);
                        $('#mqj_qaDrift_time_1_'+mqj_qaDrift_id).on('change', function() {
                            $('#form_mqj_form_2').bootstrapValidator('revalidateField', $(this).attr('id'));
                        });
                        $('#mqj_qaDrift_date_2_'+mqj_qaDrift_id).datepicker({
                            dateFormat: 'yy-mm-dd',
                            defaultDate: '0',
                            changeMonth: true,
                            changeYear: true,
                            maxDate: '0', 
                            prevText: '<i class="fa fa-chevron-left"></i>',
                            nextText: '<i class="fa fa-chevron-right"></i>',
                            showButtonPanel: true,
                            closeText:'Clear',
                            beforeShow: function( input ) {
                                setTimeout(function() {
                                    var clearButton = $(input ).datepicker( "widget" ).find( ".ui-datepicker-close" );
                                    clearButton.unbind("click").bind("click",function(){$.datepicker._clearDate( input );});
                                    }, 1 );
                            },
                            onSelect: function( input ) {
                                $('#form_mqj_form_2').bootstrapValidator('revalidateField', $(this).attr('id'));
                            }
                        });
                        $('#mqj_qaDrift_time_2_'+mqj_qaDrift_id).timepicker({
                            modalBackdrop : true,
                            defaultTime : false,
                            showMeridian : false
                        });
                        $('#mqj_qaDrift_time_2_'+mqj_qaDrift_id).timepicker('setTime', visibleRows[j].qaDrift_time_2);
                        $('#mqj_qaDrift_time_2_'+mqj_qaDrift_id).on('change', function() {
                            $('#form_mqj_form_2').bootstrapValidator('revalidateField', $(this).attr('id'));
                        });
                        $('#mqj_qaDrift_date_3_'+mqj_qaDrift_id).datepicker({
                            dateFormat: 'yy-mm-dd',
                            defaultDate: '0',
                            changeMonth: true,
                            changeYear: true,
                            maxDate: '0', 
                            prevText: '<i class="fa fa-chevron-left"></i>',
                            nextText: '<i class="fa fa-chevron-right"></i>',
                            showButtonPanel: true,
                            closeText:'Clear',
                            beforeShow: function( input ) {
                                setTimeout(function() {
                                    var clearButton = $(input ).datepicker( "widget" ).find( ".ui-datepicker-close" );
                                    clearButton.unbind("click").bind("click",function(){$.datepicker._clearDate( input );});
                                    }, 1 );
                            },
                            onSelect: function( input ) {
                                $('#form_mqj_form_2').bootstrapValidator('revalidateField', $(this).attr('id'));
                            }
                        });
                        $('#mqj_qaDrift_time_3_'+mqj_qaDrift_id).timepicker({
                            modalBackdrop : true,
                            defaultTime : false,
                            showMeridian : false
                        });
                        $('#mqj_qaDrift_time_3_'+mqj_qaDrift_id).timepicker('setTime', visibleRows[j].qaDrift_time_3);
                        $('#mqj_qaDrift_time_3_'+mqj_qaDrift_id).on('change', function() {
                            $('#form_mqj_form_2').bootstrapValidator('revalidateField', $(this).attr('id'));
                        });
                    }
                }  
            },
            "aoColumns":
                [
                    {mData: 'inputParam_id', sClass: 'text-center',
                        mRender: function (data, type, row) {
                            return arr_param[parseInt(data)];
                        }
                    },
                    {mData: 'qaDrift_date_1', sClass: 'padding-5 text-center',
                        mRender: function (data, type, row) {
                            $label = '<div class="form-group margin-bottom-0"><div class="col-md-12">' +
                                '<input type="text" class="input-sm form-control" style="width:63%" name="mqj_qaDrift_date_1_'+row.qaDrift_id+'" id="mqj_qaDrift_date_1_'+row.qaDrift_id+'" value="'+(data!=null?data:'')+'" readonly/>&nbsp;' +
                                '<input type="text" class="input-sm form-control" style="width:34%" name="mqj_qaDrift_time_1_'+row.qaDrift_id+'" id="mqj_qaDrift_time_1_'+row.qaDrift_id+'" readonly/>' +
                                '</div></div>';
                            return $label;
                        }
                    },
                    {mData: 'qaDrift_result_1', sClass: 'padding-5 text-center',
                        mRender: function (data, type, row) {
                            $label = '<div class="form-group margin-bottom-0"><div class="col-md-12">' +
                                '<input type="text" class="input-sm form-control" style="width:100%" name="mqj_qaDrift_result_1_'+row.qaDrift_id+'" id="mqj_qaDrift_result_1_'+row.qaDrift_id+'" value="'+(data!=null?data:'')+'"/>' +
                                '</div></div>';
                            return $label;
                        }
                    },
                    {mData: 'qaDrift_date_2', sClass: 'padding-5 text-center',
                        mRender: function (data, type, row) {
                            $label = '<div class="form-group margin-bottom-0"><div class="col-md-12">' +
                                '<input type="text" class="input-sm form-control" style="width:63%" name="mqj_qaDrift_date_2_'+row.qaDrift_id+'" id="mqj_qaDrift_date_2_'+row.qaDrift_id+'" value="'+(data!=null?data:'')+'" readonly/>&nbsp;' +
                                '<input type="text" class="input-sm form-control" style="width:34%" name="mqj_qaDrift_time_2_'+row.qaDrift_id+'" id="mqj_qaDrift_time_2_'+row.qaDrift_id+'" readonly/>' +
                                '</div></div>';
                            return $label;
                        }
                    },
                    {mData: 'qaDrift_result_2', sClass: 'padding-5 text-center',
                        mRender: function (data, type, row) {
                            $label = '<div class="form-group margin-bottom-0"><div class="col-md-12">' +
                                '<input type="text" class="input-sm form-control" style="width:100%" name="mqj_qaDrift_result_2_'+row.qaDrift_id+'" id="mqj_qaDrift_result_2_'+row.qaDrift_id+'" value="'+(data!=null?data:'')+'"/>' +
                                '</div></div>';
                            return $label;
                        }
                    },
                    {mData: 'qaDrift_date_3', sClass: 'padding-5 text-center',
                        mRender: function (data, type, row) {
                            $label = '<div class="form-group margin-bottom-0"><div class="col-md-12">' +
                                '<input type="text" class="input-sm form-control" style="width:63%" name="mqj_qaDrift_date_3_'+row.qaDrift_id+'" id="mqj_qaDrift_date_3_'+row.qaDrift_id+'" value="'+(data!=null?data:'')+'" readonly/>&nbsp;' +
                                '<input type="text" class="input-sm form-control" style="width:34%" name="mqj_qaDrift_time_3_'+row.qaDrift_id+'" id="mqj_qaDrift_time_3_'+row.qaDrift_id+'" readonly/>' +
                                '</div></div>';
                            return $label;
                        }
                    },
                    {mData: 'qaDrift_result_3', sClass: 'padding-5 text-center',
                        mRender: function (data, type, row) {
                            $label = '<div class="form-group margin-bottom-0"><div class="col-md-12">' +
                                '<input type="text" class="input-sm form-control" style="width:100%" name="mqj_qaDrift_result_3_'+row.qaDrift_id+'" id="mqj_qaDrift_result_3_'+row.qaDrift_id+'" value="'+(data!=null?data:'')+'"/>' +
                                '</div></div>';
                            return $label;
                        }
                    }
                ]
        });
        
        var datatable_mqj_drift2 = undefined; 
        mqj_otable_drift2 = $('#datatable_mqj_drift2').DataTable({
            "paging": false,
            "ordering": false,
            "autoWidth": false,
            "info": false,
            "bFilter": false,
            "preDrawCallback": function () {
                if (!datatable_mqj_drift2) {
                    datatable_mqj_drift2 = new ResponsiveDatatablesHelper($('#datatable_mqj_drift2'), breakpointDefinition);
                }
            },
            "rowCallback": function (nRow, aData, index) {
                datatable_mqj_drift2.createExpandIcon(nRow);
            },
            "drawCallback": function (oSettings) {
                datatable_mqj_drift2.respond();
                var api = this.api();
                var visibleRows=api.rows().data();
                if(visibleRows.length >= 1){
                    for(var j=0;j<visibleRows.length;j++){
                        mqj_qaDrift_id = visibleRows[j].qaDrift_id;
                        var bootstrapValidator = $("#form_mqj_form_2").data('bootstrapValidator');
                        bootstrapValidator.addField('mqj_qaDrift_date_4_'+mqj_qaDrift_id, {validators:{notEmpty:{message:'Required'}}});
                        bootstrapValidator.addField('mqj_qaDrift_time_4_'+mqj_qaDrift_id, {validators:{notEmpty:{message:'Required'}}});
                        bootstrapValidator.addField('mqj_qaDrift_result_4_'+mqj_qaDrift_id, {validators:{notEmpty:{message:'Required'},numeric:{message:'Must numeric',thousandsSeparator: '',decimalSeparator: '.'}}});
                        bootstrapValidator.addField('mqj_qaDrift_date_5_'+mqj_qaDrift_id, {validators:{notEmpty:{message:'Required'}}});
                        bootstrapValidator.addField('mqj_qaDrift_time_5_'+mqj_qaDrift_id, {validators:{notEmpty:{message:'Required'}}});
                        bootstrapValidator.addField('mqj_qaDrift_result_5_'+mqj_qaDrift_id, {validators:{notEmpty:{message:'Required'},numeric:{message:'Must numeric',thousandsSeparator: '',decimalSeparator: '.'}}});
                        bootstrapValidator.addField('mqj_qaDrift_date_6_'+mqj_qaDrift_id, {validators:{notEmpty:{message:'Required'}}});
                        bootstrapValidator.addField('mqj_qaDrift_time_6_'+mqj_qaDrift_id, {validators:{notEmpty:{message:'Required'}}});
                        bootstrapValidator.addField('mqj_qaDrift_result_6_'+mqj_qaDrift_id, {validators:{notEmpty:{message:'Required'},numeric:{message:'Must numeric',thousandsSeparator: '',decimalSeparator: '.'}}});
                        $('#mqj_qaDrift_date_4_'+mqj_qaDrift_id).datepicker({
                            dateFormat: 'yy-mm-dd',
                            defaultDate: '0',
                            changeMonth: true,
                            changeYear: true,
                            maxDate: '0', 
                            prevText: '<i class="fa fa-chevron-left"></i>',
                            nextText: '<i class="fa fa-chevron-right"></i>',
                            showButtonPanel: true,
                            closeText:'Clear',
                            beforeShow: function( input ) {
                                setTimeout(function() {
                                    var clearButton = $(input ).datepicker( "widget" ).find( ".ui-datepicker-close" );
                                    clearButton.unbind("click").bind("click",function(){$.datepicker._clearDate( input );});
                                    }, 1 );
                            },
                            onSelect: function( input ) {
                                $('#form_mqj_form_2').bootstrapValidator('revalidateField', $(this).attr('id'));
                            }
                        });
                        $('#mqj_qaDrift_time_4_'+mqj_qaDrift_id).timepicker({
                            modalBackdrop : true,
                            defaultTime : false,
                            showMeridian : false
                        });
                        $('#mqj_qaDrift_time_4_'+mqj_qaDrift_id).timepicker('setTime', visibleRows[j].qaDrift_time_4);
                        $('#mqj_qaDrift_time_4_'+mqj_qaDrift_id).on('change', function() {
                            $('#form_mqj_form_2').bootstrapValidator('revalidateField', $(this).attr('id'));
                        });
                        $('#mqj_qaDrift_date_5_'+mqj_qaDrift_id).datepicker({
                            dateFormat: 'yy-mm-dd',
                            defaultDate: '0',
                            changeMonth: true,
                            changeYear: true,
                            maxDate: '0', 
                            prevText: '<i class="fa fa-chevron-left"></i>',
                            nextText: '<i class="fa fa-chevron-right"></i>',
                            showButtonPanel: true,
                            closeText:'Clear',
                            beforeShow: function( input ) {
                                setTimeout(function() {
                                    var clearButton = $(input ).datepicker( "widget" ).find( ".ui-datepicker-close" );
                                    clearButton.unbind("click").bind("click",function(){$.datepicker._clearDate( input );});
                                    }, 1 );
                            },
                            onSelect: function( input ) {
                                $('#form_mqj_form_5').bootstrapValidator('revalidateField', $(this).attr('id'));
                            }
                        });
                        $('#mqj_qaDrift_time_5_'+mqj_qaDrift_id).timepicker({
                            modalBackdrop : true,
                            defaultTime : false,
                            showMeridian : false
                        });
                        $('#mqj_qaDrift_time_5_'+mqj_qaDrift_id).timepicker('setTime', visibleRows[j].qaDrift_time_5);
                        $('#mqj_qaDrift_time_5_'+mqj_qaDrift_id).on('change', function() {
                            $('#form_mqj_form_2').bootstrapValidator('revalidateField', $(this).attr('id'));
                        });
                        $('#mqj_qaDrift_date_6_'+mqj_qaDrift_id).datepicker({
                            dateFormat: 'yy-mm-dd',
                            defaultDate: '0',
                            changeMonth: true,
                            changeYear: true,
                            maxDate: '0', 
                            prevText: '<i class="fa fa-chevron-left"></i>',
                            nextText: '<i class="fa fa-chevron-right"></i>',
                            showButtonPanel: true,
                            closeText:'Clear',
                            beforeShow: function( input ) {
                                setTimeout(function() {
                                    var clearButton = $(input ).datepicker( "widget" ).find( ".ui-datepicker-close" );
                                    clearButton.unbind("click").bind("click",function(){$.datepicker._clearDate( input );});
                                    }, 1 );
                            },
                            onSelect: function( input ) {
                                $('#form_mqj_form_2').bootstrapValidator('revalidateField', $(this).attr('id'));
                            }
                        });
                        $('#mqj_qaDrift_time_6_'+mqj_qaDrift_id).timepicker({
                            modalBackdrop : true,
                            defaultTime : false,
                            showMeridian : false
                        });
                        $('#mqj_qaDrift_time_6_'+mqj_qaDrift_id).timepicker('setTime', visibleRows[j].qaDrift_time_6);
                        $('#mqj_qaDrift_time_6_'+mqj_qaDrift_id).on('change', function() {
                            $('#form_mqj_form_2').bootstrapValidator('revalidateField', $(this).attr('id'));
                        });
                    }
                }  
            },
            "aoColumns":
                [
                    {mData: 'inputParam_id', sClass: 'text-center',
                        mRender: function (data, type, row) {
                            return arr_param[parseInt(data)];
                        }
                    },
                    {mData: 'qaDrift_date_4', sClass: 'padding-5 text-center',
                        mRender: function (data, type, row) {
                            $label = '<div class="form-group margin-bottom-0"><div class="col-md-12">' +
                                '<input type="text" class="input-sm form-control" style="width:63%" name="mqj_qaDrift_date_4_'+row.qaDrift_id+'" id="mqj_qaDrift_date_4_'+row.qaDrift_id+'" value="'+(data!=null?data:'')+'" readonly/>&nbsp;' +
                                '<input type="text" class="input-sm form-control" style="width:34%" name="mqj_qaDrift_time_4_'+row.qaDrift_id+'" id="mqj_qaDrift_time_4_'+row.qaDrift_id+'" readonly/>' +
                                '</div></div>';
                            return $label;
                        }
                    },
                    {mData: 'qaDrift_result_4', sClass: 'padding-5 text-center',
                        mRender: function (data, type, row) {
                            $label = '<div class="form-group margin-bottom-0"><div class="col-md-12">' +
                                '<input type="text" class="input-sm form-control" style="width:100%" name="mqj_qaDrift_result_4_'+row.qaDrift_id+'" id="mqj_qaDrift_result_4_'+row.qaDrift_id+'" value="'+(data!=null?data:'')+'"/>' +
                                '</div></div>';
                            return $label;
                        }
                    },
                    {mData: 'qaDrift_date_5', sClass: 'padding-5 text-center',
                        mRender: function (data, type, row) {
                            $label = '<div class="form-group margin-bottom-0"><div class="col-md-12">' +
                                '<input type="text" class="input-sm form-control" style="width:63%" name="mqj_qaDrift_date_5_'+row.qaDrift_id+'" id="mqj_qaDrift_date_5_'+row.qaDrift_id+'" value="'+(data!=null?data:'')+'" readonly/>&nbsp;' +
                                '<input type="text" class="input-sm form-control" style="width:34%" name="mqj_qaDrift_time_5_'+row.qaDrift_id+'" id="mqj_qaDrift_time_5_'+row.qaDrift_id+'" readonly/>' +
                                '</div></div>';
                            return $label;
                        }
                    },
                    {mData: 'qaDrift_result_5', sClass: 'padding-5 text-center',
                        mRender: function (data, type, row) {
                            $label = '<div class="form-group margin-bottom-0"><div class="col-md-12">' +
                                '<input type="text" class="input-sm form-control" style="width:100%" name="mqj_qaDrift_result_5_'+row.qaDrift_id+'" id="mqj_qaDrift_result_5_'+row.qaDrift_id+'" value="'+(data!=null?data:'')+'"/>' +
                                '</div></div>';
                            return $label;
                        }
                    },
                    {mData: 'qaDrift_date_6', sClass: 'padding-5 text-center',
                        mRender: function (data, type, row) {
                            $label = '<div class="form-group margin-bottom-0"><div class="col-md-12">' +
                                '<input type="text" class="input-sm form-control" style="width:63%" name="mqj_qaDrift_date_6_'+row.qaDrift_id+'" id="mqj_qaDrift_date_6_'+row.qaDrift_id+'" value="'+(data!=null?data:'')+'" readonly/>&nbsp;' +
                                '<input type="text" class="input-sm form-control" style="width:34%" name="mqj_qaDrift_time_6_'+row.qaDrift_id+'" id="mqj_qaDrift_time_6_'+row.qaDrift_id+'" readonly/>' +
                                '</div></div>';
                            return $label;
                        }
                    },
                    {mData: 'qaDrift_result_6', sClass: 'padding-5 text-center',
                        mRender: function (data, type, row) {
                            $label = '<div class="form-group margin-bottom-0"><div class="col-md-12">' +
                                '<input type="text" class="input-sm form-control" style="width:100%" name="mqj_qaDrift_result_6_'+row.qaDrift_id+'" id="mqj_qaDrift_result_6_'+row.qaDrift_id+'" value="'+(data!=null?data:'')+'"/>' +
                                '</div></div>';
                            return $label;
                        }
                    }
                ]
        });
        
        var datatable_mqj_drift3 = undefined; 
        mqj_otable_drift3 = $('#datatable_mqj_drift3').DataTable({
            "paging": false,
            "ordering": false,
            "autoWidth": false,
            "info": false,
            "bFilter": false,
            "preDrawCallback": function () {
                if (!datatable_mqj_drift3) {
                    datatable_mqj_drift3 = new ResponsiveDatatablesHelper($('#datatable_mqj_drift3'), breakpointDefinition);
                }
            },
            "rowCallback": function (nRow, aData, index) {
                datatable_mqj_drift3.createExpandIcon(nRow);
            },
            "drawCallback": function (oSettings) {
                datatable_mqj_drift3.respond();
                var api = this.api();
                var visibleRows=api.rows().data();
                if(visibleRows.length >= 1){
                    for(var j=0;j<visibleRows.length;j++){
                        mqj_qaDrift_id = visibleRows[j].qaDrift_id;
                        var bootstrapValidator = $("#form_mqj_form_2").data('bootstrapValidator');
                        bootstrapValidator.addField('mqj_qaDrift_date_7_'+mqj_qaDrift_id, {validators:{notEmpty:{message:'Required'}}});
                        bootstrapValidator.addField('mqj_qaDrift_time_7_'+mqj_qaDrift_id, {validators:{notEmpty:{message:'Required'}}});
                        bootstrapValidator.addField('mqj_qaDrift_result_7_'+mqj_qaDrift_id, {validators:{notEmpty:{message:'Required'},numeric:{message:'Must numeric',thousandsSeparator: '',decimalSeparator: '.'}}});
                        $('#mqj_qaDrift_date_7_'+mqj_qaDrift_id).datepicker({
                            dateFormat: 'yy-mm-dd',
                            defaultDate: '0',
                            changeMonth: true,
                            changeYear: true,
                            maxDate: '0', 
                            prevText: '<i class="fa fa-chevron-left"></i>',
                            nextText: '<i class="fa fa-chevron-right"></i>',
                            showButtonPanel: true,
                            closeText:'Clear',
                            beforeShow: function( input ) {
                                setTimeout(function() {
                                    var clearButton = $(input ).datepicker( "widget" ).find( ".ui-datepicker-close" );
                                    clearButton.unbind("click").bind("click",function(){$.datepicker._clearDate( input );});
                                    }, 1 );
                            },
                            onSelect: function( input ) {
                                $('#form_mqj_form_2').bootstrapValidator('revalidateField', $(this).attr('id'));
                            }
                        });
                        $('#mqj_qaDrift_time_7_'+mqj_qaDrift_id).timepicker({
                            modalBackdrop : true,
                            defaultTime : false,
                            showMeridian : false
                        });
                        $('#mqj_qaDrift_time_7_'+mqj_qaDrift_id).timepicker('setTime', visibleRows[j].qaDrift_time_7);
                        $('#mqj_qaDrift_time_7_'+mqj_qaDrift_id).on('change', function() {
                            $('#form_mqj_form_2').bootstrapValidator('revalidateField', $(this).attr('id'));
                        });
                    }
                }                
            },
            "aoColumns":
                [
                    {mData: 'inputParam_id', sClass: 'text-center',
                        mRender: function (data, type, row) {
                            return arr_param[parseInt(data)];
                        }
                    },
                    {mData: 'qaDrift_date_7', sClass: 'padding-5 text-center',
                        mRender: function (data, type, row) {
                            $label = '<div class="form-group margin-bottom-0"><div class="col-md-12">' +
                                '<input type="text" class="input-sm form-control" style="width:62%" name="mqj_qaDrift_date_7_'+row.qaDrift_id+'" id="mqj_qaDrift_date_7_'+row.qaDrift_id+'" value="'+(data!=null?data:'')+'" readonly/>&nbsp;' +
                                '<input type="text" class="input-sm form-control" style="width:35%" name="mqj_qaDrift_time_7_'+row.qaDrift_id+'" id="mqj_qaDrift_time_7_'+row.qaDrift_id+'" readonly/>' +
                                '</div></div>';
                            return $label;
                        }
                    },
                    {mData: 'qaDrift_result_7', sClass: 'padding-5 text-center',
                        mRender: function (data, type, row) {
                            $label = '<div class="form-group margin-bottom-0"><div class="col-md-12">' +
                                '<input type="text" class="input-sm form-control" style="width:100%" name="mqj_qaDrift_result_7_'+row.qaDrift_id+'" id="mqj_qaDrift_result_7_'+row.qaDrift_id+'" value="'+(data!=null?data:'')+'"/>' +
                                '</div></div>';
                            return $label;
                        }
                    },
                    {mData: 'qaDrift_result', sClass: 'padding-5 text-center',
                        mRender: function (data, type, row) {
                            $label = '';
                            if (data == '36')
                                $label = '<b class="badge bg-color-green"> Pass </b>';
                            else if (data == '6')
                                $label = '<b class="badge bg-color-red"> Fail </b>';
                            return $label;
                        }
                    }
                ]
        });
        
        var datatable_mqj_responseTime = undefined; 
        mqj_otable_responseTime = $('#datatable_mqj_responseTime').DataTable({
            "paging": false,
            "ordering": false,
            "autoWidth": false,
            "info": false,
            "bFilter": false,
            "preDrawCallback": function () {
                if (!datatable_mqj_responseTime) {
                    datatable_mqj_responseTime = new ResponsiveDatatablesHelper($('#datatable_mqj_responseTime'), breakpointDefinition);
                }
            },
            "rowCallback": function (nRow, aData, index) {
                datatable_mqj_responseTime.createExpandIcon(nRow);
            },
            "drawCallback": function (oSettings) {
                datatable_mqj_responseTime.respond();
                var api = this.api();
                var visibleRows=api.rows().data();
                if(visibleRows.length >= 1){
                    for(var j=0;j<visibleRows.length;j++){
                        var bootstrapValidator = $("#form_mqj_form_2").data('bootstrapValidator');
                        bootstrapValidator.addField('mqj_qaRespTime_value_'+visibleRows[j].qaRespTime_id, {validators:{notEmpty:{message:'Required'},numeric:{message:'Must numeric',thousandsSeparator: '',decimalSeparator: '.'}}});
                    }
                }
            },
            "aoColumns":
                [
                    {mData: 'inputParam_id', sClass: 'text-center',
                        mRender: function (data, type, row) {
                            return arr_param[parseInt(data)];
                        }
                    },
                    {mData: 'qaRespTime_value', sClass: 'padding-5 text-center',
                        mRender: function (data, type, row) {
                            $label = '<div class="form-group margin-bottom-0"><div class="col-md-12">' +
                                '<input type="text" class="input-sm form-control" style="width:100%" name="mqj_qaRespTime_value_'+row.qaRespTime_id+'" id="mqj_qaRespTime_value_'+row.qaRespTime_id+'" value="'+(data!=null?data:'')+'"/>' +
                                '</div></div>';
                            return $label;
                        }
                    },
                    {mData: 'qaRespTime_result', sClass: 'padding-5 text-center',
                        mRender: function (data, type, row) {
                            $label = '';
                            if (data == '36')
                                $label = '<b class="badge bg-color-green"> Pass </b>';
                            else if (data == '6')
                                $label = '<b class="badge bg-color-red"> Fail </b>';
                            return $label;
                        }
                    }
                ]
        });
        
        $('#form_mqj_doc').bootstrapValidator({
            excluded: ':disabled',
            fields: {  
                mqj_supDoc_file: {
                    validators: {
                        notEmpty: {
                            message: 'Supporting Attachment File is required'
                        },
                        file: {
                            extension: 'pdf',
                            type: 'application/pdf',
                            maxSize: '20000000',
                            message: 'Only PDF file format max 20MB allowed.'
                        }
                    }
                },
                mqj_supDoc_name : {
                    validators: {
                        notEmpty: {
                            message: 'Supporting Attachment Name is required'
                        },
                        stringLength : {
                            max : 30,
                            message : 'Supporting Attachment Name must be not more than 30 characters long'
                        }
                    }
                }
            }
        });
        
        var datatable_mqj_supportDoc = undefined; 
        mqj_otable_supportDoc = $('#datatable_mqj_supportDoc').DataTable({
            "paging": false,
            "ordering": false,
            "autoWidth": false,
            "info": false,
            "bFilter": false,
            "preDrawCallback": function () {
                if (!datatable_mqj_supportDoc) {
                    datatable_mqj_supportDoc = new ResponsiveDatatablesHelper($('#datatable_mqj_supportDoc'), breakpointDefinition);
                }
            },
            "rowCallback": function (nRow, aData, index) {
                datatable_mqj_supportDoc.createExpandIcon(nRow);
                var info = mqj_otable_supportDoc.page.info();
                $('td', nRow).eq(0).html(info.page * info.length + (index + 1));
            },
            "drawCallback": function (oSettings) {
                datatable_mqj_supportDoc.respond();
            },
            "aoColumns":
                [
                    {mData: null},
                    {mData: 'document_name'},
                    {mData: 'document_uplname'},
                    {mData: null, sClass: 'text-center',
                        mRender: function (data, type, row) {
                            $label = '';
                            if (row.document_id != null)
                                $label += '<a type="button" class="btn btn-success btn-xs" title="Download Support Document" href="process/download.php?doc_id='+row.document_id+'"><i class="fa fa-download"></i></a>';
                            $label += ' <button type="button" class="btn btn-danger btn-xs mqj_hide_view" title="Delete" onclick="f_mqj_delete_supportDoc ('+row.qaDoc_id+');"><i class="fa fa-trash-o"></i></button>';
                            return $label;
                        }
                    }
                ]
        });
        
        $('#mqj_btn_add_supDoc').on('click', function () {
            var bootstrapValidator = $("#form_mqj_doc").data('bootstrapValidator');
            bootstrapValidator.validate();
            if (bootstrapValidator.isValid()) {       
                $('#modal_waiting').on('shown.bs.modal', function(e){      
                    var formData = new FormData($('#form_mqj_doc')[0]);
                    formData.append('funct', 'save_qa_doc_j');
                    formData.append('mqj_qa_id', $('#mqj_qa_id').val());
                    $.ajax({
                        url: "process/p_registration.php",
                        type: "POST",
                        dataType: "json",
                        async: false,
                        data: formData,
                        cache: false,
                        contentType: false,
                        processData: false,
                        xhr: function() {
                            myXhr = $.ajaxSettings.xhr();
                            return myXhr;
                        },
                        success: function(resp) {
                            if (resp.success == true){ 
                                f_notify(1, 'Success', 'Supporting Document successfully added.');
                                $('#form_mqj_doc').trigger('reset');
                                $('#form_mqj_doc').bootstrapValidator('resetForm', true);
                                data_mqj_supportDoc = f_get_general_info_multiple('dt_qa_document', {qa_id:$('#mqj_qa_id').val()}, '', '', 'qa_id');
                                f_dataTable_draw(mqj_otable_supportDoc, data_mqj_supportDoc, 'datatable_mqj_supportDoc', 4);
                            } else {
                                f_notify(2, 'Error', resp.errors);
                            }
                        },
                        error: function() {
                            f_notify(2, 'Error', errMsg_default);
                        }
                    });
                    $('#modal_waiting').modal('hide');
                    $(this).unbind(e);
                }).modal('show');
            } else {
                f_notify(2, 'Error', errMsg_validation);    
                return false;
            }
        }); 
        
        $('#form_mqj_verify').bootstrapValidator({
            excluded: ':disabled',
            fields: {  
                mqj_result : {
                    validators: {
                        notEmpty: {
                            message: 'Verification Result is required'
                        }
                    }
                },
                mqj_snote_wfTask_verify : {
                    validators: {
                        callback: {
                            message: 'Message/Feedback is required',
                            callback: function(value, validator, $field) {
                                var code = $('[name="mqj_snote_wfTask_verify"]').summernote('code');
                                return (code !== '' && code !== '<p><br></p>');
                            }
                        }
                    }
                }
            }
        });
        
        $('#modal_cems_rata').on('hide.bs.modal', function() {
            $.each(data_mqj_raNormal, function(u){
                var bootstrapValidator = $("#form_mqj_form_2").data('bootstrapValidator');
                bootstrapValidator.removeField('mqj_qaRa_rmAverage_'+data_mqj_raNormal[u].qaRa_id);
                bootstrapValidator.removeField('mqj_qaRa_average_'+data_mqj_raNormal[u].qaRa_id);
                bootstrapValidator.removeField('mqj_qaRa_difference_'+data_mqj_raNormal[u].qaRa_id);
                bootstrapValidator.removeField('mqj_qaRa_confCoeff_'+data_mqj_raNormal[u].qaRa_id);
            });
            $.each(data_mqj_drift, function(u){
                var bootstrapValidator = $("#form_mqj_form_2").data('bootstrapValidator');
                for (var ux=1;ux<=7;ux++){
                    bootstrapValidator.removeField('mqj_qaDrift_date_'+ux+'_'+data_mqj_drift[u].qaDrift_id);
                    bootstrapValidator.removeField('mqj_qaDrift_time_'+ux+'_'+data_mqj_drift[u].qaDrift_id);
                    bootstrapValidator.removeField('mqj_qaDrift_result_'+ux+'_'+data_mqj_drift[u].qaDrift_id);
                }
            });
            $.each(data_mqj_responseTime, function(u){
                var bootstrapValidator = $("#form_mqj_form_2").data('bootstrapValidator');
                bootstrapValidator.removeField('mqj_qaRespTime_value_'+data_mqj_responseTime[u].qaRa_id);
            });
        }); 
        
        $('#mqj_btn_save').on('click', function () {
            $('#modal_waiting').on('shown.bs.modal', function(e){   
                if (($('#mqj_wfTaskType_id').val() == '37' && mqj_otable == 'icm') || ($('#mqj_wfTaskType_id').val() == '91' && mqj_otable == 'iqa')) {
                    $('#mqj_funct').val('save_qa_j');
                    $('#mqj_qa_message').val($('[name="mqj_snote_qa_message"]').summernote('code'));
                    if (f_submit_forms('form_mqj_base,#form_mqj_form,#form_mqj_form_2', 'p_registration', 'Data successfully saved.')) {
                        data_mqj_raNormal = f_get_general_info_multiple('t_qa_ra', {qa_id:$('#mqj_qa_id').val()});
                        f_dataTable_draw(mqj_otable_raNormal, data_mqj_raNormal, 'datatable_mqj_raNormal', 8);
                        data_mqj_drift = f_get_general_info_multiple('t_qa_drift', {qa_id:$('#mqj_qa_id').val()});
                        f_dataTable_draw(mqj_otable_drift1, data_mqj_drift, 'datatable_mqj_drift1', 7);
                        f_dataTable_draw(mqj_otable_drift2, data_mqj_drift, 'datatable_mqj_drift2', 7);
                        f_dataTable_draw(mqj_otable_drift3, data_mqj_drift, 'datatable_mqj_drift3', 4);
                        data_mqj_responseTime = f_get_general_info_multiple('t_qa_responsetime', {qa_id:$('#mqj_qa_id').val()});
                        f_dataTable_draw(mqj_otable_responseTime, data_mqj_responseTime, 'datatable_mqj_responseTime', 3);
                    }
                } else if (($('#mqj_wfTaskType_id').val() == '38' && mqj_otable == 'itp')) {
                    $('#mqj_funct').val('save_verify_initial_RATA_j');
                    $('#mqj_wfTask_verify').val($('[name="mqj_snote_wfTask_verify"]').summernote('code'));
                    f_submit_forms('form_mqj_base,#form_mqj_verify', 'p_registration', 'Data successfully saved.');
                } else {  
                    f_notify(2, 'Error', errMsg_default);    
                    return false;
                }
                $('#modal_waiting').modal('hide');
                $(this).unbind(e);
            }).modal('show'); 
        });
        
        $('#mqj_btn_submit').on('click', function () {
            var submit_status = '', submit_group = '', condition_no = '';
            if (mqj_otable == 'icm' && $('#mqj_wfTaskType_id').val() == '37') {
                var bootstrapValidator = $("#form_mqj_form_2").data('bootstrapValidator');
                bootstrapValidator.validate();
                if (!bootstrapValidator.isValid()) {         
                    f_notify(2, 'Error', errMsg_validation);    
                    return false;
                }
                var bootstrapValidator = $("#form_mqj_form").data('bootstrapValidator');
                bootstrapValidator.validate();
                if (!bootstrapValidator.isValid()) {         
                    f_notify(2, 'Error', errMsg_validation);    
                    return false;
                }
                $.SmartMessageBox({
                    title : "<i class='fa fa-exclamation-circle'></i> Confirmation!",
                    content : "Are you sure to submit this Initial RATA Report?",
                    buttons : '[No][Yes]'
                }, function(ButtonPressed) {
                    if (ButtonPressed === "Yes") {
                        $('#modal_waiting').on('shown.bs.modal', function(e){  
                            $('#mqj_funct').val('save_qa_j');
                            $('#mqj_qa_message').val($('[name="mqj_snote_qa_message"]').summernote('code'));
                            if (f_submit_forms('form_mqj_base,#form_mqj_form,#form_mqj_form_2', 'p_registration')) {
                                submit_status = $('#mqj_wfTask_status').val() == '28' ?  '10' : '13';
                                if (f_submit($('#mqj_wfTask_id').val(), $('#mqj_wfTaskType_id').val(), submit_status, 'Initial RATA successfully submitted', $('#mqj_qa_message').val(), condition_no, submit_group, '', $('#mqj_wfTask_refName').val(), $('#mqj_wfTask_refValue').val())) {
                                    f_table_icm ();
                                    f_send_email('email_verify_initRATA', {wfTask_id:result_submit_task}); 
                                    $('#modal_cems_rata').modal('hide');
                                }
                            }
                            $('#modal_waiting').modal('hide');
                            $(this).unbind(e);
                        }).modal('show'); 
                    }
                });  
            } else if (mqj_otable == 'itp' && $('#mqj_wfTaskType_id').val() == '38') {
                var bootstrapValidator = $("#form_mqj_verify").data('bootstrapValidator');
                bootstrapValidator.validate();
                if (!bootstrapValidator.isValid()) {         
                    f_notify(2, 'Error', errMsg_validation);    
                    return false;
                }
                $.SmartMessageBox({
                    title : "<i class='fa fa-exclamation-circle'></i> Confirmation!",
                    content : "Are you sure?",
                    buttons : '[No][Yes]'
                }, function(ButtonPressed) {
                    if (ButtonPressed === "Yes") {
                        $('#modal_waiting').on('shown.bs.modal', function(e){  
                            $('#mqj_funct').val('save_verify_initial_RATA_j');
                            $('#mqj_wfTask_verify').val($('[name="mqj_snote_wfTask_verify"]').summernote('code'));
                            if (f_submit_forms('form_mqj_base,#form_mqj_verify', 'p_registration')) {
                                submit_status = $('input[name="mqj_result"]:checked').val();
                                condition_no = submit_status == '17' ? '' : '1';
                                if (f_submit($('#mqj_wfTask_id').val(), $('#mqj_wfTaskType_id').val(), submit_status, 'The verification result successfully submitted', $('#mqj_wfTask_verify').val(), condition_no, submit_group, '', $('#mqj_wfTask_refName').val(), $('#mqj_wfTask_refValue').val())) {
                                    f_table_itp_new ();
                                    f_table_itp_history ();
                                    if (submit_status == '12')
                                        f_send_email('email_return_initRATA', {wfTask_id:$('#mqj_wfTask_id').val()}); 
                                    else if (submit_status == '46')
                                        f_send_email('email_redo_initRATA', {wfTask_id:$('#mqj_wfTask_id').val()}); 
                                    $('#modal_cems_rata').modal('hide');
                                }
                            }
                            $('#modal_waiting').modal('hide');
                            $(this).unbind(e);
                        }).modal('show'); 
                    }
                });  
            }
        });
    });
    
    function f_mqj_delete_supportDoc (qaDoc_id) {
        $('#modal_waiting').on('shown.bs.modal', function(e){
            if (f_submit_normal('delete_qa_doc', {qaDoc_id: qaDoc_id}, 'p_registration', 'Data successfully deleted.')) {
                data_mqj_supportDoc = f_get_general_info_multiple('dt_qa_document', {qa_id:$('#mqj_qa_id').val()}, '', '', 'qa_id');
                f_dataTable_draw(mqj_otable_supportDoc, data_mqj_supportDoc, 'datatable_mqj_supportDoc', 4);
            }
            $('#modal_waiting').modal('hide');
            $(this).unbind(e);
        }).modal('show'); 
    }
    
    function f_mqj_calc_ra (qaRa_id) {
        var result = parseFloat(0);
        var diff = parseFloat($('#mqj_qaRa_difference_'+qaRa_id).val()!=''?$('#mqj_qaRa_difference_'+qaRa_id).val():0);
        var cc = parseFloat($('#mqj_qaRa_confCoeff_'+qaRa_id).val()!=''?$('#mqj_qaRa_confCoeff_'+qaRa_id).val():0);
        var applStandard = parseFloat($('#mqj_qaRa_applStandard_'+qaRa_id).val()!=''?$('#mqj_qaRa_applStandard_'+qaRa_id).val():1);
        result = (diff + cc)/applStandard;
        if (isNaN(result)) {
            $('#lmqj_qaRa_ra_'+qaRa_id).html('');
            $('#mqj_qaRa_ra_'+qaRa_id).val('');
        } else {
            $('#lmqj_qaRa_ra_'+qaRa_id).html(formattedNumber(result,3));
            $('#mqj_qaRa_ra_'+qaRa_id).val(result);
        }
    }
    
    function f_load_cems_rata(load_type, qa_id, wfTask_id, otable) {
        $('#modal_waiting').on('shown.bs.modal', function(e){
            $('#form_mqj_base, #form_mqj_form, #form_mqj_form_2, #form_mqj_doc, #form_mqj_verify').trigger('reset'); 
            $('#form_mqj_form').bootstrapValidator('resetForm', true);
            $('#form_mqj_form_2').bootstrapValidator('resetForm', true);
            $('#form_mqj_doc').bootstrapValidator('resetForm', true);
            $('#form_mqj_verify').bootstrapValidator('resetForm', true);
            $('#form_mqj_form, #form_mqj_form_2, #form_mqj_doc').find('input, textarea, select').prop('disabled',true);
            $('#mqj_snote_qa_message').summernote('code', '');
            $('#mqj_snote_qa_message').summernote('disable');
            if (qa_id == '' && wfTask_id == '') {
                f_notify(2, 'Error', errMsg_default);    
                $('#modal_waiting').modal('hide');
                $(this).unbind(e);
                return false;
            } 
            if (qa_id == '') {
                // all transaction with null qa_id should be initial RATA.
                var wf_task = f_get_general_info('wf_task', {wfTask_id:wfTask_id}); 
                var arr_qa = f_get_general_info_multiple('vw_qa_task', {wfTrans_id:wf_task.wfTrans_id, wfTask_id:'<='+wfTask_id}, '', '', 'qa_id DESC');
                qa_id = arr_qa[0].qa_id;
            } else if (wfTask_id == '') {
                wfTask_id = f_get_value_from_table('t_qa', 'qa_id', qa_id, 'wfTask_id');
            } 
            if (qa_id == '' || wfTask_id == '') {
                f_notify(2, 'Error', errMsg_default);  
                $('#modal_waiting').modal('hide');
                $(this).unbind(e);
                return false;
            } 
            mqj_otable = otable;
            mqj_load_type = load_type;
            $('.mqj_hide_view, .mqj_show_view, #mqj_alert_box, .mqj_div_verify, #mqj_div_datePoolStart').hide();
            $('.mqj_show_view').show();
            var task_info = f_get_general_info('vw_task_info', {wfTask_id:wfTask_id}, 'mqj');    
            var is_end = (task_info.wfFlow_id == '4') ? 'N' : '';
            var arr_steps = f_get_general_info_multiple('wf_task_type', {wfFlow_id:task_info.wfFlow_id, wfTaskType_isEnd:is_end});
            var previous_task = f_get_general_info_multiple('wf_task', {wfTrans_id:task_info.wfTrans_id, wfTask_partition:'2'}, '', '', 'wfTask_id DESC');
            var wfTaskType_turn = task_info.wfTaskType_turn != '0' ? task_info.wfTaskType_turn : f_get_value_from_table('wf_task_type', 'wfTaskType_id', previous_task[0].wfTaskType_id, 'wfTaskType_turn');
            f_steps (arr_steps, wfTaskType_turn, 'mqj_steps');     
            var qa_detail = f_get_general_info('vw_qa_details', {qa_id:qa_id}, 'mqj');
            $('#lmqj_qa_type_title').html(qa_detail.qa_type_desc);
            $('[name="mqj_snote_qa_message"]').summernote('code', qa_detail.qa_message);
            data_mqj_raNormal = f_get_general_info_multiple('t_qa_ra', {qa_id:qa_id});
            f_dataTable_draw(mqj_otable_raNormal, data_mqj_raNormal, 'datatable_mqj_raNormal', 8);
            data_mqj_drift = f_get_general_info_multiple('t_qa_drift', {qa_id:qa_id});
            f_dataTable_draw(mqj_otable_drift1, data_mqj_drift, 'datatable_mqj_drift1', 7);
            f_dataTable_draw(mqj_otable_drift2, data_mqj_drift, 'datatable_mqj_drift2', 7);
            f_dataTable_draw(mqj_otable_drift3, data_mqj_drift, 'datatable_mqj_drift3', 4);
            data_mqj_responseTime = f_get_general_info_multiple('t_qa_responsetime', {qa_id:qa_id});
            f_dataTable_draw(mqj_otable_responseTime, data_mqj_responseTime, 'datatable_mqj_responseTime', 3);
            data_mqj_supportDoc = f_get_general_info_multiple('dt_qa_document', {qa_id:qa_id}, '', '', 'qa_id');
            f_dataTable_draw(mqj_otable_supportDoc, data_mqj_supportDoc, 'datatable_mqj_supportDoc', 4);
            $('#form_mqj_form_2').find('input').prop('disabled',true);
            $('.mqj_hide_view').hide();
            if (task_info.wfFlow_id == '4')
                $('#mqj_div_datePoolStart').show();
            if (mqj_load_type == 2) {
                if (mqj_otable == 'icm') {
                    if (previous_task[0].wfTask_remark != null && previous_task[0].wfTask_remark != '<p><br></p>') {                    
                        $('#mqj_alert_box').show();
                        $('#mqj_alert_message').html(previous_task[0].wfTask_remark);
                        var profile = f_get_general_info('profile', {user_id:previous_task[0].wfTask_claimedBy, profile_status:'1'}); 
                        $('#mqj_alert_date').html('from '+profile.profile_name+'</br>'+dateString2Date(previous_task[0].wfTask_timeSubmitted).toLocaleString());
                    }
                    $('.mqj_show_view').hide();
                    $('.mqj_hide_view').show();
                    $('#mqj_snote_qa_message').summernote('enable');
                    $('#form_mqj_form, #form_mqj_form_2, #form_mqj_doc').find('input, textarea, select').prop('disabled',false);
                } else if (mqj_otable == 'itp') {
                    $("input[name='mqj_result'][value=" + task_info.wfTask_statusSave + "]").prop('checked', true);
                    if (task_info.wfTask_remark != null && task_info.wfTask_remark != '<p><br></p>')
                        $('[name="mqj_snote_wfTask_verify"]').summernote('code', task_info.wfTask_remark);
                    else
                        $('[name="mqj_snote_wfTask_verify"]').summernote('code', '');
                    $('#form_mqj_verify').bootstrapValidator('resetField', 'mqj_snote_wfTask_verify');
                    $('.mqj_div_verify, #mqj_btn_save, #mqj_btn_submit').show();
                } else if (mqj_otable == 'iqa') {
                    if (previous_task != '' && previous_task[0].wfTask_remark != null && previous_task[0].wfTask_remark != '<p><br></p>') {                    
                        $('#mqj_alert_box').show();
                        $('#mqj_alert_message').html(previous_task[0].wfTask_remark);
                        var profile = f_get_general_info('profile', {user_id:previous_task[0].wfTask_claimedBy, profile_status:'1'}); 
                        $('#mqj_alert_date').html('from '+profile.profile_name+'</br>'+dateString2Date(previous_task[0].wfTask_timeSubmitted).toLocaleString());
                    }
                    $('.mqj_show_view').hide();
                    $('.mqj_hide_view').show();
                    $('#mqj_snote_qa_message').summernote('enable');
                    $('#form_mqj_form, #form_mqj_form_2, #form_mqj_doc').find('input, textarea, select').prop('disabled',false);
                } else {
                    f_notify(2, 'Error', errMsg_default);   
                    $('#modal_waiting').modal('hide');
                    $(this).unbind(e);
                    return false;
                }
            } 
            $('.mqj_disabled').prop('disabled',true);
            $('#mqj_wfTask_id').val(wfTask_id); 
            $('#mqj_qa_id').val(qa_id);  
            $('#modal_cems_rata').modal('show');
            $('#modal_waiting').modal('hide');
            $(this).unbind(e);
        }).modal('show');
    }
    
</script>