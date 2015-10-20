<?php $this->load->view('header_novalid'); ?>
<!-- jqwidgets scripts -->
<link rel="stylesheet" href="<?= base_url() ?>public/jqwidgets/styles/jqx.base.css" type="text/css" />
<link rel="stylesheet" href="<?= base_url() ?>public/jqwidgets/styles/jqx.energyblue.css" type="text/css" />
<link rel="stylesheet" href="<?= base_url() ?>public/jqwidgets/styles/jqx.black.css" type="text/css" />


<script type="text/javascript" src="<?= base_url() ?>public/jqwidgets/scripts/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="<?= base_url() ?>public/jqwidgets/jqxcore.js"></script>
<script type="text/javascript" src="<?= base_url() ?>public/jqwidgets/jqxbuttons.js"></script>
<script type="text/javascript" src="<?= base_url() ?>public/jqwidgets/jqxscrollbar.js"></script>
<script type="text/javascript" src="<?= base_url() ?>public/jqwidgets/jqxmenu.js"></script>
<script type="text/javascript" src="<?= base_url() ?>public/jqwidgets/jqxgrid.js"></script>
<script type="text/javascript" src="<?= base_url() ?>public/jqwidgets/jqxgrid.selection.js"></script> 
<script type="text/javascript" src="<?= base_url() ?>public/jqwidgets/jqxgrid.columnsresize.js"></script> 
<script type="text/javascript" src="<?= base_url() ?>public/jqwidgets/jqxdata.js"></script> 
<script type="text/javascript" src="<?= base_url() ?>public/jqwidgets/scripts/gettheme.js"></script>
<script type="text/javascript" src="<?= base_url() ?>public/jqwidgets/jqxgrid.edit.js"></script>
<script type="text/javascript" src="<?= base_url() ?>public/jqwidgets/jqxgrid.columnsreorder.js"></script>
<script type="text/javascript" src="<?= base_url() ?>public/jqwidgets/jqxdatetimeinput.js"></script>
<script type="text/javascript" src="<?= base_url() ?>public/jqwidgets/jqxcalendar.js"></script>


<!-- sorting and filtering - start -->
<script type="text/javascript" src="<?= base_url() ?>public/jqwidgets/jqxgrid.sort.js"></script>
<script type="text/javascript" src="<?= base_url() ?>public/jqwidgets/jqxgrid.filter.js"></script>
<script type="text/javascript" src="<?= base_url() ?>public/jqwidgets/jqxgrid.selection.js"></script> 
<script type="text/javascript" src="<?= base_url() ?>public/jqwidgets/jqxgrid.aggregates.js"></script> 
<script type="text/javascript" src="<?= base_url() ?>public/jqwidgets/jqxpanel.js"></script>
<script type="text/javascript" src="<?= base_url() ?>public/jqwidgets/jqxcheckbox.js"></script>
<script type="text/javascript" src="<?= base_url() ?>public/jqwidgets/jqxlistbox.js"></script>
<script type="text/javascript" src="<?= base_url() ?>public/jqwidgets/jqxdropdownlist.js"></script>

<!-- sorting and filtering - end -->
<!-- for filter start -->

<!-- Filters end -->
<!-- paging - start -->
<script type="text/javascript" src="<?= base_url() ?>public/jqwidgets/jqxgrid.pager.js"></script>
<!-- paging - end -->

<!-- charts - start -->
<script type="text/javascript" src="<?= base_url() ?>public/jqwidgets/jqxcore.js"></script>
<script type="text/javascript" src="<?= base_url() ?>public/jqwidgets/jqxdata.js"></script>
<script type="text/javascript" src="<?= base_url() ?>public/jqwidgets/jqxchart.js"></script>
<!-- charts - end -->

<!-- End of jqwidgets -->

<script type="text/javascript">
    var base_url = '<?php echo site_url(); ?>';

    $(document).ready(function ()
    {
        var theme = "black";

        // Create a jqxMenu
        $("#jqxMenu").jqxMenu({width: '670', height: '30px', theme: 'black'});
        $("#jqxMenu").css('visibility', 'visible');

        var theme = 'energyblue';
        var permission = <?php echo $grpperm; ?>;
        var selectedIndex_val = <?php echo $selectedIndex_val; ?>;
        var br = $('#hdn_branch').val();
        var cust_group = $('#hdn_cust_group').val();
        var sel_user_id = $('#hdn_userid').val();
        var hdnfrom_date = $('#hdn_from_date').val();
        var hdnto_date = $('#hdn_to_date').val();

        var sourceg;
        var source;
        var sourcen;
        var sampleData;
        var dataFieldbranch;
        var from_date;
        var to_date;
        var sel_datefilter;
        var url;
        var baseurl = base_url;
        var selectdUsers;
        setInitialgridsource(permission);



        function setInitialgridsource(permission)
        {
            //alert("in function");
            //	var leadata = grid_data;
            var baseurl = base_url;

            var permission = permission;
            var group_len = permission.length;
            var theme = 'energyblue';

            var url = baseurl + "dashboard/getbranches";

            // prepare the data
            source =
                    {
                        datatype: "json",
                        datafields: [
                            {name: 'branch'},
                            {name: 'branch'}
                        ],
                        url: url,
                        async: false
                    };

            var dataAdapter = new $.jqx.dataAdapter(source);
            // Create a jqxDropDownList
            $("#columnchooser").jqxDropDownList({
                selectedIndex: selectedIndex_val,
                source: dataAdapter,
                displayMember: "branch",
                valueMember: "branch",
                width: 200,
                height: 25,
                theme: theme,
                placeHolder: '– Please Select Branch –'
            });


            $("#columnchooser").jqxDropDownList('val', br);

            //alert("selected branch "+br);
            if (br == 'SelectBranch')
            {
                var url = baseurl + "excelreport/getusersforloginuser";
            }
            else
            {
                var url = baseurl + "excelreport/getassignedtobranch/" + br;
            }


            // prepare the data
            branchsource =
                    {
                        datatype: "json",
                        datafields: [
                            {name: 'displayname'},
                            {name: 'displayname'}
                        ],
                        url: url,
                        async: false
                    };

            var branchsourcedataAdapter = new $.jqx.dataAdapter(branchsource);
            // Create a jqxDropDownList
            $("#selectuser").jqxDropDownList({
                selectedIndex: selectedIndex_val,
                checkboxes: true,
                source: branchsourcedataAdapter,
                displayMember: "displayname",
                valueMember: "displayname",
                width: 200,
                height: 25,
                theme: theme,
                placeHolder: '– Please Select User –'
            });
            $("#check_all").jqxButton({
               theme: 'energyblue'
               });
            $("#uncheck_all").jqxButton({
               theme: 'energyblue'
              });
            $("#selectuser").jqxDropDownList('val', sel_user_id);
             $('#check_all').on('click', function () {
                  $("#selectuser").jqxDropDownList('checkAll');
                });
              $('#uncheck_all').on('click', function () {
                  $("#selectuser").jqxDropDownList('uncheckAll');
                });

            $("#selectuser").on('checkChange', function (event) 
            {
                if (event.args) {
                    var item = event.args.item;
                    if (item) {
                        var valueelement = $("<div></div>");
                        valueelement.text("Value: " + item.value);
                        var labelelement = $("<div></div>");
                        labelelement.text("Label: " + item.label);
                        var checkedelement = $("<div></div>");
                        checkedelement.text("Checked: " + item.checked);

                        var items = $("#selectuser").jqxDropDownList('getCheckedItems');
                        var checkedItems = "";
                        $.each(items, function (index) {
                            checkedItems += "'"+this.label+"'"+",";                           
                        });
                        checkedItems = checkedItems.substring(0, checkedItems.length - 1);
                        $("#checkedItemsLog").text(checkedItems);
                        //branches=JSON.stringify(checkedItems);
                        selectdUsers=checkedItems;
                    }
                }
            });

            /*start for customer group*/
              var url = baseurl + "excelreport/getcustomergrp";

            // prepare the data
            source =
                    {
                        datatype: "json",
                        datafields: [
                            {name: 'customergroup'},
                            {name: 'customergroup'}
                        ],
                        url: url,
                        async: false
                    };

            var dataAdapter = new $.jqx.dataAdapter(source);
            // Create a jqxDropDownList
            $("#customergroup").jqxDropDownList({
                selectedIndex: selectedIndex_val,
                source: dataAdapter,
                displayMember: "customergroup",
                valueMember: "customergroup",
                width: 200,
                height: 25,
                theme: theme,
                placeHolder: '– Select Customer Group –'
            });


            $("#customergroup").jqxDropDownList('val', cust_group);

            //alert("selected branch "+br);
            if (cust_group == 'SelectCustomer')
            {
                var url = baseurl + "excelreport/getitemgroups";
            }
            else
            {
                var url = baseurl + "excelreport/getitemgroupcustomer/" + cust_group;
            }


            // prepare the data
            itemsource =
                    {
                        datatype: "json",
                        datafields: [
                            {name: 'itemgroup'},
                            {name: 'itemgroup'}
                        ],
                        url: url,
                        async: false
                    };

            var itemsourcedataAdapter = new $.jqx.dataAdapter(itemsource);
            // Create a jqxDropDownList
            $("#itemgroup").jqxDropDownList({
                selectedIndex: selectedIndex_val,
                source: itemsourcedataAdapter,
                displayMember: "itemgroup",
                valueMember: "itemgroup",
                width: 200,
                height: 25,
                theme: theme,
                placeHolder: '– Select Itemgroup –'
            });
            $("#itemgroup").jqxDropDownList('val', sel_user_id);

            /*end for customer group*/
        } // end of funtion setInitialgridsource




// start for filters


// updates the listbox with unique records depending on the selected column.
        var updateFilterBox = function (datafield) {
            //	 alert('testing'+datafield);

            var url = baseurl + "excelreport/getassignedtobranch/" + datafield;

            // prepare the data
            source =
                    {
                        datatype: "json",
                        datafields: [
                            {name: 'displayname'},
                            {name: 'displayname'}
                        ],
                        url: url,
                        async: false
                    };

            var dataAdapter = new $.jqx.dataAdapter(source);
            // Create a jqxDropDownList
            $("#selectuser").jqxDropDownList({
                selectedIndex: selectedIndex_val,
                source: dataAdapter,
                displayMember: "displayname",
                valueMember: "displayname",
                width: 200,
                height: 25,
                theme: theme,
                placeHolder: '– Please Select –'
            });



        }

        //  updateFilterBox('firstname');

        // handle select all item start
      
         // handle select all item end

        // handle columns selection.
        $("#columnchooser").on('select', function (event) {
            updateFilterBox(event.args.item.value);
        });


        sel_datefilter = $('#date_filter').val();
        //   alert("select date filter value ouside setfilter fn "+sel_datefilter);
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
        // applies the filter.



// End for filters 

//Start function for exportexcel filter
        $("#exportexcel").jqxButton({theme: theme});
        $("#exportexcel").click(function ()
        {
            dataFieldbranch = $("#columnchooser").jqxDropDownList('val');
            var dataFielduser = $("#selectuser").jqxDropDownList('val');
            var sel_custroup = $("#customergroup").jqxDropDownList('val');
            var sel_itemgroup = $("#itemgroup").jqxDropDownList('val');
                
                sel_datefilter = $('#date_filter').val();

                
            if (dataFieldbranch.length == 0)
            {
                //alert("sel_datefilter "+sel_datefilter);

                if (sel_datefilter != "") // sel_datefilter is selected 
                {
                    if (from_date == '1970-01-01')
                    {
                      //  alert(" Select the from date ");
                        return false;
                    }
                    if (to_date == '1970-01-01')
                    {
                       // alert(" Select the To date ");
                        return false;
                    }

                    //return false;
                    visitreportexportAllDatewise(from_date, to_date);
                }
                else
                {
                    alert("Please Select the Branch");
                  //  alert("from_date "+from_date);
                  //  alert("to_date "+to_date);
                    return false;
                   // setfiltersexportAll();
                   // visitreportexportAllDatewise(from_date, to_date);
                }
            }

            else
            {
             
                sel_itemgroup=(sel_itemgroup=="") ? 0 : sel_itemgroup;
                sel_custroup=(sel_custroup=="") ? 0 : sel_custroup;
              visitreportBranchDatewise(sel_itemgroup,sel_custroup,dataFieldbranch, dataFielduser, from_date, to_date);
              
            }

        });

        var visitreportBranchDatewise = function (sel_itemgroup,sel_custroup,datafield, dataFielduser, from_date, to_date) {
            sel_datefilter = $('#date_filter').val();
            if ((dataFielduser != "") && (sel_datefilter == true))
            {
                $.ajax({
                    type: "POST",
                    url: baseurl + 'excelreportbranch/visitreportwithfilter/' + sel_itemgroup + '/' + sel_custroup + '/'+ datafield + '/'+from_date+'/'+to_date,
                    data: "userArray="+selectdUsers,
                    success: function(returnvalue) {
                        window.open(baseurl + 'excelreportbranch/vrdownloadfile/'+returnvalue,'_blank');

                    }
                });
            }

            else if (sel_datefilter == true)
            {

                $.ajax({
                    type: "POST",
                    url: baseurl + 'excelreportbranch/visitreportwithfilter/'+ sel_itemgroup + '/' + sel_custroup + '/'+ datafield + '/' + from_date + '/' + to_date,
                    data: "userArray="+selectdUsers,
                    success: function(returnvalue) {

                       window.open(baseurl + 'excelreportbranch/vrdownloadfile/'+returnvalue,'_blank');
                        //window.location.href=baseurl + 'dashboard/getdatawithdate_filter/'+ datafield+'/'+dataFielduser+'/'+from_date+'/'+to_date;

                    }
                });
            }
            else
            {

                $.ajax({
                    type: "POST",
                    url: baseurl + 'excelreportbranch/visitreportwithfilter/'+ sel_itemgroup + '/' + sel_custroup + '/'+ datafield + '/' + from_date + '/' + to_date,
                    data: "userArray="+selectdUsers,
                    //url : baseurl + 'excelreportbranch/hyderbadleadprod',

                    success: function(returnvalue) {
                        // i must remove the div
                         //  alert("returnvalue"+returnvalue);
                       // window.location.href = baseurl + 'excelreportbranch/visitreportwithfilter/' + datafield;
                         window.open(baseurl + 'excelreportbranch/vrdownloadfile/'+returnvalue,'_blank');


                    }
                });

            }
            //   alert("the url set is "+url);

        }

// setfiltersexportAll function to export all lead data - Start

        var setfiltersexportAll = function () {
            {
                $.ajax({
                    url: baseurl + 'excelreportbranch/exgetallleaddata',
                    success: function () {
                        // i must remove the div
                        //  alert("success");
                        //   window.location.href=baseurl + 'dashboard/getdatawithfilter/'+ datafield+'/'+dataFielduser+'/'+from_date+'/'+to_date;
                        window.location.href = baseurl + 'excelreportbranch/exgetallleaddata';

                    }
                });
            }
        }

// - End setfiltersexportAll

// visitreportexportAllDatewise function to export all lead data - Start

        var visitreportexportAllDatewise = function (from_date, to_date) {
            {

                $.ajax({
                    url: baseurl + 'excelreportbranch/visitreportexportAllDatewise/' + from_date + '/' + to_date,
                    success: function () {
                        // i must remove the div
                        //  alert("success");
                        //   window.location.href=baseurl + 'dashboard/getdatawithfilter/'+ datafield+'/'+dataFielduser+'/'+from_date+'/'+to_date;
                        window.location.href = baseurl + 'excelreportbranch/visitreportexportAllDatewise/' + from_date + '/' + to_date;

                    }
                });
            }
        }

// - End visitreportexportAllDatewise


//End function for exportexcel filter

        var toolbarfunc = function (toolbar) {
            var me = this;
            var theme = getDemoTheme();
            var container = $("<div style='width:200px; margin-top: 6px;' id='jqxWidget'></div>");
            var span = $("<span style='float: left; margin-top: 5px; margin-right: 4px;'></span>");
            var startdiv = $("<div>");
            var addlead = $("<a role='button' class='jqx-link jqx-link-energyblue' style='margin-left: 25px;' target='' href='#' id='jqxButtonadd'><input type='button' class='jqx-wrapper jqx-reset jqx-reset-energyblue jqx-rc-all jqx-rc-all-energyblue jqx-button jqx-button-energyblue jqx-widget jqx-widget-energyblue jqx-fill-state-pressed jqx-fill-state-pressed-energyblue' style='width: 65px; height: 22px;' value='Add' id='jqxWidget09c6ffa4' role='button' aria-disabled='false'></a>");
            var viewlead = $("<a role='button' class='jqx-link jqx-link-energyblue' style='margin-left: 25px;' target='' href='#' id='jqxButton'><input type='button' class='jqx-wrapper jqx-reset jqx-reset-energyblue jqx-rc-all jqx-rc-all-energyblue jqx-button jqx-button-energyblue jqx-widget jqx-widget-energyblue jqx-fill-state-pressed jqx-fill-state-pressed-energyblue' style='width: 79px; height: 22px;' value='View' id='jqxWidget09c6ffa4' role='button' aria-disabled='false'></a>");
            var edit = $("<a style='margin-left: 25px;' target='' href='#' id='jqxButtonedit'><input type='button' class='jqx-wrapper jqx-reset jqx-reset-energyblue jqx-rc-all jqx-rc-all-energyblue jqx-button jqx-button-energyblue jqx-widget jqx-widget-energyblue jqx-fill-state-pressed jqx-fill-state-pressed-energyblue' style='width: 65px; height: 22px;' value='Edit' id='jqxWidget09c6ffa4' role='button' aria-disabled='false'></a>");
            var statusupdate = $("<a style='margin-left: 25px;' target='' href='#' id='jqxButtonUpdate'><input type='button' class='jqx-wrapper jqx-reset jqx-reset-energyblue jqx-rc-all jqx-rc-all-energyblue jqx-button jqx-button-energyblue jqx-widget jqx-widget-energyblue jqx-fill-state-pressed jqx-fill-state-pressed-energyblue' style='width: 88px; height: 22px;' value='Update' id='jqxWidget09c6ffa4' role='button' aria-disabled='false'></a>");



            var enddiv = $("</div>");
            toolbar.append(container);
            container.append(span);
            container.append(startdiv);
            container.append(addlead);
            container.append(viewlead);
            container.append(statusupdate);
            for (i = 0; i < permission.length; i++)
            {
                //alert(permission[i].groupname);
                if (permission[i].groupname == 'Edit')
                {
                    container.append(edit);
                }
            }
            container.append(enddiv);

            var oldVal = "";
            viewlead.on('click', function (event)
            {

                alert("Link button pressed");
                alert("lead id " + leadid);
                if (leadid == null)
                {
                    alert("Please Select a row");
                    //	$('#jqxButton').attr('href','http://google.com');
                    return false;

                }
                else
                {
                    $('#jqxButton').attr('href', baseurl + 'leads/viewleaddetails/' + leadid);
                }

            });

            edit.on('click', function (event)
            {

                alert("Edit button pressed");
                alert("lead id " + leadid);
                if (leadid == null)
                {
                    alert("Please Select a row");
                    //	$('#jqxButton').attr('href','http://google.com');
                    return false;

                }
                else
                {
                    $('#jqxButtonedit').attr('href', baseurl + 'leads/edit/' + leadid);
                }

            });
            statusupdate.on('click', function (event)
            {

                alert("Update button pressed");
                alert("lead id " + leadid);
                if (leadid == null)
                {
                    alert("Please Select a row");
                    //	$('#jqxButton').attr('href','http://google.com');
                    return false;

                }
                else
                {
                    $('#jqxButtonUpdate').attr('href', baseurl + 'leads/editstatus/' + leadid);
                }

            });

            addlead.on('click', function (event)
            {

                $('#jqxButtonadd').attr('href', baseurl + 'leads/add');

            });

        };

        $('#date_filter').jqxCheckBox({checked: false, height: 25, theme: theme});
        $("#fromdate").jqxDateTimeInput({width: '150px', height: '25px', theme: theme, formatString: 'dd-MMM-yyyy', disabled: true});
        $("#todate").jqxDateTimeInput({width: '150px', height: '25px', theme: theme, formatString: 'dd-MMM-yyyy', disabled: true});

        from_date = $("#fromdate").jqxDateTimeInput('getDate');
        from_date = convert(from_date);
        //  alert("from date in "+from_date);

        to_date = $("#todate").jqxDateTimeInput('getDate');
        to_date = convert(to_date);
        //  alert("todate in "+to_date);
        //alert("hdnfrom_date is "+hdnfrom_date);

        $("#fromdate").jqxDateTimeInput('setDate', hdnfrom_date);
        $("#todate").jqxDateTimeInput('setDate', hdnto_date);
        $("#fromdate").jqxDateTimeInput({disabled: true});
        $("#todate").jqxDateTimeInput({disabled: true});
        sel_datefilter = $('#date_filter').val();
        //alert("date filter option is "+sel_datefilter);
        function convert(from_date)
        {
            var date = new Date(from_date), mnth = ("0" + (date.getMonth() + 1)).slice(-2), day = ("0" + date.getDate()).slice(-2);
            return [date.getFullYear(), mnth, day].join("-");
            //alert([ date.getFullYear(), mnth, day ].join("-"));
        }

        $('#date_filter').on('change', function (event) {
            // alert(event.args.checked);  
            if (event.args.checked == true)
            {
                /*$("#fromdate").jqxDateTimeInput({ disabled: true });
                 $("#to_date").jqxDateTimeInput({ disabled: true });	*/
                //alert("in true");
                $("#fromdate").jqxDateTimeInput({disabled: false});
                $("#todate").jqxDateTimeInput({disabled: false});

            }
            else
            {
                //	alert(" in false");
                $("#fromdate").jqxDateTimeInput({disabled: true});
                $("#todate").jqxDateTimeInput({disabled: true});
            }



        });
        // Chart data preparation - start


        // chart data preparation - end




    });
</script>


<!-- end of Menu includes -->
<div class="announcement noprint" id="announcement">
    <marquee direction="left" scrolldelay="10" scrollamount="3" behavior="scroll" class="marStyle" onmouseover="javascript:stop();" onmouseout="javascript:start();">LBL_NO_ANNOUNCEMENTS</marquee>
</div>
<input value="Leads" id="module" name="module" type="hidden">
<input value="" id="parent" name="parent" type="hidden">
<input value="<?php echo $branch; ?>" id="hdn_branch" name="hdn_branch" type="hidden">
<input value="<?php echo $cust_group; ?>" id="hdn_cust_group" name="hdn_cust_group" type="hidden">
<input value="<?php echo @$sel_user_id; ?>" id="hdn_userid" name="hdn_userid" type="hidden">
<input value="<?php echo @$sel_itemgroup; ?>" id="hdn_sel_itemgroup" name="hdn_sel_itemgroup" type="hidden">
<input value="<?php echo @$from_date; ?>" id="hdn_from_date" name="hdn_from_date" type="hidden">
<input value="<?php echo @$to_date; ?>" id="hdn_to_date" name="hdn_to_date" type="hidden">

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
                <div class="sideBarContents">
                    <div class="quickLinksDiv">
                        <p onclick="#" id="Leads_sideBar_link_LBL_RECORDS_LIST" class="selectedQuickLink ">
                            <a class="quickLinks" href="<?= base_url() ?>leads"><strong>Leads List</strong>
                            </a>
                        </p>
                        <!--converted leads  -->						
                        <p onclick="#" id="Leads_sideBar_link_LBL_RECORDS_LIST" class="selectedQuickLink ">
                            <a class="quickLinks" href="<?= base_url() ?>leads/convertedleads"><strong>Converted Leads</strong>
                            </a>
                        </p>
                        <!-- converted leads  -->		
                        <p onclick="#" id="Leads_sideBar_link_LBL_DASHBOARD" class="unSelectedQuickLink"><a class="quickLinks" href="<?= base_url() ?>dashboard"><strong>Dashboard</strong></a></p>
                    </div>
                    <div class="clearfix"></div>
                    <div class="quickWidgetContainer accordion">
                        <div class="quickWidget">
                            <div class="accordion-heading accordion-toggle quickWidgetHeader" data-target="#Leads_sideBar_LBL_RECENTLY_MODIFIED" data-toggle="collapse" data-parent="#quickWidgets" data-label="LBL_RECENTLY_MODIFIED" data-widget-url="#">
                                <span class="pull-left">
                                    <img class="imageElement" data-rightimage="<?= base_url() ?>public/images/images/rightArrowWhite.png" data-downimage="<?= base_url() ?>public/images/images/downArrowWhite.png" src="<?= base_url() ?>public/images/rightArrowWhite.png">
                                </span>
                                <a class="quickLinks" href="<?= base_url() ?>dashboard/executivepipeline"><h5 class="title widgetTextOverflowEllipsis pull-right" title="Branch/User Wise Lead Ageing">Branch/User Wise Lead Ageing</h5></a>
                                <div class="clearfix"></div>
                            </div>
                            <!-- second menu -->
                            <!--<div class="quickWidget">-->
                            <div class="accordion-heading accordion-toggle quickWidgetHeader" data-target="#Leads_sideBar_LBL_RECENTLY_MODIFIED" data-toggle="collapse" data-parent="#quickWidgets" data-label="LBL_RECENTLY_MODIFIED" data-widget-url="#">
                                <span class="pull-left">
                                    <img class="imageElement" data-rightimage="<?= base_url() ?>public/images/images/rightArrowWhite.png" data-downimage="<?= base_url() ?>public/images/images/downArrowWhite.png" src="<?= base_url() ?>public/images/rightArrowWhite.png">
                                </span>
                                <a class="quickLinks" href="<?= base_url() ?>dashboard/additional"><h5 class="title widgetTextOverflowEllipsis pull-right" title="Branch/Status Wise Lead Count">Branch/Status Wise Lead Count</h5></a>
                                <div class="clearfix"></div>
                            </div>
                            <!-- second menu end-->
                            <!-- Third menu -->
                            <div class="quickWidget">
                                <div class="accordion-heading accordion-toggle quickWidgetHeader" data-target="#Leads_sideBar_LBL_RECENTLY_MODIFIED" data-toggle="collapse" data-parent="#quickWidgets" data-label="LBL_RECENTLY_MODIFIED" data-widget-url="#">
                                    <span class="pull-left">
                                        <img class="imageElement" data-rightimage="<?= base_url() ?>public/images/images/rightArrowWhite.png" data-downimage="<?= base_url() ?>public/images/images/downArrowWhite.png" src="<?= base_url() ?>public/images/rightArrowWhite.png">
                                    </span>
                                    <a class="quickLinks" href="<?= base_url() ?>dashboard/daynoprogress"><h5 class="title widgetTextOverflowEllipsis pull-right" title="Additional">Day No Progress</h5></a>
                                    <div class="clearfix"></div>
                                </div>
                                <!-- third menu end-->
                                <!-- Fourth menu -->

                                <div class="accordion-heading accordion-toggle quickWidgetHeader" data-target="#Leads_sideBar_LBL_RECENTLY_MODIFIED" data-toggle="collapse" data-parent="#quickWidgets" data-label="LBL_RECENTLY_MODIFIED" data-widget-url="#">
                                    <span class="pull-left">
                                        <img class="imageElement" data-rightimage="<?= base_url() ?>public/images/images/rightArrowWhite.png" data-downimage="<?= base_url() ?>public/images/images/downArrowWhite.png" src="<?= base_url() ?>public/images/rightArrowWhite.png">
                                    </span>
                                    <a class="quickLinks" href="<?= base_url() ?>dashboard/generadtedleads"><h5 class="title widgetTextOverflowEllipsis pull-right" title="User /Branch Wise Generated Leads">User /Branch Wise Generated Leads</h5></a>
                                    <div class="clearfix"></div>						
                                </div>
                                <!-- Fourth menu end-->
                                <div class="widgetContainer accordion-body collapse" id="Leads_sideBar_LBL_RECENTLY_MODIFIED" data-url="test/test">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="contentsDiv span10 marginLeftZero">
            <div class="listViewPageDiv">
                <div class="listViewTopMenuDiv noprint">
                    <div class="listViewActionsDiv row-fluid">
                        <span class="btn-toolbar span4">
                            <div class="contentHeader row-fluid" style="width:500px;">
                                <span title="Executive Pipeline" class="recordLabel font-x-x-large span12 pushDown">
                                    <strong>DailyActivity Visit Information Report</strong>
                                </span>

                            </div>

        <span class="btn-group"><!-- <pre><?php echo"lead_ub_count " . $this->session->userdata['lead_ub_count'];
echo"user_leads_count " . $this->session->userdata['user_leads_count']
?></pre> -->
                <!-- <button id="Leads_listView_basicAction_LBL_ADD_RECORD" class="btn addButton" onclick='window.location.href="leads/add"'><i class="icon-plus icon-white"></i>&nbsp;<strong>Add Lead</strong></button> -->
                                <div>Total No Of Leads:<?= @$maxvalue; ?> 
                                    <table width="540px">
                                        <tr>
                                            <td width="25%"><div>Choose Branch:</div></td>
                                            <td><div style="float: left" id="columnchooser"></div></td>
                                            <td><div style="float: inherit" id="selectuser"></div></td>
                                           <td width="25%"><div></div></td>
                                           <td style="margin-top: 20px;"><input  type="button" id='check_all' value="Select All Users" /></td>
                                            <td style="margin-top: 20px;"><input type="button" id='uncheck_all' value="Clear Selected" /></td>
                                        </tr>
                                        </tr>
                                          <tr>
                                            <td width="25%"><div>Choose CustomerGroup:</div></td>
                                            <td><div style="float: left" id="customergroup"></div></td>
                                            <td><div style="float: inherit" id="itemgroup"></div></td>
                                        </tr>
                                        <tr>
                                            <td  width="30%"><div  id='date_filter'>Use Date Filter</div></td>
                                            <td><label>Visit Date(From) </label><div style="float: inherit;" id="fromdate" name="fromdate"></div></td>
                                            <td><label>Visit Date(To) </label><div style="float: inherit;" id="todate" name="todate"></div></td>
                                        </tr>
                                        <tr>
                                                <!-- <td><input type="button" id="applyfilter" value="Apply Filter" /></td> -->
                                            <td></td>
                                            <td><input type="button" id="exportexcel" value="ExportAsExcel" /></td>
                                        </tr>
                                                                                <tr>
                                            <td colspan="3">
                                                  <div style="float: left; margin-left: 20px; font-size: 13px; font-family: Verdana;">
                                                    <div id="selectionlog">Selected Users</div>
                                                    <div style='max-width: 300px; margin-top: 20px;' id="checkedItemsLog"></div>
                                                 </div>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <?php if ($this->session->flashdata('message') != "") { ?>
                                    <div class="alert alert-message.success"><p style="width:709px; text-align:center;font-size:18px;"><?php echo $this->session->flashdata('message'); ?></p>
                                    </div>
                                <?php } ?>
                            </span>
                        </span>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
<input id="activityReminder" class="hide noprint" value="60" type="hidden">
<div id="userfeedback" class="feedback noprint">

</div>
<footer class="noprint">
    <p style="margin-top:5px;margin-bottom:0;" align="center">
        <a target="_blank" href="http://www.pure-chemical.com">Powered by Pure CRM 6.0.0 Beta ©2013 - 2018</a>&nbsp;|&nbsp;
    </p>
</footer>


<script type="text/javascript" src="<?= base_url() ?>public/js/html5.js"></script>
<script type="text/javascript" src="<?= base_url() ?>public/js/bootstrap-alert.js"></script>
<script type="text/javascript" src="<?= base_url() ?>public/js/bootstrap-tooltip.js"></script>
<script type="text/javascript" src="<?= base_url() ?>public/js/bootstrap-tab.js"></script>
<script type="text/javascript" src="<?= base_url() ?>public/js/bootstrap-collapse.js"></script>
<script type="text/javascript" src="<?= base_url() ?>public/js/bootstrap-modal.js"></script>
<script type="text/javascript" src="<?= base_url() ?>public/js/bootstrap-dropdown.js"></script>
<script type="text/javascript" src="<?= base_url() ?>public/js/bootstrap-popover.js"></script>
<script type="text/javascript" src="<?= base_url() ?>public/js/bootbox.js"></script>




<!-- Added in the end since it should be after less file loaded -->

</body>
</html>
