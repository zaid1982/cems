<script type="text/javascript">  
    
    var mac_otable;
    var mac_load_type;
    var mac_1st_load = true;
    var mac_otable_cert;
    var data_mac_cert;
    var mac_otable_consParam;
    var data_mac_consParam;
    var mac_otable_personnel;
    var data_mac_personnel;
    var mac_otable_project;
    var data_mac_project;
    var mac_interval;
    var mac_interval_cnt = 0;
    var mac_total_section = [];
    
    $(document).ready(function () {
        
        $('#mac_btn_next').on('click', function () {
            var stepNum = $('#mac_wizard').wizard('selectedItem'); 
            if (stepNum.step == 5)
                $('#mac_btn_next').prop('disabled', true);
        });
        
        $('#mac_btn_prev').on('click', function () {
            var stepNum = $('#mac_wizard').wizard('selectedItem'); 
            if (stepNum.step == 6)
                $('#mac_btn_next').prop('disabled', false);
        });

        $('#mac_certificate_dateExpired').datepicker({
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
                $('#form_mac_2_4').bootstrapValidator('revalidateField', 'mac_certificate_dateExpired');
            }
        });
        
        $('#mac_snote_wfTask_remark').summernote({
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
                    $('#form_mac_6').bootstrapValidator('revalidateField', 'mac_snote_wfTask_remark');
                    $('#mac_wfTask_remark').val(contents);
                }
            }
        });   
        
        $('#form_mac_2_1').bootstrapValidator({
            excluded: ':disabled',
            fields: {  
                mac_consCems_type : {
                    validators: {
                        notEmpty: {
                            message: 'Type of Analyzer is required'
                        }
                    }
                },
                mac_consCems_modelNo : {
                    validators: {
                        notEmpty: {
                            message: 'Model No. is required'
                        },
                        stringLength : {
                            max : 30,
                            message : 'Model No. must be not more than 30 characters long'
                        }
                    }
                },
                mac_consCems_isNormalize : {
                    validators: {
                        notEmpty: {
                            message: 'Normalization is required'
                        }
                    }
                },
                mac_consCems_correction : {
                    validators: {
                        notEmpty: {
                            message: 'Correction is required'
                        }
                    }
                },
                mac_analyzerTechnique_id : {
                    validators: {
                        notEmpty: {
                            message: 'Method of Detection is required'
                        }
                    }
                },
                mac_consCems_techniqueType : {
                    validators: {
                        notEmpty: {
                            message: 'Technique is required'
                        }
                    }
                },
                mac_consCems_brand : {
                    validators: {
                        notEmpty: {
                            message: 'Brand is required'
                        },
                        stringLength : {
                            max : 30,
                            message : 'Brand must be not more than 30 characters long'
                        }
                    }
                },
                mac_consCems_manufacturer : {
                    validators: {
                        notEmpty: {
                            message: 'Manufacturer is required'
                        },
                        stringLength : {
                            max : 80,
                            message : 'Manufacturer must be not more than 80 characters long'
                        }
                    }
                },
                mac_consCems_probeType : {
                    validators: {
                        notEmpty: {
                            message: 'Probe Type is required'
                        },
                        stringLength : {
                            max : 80,
                            message : 'Probe Type must be not more than 80 characters long'
                        }
                    }
                },
                mac_consCems_probeLength : {
                    validators: {
                        notEmpty: {
                            message: 'Probe Length is required'
                        },
                        numeric: {
                            message: 'Probe Length is not a valid number',
                            thousandsSeparator: '',
                            decimalSeparator: '.'
                        },
                        callback: {
                            message: 'Probe Length must be greater than 0',
                            callback: function (value, validator, $field) {
                                return (parseFloat(value) > 0);
                            }
                        }
                    }
                },
                mac_consCems_samplingLine : {
                    validators: {
                        notEmpty: {
                            message: 'Sampling Line is required'
                        },
                        stringLength : {
                            max : 80,
                            message : 'Sampling Line must be not more than 80 characters long'
                        }
                    }
                }
            }
        });     
        
        $('#mac_consCems_techniqueType').on('change', function () {
            $('#mac_dis_outsource').val('');
            $('#form_mac_2_1').bootstrapValidator('revalidateField', 'mac_consCems_samplingLine');
        });
        
        $('#form_mac_2_6').bootstrapValidator({
            excluded: ':disabled',
            fields: {  
                'mac_consultant_type[]' : {
                    validators : {
                        choice : {
                            min : 1,
                            message : 'At least 1 Type of Consultant required'
                        }                        
                    }
                },
                'mac_consEmisCate_value[]' : {
                    validators : {
                        choice : {
                            min : 1,
                            message : 'At least 1 Categories of Emission Monitoring required'
                        }                        
                    }
                },
                mac_consCems_compStatus : {
                    validators: {
                        notEmpty: {
                            message: 'Product Status is required'
                        }
                    }
                }
            }
        });     
        
        $('#form_mac_2_2').bootstrapValidator({
            excluded: ':disabled',
            fields: {  
                mac_file_catalogue: {
                    validators: {
                        notEmpty: {
                            message: 'Manual / Catalogue Attachment File is required'
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
        
        $('#form_mac_2_3').bootstrapValidator({
            excluded: ':disabled',
            fields: {  
                mac_inputParam_id : {
                    validators: {
                        notEmpty: {
                            message: 'Input Parameter is required'
                        }
                    }
                },
                mac_consParam_rangeFromHigh : {
                    validators: {
                        notEmpty: {
                            message: 'Specified Range From is required'
                        },
                        numeric: {
                            message: 'Specified Range From is not a valid number',
                            thousandsSeparator: '',
                            decimalSeparator: '.'
                        },
                        callback: {
                            message: 'Specified Range From must be greater than 0 and less than 1,000',
                            callback: function (value, validator, $field) {
                                return (parseFloat(value) > 0 && parseFloat(value) < 1000);
                            }
                        }
                    }
                },
                mac_consParam_rangeFromLow : {
                    validators: {
                        notEmpty: {
                            message: 'Specified Range From is required'
                        },
                        numeric: {
                            message: 'Specified Range From is not a valid number',
                            thousandsSeparator: '',
                            decimalSeparator: '.'
                        },
                        callback: {
                            message: 'Specified Range From must be greater than 0 and less than 1,000',
                            callback: function (value, validator, $field) {
                                return (parseFloat(value) > 0 && parseFloat(value) < 1000);
                            }
                        }
                    }
                },
                mac_consParam_rangeToHigh : {
                    validators: {
                        notEmpty: {
                            message: 'Specified Range To is required'
                        },
                        numeric: {
                            message: 'Specified Range To is not a valid number',
                            thousandsSeparator: '',
                            decimalSeparator: '.'
                        },
                        callback: {
                            message: 'Specified Range To must be greater than Specified Range From and less than 1,000',
                            callback: function (value, validator, $field) {
                                var value_from = parseFloat($('#mac_consParam_rangeFromHigh').val());
                                return {
                                    valid: parseFloat(value) > (isNaN(value_from)?0:value_from) && parseFloat(value) < 1000,
                                    message: 'Specified Range To must be greater than ' + (isNaN(value_from)?0:value_from) + ' and less than 1,000'
                                };
                            }
                        }
                    }
                },
                mac_consParam_rangeToLow : {
                    validators: {
                        notEmpty: {
                            message: 'Specified Range To is required'
                        },
                        numeric: {
                            message: 'Specified Range To is not a valid number',
                            thousandsSeparator: '',
                            decimalSeparator: '.'
                        },
                        callback: {
                            message: 'Specified Range To must be greater than Specified Range From and less than 1,000',
                            callback: function (value, validator, $field) {
                                var value_from = parseFloat($('#mac_consParam_rangeFromLow').val());
                                return {
                                    valid: parseFloat(value) > (isNaN(value_from)?0:value_from) && parseFloat(value) < 1000,
                                    message: 'Specified Range To must be greater than ' + (isNaN(value_from)?0:value_from) + ' and less than 1,000'
                                };
                            }
                        }
                    }
                },
                mac_consParam_reference : {
                    validators: {
                        notEmpty: {
                            message: 'Consumable Span Gas is required'
                        },
                        stringLength : {
                            max : 100,
                            message : 'Consumable Span Gas must be not more than 100 characters long'
                        }
                    }
                },
                mac_consParam_dataGeneration : {
                    validators: {
                        notEmpty: {
                            message: 'Data Generation is required'
                        },
                        numeric: {
                            message: 'Data Generation is not a valid number',
                            thousandsSeparator: '',
                            decimalSeparator: '.'
                        },
                        callback: {
                            message: 'Data Generation must be greater than 0',
                            callback: function (value, validator, $field) {
                                return (parseFloat(value) > 0 && parseFloat(value) < 1000);
                            }
                        }
                    }
                },
                mac_consParam_method : {
                    validators: {
                        notEmpty: {
                            message: 'Method is required'
                        }
                    }
                }
            }
        }).on('change', 'mac_consParam_rangeFromHigh', function(e) {
            $('#form_mac_2_3').bootstrapValidator('revalidateField', 'mac_consParam_rangeToHigh');
        }).on('change', 'mac_consParam_rangeFromLow', function(e) {
            $('#form_mac_2_3').bootstrapValidator('revalidateField', 'mac_consParam_rangeToLow');
        });  
        
        $('#mac_consParam_rangeFromHigh').on('keyup', function () {
            $('#form_mac_2_3').bootstrapValidator('revalidateField', 'mac_consParam_rangeToHigh');
        });
        
        $('#mac_consParam_rangeFromLow').on('keyup', function () {
            $('#form_mac_2_3').bootstrapValidator('revalidateField', 'mac_consParam_rangeToLow');
        });
        
        $('#form_mac_2_4').bootstrapValidator({
            excluded: ':disabled',
            fields: {  
                mac_certificate_no : {
                    validators: {
                        notEmpty: {
                            message: 'Certificate No. is required'
                        },
                        stringLength : {
                            max : 30,
                            message : 'Certificate No. must be not more than 30 characters long'
                        }
                    }
                },
                mac_certIssuer_id : {
                    validators: {
                        notEmpty: {
                            message: 'Certificate Issuer is required'
                        }
                    }
                },
                mac_certificate_dateExpired : {
                    validators: {
                        notEmpty: {
                            message: 'Expired Date is required'
                        }
                    }
                },
                mac_file_certificate : {
                    validators: {
                        notEmpty: {
                            message: 'Certificate Attachment File is required'
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
        
        $('#mac_certIssuer_id').on('change', function() {
            var is_enabled = $(this).val() != '3';
            $('#form_mac_2_4').bootstrapValidator('enableFieldValidators', 'mac_certificate_dateExpired', is_enabled)
                .bootstrapValidator('enableFieldValidators', 'mac_certificate_basic', is_enabled)
                .bootstrapValidator('enableFieldValidators', 'mac_file_certificate', is_enabled);
            $('#form_mac_2_4').bootstrapValidator('revalidateField', 'mac_certificate_dateExpired')
                .bootstrapValidator('revalidateField', 'mac_certificate_basic')
                .bootstrapValidator('revalidateField', 'mac_file_certificate');
        });    
        
        $('#form_mac_2_5').bootstrapValidator({
            excluded: ':disabled',
            fields: {  
                mac_dis_name : {
                    validators: {
                        notEmpty: {
                            message: 'Name of DIS is required'
                        },
                        stringLength : {
                            max : 80,
                            message : 'Name of DIS must be not more than 80 characters long'
                        }
                    }
                },
                mac_dis_type : {
                    validators: {
                        notEmpty: {
                            message: 'Status of DIS is required'
                        }
                    }
                },
                mac_dis_outsource : {
                    validators: {
                        callback: {
                            message: 'Outsourced Company is required',
                            callback: function (value, validator, $field) {
                                return ($('#mac_dis_type').val() != '2') ? true : (value !== '');
                            }
                        },
                        stringLength : {
                            max : 80,
                            message : 'Outsourced Company must be not more than 80 characters long'
                        }
                    }
                },
                mac_dis_description : {
                    validators: {
                        notEmpty: {
                            message: 'Software Description is required'
                        },
                        stringLength : {
                            max : 500,
                            message : 'Software Description must be not more than 500 characters long'
                        }
                    }
                }
            }
        });   
        
        $('#form_mac_3').bootstrapValidator({
            excluded: ':disabled',
            fields: {  
                mac_consPers_name : {
                    validators: {
                        notEmpty: {
                            message: 'Name of Certified Employee is required'
                        },
                        stringLength : {
                            max : 80,
                            message : 'Name of Certified Employee must be not more than 80 characters long'
                        }
                    }
                },
                mac_personnel_icNo : {
                    validators: {
                        notEmpty: {
                            message: 'IC / Passport No. is required'
                        },
                        digits : {
                            message : 'Identification No. must be digits'
                        },
                        callback: {
                            message: 'Identification No. must be 12 digits long',
                            callback: function (value, validator, $field) {
                                var value_citizen = $('input[name="mac_personnel_citizenship"]:checked').val();
                                return {
                                    valid: (value_citizen==1 && value.length== 12) || (value_citizen==2&&value.length>=5 && value.length<=9),
                                    message: (value_citizen==1?'Identification No.':'Passport') + ' No. must be ' + (value_citizen==1?'12':'between 5 and 9') + ' digits long'
                                };
                            }
                        }
                    }
                },
                mac_consPers_qualification : {
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
                mac_consPers_experience : {
                    validators: {
                        notEmpty: {
                            message: 'Working Experience is required'
                        },
                        stringLength : {
                            max : 255,
                            message : 'Working Experience must be not more than 255 characters long'
                        }
                    }
                },
                mac_consPers_certificate : {
                    validators: {
                        notEmpty: {
                            message: 'Training Certification is required'
                        },
                        stringLength : {
                            max : 255,
                            message : 'Training Certification must be not more than 255 characters long'
                        }
                    }
                },
                mac_consPers_document : {
                    validators: {
                        notEmpty: {
                            message: 'Personnel Supporting Document is required',
                            enabled: false,
                        },
                        file: {
                            extension: 'pdf',
                            type: 'application/pdf',
                            maxSize: '5000000',
                            message: 'Only PDF file format allowed.',
                            enabled: false,
                        }
                    }
                }
            }
        });   
        
        $('#form_mac_3').find('[name="mac_personnel_citizenship"]').on('click', function () { 
            var is_enabled = $(this).val() == '1';
            $('#form_mac_3').bootstrapValidator('enableFieldValidators', 'mac_personnel_icNo', is_enabled, 'digits');
            $('#form_mac_3').bootstrapValidator('revalidateField', 'mac_personnel_icNo');
        });
        
        $('#form_mac_3').find('[name="mac_consPers_workingStatus"]').on('click', function () { 
            var is_enabled = $(this).val() == '2';
            $('#form_mac_3').bootstrapValidator('enableFieldValidators', 'mac_consPers_document', is_enabled);
            $('#form_mac_3').bootstrapValidator('revalidateField', 'mac_consPers_document');
        });
        
        $('#form_mac_4').bootstrapValidator({
            excluded: ':disabled',
            fields: {  
                mac_consAll_qaMethod : {
                    validators: {
                        notEmpty: {
                            message: 'Method is required'
                        }
                    }
                },
                mac_consAll_qaFreqDaily : {
                    validators: {
                        notEmpty: {
                            message: 'Daily Ongoing Frequency Check is required'
                        }
                    }
                },
                mac_consAll_qaFreqQuarterly : {
                    validators: {
                        notEmpty: {
                            message: 'Quarterly Ongoing Frequency Check is required'
                        }
                    }
                },
                'mac_q_qaQuarter_id[]' : {
                    validators: {
                        choice : {
                            min : 3,
                            message : 'At least 3 Quarter required'
                        }  
                    }
                },
                mac_consAll_qaFreqYearly : {
                    validators: {
                        notEmpty: {
                            message: 'Yearly Ongoing Frequency Check is required'
                        }
                    }
                },
                'mac_y_qaQuarter_id' : {
                    validators: {
                        notEmpty : {
                            message : 'Quarter is required'
                        }  
                    }
                }
            }
        });
        
        $('#form_mac_4').find('[name="mac_consAll_qaFreqQuarterly"]').on('click', function () { 
            if ($(this).val() == '2') {
                $('#form_mac_4').bootstrapValidator('enableFieldValidators', 'mac_q_qaQuarter_id[]', false);
                $('.mac_q_qaQuarter').prop('checked', false).prop('disabled', true);
            } else {
                $('#form_mac_4').bootstrapValidator('enableFieldValidators', 'mac_q_qaQuarter_id[]', true);
                $('.mac_q_qaQuarter').prop('disabled', false);
                f_mac_set_quarterRATA();
            }
            $('#form_mac_4').bootstrapValidator('revalidateField', 'mac_q_qaQuarter_id[]');
        });
        
        $('#form_mac_4').find('[name="mac_consAll_qaFreqYearly"]').on('click', function () { 
            if ($(this).val() == '2') {
                $('#form_mac_4').bootstrapValidator('enableFieldValidators', 'mac_y_qaQuarter_id', false);
                $("input[name='mac_y_qaQuarter_id']").prop('checked', false).prop('disabled', true);            
            } else {
                $('#form_mac_4').bootstrapValidator('enableFieldValidators', 'mac_y_qaQuarter_id', true);
                $("input[name='mac_y_qaQuarter_id']").prop('disabled', false);  
                f_mac_set_yearRATA();
            }
            $('#form_mac_4').bootstrapValidator('revalidateField', 'mac_y_qaQuarter_id');
        });
        
        $('.mac_q_qaQuarter').on('click', function () {
            f_mac_set_yearRATA();
        });
        
        $('#form_mac_4').find('[name="mac_y_qaQuarter_id"]').on('click', function () { 
            f_mac_set_quarterRATA();
        });
        
        $('#form_mac_5').bootstrapValidator({
            excluded: ':disabled',
            fields: {  
                mac_consProject_title : {
                    validators: {
                        notEmpty: {
                            message: 'Project Title is required'
                        },
                        stringLength : {
                            max : 150,
                            message : 'Project Title must be not more than 150 characters long'
                        }
                    }
                },
                mac_consProject_year : {
                    validators: {
                        notEmpty: {
                            message: 'Year is required'
                        }
                    }
                },
                mac_consProject_client : {
                    validators: {
                        notEmpty: {
                            message: 'Client is required'
                        },
                        stringLength : {
                            max : 150,
                            message : 'Client must be not more than 150 characters long'
                        }
                    }
                },
                mac_consProject_desc : {
                    validators: {
                        notEmpty: {
                            message: 'Project Description is required'
                        },
                        stringLength : {
                            max : 255,
                            message : 'Project Description must be not more than 255 characters long'
                        }
                    }
                },
                mac_consProject_scope : {
                    validators: {
                        notEmpty: {
                            message: 'Scope of Work is required'
                        },
                        stringLength : {
                            max : 150,
                            message : 'Scope of Work must be not more than 150 characters long'
                        }
                    }
                },
                mac_consProject_source : {
                    validators: {
                        notEmpty: {
                            message: 'Source of Activity is required'
                        }
                    }
                },
                mac_consProject_value : {
                    validators: {
                        numeric: {
                            message: 'Project Value must numeric',
                            decimalSeparator: '.'
                        },
                        greaterThan: {
                            value: 0,
                            message: 'Project Value must greater than 0',
                        },
                        stringLength : {
                            max : 15,
                            message : 'Project Value must be not more than 15 characters long'
                        }
                    }
                }
            }
        });
        
        $('#form_mac_6').bootstrapValidator({      
            excluded: ':disabled',
            fields: {  
                mac_declare_1 : {
                    validators : {
                        choice : {
                            min : 1,
                            message : 'Declaration required'
                        }                        
                    }
                },
                mac_declare_2 : {
                    validators : {
                        choice : {
                            min : 1,
                            message : 'Declaration required'
                        }                        
                    }
                },
                mac_snote_wfTask_remark : {
                    validators: {
                        callback: {
                            message: 'Remark is required',
                            callback: function(value, validator, $field) {
                                var code = $('[name="mac_snote_wfTask_remark"]').summernote('code');
                                return (code !== '' && code !== '<p><br></p>');
                            }
                        }
                    }
                }
            }
        });
        
        $('#modal_consultant_cems').on('show.bs.modal', function() {
            $('#mac_wizard').wizard('selectedItem', { step:1 });
            $('#mac_btn_next').prop('disabled', false);    
//            if ($('#mac_load_type').val() == '1' || $('#mac_load_type').val() == '2') {
//                mac_interval = window.setInterval(function(){ 
//                    if (mac_interval_cnt == 1) {
//                        $('#mac_funct').val('save_consultant_cems');
//                        $('#mac_wfTask_remark').val($('[name="mac_snote_wfTask_remark"]').summernote('code'));
//                        $('#modal_waiting').on('shown.bs.modal', function(e){
//                            if (f_submit_forms('form_mac,#form_mac_2_1,#form_mac_2_5,#form_mac_2_6,#form_mac_4,#form_mac_6', 'p_registration', 'Data successfully saved.')) {
//                                if (mac_otable == 'cca')
//                                    f_table_cca ();
//                            }
//                            $('#modal_waiting').modal('hide');
//                            $(this).unbind(e);
//                        }).modal('show');  
//                    }
//                    mac_interval_cnt = 1;
//                }, 300000);
//            }
        });
        
        $('#modal_consultant_cems').on('hide.bs.modal', function() {
            mac_interval_cnt = 0;
            //clearInterval(mac_interval);
            mac_interval = 0;
        });
                
        $('#mac_dis_type').on('change', function () {
            $('#mac_dis_outsource').val('');
            $('#form_mac_2_5').bootstrapValidator('revalidateField', 'mac_dis_outsource');
            $('#mac_dis_outsource').attr('disabled',$(this).val() == '2' ? false : true);
            $('#form_mac_2_5').bootstrapValidator('revalidateField', 'mac_dis_outsource');
        });
        
        $('#mac_btn_save').on('click', function () {            
            if ($('#mac_load_type').val() == '4') {
                $('#modal_waiting').on('shown.bs.modal', function(e){ 
                    var parameters = {};
                    parameters['wfTask_id'] = $('#mac_wfTask_id').val();    
                    parameters['wfFlow_id'] = '1';       
                    $.each(mac_total_section, function(value){     
                        parameters['check_remark_'+mac_total_section[value]] = $('#mac_check_remark_'+mac_total_section[value]).val();
                        parameters['check_pass_'+mac_total_section[value]] = $("input[name='mac_check_pass_"+mac_total_section[value]+"']").is(':checked') ? '1' : '0';
                    });
                    f_submit_normal('save_process_checking', parameters, 'p_registration', 'Process Checklist successfully saved.');
                    $('#modal_waiting').modal('hide');
                    $(this).unbind(e);
                }).modal('show'); 
            } else {
                $('#mac_funct').val('save_consultant_cems');
                $('#mac_wfTask_remark').val($('[name="mac_snote_wfTask_remark"]').summernote('code'));
                $('#modal_waiting').on('shown.bs.modal', function(e){
                    if (f_submit_forms('form_mac,#form_mac_2_1,#form_mac_2_5,#form_mac_2_6,#form_mac_4,#form_mac_6', 'p_registration', 'Data successfully saved.')) {
                        if (mac_otable == 'cca')
                            f_table_cca ();
                    }
                    $('#modal_waiting').modal('hide');
                    $(this).unbind(e);
                }).modal('show'); 
            }
        }); 
        
        $('#mac_btn_submit').on('click', function () {            
            var bootstrapValidator = $("#form_mac_2_1").data('bootstrapValidator');
            bootstrapValidator.validate();
            if (!bootstrapValidator.isValid()) {         
                $('#mac_wizard').wizard('selectedItem', { step:2 });
                f_notify(2, 'Error', errMsg_validation);    
                return false;
            }
            bootstrapValidator = $("#form_mac_2_6").data('bootstrapValidator');
            bootstrapValidator.validate();
            if (!bootstrapValidator.isValid()) {         
                $('#mac_wizard').wizard('selectedItem', { step:2 });
                f_notify(2, 'Error', errMsg_validation);    
                return false;
            }
            if (data_mac_consParam.length == 0) {
                $('#mac_wizard').wizard('selectedItem', { step:2 });
                $('#mac_btn_add_parameter').focus();
                f_notify(2, 'Error', 'Please provide Parameters and Specified Range!');    
                return false;
            } else {
                var arrStr_sourceActivity = '';
                $.each($("input[name='mac_sourceActivity_id[]']:checked"), function(){     
                    arrStr_sourceActivity += ',' + $(this).val();
                });
                var is_exist = false;
                var arr_inputParam = f_get_general_info_multiple('vw_pub_group_inputParam', {}, {arr_sourceActivity_id:arrStr_sourceActivity});
                $.each(arr_inputParam, function(u){     
                    is_exist = false;
                    $.each(data_mac_consParam, function(v){     
                        if (data_mac_consParam[v].inputParam_id == arr_inputParam[u].inputParam_id)
                            is_exist = true;
                    });
                    if (!is_exist) {
                        f_notify(2, 'Error', 'Please provide specified range for parameter <strong>'+arr_inputParam[u].inputParam_desc+'</strong> in Section B.3. Parameters and Specified Range!');    
                        return false; 
                    }
                });
                if (!is_exist) {
                    $('#mac_wizard').wizard('selectedItem', { step:2 });
                    $('#mac_btn_add_parameter').focus();                    
                    return false;
                }
            }
            if (data_mac_cert.length == 0) {
                $('#mac_wizard').wizard('selectedItem', { step:2 });
                $('#mac_btn_add_certificate').focus();
                f_notify(2, 'Error', 'Please provide Analyzer Certification!');    
                return false;
            }
            bootstrapValidator = $("#form_mac_2_5").data('bootstrapValidator');
            bootstrapValidator.validate();
            if (!bootstrapValidator.isValid()) {         
                $('#mac_wizard').wizard('selectedItem', { step:2 });
                f_notify(2, 'Error', errMsg_validation);    
                return false;
            }
            if (data_mac_personnel.length == 0) {
                $('#mac_wizard').wizard('selectedItem', { step:3 });
                $('#mac_btn_add_personnel').focus();
                f_notify(2, 'Error', 'Please provide Information of Personnel for CEMS!');    
                return false;
            }
            if (!f_submit_normal('check_consultant_personnel', {consAll_id:$('#mac_consAll_id').val(), wfGroup_id: $('#mac_wfGroup_id').val()}, 'p_registration')) {
                $('#mac_wizard').wizard('selectedItem', { step:3 });
                $('#mac_btn_add_personnel').focus();
                return false;
            }                   
            bootstrapValidator = $("#form_mac_4").data('bootstrapValidator');
            bootstrapValidator.validate();
            if (!bootstrapValidator.isValid()) {         
                $('#mac_wizard').wizard('selectedItem', { step:4 });
                f_notify(2, 'Error', errMsg_validation);    
                return false;
            }
            if (data_mac_project.length == 0) {
                $('#mac_wizard').wizard('selectedItem', { step:5 });
                $('#mac_btn_add_project').focus();
                f_notify(2, 'Error', 'Please provide Information of Company\'s Working Experience!');    
                return false;
            }
            bootstrapValidator = $("#form_mac_6").data('bootstrapValidator');
            bootstrapValidator.validate();
            if (!bootstrapValidator.isValid()) {         
                $('#mac_wizard').wizard('selectedItem', { step:6 });
                f_notify(2, 'Error', errMsg_validation);    
                return false;
            }
            $("#mac_funct").val('save_consultant_cems');
            $('#mac_wfTask_remark').val($('[name="mac_snote_wfTask_remark"]').summernote('code'));
            if (f_submit_forms('form_mac,#form_mac_2_1,#form_mac_2_5,#form_mac_2_6,#form_mac_4,#form_mac_6', 'p_registration')) {
                $.SmartMessageBox({
                    title : "<i class='fa fa-exclamation-circle'></i> Confirmation!",
                    content : "Are you sure to submit the CEMS Consultant Registration Form?",
                    buttons : '[No][Yes]'
                }, function(ButtonPressed) {
                    if (ButtonPressed === "Yes") {            
                        $('#modal_waiting').on('shown.bs.modal', function(e){    
                            if (f_submit_normal('check_consultant_active', {wfGroup_id: $('#mac_wfGroup_id').val()}, 'p_registration')) {
                                var submit_status = $('#mac_wfTask_status').val() == '2' ? '10' : '13';
                                var submit_msg = $('#mac_wfTask_status').val() == '2' ? 'Your application successfully submitted. Result will be alerted through your email.' : 'Your application successfully resubmitted. Result will be alerted through your email.';
                                var condition_no = $('#mac_wfTask_status').val() == '2' ? '' : '1';
                                var wfGroup_id = $('#mac_wfTask_status').val() == '2' ? $('#mac_wfGroup_id').val() : '';
                                if (f_submit($('#mac_wfTask_id').val(), $('#mac_wfTaskType_id').val(), submit_status, submit_msg, $('#mac_wfTask_remark').val(), condition_no, wfGroup_id, '', 'consAll_id', $('#mac_consAll_id').val())) {
                                    var email_type = submit_status == '2' ? 'email_assign' : 'email_process';
                                    f_send_email(email_type, {wfTask_id:result_submit_task}); 
                                    if (mac_otable == 'hm8') 
                                        f_hm8_set_alert();
                                    else if (mac_otable == 'cca')
                                        f_table_cca ();
                                    $('#modal_consultant_cems').modal('hide');
                                }
                            } else {
                                f_notify(2, 'Error', 'Your application cannot be proceed because the Company Registration No. already activated by another user. Please contact administrator to report this issue.');    
                            }
                            $('#modal_waiting').modal('hide');
                            $(this).unbind(e);
                        }).modal('show'); 
                    }
                });
            }
        }); 
        
        $('#mac_btn_upload_catalogue').on('click', function () {
            var bootstrapValidator = $("#form_mac_2_2").data('bootstrapValidator');
            bootstrapValidator.validate();
            if (bootstrapValidator.isValid()) {  
                $('#modal_waiting').on('shown.bs.modal', function(e){      
                    var formData = new FormData($('#form_mac_2_2')[0]);
                    formData.append('funct', 'upload_analyzer_catalogue');
                    formData.append('consAll_id', $('#mac_consAll_id').val());
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
                                f_notify(1, 'Success', 'Document successfully uploaded.');
                                f_display_attachment('mac_doc_catalogue', f_get_general_info_multiple('vw_consultant_doc', {param_id:$('#mac_consAll_id').val()}));   
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
                $('#mac_file_catalogue').focus();
                f_notify(2, 'Error', 'Please make sure file to be uploaded is selected.');   
            }
        });
        
        $('#mac_btn_add_parameter').on('click', function () {            
            var bootstrapValidator = $("#form_mac_2_3").data('bootstrapValidator');
            bootstrapValidator.validate();
            if (bootstrapValidator.isValid()) {     
                $('#mac_funct').val('save_consultant_parameter');
                $('#modal_waiting').on('shown.bs.modal', function(e){                    
                    if (f_submit_forms('form_mac,#form_mac_2_3', 'p_registration', 'Input Parameter successfully added.')) {
                        $('#form_mac_2_3').bootstrapValidator('resetForm', true);
                        data_mac_consParam = f_get_general_info_multiple('dt_consultant_parameter', {consAll_id:$('#mac_consAll_id').val()}, '', '', 'consParam_id');
                        f_dataTable_draw(mac_otable_consParam, data_mac_consParam, 'datatable_mac_consParam', 5);
                    }
                    $('#modal_waiting').modal('hide');
                    $(this).unbind(e);
                }).modal('show'); 
            } else {
                f_notify(2, 'Error', errMsg_validation);    
                return false;
            }
        }); 
        
        $('#mac_btn_add_certificate').on('click', function () {
            var bootstrapValidator = $("#form_mac_2_4").data('bootstrapValidator');
            bootstrapValidator.validate();
            if (bootstrapValidator.isValid()) {       
                $('#modal_waiting').on('shown.bs.modal', function(e){      
                    var formData = new FormData($('#form_mac_2_4')[0]);
                    formData.append('funct', 'save_certificate');
                    formData.append('mac_consAll_id', $('#mac_consAll_id').val());
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
                                f_notify(1, 'Success', 'Certificate successfully added.');
                                $('#form_mac_2_4').trigger('reset');
                                $('#form_mac_2_4').bootstrapValidator('resetForm', true);
                                data_mac_cert = f_get_general_info_multiple('dt_certificate', {consAll_id:$('#mac_consAll_id').val()}, '', '', 'certificate_id');
                                f_dataTable_draw(mac_otable_cert, data_mac_cert, 'datatable_mac_cert', 6);
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
        
        $('#mac_btn_add_personnel').on('click', function () {
            var bootstrapValidator = $("#form_mac_3").data('bootstrapValidator');
            bootstrapValidator.validate();
            if (bootstrapValidator.isValid()) {         
                $('#mac_funct').val('save_consultant_personnel');
                $('#modal_waiting').on('shown.bs.modal', function(e){     
                    var formData = new FormData($('#form_mac_3')[0]);
                    formData.append('funct', 'save_consultant_personnel');
                    formData.append('mac_consAll_id', $('#mac_consAll_id').val());
                    formData.append('mac_wfGroup_id', $('#mac_wfGroup_id').val());
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
                                f_notify(1, 'Success', 'CEMS Personnel successfully added.');
                                $('#form_mac_3').trigger('reset');
                                $('#form_mac_3').bootstrapValidator('resetForm', true);
                                data_mac_personnel = f_get_general_info_multiple('dt_consultant_personnel', {consAll_id:$('#mac_consAll_id').val()}, '', '', 'consPers_id');
                                f_dataTable_draw(mac_otable_personnel, data_mac_personnel, 'datatable_mac_personnel', 8);
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
        
        $('#mac_btn_add_project').on('click', function () {
            var bootstrapValidator = $("#form_mac_5").data('bootstrapValidator');
            bootstrapValidator.validate();
            if (bootstrapValidator.isValid()) {         
                $('#mac_funct').val('save_consultant_project');
                $('#modal_waiting').on('shown.bs.modal', function(e){    
                    if (f_submit_forms('form_mac,#form_mac_5', 'p_registration', 'Company Working Experience successfully added.')) {
                        $('#form_mac_5').bootstrapValidator('resetForm', true);                    
                        data_mac_project = f_get_general_info_multiple('dt_consultant_project', {consultant_id:$('#mac_consultant_id').val(), consProject_status:'1'}, '', '', 'consProject_year desc');
                        f_dataTable_draw(mac_otable_project, data_mac_project, 'datatable_mac_project', 9);
                    }
                    $('#modal_waiting').modal('hide');
                    $(this).unbind(e);
                }).modal('show');
            } else {
                f_notify(2, 'Error', errMsg_validation);    
                return false;
            }
        }); 
        
        var datatable_mac_cert = undefined; 
        mac_otable_cert = $('#datatable_mac_cert').DataTable({
            "paging": false,
            "ordering": false,
            "autoWidth": false,
            "info": false,
            "bFilter": false,
            "preDrawCallback": function () {
                if (!datatable_mac_cert) {
                    datatable_mac_cert = new ResponsiveDatatablesHelper($('#datatable_mac_cert'), breakpointDefinition);
                }
            },
            "rowCallback": function (nRow, aData, index) {
                datatable_mac_cert.createExpandIcon(nRow);
                var info = mac_otable_cert.page.info();
                $('td', nRow).eq(0).html(info.page * info.length + (index + 1));
            },
            "drawCallback": function (oSettings) {
                datatable_mac_cert.respond();
            },
            "aoColumns":
                [
                    {mData: null},
                    {mData: 'certificate_no'},
                    {mData: 'certIssuer_desc'},
                    {mData: 'certBasic_desc'},
                    {mData: 'certificate_dateExpired'},
                    {mData: null, sClass: 'text-center',
                        mRender: function (data, type, row) {
                            $label = '';
                            if (row.document_id != null)
                                $label += '<a type="button" class="btn btn-success btn-xs" title="Download Certificate" href="process/download.php?doc_id='+row.document_id+'"><i class="fa fa-download"></i></a>';
                            $label += ' <button type="button" class="btn btn-danger btn-xs mac_hideView" title="Delete" onclick="f_mac_delete_certificate ('+row.certificate_id+');"><i class="fa fa-trash-o"></i></button>';
                            return $label;
                        }
                    }
                ]
        });
        
        var datatable_mac_consParam = undefined; 
        mac_otable_consParam = $('#datatable_mac_consParam').DataTable({
            "paging": false,
            "ordering": false,
            "autoWidth": false,
            "info": false,
            "bFilter": false,
            "preDrawCallback": function () {
                if (!datatable_mac_consParam) {
                    datatable_mac_consParam = new ResponsiveDatatablesHelper($('#datatable_mac_consParam'), breakpointDefinition);
                }
            },
            "rowCallback": function (nRow, aData, index) {
                datatable_mac_consParam.createExpandIcon(nRow);
                var info = mac_otable_consParam.page.info();
                $('td', nRow).eq(0).html(info.page * info.length + (index + 1));
            },
            "drawCallback": function (oSettings) {
                datatable_mac_consParam.respond();
            },
            "aoColumns":
                [
                    {mData: null},
                    {mData: 'inputParam_desc'},
                    {mData: null, mRender: function (data, type, row) { return row.consParam_rangeFromLow + ' - ' + row.consParam_rangeToLow}},
                    {mData: null, mRender: function (data, type, row) { return row.consParam_rangeFromHigh + ' - ' + row.consParam_rangeToHigh}},
                    {mData: 'consParam_reference'},
                    {mData: 'consParam_dataGeneration'},
                    {mData: 'consParam_method',
                        mRender: function (data, type, row) {
                            $label = '';
                            if (data == '1')
                                $label = 'US-EPA Protocol 1 Method';
                            else
                                $label = 'NIST Standards';
                            return $label;
                        }
                    },
                    {mData: null, sClass: 'text-center',
                        mRender: function (data, type, row) {
                            $label = '<button type="button" class="btn btn-danger btn-xs mac_hideView" title="Delete" onclick="f_mac_delete_consParam ('+row.consParam_id+');"><i class="fa fa-trash-o"></i></button>';
                            return $label;
                        }
                    }
                ]
        });
        
        var datatable_mac_personnel = undefined; 
        mac_otable_personnel = $('#datatable_mac_personnel').DataTable({
            "paging": false,
            "ordering": false,
            "autoWidth": false,
            "info": false,
            "bFilter": false,
            "preDrawCallback": function () {
                if (!datatable_mac_personnel) {
                    datatable_mac_personnel = new ResponsiveDatatablesHelper($('#datatable_mac_personnel'), breakpointDefinition);
                }
            },
            "rowCallback": function (nRow, aData, index) {
                datatable_mac_personnel.createExpandIcon(nRow);
                var info = mac_otable_personnel.page.info();
                $('td', nRow).eq(0).html(info.page * info.length + (index + 1));
            },
            "drawCallback": function (oSettings) {
                datatable_mac_personnel.respond();
            },
            "aoColumns":
                [
                    {mData: null},
                    {mData: 'personnel_icNo'},
                    {mData: 'consPers_name'},
                    {mData: 'consPers_workingStatus',
                        mRender: function (data, type, row) {
                            return data == '2' ? 'Loan / Contracted' : 'Staff';
                        }
                    },
                    {mData: 'consPers_qualification'},
                    {mData: 'consPers_experience'},
                    {mData: 'consPers_certificate'},
                    {mData: null, sClass: 'text-center',
                        mRender: function (data, type, row) {
                            $label = '';
                            if (row.consPers_document != null)
                                $label = '<a type="button" class="btn btn-success btn-xs" title="Employee\'s Support Document" href="process/download.php?doc_id='+row.consPers_document+'"><i class="fa fa-download"></i></a> ';
                            $label += '<button type="button" class="btn btn-danger btn-xs mac_hideView" title="Delete" onclick="f_mac_delete_consPers ('+row.consPers_id+');"><i class="fa fa-trash-o"></i></button>';
                            return $label;
                        }
                    }
                ]
        });
        
        var datatable_mac_project = undefined; 
        mac_otable_project = $('#datatable_mac_project').DataTable({
            "paging": false,
            "ordering": false,
            "autoWidth": false,
            "info": false,
            "bFilter": false,
            "preDrawCallback": function () {
                if (!datatable_mac_project) {
                    datatable_mac_project = new ResponsiveDatatablesHelper($('#datatable_mac_project'), breakpointDefinition);
                }
            },
            "rowCallback": function (nRow, aData, index) {
                datatable_mac_project.createExpandIcon(nRow);
                var info = mac_otable_project.page.info();
                $('td', nRow).eq(0).html(info.page * info.length + (index + 1));
            },
            "drawCallback": function (oSettings) {
                datatable_mac_project.respond();
            },
            "aoColumns":
                [
                    {mData: null},
                    {mData: 'consProject_title'},
                    {mData: 'consProject_year'},
                    {mData: 'consProject_client'},
                    {mData: 'consProject_desc'},
                    {mData: 'consProject_scope'},
                    {mData: 'sourceActivity_desc'},
                    {mData: 'consProject_value', sClass: 'text-right', mRender: function(data) { return formattedNumber(data,2);}},
                    {mData: null, sClass: 'text-center',
                        mRender: function (data, type, row) {
                            $label = '';
                            if (row.consProject_type == '1')
                                $label = '<button type="button" class="btn btn-danger btn-xs mac_hideView" title="Delete" onclick="f_mac_delete_project ('+row.consProject_id+');"><i class="fa fa-trash-o"></i></button>';
                            return $label;
                        }
                    }
                ]
        });
    });    
    
    function f_mac_delete_certificate (certificate_id) {
        $('#modal_waiting').on('shown.bs.modal', function(e){
            if (f_submit_normal('delete_certificate', {certificate_id: certificate_id}, 'p_registration', 'Data successfully deleted.')) {
                data_mac_cert = f_get_general_info_multiple('dt_certificate', {consAll_id:$('#mac_consAll_id').val()}, '', '', 'certificate_id');
                f_dataTable_draw(mac_otable_cert, data_mac_cert, 'datatable_mac_cert', 6);
            }
            $('#modal_waiting').modal('hide');
            $(this).unbind(e);
        }).modal('show'); 
    }
    
    function f_mac_delete_consParam (consParam_id) {
        $('#modal_waiting').on('shown.bs.modal', function(e){
            if (f_submit_normal('delete_consultant_parameter', {consParam_id: consParam_id}, 'p_registration', 'Data successfully deleted.')) {
                data_mac_consParam = f_get_general_info_multiple('dt_consultant_parameter', {consAll_id:$('#mac_consAll_id').val()}, '', '', 'consParam_id');
                f_dataTable_draw(mac_otable_consParam, data_mac_consParam, 'datatable_mac_consParam', 5);
            }
            $('#modal_waiting').modal('hide');
            $(this).unbind(e);
        }).modal('show');  
    }
    
    function f_mac_delete_consPers (consPers_id) {
        $('#modal_waiting').on('shown.bs.modal', function(e){
            if (f_submit_normal('delete_consultant_personnel', {consPers_id: consPers_id, wfGroup_id: $('#mac_wfGroup_id').val()}, 'p_registration', 'Data successfully deleted.')) {
                data_mac_personnel = f_get_general_info_multiple('dt_consultant_personnel', {consAll_id:$('#mac_consAll_id').val()}, '', '', 'consPers_id');
                f_dataTable_draw(mac_otable_personnel, data_mac_personnel, 'datatable_mac_personnel', 8);
            }
            $('#modal_waiting').modal('hide');
            $(this).unbind(e);
        }).modal('show');  
    }
    
    function f_mac_delete_project (consProject_id) {
        $('#modal_waiting').on('shown.bs.modal', function(e){
            if (f_submit_normal('delete_consultant_project', {consProject_id: consProject_id}, 'p_registration', 'Data successfully deleted.')) {
                data_mac_project = f_get_general_info_multiple('dt_consultant_project', {consultant_id:$('#mac_consultant_id').val(), consProject_status:'1'}, '', '', 'consProject_year desc');
                f_dataTable_draw(mac_otable_project, data_mac_project, 'datatable_mac_project', 9);
            }
            $('#modal_waiting').modal('hide');
            $(this).unbind(e);
        }).modal('show');  
    }
    
    function f_mac_refresh_inputParameter() {        
        var arrStr_sourceActivity = '';
        $.each($("input[name='mac_sourceActivity_id[]']:checked"), function(){     
            arrStr_sourceActivity += ',' + $(this).val();
        });
        var arr_inputParam = f_get_general_info_multiple('vw_pub_group_inputParam', {}, {arr_sourceActivity_id:arrStr_sourceActivity});
        get_option_data('mac_inputParam_id', arr_inputParam, 'inputParam_id', 'inputParam_desc', ' ');
    }
        
    function f_mac_set_yearRATA() {
        var searchIDs = $("input[name='mac_q_qaQuarter_id[]']:checked").map(function(){
            return $(this).val();
        }).get();
        if (searchIDs.length == 3) {
            if ($('input[name="mac_consAll_qaFreqQuarterly"]:checked').val() == '1' && $('input[name="mac_consAll_qaFreqYearly"]:checked').val() == '1') {
                for(var n=1; n<=4; n++) {
                    if (!$("input[name='mac_q_qaQuarter_id[]'][value="+n+"]").is(':checked'))
                        $("input[name='mac_y_qaQuarter_id'][value="+n+"]").prop('checked', true);
                }
                $('#form_mac_4').bootstrapValidator('revalidateField', 'mac_y_qaQuarter_id');
            }
        }
    }
    
    function f_mac_set_quarterRATA() {
        var searchIDs = $("input[name='mac_q_qaQuarter_id[]']:checked").map(function(){
            return $(this).val();
        }).get();
        if (searchIDs.length <= 3) {
            if ($('input[name="mac_consAll_qaFreqQuarterly"]:checked').val() == '1' && $('input[name="mac_consAll_qaFreqYearly"]:checked').val() == '1') {
                for(var n=1; n<=4; n++) {
                    $("input[name='mac_q_qaQuarter_id[]'][value="+n+"]").prop('checked', false);
                    if (n != $('input[name="mac_y_qaQuarter_id"]:checked').val())
                        $("input[name='mac_q_qaQuarter_id[]'][value="+n+"]").prop('checked', true);
                }
                $('#form_mac_4').bootstrapValidator('revalidateField', 'mac_q_qaQuarter_id[]');
            }
        }
    }
        
    function f_load_consultant_cems (load_type, wfGroup_id, consAll_id, otable) {
        $('#modal_waiting').on('shown.bs.modal', function(e){
            if (mac_1st_load) {          
                var source_activity = f_get_general_info_multiple('t_source_activity', {sourceActivity_status:'1'}, {}, '', 'sourceActivity_id');
                $.each(source_activity, function(u){
                    var html = '<div class="checkbox"><label>';
                    html += '<input type="checkbox" class="checkbox" name="mac_sourceActivity_id[]" value="'+source_activity[u].sourceActivity_id+'" onclick="f_mac_refresh_inputParameter();">';
                    html += '<span>'+source_activity[u].sourceActivity_desc+'</span>';
                    html += '</label></div>';
                    $('#mac_div_sourceActivity').append(html);
                });                                
                var bootstrapValidator = $("#form_mac_2_6").data('bootstrapValidator');
                bootstrapValidator.addField('mac_sourceActivity_id[]', {validators:{choice:{min:1,message:'At least 1 Source of Activity required'}}});
                // ---------------- \\
                var certificate_basic = f_get_general_info_multiple('t_certificate_basic', {certBasic_status:'1'}, {}, '', 'certBasic_id');
                $.each(certificate_basic, function(u){
                    var html = '<div class="checkbox"><label>';
                    html += '<input type="checkbox" class="checkbox" name="mac_certBasic_id[]" value="'+certificate_basic[u].certBasic_id+'">';
                    html += '<span>'+certificate_basic[u].certBasic_desc+'</span>';
                    html += '</label></div>';
                    $('#mac_div_certBasic_id').append(html);
                });                                
                var bootstrapValidator = $("#form_mac_2_4").data('bootstrapValidator');
                bootstrapValidator.addField('mac_certBasic_id[]', {validators:{choice:{min:1,message:'At least 1 Basic of Certification required'}}});
                bootstrapValidator.addField('mac_certBasic_id[]', {
                    validators:{
                        callback: {
                            message: 'Basic of Certification must have EN-15267-3',
                            callback: function (value, validator, $field) { return $("input[name='mac_certBasic_id[]'][value=3]").is(':checked'); }
                        }
                    }
                });
                // ---------------- \\
                get_option('mac_certIssuer_id', '1', 't_certificate_issuer', 'certIssuer_id', 'certIssuer_desc', 'certIssuer_status', ' ', 'ref_id');           
                get_option('mac_consProject_source', '1', 't_source_activity', 'sourceActivity_id', 'sourceActivity_desc', 'sourceActivity_status', ' ', 'ref_id');           
                mac_1st_load = false;
            }
            if (load_type == 1) {            
                var isFirstTime = f_get_value_from_table('wf_group', 'wfGroup_id', wfGroup_id, 'wfGroup_isFirstTime');        
                if (isFirstTime == '1') {
                    f_notify(2, 'Error', 'Please update Consultant Information as first-time login user in order to perform CEMS Analyzer registration');  
                    f_menu_redirect(7,0,0);
                    return false;
                }
            }
            $('#form_mac,#form_mac_1,#form_mac_2_1,#form_mac_2_2,#form_mac_2_3,#form_mac_2_4,#form_mac_2_6,#form_mac_2_5,#form_mac_3,#form_mac_4,#form_mac_5,#form_mac_6').trigger('reset');
            $('#form_mac_2_1').bootstrapValidator('resetForm', true);
            $('#form_mac_2_2').bootstrapValidator('resetForm', true);
            $('#form_mac_2_3').bootstrapValidator('resetForm', true);
            $('#form_mac_2_4').bootstrapValidator('resetForm', true);
            $('#form_mac_2_5').bootstrapValidator('resetForm', true);
            $('#form_mac_2_6').bootstrapValidator('resetForm', true);
            $('#form_mac_3').bootstrapValidator('resetForm', true);
            $('#form_mac_4').bootstrapValidator('resetForm', true);
            $('#form_mac_5').bootstrapValidator('resetForm', true);
            $('#form_mac_6').bootstrapValidator('resetForm', true);
            $('#mac_load_type').val(load_type);
            $('#mac_wfGroup_id').val(wfGroup_id);
            $('#mac_consAll_id').val(consAll_id);
            mac_otable = otable;
            mac_load_type = load_type;
            $('#form_mac,#form_mac_1,#form_mac_2_1,#form_mac_2_2,#form_mac_2_3,#form_mac_2_4,#form_mac_2_6,#form_mac_2_5,#form_mac_3,#form_mac_4,#form_mac_5,#form_mac_6').find('input, textarea, select').prop('disabled',false);
            $('.mac_hideView').show();
            $('.mac_disView, #mac_dis_outsource').attr('disabled',true);
            $('#mac_alert_box, .mac_checkView').hide();
            $('#mac_snote_wfTask_remark').summernote('enable');
            $("input[name='mac_declare_1'], input[name='mac_declare_2']").prop('checked', false);
            // ---------------- \\
            if (mac_load_type == 1) {            
                if (wfGroup_id == '') {
                    f_notify(2, 'Error', errMsg_default);    
                    return false;
                }
                if (!f_submit_normal('create_consultant', {wfGroup_id:wfGroup_id, wfTaskType_id:'1', wfFlow_id:'1', consAll_type:'1'}, 'p_registration', '', errMsg_default))   return false;
                $('#mac_consAll_id').val(result_submit);
                if (mac_otable == 'cca')
                    f_table_cca ();
            } 
            // --- extract details --- //
            var status = load_type <= 2 ? '1' : '';
            get_option('mac_analyzerTechnique_id', status, 't_analyzer_technique', 'analyzerTechnique_id', 'analyzerTechnique_desc', 'analyzerTechnique_status', ' ', 'ref_id');            
            get_option('mac_inputParam_id', status, 't_input_parameter', 'inputParam_id', 'inputParam_desc', 'inputParam_status', ' ', 'ref_id');
            var consultant_cems = f_get_general_info('vw_consultant_cems_details', {consAll_id:$('#mac_consAll_id').val()}, 'mac');  
            if ((consultant_cems.wfTask_status == '22' && consultant_cems.consCems_status == '22') || (consultant_cems.wfTask_status == '23' && consultant_cems.consCems_status == '23')) {
                var previous_task = f_get_general_info_multiple('wf_task', {wfTrans_id:consultant_cems.wfTrans_id, wfTask_partition:'2'}, '', '', 'wfTask_id DESC');
                $('#mac_alert_box').show();
                $('#mac_alert_message').html(previous_task[0].wfTask_remark);
            }
            $("input[name='mac_consCems_probeEnabled']").prop('checked', (consultant_cems.consCems_probeEnabled=='1'));
            f_switch('form_mac_2_1', 'mac_consCems_probeEnabled', 'mac_consCems_probeType', 'mac_consCems_probeLength');
            $("input[name='mac_consCems_samplingEnabled']").prop('checked', (consultant_cems.consCems_samplingEnabled=='1'));
            f_switch('form_mac_2_1', 'mac_consCems_samplingEnabled', 'mac_consCems_samplingLine');
            if (consultant_cems.consCems_isInstall == '1')
                $("input[name='mac_consultant_type[]'][value=1]").prop('checked', true);
            if (consultant_cems.consCems_isMaintain == '1')
                $("input[name='mac_consultant_type[]'][value=2]").prop('checked', true);
            // ---------------- \\
            var consultant_emission_category = f_get_general_info_multiple('t_consultant_emission_category', {consAll_id:$('#mac_consAll_id').val()});
            $.each(consultant_emission_category, function(u){
                $("input[name='mac_consEmisCate_value[]'][value=" + consultant_emission_category[u].consEmisCate_value + "]").prop('checked', true);
            });
            // ---------------- \\
            var consultant_source = f_get_general_info_multiple('t_consultant_source', {consAll_id:$('#mac_consAll_id').val()});
            $.each(consultant_source, function(u){
                $("input[name='mac_sourceActivity_id[]'][value=" + consultant_source[u].sourceActivity_id + "]").prop('checked', true);
            });
            f_mac_refresh_inputParameter();
            // ---------------- \\
            $("input[name='mac_consCems_compStatus'][value=" + consultant_cems.consCems_compStatus + "]").prop('checked', true);
            f_display_attachment('mac_doc_catalogue', f_get_general_info_multiple('vw_consultant_doc', {param_id:$('#mac_consAll_id').val()}));
            $('#mac_dis_outsource').attr('disabled', $('#mac_dis_type').val() == '2' ? false : true);
            // ---------------- \\
            $('.mac_q_qaQuarter').prop('disabled', consultant_cems.consAll_qaFreqQuarterly == '1' ? false : true);
            $("input[name='mac_y_qaQuarter_id']").prop('disabled', consultant_cems.consAll_qaFreqYearly == '1' ? false : true);
            $("input[name='mac_consAll_qaFreqDaily'][value=" + consultant_cems.consAll_qaFreqDaily + "]").prop('checked', true);
            $("input[name='mac_consAll_qaMethod'][value=" + consultant_cems.consAll_qaMethod + "]").prop('checked', true);
            $("input[name='mac_consAll_qaFreqQuarterly'][value=" + consultant_cems.consAll_qaFreqQuarterly + "]").prop('checked', true);
            $("input[name='mac_consAll_qaFreqYearly'][value=" + consultant_cems.consAll_qaFreqYearly + "]").prop('checked', true);
            var consultant_qa = f_get_general_info_multiple('t_consultant_qa', {consAll_id:$('#mac_consAll_id').val()});
            $.each(consultant_qa, function(u){
                if (consultant_qa[u].qaQuarter_type == '1')
                    $("input[name='mac_q_qaQuarter_id[]'][value=" + consultant_qa[u].qaQuarter_id + "]").prop('checked', true);
                else if (consultant_qa[u].qaQuarter_type == '2')
                    $("input[name='mac_y_qaQuarter_id'][value=" + consultant_qa[u].qaQuarter_id + "]").prop('checked', true);
            });
            // ---------------- \\
            $('[name="mac_snote_wfTask_remark"]').summernote('code', consultant_cems.consAll_remark);
            // ---------------- \\
            data_mac_cert = f_get_general_info_multiple('dt_certificate', {consAll_id:$('#mac_consAll_id').val()}, '', '', 'certificate_id');
            f_dataTable_draw(mac_otable_cert, data_mac_cert, 'datatable_mac_cert', 6);
            data_mac_consParam = f_get_general_info_multiple('dt_consultant_parameter', {consAll_id:$('#mac_consAll_id').val()}, '', '', 'consParam_id');
            f_dataTable_draw(mac_otable_consParam, data_mac_consParam, 'datatable_mac_consParam', 5);
            data_mac_personnel = f_get_general_info_multiple('dt_consultant_personnel', {consAll_id:$('#mac_consAll_id').val()}, '', '', 'consPers_id');
            f_dataTable_draw(mac_otable_personnel, data_mac_personnel, 'datatable_mac_personnel', 8);
            data_mac_project = f_get_general_info_multiple('dt_consultant_project', {consultant_id:$('#mac_consultant_id').val(), consProject_status:'1'}, '', '', 'consProject_year desc');
            f_dataTable_draw(mac_otable_project, data_mac_project, 'datatable_mac_project', 9);
            // ---------------- \\
            if (mac_load_type >= 3) {
                mac_total_section = [];
                $('#form_mac,#form_mac_1,#form_mac_2_1,#form_mac_2_2,#form_mac_2_3,#form_mac_2_4,#form_mac_2_6,#form_mac_2_5,#form_mac_3,#form_mac_4,#form_mac_5,#form_mac_6').find('input, textarea, select').prop('disabled',true);
                $('#mac_snote_wfTask_remark').summernote('disable');
                $("input[name='mac_declare_1'], input[name='mac_declare_2']").prop('checked', true);
                $('.mac_hideView').hide();
                if (mac_load_type >= 4) {
                    $('.mac_form_check').prop('disabled', false);
                    $('.mac_checkView, #mac_btn_save').show();
                    var checklist_task = f_get_general_info_multiple('t_checklist_task', {wfTask_id:$('#mac_wfTask_id').val(), checklistTask_status:'1'});
                    $.each(checklist_task, function(u){
                        $('#mac_check_remark_'+checklist_task[u].checklist_id).val(checklist_task[u].checklistTask_remark);
                        if (checklist_task[u].checklistTask_result == '1')
                            $("input[name='mac_check_pass_"+checklist_task[u].checklist_id+"']").prop('checked', true);
                        mac_total_section[u] = checklist_task[u].checklist_id;
                    });    
                }
            }    
            $('#modal_consultant_cems').modal('show');            
            $('#modal_waiting').modal('hide');
            $(this).unbind(e);
        }).modal('show');  
    }
    
</script>