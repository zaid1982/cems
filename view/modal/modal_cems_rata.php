<!-- Modal -->
<div class="modal fade" id="modal_cems_rata" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">  
            <div class="modal-header bg-color-blueLight txt-color-white">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    &times;
                </button>
                <h4 class="modal-title"><i class='fa fa-file-text-o'></i>&nbsp; Service Report (<span id="lmqj_qa_type_title"></span>)</h4>
            </div>
            <div class="modal-body modal-fixHeight">   
                <div class="alert alert-block alert-warning" id="mqj_alert_box">
                    <a class="close" data-dismiss="alert" href="#">×</a>
                    <h4 class="alert-heading"><i class="fa fa-warning fa-fw"></i> Message</h4>
                    <div class="pull-right text-italic text-align-right" id="mqj_alert_date"></div>
                    <p id="mqj_alert_message"></p>
                </div>
                <div class="row padding-15">
                    <div class="process">
                        <div class="process-row nav nav-tabs" id="mqj_steps"></div>
                    </div>
                </div>  
                <h6>Information</h6>
                <div class="well">
                    <form class="form-horizontal">
                        <div class="form-group no-margin">
                            <label class="col-md-2 control-label"><strong>Application No.</strong></label>
                            <div class="col-md-4 control-label text-align-left">
                                <span id="lmqj_wfTrans_regNo"></span>
                            </div>
                            <label class="col-md-2 control-label"><strong>QA Type</strong></label>
                            <div class="col-md-4 control-label text-align-left">
                                <span id="lmqj_qa_type_desc"></span>
                            </div>
                        </div>
                        <div class="form-group no-margin">
                            <label class="col-md-2 control-label"><strong>Industrial Name</strong></label>
                            <div class="col-md-4 control-label text-align-left">
                                <span id="lmqj_wfGroup_name"></span>
                            </div>
                            <label class="col-md-2 control-label"><strong>Stack ID</strong></label>
                            <div class="col-md-4 control-label text-align-left">
                                <span id="lmqj_indAll_stackNo"></span>
                            </div>
                        </div>
                        <div class="form-group no-margin">
                            <label class="col-md-2 control-label"><strong>Consultant</strong></label>
                            <div class="col-md-4 control-label text-align-left">
                                <span id="lmqj_consultant_name"></span>
                            </div>
                            <label class="col-md-2 control-label"><strong>Current Status</strong></label>
                            <div class="col-md-4 control-label text-align-left">
                                <span id="lmqj_qa_status_desc"></span>
                            </div>
                        </div>
                    </form>
                </div>       
                <h6>Test Result</h6>
                <div class="well well-light">
                    <form class="form-horizontal" id="form_mqj_form_2">
                        <div class="row">      
                            <label class="col-md-2 control-label"><font color="red">*</font> RA Test (>50% Normal Load)</label>
                            <div class="col-md-10">
                                <table class="table table-bordered" id="datatable_mqj_raNormal"> 
                                    <thead>
                                        <tr>
                                            <th class="text-center bg-color-teal txt-color-white" width="10%">Pollutant</th>
                                            <th class="text-center bg-color-teal txt-color-white" width="15%">RA Average *</th>
                                            <th class="text-center bg-color-teal txt-color-white" width="15%">CEMS Average</th>
                                            <th class="text-center bg-color-teal txt-color-white">Applicable</br>Standard **</th>
                                            <th class="text-center bg-color-teal txt-color-white" width="15%">Arithmetic Mean Diff.</th>
                                            <th class="text-center bg-color-teal txt-color-white" width="15%">Confidence Coefficient</th>
                                            <th class="text-center bg-color-teal txt-color-white" width="10%">RA</th>
                                            <th class="text-center bg-color-teal txt-color-white" width="8%">Result RA</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                                <p class="note no-margin">* RM Average: average based on 9 sets of RM Test for RATA and 3 sets of RM Test for RAA</p>
                                <p class="note no-margin margin-bottom-10">** Applicable Standard: refer to emission limits CAR 2014</p>
                            </div>
                        </div>
                        <div class="row">           
                            <label class="col-md-2 control-label"><font color="red">*</font> Calibration Drift Test</label>
                            <div class="col-md-10">
                                <table class="table table-bordered" id="datatable_mqj_drift1"> 
                                    <thead>
                                        <tr>
                                            <th width="10%" class="text-center bg-color-teal txt-color-white" rowspan="2">Pollutant</th>
                                            <th class="text-center bg-color-teal txt-color-white" colspan="2">Day 1</th>
                                            <th class="text-center bg-color-teal txt-color-white" colspan="2">Day 2</th>
                                            <th class="text-center bg-color-teal txt-color-white" colspan="2">Day 3</th>
                                        </tr>
                                        <tr>
                                            <th class="text-center bg-color-teal txt-color-white" width="20%">Date/Time</th>
                                            <th class="text-center bg-color-teal txt-color-white" width="10%">CD Result</th>
                                            <th class="text-center bg-color-teal txt-color-white" width="20%">Date/Time</th>
                                            <th class="text-center bg-color-teal txt-color-white" width="10%">CD Result</th>
                                            <th class="text-center bg-color-teal txt-color-white" width="20%">Date/Time</th>
                                            <th class="text-center bg-color-teal txt-color-white" width="10%">CD Result</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row">          
                            <label class="col-md-2 control-label">&nbsp;</label>
                            <div class="col-md-10">
                                <table class="table table-bordered" id="datatable_mqj_drift2"> 
                                    <thead>
                                        <tr>
                                            <th width="10%" class="text-center bg-color-teal txt-color-white" rowspan="2">Pollutant</th>
                                            <th class="text-center bg-color-teal txt-color-white" colspan="2">Day 4</th>
                                            <th class="text-center bg-color-teal txt-color-white" colspan="2">Day 5</th>
                                            <th class="text-center bg-color-teal txt-color-white" colspan="2">Day 6</th>
                                        </tr>
                                        <tr>
                                            <th class="text-center bg-color-teal txt-color-white" width="20%">Date/Time</th>
                                            <th class="text-center bg-color-teal txt-color-white" width="10%">CD Result</th>
                                            <th class="text-center bg-color-teal txt-color-white" width="20%">Date/Time</th>
                                            <th class="text-center bg-color-teal txt-color-white" width="10%">CD Result</th>
                                            <th class="text-center bg-color-teal txt-color-white" width="20%">Date/Time</th>
                                            <th class="text-center bg-color-teal txt-color-white" width="10%">CD Result</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row">        
                            <label class="col-md-2 control-label">&nbsp;</label>
                            <div class="col-md-5">
                                <table class="table table-bordered" id="datatable_mqj_drift3"> 
                                    <thead>
                                        <tr>
                                            <th width="20%" class="text-center bg-color-teal txt-color-white" rowspan="2">Pollutant</th>
                                            <th class="text-center bg-color-teal txt-color-white" colspan="2">Day 7</th>
                                            <th width="17%" class="text-center bg-color-teal txt-color-white" rowspan="2">Final Result</th>
                                        </tr>
                                        <tr>
                                            <th class="text-center bg-color-teal txt-color-white" width="40%">Date/Time</th>
                                            <th class="text-center bg-color-teal txt-color-white" width="20%">CD Result</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row padding-bottom-10">        
                            <label class="col-md-2 control-label"><font color="red">*</font> Response Time</label>
                            <div class="col-md-4">
                                <table class="table table-bordered" id="datatable_mqj_responseTime"> 
                                    <thead>
                                        <tr>
                                            <th class="text-center bg-color-teal txt-color-white" width="25%">Pollutant</th>
                                            <th class="text-center bg-color-teal txt-color-white">Response Time (sec)</th>
                                            <th class="text-center bg-color-teal txt-color-white" width="25%">Result</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            </div>
                        </div>
                    </form>
                    <form class="form-horizontal" id="form_mqj_form">
                        <div class="form-group">      
                            <label class="col-md-2 control-label">Planned Test Date</label>
                            <div class="col-md-3">
                                <div class="input-group">
                                    <input type="text" name="mqj_qa_dateExpected" id="mqj_qa_dateExpected" class="form-control mqj_disabled">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>        
                                </div>
                            </div>
                        </div>
                        <div class="form-group">      
                            <label class="col-md-2 control-label"><font color="red">*</font> Actual Test Date</label>
                            <div class="col-md-3">
                                <div class="input-group">
                                    <input type="text" name="mqj_qa_dateActual" id="mqj_qa_dateActual" class="form-control" readonly>
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>          
                                </div>
                            </div>
                        </div>
                        <div class="form-group" id="mqj_div_datePoolStart">        
                            <label class="col-md-2 control-label"><font color="red">*</font> Pooling Start Date</label>
                            <div class="col-md-3">
                                <div class="input-group">
                                    <input type="text" name="mqj_indAll_datePoolStart" id="mqj_indAll_datePoolStart" class="form-control" readonly>
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>  
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">Additional Message</label>
                            <div class="col-md-10">
                                <textarea class="form-control" name="mqj_snote_qa_message" id="mqj_snote_qa_message" rows="6"></textarea>
                                <input type="hidden" name="mqj_qa_message" id="mqj_qa_message" />
                            </div>
                        </div>    
                    </form>
                    <form class="form-horizontal" id="form_mqj_doc" method="post" enctype="multipart/form-data">
                        <div class="form-group mqj_hide_view">      
                            <label class="col-md-2 control-label"> Attachment</label>
                            <div class="col-md-6">          
                                <input type="text" class="form-control" name="mqj_supDoc_name" id="mqj_supDoc_name"/>
                            </div>
                            <div class="col-md-4">
                                <div class="input-group">
                                    <input type="file" class="form-control" id="mqj_supDoc_file" name="mqj_supDoc_file" style="width: 100%">
                                    <span class="input-group-btn">
                                        <button class="btn btn-info" type="button" id="mqj_btn_add_supDoc"><i class="fa fa-upload"></i></button>
                                    </span>
                                </div>
                            </div>   
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label"> <span class="mqj_show_view">Attachment</span></label>
                            <div class="col-md-10">
                                <table class="table table-bordered table-hover margin-bottom-5" id="datatable_mqj_supportDoc"> 
                                    <thead>
                                        <tr>
                                            <th width="4%" class="text-center bg-color-teal txt-color-white">No.</th>
                                            <th width="35%" class="text-center bg-color-teal txt-color-white">Title</th>
                                            <th class="text-center bg-color-teal txt-color-white">Filename</th>
                                            <th width="70px" style="min-width: 70px" class="text-center bg-color-teal txt-color-white">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            </div>
                        </div>
                    </form>
                    <form class="form-horizontal" id="form_mqj_base">
                        <input type="hidden" name="funct" id="mqj_funct" value="save_qa" /> 
                        <input type="hidden" name="mqj_indAll_id" id="mqj_indAll_id" />
                        <input type="hidden" name="mqj_qa_id" id="mqj_qa_id" />
                        <input type="hidden" name="mqj_qa_type" id="mqj_qa_type" />
                        <input type="hidden" name="mqj_wfTask_id" id="mqj_wfTask_id" />
                        <input type="hidden" name="mqj_wfTaskType_id" id="mqj_wfTaskType_id" />
                        <input type="hidden" name="mqj_wfGroup_id" id="mqj_wfGroup_id" />
                        <input type="hidden" name="mqj_wfTask_status" id="mqj_wfTask_status" />
                        <input type="hidden" name="mqj_wfTask_refName" id="mqj_wfTask_refName" />
                        <input type="hidden" name="mqj_wfTask_refValue" id="mqj_wfTask_refValue" />
                    </form>
                </div>
                <h6 class="mqj_div_verify">Verification</h6>
                <div class="well well-light mqj_div_verify">
                    <form class="form-horizontal" id="form_mqj_verify">
                        <div class="form-group">      
                            <label class="col-md-3 control-label"><font color="red">*</font> Verification Result</label>
                            <div class="col-md-9">
                                <label class="radio radio-inline">
                                    <input type="radio" class="radiobox" name="mqj_result" value="17">
                                    <span>Verify</span>
                                </label>
                                <label class="radio radio-inline">
                                    <input type="radio" class="radiobox" name="mqj_result" value="12">
                                    <span>Return for Incompleteness</span>
                                </label>
                                <label class="radio radio-inline">
                                    <input type="radio" class="radiobox" name="mqj_result" value="46">
                                    <span>Reject and Return to Redo Test</span>
                                </label>
                            </div>   
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label"><font color="red">*</font> Message/Feedback</label>
                            <div class="col-md-9">
                                <textarea class="form-control" name="mqj_snote_wfTask_verify" id="mqj_snote_wfTask_verify" rows="6"></textarea>
                                <input type="hidden" name="mqj_wfTask_verify" id="mqj_wfTask_verify" />
                            </div>
                        </div>    
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <div class="row">
                    <div class="col-md-12">
                        <button type="button" class="btn btn-labeled btn-danger pull-left" id="mqj_btn_cancel" data-dismiss="modal">
                            <span class="btn-label"><i class="fa fa-mail-reply "></i></span>Exit
                        </button>
                        <button type="button" class="btn btn-labeled btn-success mqj_hide_view" id="mqj_btn_save">
                            <span class="btn-label"><i class="fa fa-save"></i></span>Save
                        </button>
                        <button type="button" class="btn btn-labeled btn-warning mqj_hide_view" id="mqj_btn_submit">
                            <span class="btn-label"><i class="fa fa-mail-forward"></i></span>Submit
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>    