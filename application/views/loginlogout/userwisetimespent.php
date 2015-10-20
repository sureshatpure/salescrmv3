<?php $this->load->view('header_novalid'); ?>

<style type="text/css">

            #header {
                text-align: center;
            }
            #wrapper {
                margin:0 auto;
                width:100%;
            }
            #submain {
                margin:0 auto;
                width:100%;
            }
            #sub-left {
                float:left;
                width:100%;
            }
            #sub-right {
                float:right;
                width:43%;
                text-align: right;
            }
            #jqxWidget_qnty .jqx-grid-cell {
                background: none repeat scroll 0 0 #fff;
                border-color: #c7c7c7;
                box-sizing: content-box;
                font-family: Verdana,Arial,sans-serif;
                font-size: 10px;
                font-style: normal;
            }
            #jqxWidget_cum_qnty .jqx-grid-cell {
                background: none repeat scroll 0 0 #fff;
                border-color: #c7c7c7;
                box-sizing: content-box;
                font-family: Verdana,Arial,sans-serif;
                font-size: 10px;
                font-style: normal;
            }
            #jqxWidget_qnty .jqx-grid-header{
                text-align: center;
            }
            

</style>
<script type="text/javascript" src="<?= base_url() ?>public/jqwidgets/scripts/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="<?= base_url() ?>public/jqwidgets/jqxcore.js"></script>
<script type="text/javascript" src="<?= base_url() ?>public/jqwidgets/jqxbuttons.js"></script>
<script type="text/javascript" src="<?= base_url() ?>public/jqwidgets/jqxscrollbar.js"></script>
<script type="text/javascript" src="<?= base_url() ?>public/jqwidgets/jqxmenu.js"></script>


<script type="text/javascript" src="<?= base_url() ?>public/jqwidgets/jqxdata.js"></script> 
<script type="text/javascript" src="<?= base_url() ?>public/jqwidgets/globalization/globalize.js"></script> 
<script type="text/javascript" src="<?= base_url() ?>public/jqwidgets/scripts/gettheme.js"></script>

<script type="text/javascript" src="<?= base_url() ?>public/jqwidgets/jqxdatetimeinput.js"></script>

<script type="text/javascript" src="<?= base_url() ?>public/jqwidgets/jqxcalendar.js"></script>


<!-- sorting and filtering - start -->

<script type="text/javascript" src="<?= base_url() ?>public/jqwidgets/jqxpanel.js"></script>
<script type="text/javascript" src="<?= base_url() ?>public/jqwidgets/jqxcheckbox.js"></script>
<script type="text/javascript" src="<?= base_url() ?>public/jqwidgets/jqxlistbox.js"></script>
<script type="text/javascript" src="<?= base_url() ?>public/jqwidgets/jqxdropdownlist.js"></script>

<!-- sorting and filtering - end -->
<!-- paging - start -->

<!-- paging - end -->

<!-- charts - start -->
<script type="text/javascript" src="<?= base_url() ?>public/jqwidgets/jqxdata.js"></script>
<script type="text/javascript" src="<?= base_url() ?>public/jqwidgets/jqxchart.js"></script>
<!-- charts - end -->

<!-- End of jqwidgets -->
<!-- end of Menu includes -->
<script type="text/javascript">
    var base_url = '<?php echo site_url(); ?>';
    var ownbranch = '<?php echo $ownbranch; ?>';
    var MaxValue = '<?php echo $maxVal; ?>';
    
    function openpopupwindow(leadstatusid, days)
    {
        //  alert("lead status id"+leadstatusid);
        //  alert("days"+days);
        window.open(base_url + 'dashboard/showleads/' + leadstatusid + '/' + days, '_blank', 'width=800,height=500,scrollbars=yes,status=yes,resizable=yes,screenx=300,screeny=100,addressbar=no');

    }
    $(document).ready(function () {
        
        var theme = "black";
        var hdnfrom_date = $('#hdn_from_date').val();
        var hdnto_date = $('#hdn_to_date').val();
        var hdnaccount_yr = $('#hdn_account_yr').val();
       // alert("hdnaccount_yr"+hdnaccount_yr);
        var hdnjc_to = $('#hdn_jc_to').val();
            hdnjc_to =hdnjc_to-1;
        var hdnjc_from = $('#hdn_jc_from').val();
        hdnjc_from=hdnjc_from-1;

        // Create a jqxMenu
        $("#jqxMenu").jqxMenu({width: '670', height: '30px', theme: 'black'});
        $("#jqxMenu").css('visibility', 'visible');
        $("#applyfilter").jqxButton({theme: 'energyblue'});

        $('#date_filter').jqxCheckBox({checked: true, height: 25, theme: 'energyblue'});
        $("#fromdate").jqxDateTimeInput({width: '150px', height: '25px', theme: 'energyblue', formatString: 'dd-MMM-yyyy', disabled: true});
        $("#todate").jqxDateTimeInput({width: '150px', height: '25px', theme: 'energyblue', formatString: 'dd-MMM-yyyy', disabled: true});

        $("#fromdate").jqxDateTimeInput('setDate', hdnfrom_date);
        $("#todate").jqxDateTimeInput('setDate', hdnto_date);
        



        $('#date_filter').jqxCheckBox('disable');

        from_date = $("#fromdate").jqxDateTimeInput('getDate');
        from_date = convert(from_date);
          

        to_date = $("#todate").jqxDateTimeInput('getDate');
        to_date = convert(to_date);


        //$("#fromdate").jqxDateTimeInput({disabled: false});
       // $("#todate").jqxDateTimeInput({disabled: false});
        sel_datefilter = $('#date_filter').val();
        //alert("date filter option is "+sel_datefilter);
        function convert(from_date)
        {
            var date = new Date(from_date), mnth = ("0" + (date.getMonth() + 1)).slice(-2), day = ("0" + date.getDate()).slice(-2);
            return [date.getFullYear(), mnth, day].join("-");
            //alert([ date.getFullYear(), mnth, day ].join("-"));
        }

        $('#fromdate').on('valuechanged', function (event) {
            from_date = $("#fromdate").jqxDateTimeInput('getDate');
            //   alert("from date in "+from_date);
            from_date = convert(from_date);

        });
        $('#todate').on('valuechanged', function (event) {
            to_date = $("#todate").jqxDateTimeInput('getDate');
            //   alert("todate in "+to_date);
            to_date = convert(to_date);

        });

        $('#date_filter').on('change', function (event) {
            // alert(event.args.checked);  
            if (event.args.checked == true)
            {
                /*$("#fromdate").jqxDateTimeInput({ disabled: true });
                 $("#to_date").jqxDateTimeInput({ disabled: true });    */
                //alert("in true");
                $("#fromdate").jqxDateTimeInput({disabled: false});
                $("#todate").jqxDateTimeInput({disabled: false});

            }
            else
            {
                //  alert(" in false");
                $("#fromdate").jqxDateTimeInput({disabled: true});
                $("#todate").jqxDateTimeInput({disabled: true});
            }



        });


//              var leadata = $("#leadata").val();
        var leadata =<?php echo $data; ?>;
        var leadatacum =<?php echo $datacum; ?>;

        var obj = $.parseJSON(leadata);
        var columns = obj[0].columns;
        var rows = obj[1].rows;

        var objcum = $.parseJSON(leadatacum);
        var columns_cum = objcum[0].columns;
        //var rows = objcum[1].rows;

    
        var leadata_qnty = <?php echo $data_qnty; ?>;
        var leadata_qnty_cum = <?php echo $datacum_qnty; ?>;
        var objqnty = $.parseJSON(leadata_qnty);
        var columns_qnty = objqnty[0].columns;

        var objqntycum = $.parseJSON(leadata_qnty_cum);
        var columns_cum_qnty = objqntycum[0].columns;

        var leadatact = <?php echo $datact; ?>;
        var leadatact_qnty = <?php echo $datact_qnty; ?>;
        var br = $('#hdn_branch').val();
      

        var baseurl = base_url;

        var permission = <?php echo $grpperm; ?>;
        var group_len = permission.length;
        var theme = 'energyblue';



        var datact = leadatact;
        var data = leadata;
        var datact_qnty = leadatact_qnty;
        var data_qnty = leadata_qnty;
       // prepare the data
       


        // alert("summary data"+summaryData.toSource());
         var url = base_url + "dashboard/getbranches";
            branch_source =
                    {
                        datatype: "json",
                        datafields: [
                            {name: 'branch'},
                            {name: 'branch'}
                        ],
                        url: url,
                        async: false
                    };

            var branch_dataAdapter = new $.jqx.dataAdapter(branch_source);
              $("#selectbranch").jqxDropDownList({
                selectedIndex: -1,
                source: branch_dataAdapter,
                displayMember: "branch",
                valueMember: "branch",
                width: 200,
                height: 25,
                theme: theme,
                placeHolder: '– Please Select Branch –'
            });
            $("#selectbranch").jqxDropDownList('val', br);
/*JC period start*/
            var url = base_url + "dashboard/getjchdr";
            jc_source_from =
                    {
                        datatype: "json",
                        datafields: [
                            {name: 'jc_name'},
                            {name: 'jc_code'}
                        ],
                        url: url,
                        async: false
                    };

            var jc_dataAdapter = new $.jqx.dataAdapter(jc_source_from);
              $("#jcperiod_from").jqxDropDownList({
                selectedIndex: hdnjc_from,
                source: jc_dataAdapter,
                displayMember: "jc_name",
                valueMember: "jc_code",
                width: 200,
                height: 25,
                theme: theme,
                placeHolder: '– Please Select JC –'
            });

             var jc_dataAdapter = new $.jqx.dataAdapter(jc_source_from);
              $("#jcperiod_to").jqxDropDownList({
                selectedIndex: hdnjc_to,
                source: jc_dataAdapter,
                displayMember: "jc_name",
                valueMember: "jc_code",
                width: 200,
                height: 25,
                theme: theme,
                placeHolder: '– Please Select JC –'
            });
            
            

            $("#jcperiod_from").on('select', function (event) {
                updateJcFromDate(event.args.item.value);
            });


             

            var updateJcFromDate = function (jccode) {
             //  alert('updateJcFromDate'+jccode);
            fin_year =  $("#finance_year").jqxDropDownList('val');
            //alert('fin_year in updateJcFromDate'+fin_year);
                $.ajax({
                    url: baseurl + "dashboard/getjcperiodfromdate/" + jccode+"/"+fin_year,
                    dataType: "json",
                    success: function (jcfrom_date) {
                       JcFromdate(jcfrom_date);
                    }
                });
            }

            $("#jcperiod_to").on('select', function (event) {
                
                updateJcToDate(event.args.item.value);
            });

            var updateJcToDate = function (jccode) {
               //alert('updateJcToDate'+jccode);
            fin_year =  $("#finance_year").jqxDropDownList('val');
                $.ajax({
                    url: baseurl + "dashboard/getjcperiodtodate/" + jccode+"/"+fin_year,
                    dataType: "json",
                    success: function (jcto_date) {
                       JcTodate(jcto_date);
                    }
                });
            }

        
            // Create a jqxDropDownList
           

             var url = base_url + "dashboard/getfinanceyear";
            financeyr_source =
                    {
                        datatype: "json",
                        datafields: [
                            {name: 'finance_year'},
                            {name: 'finance_year'}
                        ],
                        url: url,
                        async: false
                    };

            var finyear_dataAdapter = new $.jqx.dataAdapter(financeyr_source);
              $("#finance_year").jqxDropDownList({
                selectedIndex: 1,
                source: finyear_dataAdapter,
                displayMember: "finance_year",
                valueMember: "finance_year",
                width: 200,
                autoDropDownHeight: true,
                theme: theme,
                placeHolder: '– Please Select Year –'
            });
            $("#finance_year").jqxDropDownList('val', hdnaccount_yr);
            function JcFromdate(jcfrom_date){

                //  alert("jc_period_from "+jcfrom_date[0].jc_period_from);
                  $("#fromdate").jqxDateTimeInput('setDate', jcfrom_date[0].jc_period_from);
                }
            function JcTodate(jcto_date){

                 // alert("jc_period_to "+jcto_date[0].jc_period_to);
                  $("#todate").jqxDateTimeInput('setDate', jcto_date[0].jc_period_to);
                }
             $("#finance_year").on('select', function (event) { 
                
                updateJcFromDatefy(event.args.item.value);
                updateJcToDatefy(event.args.item.value);
            });

             var updateJcFromDatefy = function (jccode) {
             //  alert('updateJcFromDate'+jccode);
            fin_year =  $("#finance_year").jqxDropDownList('val');
            jccode =  $("#jcperiod_from").jqxDropDownList('val');
           // alert('fin_year in updateJcFromDatefy'+fin_year);
           // alert('jccode in updateJcFromDatefy'+jccode);
                $.ajax({
                    url: baseurl + "dashboard/getjcperiodfromdate/" + jccode+"/"+fin_year,
                    dataType: "json",
                    success: function (jcfrom_date) {
                       JcFromdate(jcfrom_date);
                    }
                });
            }

            var updateJcToDatefy = function (jccode) {
             //  alert('updateJcFromDate'+jccode);
            fin_year =  $("#finance_year").jqxDropDownList('val');
            jccode =  $("#jcperiod_to").jqxDropDownList('val');
           // alert('fin_year in updateJcToDatefy'+fin_year);
          //  alert('jccode in updateJcToDatefy'+jccode);
                $.ajax({
                    url: baseurl + "dashboard/getjcperiodtodate/" + jccode+"/"+fin_year,
                    dataType: "json",
                    success: function (jcto_date) {
                        JcTodate(jcto_date);
                    }
                });
            }

                
/*JC period end*/            

     

        /* End for qnty grid */
/* Start for cumulative*/

        $("#applyfilter").click(function () {
            dataFieldbranch = $("#selectbranch").jqxDropDownList('val');
            sel_datefilter = $('#date_filter').val();

            fin_year =  $("#finance_year").jqxDropDownList('val');
            jccode_from =  $("#jcperiod_from").jqxDropDownList('val');
            jccode_to =  $("#jcperiod_to").jqxDropDownList('val');

            if (dataFieldbranch.length == 0)
            {
                dataFieldbranch="All";
                
            }
            if (sel_datefilter == false)
            {
                alert("Please Select the Date");
                return true;
            }
            //  else if  alert("user  "+dataFielduser.length);

            /* else  if((sel_datefilter ==true) && (dataFielduser.length==0))
             {
             alert("Please Select the User");
             return false;
             
             }*/
             if(parseInt(jccode_from) > parseInt(jccode_to))
             {
                alert("Please slect the \"To JC Period\" greater than \"From JC Period\" ");
                return false;
             }
            else
            {
                // applyFilter(dataField);
                setfilters(dataFieldbranch,jccode_from,jccode_to,fin_year);
            }

        });
        var setfilters = function (datafield, jccode_from,jccode_to,fin_year) {
            //alert("set setfilters - from  "+from_date);
            //  alert("setfilters - to  "+to_date);
            //  alert("select date filter value inside setfilter fn "+sel_datefilter);
            //  alert("the dataFielduser "+dataFielduser);

            sel_datefilter = $('#date_filter').val();
           // alert("ownbranch "+ownbranch);
            if(ownbranch==0)
            {
                if (sel_datefilter == true)
                {

                    $.ajax({
                        url: base_url + 'dashboard/getleadmc/' + dataFieldbranch + '/' + jccode_from + '/' + jccode_to + '/' + fin_year,
                        success: function () {
                            // i must remove the div
                            //  alert("success");
                            window.location.href = base_url + 'dashboard/getleadmc/' + dataFieldbranch + '/' + jccode_from + '/' + jccode_to + '/' + fin_year;
                            //window.location.href=base_url + 'dashboard/getdatawithdate_filter/'+ datafield+'/'+dataFielduser+'/'+from_date+'/'+to_date;

                        }
                    });
                }
            }
            else
            {
            if (sel_datefilter == true)
                {

                    $.ajax({
                        url: base_url + 'dashboard/ownbranchsrch/' + dataFieldbranch + '/' + jccode_from + '/' + jccode_to + '/' + fin_year,
                        success: function () {
                            // i must remove the div
                            //  alert("success");
                            window.location.href = base_url + 'dashboard/ownbranchsrch/' + dataFieldbranch + '/' + jccode_from + '/' + jccode_to + '/' + fin_year;
                            //window.location.href=base_url + 'dashboard/getdatawithdate_filter/'+ datafield+'/'+dataFielduser+'/'+from_date+'/'+to_date;

                        }
                    });
                }
            }

            
          
        } // End for setfilters function 




        // Chart data preparation - start


        var sampleData = datact;
         /*var sampleData = [
         {leadstatusid:"1", leadstatus:"Prospect",zdays:"40", tdays:"21", sdays:"55", ndays:"10", twdays:"12", eidays:"23"}, 
         {leadstatusid:"2", leadstatus:"Met the customer",zdays:"13", tdays:"50", sdays:"90", ndays:"20", twdays:"26", eidays:"32"}, 
         {leadstatusid:"7", leadstatus:"Expanding And Build Relationship",zdays:"61", tdays:"20", sdays:"26", ndays:"53", twdays:"23", eidays:"45"}
         ];*/
         
       
       



        // chart data preparation - end
         $('#usertime').highcharts({
        title: {
            text: 'Overall Avg Timespent',
            x: -20 //center
        },
        subtitle: {
            text: 'Source: LMS',
            x: -20
        },
        xAxis: {
            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
                'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
        },
        yAxis: {
            title: {
                text: 'Users'
            },
            plotLines: [{
                value: 0,
                width: 1,
                color: '#808080'
            }]
        },
        tooltip: {
            valueSuffix: '°C'
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle',
            borderWidth: 0
        },
        series: [{
            name: 'Tokyo',
            data: [7.0, 6.9, 9.5, 14.5, 18.2, 21.5, 25.2, 26.5, 23.3, 18.3, 13.9, 9.6]
        }, {
            name: 'New York',
            data: [-0.2, 0.8, 5.7, 11.3, 17.0, 22.0, 24.8, 24.1, 20.1, 14.1, 8.6, 2.5]
        }, {
            name: 'Berlin',
            data: [-0.9, 0.6, 3.5, 8.4, 13.5, 17.0, 18.6, 17.9, 14.3, 9.0, 3.9, 1.0]
        }, {
            name: 'London',
            data: [3.9, 4.2, 5.7, 8.5, 11.9, 15.2, 17.0, 16.6, 14.2, 10.3, 6.6, 4.8]
        }]
    });



    });
</script>

<div class="announcement noprint" id="announcement">
    <marquee direction="left" scrolldelay="10" scrollamount="3" behavior="scroll" class="marStyle" onmouseover="javascript:stop();" onmouseout="javascript:start();">LBL_NO_ANNOUNCEMENTS</marquee>
</div>
<input value="Leads" id="module" name="module" type="hidden">
<input value="" id="parent" name="parent" type="hidden">
<input value="List" id="view" name="view" type="hidden">

<div class="navbar commonActionsContainer noprint">
    <div style="position: relative; top: 5px; left: 5.14999px;" class="actionsContainer row-fluid">
        <div class="span2">
            <span class="companyLogo"><img src="<?= base_url() ?>public/images/logo.png" title="logo.png" alt="logo.png">&nbsp;
            </span>
        </div>
        <div class="span10 marginLeftZero">
            
        </div>
    </div>
</div>
</div>
</div>
<div class="bodyContents" style="margin-left: 0;min-height: 635px;min-width: 1231px;">
    <div class="mainContainer row-fluid">
        <div class="span2 row-fluid noprint">
            <div class="row-fluid">
            </div>
        </div>
        <div class="contentsDiv marginLeftZero" style="width:100%;">
            
                <div class="listViewTopMenuDiv noprint">
                    <div >
                         <span class="btn-toolbar span10">
                            <div class="contentHeader row-fluid" style="width:100%;">
                                <?php if ($ownbranch==2) {?>
                                <span title="Petro Chemicals" class="recordLabel font-x-x-large span12">
                                    <strong>Dashboard -Branches on Their Own Lead Count for <? echo $branch;?> Branch</strong>
                                </span>

                                <?php } else { ?> 
                                <span title="Petro Chemicals" class="recordLabel font-x-x-large span12">
                                    <strong>Dashboard - Overall Leads Counts for <? echo $branch;?> Branch</strong>
                                </span>
                                <?php } ?>

                            </div>
                            <span class="btn-group">
                                    <!-- <button id="Leads_listView_basicAction_LBL_ADD_RECORD" class="btn addButton" onclick='window.location.href="leads/add"'><i class="icon-plus icon-white"></i>&nbsp;<strong>Add Lead</strong></button> -->
                                <!-- <div>Total No Of Leads: </div> -->
                                        <?php if ($this->session->flashdata('message') != "") { ?>
                                    <div class="alert alert-message.success"><p style="width:709px; text-align:center;font-size:18px;"><?php echo $this->session->flashdata('message'); ?></p></div>
                                        <?php } ?>
                            </span>
                        </span>
                        <span class="hide filterActionImages pull-right">
                            <i title="Deny" data-value="deny" class="icon-ban-circle alignMiddle denyFilter filterActionImage pull-right"></i><i title="Approve" data-value="approve" class="icon-ok alignMiddle approveFilter filterActionImage pull-right"></i><i title="Delete" data-value="delete" class="icon-trash alignMiddle deleteFilter filterActionImage pull-right"></i><i title="Edit" data-value="edit" class="icon-pencil alignMiddle editFilter filterActionImage pull-right">
                            </i>
                        </span>

                    </div>
                </div>
                <div class="listViewContentDiv" id="listViewContents" style="float: left; width:100%;">
                    <!-- Start your grid content from here -->  
                       <div>
                        <table width="540px">
                            <tr>
                                <td width="25%" style="padding-left:8px;"><div>Select the Fin-Year:</div></td>
                                <td><div style="float: left" id="finance_year"></div></td>
                            </tr>   
                            <tr>
                                <td width="25%" style="padding-left:8px;"><div>JC Period From:</div></td>
                                <td><div style="float: left" id="jcperiod_from"></div></td>
                            </tr>   
                            <tr>
                                <td width="25%" style="padding-left:8px;"><div>JC Period To:</div></td>
                                <td><div style="float: left" id="jcperiod_to"></div></td>
                            </tr>  
                            <tr>
                                <td width="25%" style="padding-left:8px;"><div>Select the Branch:</div></td>
                                <td><div style="float: left" id="selectbranch"></div></td>
                            </tr>   
 
                            <tr>
                                <td  width="30%"><div  id='date_filter'>Use Date Filter</div></td>
                                <td><label>JC Period From </label><div style="float: inherit;" id="fromdate" name="fromdate"></div></td>
                                <td><label>JC Period To </label><div style="float: inherit;" id="todate" name="todate"></div></td>
                            </tr>
                            <tr>
                                <td></td><td><input type="button" id="applyfilter" value="Search" /></td>
                            </tr>
                           
                        </table>
                    </div>
                    <div id="wrapper">
                        <div id="header"><h1></h1></div>
                        <div id="sub-main">
                            <div id="sub-left">
                                        <div id='jqxWidget'>
                                            <div id="usertime"></div>
                                        </div>
                            </div>
                           
                        </div>
                        <div style="clear:both;"></div>
                          <div id="sub-main">
                        
                            <div id="sub-left">
                                <div id='jqxWidget_cum'>
                                    <div id="jqxgrid_cum" ></div>
                                </div>
                            </div>
                        </div>


                    </div>
                    <div style="width:100%; float:left;">
                      <table width="100%">
                                                     
                             <tr>
                                <td>
                                    <div id='chartContainer' style="width:93%; height: 500px"/>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div id='eventText' style="width:100%; height: 30px"/> 
                                </td>
                            </tr>
                        </table>
                        <div style="width:100%;"></div>
                        <!-- grid for qnty start -->
                        <div id="wrapper">
                            <div id="header"><h1></h1></div>
                                <div id="sub-main">
                                    <div id="sub-left">
                                                <div id='jqxWidget_qnty'>
                                                    <div id="jqxgrid_qnty"></div>
                                                </div>
                                    </div>
                                  
                                </div>
                                 <div style="clear:both;"></div>
                                 <div id="sub-main">
                                    <div id="sub-left">
                                        <div id='jqxWidget_cum_qnty'>
                                            <div id="jqxgrid_cum_qnty"></div>
                                        </div>
                                    </div>
                                </div>

                        </div>
                        
                        <!-- grid for qnty end -->
                <!-- End of Grid content -->                        

                </div>

    </div>
</div>
</div>
</div>
<input id="activityReminder" class="hide noprint" value="60" type="hidden">
<input value="<?php echo $branch; ?>" id="hdn_branch" name="hdn_branch" type="hidden">
<input value="<?php echo @$from_date; ?>" id="hdn_from_date" name="hdn_from_date" type="hidden">
<input value="<?php echo @$to_date; ?>" id="hdn_to_date" name="hdn_to_date" type="hidden">
<input value="<?php echo @$jc_to; ?>" id="hdn_jc_to" name="hdn_jc_to" type="hidden">
<input value="<?php echo @$jc_from; ?>" id="hdn_jc_from" name="hdn_jc_from" type="hidden">
<input value="<?php echo @$account_yr; ?>" id="hdn_account_yr" name="hdn_account_yr" type="hidden">
<div id="userfeedback" class="feedback noprint">

</div>
<footer class="noprint">
    <p style="margin-top:5px;margin-bottom:0;" align="center">Powered by Pure CRM 6.0.0Beta©2013 - 2018&nbsp;
        <a href="www.pure-chemical.com" target="_blank">pure-chemical.com
        </a>&nbsp;|&nbsp;
    </p>
</footer>
<script type="text/javascript" src="<?= base_url() ?>public/highcharts/highcharts.js"></script>
<script type="text/javascript" src="<?= base_url() ?>public/highcharts/modules/exporting.js"></script>
<script type="text/javascript" src="<?= base_url() ?>public/js/html5.js"></script>
<script type="text/javascript" src="<?= base_url() ?>public/js/bootstrap-tab.js"></script>
<script type="text/javascript" src="<?= base_url() ?>public/js/bootstrap-dropdown.js"></script>


<!-- Added in the end since it should be after less file loaded -->
<?php $this->load->view('include_idletimeout.php'); ?> 
</body>
</html>