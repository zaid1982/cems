<div class="modal fade" id="modal_consultant_cems" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">   
            <div class="modal-header bg-color-blueLight txt-color-white">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    &times;
                </button>
                <h4 class="modal-title"><i class='fa fa-edit'></i>&nbsp; Registration of CEMS Analyzer</h4>
            </div>
            <div class="modal-body modal-fixHeight">
                <section id="widget-grid" class="">  
                    <div class="row">
                        <article class="col-sm-12 col-md-12 col-lg-12">
                            <div class="widget-body fuelux">
                                <div class="wizard" id="mac_wizard">
                                <ul class="steps">
                                    <li data-target="#mac_step1" class="active font-sm">
                                        <span class="badge badge-info">1</span><b>Section A</b> - Company Details<span class="chevron"></span>
                                    </li>
                                    <li data-target="#mac_step2" class="font-sm">
                                        <span class="badge">2</span><b>Section B</b> - Information of Analyzer<span class="chevron"></span>
                                    </li>
                                    <li data-target="#mac_step3" class="font-sm">
                                        <span class="badge">3</span><b>Section C</b> - Information of Personnel<span class="chevron"></span>
                                    </li>
                                    <li data-target="#mac_step4" class="font-sm">
                                        <span class="badge">4</span><b>Section D</b> - Manufacture Requirements<span class="chevron"></span>
                                    </li>
                                    <li data-target="#mac_step5" class="font-sm">
                                        <span class="badge">5</span><b>Section E</b> - Company Working Experience<span class="chevron"></span>
                                    </li>
                                    <li data-target="#mac_step6" class="font-sm">
                                        <span class="badge">6</span><b>Section F</b> - Declaration<span class="chevron"></span>
                                    </li>
                                </ul>
                                <div class="actions">
                                    <button type="button" class="btn btn-sm btn-primary btn-prev" id="mac_btn_prev">
                                        <i class="fa fa-arrow-left"></i>Prev
                                    </button>
                                    <button type="button" class="btn btn-sm btn-success btn-next" id="mac_btn_next" data-last="">
                                        <span id="mac_btn_next_label">Next<i class="fa fa-arrow-right"></span></i>
                                    </button>
                                </div>
                            </div>
                            <div class="step-content padding-10 padding-bottom-0 minHeight">                                            
                                <div class="step-pane" id="mac_step1" data-step="1">
                                    <form class="form-horizontal" id="form_mac_1" method="post">                                                          
                                        <div class="alert alert-block alert-danger" id="mac_alert_box">
                                            <a class="close" data-dismiss="alert" href="#">×</a>
                                            <h4 class="alert-heading"><i class="fa fa-warning fa-fw"></i> <span id="lmac_status_desc"></span> Message</h4>
                                            <p id="mac_alert_message"></p>
                                        </div>
                                        <div class="row padding-top-15">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <h6 class="col-md-5">A. Company Details</h6>                                            
                                                    <div class="col-md-7 mac_checkView">
                                                        <div class="input-group pull-right">
                                                            <input class="form-control mac_form_check" placeholder="Remark" type="text" name="mac_check_remark_1" id="mac_check_remark_1">
                                                            <span class="input-group-addon">
                                                                <span class="onoffswitch">
                                                                    <input type="checkbox" class="onoffswitch-checkbox mac_form_check" name="mac_check_pass_1" id="mac_check_pass_1">
                                                                    <label class="onoffswitch-label" for="mac_check_pass_1"> 
                                                                        <span class="onoffswitch-inner" data-swchon-text="Pass" data-swchoff-text="Fail"></span> 
                                                                        <span class="onoffswitch-switch"></span> 
                                                                    </label> 
                                                                </span>
                                                            </span>
                                                        </div>   
                                                    </div>
                                                </div>
                                            </div>                                                                             
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Company Name</label>
                                                    <div class="col-md-10">
                                                        <input type="text" class="form-control mac_disView" name="mac_wfGroup_name" id="mac_wfGroup_name" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="col-md-4 control-label">Registration Number</label>
                                                    <div class="col-md-8">
                                                        <input type="text" class="form-control mac_disView" name="mac_wfGroup_regNo" id="mac_wfGroup_regNo" />
                                                    </div>
                                                </div>
                                                <div class="well well-light margin-bottom-15 padding-bottom-0">
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Registered Address</label>
                                                        <div class="col-md-8">
                                                            <textarea class="form-control mac_disView" name="mac_address_line1" id="mac_address_line1" rows="4"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Postcode</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control mac_disView" name="mac_address_postcode" id="mac_address_postcode"/>
                                                        </div>
                                                    </div>                                   
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">State</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control mac_disView" name="mac_state_desc" id="mac_state_desc"/>
                                                        </div>
                                                    </div>                         
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">City</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control mac_disView" name="mac_city_desc" id="mac_city_desc"/>
                                                        </div>
                                                    </div>    
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-4 control-label">Telephone Number</label>
                                                    <div class="col-md-8">   
                                                        <div class="input-group">
                                                            <input type="text" name="mac_wfGroup_phoneNo" id="mac_wfGroup_phoneNo" class="form-control mac_disView"/>
                                                            <span class="input-group-addon"><i class="fa fa-phone"></i></span>       
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-4 control-label">Website</label>
                                                    <div class="col-md-8">   
                                                        <div class="input-group">
                                                            <input type="text" name="mac_wfGroup_website" id="mac_wfGroup_website" class="form-control mac_disView"/>
                                                            <span class="input-group-addon"><i class="fa fa-internet-explorer"></i></span>       
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="col-md-4 control-label">Incorporate Date</label>
                                                    <div class="col-md-8">
                                                        <div class="input-group">
                                                            <input type="text" name="mac_consultant_dateIncorporate" id="mac_consultant_dateIncorporate" class="form-control mac_disView" >
                                                            <span class="input-group-addon hidden-sm hidden-xs"><i class="fa fa-calendar"></i></span>        
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="well well-light margin-bottom-15 padding-bottom-0">                                        
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Mailing Address</label>
                                                        <div class="col-md-8">
                                                            <textarea class="form-control mac_disView" name="mac_maddress_line1" id="mac_maddress_line1" rows="4"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Postcode</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control mac_disView" name="mac_maddress_postcode" id="mac_maddress_postcode"/>
                                                        </div>
                                                    </div>                                 
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">State</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control mac_disView" name="mac_mstate_desc" id="mac_mstate_desc"/>
                                                        </div>
                                                    </div>                            
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">City</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control mac_disView" name="mac_mcity_desc" id="mac_mcity_desc"/>
                                                        </div>
                                                    </div>   
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-4 control-label">Fax Number</label>
                                                    <div class="col-md-8">   
                                                        <div class="input-group">
                                                            <input type="text" name="mac_wfGroup_faxNo" id="mac_wfGroup_faxNo" class="form-control mac_disView"/>
                                                            <span class="input-group-addon"><i class="fa fa-fax "></i></span>       
                                                        </div>
                                                    </div>
                                                </div>                                    
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="col-md-4 control-label">Contact Person</label>
                                                    <div class="col-md-8">   
                                                        <div class="input-group">
                                                            <input type="text" name="mac_profile_name" id="mac_profile_name" class="form-control mac_disView"/>
                                                            <span class="input-group-addon"><i class="fa fa-user"></i></span>       
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-4 control-label">Contact Number</label>
                                                    <div class="col-md-8">   
                                                        <div class="input-group">
                                                            <input type="text" name="mac_profile_mobileNo" id="mac_profile_mobileNo" class="form-control mac_disView"/>
                                                            <span class="input-group-addon"><i class="fa fa-phone-square"></i></span>       
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>    
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="col-md-4 control-label">Position</label>
                                                    <div class="col-md-8">   
                                                        <div class="input-group">
                                                            <input type="text" name="mac_wfGroupUser_designation" id="mac_wfGroupUser_designation" class="form-control mac_disView"/>
                                                            <span class="input-group-addon"><i class="fa fa-briefcase"></i></span>       
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-4 control-label">Email Address</label>
                                                    <div class="col-md-8">   
                                                        <div class="input-group">
                                                            <input type="text" name="mac_profile_email" id="mac_profile_email" class="form-control mac_disView"/>
                                                            <span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>       
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="step-pane" id="mac_step2" data-step="2">
                                    <form class="form-horizontal" id="form_mac_2_1" method="post">
                                        <div class="row padding-top-15">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <h6 class="col-md-5">B.1. Information of CEMS Analyzer</h6>                                            
                                                    <div class="col-md-7 mac_checkView">
                                                        <div class="input-group pull-right">
                                                            <input class="form-control mac_form_check" placeholder="Remark" type="text" name="mac_check_remark_2" id="mac_check_remark_2">
                                                            <span class="input-group-addon">
                                                                <span class="onoffswitch">
                                                                    <input type="checkbox" class="onoffswitch-checkbox mac_form_check" name="mac_check_pass_2" id="mac_check_pass_2">
                                                                    <label class="onoffswitch-label" for="mac_check_pass_2"> 
                                                                        <span class="onoffswitch-inner" data-swchon-text="Pass" data-swchoff-text="Fail"></span> 
                                                                        <span class="onoffswitch-switch"></span> 
                                                                    </label> 
                                                                </span>
                                                            </span>
                                                        </div>   
                                                    </div>
                                                </div>
                                            </div>                                                                             
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="col-md-6 control-label"><font color="red">*</font> Model No.</label>
                                                    <div class="col-md-6">
                                                        <input type="text" class="form-control" name="mac_consCems_modelNo" id="mac_consCems_modelNo"/>
                                                    </div>
                                                </div>    
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="col-md-6 control-label"><font color="red">*</font> Brand</label>
                                                    <div class="col-md-6">
                                                        <input type="text" class="form-control" name="mac_consCems_brand" id="mac_consCems_brand"/>
                                                    </div>
                                                </div>   
                                            </div>
                                        </div>                                        
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label"><font color="red">*</font> Manufacturer</label>
                                                    <div class="col-md-9">
                                                        <input type="text" class="form-control" name="mac_consCems_manufacturer" id="mac_consCems_manufacturer"/>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">        
                                                <div class="form-group">
                                                    <label class="col-md-6 control-label"><font color="red">*</font> Type of Analyzer</label>
                                                    <div class="col-md-6 selectContainer">
                                                        <select class="form-control" name="mac_consCems_type" id="mac_consCems_type">
                                                            <option value=""></option>
                                                            <option value="1">Gas Analyzer</option>
                                                            <option value="2">Opacity Meter</option>
                                                            <option value="3">Particulate Monitors</option>
                                                        </select>
                                                    </div>
                                                </div>          
                                                <div class="form-group">
                                                    <label class="col-md-6 control-label"><font color="red">*</font> Normalization</label>
                                                    <div class="col-md-6 selectContainer">
                                                        <select class="form-control" name="mac_consCems_isNormalize" id="mac_consCems_isNormalize">
                                                            <option value=""></option>
                                                            <option value="1">Auto</option>
                                                            <option value="2">Manual</option>
                                                        </select>
                                                    </div>
                                                </div>                                           
                                                <div class="form-group">
                                                    <label class="col-md-6 control-label"><font color="red">*</font> Type of Probe</label>
                                                    <div class="col-md-6">                                                        
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" name="mac_consCems_probeType" id="mac_consCems_probeType"/>
                                                            <span class="input-group-addon">
                                                                <span class="onoffswitch">
                                                                    <input type="checkbox" name="mac_consCems_probeEnabled" class="onoffswitch-checkbox" id="mac_consCems_probeEnabled" value="1" onchange="f_switch('form_mac_2_1', 'mac_consCems_probeEnabled', 'mac_consCems_probeType', 'mac_consCems_probeLength')">
                                                                    <label class="onoffswitch-label" for="mac_consCems_probeEnabled"> 
                                                                        <span class="onoffswitch-inner" data-swchon-text="YES" data-swchoff-text="NO"></span> 
                                                                        <span class="onoffswitch-switch"></span> 
                                                                    </label> 
                                                                </span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>  
                                            </div>
                                            <div class="col-md-6">    
                                                <div class="form-group">
                                                    <label class="col-md-6 control-label"><font color="red">*</font> Technique</label>
                                                    <div class="col-md-6 selectContainer">
                                                        <select class="form-control" name="mac_consCems_techniqueType" id="mac_consCems_techniqueType">
                                                            <option value=""></option>
                                                            <option value="1">Extractive Analyzer</option>
                                                            <option value="2">In-Situ Analyzer</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-6 control-label"><font color="red">*</font> Correction</label>
                                                    <div class="col-md-6 selectContainer">
                                                        <select class="form-control" name="mac_consCems_correction" id="mac_consCems_correction">
                                                            <option value=""></option>
                                                            <option value="1">Auto</option>
                                                            <option value="2">Manual</option>
                                                        </select>
                                                    </div>
                                                </div> 
                                                <div class="form-group">
                                                    <label class="col-md-6 control-label"><font color="red">*</font> Length of Probe</label>
                                                    <div class="col-md-6">
                                                        <div class="input-group">
                                                            <input type="text" name="mac_consCems_probeLength" id="mac_consCems_probeLength" class="form-control"/>
                                                            <span class="input-group-addon">m</span>       
                                                        </div>
                                                    </div>
                                                </div>    
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label"><font color="red">*</font> Sampling Line</label>
                                                    <div class="col-md-9">
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" name="mac_consCems_samplingLine" id="mac_consCems_samplingLine"/>
                                                            <span class="input-group-addon">
                                                                <span class="onoffswitch">
                                                                    <input type="checkbox" name="mac_consCems_samplingEnabled" class="onoffswitch-checkbox" id="mac_consCems_samplingEnabled" value="1" onchange="f_switch('form_mac_2_1', 'mac_consCems_samplingEnabled', 'mac_consCems_samplingLine')">
                                                                    <label class="onoffswitch-label" for="mac_consCems_samplingEnabled"> 
                                                                        <span class="onoffswitch-inner" data-swchon-text="YES" data-swchoff-text="NO"></span> 
                                                                        <span class="onoffswitch-switch"></span> 
                                                                    </label> 
                                                                </span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label"><font color="red">*</font> Method of Detection</label>
                                                    <div class="col-md-9 selectContainer">
                                                        <select class="form-control" name="mac_analyzerTechnique_id" id="mac_analyzerTechnique_id"></select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">Software</label>
                                                    <div class="col-md-9">
                                                        <input type="text" class="form-control" name="mac_consCems_software" id="mac_consCems_software"/>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">Controller</label>
                                                    <div class="col-md-9">
                                                        <input type="text" class="form-control" name="mac_consCems_controller" id="mac_consCems_controller"/>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>    
                                    <form class="form-horizontal" id="form_mac_2_2" method="post" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-md-12">                
                                                <div class="form-group margin-bottom-0">
                                                    <label class="col-md-3 control-label"><font color="red">*</font> Manual / Catalogue (PDF)</label>
                                                    <div class="col-md-7">
                                                        <input type="file" class="form-control mac_hideView" id="mac_file_catalogue" name="mac_file_catalogue" style="width: 100%">
                                                    </div>
                                                    <div class="col-md-2">
                                                        <button type="button" class="btn btn-sm btn-labeled btn-primary pull-right mac_hideView" id="mac_btn_upload_catalogue">
                                                            <span class="btn-label"><i class="fa fa-upload"></i></span>Upload
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label"></label>
                                                    <div class="col-md-9 control-label text-align-left" id="mac_doc_catalogue"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <form class="form-horizontal" id="form_mac_2_6" method="post">
                                        <div class="row padding-top-15">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <h6 class="col-md-5">B.2. Field of Specialization in CEMS Analyzer</h6>                                       
                                                    <div class="col-md-7 mac_checkView">
                                                        <div class="input-group pull-right">
                                                            <input class="form-control mac_form_check" placeholder="Remark" type="text" name="mac_check_remark_3" id="mac_check_remark_3">
                                                            <span class="input-group-addon">
                                                                <span class="onoffswitch">
                                                                    <input type="checkbox" class="onoffswitch-checkbox mac_form_check" name="mac_check_pass_3" id="mac_check_pass_3">
                                                                    <label class="onoffswitch-label" for="mac_check_pass_3"> 
                                                                        <span class="onoffswitch-inner" data-swchon-text="Pass" data-swchoff-text="Fail"></span> 
                                                                        <span class="onoffswitch-switch"></span> 
                                                                    </label> 
                                                                </span>
                                                            </span>
                                                        </div>   
                                                    </div>
                                                </div>
                                            </div>                                                                             
                                        </div>                                        
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label"><font color="red">*</font> Type of Consultant</label>
                                                    <div class="col-md-9">   
                                                        <label class="checkbox checkbox-inline">
                                                            <input type="checkbox" class="checkbox" name="mac_consultant_type[]" value="1" /><span>Installation</span> 
                                                        </label>
                                                        <label class="checkbox checkbox-inline">
                                                            <input type="checkbox" class="checkbox" name="mac_consultant_type[]" value="2" /><span>Maintenance</span> 
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label"><font color="red">*</font> Categories of Emission Monitoring</label>
                                                    <div class="col-md-9">   
                                                        <label class="checkbox checkbox-inline">
                                                            <input type="checkbox" class="checkbox" name="mac_consEmisCate_value[]" value="1" /><span>Gases</span> 
                                                        </label>
                                                        <label class="checkbox checkbox-inline">
                                                            <input type="checkbox" class="checkbox" name="mac_consEmisCate_value[]" value="2" /><span>Particulate</span> 
                                                        </label>
                                                        <label class="checkbox checkbox-inline">
                                                            <input type="checkbox" class="checkbox" name="mac_consEmisCate_value[]" value="3" /><span>Opacity</span> 
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label"><font color="red">*</font> Source of Activity</label>
                                                    <div class="col-md-9" id="mac_div_sourceActivity"></div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label"><font color="red">*</font> Product Status</label>
                                                    <div class="col-md-9">   
                                                        <div class="radiobox">
                                                            <label class="radio radio-inline">
                                                                <input type="radio" class="radiobox" name="mac_consCems_compStatus" value="1" /><span>Manufacturer</span> 
                                                            </label>
                                                            <label class="radio radio-inline">
                                                                <input type="radio" class="radiobox" name="mac_consCems_compStatus" value="2" /><span>Sole Distributor</span> 
                                                            </label>
                                                            <label class="radio radio-inline">
                                                                <input type="radio" class="radiobox" name="mac_consCems_compStatus" value="3" /><span>Sub Distributor</span> 
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <form class="form-horizontal" id="form_mac_2_3" method="post">
                                        <div class="row padding-top-15">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <h6 class="col-md-5">B.3. Parameters and Specified Range</h6>                                       
                                                    <div class="col-md-7 mac_checkView">
                                                        <div class="input-group pull-right">
                                                            <input class="form-control mac_form_check" placeholder="Remark" type="text" name="mac_check_remark_4" id="mac_check_remark_4">
                                                            <span class="input-group-addon">
                                                                <span class="onoffswitch">
                                                                    <input type="checkbox" class="onoffswitch-checkbox mac_form_check" name="mac_check_pass_4" id="mac_check_pass_4">
                                                                    <label class="onoffswitch-label" for="mac_check_pass_4"> 
                                                                        <span class="onoffswitch-inner" data-swchon-text="Pass" data-swchoff-text="Fail"></span> 
                                                                        <span class="onoffswitch-switch"></span> 
                                                                    </label> 
                                                                </span>
                                                            </span>
                                                        </div>   
                                                    </div>
                                                </div>
                                            </div>                                                                             
                                        </div>    
                                        <div class="well margin-bottom-15 padding-bottom-0 mac_hideView">
                                            <div class="row margin-bottom-15">                                                
                                                <div class="col-md-12">
                                                    <small class="mac_hideView"><font color="red"><i>* Please select Source of Activity first</i></font></small>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label"><font color="red">*</font> Input Parameters</label>
                                                        <div class="col-md-8 selectContainer">
                                                            <select class="form-control" name="mac_inputParam_id" id="mac_inputParam_id"></select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label"><font color="red">*</font> Consumable Span Gas</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control" name="mac_consParam_reference" id="mac_consParam_reference"/>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label"><font color="red">*</font> Method</label>
                                                        <div class="col-md-8 selectContainer">
                                                            <select class="form-control" name="mac_consParam_method" id="mac_consParam_method">
                                                                <option value=""></option>
                                                                <option value="1">US-EPA Protocol 1 Method</option>
                                                                <option value="2">NIST Standards</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label"><font color="red">*</font> Data Generation</label>
                                                        <div class="col-md-8">
                                                            <div class="input-group">      
                                                                <input type="text" name="mac_consParam_dataGeneration" id="mac_consParam_dataGeneration" class="form-control"/>
                                                                <span class="input-group-addon">data/sec</span>       
                                                            </div>
                                                        </div>
                                                    </div>                                                    
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="col-md-2 control-label"><font color="red">*</font> Specified Range</label>
                                                        <label class="col-md-1 control-label text-left">Low :</label>
                                                        <div class="col-md-3">
                                                            <div class="input-group">
                                                                <span class="input-group-addon bg-color-white">From</span>       
                                                                <input type="text" name="mac_consParam_rangeFromLow" id="mac_consParam_rangeFromLow" class="form-control"/>
                                                                <span class="input-group-addon">m</span>       
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="input-group">
                                                                <span class="input-group-addon bg-color-white">To</span>       
                                                                <input type="text" name="mac_consParam_rangeToLow" id="mac_consParam_rangeToLow" class="form-control"/>
                                                                <span class="input-group-addon">m</span>       
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-2 control-label">&nbsp;</label>
                                                        <label class="col-md-1 control-label text-left">High :</label>
                                                        <div class="col-md-3">
                                                            <div class="input-group">
                                                                <span class="input-group-addon bg-color-white">From</span>       
                                                                <input type="text" name="mac_consParam_rangeFromHigh" id="mac_consParam_rangeFromHigh" class="form-control"/>
                                                                <span class="input-group-addon">mg/m<sup>3</sup></span>       
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="input-group">
                                                                <span class="input-group-addon bg-color-white">To</span>       
                                                                <input type="text" name="mac_consParam_rangeToHigh" id="mac_consParam_rangeToHigh" class="form-control"/>
                                                                <span class="input-group-addon">mg/m<sup>3</sup></span>       
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <div class="col-md-12">
                                                            <button type="button" class="btn btn-labeled btn-primary pull-right" id="mac_btn_add_parameter">
                                                                <span class="btn-label"><i class="fa fa-plus"></i></span>Add
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <table class="table table-bordered margin-bottom-5" id="datatable_mac_consParam"> 
                                                    <thead>
                                                        <tr>
                                                            <th class="text-center bg-color-teal txt-color-white" width="30px" data-hide="phone">No.</th>                                                            
                                                            <th class="text-center bg-color-teal txt-color-white" data-class="expand">Input Parameter</th>
                                                            <th class="text-center bg-color-teal txt-color-white">Specified Range Low</th>        
                                                            <th class="text-center bg-color-teal txt-color-white">Specified Range High</th>                                
                                                            <th class="text-center bg-color-teal txt-color-white" data-hide="phone,tablet">Consumable Gas Span</th>                       
                                                            <th class="text-center bg-color-teal txt-color-white" data-hide="phone,tablet">Data Generation</th>                                                                  
                                                            <th class="text-center bg-color-teal txt-color-white" data-hide="phone,tablet">Method</th>                                                    
                                                            <th class="text-center bg-color-teal txt-color-white" width="40px">&nbsp;</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody></tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </form>
                                    <form class="form-horizontal" id="form_mac_2_4" method="post" enctype="multipart/form-data">
                                        <div class="row padding-top-15">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <h6 class="col-md-5">B.4. Certification</h6>                                     
                                                    <div class="col-md-7 mac_checkView">
                                                        <div class="input-group pull-right">
                                                            <input class="form-control mac_form_check" placeholder="Remark" type="text" name="mac_check_remark_5" id="mac_check_remark_5">
                                                            <span class="input-group-addon">
                                                                <span class="onoffswitch">
                                                                    <input type="checkbox" class="onoffswitch-checkbox mac_form_check" name="mac_check_pass_5" id="mac_check_pass_5">
                                                                    <label class="onoffswitch-label" for="mac_check_pass_5"> 
                                                                        <span class="onoffswitch-inner" data-swchon-text="Pass" data-swchoff-text="Fail"></span> 
                                                                        <span class="onoffswitch-switch"></span> 
                                                                    </label> 
                                                                </span>
                                                            </span>
                                                        </div>   
                                                    </div>
                                                </div>
                                            </div>                                                                             
                                        </div>    
                                        <div class="well margin-bottom-15 padding-bottom-0 mac_hideView">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label"><font color="red">*</font> Certificate No.</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control" name="mac_certificate_no" id="mac_certificate_no" />
                                                        </div>
                                                    </div>                      
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label"><font color="red">*</font> Certificate Issuer</label>
                                                        <div class="col-md-8 selectContainer">
                                                            <select class="form-control" name="mac_certIssuer_id" id="mac_certIssuer_id"></select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label"><font color="red">*</font> Expiry Date</label>
                                                        <div class="col-md-8">
                                                            <div class="input-group">
                                                                <input type="text" name="mac_certificate_dateExpired" id="mac_certificate_dateExpired" class="form-control" readonly>
                                                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>          
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">      
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label"><font color="red">*</font> Basic of Certification</label>
                                                        <div class="col-md-8">
                                                            <div class="col-md-9" id="mac_div_certBasic_id"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">                            
                                                    <div class="form-group">
                                                        <label class="col-md-2 control-label"><font color="red">*</font> Certificate (PDF)</label>
                                                        <div class="col-md-6">
                                                            <input type="file" class="form-control" id="mac_file_certificate" name="mac_file_certificate" style="width: 100%">
                                                        </div>
                                                    </div> 
                                                    <div class="form-group">
                                                        <div class="col-md-12">
                                                            <button type="button" class="btn btn-labeled btn-primary pull-right" id="mac_btn_add_certificate">
                                                                <span class="btn-label"><i class="fa fa-plus"></i></span>Add
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>     
                                        </div> 
                                        <div class="row">
                                            <div class="col-md-12">
                                                <table class="table table-bordered margin-bottom-5" id="datatable_mac_cert" width="100%"> 
                                                    <thead>
                                                        <tr>
                                                            <th class="text-center bg-color-teal txt-color-white" width="30px" data-hide="phone">No.</th>                                                            
                                                            <th class="text-center bg-color-teal txt-color-white" data-class="expand">Certificate No.</th>
                                                            <th class="text-center bg-color-teal txt-color-white">Issuer</th>
                                                            <th class="text-center bg-color-teal txt-color-white" data-hide="phone,tablet">Basic</th>
                                                            <th class="text-center bg-color-teal txt-color-white" data-hide="phone">Expiry Date</th>
                                                            <th class="text-center bg-color-teal txt-color-white" width="55px">&nbsp;</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody></tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </form>
                                    <form class="form-horizontal" id="form_mac_2_5" method="post">
                                        <div class="row padding-top-15">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <h6 class="col-md-5">B.5. Information of DIS Software</h6>                                 
                                                    <div class="col-md-7 mac_checkView">
                                                        <div class="input-group pull-right">
                                                            <input class="form-control mac_form_check" placeholder="Remark" type="text" name="mac_check_remark_6" id="mac_check_remark_6">
                                                            <span class="input-group-addon">
                                                                <span class="onoffswitch">
                                                                    <input type="checkbox" class="onoffswitch-checkbox mac_form_check" name="mac_check_pass_6" id="mac_check_pass_6">
                                                                    <label class="onoffswitch-label" for="mac_check_pass_6"> 
                                                                        <span class="onoffswitch-inner" data-swchon-text="Pass" data-swchoff-text="Fail"></span> 
                                                                        <span class="onoffswitch-switch"></span> 
                                                                    </label> 
                                                                </span>
                                                            </span>
                                                        </div>   
                                                    </div>
                                                </div>
                                            </div>                                                                             
                                        </div>                  
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label"><font color="red">*</font> Name of DIS</label>
                                                    <div class="col-md-9">
                                                        <input type="text" class="form-control" name="mac_dis_name" id="mac_dis_name"/>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="col-md-6 control-label"><font color="red">*</font> Status of DIS</label>
                                                    <div class="col-md-6 selectContainer">
                                                        <select class="form-control" name="mac_dis_type" id="mac_dis_type">
                                                            <option value=""></option>
                                                            <option value="1">In House</option>
                                                            <option value="2">Outsourced</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>                                                
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="col-md-4 control-label"><font color="red">*</font> Outsourced Company</label>
                                                    <div class="col-md-8">
                                                        <input type="text" class="form-control" name="mac_dis_outsource" id="mac_dis_outsource"/>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label"><font color="red">*</font> Software Description</label>
                                                    <div class="col-md-9">
                                                        <textarea type="text" class="form-control" name="mac_dis_description" id="mac_dis_description" rows="3"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <input type="hidden" name="mac_dis_id" id="mac_dis_id" />
                                    </form>
                                </div>
                                <div class="step-pane" id="mac_step3" data-step="3">
                                    <form class="form-horizontal" id="form_mac_3" method="post" enctype="multipart/form-data">
                                        <div class="row padding-top-15">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <h6 class="col-md-5">C. Information of Personnel for CEMS</h6>                                 
                                                    <div class="col-md-7 mac_checkView">
                                                        <div class="input-group pull-right">
                                                            <input class="form-control mac_form_check" placeholder="Remark" type="text" name="mac_check_remark_7" id="mac_check_remark_7">
                                                            <span class="input-group-addon">
                                                                <span class="onoffswitch">
                                                                    <input type="checkbox" class="onoffswitch-checkbox mac_form_check" name="mac_check_pass_7" id="mac_check_pass_7">
                                                                    <label class="onoffswitch-label" for="mac_check_pass_7"> 
                                                                        <span class="onoffswitch-inner" data-swchon-text="Pass" data-swchoff-text="Fail"></span> 
                                                                        <span class="onoffswitch-switch"></span> 
                                                                    </label> 
                                                                </span>
                                                            </span>
                                                        </div>   
                                                    </div>
                                                </div>
                                            </div>                                                                             
                                        </div>            
                                        <div class="well margin-bottom-15 padding-bottom-0 mac_hideView">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label"><font color="red">*</font> Name of Certified Employee</label>
                                                        <div class="col-md-9">
                                                            <div class="input-group">
                                                                <input type="text" class="form-control" name="mac_consPers_name" id="mac_consPers_name"/>
                                                                <span class="input-group-addon"><i class="fa fa-user"></i></span>       
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="col-md-6 control-label"><font color="red">*</font> Citizenship</label>
                                                        <div class="col-md-6">   
                                                            <div class="radiobox">
                                                                <label class="radio radio-inline">
                                                                    <input type="radio" class="radiobox" name="mac_personnel_citizenship" value="1" checked /><span>Malaysian</span> 
                                                                </label>
                                                                <label class="radio radio-inline">
                                                                    <input type="radio" class="radiobox" name="mac_personnel_citizenship" value="2" /><span>Others</span> 
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label"><font color="red">*</font> IC / Passport No.</label>
                                                        <div class="col-md-8">
                                                            <div class="input-group">
                                                                <input type="text" class="form-control" name="mac_personnel_icNo" id="mac_personnel_icNo"/>
                                                                <span class="input-group-addon"><i class="fa fa-credit-card"></i></span>       
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label"><font color="red">*</font> Academic Qualification</label>
                                                        <div class="col-md-9">
                                                            <div class="input-group">
                                                                <input type="text" class="form-control" name="mac_consPers_qualification" id="mac_consPers_qualification"/>
                                                                <span class="input-group-addon"><i class="fa fa-graduation-cap"></i></span>       
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label"><font color="red">*</font> Year Working Experience</label>
                                                        <div class="col-md-9">
                                                            <div class="input-group">
                                                                <input type="text" class="form-control" name="mac_consPers_experience" id="mac_consPers_experience"/>
                                                                <span class="input-group-addon"><i class="fa fa-briefcase"></i></span>       
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label"><font color="red">*</font> Training Certification from Manufacturer</label>
                                                        <div class="col-md-9">
                                                            <div class="input-group">
                                                                <input type="text" class="form-control" name="mac_consPers_certificate" id="mac_consPers_certificate"/>
                                                                <span class="input-group-addon"><i class="fa fa-certificate"></i></span>       
                                                            </div>
                                                        </div>
                                                    </div>                                                    
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="col-md-6 control-label"><font color="red">*</font> Employee's Status & Support Document</label>
                                                        <div class="col-md-6">   
                                                            <div class="radiobox">
                                                                <label class="radio radio-inline">
                                                                    <input type="radio" class="radiobox" name="mac_consPers_workingStatus" value="1" checked /><span>Staff</span> 
                                                                </label>
                                                                <label class="radio radio-inline">
                                                                    <input type="radio" class="radiobox" name="mac_consPers_workingStatus" value="2" /><span>Loan / Contracted</span> 
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <div class="col-md-12">
                                                            <input type="file" class="form-control" id="mac_consPers_document" name="mac_consPers_document" style="width: 100%">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <div class="col-md-12">
                                                            <button type="button" class="btn btn-labeled btn-primary pull-right" id="mac_btn_add_personnel">
                                                                <span class="btn-label"><i class="fa fa-plus"></i></span>Add
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <table class="table table-bordered margin-bottom-5" id="datatable_mac_personnel"> 
                                                    <thead>
                                                        <tr>
                                                            <th class="text-center bg-color-teal txt-color-white" width="30px" data-hide="phone">No.</th>        
                                                            <th class="text-center bg-color-teal txt-color-white" data-class="expand">IC / Passport No.</th>    
                                                            <th class="text-center bg-color-teal txt-color-white" data-hide="phone">Employee's Name</th>   
                                                            <th class="text-center bg-color-teal txt-color-white" data-hide="phone">Employee's Status</th>
                                                            <th class="text-center bg-color-teal txt-color-white" data-hide="phone,tablet">Academic Qualification</th>
                                                            <th class="text-center bg-color-teal txt-color-white" data-hide="phone,tablet">Working Experience</th>
                                                            <th class="text-center bg-color-teal txt-color-white">Training Certification</th>
                                                            <th class="text-center bg-color-teal txt-color-white" width="60px">&nbsp;</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody></tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </form>
                                </div>   
                                <div class="step-pane" id="mac_step4" data-step="4">
                                    <form class="form-horizontal" id="form_mac_4" method="post">
                                        <div class="row padding-top-15">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <h6 class="col-md-5">D.1. Zero / Span Check</h6>                                 
                                                    <div class="col-md-7 mac_checkView">
                                                        <div class="input-group pull-right">
                                                            <input class="form-control mac_form_check" placeholder="Remark" type="text" name="mac_check_remark_8" id="mac_check_remark_8">
                                                            <span class="input-group-addon">
                                                                <span class="onoffswitch">
                                                                    <input type="checkbox" class="onoffswitch-checkbox mac_form_check" name="mac_check_pass_8" id="mac_check_pass_8">
                                                                    <label class="onoffswitch-label" for="mac_check_pass_8"> 
                                                                        <span class="onoffswitch-inner" data-swchon-text="Pass" data-swchoff-text="Fail"></span> 
                                                                        <span class="onoffswitch-switch"></span> 
                                                                    </label> 
                                                                </span>
                                                            </span>
                                                        </div>   
                                                    </div>
                                                </div>
                                            </div>                                                                             
                                        </div>       
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label"><font color="red">*</font> Daily Ongoing Frequency Check</label>
                                                    <div class="col-md-9">
                                                        <label class="radio radio-inline">
                                                            <input type="radio" class="radiobox" name="mac_consAll_qaFreqDaily" value="1" /><span>Yes</span> 
                                                        </label>
                                                        <label class="radio radio-inline">
                                                            <input type="radio" class="radiobox" name="mac_consAll_qaFreqDaily" value="2" /><span>No</span> 
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label"><font color="red">*</font> Method</label>
                                                    <div class="col-md-9">
                                                        <label class="radio radio-inline">
                                                            <input type="radio" class="radiobox" name="mac_consAll_qaMethod" value="1" /><span>Automatic</span> 
                                                        </label>
                                                        <label class="radio radio-inline">
                                                            <input type="radio" class="radiobox" name="mac_consAll_qaMethod" value="2" /><span>Manual</span> 
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>   
                                        <div class="row padding-top-15">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <h6 class="col-md-5">D.2. Performance Specification Audit (RAA)</h6>                                 
                                                    <div class="col-md-7 mac_checkView">
                                                        <div class="input-group pull-right">
                                                            <input class="form-control mac_form_check" placeholder="Remark" type="text" name="mac_check_remark_9" id="mac_check_remark_9">
                                                            <span class="input-group-addon">
                                                                <span class="onoffswitch">
                                                                    <input type="checkbox" class="onoffswitch-checkbox mac_form_check" name="mac_check_pass_9" id="mac_check_pass_9">
                                                                    <label class="onoffswitch-label" for="mac_check_pass_9"> 
                                                                        <span class="onoffswitch-inner" data-swchon-text="Pass" data-swchoff-text="Fail"></span> 
                                                                        <span class="onoffswitch-switch"></span> 
                                                                    </label> 
                                                                </span>
                                                            </span>
                                                        </div>   
                                                    </div>
                                                </div>
                                            </div>                                                                             
                                        </div>      
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label"><font color="red">*</font> Quarterly Ongoing Frequency Check</label>
                                                    <div class="col-md-9">
                                                        <label class="radio radio-inline">
                                                            <input type="radio" class="radiobox" name="mac_consAll_qaFreqQuarterly" value="1" /><span>Yes</span> 
                                                        </label>
                                                        <label class="radio radio-inline">
                                                            <input type="radio" class="radiobox" name="mac_consAll_qaFreqQuarterly" value="2" /><span>No</span> 
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label"><font color="red">*</font> If Yes, Which Quarter?</label>
                                                    <div class="col-md-9">
                                                        <div class="checkbox">
                                                            <label>
                                                                <input type="checkbox" class="checkbox mac_q_qaQuarter" name="mac_q_qaQuarter_id[]" value="1" ><span>Quarter 1</span>
                                                            </label>
                                                        </div>
                                                        <div class="checkbox">
                                                            <label>
                                                                <input type="checkbox" class="checkbox mac_q_qaQuarter" name="mac_q_qaQuarter_id[]" value="2" ><span>Quarter 2</span>
                                                            </label>
                                                        </div>
                                                        <div class="checkbox">
                                                            <label>
                                                                <input type="checkbox" class="checkbox mac_q_qaQuarter" name="mac_q_qaQuarter_id[]" value="3" ><span>Quarter 3</span>
                                                            </label>
                                                        </div>
                                                        <div class="checkbox">
                                                            <label>
                                                                <input type="checkbox" class="checkbox mac_q_qaQuarter" name="mac_q_qaQuarter_id[]" value="4" ><span>Quarter 4</span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row padding-top-15">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <h6 class="col-md-5">D.3. Performance Specification Audit (RATA)</h6>                                 
                                                    <div class="col-md-7 mac_checkView">
                                                        <div class="input-group pull-right">
                                                            <input class="form-control mac_form_check" placeholder="Remark" type="text" name="mac_check_remark_10" id="mac_check_remark_10">
                                                            <span class="input-group-addon">
                                                                <span class="onoffswitch">
                                                                    <input type="checkbox" class="onoffswitch-checkbox mac_form_check" name="mac_check_pass_10" id="mac_check_pass_10">
                                                                    <label class="onoffswitch-label" for="mac_check_pass_10"> 
                                                                        <span class="onoffswitch-inner" data-swchon-text="Pass" data-swchoff-text="Fail"></span> 
                                                                        <span class="onoffswitch-switch"></span> 
                                                                    </label> 
                                                                </span>
                                                            </span>
                                                        </div>   
                                                    </div>
                                                </div>
                                            </div>                                                                             
                                        </div>      
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label"><font color="red">*</font> Yearly Ongoing Frequency Check</label>
                                                    <div class="col-md-9">
                                                        <label class="radio radio-inline">
                                                            <input type="radio" class="radiobox" name="mac_consAll_qaFreqYearly" value="1" /><span>Yes</span> 
                                                        </label>
                                                        <label class="radio radio-inline">
                                                            <input type="radio" class="radiobox" name="mac_consAll_qaFreqYearly" value="2" /><span>No</span> 
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label"><font color="red">*</font> If Yes, Which Quarter?</label>
                                                    <div class="col-md-9">
                                                        <div class="radio">
                                                            <label>
                                                                <input type="radio" class="radiobox" name="mac_y_qaQuarter_id" value="1" ><span>Quarter 1</span>
                                                            </label>
                                                        </div>
                                                        <div class="radio">
                                                            <label>
                                                                <input type="radio" class="radiobox" name="mac_y_qaQuarter_id" value="2" ><span>Quarter 2</span>
                                                            </label>
                                                        </div>
                                                        <div class="radio">
                                                            <label>
                                                                <input type="radio" class="radiobox" name="mac_y_qaQuarter_id" value="3" ><span>Quarter 3</span>
                                                            </label>
                                                        </div>
                                                        <div class="radio">
                                                            <label>
                                                                <input type="radio" class="radiobox" name="mac_y_qaQuarter_id" value="4" ><span>Quarter 4</span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>  
                                    </form>
                                </div>   
                                <div class="step-pane" id="mac_step5" data-step="5">
                                    <form class="form-horizontal" id="form_mac_5" method="post">
                                        <div class="row padding-top-15">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <h6 class="col-md-5">E. Information on Company's Working Experience</h6>                                 
                                                    <div class="col-md-7 mac_checkView">
                                                        <div class="input-group pull-right">
                                                            <input class="form-control mac_form_check" placeholder="Remark" type="text" name="mac_check_remark_11" id="mac_check_remark_11">
                                                            <span class="input-group-addon">
                                                                <span class="onoffswitch">
                                                                    <input type="checkbox" class="onoffswitch-checkbox mac_form_check" name="mac_check_pass_11" id="mac_check_pass_11">
                                                                    <label class="onoffswitch-label" for="mac_check_pass_11"> 
                                                                        <span class="onoffswitch-inner" data-swchon-text="Pass" data-swchoff-text="Fail"></span> 
                                                                        <span class="onoffswitch-switch"></span> 
                                                                    </label> 
                                                                </span>
                                                            </span>
                                                        </div>   
                                                    </div>
                                                </div>
                                            </div>                                                                             
                                        </div>      
                                        <div class="well margin-bottom-15 padding-bottom-0 mac_hideView">
                                            <div class="row">                                                
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label"><font color="red">*</font> Project Title</label>
                                                        <div class="col-md-9"><input type="text" class="form-control" name="mac_consProject_title" id="mac_consProject_title"/></div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="col-md-5 control-label"><font color="red">*</font> Year</label>
                                                        <div class="col-md-7 selectContainer">
                                                            <select class="form-control" name="mac_consProject_year" id="mac_consProject_year">
                                                                <option value=""></option>
                                                                <?php for ($yr=date('Y'); $yr>=1950; $yr--) { ?>
                                                                    <option value="<?=$yr?>"><?=$yr?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="col-md-2 control-label"><font color="red">*</font> Client</label>
                                                        <div class="col-md-10"><input type="text" class="form-control" name="mac_consProject_client" id="mac_consProject_client"/></div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-2 control-label"><font color="red">*</font> Project Description</label>
                                                        <div class="col-md-10"><input type="text" class="form-control" name="mac_consProject_desc" id="mac_consProject_desc"/></div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-2 control-label"><font color="red">*</font> Scope of Work</label>
                                                        <div class="col-md-10"><input type="text" class="form-control" name="mac_consProject_scope" id="mac_consProject_scope"/></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">                                                
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label"><font color="red">*</font> Source of Activity</label>
                                                        <div class="col-md-9 selectContainer">
                                                            <select class="form-control" name="mac_consProject_source" id="mac_consProject_source"></select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="col-md-5 control-label">Project Value</label>
                                                        <div class="col-md-7">   
                                                            <div class="input-group">
                                                                <span class="input-group-addon">RM</span>       
                                                                <input type="text" name="mac_consProject_value" id="mac_consProject_value" class="form-control" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">  
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <div class="col-md-12">
                                                            <button type="button" class="btn btn-labeled btn-primary pull-right" id="mac_btn_add_project">
                                                                <span class="btn-label"><i class="fa fa-plus"></i></span>Add
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <table class="table table-bordered margin-bottom-5" id="datatable_mac_project"> 
                                                    <thead>
                                                        <tr>
                                                            <th class="text-center bg-color-teal txt-color-white" width="35px" data-hide="phone">No.</th>
                                                            <th class="text-center bg-color-teal txt-color-white" data-class="expand">Project Title</th>
                                                            <th class="text-center bg-color-teal txt-color-white" width="40px">Year</th>
                                                            <th class="text-center bg-color-teal txt-color-white" data-hide="phone,tablet">Client</th>
                                                            <th class="text-center bg-color-teal txt-color-white" data-hide="phone,tablet">Project Description</th>
                                                            <th class="text-center bg-color-teal txt-color-white" data-hide="phone,tablet">Scope of Work</th>
                                                            <th class="text-center bg-color-teal txt-color-white" data-hide="phone,tablet">Source of Activity</th>
                                                            <th class="text-center bg-color-teal txt-color-white" width="80px">Project Value</th>
                                                            <th class="text-center bg-color-teal txt-color-white" width="40px">&nbsp;</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody></tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </form>
                                </div>    
                                <div class="step-pane" id="mac_step6" data-step="6">
                                    <form class="form-horizontal" id="form_mac_6" method="post" enctype="multipart/form-data">
                                        <div class="row padding-top-15">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <h6 class="col-md-5">F. Declaration</h6>                                 
                                                    <div class="col-md-7 mac_checkView">
                                                        <div class="input-group pull-right">
                                                            <input class="form-control mac_form_check" placeholder="Remark" type="text" name="mac_check_remark_12" id="mac_check_remark_12">
                                                            <span class="input-group-addon">
                                                                <span class="onoffswitch">
                                                                    <input type="checkbox" class="onoffswitch-checkbox mac_form_check" name="mac_check_pass_12" id="mac_check_pass_12">
                                                                    <label class="onoffswitch-label" for="mac_check_pass_12"> 
                                                                        <span class="onoffswitch-inner" data-swchon-text="Pass" data-swchoff-text="Fail"></span> 
                                                                        <span class="onoffswitch-switch"></span> 
                                                                    </label> 
                                                                </span>
                                                            </span>
                                                        </div>   
                                                    </div>
                                                </div>
                                            </div>                                                                             
                                        </div>      
                                        <div class="well">
                                            <div class="row">
                                                <div class="col-md-12" style="padding-left: 25px">
                                                    <div class="form-group">
                                                        <div class="checkbox">
                                                            <label>
                                                                <input type="checkbox" class="checkbox" name="mac_declare_1" >
                                                                <span style="line-height: 22px;">I / We hereby declare that all the information furnished in this form and any annexure(s) that comes with it are true, accurate, complete and up-to-date in all respect.</span>
                                                            </label>
                                                        </div> 
                                                    </div>  
                                                    <div class="form-group">
                                                        <div class="checkbox">
                                                            <label>
                                                                <input type="checkbox" class="checkbox" name="mac_declare_2" >
                                                                <span style="line-height: 22px;">I / We authorize the Malaysian Department of Environment to publish the following informaion in the Department's website at http://www.doe/gov/my. <i>(Please check whenever applicable)</i></span>
                                                            </label>
                                                        </div> 
                                                    </div>  
                                                    <div class="form-group">
                                                        <div class="padding-10 padding-top-0">
                                                            <div class="checkbox">
                                                                <label>
                                                                    <span>- Information furnished in the application form.</span>
                                                                </label>
                                                            </div> 
                                                            <div class="checkbox">
                                                                <label>
                                                                    <span>- Details Information of Analyzers, Equipment and Employee Working Experience.</span>
                                                                </label>
                                                            </div> 
                                                            <div class="checkbox">
                                                                <label>
                                                                    <span>- Details Information of Personnel for CEMS.</span>
                                                                </label>
                                                            </div> 
                                                            <div class="checkbox">
                                                                <label>
                                                                    <span>- Details Information of DIS Software.</span>
                                                                </label>
                                                            </div> 
                                                        </div>  
                                                    </div>  
                                                    <div class="form-group padding-top-15">
                                                        <label class="col-md-2 control-label">Name</label>
                                                        <div class="col-md-4">
                                                            <input type="text" id="mac_decl_profile_name" class="form-control mac_disView" />
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-2 control-label">NRIC No</label>
                                                        <div class="col-md-4">
                                                            <input type="text" id="mac_decl_profile_icNo" class="form-control mac_disView" />
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-2 control-label">Position</label>
                                                        <div class="col-md-4">
                                                            <input type="text" id="mac_decl_wfGroupUser_designation" class="form-control mac_disView" />
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-2 control-label">Date</label>
                                                        <div class="col-md-3">
                                                            <input type="text" id="mac_consAll_dateDeclaration" class="form-control mac_disView" />
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-2 control-label">Remark</label>
                                                        <div class="col-md-10">
                                                            <textarea class="form-control" name="mac_snote_wfTask_remark" id="mac_snote_wfTask_remark" rows="6"></textarea>
                                                            <input type="hidden" name="mac_wfTask_remark" id="mac_wfTask_remark" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>                                        
                                    </form>
                                </div>
                            </div>
                        </article>
                    </div>
                </section>
            </div> 
            <div class="modal-footer">
                <form class="form-horizontal" id="form_mac" method="post">
                    <input type="hidden" name="mac_wfGroup_id" id="mac_wfGroup_id" />
                    <input type="hidden" name="mac_consAll_id" id="mac_consAll_id" />
                    <input type="hidden" name="mac_consultant_id" id="mac_consultant_id" />
                    <input type="hidden" name="mac_wfTask_id" id="mac_wfTask_id" />
                    <input type="hidden" name="mac_wfTaskType_id" id="mac_wfTaskType_id" />
                    <input type="hidden" name="mac_wfTask_status" id="mac_wfTask_status" />
                    <input type="hidden" name="mac_load_type" id="mac_load_type" />
                    <input type="hidden" name="funct" id="mac_funct" value="save_consultant_cems" />
                    <div class="row">
                        <div class="col-md-12">
                            <a hreh="#" class="btn btn-labeled btn-danger pull-left" data-dismiss="modal">
                                <span class="btn-label"><i class="fa fa-mail-reply "></i></span>Exit
                            </a>
                            <button type="button" class="btn btn-labeled btn-success mac_hideView" id="mac_btn_save">
                                <span class="btn-label"><i class="fa fa-save"></i></span>Save
                            </button>
                            <button type="button" class="btn btn-labeled btn-warning mac_hideView" id="mac_btn_submit">
                                <span class="btn-label"><i class="fa fa-sign-in"></i></span>Submit
                            </button>
                        </div>
                    </div>
                </form>                    
            </div>                
        </div>
    </div>
</div>
