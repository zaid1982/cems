<?php 
require_once('../tcpdf/tcpdf.php');

$g_eval_id = '';

class MYPDF_evaluation_form extends TCPDF {
    public function Header() {
        //$eval = Class_db::getInstance()->db_select_single('vw_vpe_evaluation', array('eval_id'=>$GLOBALS['g_eval_id']), NULL, 1);
        $this->SetFont('helvetica', '', 8); // <th rowspan="2" width="255"><strong>'.strtoupper($eval['v_vendor_name']).'</strong></th>
        $html = '<table border="0.8" cellpadding="4" width="100%">
            <tr>
                <td rowspan="4" width="20%" align="center"><img src="../img/1.png" alt="JAS" width="80px"></td>
                <th rowspan="4" width="30%" align="center"><br/><br/><br/><strong>CEMS ANALYZER REGISTRATION FORM</strong></th>
                <th width="20%">Reference No.</th>
                <th width="30%" align="center"><i>ICM/1003B0240593/17/1710/01</i></th>
            </tr>
            <tr>
                <th>Revision No.</th>
                <th align="center"><i>1.0</i></th>
            </tr>
            <tr>
                <th>Effective Date</th>
                <th align="center"><i>12.08.2018</i></th>
            </tr>
            <tr>
                <th>Page</th>
                <th align="center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i>'.$this->getAliasNumPage().'/'.$this->getAliasNbPages().'</i></th>
            </tr>
        </table>';
        $this->writeHTML($html);
    }
    
    public function Footer() {
        // Position at 15 mm from bottom
        $this->SetY(-15);
        // Set font
        $this->SetFont('helvetica', 'I', 8);
        // Page number
        $this->Cell(0, 10, 'IRemote System v1.0. Jabatan Alam Sekitar, 2018', 0, false, 'C', 0, '', 0, false, 'T', 'M');
    }
}
    
class Class_pdf_form_analyzerCems {
         
    private $log_dir = '';
    
    function __construct()
    {
        // 1400++
        $config = parse_ini_file('../library/config.ini');
        $this->log_dir = $config['log_dir'];
    }
    
    private function get_exception($codes, $function, $line, $msg) {
        if ($msg != '') {            
            $pos = strpos($msg,'-');
            if ($pos !== false)   
                $msg = substr($msg, $pos+2); 
            return "(ErrCode:".$codes.") [".__CLASS__.":".$function.":".$line."] - ".$msg;
        } else
            return "(ErrCode:".$codes.") [".__CLASS__.":".$function.":".$line."]";
    }
    
    private function log_debug($function, $line, $msg) {
        $debugMsg = date("Y/m/d h:i:sa")." [".__CLASS__.":".$function.":".$line."] - ".$msg."\r\n";
        error_log($debugMsg, 3, $this->log_dir.'/debug/debug_'.date("Ymd").'.log');
    }
    
    public function __get($property) {
        if (property_exists($this, $property)) 
            return $this->$property;
        else
            throw new Exception($this->get_exception('0001', __FUNCTION__, __LINE__, 'Get Property not exist ['.$property.']'));
    }

    public function __set( $property, $value ) {
        if (property_exists($this, $property)) 
            $this->$property = $value;        
        else
            throw new Exception($this->get_exception('0002', __FUNCTION__, __LINE__, 'Get Property not exist ['.$property.']'));
    }
    
    public function __isset( $property ) {
        if (property_exists($this, $property)) 
            return isset($this->$property);
        else
            throw new Exception($this->get_exception('0003', __FUNCTION__, __LINE__, 'Get Property not exist ['.$property.']'));
    }
    
    public function __unset( $property ) {
        if (property_exists($this, $property)) 
            unset($this->$property);
        else
            throw new Exception($this->get_exception('0004', __FUNCTION__, __LINE__, 'Get Property not exist ['.$property.']'));
    }
    
    private function folder_exist($folder) {
        $path = realpath($folder);
        return ($path !== false AND is_dir($path)) ? $path : false;
    }
    
    public function save_pdf ($eval_id) {
        try {
            $GLOBALS['g_eval_id'] = $eval_id;
            $this->log_debug(__FUNCTION__, __LINE__, "entering Class_pdf_form_analyzerCems->save_pdf(".$eval_id.")");
//            $eval_info = Class_db::getInstance()->db_select_single('vw_vpe_evaluation', array('eval_id'=>$eval_id), NULL, 1);
//            $eval_by = Class_db::getInstance()->db_select_single('vw_vpe_evaluationBy', array('eval_id'=>$eval_id), NULL, 1);
            // create new PDF document
            $pdf = new MYPDF_evaluation_form(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
            // set document information
            $pdf->SetCreator(PDF_CREATOR);
            $pdf->SetTitle('VPE Evaluation Form - ');
            // set default header data
            $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 009', PDF_HEADER_STRING);
            // set header and footer fonts
            $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
            $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
            // remove default header/footer
            //$pdf->setPrintHeader(false);
            $pdf->setPrintFooter(true);
            // set default monospaced font
            $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
            // set margins
            $pdf->SetMargins(PDF_MARGIN_LEFT, 40, PDF_MARGIN_RIGHT);
            $pdf->SetHeaderMargin(10);
            $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
            // set auto page breaks
            $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
            $pdf->SetFont('helvetica', '', 8);
            $pdf->AddPage();   
            $arr = array('ol' => array(0 => array('h' => '', 'n' => 0), 1 => array('h' => 0, 'n' => 0)));
            $pdf->setHtmlVSpace($arr);
            
            $config = parse_ini_file('../library/config.ini');
            $contect_marks = '';
//            $arr_marks = Class_db::getInstance()->db_select('vw_vpe_marks', array('eval_id'=>$eval_id), 'ques_turn', NULL, 1);
//            foreach ($arr_marks as $marks) {
//                $contect_marks .= '
//                    <tr>
//                        <th width="25" align="center" style="background-color: black; color: white;"><strong>'.$marks['ques_turn'].'</strong></th>
//                        <th width="245" style="background-color: black; color: white;"><strong>'.$marks['ques_title'].'</strong></th>
//                        <th width="40" align="center" style="background-color: black; color: white;"><strong>'.$marks['ques_weightage'].'%</strong></th>
//                        <th width="40" align="center" style="background-color: black; color: white;"><strong></strong></th>
//                        <th width="40" align="center" style="background-color: black; color: white;"><strong></strong></th>
//                        <th width="40" align="center" style="background-color: black; color: white;"><strong></strong></th>
//                        <th width="40" align="center" style="background-color: black; color: white;"><strong></strong></th>
//                        <th width="40" align="center" style="background-color: black; color: white;"><strong></strong></th>
//                    </tr>
//                    <tr>
//                        <th width="25" align="center"></th>
//                        <th width="245"><div style="text-align: justify">'.$marks['ques_desc'].'</div></th>
//                        <th width="40" align="center">'.$marks['marks_total'].'</th>
//                        <th width="40" align="center"><img src="http://'.$config['domain'].'/vendor_mgmt/img/chk_'.($marks['marks_point']=='1'?'':'un').'checked.jpg" height="10" width="10"></th>
//                        <th width="40" align="center"><img src="http://'.$config['domain'].'/vendor_mgmt/img/chk_'.($marks['marks_point']=='2'?'':'un').'checked.jpg" height="10" width="10"></th>
//                        <th width="40" align="center"><img src="http://'.$config['domain'].'/vendor_mgmt/img/chk_'.($marks['marks_point']=='3'?'':'un').'checked.jpg" height="10" width="10"></th>
//                        <th width="40" align="center"><img src="http://'.$config['domain'].'/vendor_mgmt/img/chk_'.($marks['marks_point']=='4'?'':'un').'checked.jpg" height="10" width="10"></th>
//                        <th width="40" align="center"><img src="http://'.$config['domain'].'/vendor_mgmt/img/chk_'.($marks['marks_point']=='5'?'':'un').'checked.jpg" height="10" width="10"></th>
//                    </tr>';
//            }
            
            $content = '<br/><br/>                
                <table border="0.8" cellpadding="4" width="100%">
                    <tr>
                        <td width="20%">Analyzer Model No.</td>
                        <td width="30%"><i>DV12312-11</i></td>
                        <td width="20%">Company Name</td>
                        <td width="30%"><i>Addeen Legacy Ibnu Zaid Legacy Ibnu Zaid Dbn Bhd</i></td>
                    </tr>
                    <tr>
                        <td>Submission Date</td>
                        <td><i>DV12312-11</i></td>
                        <td>Approval Date</td>
                        <td><i>DV12312-11</i></td>
                    </tr>
                    <tr>
                        <td colspan="4"><div style="text-align: justify">All information provided will be kept CONFIDENTIAL. Jabatan Alam Sekitar however reserves the right to verify and/or follow up on any information given.</div></td>
                    </tr>
                </table>
                <br/><br/><br/>
                
                <table border="0.8" cellpadding="4" width="100%">
                    <tr>
                        <th style="background-color: black; color: white; font-size: 11;" colspan="4"><b>1. SECTION A - COMPANY DETAILS</b></th>
                    </tr>                    
                    <tr nobr="true">
                        <td width="20%">Company Name</td>
                        <td width="80%" colspan="3"><i>Addeen Legacy Ibnu Zaid Legacy Ibnu Zaid Dbn Bhd</i></td>
                    </tr>                 
                    <tr nobr="true">
                        <td width="20%">Registration No.</td>
                        <td width="30%"><i>DV12312-11</i></td>
                        <td width="20%">Incorporate Date</td>
                        <td width="30%"><i>6 September, 2017</i></td>
                    </tr>                  
                    <tr nobr="true">
                        <td width="20%">Registered Address</td>
                        <td width="30%"><i>No.51<br/>Jalan 4/5E<br/>43650 Bandar Baru Bangi<br/>Selangor</i></td>
                        <td width="20%">Mailing Address</td>
                        <td width="30%"><i>No.51<br/>Jalan 4/5E<br/>43650 Bandar Baru Bangi<br/>Selangor</i></td>
                    </tr>                 
                    <tr nobr="true">
                        <td width="20%">Telephone No.</td>
                        <td width="30%"><i>0349854443</i></td>
                        <td width="20%">Fax No.</td>
                        <td width="30%"><i>0343435432</i></td>
                    </tr>                         
                    <tr nobr="true">
                        <td width="20%">Website</td>
                        <td width="80%" colspan="3"><i>www.sdsfs.com</i></td>
                    </tr>                         
                    <tr nobr="true">
                        <td width="20%">Contact Person</td>
                        <td width="80%" colspan="3"><i>Muhammad Ali bin Shaharil</i></td>
                    </tr>            
                    <tr nobr="true">
                        <td width="20%">Position</td>
                        <td width="30%"><i>0349854443</i></td>
                        <td width="20%">Contact No.</td>
                        <td width="30%"><i>0102203322</i></td>
                    </tr>                       
                    <tr nobr="true">
                        <td width="20%">Email Address</td>
                        <td width="80%" colspan="3"><i>ali@gmail.com</i></td>
                    </tr>      
                    <tr nobr="true">
                        <td width="20%">Supporting Document</td>
                        <td width="80%" colspan="3" style="padding: 0px; margin: 00px;">
                            <table border="0.8" cellpadding="4" width="100%">  
                                <tr nobr="true" style="text-align: center;">
                                    <th width="5%" style="background-color: darkgrey; color: white;">No</th>
                                    <th width="30%" style="background-color: darkgrey; color: white;">Document Type</th>
                                    <th width="65%" style="background-color: darkgrey; color: white;">Document Title</th>
                                </tr>
                                <tr nobr="true" style="font-style: italic;">
                                    <td style="text-align: center;">1</td>
                                    <td>Company Profile</td>
                                    <td>2017 Profile</td>
                                </tr>
                                <tr nobr="true" style="font-style: italic;">
                                    <td style="text-align: center;">2</td>
                                    <td>Registry of Companies</td>
                                    <td>2018 Registry (sdfklsnml klnsdflkn sd)</td>
                                </tr>
                            </table> 
                        </td>
                    </tr>               
                </table>
                <br/><br pagebreak="true"/><br/>   
                <table border="0.8" cellpadding="4" width="100%" nobr="true">
                    <tr>
                        <th style="background-color: black; color: white; font-size: 11" colspan="4"><b>2. SECTION B - INFORMATION OF ANALYZER</b></th>
                    </tr>    
                    <tr>
                        <th style="background-color: #515A5A; color: #E5E8E8; font-size: 9" colspan="4"><b>B.1. Information of CEMS Analyzer</b></th>
                    </tr>    
                    <tr nobr="true">
                        <td width="20%">Model No.</td>
                        <td width="30%"><i>123223</i></td>
                        <td width="20%">Brand</td>
                        <td width="30%"><i>Samsung</i></td>
                    </tr>                       
                    <tr nobr="true">
                        <td width="20%">Manufacturer</td>
                        <td width="80%" colspan="3"><i>DCT Tecknology Sdn Bhd</i></td>
                    </tr>                        
                    <tr nobr="true">
                        <td width="20%">Type of Analyzer</td>
                        <td width="80%" colspan="3">
                            <img src="../img/chk_unchecked.jpg" height="10" width="10"> <i>Gas Analyzer&nbsp;&nbsp;&nbsp;&nbsp;</i>
                            <img src="../img/chk_checked.jpg" height="10" width="10"> <i>Opacity Meter&nbsp;&nbsp;&nbsp;&nbsp;</i>
                            <img src="../img/chk_checked.jpg" height="10" width="10"> <i>Particulate Monitors</i>
                        </td>
                    </tr>     
                    <tr nobr="true">
                        <td width="20%">Technique</td>
                        <td width="30%"><i>In-Situ Analyzer</i></td>
                        <td width="20%">Normalization</td>
                        <td width="30%"><i>Auto</i></td>
                    </tr>      
                    <tr nobr="true">
                        <td width="20%">Type of Probe</td>
                        <td width="30%"><i>Specific Probe</i></td>
                        <td width="20%">Length of Probe</td>
                        <td width="30%"><i>45.44 m</i></td>
                    </tr>                       
                    <tr nobr="true">
                        <td width="20%">Method of Detection</td>
                        <td width="80%" colspan="3"><i>Differential Optical Absorption Specroscopy (DOAS)</i></td>
                    </tr>                       
                    <tr nobr="true">
                        <td width="20%">Software</td>
                        <td width="80%" colspan="3"><i>Highchart v3.0</i></td>
                    </tr>                       
                    <tr nobr="true">
                        <td width="20%">Controller</td>
                        <td width="80%" colspan="3"><i>X3421 German Build</i></td>
                    </tr>  
                    <tr nobr="true">
                        <td width="20%">Manual / Catalogue</td>
                        <td width="80%" colspan="3" style="padding: 0px; margin: 00px;">
                            <table border="0.8" cellpadding="4" width="100%">  
                                <tr nobr="true" style="text-align: center;">
                                    <th width="5%" style="background-color: darkgrey; color: white;">No</th>
                                    <th width="30%" style="background-color: darkgrey; color: white;">Document Type</th>
                                    <th width="65%" style="background-color: darkgrey; color: white;">Document Title</th>
                                </tr>
                                <tr nobr="true" style="font-style: italic;">
                                    <td style="text-align: center;">1</td>
                                    <td>Company Profile</td>
                                    <td>2017 Profile</td>
                                </tr>
                                <tr nobr="true" style="font-style: italic;">
                                    <td style="text-align: center;">2</td>
                                    <td>Registry of Companies</td>
                                    <td>2018 Registry (sdfklsnml klnsdflkn sd)</td>
                                </tr>
                            </table> 
                        </td>
                    </tr>  
                </table> 
                <table border="0.8" cellpadding="4" width="100%" nobr="true">  
                    <tr>
                        <th style="background-color: #515A5A; color: #E5E8E8; font-size: 9" colspan="4"><b>B.1. Information of CEMS Analyzer</b></th>
                    </tr>            
                    <tr nobr="true">
                        <td width="20%">Type of Consultant</td>
                        <td width="30%">
                            <img src="../img/chk_unchecked.jpg" height="10" width="10"> <i>Installation&nbsp;&nbsp;&nbsp;&nbsp;</i> 
                            <img src="../img/chk_checked.jpg" height="10" width="10"> <i>Maintenance</i>
                        </td>
                        <td width="20%">Product Status</td>
                        <td width="30%"><i>Sole Distributor</i></td>
                    </tr>                    
                    <tr nobr="true">
                        <td width="20%">Type of Analyzer</td>
                        <td width="80%" colspan="3">
                            <img src="../img/chk_unchecked.jpg" height="10" width="10"> <i>Fuel Burning Equipment</i> <br/>
                            <img src="../img/chk_checked.jpg" height="10" width="10"> <i>Heat and Power Generation</i> <br/>
                            <img src="../img/chk_checked.jpg" height="10" width="10"> <i>Production and Processing of Ferrous Metals</i> <br/>
                            <img src="../img/chk_unchecked.jpg" height="10" width="10"> <i>Production and Processing of Non-Ferrous Metals</i> <br/>
                            <img src="../img/chk_checked.jpg" height="10" width="10"> <i>Oil and Gasd Industries</i> <br/>
                            <img src="../img/chk_checked.jpg" height="10" width="10"> <i>Non-Metallic Industry</i> <br/>
                            <img src="../img/chk_checked.jpg" height="10" width="10"> <i>Waste Incinerator</i> 
                        </td>
                    </tr>     
                </table>    
                <table border="0.8" cellpadding="4" width="100%" nobr="true">  
                    <tr>
                        <th style="background-color: #515A5A; color: #E5E8E8; font-size: 9" colspan="6"><b>B.3. Parameters and Specified Range</b></th>
                    </tr>
                    <tr nobr="true" style="text-align: center;">
                        <th width="5%" style="background-color: darkgrey; color: white;">No</th>
                        <th width="15%" style="background-color: darkgrey; color: white;">Input Parameter</th>
                        <th width="25%" style="background-color: darkgrey; color: white;">Analyzer Certified</th>
                        <th width="20%" style="background-color: darkgrey; color: white;">Consumable Span Gas</th>
                        <th width="15%" style="background-color: darkgrey; color: white;">Data Generation</th>
                        <th width="20%" style="background-color: darkgrey; color: white;">Method</th>
                    </tr>
                    <tr nobr="true" style="font-style: italic;">
                        <td style="text-align: center;">1</td>
                        <td>NO<sub>2</sub></td>
                        <td>12 mg/m<sup>3</sup> to 14 mg/m<sup>3</sup></td>
                        <td>Gas Methana</td>
                        <td style="text-align: right;">40.54 data/sec</td>
                        <td>NIST Standard</td>
                    </tr>
                </table>    
                <table border="0.8" cellpadding="4" width="100%" nobr="true">  
                    <tr>
                        <th style="background-color: #515A5A; color: #E5E8E8; font-size: 9" colspan="5"><b>B.4. Certification</b></th>
                    </tr>
                    <tr nobr="true" style="text-align: center;">
                        <th width="5%" style="background-color: darkgrey; color: white;">No</th>
                        <th width="25%" style="background-color: darkgrey; color: white;">Certificate No.</th>
                        <th width="20%" style="background-color: darkgrey; color: white;">Issuer</th>
                        <th width="30%" style="background-color: darkgrey; color: white;">Basic of Certification</th>
                        <th width="20%" style="background-color: darkgrey; color: white;">Expiry Date</th>
                    </tr>
                    <tr nobr="true" style="font-style: italic;">
                        <td style="text-align: center;">1</td>
                        <td>F-2322XX322</td>
                        <td>TUV</td>
                        <td>EN15267-1, EN15267-2</td>
                        <td style="text-align: center;">25/4/2018</td>
                    </tr>
                </table>   
                <table border="0.8" cellpadding="4" width="100%" nobr="true">  
                    <tr>
                        <th style="background-color: #515A5A; color: #E5E8E8; font-size: 9" colspan="2"><b>B.5. Information of DAS Software</b></th>
                    </tr>
                    <tr nobr="true">
                        <td width="20%">Probe Software Version</td>
                        <td width="80%"><i>IIS v12.322</i></td>
                    </tr>  
                    <tr nobr="true">
                        <td width="20%">Probe Software Description</td>
                        <td width="80%"><i>Create a Date With PHP mktime(). The optional timestamp parameter in the date() function specifies a timestamp.</i></td>
                    </tr>   
                    <tr nobr="true">
                        <td width="20%">Analyzer Software Version</td>
                        <td width="80%"><i>CES v203.222</i></td>
                    </tr>  
                    <tr nobr="true">
                        <td width="20%">Analyzer Software Description</td>
                        <td width="80%"><i>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque in mauris elit. Ut nec arcu pretium eros varius porta vitae sit amet ipsum. Suspendisse porttitor, libero in rutrum pretium, lectus arcu maximus massa, ut condimentum metus libero laoreet lectus. Phasellus a lectus pulvinar.</i></td>
                    </tr>   
                </table>   
                <table border="0.8" cellpadding="4" width="100%" nobr="true">  
                    <tr>
                        <th style="background-color: #515A5A; color: #E5E8E8; font-size: 9" colspan="4"><b>B.6. Information of DIS Software</b></th>
                    </tr>                   
                    <tr nobr="true">
                        <td width="20%">Name of DIS</td>
                        <td width="80%" colspan="3"><i>Highchart v3.0</i></td>
                    </tr>     
                    <tr nobr="true">
                        <td width="20%">Status of DIS</td>
                        <td width="30%"><i>Outsourced</i></td>
                        <td width="20%">Outsourced Company</td>
                        <td width="30%"><i>Adele Legacy Sdn Bhd</i></td>
                    </tr>                      
                    <tr nobr="true">
                        <td width="20%">Description</td>
                        <td width="80%" colspan="3"><i>Hey did you meet the new board of director? He\'s a bit of an geek if you ask me...anyway here is the report you requested. I am off to launch with Lisa and Andrew, you wanna join?</i></td>
                    </tr>     
                </table> 
                <br/><br/><br/>   
                <table border="0.8" cellpadding="4" width="100%" nobr="true">  
                    <tr>
                        <th style="background-color: black; color: white; font-size: 11" colspan="8"><b>3. SECTION C - INFORMATION OF PERSONNEL FOR CEMS</b></th>
                    </tr>                  
                    <tr nobr="true" style="text-align: center;">
                        <th width="5%" style="background-color: darkgrey; color: white;">No</th>
                        <th width="18%" style="background-color: darkgrey; color: white;">Name of Certified</th>
                        <th width="13%" style="background-color: darkgrey; color: white;">IC/Passport No</th>
                        <th width="10%" style="background-color: darkgrey; color: white;">Citizenship</th>
                        <th width="8%" style="background-color: darkgrey; color: white;">Status</th>
                        <th width="10%" style="background-color: darkgrey; color: white;">Year<br/>Experience</th>
                        <th width="18%" style="background-color: darkgrey; color: white;">Academic Qualification</th>
                        <th width="18%" style="background-color: darkgrey; color: white;">Traning Certificaton</th>
                    </tr>
                    <tr nobr="true" style="font-style: italic;">
                        <td style="text-align: center;">1</td>
                        <td>Muhammad Zaid Shaharil</td>
                        <td>830419032333</td>
                        <td>Malaysian</td>
                        <td>Loan/Contracted</td>
                        <td style="text-align: right;">13</td>
                        <td>SPM, Degree, Master, PHD</td>
                        <td>CEMS Degree from University German</td>
                    </tr>     
                </table> 
                <br/><br/><br/>   
                <table border="0.8" cellpadding="4" width="100%" nobr="true">  
                    <tr>
                        <th style="background-color: black; color: white; font-size: 11" colspan="8"><b>4. SECTION D - COMPANY WORKING EXPERIENCE</b></th>
                    </tr>                  
                    <tr nobr="true" style="text-align: center;">
                        <th width="5%" style="background-color: darkgrey; color: white;">No</th>
                        <th width="15%" style="background-color: darkgrey; color: white;">Project Title</th>
                        <th width="7%" style="background-color: darkgrey; color: white;">Year</th>
                        <th width="15%" style="background-color: darkgrey; color: white;">Client</th>
                        <th width="18%" style="background-color: darkgrey; color: white;">Project Description</th>
                        <th width="18%" style="background-color: darkgrey; color: white;">Scope of Work</th>
                        <th width="13%" style="background-color: darkgrey; color: white;">Source of Activity</th>
                        <th width="9%" style="background-color: darkgrey; color: white;">Project Value (RM)</th>
                    </tr>
                    <tr nobr="true" style="font-style: italic;">
                        <td style="text-align: center;">1</td>
                        <td>CEMS Installation Kilang Getah</td>
                        <td style="text-align: center;">2012</td>
                        <td>Kilang Getah Nipah</td>
                        <td>Install and maintain CEMS</td>
                        <td>Install and maintain CEMS</td>
                        <td>Fuel Burning Equipment</td>
                        <td style="text-align: right;">2,500,000</td>
                    </tr>     
                </table> 
                <br/><br pagebreak="true"/><br/>   
                <table border="0.8" cellpadding="4" width="100%" nobr="true">
                    <tr>
                        <th style="background-color: black; color: white; font-size: 11" colspan="4"><b>5. SECTION E - DECLARATION</b></th>
                    </tr>  
                    <tr nobr="true">
                        <td width="20%">Declaration</td>
                        <td width="80%" colspan="3">
                            <img src="../img/chk_checked.jpg" height="10" width="10"> <i>I / We hereby declare that all the information furnished in this form and any annexure(s) that comes with it are true, accurate, complete and up-to-date in all respect.</i> <br/><br/>
                            <img src="../img/chk_checked.jpg" height="10" width="10"> <i>I / We authorize the Malaysian Department of Environment to publish the following informaion in the Department\'s website at http://www.doe.gov.my. </i> <br/>
                            <i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- Information furnished in the application form.</i><br/>
                            <i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- Details Information of Analyzers, Equipment and Employee Working Experience.</i><br/>
                            <i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- Details Information of Personnel for CEMS.</i><br/>
                            <i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- Details Information of DIS Software.</i><br/>
                        </td>
                    </tr> 
                    <tr nobr="true">
                        <td width="20%">Name</td>
                        <td width="30%"><i>Muhammad Ali Shaharil</i></td>
                        <td width="20%">NRIC No</td>
                        <td width="30%"><i>823309092221</i></td>
                    </tr>    
                    <tr nobr="true">
                        <td width="20%">Position</td>
                        <td width="30%"><i>System Engineer</i></td>
                        <td width="20%">Date</td>
                        <td width="30%"><i>15/4/2018</i></td>
                    </tr>    
                </table>     
                </br>
                <div style="font-style: italic;">* This is a computer generated document. No signature is required.</div>';
            $environment = $config['environment']; 
            $filename = '';
            $pdf->writeHTML($content, true, false, true, false, '');       
//            $folder_code = floor(intval($eval_id)/1000);
//            $folder = '../pdf/evaluation_form/'.$folder_code;
//            $this->log_debug(__FUNCTION__, __LINE__, 'Folder to save pdf : '.$folder);
//            $result = $this->folder_exist($folder);
//            if (!$result)
//                mkdir ($folder,0777, true); 
//            if ($environment == 'windows') {
//                $filename = '\evaluation_form\\'.$folder_code.'\evaluation_'.(10000+intval($eval_id)).'_'.time().'.pdf';
//            } else {
//                $filename = '/evaluation_form/'.$folder_code.'/evaluation_'.(10000+intval($eval_id)).'_'.time().'.pdf';
//            }
//            $filename_src = '/evaluation_form/'.$folder_code.'/evaluation_'.(10000+intval($eval_id)).'_'.time().'.pdf';
//            Class_db::getInstance()->db_update('vpe_evaluation', array('eval_pdf'=>$filename, 'eval_pdf_src'=>$filename_src), array('eval_id'=>$eval_id));
//            $pdf->Output(dirname(__FILE__). $filename, 'F');
            $pdf->Output(dirname(__FILE__). '\test.pdf', 'F');
            return $filename;
        }
        catch(Exception $e) {
            error_log(date("Y/m/d h:i:sa")." [".__FILE__.":".__LINE__."] - ".$e->getMessage()."\r\n", 3, '../logs/error/error_'.date("Ymd").'.log');
            throw new Exception($this->get_exception('4001', __FUNCTION__, __LINE__, $e->getMessage()), $e->getCode());
        }
    }
    
}
