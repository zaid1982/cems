<script type="text/javascript">
    
    var mce_otable;
    var mce_load_type;
    var mce_1st_load = true;    
    var mce_otable_parameter;
    var data_mce_parameter;
    var mce_otable_written;
    var data_mce_written;
    var mce_otable_document;
    var data_mce_document;
    var mce_otable_docNormalize;
    var data_mce_docNormalize; 
    var mce_otable_personnel;
    var data_mce_personnel;
    var mce_interval;
    var mce_interval_cnt = 0;
    var mce_total_section = [];
    var mce_check_1, mce_check_2, mce_check_3, mce_check_4;
    
    $(document).ready(function () {
        
        $('#mce_btn_next').on('click', function () {
            var stepNum = $('#mce_wizard').wizard('selectedItem'); 
            if (stepNum.step == 4)
                $('#mce_btn_next').prop('disabled', true);
        });
        
        $('#mce_btn_prev').on('click', function () {
            var stepNum = $('#mce_wizard').wizard('selectedItem'); 
            if (stepNum.step == 5)
                $('#mce_btn_next').prop('disabled', false);
        });
        
        $('#form_mce_2_1').bootstrapValidator({
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },            
            excluded: ':disabled',
            fields: {  
                'mce_indReason_id[]' : {
                    validators : {
                        choice : {
                            min : 1,
                            message : 'At least 1 Reason of CEMS Installation required'
                        }                        
                    }
                },
                mce_indReason_other : {
                    validators: {
                        callback: {
                            message: 'Other Reason is required',
                            callback: function (value, validator, $field) {
                                var check = $('#form_mce_2_1').find('[name="mce_indReason_id[]"][value=4]').is(':checked');
                                return (check === false) ? true : (value !== '');
                            }
                        },
                        stringLength : {
                            max : 100,
                            message : 'Other Reason must be not more than 100 characters long'
                        }
                    }
                },
                mce_sourceActivity_id : {
                    validators: {
                        notEmpty: {
                            message: 'Source of Activity is required'
                        }
                    }
                },
                mce_sourceCapacity_id : {
                    validators: {
                        notEmpty: {
                            message: 'Source is required'
                        }
                    }
                },
                mce_fuelType_id : {
                    validators: {
                        notEmpty: {
                            message: 'Type of Fuel is required'
                        }
                    }
                },
                mce_indAll_fuelQuantity : {
                    validators: {
                        notEmpty: {
                            message: 'Fuel Quantity is required'
                        },
                        numeric: {
                            message: 'Fuel Quantity is not a valid number',
                            thousandsSeparator: '',
                            decimalSeparator: '.'
                        },
                        callback: {
                            message: 'Fuel Quantity must be greater than 0',
                            callback: function (value, validator, $field) {
                                return (parseFloat(value) > 0);
                            }
                        }
                    }
                },
                mce_metalType_id : {
                    validators: {
                        notEmpty: {
                            message: 'Type of Metal is required'
                        }
                    }
                },
                mce_indAll_sourceCapacity : {
                    validators: {
                        notEmpty: {
                            message: 'Source Capacity is required'
                        },
                        numeric: {
                            message: 'Source Capacity is not a valid number',
                            thousandsSeparator: '',
                            decimalSeparator: '.'
                        },
                        callback: {
                            message: 'Source Capacity must be greater than 0',
                            callback: function (value, validator, $field) {
                                return (parseFloat(value) > 0);
                            }
                        }
                    }
                },
                'mce_pollutionMonitored_id[]' : {
                    validators : {
                        choice : {
                            min : 1,
                            message : 'At least 1 Pollution Monitored required'
                        }                        
                    }
                },
                mce_indAll_stackNo : {
                    validators: {
                        notEmpty: {
                            message: 'Stack No. is required'
                        },
                        stringLength : {
                            max : 15,
                            message : 'Stack No. must be not more than 15 characters long'
                        }
                    }
                },
                mce_indAll_stackHeight : {
                    validators: {
                        notEmpty: {
                            message: 'Stack Height is required'
                        },
                        numeric: {
                            message: 'Stack Height is not a valid number',
                            thousandsSeparator: '',
                            decimalSeparator: '.'
                        },
                        callback: {
                            message: 'Stack Height must be greater than 0',
                            callback: function (value, validator, $field) {
                                return (parseFloat(value) > 0);
                            }
                        }
                    }
                },
                mce_indAll_stackDiameter : {
                    validators: {
                        notEmpty: {
                            message: 'Stack Diameter is required'
                        },
                        numeric: {
                            message: 'Stack Diameter is not a valid number',
                            thousandsSeparator: '',
                            decimalSeparator: '.'
                        },
                        callback: {
                            message: 'Stack Diameter must be greater than 0',
                            callback: function (value, validator, $field) {
                                return (parseFloat(value) > 0);
                            }
                        }
                    }
                },
                mce_indAll_stackLongitude : {
                    validators: {
                        notEmpty: {
                            message: 'Stack Longitude is required'
                        },
                        numeric: {
                            message: 'Stack Longitude is not a valid number',
                            thousandsSeparator: '',
                            decimalSeparator: '.'
                        },
                        between: {
                            min: -180,
                            max: 180,
                            message: 'Stack Longitude must be between -180.0 and 180.0'
                        }
                    }
                },
                mce_indAll_stackLatitude : {
                    validators: {
                        notEmpty: {
                            message: 'Stack Latitude is required'
                        },
                        numeric: {
                            message: 'Stack Latitude is not a valid number',
                            thousandsSeparator: '',
                            decimalSeparator: '.'
                        },
                        between: {
                            min: -180,
                            max: 180,
                            message: 'Stack Latitude must be between -180.0 and 180.0'
                        }
                    }
                },
                mce_indAll_gasTemperature : {
                    validators: {
                        notEmpty: {
                            message: 'Temperature is required'
                        },
                        numeric: {
                            message: 'Temperature is not a valid number',
                            thousandsSeparator: '',
                            decimalSeparator: '.'
                        },
                        callback: {
                            message: 'Temperature must be greater than 0',
                            callback: function (value, validator, $field) {
                                return (parseFloat(value) > 0);
                            }
                        }
                    }
                },
                mce_indAll_airFlowRate : {
                    validators: {
                        notEmpty: {
                            message: 'Air Flow Rate is required'
                        },
                        numeric: {
                            message: 'Air Flow Rate is not a valid number',
                            thousandsSeparator: '',
                            decimalSeparator: '.'
                        },
                        callback: {
                            message: 'Air Flow Rate must be greater than 0',
                            callback: function (value, validator, $field) {
                                return (parseFloat(value) > 0);
                            }
                        }
                    }
                },
                mce_indAll_stackVelocity : {
                    validators: {
                        notEmpty: {
                            message: 'Stack Velocity is required'
                        },
                        numeric: {
                            message: 'Stack Velocity is not a valid number',
                            thousandsSeparator: '',
                            decimalSeparator: '.'
                        },
                        callback: {
                            message: 'Stack Velocity must be greater than 0',
                            callback: function (value, validator, $field) {
                                return (parseFloat(value) > 0);
                            }
                        }
                    }
                },
                mce_indAll_moistureContect : {
                    validators: {
                        notEmpty: {
                            message: 'Moisture Content is required'
                        },
                        numeric: {
                            message: 'Moisture Content is not a valid number',
                            thousandsSeparator: '',
                            decimalSeparator: '.'
                        },
                        callback: {
                            message: 'Moisture Content must be greater than 0',
                            callback: function (value, validator, $field) {
                                return (parseFloat(value) > 0);
                            }
                        }
                    }
                },
                mce_indAll_pressure : {
                    validators: {
                        notEmpty: {
                            message: 'Pressure is required'
                        },
                        numeric: {
                            message: 'Pressure is not a valid number',
                            thousandsSeparator: '',
                            decimalSeparator: '.'
                        },
                        callback: {
                            message: 'Pressure must be greater than 0',
                            callback: function (value, validator, $field) {
                                return (parseFloat(value) > 0);
                            }
                        }
                    }
                }
            }
        });  
        
        var datatable_mce_parameter = undefined; 
        mce_otable_parameter = $('#datatable_mce_parameter').DataTable({
            "paging": false,
            "ordering": false,
            "autoWidth": false,
            "info": false,
            "bFilter": false,
            "preDrawCallback": function () {
                if (!datatable_mce_parameter) {
                    datatable_mce_parameter = new ResponsiveDatatablesHelper($('#datatable_mce_parameter'), breakpointDefinition);
                }
            },
            "rowCallback": function (nRow, aData, index) {
                datatable_mce_parameter.createExpandIcon(nRow);
                var info = mce_otable_parameter.page.info();
                $('td', nRow).eq(0).html(info.page * info.length + (index + 1)); 
            },
            "drawCallback": function (oSettings) {
                datatable_mce_parameter.respond();
                var api = this.api();
                var visibleRows=api.rows().data();
                if(visibleRows.length >= 1){
                    for(var j=0;j<visibleRows.length;j++){
                        var bootstrapValidator = $("#form_mce_2_1").data('bootstrapValidator');
                        bootstrapValidator.addField('mce_indParam_concentration_'+visibleRows[j].indParam_id, {validators:{notEmpty:{message:'Required'},numeric:{message:'Must be number',thousandsSeparator: '',decimalSeparator: '.'}}});
                    }
                }
            },
            "aoColumns":
                [
                    {mData: null},
                    {mData: 'inputParam_desc', sClass: 'text-center'},
                    {mData: 'pub_referenceValue', sClass: 'text-center',
                        mRender: function (data, type, row) {
                            $label = '';
                            if (row.pub_referenceGas != null && data != null)
                                $label = row.pub_referenceGas + ' : ' + data + '%';
                            return $label;
                        }
                    },
                    {mData: 'indParam_limitValue', sClass: 'text-right',
                        mRender: function (data, type, row) {
                            return parseInt(data) + (row.inputParam_id=='8'?' %':' mg/m<sup>3</sup>'); 
                        }
                    },
                    {mData: null, sClass: 'padding-5',
                        mRender: function (data, type, row) {
                            $label = '<div class="form-group margin-bottom-0"><div class="col-md-12"><div class="input-group">' +
                                '<input type="text" class="form-control" name="mce_indParam_concentration_'+row.indParam_id+'" id="mce_indParam_concentration_'+row.indParam_id+'" value="'+(row.indParam_concentration!=null?row.indParam_concentration:'')+'"/>' +
                                '<span class="input-group-addon font-xs">' + (row.inputParam_id=='8'?' %':' mg/m<sup>3</sup>') + '</span>' +
                                '</div></div></div>';
                            return $label;
                        }
                    }
                ]
        });
        
        $('#form_mce_2_1').find('[name="mce_indReason_id[]"][value=4]').on('click', function () {
            $('#mce_indReason_other').val('');
            $('#form_mce_2_1').bootstrapValidator('enableFieldValidators', 'mce_indReason_other', $(this).is(':checked'));
            $('#form_mce_2_1').bootstrapValidator('revalidateField', 'mce_indReason_other');
            $(this).is(':checked') ? $('.mce_disReason').prop('disabled', false) : $('.mce_disReason').prop('disabled', true);
        });
            
        $('#mce_sourceActivity_id').on('change', function () {
            $('#form_mce_2_1').data('bootstrapValidator').resetField('mce_sourceCapacity_id');
            f_mce_set_sourceCapacity('', $(this).val()); 
            $('#form_mce_2_1').data('bootstrapValidator').resetField('mce_metalType_id');
            f_mce_set_metalType ('',  $(this).val())
            f_mce_insert_parameter ();  
        });
        
        $('#mce_sourceCapacity_id').on('change', function () {
            f_mce_insert_parameter (); 
        });
        
        $('#mce_fuelType_id').on('change', function () {
            if ($('#mce_sourceCapacity_id').val() == '1' || $('#mce_sourceCapacity_id').val() == '2')
                f_mce_insert_parameter (); 
        });
        
        $('#form_mce_2_2').bootstrapValidator({
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },            
            excluded: ':disabled',
            fields: {  
                mce_indWritten_referenceNo : {
                    validators: {
                        notEmpty: {
                            message: 'Reference No. is required'
                        },
                        stringLength : {
                            max : 30,
                            message : 'Reference No. must be not more than 30 characters long'
                        }
                    }
                },
                mce_written_type : {
                    validators: {
                        notEmpty: {
                            message: 'Attachment Type is required'
                        }
                    }
                },
                mce_indWritten_dateReference : {
                    validators: {
                        notEmpty: {
                            message: 'Reference Date is required'
                        }
                    }
                },
                mce_file_written : {
                    validators: {
                        notEmpty: {
                            message: 'Attachment File is required'
                        },
                        file: {
                            extension: 'pdf',
                            type: 'application/pdf',
                            maxSize: '5000000',
                            message: 'Only PDF file format allowed.'
                        }
                    }
                }
            }
        });        
        
        $('#mce_indWritten_dateReference').datepicker({
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
                $('#form_mce_2_2').bootstrapValidator('revalidateField', 'mce_indWritten_dateReference');
            }
        });
        
        var datatable_mce_written = undefined; 
        mce_otable_written = $('#datatable_mce_written').DataTable({
            "paging": false,
            "ordering": false,
            "autoWidth": false,
            "info": false,
            "bFilter": false,
            "preDrawCallback": function () {
                if (!datatable_mce_written) {
                    datatable_mce_written = new ResponsiveDatatablesHelper($('#datatable_mce_written'), breakpointDefinition);
                }
            },
            "rowCallback": function (nRow, aData, index) {
                datatable_mce_written.createExpandIcon(nRow);
                var info = mce_otable_written.page.info();
                $('td', nRow).eq(0).html(info.page * info.length + (index + 1));
            },
            "drawCallback": function (oSettings) {
                datatable_mce_written.respond();
            },
            "aoColumns":
                [
                    {mData: null},
                    {mData: 'documentName_desc'},
                    {mData: 'indWritten_referenceNo'},
                    {mData: 'indWritten_dateReference'},
                    {mData: 'document_uplname'},
                    {mData: null, sClass: 'text-center',
                        mRender: function (data, type, row) {
                            $label = '';
                            if (row.document_id != null)
                                $label += '<a type="button" class="btn btn-success btn-xs" title="Download Written Approval" href="process/download.php?doc_id='+row.document_id+'"><i class="fa fa-download"></i></a>';
                            $label += ' <button type="button" class="btn btn-danger btn-xs mce_hideView" title="Delete" onclick="f_mce_delete_written ('+row.indWritten_id+');"><i class="fa fa-trash-o"></i></button>';
                            return $label;
                        }
                    }
                ]
        });
        
        $('#mce_btn_add_written').on('click', function () {
            var bootstrapValidator = $("#form_mce_2_2").data('bootstrapValidator');
            bootstrapValidator.validate();
            if (bootstrapValidator.isValid()) {       
                $('#modal_waiting').on('shown.bs.modal', function(e){      
                    var formData = new FormData($('#form_mce_2_2')[0]);
                    formData.append('funct', 'save_industrial_written_cems');
                    formData.append('mce_indAll_id', $('#mce_indAll_id').val());
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
                                f_notify(1, 'Success', 'Written Approval successfully added.');
                                $('#form_mce_2_2').trigger('reset');
                                $('#form_mce_2_2').bootstrapValidator('resetForm', true);
                                data_mce_written = f_get_general_info_multiple('dt_written_approval', {indAll_id:$('#mce_indAll_id').val()}, '', '', 'indWritten_id');
                                f_dataTable_draw(mce_otable_written, data_mce_written, 'datatable_mce_written', 6);
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
        
        $('#form_mce_2_3').bootstrapValidator({
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },            
            excluded: ':disabled',
            fields: {  
                mce_document_type : {
                    validators: {
                        notEmpty: {
                            message: 'Attachment Type is required'
                        }
                    }
                },
                mce_indDoc_others : {
                    validators: {
                        notEmpty: {
                            message: 'Other Type is required'
                        },
                        stringLength : {
                            max : 150,
                            message : 'Other Type must be not more than 150 characters long'
                        }
                    }
                },
                mce_file_document : {
                    validators: {
                        notEmpty: {
                            message: 'Attachment File is required'
                        },
                        file: {
                            extension: 'pdf',
                            type: 'application/pdf',
                            maxSize: '5000000',
                            message: 'Only PDF file format allowed.'
                        }
                    }
                }
            }
        }); 
        
        $('#mce_document_type').on('change', function () {
            $('#mce_indDoc_others').val('');
            if($(this).val() == '17') { 
                $('#mce_div_doc_other').show(); 
                $('#form_mce_2_3').bootstrapValidator('enableFieldValidators', 'mce_indDoc_others', true);
            } else {
                $('#mce_div_doc_other').hide();
                $('#form_mce_2_3').bootstrapValidator('enableFieldValidators', 'mce_indDoc_others', false);
            }
        });
                
        var datatable_mce_document = undefined; 
        mce_otable_document = $('#datatable_mce_document').DataTable({
            "paging": false,
            "ordering": false,
            "autoWidth": false,
            "info": false,
            "bFilter": false,
            "preDrawCallback": function () {
                if (!datatable_mce_document) {
                    datatable_mce_document = new ResponsiveDatatablesHelper($('#datatable_mce_document'), breakpointDefinition);
                }
            },
            "rowCallback": function (nRow, aData, index) {
                datatable_mce_document.createExpandIcon(nRow);
                var info = mce_otable_document.page.info();
                $('td', nRow).eq(0).html(info.page * info.length + (index + 1));
            },
            "drawCallback": function (oSettings) {
                datatable_mce_document.respond();
            },
            "aoColumns":
                [
                    {mData: null},
                    {mData: 'documentName_desc'},
                    {mData: 'document_uplname'},
                    {mData: null, sClass: 'text-center',
                        mRender: function (data, type, row) {
                            $label = '';
                            if (row.document_id != null)
                                $label += '<a type="button" class="btn btn-success btn-xs" title="Download Document" href="process/download.php?doc_id='+row.document_id+'"><i class="fa fa-download"></i></a>';
                            $label += ' <button type="button" class="btn btn-danger btn-xs mce_hideView" title="Delete" onclick="f_mce_delete_document ('+row.indDoc_id+');"><i class="fa fa-trash-o"></i></button>';
                            return $label;
                        }
                    }
                ]
        });
        
        $('#mce_btn_add_document').on('click', function () {
            var bootstrapValidator = $("#form_mce_2_3").data('bootstrapValidator');
            bootstrapValidator.validate();
            if (bootstrapValidator.isValid()) {       
                $('#modal_waiting').on('shown.bs.modal', function(e){      
                    var formData = new FormData($('#form_mce_2_3')[0]);
                    formData.append('funct', 'save_industrial_document_cems');
                    formData.append('mce_indAll_id', $('#mce_indAll_id').val());
                    formData.append('mce_indDoc_others', $('#mce_indDoc_others').val());
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
                                f_notify(1, 'Success', 'Document successfully added.');
                                $('#form_mce_2_3').trigger('reset');
                                $('#form_mce_2_3').bootstrapValidator('resetForm', true);
                                $('#mce_div_doc_other').hide();
                                $('#form_mce_2_3').bootstrapValidator('enableFieldValidators', 'mce_indDoc_others', false);
                                data_mce_document = f_get_general_info_multiple('dt_industrial_document', {indAll_id:$('#mce_indAll_id').val(), documentName_id:'(1,2,3,4,17)'}, '', '', 'indDoc_id');
                                f_dataTable_draw(mce_otable_document, data_mce_document, 'datatable_mce_document', 4);
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
        
        $('#form_mce_3_1').bootstrapValidator({
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },            
            excluded: ':disabled',
            fields: {  
                mce_consultant_id : {
                    validators: {
                        notEmpty: {
                            message: 'CEMS Consultant is required'
                        }
                    }
                },
                mce_consAll_id : {
                    validators: {
                        notEmpty: {
                            message: 'Analyzer Model is required'
                        }
                    }
                }
            }
        });
        
        $('#mce_consultant_id').on('change', function () {
            $('#form_mce_3_1').data('bootstrapValidator').resetField('mce_consAll_id');
            f_mce_set_consAll('', $(this).val()); 
        });
        
        $('#mce_consAll_id').on('change', function () {
            f_mce_set_link_consAll($(this).val()); 
        });
        
        $('#form_mce_3_2').bootstrapValidator({
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },            
            excluded: ':disabled',
            fields: {  
                mce_docNormalize_type : {
                    validators: {
                        notEmpty: {
                            message: 'Attachment Type is required'
                        }
                    }
                },
                mce_file_docNormalize : {
                    validators: {
                        notEmpty: {
                            message: 'Attachment File is required'
                        },
                        file: {
                            extension: 'pdf',
                            type: 'application/pdf',
                            maxSize: '5000000',
                            message: 'Only PDF file format allowed.'
                        }
                    }
                }
            }
        });        
                
        var datatable_mce_docNormalize = undefined; 
        mce_otable_docNormalize = $('#datatable_mce_docNormalize').DataTable({
            "paging": false,
            "ordering": false,
            "autoWidth": false,
            "info": false,
            "bFilter": false,
            "preDrawCallback": function () {
                if (!datatable_mce_docNormalize) {
                    datatable_mce_docNormalize = new ResponsiveDatatablesHelper($('#datatable_mce_docNormalize'), breakpointDefinition);
                }
            },
            "rowCallback": function (nRow, aData, index) {
                datatable_mce_docNormalize.createExpandIcon(nRow);
                var info = mce_otable_docNormalize.page.info();
                $('td', nRow).eq(0).html(info.page * info.length + (index + 1));
            },
            "drawCallback": function (oSettings) {
                datatable_mce_docNormalize.respond();
            },
            "aoColumns":
                [
                    {mData: null},
                    {mData: 'documentName_desc'},
                    {mData: 'document_uplname'},
                    {mData: null, sClass: 'text-center',
                        mRender: function (data, type, row) {
                            $label = '';
                            if (row.document_id != null)
                                $label += '<a type="button" class="btn btn-success btn-xs" title="Download Document" href="process/download.php?doc_id='+row.document_id+'"><i class="fa fa-download"></i></a>';
                            $label += ' <button type="button" class="btn btn-danger btn-xs mce_hideView" title="Delete" onclick="f_mce_delete_docNormalize ('+row.indDoc_id+');"><i class="fa fa-trash-o"></i></button>';
                            return $label;
                        }
                    }
                ]
        });
        
        $('#mce_btn_add_docNormalize').on('click', function () {
            var bootstrapValidator = $("#form_mce_3_2").data('bootstrapValidator');
            bootstrapValidator.validate();
            if (bootstrapValidator.isValid()) {       
                $('#modal_waiting').on('shown.bs.modal', function(e){      
                    var formData = new FormData($('#form_mce_3_2')[0]);
                    formData.append('funct', 'save_industrial_docNormalize_cems');
                    formData.append('mce_indAll_id', $('#mce_indAll_id').val());
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
                                f_notify(1, 'Success', 'Document successfully added.');
                                $('#form_mce_3_2').trigger('reset');
                                $('#form_mce_3_2').bootstrapValidator('resetForm', true);
                                data_mce_docNormalize = f_get_general_info_multiple('dt_industrial_document', {indAll_id:$('#mce_indAll_id').val(), documentName_id:'(15,16)'}, '', '', 'indDoc_id');
                                f_dataTable_draw(mce_otable_docNormalize, data_mce_docNormalize, 'datatable_mce_docNormalize', 4);
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
        
        $('#form_mce_4').bootstrapValidator({
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },            
            excluded: ':disabled',
            fields: {  
                mce_indPers_name : {
                    validators: {
                        notEmpty: {
                            message: 'Name is required'
                        },
                        stringLength : {
                            max : 80,
                            message : 'Name must be not more than 80 characters long'
                        }
                    }
                },
                mce_indPers_icNo : {
                    validators: {
                        notEmpty: {
                            message: 'MyKad No. is required'
                        },
                        digits : {
                            message : 'MyKad No. must be digits'
                        },
                        callback: {
                            message: 'MyKad No. must be 12 digits long',
                            callback: function (value, validator, $field) {
                                return value.length == 12;
                            }
                        }
                    }
                },
                mce_indPers_position : {
                    validators: {
                        notEmpty: {
                            message: 'Position is required'
                        },
                        stringLength : {
                            max : 50,
                            message : 'Position must be not more than 50 characters long'
                        }
                    }
                },
                mce_indPers_contactNo : {
                    validators: {
                        notEmpty: {
                            message: 'Contact No. is required'
                        },
                        stringLength : {
                            max : 11,
                            message : 'Contact No. must be not more than 11 characters long'
                        },
                        digits : {
                            message : 'Contact No. must be digits'
                        }
                    }
                },
                mce_indPers_email : {
                    validators: {
                        notEmpty: {
                            message: 'Email is required'
                        },
                        stringLength : {
                            max : 80,
                            message : 'Email must be not more than 80 characters long'
                        },
                        emailAddress : {
                            message : 'Email is not valid'
                        }
                    }
                },
                mce_indPers_qualification : {
                    validators: {
                        notEmpty: {
                            message: 'Academic Qualification is required'
                        },
                        stringLength : {
                            max : 255,
                            message : 'Academic Qualification must be not more than 255 characters long'
                        }
                    }
                },
                mce_indPers_certificate : {
                    validators: {
                        notEmpty: {
                            message: 'Certificate is required'
                        },
                        stringLength : {
                            max : 255,
                            message : 'Certificate must be not more than 255 characters long'
                        }
                    }
                }
            }
        });
        
        $('#mce_btn_add_personnel').on('click', function () {
            var bootstrapValidator = $("#form_mce_4").data('bootstrapValidator');
            bootstrapValidator.validate();
            if (bootstrapValidator.isValid()) { 
                $('#mce_funct').val('save_industrial_personnel_cems');
                $('#modal_waiting').on('shown.bs.modal', function(e){      
                    if (f_submit_forms('form_mce,#form_mce_4', 'p_registration', 'CEMS Personnel successfully added.')) {
                        $('#form_mce_4').bootstrapValidator('resetForm', true);                    
                        data_mce_personnel = f_get_general_info_multiple('t_industrial_personnel', {indAll_id:$('#mce_indAll_id').val()}, '', '', 'indPers_id');
                        f_dataTable_draw(mce_otable_personnel, data_mce_personnel, 'datatable_mce_personnel', 9);
                    }
                    $('#modal_waiting').modal('hide');
                    $(this).unbind(e);
                }).modal('show');
            } else {
                f_notify(2, 'Error', errMsg_validation);    
                return false;
            }
        }); 
        
        var datatable_mce_personnel = undefined; 
        mce_otable_personnel = $('#datatable_mce_personnel').DataTable({
            "paging": false,
            "ordering": false,
            "autoWidth": false,
            "info": false,
            "bFilter": false,
            "preDrawCallback": function () {
                if (!datatable_mce_personnel) {
                    datatable_mce_personnel = new ResponsiveDatatablesHelper($('#datatable_mce_personnel'), breakpointDefinition);
                }
            },
            "rowCallback": function (nRow, aData, index) {
                datatable_mce_personnel.createExpandIcon(nRow);
                var info = mce_otable_personnel.page.info();
                $('td', nRow).eq(0).html(info.page * info.length + (index + 1));
            },
            "drawCallback": function (oSettings) {
                datatable_mce_personnel.respond();
            },
            "aoColumns":
                [
                    {mData: null},
                    {mData: 'indPers_name'},
                    {mData: 'indPers_icNo'},
                    {mData: 'indPers_position'},
                    {mData: 'indPers_contactNo'},
                    {mData: 'indPers_email'},
                    {mData: 'indPers_qualification'},
                    {mData: 'indPers_certificate'},
                    {mData: null, sClass: 'text-center',
                        mRender: function (data, type, row) {
                            $label = '<button type="button" class="btn btn-danger btn-xs mce_hideView" title="Delete" onclick="f_mce_delete_personnel ('+row.indPers_id+');"><i class="fa fa-trash-o"></i></button>';
                            return $label;
                        }
                    }
                ]
        });
        
        $('#form_mce_5').bootstrapValidator({      
            excluded: ':disabled',
            fields: {  
                mce_declare : {
                    validators : {
                        choice : {
                            min : 1,
                            message : 'Declaration is required'
                        }                        
                    }
                },
                mce_snote_wfTask_remark : {
                    validators: {
                        callback: {
                            message: 'Remark is required',
                            callback: function(value, validator, $field) {
                                var code = $('[name="mce_snote_wfTask_remark"]').summernote('code');
                                return (code !== '' && code !== '<p><br></p>');
                            }
                        }
                    }
                }
            }
        });
        
        $('#mce_snote_wfTask_remark').summernote({
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
                    $('#form_mce_5').bootstrapValidator('revalidateField', 'mce_snote_wfTask_remark');
                    $('#mce_wfTask_remark').val(contents);
                }
            }
        });   
                
        $('#modal_cems').on('shown.bs.modal', function() {
            $('#mce_wizard').wizard('selectedItem', { step:1 });
            $('#mce_btn_next').prop('disabled', false); 
            if ($('#mce_load_type').val() == '1' || $('#mce_load_type').val() == '2') {
//                mce_interval = setInterval(function(){ 
//                    if (mce_interval_cnt == 1) {
//                        $('#mce_funct').val('save_installation_cems');
//                        $('#mce_wfTask_remark').val($('[name="mce_snote_wfTask_remark"]').summernote('code'));
//                        $('#modal_waiting').on('shown.bs.modal', function(e){
//                            if (f_submit_forms('form_mce,#form_mce_2_1,#form_mce_3_1,#form_mce_5', 'p_registration', 'Data successfully saved.')) {
//                                if (mce_otable == 'icm')
//                                    f_table_icm ();
//                            }
//                            $('#modal_waiting').modal('hide');
//                            $(this).unbind(e);
//                        }).modal('show');  
//                    }
//                    mce_interval_cnt = 1;
//                }, 300000);
            }
        });     
        
        $('#modal_cems').on('hide.bs.modal', function() {
//            mce_interval_cnt = 0;
//            clearInterval(mce_interval);
//            mce_interval = 0;
            $.each(data_mce_parameter, function(u){
                var bootstrapValidator = $("#form_mce_2_1").data('bootstrapValidator');
                bootstrapValidator.removeField('mce_indParam_concentration_'+data_mce_parameter[u].indParam_id);
            });
        });  
                
        $('#mce_btn_save').on('click', function () {         
            if ($('#mce_load_type').val() == '4') {
                $('#modal_waiting').on('shown.bs.modal', function(e){ 
                    var parameters = {};
                    parameters['wfTask_id'] = $('#mce_wfTask_id').val();    
                    parameters['wfFlow_id'] = '4';       
                    $.each(mce_total_section, function(value){     
                        parameters['check_remark_'+mce_total_section[value]] = $('#mce_check_remark_'+mce_total_section[value]).val();
                        parameters['check_pass_'+mce_total_section[value]] = $("input[name='mce_check_pass_"+mce_total_section[value]+"']").is(':checked') ? '1' : '0';
                    });
                    f_submit_normal('save_process_checking', parameters, 'p_registration', 'Process Checklist successfully saved.');
                    $('#modal_waiting').modal('hide');
                    $(this).unbind(e);
                }).modal('show'); 
            } else {
                $('#mce_funct').val('save_installation_cems');
                $('#mce_wfTask_remark').val($('[name="mce_snote_wfTask_remark"]').summernote('code'));
                $('#modal_waiting').on('shown.bs.modal', function(e){
                    if (f_submit_forms('form_mce,#form_mce_2_1,#form_mce_3_1,#form_mce_5', 'p_registration', 'Data successfully saved.')) {
                        if (mce_otable == 'icm')
                            f_table_icm ();
                    }
                    $('#modal_waiting').modal('hide');
                    $(this).unbind(e);
                }).modal('show'); 
            }
        });        
        
        $('#mce_btn_submit').on('click', function () {            
            var bootstrapValidator = $("#form_mce_2_1").data('bootstrapValidator');
            bootstrapValidator.validate();
            if (!bootstrapValidator.isValid()) {         
                $('#mce_wizard').wizard('selectedItem', { step:2 });
                f_notify(2, 'Error', errMsg_validation);    
                return false;
            }
            mce_check_1 = false; mce_check_2 = false;
            $.each(data_mce_written, function(u){
                if (data_mce_written[u].documentName_id == '13')        mce_check_1 = true;
                else if (data_mce_written[u].documentName_id == '14')   mce_check_2 = true;
            });
            if (!mce_check_1 || !mce_check_2) {
                $('#mce_wizard').wizard('selectedItem', { step:2 });
                $('#mce_btn_add_written').focus();
                f_notify(2, 'Error', 'Please make sure all Written Approval or Notification Status of Specified Equipment provided!');    
                return false;
            }            
            mce_check_1 = false; mce_check_2 = false; mce_check_3 = false; mce_check_4 = false;
            $.each(data_mce_document, function(u){
                if (data_mce_document[u].documentName_id == '1')        mce_check_1 = true;
                else if (data_mce_document[u].documentName_id == '2')   mce_check_2 = true;
                else if (data_mce_document[u].documentName_id == '3')   mce_check_3 = true;
                else if (data_mce_document[u].documentName_id == '4')   mce_check_4 = true;
            });
            if (!mce_check_1 || !mce_check_2 || !mce_check_3 || !mce_check_4) {
                $('#mce_wizard').wizard('selectedItem', { step:2 });
                $('#mce_btn_add_document').focus();
                f_notify(2, 'Error', 'Please make sure all Industrial Process Description provided!');    
                return false;
            }
            var bootstrapValidator = $("#form_mce_3_1").data('bootstrapValidator');
            bootstrapValidator.validate();
            if (!bootstrapValidator.isValid()) {         
                $('#mce_wizard').wizard('selectedItem', { step:3 });
                f_notify(2, 'Error', errMsg_validation);    
                return false;
            }
            mce_check_1 = false; mce_check_2 = false;
            $.each(data_mce_docNormalize, function(u){
                if (data_mce_docNormalize[u].documentName_id == '15')        mce_check_1 = true;
                else if (data_mce_docNormalize[u].documentName_id == '16')   mce_check_2 = true;
            });
            if (!mce_check_1 || !mce_check_2) {
                $('#mce_wizard').wizard('selectedItem', { step:3 });
                $('#mce_btn_add_docNormalize').focus();
                f_notify(2, 'Error', 'Please make sure all Normalization Attachment Type provided!');    
                return false;
            }
            var bootstrapValidator = $("#form_mce_5").data('bootstrapValidator');
            bootstrapValidator.validate();
            if (!bootstrapValidator.isValid()) {         
                $('#mce_wizard').wizard('selectedItem', { step:5 });
                f_notify(2, 'Error', errMsg_validation);    
                return false;
            }
            $('#mce_funct').val('save_installation_cems');
            $('#mce_wfTask_remark').val($('[name="mce_snote_wfTask_remark"]').summernote('code'));
            if (f_submit_forms('form_mce,#form_mce_2_1,#form_mce_3_1,#form_mce_5', 'p_registration')) {
                $.SmartMessageBox({
                    title : "<i class='fa fa-exclamation-circle'></i> Confirmation!",
                    content : "Are you sure to submit the CEMS Installation Registration Form?",
                    buttons : '[No][Yes]'
                }, function(ButtonPressed) {
                    if (ButtonPressed === "Yes") {            
                        $('#modal_waiting').on('shown.bs.modal', function(e){    
                            var submit_status = $('#mce_wfTask_status').val() == '2' ? '10' : '13';
                            var submit_msg = $('#mce_wfTask_status').val() == '2' ? 'Your application successfully submitted. Result will be alerted through your email.' : 'Your application successfully resubmitted. Result will be alerted through your email.';
                            var condition_no = $('#mce_wfTask_status').val() == '2' ? '' : '1';
                            var wfGroup_id = $('#mce_wfTask_status').val() == '2' ? $('#mce_wfGroup_id').val() : '';
                            if (f_submit($('#mce_wfTask_id').val(), $('#mce_wfTaskType_id').val(), submit_status, submit_msg, $('#mce_wfTask_remark').val(), condition_no, wfGroup_id, '', 'indAll_id', $('#mce_indAll_id').val())) {
                                var email_type = submit_status == '2' ? 'email_assign' : 'email_process';
                                f_send_email(email_type, {wfTask_id:result_submit_task}); 
                                if (mce_otable == 'icm')
                                    f_table_icm ();
                                $('#modal_cems').modal('hide');
                            }
                            $('#modal_waiting').modal('hide');
                            $(this).unbind(e);
                        }).modal('show'); 
                    }
                });
            }
        }); 
                
    });
        
    function f_mce_insert_parameter () {
        if (f_submit_normal('insert_industrial_parameter', {sourceActivity_id:$('#mce_sourceActivity_id').val(), sourceCapacity_id:$('#mce_sourceCapacity_id').val(), indAll_id:$('#mce_indAll_id').val(), fuelType_id:$('#mce_fuelType_id').val()}, 'p_registration')) {
            if (result_submit == '2') 
                f_notify(1, 'Success', 'Parameter to be Monitored successfully inserted.');
            $.each(data_mce_parameter, function(u){
                var bootstrapValidator = $("#form_mce_2_1").data('bootstrapValidator');
                bootstrapValidator.removeField('mce_indParam_concentration_'+data_mce_parameter[u].indParam_id);
            });
            data_mce_parameter = f_get_general_info_multiple('dt_pub_param', {indAll_id:$('#mce_indAll_id').val(), indParam_status:'1'}, '', '', 'inputParam_id');
            f_dataTable_draw(mce_otable_parameter, data_mce_parameter, 'datatable_mce_parameter', 5);  
            
        }  
    }
    function f_mce_delete_written (indWritten_id) {
        $('#modal_waiting').on('shown.bs.modal', function(e){
            if (f_submit_normal('delete_industrial_written', {indWritten_id: indWritten_id}, 'p_registration', 'Data successfully deleted.')) {
                data_mce_written = f_get_general_info_multiple('dt_written_approval', {indAll_id:$('#mce_indAll_id').val()}, '', '', 'indWritten_id');
                f_dataTable_draw(mce_otable_written, data_mce_written, 'datatable_mce_written', 6);
            }
            $('#modal_waiting').modal('hide');
            $(this).unbind(e);
        }).modal('show'); 
    }    
    
    function f_mce_delete_document (indDoc_id) {
        $('#modal_waiting').on('shown.bs.modal', function(e){
            if (f_submit_normal('delete_industrial_document', {indDoc_id: indDoc_id}, 'p_registration', 'Data successfully deleted.')) {
                data_mce_document = f_get_general_info_multiple('dt_industrial_document', {indAll_id:$('#mce_indAll_id').val(), documentName_id:'(1,2,3,4,17)'}, '', '', 'indDoc_id');
                f_dataTable_draw(mce_otable_document, data_mce_document, 'datatable_mce_document', 4);
            }
            $('#modal_waiting').modal('hide');
            $(this).unbind(e);
        }).modal('show'); 
    }
    
    function f_mce_delete_docNormalize (indDoc_id) {
        $('#modal_waiting').on('shown.bs.modal', function(e){
            if (f_submit_normal('delete_industrial_document', {indDoc_id: indDoc_id}, 'p_registration', 'Data successfully deleted.')) {
                data_mce_docNormalize = f_get_general_info_multiple('dt_industrial_document', {indAll_id:$('#mce_indAll_id').val(), documentName_id:'(15,16)'}, '', '', 'indDoc_id');
                f_dataTable_draw(mce_otable_docNormalize, data_mce_docNormalize, 'datatable_mce_docNormalize', 4);
            }
            $('#modal_waiting').modal('hide');
            $(this).unbind(e);
        }).modal('show'); 
    }
    
    function f_mce_delete_personnel (indPers_id) {
        $('#modal_waiting').on('shown.bs.modal', function(e){
            if (f_submit_normal('delete_industrial_personnel', {indPers_id: indPers_id}, 'p_registration', 'Data successfully deleted.')) {
                data_mce_personnel = f_get_general_info_multiple('t_industrial_personnel', {indAll_id:$('#mce_indAll_id').val()}, '', '', 'indPers_id');
                f_dataTable_draw(mce_otable_personnel, data_mce_personnel, 'datatable_mce_personnel', 9);
            }
            $('#modal_waiting').modal('hide');
            $(this).unbind(e);
        }).modal('show');  
    }
    
    function f_mce_set_sourceCapacity (sourceCapacity_id, sourceActivity_id) {
        set_option_empty('mce_sourceCapacity_id');
        if ($('#mce_sourceActivity_id').val() != '') {   
            get_option ('mce_sourceCapacity_id', '1', 't_source_capacity', 'sourceCapacity_id', 'sourceCapacity_desc', 'sourceCapacity_status', ' ', 'ref_desc', 'sourceActivity_id', sourceActivity_id);
            $('#mce_sourceCapacity_id').prop('disabled', false).val(sourceCapacity_id);
        }
    }
    
    function f_mce_set_metalType (metalType_id, sourceActivity_id) {
        $('#mce_metalType_id').prop('disabled', sourceActivity_id != '4').val(metalType_id);
    }
    
    function f_mce_set_consAll (consAll_id, consultant_id) {
        set_option_empty('mce_consAll_id');
        if ($('#mce_consultant_id').val() != '') {   
            get_option ('mce_consAll_id', '1', 't_consultant_cems', 'consAll_id', 'consCems_modelNo', 'consCems_status', ' ', 'ref_desc', 'consultant_id', consultant_id);
            $('#mce_consAll_id').prop('disabled', false).val(consAll_id);
        }
        f_mce_set_link_consAll (consAll_id);
    }
    
    function f_mce_set_link_consAll (consAll_id) {
        var qa_span = '-';
        var qa_raa = '-';
        var qa_rata = '-';
        if (consAll_id == '' || consAll_id == null)
            $('#mce_divAnalyzerDetails').html('');
        else {
            var wfTrans_id = f_get_value_from_table('t_consultant_cems', 'consAll_id', consAll_id, 'wfTrans_id');
            var wfTrans_regNo = f_get_value_from_table('wf_transaction', 'wfTrans_id', wfTrans_id, 'wfTrans_regNo');
            $('#mce_divAnalyzerDetails').html('<a href="#" onClick="f_load_consultant_cems (3, \'\', '+consAll_id+',\'ctp\');">'+wfTrans_regNo+'</a>');
            var consultant_all = f_get_general_info('t_consultant_all', {consAll_id:consAll_id}); 
            if (consultant_all.consAll_qaFreqDaily != null) {
                qa_span = consultant_all.consAll_qaFreqDaily=='1'?'Yes':'No';
                if (consultant_all.consAll_qaMethod != null) {
                    qa_span = qa_span + ', ' + (consultant_all.consAll_qaMethod=='1'?'Automatic':'Manual');
                }
            }
            if (consultant_all.consAll_qaFreqQuarterly != null) {
                if (consultant_all.consAll_qaFreqQuarterly == '1') {
                    var arr_qa_raa = f_get_general_info_multiple('t_consultant_qa', {consAll_id:consAll_id, qaQuarter_type:'1'});
                    qa_raa = '';
                    $.each(arr_qa_raa, function(u){
                        qa_raa += ', Quarter ' + arr_qa_raa[u].qaQuarter_id;
                    });  
                    if (qa_raa.length > 0)
                        qa_raa = qa_raa.substr(2);
                } else if (consultant_all.consAll_qaFreqQuarterly == '2')
                    qa_raa = 'No';
            }
            if (consultant_all.consAll_qaFreqYearly != null) {
                if (consultant_all.consAll_qaFreqYearly == '1') {
                    var arr_qa_rata = f_get_general_info('t_consultant_qa', {consAll_id:consAll_id, qaQuarter_type:'2'}); 
                    if (arr_qa_rata) 
                        qa_rata = 'Quarter ' + arr_qa_rata.qaQuarter_id;
                } else if (consultant_all.consAll_qaFreqYearly == '2')
                    qa_rata = 'No';
            }
        }
        $('#mce_qa_span').html(qa_span);
        $('#mce_qa_raa').html(qa_raa);
        $('#mce_qa_rata').html(qa_rata);
    }
    
    function f_load_cems (load_type, wfGroup_id, indAll_id, otable) {
        $('#modal_waiting').on('shown.bs.modal', function(e){
            if (mce_1st_load) {      
                get_option('mce_document_type', '1', 'document_name', 'documentName_id', 'documentName_desc', 'documentName_status', ' ', 'ref_id', 'documentName_type', 'cems');           
                get_option('mce_docNormalize_type', '1', 'document_name', 'documentName_id', 'documentName_desc', 'documentName_status', ' ', 'ref_id', 'documentName_type', 'normalize');           
                mce_1st_load = false;
            }
            if (load_type == 1) {            
                var isFirstTime = f_get_value_from_table('wf_group', 'wfGroup_id', wfGroup_id, 'wfGroup_isFirstTime');        
                if (isFirstTime == '1') {
                    f_notify(2, 'Error', 'Please update Industrial Information as first-time login user in order to perform CEMS Installation registration');  
                    f_menu_redirect(11,0,0);
                    return false;
                }
            }
            $('#form_mce,#form_mce_2_1,#form_mce_2_2,#form_mce_2_3,#form_mce_3_1,#form_mce_3_2,#form_mce_4,#form_mce_5').trigger('reset');
            $('#form_mce_2_1').bootstrapValidator('resetForm', true);
            $('#form_mce_2_2').bootstrapValidator('resetForm', true);
            $('#form_mce_2_3').bootstrapValidator('resetForm', true);
            $('#form_mce_3_1').bootstrapValidator('resetForm', true);
            $('#form_mce_3_2').bootstrapValidator('resetForm', true);
            $('#form_mce_4').bootstrapValidator('resetForm', true);
            $('#form_mce_5').bootstrapValidator('resetForm', true);            
            $('#mce_load_type').val(load_type);
            $('#mce_wfGroup_id').val(wfGroup_id);
            $('#mce_indAll_id').val(indAll_id);
            mce_otable = otable;
            mce_load_type = load_type;
            $('#form_mce,#form_mce_2_1,#form_mce_2_2,#form_mce_2_3,#form_mce_3_1,#form_mce_3_2,#form_mce_5').find('input, textarea, select').prop('disabled',false);
            $('.mce_hideView').show();
            $('.mce_disView, .mce_disReason').attr('disabled',true);
            $('#mce_alert_box, .mce_checkView, #mce_div_doc_other').hide();
            $('#mce_snote_wfTask_remark').summernote('enable');
            $("input[name='mce_declare']").prop('checked', false);
            // ---------------- \\
            if (mce_load_type == 1) {            
                if (wfGroup_id == '') {
                    f_notify(2, 'Error', errMsg_default);    
                    return false;
                }
                if (!f_submit_normal('create_installation', {wfGroup_id:wfGroup_id, wfTaskType_id:'31', wfFlow_id:'4', indAll_type:'1'}, 'p_registration', '', errMsg_default))   return false;
                $('#mce_indAll_id').val(result_submit);
                if (mce_otable == 'icm')
                    f_table_icm ();
            } 
            // --- extract details --- //
            var status = load_type <= 2 ? '1' : '';
            var status_cons = load_type <= 2 ? 'AND consCems_status = 1' : '';
            get_option('mce_sourceActivity_id', status, 't_source_activity', 'sourceActivity_id', 'sourceActivity_desc', 'sourceActivity_status', ' ', 'ref_id');           
            get_option('mce_consultant_id', status_cons, 'consultant_cems', '', '', '', ' ', 'ref_id');           
            var installation_all = f_get_general_info('vw_installation_all_details', {indAll_id:$('#mce_indAll_id').val()}, 'mce');  
            if ((installation_all.wfTask_status == '22' && installation_all.indAll_status == '22') || (installation_all.wfTask_status == '23' && installation_all.indAll_status == '23')) {
                var previous_task = f_get_general_info_multiple('wf_task', {wfTrans_id:installation_all.wfTrans_id, wfTask_partition:'2'}, '', '', 'wfTask_id DESC');
                $('#mce_alert_box').show();
                $('#mce_alert_message').html(previous_task[0].wfTask_remark);
            }
            f_mce_set_sourceCapacity (installation_all.sourceCapacity_id, installation_all.sourceActivity_id);
            f_mce_set_metalType (installation_all.metalType_id, installation_all.sourceActivity_id);
            var industrial_pollution = f_get_general_info_multiple('t_industrial_pollution', {indAll_id:$('#mce_indAll_id').val()});
            $.each(industrial_pollution, function(u){
                $("input[name='mce_pollutionMonitored_id[]'][value=" + industrial_pollution[u].pollutionMonitored_id + "]").prop('checked', true);
            });  
            var industrial_reason = f_get_general_info_multiple('t_industrial_reason', {indAll_id:$('#mce_indAll_id').val()});
            $.each(industrial_reason, function(u){
                $("input[name='mce_indReason_id[]'][value=" + industrial_reason[u].indReason_id + "]").prop('checked', true);
                if (industrial_reason[u].indReason_id == '4') {
                    $('.mce_disReason').prop('disabled', false);
                    $('#mce_indReason_other').val(industrial_reason[u].indReason_other);
                }
            });  
            $('#form_mce_2_3').bootstrapValidator('enableFieldValidators', 'mce_indDoc_others', false);
            // ---------------- \\
            f_mce_set_consAll (installation_all.consAll_id, installation_all.consultant_id);
            // ---------------- \\
            $('[name="mce_snote_wfTask_remark"]').summernote('code', installation_all.indAll_remark);
            // ---------------- \\
            data_mce_parameter = f_get_general_info_multiple('dt_pub_param', {indAll_id:$('#mce_indAll_id').val(), indParam_status:'1'}, '', '', 'inputParam_id');
            f_dataTable_draw(mce_otable_parameter, data_mce_parameter, 'datatable_mce_parameter', 5);
            data_mce_written = f_get_general_info_multiple('dt_written_approval', {indAll_id:$('#mce_indAll_id').val()}, '', '', 'indWritten_id');
            f_dataTable_draw(mce_otable_written, data_mce_written, 'datatable_mce_written', 6);
            data_mce_document = f_get_general_info_multiple('dt_industrial_document', {indAll_id:$('#mce_indAll_id').val(), documentName_id:'(1,2,3,4,17)'}, '', '', 'indDoc_id');
            f_dataTable_draw(mce_otable_document, data_mce_document, 'datatable_mce_document', 4);
            data_mce_docNormalize = f_get_general_info_multiple('dt_industrial_document', {indAll_id:$('#mce_indAll_id').val(), documentName_id:'(15,16)'}, '', '', 'indDoc_id');
            f_dataTable_draw(mce_otable_docNormalize, data_mce_docNormalize, 'datatable_mce_docNormalize', 4);
            data_mce_personnel = f_get_general_info_multiple('t_industrial_personnel', {indAll_id:$('#mce_indAll_id').val()}, '', '', 'indPers_id');
            f_dataTable_draw(mce_otable_personnel, data_mce_personnel, 'datatable_mce_personnel', 9);
            // ---------------- \\
            if (mce_load_type >= 3) {
                mce_total_section = [];
                $('#form_mce,#form_mce_2_1,#form_mce_2_2,#form_mce_2_3,#form_mce_3_1,#form_mce_3_2,#form_mce_5').find('input, textarea, select').prop('disabled',true);
                $('#mce_snote_wfTask_remark').summernote('disable');
                $("input[name='mce_declare']").prop('checked', true);
                $('.mce_hideView').hide();
                if (mce_load_type >= 4) {
                    $('.mce_form_check').prop('disabled', false);
                    $('.mce_checkView, #mce_btn_save').show();
                    var checklist_task = f_get_general_info_multiple('t_checklist_task', {wfTask_id:$('#mce_wfTask_id').val(), checklistTask_status:'1'});
                    $.each(checklist_task, function(u){
                        $('#mce_check_remark_'+checklist_task[u].checklist_id).val(checklist_task[u].checklistTask_remark);
                        if (checklist_task[u].checklistTask_result == '1')
                            $("input[name='mce_check_pass_"+checklist_task[u].checklist_id+"']").prop('checked', true);
                        mce_total_section[u] = checklist_task[u].checklist_id;
                    });    
                }
            }    
            $('#modal_cems').modal('show');       
            $('#modal_waiting').modal('hide');
            $(this).unbind(e);
        }).modal('show');  
        
    }
        
</script>