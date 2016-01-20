<?php
// Include the PHPMailer class
$message="";
$footer_content="";
$base_url="http://".$_SERVER['SERVER_NAME'].'/';

include('phpmailer/class.phpmailer.php');
$logo = 'http://www.pure-chemical.com/assets/images/logo/logo.png';

$subject="testing email from smtp";
$message_content="Welcome to email templating";

// do your database query
 include_once("db/config.php");
           // $conn = pg_connect("host=localhost port=5432 dbname=puredata user=postgres password=postgres123");
            if (!$conn)
            {
                die ("Not able to connect to PostGres --> " . pg_last_error($conn));
            }
            else
            {
            	$date = date ('Y-m-j G:i:s');
                $format='Y-m-d';
            	$week_start = date ( $format, strtotime ('-6 day'.$date));  
            	$week_end = date ( $format, strtotime ('0 day'.$date));  
                 $sql= "SELECT 
								d.rpsc_line_id,
								h.dac_custgroupname,
								h.dac_prodgroupname,
								d.rpsc_salecat_name,
								d.rpsc_salecate_id,
								d.rpsc_rev_potential,
								d.rpsc_prev_potential,
								d.rpsc_mail_status,
								d.rpsc_created_username,
								d.rpsc_created_date,
								d.rpsc_updated_username,
								d.rpsc_updated_date,
								d.rpsc_created_date::DATE as dated

								FROM
								dactivity_revised_pot h,
								dactivity_revised_pot_salecategory d 

								WHERE 
								 h.dac_poten_id=d.dactivity_revised_potid
								AND rpsc_mail_status='No'
								
								AND  d.rpsc_updated_date::DATE BETWEEN '".$week_start."' AND  '".$week_end."' order by 1";

               

		 //echo $sql; die;
                $result = pg_query($conn, $sql);
                $rows = pg_num_rows($result);
                //$customerdetails = pg_fetch_array($result, 0, PGSQL_NUM);


                     $to_address = array();
                      $i=0;
               
                    	//Replace the codetags with the message contents
                    	
                    
					//$view_leaddetails ="<a href='".$base_url."salescrm/leads/viewleaddetails/".$leadid."'>Check Lead Details</a>"; 	
					$header_content = file_get_contents( 'email-templates/email-header_rp.php' );
					//Add the message body
					 while ($row = pg_fetch_array($result)) 
                    { 
					$message .= file_get_contents( 'email-templates/email-revpotential.php' );
					//Add the message footer content
					
					$alert_text="Some of the Potentials for the Product Group as been Revised based on the Customer";

					 $replacements = array(
					        '({logo})' => $logo, 
					        '({mail_alert_date})' => $row["dated"], 
					        '({alert_text})' => $alert_text, 
					        '({customergroup})' => $row["dac_custgroupname"], 
					        '({itemgroup})' => $row["dac_prodgroupname"], 
					        '({prev_potential})' => $row["rpsc_prev_potential"], 
					        '({updated_potential})' => $row["rpsc_rev_potential"], 
					        '({sale_category})' => $row["rpsc_salecat_name"], 
					        '({updatedby})' => $row["rpsc_updated_username"], 	
					        '({view_leaddetails})' => "test", 
					        '({message_body})' => nl2br( stripslashes( $message_content ) )
					    );
					    $message = preg_replace( array_keys( $replacements ), array_values( $replacements ), $message );
					    } // end of while loop
					    $footer_content .= file_get_contents( 'email-templates/email-footer_rp.php' );
					    //Make the generic plaintext separately due to lots of css and tables
					    $final_message=$header_content.$message.$footer_content;
					    $plaintext = $message_content;
					    $plaintext = strip_tags( stripslashes( $plaintext ), '<p><br><h2><h3><h1><h4>' );
					    $plaintext = str_replace( array( '<p>', '<br />', '<br>', '<h1>', '<h2>', '<h3>', '<h4>' ), PHP_EOL, $plaintext );
					    $plaintext = str_replace( array( '</p>', '</h1>', '</h2>', '</h3>', '</h4>' ), '', $plaintext );
					    $plaintext = html_entity_decode( stripslashes( $plaintext ) );

					// Replace the % with the actual information
					   // Send email to BM and executive
     		/*		   $exe_address=explode(",", $row["sales_ref_mailid"]);
					   $bm_address = explode(",", $row["bm_mailid"]);*/
					   $bm_address="";
					 
					  // $to_address = array(1 => 'shankar.kg@pure-chemical.com','g.narender@pure-chemical.com','pathy@pure-chemical.com','c.rajarathinam@pure-chemical.com');
					   $to_address = array(1 => 'appssupport@pure-chemical.com');
					  // $to_address = array_merge($exe_address,$bm_address);
					   $to_address = array_unique($to_address);
					//   print_r($to_address);
					 
					// Setup PHPMailer
					$mail = new PHPMailer();
					$mail->IsSMTP();
					// This is the SMTP mail server
					$mail->Host = 'smtp.gmail.com';
					// Remove these next 3 lines if you dont need SMTP authentication
					$mail->SMTPAuth = true;
					$mail->SMTPSecure = 'tls';     
					$mail->Username = 'lms.alert@pure-chemical.com';
					$mail->Password = 'pure@123';
					// Set who the email is coming from
					$mail->SetFrom('lms.alert@pure-chemical.com', 'LMS Admin');
				    
					// Set who the email is sending to
					 if( is_array( $to_address ) )
					    {
					    
					        foreach( $to_address as $i )
					        {
					        	
					            $mail->AddAddress( $i );
					        }
					    }
					    else
					    {
					    	

					        $mail->AddAddress( $to_address, "" );
					    }

					  /*if( is_array( $bm_emailid ) )
					    {
					    
					        foreach( $bm_emailid as $j )
					        {
					        	
					            $mail->AddAddress( $j );
					        }
					    }
					    else
					    {

					        $mail->AddAddress( $bm_emailid, "" );
					    }*/
					//$mail->AddAddress('sureshatpure@gmail.com');
					//$mail->AddAddress( $to_address, "" );
					$mail->addBCC('webdevelopment@pure-chemical.com');
					$mail->addCC('sureshatpure@gmail.com');
					//$mail->addCC('anto.fernando@pure-chemical.com');
					//$mail->addCC('crmsupport@pure-chemical.com');
					//$mail->addCC($bm_emailid);

					// Set the subject
					$mail->Subject = 'Revised Potential Alert - Testing';
				//	$mail->Subject = 'Lead Status- Met the Customer (Testing - please ignore..!)';

					//Set the message
					$mail->MsgHTML($final_message);
					//$mail->AltBody(strip_tags($message));
					// Send the email
					 
					
					if(!$mail->Send()) 
					{
					 echo "Mailer Error: " . $mail->ErrorInfo;
					}
					else
					{
						

						// write an update statment to update the "mail_sent_flag to 1 "  in the table lead_status_mail_alerts using the 

						// $sqlupdate= "update dactivity_revised_pot_salecategory set rpsc_mail_status='Yes' WHERE rpsc_line_id=".@$row[rpsc_line_id]; 

						$sqlupdate="UPDATE dactivity_revised_pot_salecategory SET rpsc_mail_status='Yes' WHERE rpsc_line_id IN (
SELECT d.rpsc_line_id FROM dactivity_revised_pot h, dactivity_revised_pot_salecategory d WHERE h.dac_poten_id=d.dactivity_revised_potid 
AND rpsc_mail_status='No' AND d.rpsc_updated_date::DATE BETWEEN '".$week_start."' AND  '".$week_end."')";
//echo $sqlupdate; die;
						 $resultupdate = pg_query($conn, $sqlupdate);
					}	
					//echo"<pre>";print_r($mail);echo"</pre>";
                  	
                   
                    	
	              

            }

// Retrieve the email template required
  

   
?>
