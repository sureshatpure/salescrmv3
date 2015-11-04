<?php

class dailyactivity extends CI_Controller {

    public $data = array();
    public $post = array();
    public $daily_dtl = array();
    public $activitydata = array();
    public $loginuser;
    public $userid;
    public $loginname;
    public $reportingto;
    public $countryid;
    public $stateid;
    public $login_user_id;
    public $daily_hdr_id;
    public $daily_hdr_insert_status;
    public $datagroup = array();
    public $db_dc;

    function __construct() {
        parent::__construct();
        $this->load->library('admin_auth');
        $this->lang->load('admin');
        $this->load->database();
        $this->load->database('forms', TRUE);
        $this->load->helper('url');
        //$this->load->model('Leads_model');
        $this->load->model('dailyactivity_model');
        $this->load->library('subquery');
        $this->load->library('session');
        $this->load->helper('html');
    }

   
    public function index() {
        //print_r($this->session->userdata); 

        @$get_assign_to_user_id = $this->session->userdata['get_assign_to_user_id'];

        if (!$this->admin_auth->logged_in()) {
            //redirect them to the login page
            redirect('admin/login', 'refresh');
        } elseif (!$this->admin_auth->is_admin()) {

            $user = $this->admin_auth->user()->row();
            $allgroups = $this->admin_auth->groups()->result();
            $usergroups = $this->admin_auth->group($this->session->userdata['user_id']);
            $activitydata = array();
            $data = array();
            $activitydata['permission'] = $usergroups->_cache_user_in_group[$this->session->userdata['user_id']];
            $i = 0;
            $datagroup = array();
            foreach ($activitydata['permission'] as $key => $val) {
                $row = array();

                $row["groupid"] = $key;
                $row["groupname"] = $val;
                $datagroup[$i] = $row;
                $i++;
            }

            $arr = json_encode($datagroup);
            $activitydata['grpperm'] = $arr;

            if ($this->session->userdata['reportingto'] == "") {

                $activitydata['data'] = $this->dailyactivity_model->getactivity_data_all();
            } else {
                $activitydata['data'] = $this->dailyactivity_model->getactivity_data($this->session->userdata['user_id']);
            }

            $sql = 'SELECT  DISTINCT  itemgroup FROM itemmaster ORDER BY itemgroup asc';
            $activitydata['dataitemmaster'] = $this->dailyactivity_model->get_products($sql);
            $this->load->view('dailyactivity/viewdailyactivity', $activitydata);
        } else {
            redirect('admin/index', 'refresh');
            //$this->load->view('leads/viewleads',$leaddata);	
        }
    }

    function get_edit_data() {
        $header_id = $this->uri->segment(3);
        $activitydata['datacolumn'] = $this->dailyactivity_model->getactivity_data_column();
        $activitydata['datarow'] = $this->dailyactivity_model->getactivity_data_row($header_id);
        $viewdata = '[' . $activitydata['datacolumn'] . ',' . $activitydata['datarow'] . ']';
        header('Content-Type: application/x-json; charset=utf-8');
        echo $viewdata;
    }

    function get_data_addgrid() {

        $activitydata['datacolumn'] = $this->dailyactivity_model->getactivity_data_column();
        $viewdata = '[' . $activitydata['datacolumn'] . ']';
        header('Content-Type: application/x-json; charset=utf-8');
        echo $viewdata;
    }

    function get_data_itemmaster() {
       
        $sql = 'SELECT  DISTINCT  itemgroup FROM view_tempitemmaster_grp ORDER BY itemgroup asc';
        $activitydata['dataitemmaster'] = $this->dailyactivity_model->get_products($sql);
        $viewdata = $activitydata['dataitemmaster'];
        header('Content-Type: application/x-json; charset=utf-8');
        echo $viewdata;
    }
     function get_data_customermaster() {

        //$sql='SELECT  distinct on (view_tempcustomermaster.tempcustname) view_tempcustomermaster.id,view_tempcustomermaster.tempcustname FROM     view_tempcustomermaster ORDER BY  tempcustname ASC';

        $sql = "SELECT distinct  replace(customergroup,'''','')   as customergroup FROM customermasterhdr order by customergroup";
       
        $activitydata['datacustomermaster'] = $this->dailyactivity_model->get_customers($sql);
        $viewdata = $activitydata['datacustomermaster'];
        header('Content-Type: application/x-json; charset=utf-8');
        echo $viewdata;
    }

     function get_data_customermaster_coll($collector) {

        //$sql='SELECT  distinct on (view_tempcustomermaster.tempcustname) view_tempcustomermaster.id,view_tempcustomermaster.tempcustname FROM     view_tempcustomermaster ORDER BY  tempcustname ASC';
        $collector = urldecode($collector);
        /* $sql = "SELECT distinct  replace(customergroup,'''','')   as customergroup,id  FROM customermasterhdr WHERE 
        collector ='".$collector."' or collector is NULL order by customergroup";*/
/*        $sql = "SELECT distinct  replace(customergroup,'''','')   as customergroup FROM customermasterhdr WHERE 
        collector ='".$collector."' or collector is NULL order by customergroup";*/

        $sql = "SELECT min(id) as id,replace(customergroup,'''','')   as customergroup FROM customermasterhdr WHERE    collector ='".$collector."' or collector is NULL    GROUP BY customergroup order by customergroup";

       //echo $sql; die;
        $activitydata['datacustomermaster'] = $this->dailyactivity_model->get_customers($sql);
        $viewdata = $activitydata['datacustomermaster'];
        header('Content-Type: application/x-json; charset=utf-8');
        echo $viewdata;
    }

    function get_potentialquantity() {
        $item = html_entity_decode($this->uri->segment(4));
        $customer = html_entity_decode($this->uri->segment(3));
        $activitydata['potential_quantity'] = $this->dailyactivity_model->get_potential_item_customer($item, $customer);
        $viewdata = $activitydata['potential_quantity'];
        echo $viewdata;
    }

    function get_leadpotential($leadid) {

        $activitydata['potential_quantity'] = $this->dailyactivity_model->get_lead_potential($leadid);
        $viewdata = $activitydata['potential_quantity'];
        echo $viewdata;
    }

   

    public function index1() {
        if (!$this->admin_auth->logged_in()) {
            //redirect them to the login page
            redirect('admin/login', 'refresh');
        } elseif (!$this->admin_auth->is_admin()) {

            $user = $this->admin_auth->user()->row();
            $allgroups = $this->admin_auth->groups()->result();
            $usergroups = $this->admin_auth->group($this->session->userdata['user_id']);
            $activitydata = array();

            $data = array();
            
            $leaddata['permission'] = $usergroups->_cache_user_in_group[$this->session->userdata['user_id']];
            $i = 0;
            $datagroup = array();
            foreach ($leaddata['permission'] as $key => $val) {
                $row = array();

                $row["groupid"] = $key;
                $row["groupname"] = $val;
                $datagroup[$i] = $row;
                $i++;
            }

            $arr = json_encode($datagroup);
            $leaddata['grpperm'] = $arr;
            //  $this->load->view('leads/viewleadsnew',$leaddata);	
            $activitydata['datarow'] = $this->dailyactivity_model->getactivity_data_row();
            $activitydata['datacolumn'] = $this->dailyactivity_model->getactivity_data_column();

            

            $this->load->view('dailyactivity/viewdailyactivity1', $activitydata);
        } else {
            redirect('admin/index', 'refresh');
            //$this->load->view('leads/viewleads',$leaddata);	
        }
    }

    function additemmaster() {
        $createddate = date('Y-m-d:H:i:s');
        $lastupdatedate = date('Y-m-d:H:i:s');
        $creationuser = $this->session->userdata['identity'];
        $lastupdateuser = "";
        $execode = $this->session->userdata['empcode'];
        $exename = $this->session->userdata['identity'];
        $user1 = $this->session->userdata['loginname'];
       
        //echo "current_date ".$_POST[0]['currentdate'];
        $hrd_currentdate = $_POST[0]['currentdate'];
        $grid_data = array_slice($_POST, 1, null, true);
        echo"<pre>";print_r($grid_data);echo"</pre>"; die;
        $check_duplicates = $this->dailyactivity_model->check_dailyhdr_duplicates($hrd_currentdate, $user1);
        //  echo $check_duplicates; die;
        if ($check_duplicates == 0) {
            if ($_POST['save'] == 'true') {

                $daily_hdr_id = $this->dailyactivity_model->GetMaxVal('dailyactivityhdr');
                $daily_hdr_id = $daily_hdr_id + 1;
                $daily_hdr = array('id' => $daily_hdr_id,
                    'currentdate' => $hrd_currentdate,
                    'execode' => $execode,
                    'exename' => $exename,
                    'companycode' => 'PPC',
                    'accperiod' => '2013-2014',
                    'user1' => $user1,
                    'creationuser' => $creationuser,
                    'creationdate' => $createddate,
                    'lastupdateuser' => $lastupdateuser
                    );
                
                $daily_hdr_insert_status = $this->dailyactivity_model->save_dailyactivityhdr($daily_hdr);
                

                foreach ($grid_data as $key => $val) {
                    if ($val['potentialqty'] == "" || $val['potentialqty'] == 'undefined') {
                        $val['potentialqty'] = 0;
                    }
                    if ($val['itemgroup'] == "" || $val['itemgroup'] == 'undefined') {
                        $val['itemgroup'] = 0;
                    }
                    if ($val['Remarks'] == "" || $val['Remarks'] == 'undefined') {
                        $val['Remarks'] = 0;
                    }
                    if ($val['quantity'] == "" || $val['quantity'] == 'undefined') {
                        $val['quantity'] = 0;
                    }
                    if ($val['leadid'] == "" || $val['leadid'] == 'undefined' || $val['leadid']=='No Leads') {
                        $val['leadid'] = 0;
                    }

                    $daily_dtl[$key]['id'] = $daily_hdr_id;
                    $daily_dtl[$key]['itemgroup'] = $val['itemgroup'];
                    $daily_dtl[$key]['custgroup'] = $val['custgroup'];
                    $daily_dtl[$key]['leadid'] = $val['leadid'];
                    $daily_dtl[$key]['potentialqty'] = $val['potentialqty'];
                    $daily_dtl[$key]['subactivity'] = $val['subactivity'];
                    $daily_dtl[$key]['hour_s'] = $val['hour_s'];
                    $daily_dtl[$key]['minit'] = $val['minit'];
                    $daily_dtl[$key]['modeofcontact'] = $val['modeofcontact'];
                    $daily_dtl[$key]['quantity'] = $val['quantity'];
                    $daily_dtl[$key]['division'] = $val['division'];
                   
                    $daily_dtl[$key]['remarks'] = $val['Remarks'];
                    $daily_dtl[$key]['creationdate'] = date('Y-m-d:H:i:s');
                    $daily_dtl[$key]['creationuser'] = $creationuser;

                }


                if ($daily_hdr_insert_status) {
                    //	 print_r($daily_dtl);

                    $daily_dlt_id = $this->dailyactivity_model->save_daily_details($daily_dtl);
                }
            }
            //	$message = "Daily Activity Created Successfully";
            $message = "true";
        } else {
            // echo "duplicate exists";	
            $message = "Entry already exists for the date " . $hrd_currentdate;

        }
        header('Content-Type: application/x-json; charset=utf-8');
        echo $message;

        //$this->session->set_flashdata('message', "Daily Activity Created Successfully");
        //redirect('dailyactivity');
    }

    function updateitemmaster() {
        //	print_r($_POST); 
        $createddate = date('Y-m-d:H:i:s');
        $lastupdatedate = date('Y-m-d:H:i:s');
        $creationuser = $this->session->userdata['identity'];
        $lastupdateuser = $this->session->userdata['identity'];
        $execode = $this->session->userdata['empcode'];
        $exename = $this->session->userdata['identity'];
        $user1 = $this->session->userdata['loginname'];
        $hrd_currentdate = $_POST[0]['currentdate'];
        $hdn_hdr_id = $_POST[0]['hdn_hdr_id'];

        $grid_data = array_slice($_POST, 1, null, true);
        $get_update_id = $hdn_hdr_id;

            if ($_POST['update'] == 'true') {

                $daily_hdr_id = $get_update_id;
                $daily_hdr = array('id' => $daily_hdr_id,
                    'currentdate' => $hrd_currentdate,
                    'execode' => $execode,
                    'exename' => $exename,
                    'companycode' => 'PPC',
                    'accperiod' => '2015-2016',
                    'user1' => $user1,
                    'lastupdateuser' => $lastupdateuser,
                    'lastupdatedate' => $lastupdatedate
                );
                $daily_hdr_update_status = $this->dailyactivity_model->update_dailyactivityhdr($daily_hdr, $daily_hdr_id);

                foreach ($grid_data as $key => $val) {
                    if ($val['potentialqty'] == "" || $val['potentialqty'] == 'undefined') {
                        $val['potentialqty'] = 0;
                    }

                    if ($val['itemgroup'] == "" || $val['itemgroup'] == 'undefined') {
                        $val['itemgroup'] = 0;
                    }
                    if ($val['Remarks'] == "" || $val['Remarks'] == 'undefined') {
                        $val['Remarks'] = 0;
                    }
                    if ($val['quantity'] == "" || $val['quantity'] == 'undefined') {
                        $val['quantity'] = 0;
                    }
                      if ($val['leadid'] == "" || $val['leadid'] == 'undefined' || $val['leadid']=='No Leads') {
                        $val['leadid'] = 0;
                    }
                    $daily_dtl[$key]['id'] = $daily_hdr_id;
                   
                    $daily_dtl[$key]['itemgroup'] = $val['itemgroup'];
                    $daily_dtl[$key]['leadid'] = $val['leadid'];
                    $daily_dtl[$key]['custgroup'] = $val['custgroup'];
                    $daily_dtl[$key]['potentialqty'] = $val['potentialqty'];
                    $daily_dtl[$key]['subactivity'] = $val['subactivity'];
                    $daily_dtl[$key]['hour_s'] = $val['hour_s'];
                    $daily_dtl[$key]['minit'] = $val['minit'];
                    $daily_dtl[$key]['modeofcontact'] = $val['modeofcontact'];
                    $daily_dtl[$key]['quantity'] = $val['quantity'];
                    $daily_dtl[$key]['division'] = $val['division'];
                    $daily_dtl[$key]['remarks'] = $val['Remarks'];
                    $daily_dtl[$key]['lastupdatedate'] = date('Y-m-d:H:i:s');
                    $daily_dtl[$key]['lastupdateuser'] = $creationuser;

                }


                if ($daily_hdr_update_status) {

                    $daily_dlt_id = $this->dailyactivity_model->save_daily_details_up($daily_dtl,$get_update_id);
                }
                if($daily_dlt_id)
                {
                    $message = "true";
                }
                else
                {
                    $message = "Error in Updating Records"; 
                    $this->db->db_debug = TRUE; 
                }
            }
            
        header('Content-Type: application/x-json; charset=utf-8');
        echo $message;
    }

    function getnullleadids()
    {
        $data = array();
        $data = $this->dailyactivity_model->getnull_leadids();
        print_r($data);
    }

    function getleadids($customergroup,$prodgroup)
    {

        $customergroup=html_entity_decode($customergroup);
        $prodgroup=html_entity_decode($prodgroup);
        $data = array();
        $data = $this->dailyactivity_model->get_leadids($customergroup,$prodgroup);
        print_r($data);
    }
    
    function getactivity($leaid)
    {
        $data = array();
        $data = $this->dailyactivity_model->get_activity($leaid);
        print_r($data);
    }

     function getcollectors()
    {
       // $data['optionscollector'] = $this->Leads_model->get_collectors($this->session->userdata['get_assign_to_user_id']);
        $data = array();
        $data = $this->dailyactivity_model->get_collectors($this->session->userdata['get_assign_to_user_id']);
        print_r($data);
    }
  

    function checkentrydate($hrd_currentdate){
     $user1 = $this->session->userdata['loginname'];
     $exename = $this->session->userdata['identity'];
     $check_duplicates = $this->dailyactivity_model->check_dailyhdr_duplicates($hrd_currentdate, $user1);
        //  echo $check_duplicates; die;
        if ($check_duplicates == 0)
        {
                $message = "true";   
        }
        else{
            
             // echo "duplicate exists";    
            $message = "Entry already exists for the date " . $hrd_currentdate;
        }
        header('Content-Type: application/x-json; charset=utf-8');
        echo $message;
      }  

      function tutortial1()
      {
        $this->load->view('dailyactivity/tutorial1');
      }

       function leadreassign()
      {
        $this->load->view('dailyactivity/tutorial2');
      }

      function newfeatures()
      {
         $this->load->view('dailyactivity/newfeatures');
      }
      function findyourleads()
      {
         $this->load->view('dailyactivity/findyourleads');
      }
/* functions added for merging start*/
    function getldstatus()
    {
        $data = array();
        $data = $this->dailyactivity_model->get_ldstatus();
        print_r($data);
    }

    function getldsubstatus()
    {

        $data = array();
        $data = $this->dailyactivity_model->get_ldsubstatus();
        print_r($data);
    }

    function getldsubstatusbyname($statusname)
    {
        $lead_status_id = $this->dailyactivity_model->GetLeadStatusid($statusname); 
        $data = array();
        $data = $this->dailyactivity_model->get_ldsubstatus_byid($lead_status_id);
        print_r($data);
    }

    function getldsubstatusbynameid($statusname,$leadid)
    {
        $lead_status_id = $this->dailyactivity_model->GetLeadStatusid($statusname);
        $data = array();
        $data = $this->dailyactivity_model->get_ldsubstatus_byleadid($lead_status_id,$leadid);
        print_r($data);
    }
    function getldsubstatusbynameid_update($substatusname,$leadid)
    {
        $lead_status_id = $this->dailyactivity_model->GetLeadStatusid_update($substatusname);
        $data = array();
        $data = $this->dailyactivity_model->get_ldsubstatus_byleadid_update($lead_status_id,$leadid);
        print_r($data);
    }

    function getldsubstatusforlead($leadid)
    {

        $lead_status_id = $this->dailyactivity_model->get_ldsubstatusforlead($leadid);
        $subts_id=$lead_status_id['substatusid'];
        $status_id=$lead_status_id['status_id'];
        $order_id=$lead_status_id['order_id'];
        $data = array();
        $data = $this->dailyactivity_model->get_ldsubstatus_for_lead($subts_id,$status_id,$order_id);
        print_r($data);
    }
   
   

    function getldstatusbyid($leadid) {

        $activitydata['lead_status'] = $this->dailyactivity_model->get_ldstatusbyid($leadid);
        $viewdata = $activitydata['lead_status'];
        echo $viewdata;
    }
    function getldstatusfor($leadid) {

        $activitydata['lead_status'] = $this->dailyactivity_model->get_ldstatusfor($leadid);
        $viewdata = $activitydata['lead_status'];
        echo $viewdata;
    }

    function checkduplicate_product($prodgrp, $customergroup) {

            $leaddata1['response'] = $this->dailyactivity_model->check_prodgroup_dup_saleorder($prodgrp, $customergroup);
        
            if($leaddata1['response']=='false')
            {
                $response = array(
               'ok' => false,
                'msg' => "<font color=red>This product group has been already billed for this customer</font>");
            }
            else
            {
               $response = array(
               'ok' => true,
                'msg' => "<font color=green> A lead will be created </font>");  
            }
            
        

        echo json_encode($response);

    }

   
}

?>
