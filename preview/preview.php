<!DOCTYPE html>
<html lang="en-us" id="extr-page">
    <head>
        <meta charset="utf-8">
        <title> Analyzer Registration Form</title>
        <meta name="description" content="">
        <meta name="author" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

        <!-- #CSS Links -->
        <!-- Basic Styles -->
        <link rel="stylesheet" type="text/css" media="screen" href="css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" media="screen" href="css/font-awesome.min.css">
    </head>
    <style> 

        table, th, td {
            border-collapse: collapse;
        }
        th, td { padding: 8px; }
        #title {
            border: 3px solid black;
        }
        #tdBorder {
            border: 1px solid black;
        }
        p.breakhere {page-break-before: always}
        #wrapper {
            position: absolute;
            left: 0;
            right: 0;
            top: 0;
            bottom: 0;
            border: 3px solid black;
        }
    </style>
    <body onload="window.print();"> 
        <div>
        <br>
        <center>
        <table width="800" border="0" >
            <tr>
                <td style="text-align: center;" colspan="3">
                    <img src="img/1.png" width="400" >
                    <br><br><br>
                </td>                  
            </tr>
            <tr></tr>
            <tr>
                <td width="20%"></td>
                <td id="title" style="text-align: center; background-color: #00ff33">
                    <h2>REGISTRATION FORM</h2>                    
                </td> 
                <td width="20%"></td>
            </tr>
            <tr>
                <td colspan="3">
                    <br><br>
                    All information provided will be kept CONFIDENTIAL. Jabatan Alam Sekitar however reserves the right to verify and/or
                    follow up on any information given.<br><br>
                    Where the space is insufficient, please supply the information in separate sheets and where documentation is
                    required, only certified copies will be accepted.<br><br>
                    Incomplete submissions (including submissions with no substantiating documentation) might not be processed.
                    It is the vendor’s responsibility to inform Jabatan Alam Sekitar of any changes information.<br><br>
                    Please print and return completed form, together with substantiating documentation to:
                </td>                
            </tr>
            <tr>
                <td style="text-align: center;" colspan="3">
                    <br><br>
                    
                    <h1>
                    JABATAN ALAM SEKITAR<br>
                    </h1>
                    <h4>
                    Aras 1 - 4, Podium 2 & 3,<br>
                    Wisma Sumber Asli No.25, <br>
                    Persiaran Perdana, Presint 4,<br>
                    Pusat Pentadbiran Kerajaan Persekutuan,<br>
                    62574 Putrajaya.<br><br>
                    TEL: 03-8871 2000/2200<br>
                    FAX: 03-8888 9987 / 03-8889 1040<br><br>
                    </h4>
                </td>
            </tr>
        </table>
        <p class="breakhere">
        <br>
        <table width="800" border="1" >
            <td>
                <b>Type of Registration</b>
                <br><br>
                <table>
                    <tr>
                        <td>New</td>
                        <td id="tdBorder" width="30%"><center><img src="img/2.png" width="15" ></center></td>
                        <td>Existing</td>
                        <td id="tdBorder" width="30%"></td>
                    </tr>
                </table>                
            </td>
            <td bgcolor="#00ff33">
                <b>
                <u>Procurement Department only</u><br>
                Ref. no:
                <br>
                Expiry date:
                </b>
            </td>
        </table>        
        <br>
        <table width="800" border="1" >
            <tr bgcolor="#000000">
                <td colspan="2">
                    <b>
                        <font style="color: white;">
                        1. SECTION A – COMPANY DETAIL<br>
                        </font>
                    </b>                     
                </td>
            </tr>                 
            <tr>
                <td width='50%'>
                    Company Name :  <b><span id="lprc_v_vendor_name"></span></b>                
                </td>
                <td rowspan="3">
                    Registered Address : <br>
                    
                    <b><span id="lprc_full_address"></span></b>   
                </td>
            </tr>
            <tr>
                <td>
                    Company Reg. No. : <b><span id="lprc_v_vendor_regNo"></span></b>
                </td>
            </tr>
            <tr>
                <td>
                    Incorporate Date :<b><span id="lprc_v_vendor_contact_person"></span></b>
                </td>
            </tr>
            <tr>
                <td>
                    Phone No. :<b><span id="lprc_v_vendor_designation"></span></b>
                </td>
                <td rowspan="3">
                    Mailing Address :<br>
                    
                    <b><span id="lprc_full_address"></span></b>   
                </td>
            </tr>
            <tr>
                <td>
                    Fax No. : <b><span id="lprc_v_vendor_phone_no"></span></b>
                </td>
            </tr>
            <tr>
                <td>
                    Website : <b><span id="lprc_v_vendor_fax_no"></span></b>
                </td>
            </tr>
            
            <tr>
                <td>
                    Contact Person : <b><span id="lprc_v_vendor_fax_no"></span></b>
                </td>
                <td>
                    Contact Number : <b><span id="lprc_v_vendor_fax_no"></span></b>
                </td>
            </tr>
            <tr>
                <td>
                    Position : <b><span id="lprc_v_vendor_fax_no"></span></b>
                </td>
                <td>
                    Email Address : <b><span id="lprc_v_vendor_fax_no"></span></b>
                </td>
            </tr>
            
        </table>
        <p class="breakhere">
        <br>
        <table width="800" border="1" >
            <tr bgcolor="#000000">
                <td colspan="4">
                    <b>
                        <font style="color: white;">
                        2. SECTION B – INFORMATION OF ANALYZER
                        </font>
                    </b>                     
                </td>
            </tr>   
            <tr bgcolor="#515A5A">
                <td colspan="4">
                    <b>
                        <font style="color: d">
                         B.1 Information of Analyzer and Equipment (DAS)<br>
                        </font>
                    </b>                     
                </td>
            </tr> 
            <tr>
                        <tr  >                            
                            <td colspan="2">Type of Analyzer : Opacity Meter</td>
                            <td colspan="2"> Model No. : 123</td>
                        </tr>
                        <tr  >                            
                            <td colspan="2">Technique : Paramagnetic</td>
                            <td colspan="2">Normalization : No</td>
                        </tr>
                  
            </tr>
            </table>
            <table width="800" border="1" id="lprc_work_category">
            <tr bgcolor="#515A5A">
                <td colspan="4">
                    <b>
                        <font style="color: #E5E8E8;">
                         B.2 Field of Specialization in CEMS Application<br>
                        </font>
                    </b>                     
                </td>
            </tr>                         
            <tr>
                <td rowspan="2" width="400">
                    Type Of Consultant                   
                </td>
                <td width="350">a. Installation</td>
                <td width="100"><b><span id="lprc_v_vendor_share_bumi"></span></b><center><img src="img/2.png" width="15" ></center></td>
            </tr>
            <tr>
                <td>b. Maintainance</td>
                <td><b><span id="lprc_v_vendor_share_nonbumi"></span></b></td>
            </tr>
            <tr>
                <td rowspan="3" width="30%">
                    Categories of Emission Monitoring                   
                </td>
                <td>a. Gases</td>
                <td><b><span id="lprc_v_vendor_share_bumi"></span></b><center><img src="img/2.png" width="15" ></center></td>
            </tr>
            <tr>
                <td>b. Particulate</td>
                <td><b><span id="lprc_v_vendor_share_nonbumi"></span></b><center><img src="img/2.png" width="15" ></center></td>
            </tr>
            <tr>
                <td>c. Opacity</td>
                <td><b><span id="lprc_v_vendor_share_nonbumi"></span></b></td>
            </tr>
            <tr>
                <td rowspan="7" width="30%">
                    Source of Activity                
                </td>
                <td>a. Fuel Burning Equipment</td>
                <td><b><span id="lprc_v_vendor_share_bumi"></span></b></td>
            </tr>
            <tr>
                <td>b. Heat and Power Generation</td>
                <td><b><span id="lprc_v_vendor_share_nonbumi"></span></b><center><img src="img/2.png" width="15" ></center></td>
            </tr>
            <tr>
                <td>c. Production and Processing of Ferrous Metals</td>
                <td><b><span id="lprc_v_vendor_share_nonbumi"></span></b></td>
            </tr>
            <tr>
                <td>d. Production and Processing of Non-Ferrous Metals</td>
                <td><b><span id="lprc_v_vendor_share_nonbumi"></span></b></td>
            </tr>
            <tr>
                <td>e.Oil and Gas Industries</td>
                <td><b><span id="lprc_v_vendor_share_nonbumi"></span></b><center><img src="img/2.png" width="15" ></center></td>
            </tr>
            <tr>
                <td>f. Non-Metallic Industry</td>
                <td><b><span id="lprc_v_vendor_share_nonbumi"></span></b><center><img src="img/2.png" width="15" ></center></td>
            </tr>
            <tr>
                <td>g. Waste incinerator</td>
                <td><b><span id="lprc_v_vendor_share_nonbumi"></span></b></td>
            </tr>
            <tr>
                <td rowspan="3" width="30%">
                    Product Status                 
                </td>
                <td>a. Manufacturer</td>
                <td><b><span id="lprc_v_vendor_share_bumi"></span></b></td>
            </tr>
            <tr>
                <td>b. Sole Distributor</td>
                <td><b><span id="lprc_v_vendor_share_nonbumi"></span></b></td>
            </tr>
            <tr>
                <td>c. Sub Distributor</td>
                <td><b><span id="lprc_v_vendor_share_nonbumi"></span></b><center><img src="img/2.png" width="15" ></center></td>
            </tr>
            
           
            <tr bgcolor="#515A5A">
                <td colspan="4">
                    <b>
                        <font style="color: #E5E8E8;">
                         B.3 Parameters and Specified Range<br>
                        </font>
                    </b>                     
                </td>
            </tr>   
             <tr>
                <td colspan="4">
                <br>
                    <center>
                    <table width="750" border="1" id="lprc_work_category">
                        <tr bgcolor=#212F3C>                            
                            <td><font style="color: white;">No</font></td>
                            <td><font style="color: white;">Parameter</font></td>
                            <td><font style="color: white;">Specified Range</font></td>
                            <td><font style="color: white;">Reference Traceability</font></td>
                            <td><font style="color: white;">Action</font></td>
                        </tr>
                        <tr >                            
                           <td><b><span id="lprc_v_vendor_share_foreign"></span></b> <center>1</center></td>
                           <td><b><span id="lprc_v_vendor_share_foreign"></span></b> <center>NO2</center></td>
                           <td><b><span id="lprc_v_vendor_share_foreign"></span></b><center>0 - 0.2</center></td>
                           <td><b><span id="lprc_v_vendor_share_foreign"></span></b><center>0.12</center></td>
                           <td><b><span id="lprc_v_vendor_share_foreign"></span></b></td>
                        </tr>
                        <tbody></tbody>
                    </table>
                    </center>
                    <br>
                </td>
            </tr> 
            </table>
             <p class="breakhere">
             <br>
            <table width="800" border="1" >
            <tr bgcolor="#515A5A">
                <td colspan="4">
                    <b>
                        <font style="color: #E5E8E8;">
                         B.4 CERTIFICATION<br>
                        </font>
                    </b>                     
                </td>
            </tr>  
             <tr>
                <td colspan="4">
                <br>
                    <center>
                    <table width="750" border="1" id="lprc_work_category">
                        <tr bgcolor=#212F3C>                            
                            <td><font style="color: white;">No</font></td>
                            <td><font style="color: white;">Certificate No.</font></td>
                            <td><font style="color: white;">Issuer</font></td>
                            <td><font style="color: white;">Basic</font></td>
                            <td><font style="color: white;">Expiry Date</font></td>
                            <td><font style="color: white;">Action</font></td>
                        </tr>
                        <tr >                            
                            <td><b><span id="lprc_v_vendor_share_foreign"></span></b><center>1</center></td>
                            <td><b><span id="lprc_v_vendor_share_foreign"></span></b><center>QW123</center></td>
                            <td><b><span id="lprc_v_vendor_share_foreign"></span></b><center>TUV</center></td>
                            <td><b><span id="lprc_v_vendor_share_foreign"></span></b><center>This is the basic of certification</center></td>
                            <td><b><span id="lprc_v_vendor_share_foreign"></span></b><center>15 DISEMBER 2017</center></td>
                            <td><b><span id="lprc_v_vendor_share_foreign"></span></b></td>
                        </tr>
                        <tbody></tbody>
                    </table>
                    </center>
                    <br>
                </td>
            </tr>   
             <tr bgcolor="#515A5A">
                <td colspan="4">
                    <b>
                        <font style="color: #E5E8E8;">
                         B.5 Information of DIS Software (must be compatible/connected/communicate with DOE server)<br>
                        </font>
                    </b>                     
                </td>
            </tr>  
            <tr>
                <td colspan="4">
                    Name of DIS : EXAMPLE                    
                </td>
            </tr>
             <tr>
                <td colspan="2">
                    Status of DIS : Outsourced                    
                </td>
                <td colspan="2">
                    Outsourced Company : SYAIRAH SDB BHD                    
                </td>
            </tr>
            <tr>
                <td colspan="4">
                    Software Description : <br>
                    This page are provided for software description. Explain all about the software here.                     
                </td>
            </tr>
        </table>
   
        <br>
        <table width="800" border="1" >
            <tr bgcolor="#000000">
                <td>
                    <b>
                        <font style="color: white;">
                        3. SECTION C – INFORMATION OF PERSONNEL
                        </font>
                    </b>                     
                </td>
            </tr>
            <tr>
                <td colspan="4">
                <br>
                    <center>
                    <table width="750" border="1" id="lprc_work_category">
                        <tr bgcolor=#212F3C>                            
                            <td><font style="color: white;">No</font></td>
                            <td><font style="color: white;">IC/Passport No.</font></td>
                            <td><font style="color: white;">Employee's Name</font></td>
                            <td><font style="color: white;">Employee's status</font></td>
                            <td><font style="color: white;">Academic Qualification</font></td>
                            <td><font style="color: white;">Working Experience</font></td>
                            <td><font style="color: white;">Training Certification</font></td>
                            
                        </tr>
                        <tr >       
                            <td><b><span id="lprc_v_vendor_share_foreign"></span></b><center>1</center></td>                     
                            <td><b><span id="lprc_v_vendor_share_foreign"></span></b><center>940111145094</center></td>
                            <td><b><span id="lprc_v_vendor_share_foreign"></span></b><center>Nur Shahirah Abdul Rahman</center></td>
                            <td><b><span id="lprc_v_vendor_share_foreign"></span></b><center>staff</center></td>
                            <td><b><span id="lprc_v_vendor_share_foreign"></span></b><center>Bachelor in Computer science</center></td>
                            <td><b><span id="lprc_v_vendor_share_foreign"></span></b><center> 2 years </center></td>
                            <td><b><span id="lprc_v_vendor_share_foreign"></span></b><center>US-EPA</center></td>
                           
                        </tr>
                        <tbody></tbody>
                    </table>
                    </center>
                    <br>
                </td>
            </tr>   
            
        </table> 
        <p class="breakhere">
        <br>
       
        <table width="800" border="1" >
            <tr bgcolor="#000000">
                <td colspan="4">
                    <b>
                        <font style="color: white;">
                        4. SECTION D – QUALITY CONTROL PROCEDURE
                        </font>
                    </b>                     
                </td>
            </tr>
             <tr bgcolor="#515A5A">
                <td colspan="4">
                    <b>
                        <font style="color: #E5E8E8;">
                         D.1 Ongoing Quality Assurance (e.g. QAL3, RAA)<br>
                        </font>
                    </b>                     
                </td>
            </tr>  
            
            <tr>
                <td rowspan="2" width="30%">
                   Zero/Span Check                   
                </td>
                <td>Method : Automatic</td>
                
            </tr>
            <tr>
                <td>Ongoing Frequency of Check : Daily</td>
                
            </tr>


            <tr bgcolor="#515A5A">
                <td colspan="4">
                    <b>
                        <font style="color: #E5E8E8;">
                         D.2 Quality Assurance (e.g. AST, RATA)<br>
                        </font>
                    </b>                     
                </td>
            </tr>  
            <tr>
            <table width="800" border="1" id="lprc_work_category">
            <tr>
                <td rowspan="11" width="30%">
                    Functionality Test                
                </td>
                <td>a. Alignment and Cleanliness</td>
                <td width="20%"><b><span id="lprc_v_vendor_share_bumi"></span></b><center><img src="img/2.png" width="15" ></center></td>
            </tr>
            <tr>
                <td>b. Sampling System</td>
                <td width="20%"><b><span id="lprc_v_vendor_share_nonbumi"></span></b><center><img src="img/2.png" width="15" ></center></td>
            </tr>
            <tr>
                <td>c. NOx Converter Efficiency - installation (if applicable)</td>
                <td><b><span id="lprc_v_vendor_share_nonbumi"></span></b></td>
            </tr>
            <tr>
                <td>d. Documentation and Records</td>
                <td><b><span id="lprc_v_vendor_share_nonbumi"></span></b></td>
            </tr>
            <tr>
                <td>e.Serviceability</td>
                <td><b><span id="lprc_v_vendor_share_nonbumi"></span></b></td>
            </tr>
            <tr>
                <td>f. Leak Test</td>
                <td><b><span id="lprc_v_vendor_share_nonbumi"></span></b><center><img src="img/2.png" width="15" ></center></td>
            </tr>
            <tr>
                <td>g. Zero and Span Check / Calibration</td>
                <td><b><span id="lprc_v_vendor_share_nonbumi"></span></b></td>
            </tr>
             <tr>
                <td>h. Linearity</td>
                <td><b><span id="lprc_v_vendor_share_nonbumi"></span></b><center><img src="img/2.png" width="15" ></center></td>
            </tr>
             <tr>
                <td>i. Interferences</td>
                <td><b><span id="lprc_v_vendor_share_nonbumi"></span></b><center><img src="img/2.png" width="15" ></center></td>
            </tr>
             <tr>
                <td>j. Zero and Span Drift (Audit)</td>
                <td><b><span id="lprc_v_vendor_share_nonbumi"></span></b></td>
            </tr>
             <tr>
                <td>k. Response Time</td>
                <td><b><span id="lprc_v_vendor_share_nonbumi"></span></b></td>
            </tr>
            <tr>
                <td rowspan="3" width="20%">
                    Comparison Measurements against Standard Reference Method              
                </td>
                <td>a. Calibration Gas Cylinder</td>
                <td width="20%"><b><span id="lprc_v_vendor_share_bumi"></span></b></td>
            </tr>
            <tr>
                <td>b. Iso-kinetic Sampling Test</td>
                <td width="20%"><b><span id="lprc_v_vendor_share_nonbumi"></span></b><center><img src="img/2.png" width="15" ></center></td>
            </tr>
            <tr>
                <td>c. Other Surrogates</td>
                <td><b><span id="lprc_v_vendor_share_nonbumi"></span></b><center><img src="img/2.png" width="15" ></center></td>
            </tr>
            </table></tr>
            
        </table>
         
        <br>
        <table width="800" border="1" >
            <tr bgcolor="#000000">
                <td>
                    <b>
                        <font style="color: white;">
                        5. SECTION E - COMPANY WORKING EXPERIENCE
                        </font>
                    </b>                     
                </td>
            </tr>
             <tr>
                <td colspan="4">
                <br>
                    <center>
                    <table width="750" border="1" id="lprc_work_category">
                        <tr bgcolor=#212F3C>                            
                            <td><font style="color: white;">No</font></td>
                            <td><font style="color: white;">Project Title</font></td>
                            <td><font style="color: white;">Year</font></td>
                            <td><font style="color: white;">Client</font></td>
                            <td><font style="color: white;">Project Description</font></td>
                            <td><font style="color: white;">Scope of Work</font></td>
                            <td><font style="color: white;">Type of Analyzer</font></td>
                            <td><font style="color: white;">Project Value</font></td>
                        </tr>
                        <tr >                            
                            <td><b><span id="lprc_v_vendor_share_foreign"></span></b><center>1</center></td>
                            <td><b><span id="lprc_v_vendor_share_foreign"></span></b><center>Projek Pertama</center></td>
                            <td><b><span id="lprc_v_vendor_share_foreign"></span></b><center>2016</center></td>
                            <td><b><span id="lprc_v_vendor_share_foreign"></span></b><center>TimeTec Sdn Bhd</center></td>
                            <td><b><span id="lprc_v_vendor_share_foreign"></span></b><center>This column provided for project description</center></td>
                            <td><b><span id="lprc_v_vendor_share_foreign"></span></b><center>this column for scope of work</center></td>
                            <td><b><span id="lprc_v_vendor_share_foreign"></span></b><center>Type 1</center></td>
                            <td><b><span id="lprc_v_vendor_share_foreign"></span></b><center>Project 1</center></td>
                        </tr>
                        <tbody></tbody>
                    </table>
                    </center>
                    <br>
                </td>
            </tr>   
            
        </table>
        <br>
        <p class="breakhere">
        <br>
        <table width="800" border="0" >
            <tr >
                <td>
                    <b>
                        6. SECTION F – Declaration
                        
                    </b>                     
                </td>
            </tr>



<tr><td>
 <div class="row">

                                                <div class="col-md-12" style="padding-left: 25px">

                                                    <div class="form-group">

                                                        <div class="checkbox">

                                                            <label>

                                                                <input type="checkbox" class="checkbox" name="mac_declare_1" checked>


                                                                <span style="line-height: 22px;">I / We hereby declare that all the information furnished in this form and any annexure(s) that comes with it are true, accurate, complete and up-to-date in all respect.</span>

                                                            </label>

                                                        </div> 

                                                    </div>  
                                                    <br>

                                                    <div class="form-group">

                                                        <div class="checkbox">

                                                            <label>

                                                                <input type="checkbox" class="checkbox" name="mac_declare_2" checked>

                                                                <span style="line-height: 22px;">I / We authorize the Malaysian Department of Environment to publish the following informaion in the Department's website at http://www.doe/gov/my. <i>(Please check whenever applicable)</i></span>

                                                            </label>

                                                        </div> 

                                                    </div>  
                                                    <br>
                                                    <div class="form-group">

                                                        <div class="padding-10 padding-top-0">

                                                            <div class="checkbox">

                                                                <label>

                                                                    <span>   - Information furnished in the application form.</span>

                                                                </label>

                                                            </div> 

                                                            <div class="checkbox">

                                                                <label>

                                                                    <span>   - Details Information of Analyzers, Equipment and Employee Working Experience.</span>

                                                                </label>

                                                            </div> 

                                                            <div class="checkbox">

                                                                <label>

                                                                    <span>   - Details Information of Personnel for CEMS.</span>

                                                                </label>

                                                            </div> 

                                                            <div class="checkbox">

                                                                <label>

                                                                    <span>   - Details Information of DIS Software.</span>

                                                                </label>

                                                            </div> 

                                                        </div>  

                                                    </div>  

</td>
</tr>



            
        
<input type="hidden" id="v_vendor_id" value="<?=$_POST['v_vendor_id'] ?>" />
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script> if (!window.jQuery) {
        document.write('<script src="js/libs/jquery-2.1.1.min.js"><\/script>');
    }</script>

<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
<script> if (!window.jQuery.ui) {
        document.write('<script src="js/libs/jquery-ui-1.10.3.min.js"><\/script>');
    }</script>
<script src="library/general.js"></script>
    
<script type="text/javascript">	        
    var otherCert = '';
    
    $(document).ready(function() {
        var v_vendor = f_get_general_info('vw_company_detail', {'v_vendor_id':$('#v_vendor_id').val()}, 'prc');
        var address = f_get_general_info('vw_address', {'address_id':v_vendor.address_id}, 'prc');
        $('#lprc_v_vendor_dateInc').html(convert_date_to_picker(v_vendor.v_vendor_dateInc));
        var vendor_business_nature = f_get_general_info_multiple('vendor_business_nature', {'v_vendor_id':$('#v_vendor_id').val()});
        $.each(vendor_business_nature, function(u){
            $('#prc_bn_' + vendor_business_nature[u].businessNature_id).css('font-weight','bold');           
        });
        var vendor_regCert = f_get_general_info_multiple('vw_vendor_regcert', {'v_vendor_id':$('#v_vendor_id').val()});
        $.each(vendor_regCert, function(u){
            if (vendor_regCert[u].regCert_id == '6') {
                otherCert = otherCert == '' ? vendor_regCert[u].vendorRegCert_desc : otherCert+', '+vendor_regCert[u].vendorRegCert_desc;
            } else {
                $('#lprc_vendorRegCert_dateExpiry_' + vendor_regCert[u].regCert_id).html(convert_date_to_picker(vendor_regCert[u].vendorRegCert_dateExpiry));
                $('#lprc_vendorRegCert_certNo_' + vendor_regCert[u].regCert_id).html(vendor_regCert[u].vendorRegCert_certNo);
                $('#lprc_vendorRegCert_gredNo_' + vendor_regCert[u].regCert_id).html(vendor_regCert[u].vendorRegCert_gredNo);
                $('#lprc_certGred_id_' + vendor_regCert[u].regCert_id).html(vendor_regCert[u].certGred_id);
                $('#lprc_certCategory_desc_' + vendor_regCert[u].regCert_id).html(vendor_regCert[u].certCategory_desc);
            }
        });  
        if (otherCert != '')
            $('#lprc_vendorRegCert_desc_6').html(otherCert);
        var work_category = f_get_general_info_multiple('dt_vendor_work_category', {'v_vendor_id':$('#v_vendor_id').val()});
        $.each(work_category, function(u){
            var trs = '<tr><td>'+(u+1)+'</td><td>'+work_category[u].workCate_desc+'</td><td>'+work_category[u].mainCate_desc+'</td><td>'+work_category[u].subCate_desc+'</td></tr>';
            $(trs).appendTo($("#lprc_work_category"));
        });
    }); 
</script>

        
    </body>    
</html>


