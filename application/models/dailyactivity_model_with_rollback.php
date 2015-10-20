<?php

class dailyactivity_model extends CI_Model
{
	public $country_id = null;
	public $i, $j;
	public $reporting_user = array();
	public $reporting_user_id = array();
	public $user_list_id;
	public $reportingid;
	public $user_report_id;
	
	function __construct()
	{
		$this->load->library('form_validation');
		$this->load->helper('url');
		$this->load->database();
		$db_dc=$this->load->database('forms', TRUE);
		$this->load->helper('language');
	  	$this->load->library('subquery');
		$this->load->library('session');
    
	}

	
	function getactivity_data_all()
	{

		@$get_assign_to_user_id=$this->session->userdata['get_assign_to_user_id'];

			$jTableResult = array();
			 $sql = "SELECT distinct d.id,d.currentdate :: date,d.creationdate :: date,d.execode,d.exename,d.branch from vw_web_daily_activity d  order by id desc";
			//$sql="SELECT distinct d.id,d.currentdate :: date ,d.execode,d.exename from vw_web_daily_activity d  where user_id=302 order by id desc";

			$result = $this->db->query($sql);
			$activitydetails = $result->result_array();
			$all_record_count = count($activitydetails);
			$this->session->set_userdata('all_record_count',$all_record_count);
			$data = array();
				
				$i=0;
				while($i < count($activitydetails))
				{    
					$row = array();
					$row["id"] = $activitydetails[$i]["id"];
					$row["currentdate"] = $activitydetails[$i]["currentdate"];
					$row["execode"] = $activitydetails[$i]["execode"];
					$row["exename"] = $activitydetails[$i]["exename"];
					$row["branch"] = $activitydetails[$i]["branch"];
					$row["creationdate"] = $activitydetails[$i]["creationdate"];
/*
					$row["subactivity"] = $activitydetails[$i]["subactivity"];
					$row["hour_s"] = $activitydetails[$i]["hour_s"];
					$row["modeofcontact"] = $activitydetails[$i]["modeofcontact"];
					$row["Quantity"] = $activitydetails[$i]["Quantity"];
					$row["Division"] = $activitydetails[$i]["Division"]);
					$row["Date"] = substr($activitydetails[$i]["Date"],0,-8);
					$row["Remarks"] = $activitydetails[$i]["Remarks"];
					$row["L1Status"] = $activitydetails[$i]["L1Status"];
					$row["Complaints"] = $activitydetails[$i]["Complaints"];

*/
/*
					$date_cr = new DateTime($row["created_date"]);
				  $row["created_date"]= $date_cr->format('d-M-Y'); 
	
					$row["modified_date"] = substr($jTableResult['leaddetails'][$i]["last_modified"],0,-8);
			//		$date_mf = new DateTime($row["modified_date"]);
			//		$row["modified_date"] = $date_mf->format('d-M-Y');
					if($row["modified_date"] =="")
					{ 
						  $row["modified_date"] = substr($jTableResult['leaddetails'][$i]["createddate"],0,-8);
						  $date_mf = new DateTime($row["created_date"]);
					    $row["modified_date"] = $date_mf->format('d-M-Y');
					}
					else
					{
						  $row["modified_date"] = substr($jTableResult['leaddetails'][$i]["last_modified"],0,-8);
							$date_mf = new DateTime($row["modified_date"]);
					  $row["modified_date"] = $date_mf->format('d-M-Y');
					}
*/
					$data[$i] = $row;
					$i++;
				}
		//		$arr = "{\"data\":" .json_encode($data). "}";
				$arr = json_encode($data);
		//	echo "{ rows: ".$arr." }";
   //    echo $arr; die;
		 	return $arr;
	}

	function getactivity_data($user_id)
	{

		@$get_assign_to_user_id=$this->session->userdata['get_assign_to_user_id'];

			$jTableResult = array();
			 $sql = "SELECT distinct d.id,d.currentdate :: date,d.creationdate :: date,d.execode,d.exename,d.branch from vw_web_daily_activity d  where d.user_id IN(".$get_assign_to_user_id.") OR d.user_id = ".$user_id."  order by id desc";
			 // echo $sql; die;

			//$sql="SELECT distinct d.id,d.currentdate :: date ,d.execode,d.exename from vw_web_daily_activity d  where user_id=302 order by id desc";

			$result = $this->db->query($sql);
			$activitydetails = $result->result_array();
			$all_record_count = count($activitydetails);
			$this->session->set_userdata('all_record_count',$all_record_count);
			$data = array();
				
				$i=0;
				while($i < count($activitydetails))
				{    
					$row = array();
					$row["id"] = $activitydetails[$i]["id"];
					$row["currentdate"] = $activitydetails[$i]["currentdate"];
					$row["execode"] = $activitydetails[$i]["execode"];
					$row["exename"] = $activitydetails[$i]["exename"];
					$row["branch"] = $activitydetails[$i]["branch"];
					$row["creationdate"] = $activitydetails[$i]["creationdate"];
/*
					$row["subactivity"] = $activitydetails[$i]["subactivity"];
					$row["hour_s"] = $activitydetails[$i]["hour_s"];
					$row["modeofcontact"] = $activitydetails[$i]["modeofcontact"];
					$row["Quantity"] = $activitydetails[$i]["Quantity"];
					$row["Division"] = $activitydetails[$i]["Division"]);
					$row["Date"] = substr($activitydetails[$i]["Date"],0,-8);
					$row["Remarks"] = $activitydetails[$i]["Remarks"];
					$row["L1Status"] = $activitydetails[$i]["L1Status"];
					$row["Complaints"] = $activitydetails[$i]["Complaints"];

*/
/*
					$date_cr = new DateTime($row["created_date"]);
				  $row["created_date"]= $date_cr->format('d-M-Y'); 
	
					$row["modified_date"] = substr($jTableResult['leaddetails'][$i]["last_modified"],0,-8);
			//		$date_mf = new DateTime($row["modified_date"]);
			//		$row["modified_date"] = $date_mf->format('d-M-Y');
					if($row["modified_date"] =="")
					{ 
						  $row["modified_date"] = substr($jTableResult['leaddetails'][$i]["createddate"],0,-8);
						  $date_mf = new DateTime($row["created_date"]);
					    $row["modified_date"] = $date_mf->format('d-M-Y');
					}
					else
					{
						  $row["modified_date"] = substr($jTableResult['leaddetails'][$i]["last_modified"],0,-8);
							$date_mf = new DateTime($row["modified_date"]);
					  $row["modified_date"] = $date_mf->format('d-M-Y');
					}
*/
					$data[$i] = $row;
					$i++;
				}
		//		$arr = "{\"data\":" .json_encode($data). "}";
				$arr = json_encode($data);
		//	echo "{ rows: ".$arr." }";
   //    echo $arr; die;
		 	return $arr;
	}


			function geteditdata($id)
			{
				$sql = "SELECT custgroup,itemgroup,potentialqty,subactivity,hour_s,minit,modeofcontact,quantity,division,Date,
							Remarks,L1Status,Complaints from vw_web_daily_activity d  where id=".$id."order by id";

				$result = $this->db->query($sql);
				$activitydetails = $result->result_array();
				$all_record_count = count($activitydetails);
				$this->session->set_userdata('all_record_count',$all_record_count);

				$data = array();
				
				$i=0;
				while($i < count($activitydetails))
				{    
					$row = array();
					$row["custgroup"] = $activitydetails[$i]["custgroup"];
					$row["itemgroup"] = $activitydetails[$i]["itemgroup"];
					$row["potentialqty"] = $activitydetails[$i]["potentialqty"];
					$row["subactivity"] = $activitydetails[$i]["subactivity"];

					$row["hour_s"] = $activitydetails[$i]["hour_s"];
					$row["minit"] = $activitydetails[$i]["minit"];
					$row["modeofcontact"] = $activitydetails[$i]["modeofcontact"];
					$row["quantity"] = $activitydetails[$i]["quantity"];

					$row["division"] = $activitydetails[$i]["division"];
					$row["Date"] = $activitydetails[$i]["date"];
					$row["Remarks"] = $activitydetails[$i]["remarks"];
					$row["L1Status"] = $activitydetails[$i]["l1status"];
					$row["Complaints"] = $activitydetails[$i]["complaints"];
				

					$data[$i] = $row;

					$i++;
				}
				$arr = json_encode($data);
				return $arr;
//				echo $arr;

			}

			function getactivity_data_column()
			{

				$jTableResult = array();


				//$sql = "SELECT id FROM dailyactivitydtl where id ='".$this->session->userdata['loginname']."'";
				//$sql="select lower(dtl_fld) as datafield, lower(dlblch) as text,cellwidth  :: INTEGER*10 AS  width   from formdtl where formcode='SMKT140' and cellwidth>'0' order by seqno";
				$sql="select lower(dtl_fld) as datafield, lower(dlblch) as text,cellwidth  :: INTEGER*10 AS  width   from formdtl where formcode='SMKT140' and cellwidth>'0'  
					UNION 
					SELECT unnest(string_to_array('noofleads,result_type,leadid' , ','))  as datafield,  unnest(string_to_array('noofleads,result_type,leadid' , ',')), unnest(string_to_array('60,100,60' , ',')) ::integer*10";


				$db_dc= $this->load->database('forms', TRUE);
			//	$db2->query($sql);
				$result = $db_dc->query($sql);
				$activitydetails = $result->result_array();
				$all_record_count = count($activitydetails);
				$this->session->set_userdata('all_record_count',$all_record_count);
									
            //  echo"count ".$all_record_count; print_r($activitydetails); die; 


				$data = array();
				
				$i=0;
				while($i < count($activitydetails))
				{    
					$row = array();
					$row["text"] = $activitydetails[$i]["text"];
					$row["datafield"] = $activitydetails[$i]["datafield"];
					$row["width"] = $activitydetails[$i]["width"];
					$data[$i] = $row;
					$i++;
				}
		//		$arr = "{\"data\":" .json_encode($data). "}";
				$data ='{ "columns": '.json_encode($data).'}';
//				$data =json_encode($data);
				$arr = $data;
		//	echo "{ rows: ".$arr." }";
   //    echo $arr; die;
		 		return $arr;
	}



		/*	function getactivity_data_row($header_id)
			{

				$jTableResult = array();


				 $sql="SELECT id,custgroup,exename,branch,itemgroup,potentialqty,subactivity,modeofcontact,hour_s,minit,quantity,division,date,remarks,l1status,complaints, user_id from vw_web_daily_activity d where id ='".$header_id."'";


				$result = $this->db->query($sql);
				$activitydetails = $result->result_array();
				$all_record_count = count($activitydetails);
				$this->session->set_userdata('all_record_count',$all_record_count);

				//  echo"count ".$all_record_count; print_r($activitydetails); die; 


				$data = array();
				
				$i=0;
				while($i < count($activitydetails))
				{    
					$row = array();
				//	$row["id"] = $activitydetails[$i]["id"];
					$row["custgroup"] = $activitydetails[$i]["custgroup"];
					$row["itemgroup"] = $activitydetails[$i]["itemgroup"];
					$row["potentialqty"] = $activitydetails[$i]["potentialqty"];
					$row["subactivity"] = $activitydetails[$i]["subactivity"];
					$row["exename"] = $activitydetails[$i]["exename"];
					$row["branch"] = $activitydetails[$i]["branch"];
					$row["modeofcontact"] = $activitydetails[$i]["modeofcontact"];
					$row["hour_s"] = $activitydetails[$i]["hour_s"];
					$row["minit"] = $activitydetails[$i]["minit"];
					$row["quantity"] = $activitydetails[$i]["quantity"];
					$row["division"] = $activitydetails[$i]["division"];
					$row["date"] = $activitydetails[$i]["date"];
					$row["remarks"] = $activitydetails[$i]["remarks"];
					$row["l1status"] = $activitydetails[$i]["l1status"];
					$row["complaints"] = $activitydetails[$i]["complaints"];


					$data[$i] = $row;
					$i++;
				}
		//		$arr = "{\"data\":" .json_encode($data). "}";
				$data ='{ "rows": '.json_encode($data).'}';
//				$data =json_encode($data);
				$arr = $data;
		//	echo "{ rows: ".$arr." }";
   //    echo $arr; die;
		 	return $arr;
	}*/

		function getactivity_data_row($header_id)
			{

				$jTableResult = array();


				 /*$sql="SELECT id,custgroup,exename,branch,itemgroup,potentialqty,subactivity,modeofcontact,hour_s,minit,quantity,division,date,remarks,l1status,complaints, user_id,leadid,'leads/viewleaddetails/'||leadid as link,
				 				CASE WHEN COALESCE (leadid,0) ='0'  THEN 'Value'  ELSE 'Select' END result_type 
				 				from vw_web_daily_activity d where id ='".$header_id."'";*/
				 $sql="SELECT id,custgroup,exename,branch,itemgroup,potentialqty,subactivity,modeofcontact,hour_s,minit,quantity,division,date,remarks,l1status,complaints, user_id,leadid
				 				from vw_web_daily_activity d where id ='".$header_id."'";


				$result = $this->db->query($sql);
				$activitydetails = $result->result_array();
				$all_record_count = count($activitydetails);
				$this->session->set_userdata('all_record_count',$all_record_count);

				//  echo"count ".$all_record_count; print_r($activitydetails); die; 


				$data = array();
				
				$i=0;
				while($i < count($activitydetails))
				{    
					$row = array();
				//	$row["id"] = $activitydetails[$i]["id"];
					$row["custgroup"] = $activitydetails[$i]["custgroup"];
					$row["itemgroup"] = $activitydetails[$i]["itemgroup"];
					$row["potentialqty"] = $activitydetails[$i]["potentialqty"];
					$row["subactivity"] = $activitydetails[$i]["subactivity"];
					$row["exename"] = $activitydetails[$i]["exename"];
					$row["branch"] = $activitydetails[$i]["branch"];
					$row["modeofcontact"] = $activitydetails[$i]["modeofcontact"];
					$row["hour_s"] = $activitydetails[$i]["hour_s"];
					$row["minit"] = $activitydetails[$i]["minit"];
					$row["quantity"] = $activitydetails[$i]["quantity"];
					$row["division"] = $activitydetails[$i]["division"];
					$row["date"] = $activitydetails[$i]["date"];
					$row["remarks"] = $activitydetails[$i]["remarks"];
					$row["l1status"] = $activitydetails[$i]["l1status"];
					if($activitydetails[$i]["leadid"]==0)
					{
					$row["leadid"] = "No Leads";	
					}
					
				//	$row["result_type"] = $activitydetails[$i]["result_type"];
					$row["complaints"] = $activitydetails[$i]["complaints"];
				//	$row["link"] = $activitydetails[$i]["link"];
					$data[$i] = $row;
					$i++;
				}
		//		$arr = "{\"data\":" .json_encode($data). "}";
				$data ='{ "rows": '.json_encode($data).'}';
//				$data =json_encode($data);
				$arr = $data;
		//	echo "{ rows: ".$arr." }";
   //    echo $arr; die;
		 	return $arr;
	}
			function get_products($sql)
			{
				//$sql='SELECT  DISTINCT  itemgroup FROM itemmaster ORDER BY description asc';
				$result = $this->db->query($sql);
				$arr =  json_encode($result->result_array());
				$arr =	 '{ "rows" :'.$arr.' }';
				return $arr;
			}
			function get_customers($sql)
			{
				//$sql='SELECT  DISTINCT  itemgroup FROM itemmaster ORDER BY description asc';
				$result = $this->db->query($sql);
				$arr =  json_encode($result->result_array());
				$arr =	 '{ "rows" :'.$arr.' }';
				return $arr;
			}


			function get_field()
			{
				$result = $this->db->list_fields('itemmaster');
				foreach($result as $field)
				{
					$data[] = $field;
					return $data;
				}
			}
			function GetMaxVal($table)
			{
				$sql ="select max(id) from ".$table;
				$result = $this->db->query($sql);
				//print_r($result->result_array());
				$daily_hdr_id = $result->result_array();
			//	print_r($daily_hdr_id);
				//echo"max id is ".$daily_hdr_id[0]['max'];
				return $daily_hdr_id[0]['max'];

			}
			function save_dailyactivityhdr($daily_hdr)
			{

				if($this->db->insert('dailyactivityhdr', $daily_hdr))
					return true;
				else
					return false;
        			
			}

			function save_daily_details($dailydtls)
			{
			 foreach($dailydtls as $daliydtl)
				{
				//echo"in model<br>";
				// echo"<pre>";print_r($prod);echo"</pre>";
			//	$this->db->insert_batch('dailyactivitydtll', $dailydtls);
				}
				$this->db->insert_batch('dailyactivitydtl', $dailydtls);
			}

			function save_daily_details_up($dailydtls,$delid)
			{
				$this->db->db_debug = FALSE;
				try {
						$this->db->trans_start();
							$this->db->where('id',$delid);
			              	$this->db->delete('dailyactivitydtl');
							$this->db->insert_batch('dailyactivitydtl', $dailydtls);
						$this->db->trans_complete();
						if ($this->db->trans_status() === FALSE)
						{
						   // echo"Error in DB";
						    return FALSE;
						}
						else
						{
							//echo"Insert completed";
							return TRUE;
						}
					}
				catch (Exception $e) {
					echo"in Rollback condition";
					$this->db->trans_rollback();
					  //log_message('error', sprintf('%s : %s : DB transaction failed. Error no: %s, Error msg:%s, Last query: %s', __CLASS__, __FUNCTION__, $e->getCode(), $e->getMessage(), print_r($this->main_db->last_query(), TRUE)));
					}
			$this->db->db_debug = TRUE; 
			}

	
			function check_dailyhdr_duplicates($hrd_currentdate,$user1)
			{
				$sql ="select exename,id from dailyactivityhdr  where currentdate::Date ='".$hrd_currentdate."' AND user1 ='".$user1."'";
                $result = $this->db->query($sql);
                return  $result->num_rows();
			}

			



			function get_dailyhdr_update_id($hrd_currentdate,$user1)
			{
				$sql =  $this->db->select('id')->from('dailyactivityhdr')->where(array('currentdate' => $hrd_currentdate, 'user1' => $user1))->get();
				//echo $sql->num_rows(); 	die;
				//$sql ="SELECT id FROM dailyactivityhdr WHERE currentdate = '".$hrd_currentdate."' AND user1 = '".$user1."'";
				//echo $sql;
			//	$result = $this->db->query($sql);
				$daily_hdr_id = $sql->result_array();
			//	print_r($daily_hdr_id);
				//echo" id is ".$daily_hdr_id[0]['id'];
				return $daily_hdr_id[0]['id'];
			// return $sql->num_rows();
			}

			function deteled_dailyactivitydtl($dtl_id)
			{
				if(isset($dtl_id) && !empty($dtl_id))
		            {
		              	$this->db->where('id',$dtl_id);
		              	$this->db->delete('dailyactivitydtl');
		              	return  $this->db->affected_rows();	
		          
		           	 }
			}

			function update_dailyactivityhdr($daily_hdr,$daily_hdr_id)
			{

				$this->db->where('id', $daily_hdr_id);
				$this->db->update('dailyactivityhdr', $daily_hdr);
				return ($this->db->affected_rows() > 0);
			}

			function get_potential_item_customer($item,$customer)
			{
	
	//			$customer = urldecode($customer);
	//	        $item = urldecode($item);

					$sql="SELECT 	leaddetails.leadid,leaddetails.leadid as id,sum(lead_prod_potential_types.potential)as potential
						FROM leaddetails 

					INNER JOIN leadproducts ON leaddetails.leadid = leadproducts.leadid 
					INNER JOIN customermasterhdr ON leaddetails.company = customermasterhdr.id 
					INNER JOIN view_tempitemmaster_grp ON view_tempitemmaster_grp.id=leadproducts.productid 
					INNER JOIN lead_prod_potential_types ON lead_prod_potential_types.leadid=leaddetails.leadid 
					WHERE trim(customermasterhdr.customergroup)='".$customer."' AND trim(view_tempitemmaster_grp.itemgroup)='".$item."' AND leaddetails.lead_close_status=0 and converted=0 
					GROUP BY leaddetails.leadid";
				//echo $sql."<br>"; 

				$sql1="SELECT   business_plan_customer_group_id.header_id as custgroup_id,  business_yearly_gc_plan.potential_annual_qty as potential 
				FROM  	business_yearly_gc_plan  
				INNER JOIN business_plan_customer_group_id ON business_yearly_gc_plan.customer_group_id=business_plan_customer_group_id.header_id
				INNER JOIN business_plan_item_group_id ON business_yearly_gc_plan.item_group_id=business_plan_item_group_id.header_id
				WHERE 
					business_plan_customer_group_id.customer_group ='".$customer."' 
					AND business_plan_item_group_id.item_group='".$item."' 
					AND business_yearly_gc_plan.potential_annual_qty >0";
			//	echo $sql1."<br>"; 
				$result = $this->db->query($sql);

			/*	$sql1_old="SELECT leaddetails.leadid,leaddetails.leadid as id FROM leaddetails  
					INNER JOIN leadproducts ON leaddetails.leadid = leadproducts.leadid 
					INNER JOIN customermasterhdr ON leaddetails.company = customermasterhdr.id 
					INNER JOIN view_tempitemmaster_grp ON view_tempitemmaster_grp.id=leadproducts.productid 
					WHERE trim(customermasterhdr.customergroup)='".$customer."' AND trim(view_tempitemmaster_grp.itemgroup)='".$item."' AND leaddetails.lead_close_status=0 and converted=0";*/
 
				$result1 = $this->db->query($sql1);
				$no_of_leads= $result->num_rows();
				
				//echo"<pre>";print_r($result->result_array());echo"</pre>";
				$resutl_arrary =$result->result_array();
				//echo "pontential".$resutl_arrary['0']['potential']."<br>";
				if($result->num_rows()==0)
				{
					$poten_val['0']['potential']=0;
					$poten_val['0']['noofleads']=$no_of_leads;
					$poten_val['0']['result_type']='Value';
				}
				else
				{
					//$poten_val = $result->result_array();
					$poten_val['0']['potential']=$resutl_arrary['0']['potential'];
					$poten_val['0']['noofleads']=$no_of_leads;
					$poten_val['0']['result_type']='Select';

				}
			//	print_r($poten_val);
				$arr =  json_encode($poten_val);
				$arr =	 '{ "rows" :'.$arr.' }';
				//print_r($arr);
				return $arr;
				
			}

			function get_leadids($custgrp,$prodgrp)
			{
					$custgrp = trim(urldecode($custgrp));
			        $prodgrp = trim(urldecode($prodgrp));
					$sql="SELECT leaddetails.leadid,leaddetails.leadid as id FROM leaddetails  
					INNER JOIN leadproducts ON leaddetails.leadid = leadproducts.leadid 
					INNER JOIN customermasterhdr ON leaddetails.company = customermasterhdr.id 
					INNER JOIN view_tempitemmaster_grp ON view_tempitemmaster_grp.id=leadproducts.productid 
					WHERE trim(customermasterhdr.customergroup)='".$custgrp."' AND trim(view_tempitemmaster_grp.itemgroup)='".$prodgrp."' AND leaddetails.lead_close_status=0 and converted=0";
			//	echo $sql; die;
				$result = $this->db->query($sql);
			//	$arr =  json_encode($result->result_array());
				$arr = "{\"leadid\":" .json_encode($result->result_array()). "}";
				return $arr;
			}
			

			//function get_activity($custgrp,$prodgrp)
			function get_activity($leadid)
			{
					//$custgrp = trim(urldecode($custgrp));
			        //$prodgrp = trim(urldecode($prodgrp));
					/*$sql="SELECT leaddetails.leadid,leaddetails.leadid as id FROM leaddetails  
					INNER JOIN leadproducts ON leaddetails.leadid = leadproducts.leadid 
					INNER JOIN customermasterhdr ON leaddetails.company = customermasterhdr.id 
					INNER JOIN view_tempitemmaster_grp ON view_tempitemmaster_grp.id=leadproducts.productid 
					WHERE trim(customermasterhdr.customergroup)='".$custgrp."' AND trim(view_tempitemmaster_grp.itemgroup)='".$prodgrp."' AND leaddetails.lead_close_status=0 and converted=0";*/
					$sql="SELECT leaddetails.leadid,lead_prod_potential_types.product_type_id as id,lead_sale_type.n_value_displayname as lead_sale_type FROM leaddetails 
INNER JOIN leadproducts ON leaddetails.leadid = leadproducts.leadid 
INNER JOIN customermasterhdr ON leaddetails.company = customermasterhdr.id 
INNER JOIN view_tempitemmaster_grp ON view_tempitemmaster_grp.id=leadproducts.productid 
INNER JOIN lead_prod_potential_types ON lead_prod_potential_types.leadid=leaddetails.leadid 
INNER JOIN lead_sale_type ON lead_sale_type.n_value_id = lead_prod_potential_types.product_type_id
WHERE  leaddetails.lead_close_status=0 and converted=0 AND leaddetails.leadid=".$leadid." and lead_prod_potential_types.potential >0";
				//echo $sql; die;
				$result = $this->db->query($sql);
			//	$arr =  json_encode($result->result_array());
				$arr = "{\"rows\":" .json_encode($result->result_array()). "}";
				return $arr;
			}

			function get_lead_potential($leaid)
			{
	

				/*$sql="SELECT sum(lead_prod_potential_types.potential) as potential,leadproducts.quantity as requirement 
				  FROM leaddetails  
						INNER JOIN leadproducts ON leaddetails.leadid = leadproducts.leadid 
						INNER JOIN customermasterhdr ON leaddetails.company = customermasterhdr.id 
						INNER JOIN view_tempitemmaster_grp ON view_tempitemmaster_grp.id=leadproducts.productid 
						INNER JOIN lead_prod_potential_types ON lead_prod_potential_types.leadid=leaddetails.leadid
						WHERE leaddetails.leadid=".$leaid." GROUP BY leadproducts.quantity ";*/

						$sql="SELECT lead_prod_potential_types.potential,leadproducts.quantity as requirement,leaddetails.leadid,lead_prod_potential_types.product_type_id as id,lead_sale_type.n_value_displayname as lead_sale_type, leadsource.leadsource as lead_source_name,leaddetails.email_id
							FROM leaddetails 
							INNER JOIN leadproducts ON leaddetails.leadid = leadproducts.leadid 
							INNER JOIN leadsource ON leaddetails.leadsource = leadsource.leadsourceid
							INNER JOIN customermasterhdr ON leaddetails.company = customermasterhdr.id 
							INNER JOIN view_tempitemmaster_grp ON view_tempitemmaster_grp.id=leadproducts.productid 
							INNER JOIN lead_prod_potential_types ON lead_prod_potential_types.leadid=leaddetails.leadid 
							INNER JOIN lead_sale_type ON lead_sale_type.n_value_id = lead_prod_potential_types.product_type_id
							WHERE  leaddetails.lead_close_status=0 and converted=0 AND leaddetails.leadid=".$leaid." ORDER BY lead_prod_potential_types.potential desc LIMIT 1";
				//echo $sql; die;
				$result = $this->db->query($sql);
				
				if($result->num_rows()==0)
				{
					$poten_val['0']['potential']=0;
					$poten_val['0']['requirement']=0;
					$poten_val['0']['lead_sale_type']=0;
				}
				else
				{
					$poten_val = $result->result_array();
				}

				//print_r($poten_val);
				$arr =  json_encode($poten_val);
				$arr =	 '{ "rows" :'.$arr.' }';
				return $arr;
				
			}

   		function getnull_leadids()
		{

			$sql="SELECT 0 as leadid, 0 as id FROM leaddetails  LIMIT 1";
			//echo $sql; die;
			$result = $this->db->query($sql);
		//	$arr =  json_encode($result->result_array());
			$arr = "{\"leadid\":" .json_encode($result->result_array()). "}";
			return $arr;
		}

		

			

}
?>

