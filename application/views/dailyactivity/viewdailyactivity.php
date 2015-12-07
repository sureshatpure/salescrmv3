<!DOCTYPE html>
<html>
    <head>
        <title>Dailyactivity</title>

        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="<?= base_url() ?>public/css/chosen.css" type="text/css" media="screen">
        <link rel="stylesheet" href="<?= base_url() ?>public/css/jquery-ui-1.css" type="text/css" media="screen">
        <link rel="stylesheet" href="<?= base_url() ?>public/css/select2.css" type="text/css" media="screen">
        <link rel="stylesheet" href="<?= base_url() ?>public/css/bootstrap.css" type="text/css" media="screen">
        <link rel="stylesheet" href="<?= base_url() ?>public/css/styles.css" type="text/css" media="screen">
        <link rel="stylesheet" href="<?= base_url() ?>public/css/validationEngine.css">
        <link rel="stylesheet" href="<?= base_url() ?>public/css/select2.css">
        <link rel="stylesheet" href="<?= base_url() ?>public/css/guiders-1.css">
        <link rel="stylesheet" href="<?= base_url() ?>public/css/jquery_002.css">
        <link rel="stylesheet" href="<?= base_url() ?>public/css/jquery_003.css">
        <link rel="stylesheet" media="screen" type="text/css" href="<?= base_url() ?>public/css/datepicker.css">
        <link rel="stylesheet" href="<?= base_url() ?>public/css/style.css" type="text/css" media="screen">
        <link rel="stylesheet" href="<?= base_url() ?>public/css/jquery.css" type="text/css" media="screen">
        <script type="text/javascript" src="<?= base_url() ?>public/js/jquery_007.js"></script>
        <script type="text/javascript" src="<?= base_url() ?>public/jquery/jqueryui.js"></script>
        <script type="text/javascript" src="<?= base_url() ?>public/js/jquery.min.js"></script>
        <script type="text/javascript" src="<?= base_url() ?>public/js/jquery.validate.min.js"></script>
    </head>
    <body>

        <div id="page"><!-- container which holds data temporarly for pjax calls -->
            <div id="pjaxContainer" class="hide noprint"></div>
            <div class="navbar navbar-fixed-top  navbar-inverse noprint" style="min-width:1050px">
                <!-- start includes --> 
                <?php $this->load->view('menu'); ?>
                <!-- start includes --> 


                <!-- jqwidgets scripts -->
                <link rel="stylesheet" href="<?= base_url() ?>public/jqwidgets/styles/jqx.base.css" type="text/css" />
                <link rel="stylesheet" href="<?= base_url() ?>public/jqwidgets/styles/jqx.energyblue.css" type="text/css" />
                <link rel="stylesheet" href="<?= base_url() ?>public/jqwidgets/styles/jqx.classic.css" type="text/css" />
                
                <style type="text/css">
                    .editedRow {
                        color: #b90f0f;
                        font-style: italic;
                    }

                </style>

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
                <script type="text/javascript" src="<?= base_url() ?>public/jqwidgets/jqxnumberinput.js"></script>
                <script type="text/javascript" src="<?= base_url() ?>public/jqwidgets/jqxwindow.js"></script>
                <script type="text/javascript" src="<?= base_url() ?>public/jqwidgets/jqxcalendar.js"></script>
                <script type="text/javascript" src="<?= base_url() ?>public/jqwidgets/jqxinput.js"></script> 
                <script type="text/javascript" src="<?= base_url() ?>public/jqwidgets/jqxdatetimeinput.js"></script>


                <!-- sorting and filtering - start -->
                <script type="text/javascript" src="<?= base_url() ?>public/jqwidgets/jqxgrid.sort.js"></script>
                <script type="text/javascript" src="<?= base_url() ?>public/jqwidgets/jqxgrid.filter.js"></script>
                <script type="text/javascript" src="<?= base_url() ?>public/jqwidgets/jqxpanel.js"></script>
                <script type="text/javascript" src="<?= base_url() ?>public/jqwidgets/jqxcheckbox.js"></script>
                <script type="text/javascript" src="<?= base_url() ?>public/jqwidgets/jqxlistbox.js"></script>
                <script type="text/javascript" src="<?= base_url() ?>public/jqwidgets/jqxdropdownlist.js"></script>
                <script type="text/javascript" src="<?= base_url() ?>public/jqwidgets/jqxcombobox.js"></script>

                <script type="text/javascript" src="<?= base_url() ?>public/jqwidgets/jqxgrid.pager.js"></script>
                <script type="text/javascript" src="<?= base_url() ?>public/jqwidgets/jqxdata.export.js"></script> 
                <script type="text/javascript" src="<?= base_url() ?>public/jqwidgets/jqxgrid.export.js"></script>


                <!-- sorting and filtering - end -->
                <!-- paging - start -->
                <script type="text/javascript" src="<?= base_url() ?>public/jqwidgets/jqxgrid.pager.js"></script>
                <!-- paging - end -->
                <!-- End of jqwidgets -->
                <link rel="stylesheet" href="<?= base_url() ?>public/jqwidgets/styles/jqx.black.css" type="text/css" />
                <script type="text/javascript">
                    function openpopup(id)
                    {
                        // alert("company id passed is "+id);
                        $('#jqxsoc').jqxWindow('open');
                        $("#jqxsoc").jqxWindow({width: 600, height: 220, isModal: true});

                    }
                    var actionmode;
                    var base_url = '<?php echo site_url(); ?>';
                    function _createElements()
                    {
                        // alert("action mode in _createElements  "+actionmode);
                        // code start for view formdetail window
                        $('#customWindow').jqxWindow({theme: 'energyblue', showCollapseButton: true, autoOpen: false, width: 1013, height: 400, resizable: true, title: 'View Daily Call Activity&nbsp;&nbsp;<input id="update_add_row"  class="jqx-rc-all jqx-rc-all-energyblue jqx-button jqx-button-energyblue jqx-widget jqx-widget-energyblue jqx-fill-state-normal jqx-fill-state-normal-energyblue" type="button" class="jqx-rc-all jqx-rc-all-energyblue jqx-button jqx-button-energyblue jqx-widget jqx-widget-energyblue jqx-fill-state-normal jqx-fill-state-normal-energyblue" value="Add New Row" />&nbsp;&nbsp;<input id="update_delete_row" type="button" class="jqx-rc-all jqx-rc-all-energyblue jqx-button jqx-button-energyblue jqx-widget jqx-widget-energyblue jqx-fill-state-normal jqx-fill-state-normal-energyblue" value="Delete Selected Row" />&nbsp;&nbsp;<input id="addnewprod_add"   class="jqx-rc-all jqx-rc-all-energyblue jqx-button jqx-button-energyblue jqx-widget jqx-widget-energyblue jqx-fill-state-normal jqx-fill-state-normal-energyblue addnewprod_add" type="button" value="Add New Product" />&nbsp;&nbsp;<input id="update_data"  class="jqx-rc-all jqx-rc-all-energyblue jqx-button jqx-button-energyblue jqx-widget jqx-widget-energyblue jqx-fill-state-normal jqx-fill-state-normal-energyblue"  type="button" value="Update" />&nbsp;&nbsp;<input id="excelExport"  class="jqx-rc-all jqx-rc-all-energyblue jqx-button jqx-button-energyblue jqx-widget jqx-widget-energyblue jqx-fill-state-normal jqx-fill-state-normal-energyblue" type="button" class="jqx-rc-all jqx-rc-all-energyblue jqx-button jqx-button-energyblue jqx-widget jqx-widget-energyblue jqx-fill-state-normal jqx-fill-state-normal-energyblue" title="Currently you cannot export all the data,instead filter the data and try to use Export to Excel option"   alt="Currently you cannot export all the data,instead filter the data and try to use Export to Excel option" value="Export to Excel"/>',
                            initContent: function () {
                                $('#jqxgrid_n').jqxGrid({disabled: false});
                            }
                        })

                        // code start for view formdetail window

                        // code end for view formdetail window
                        // code start for add window
                        $('#addWindow').jqxWindow({theme: 'energyblue', autoOpen: false, showCollapseButton: true, height: 400, resizable: true, title: 'Add Daily Call Activity&nbsp;&nbsp; <input id="addrowbutton"  class="jqx-rc-all jqx-rc-all-energyblue jqx-button jqx-button-energyblue jqx-widget jqx-widget-energyblue jqx-fill-state-normal jqx-fill-state-normal-energyblue" type="button" value="Add New Row" />&nbsp;&nbsp;<input id="deleterowbutton"  class="jqx-rc-all jqx-rc-all-energyblue jqx-button jqx-button-energyblue jqx-widget jqx-widget-energyblue jqx-fill-state-normal jqx-fill-state-normal-energyblue" type="button" value="Delete Selected Row" />&nbsp;&nbsp;<input id="addnewprod"  class="jqx-rc-all jqx-rc-all-energyblue jqx-button jqx-button-energyblue jqx-widget jqx-widget-energyblue jqx-fill-state-normal jqx-fill-state-normal-energyblue addnewprod" type="button" value="Add New Product" />&nbsp;&nbsp;<input id="save"  class="jqx-rc-all jqx-rc-all-energyblue jqx-button jqx-button-energyblue jqx-widget jqx-widget-energyblue jqx-fill-state-normal jqx-fill-state-normal-energyblue" type="button" value="Save Data" />',
                            initContent: function () {
                                $('#jqxgrid_add').jqxGrid({disabled: false, width: 790, theme: 'energyblue'});
                            },position: 'top, left'
                        });
                        // code end for add window
                    }
                    ;
                    $(document).ready(function ()
                    {
                        var theme = "";
                        // Create a jqxMenu
                        $("#jqxMenu").jqxMenu({width: '670', height: '30px', theme: 'black'});
                        $("#jqxMenu").css('visibility', 'visible');
                        $('#customWindow').hide();

                        $("#popupWindow").jqxWindow({ width: 360,height: 101, title:'Select the Appointment Date', resizable: false, theme: 'energyblue', isModal: true, autoOpen: false,cancelButton: $("#Cancel"), modalOpacity: 0.01 });
                            $("#appiontment_date").jqxDateTimeInput({ width: '107px',height: '41px',formatString: 'dd/MM/yyyy' });
                            $("#appiontment_date").val(null);
                        $("#popupWindowNot").jqxWindow({ width: 360,height: 101, title:'Enter the reason for not able to get the appiontment', resizable: false, theme: 'energyblue', isModal: true, autoOpen: false,cancelButton: $("#Cancel"), modalOpacity: 0.01 });
                        $("#popupWindowReject").jqxWindow({ width: 360,height: 101, title:'Enter the reason for Sample Rejected', resizable: false, theme: 'energyblue', isModal: true, autoOpen: false,cancelButton: $("#Cancel"), modalOpacity: 0.01 });
                        $("#popupWindowOrdercancel").jqxWindow({ width: 360,height: 101, title:'Enter the reason for Order cancelled', resizable: false, theme: 'energyblue', isModal: true, autoOpen: false,cancelButton: $("#Cancel"), modalOpacity: 0.01 });
                        $("#popupWindowSoc").jqxWindow({ width: 800, height: 340, title:'select the SOC Number', resizable: true, theme: 'classic', isModal: true, autoOpen: false,cancelButton: $("#Cancel"), modalOpacity: 0.01 });

                        
                            $("#not_able_to_get_appointment").jqxInput({ width: 107,height:41});
                            $("#sample_rejected_reason").jqxInput({ width: 107,height:41});
                            $("#order_cancelled_reason").jqxInput({ width: 107,height:41});
                            $("#crm_soc_number").jqxInput({ width: 107,height:28});
                            
                            var validateProductName = $('#validateProductName');
                            var validateProductName_add = $('#validateProductName_add');
                            
                            
                        var dhdr_headerid;
                        var header_date;
                        var hide_update_button;
                        var potential_quantity;
                        var noofleads;
                        var resulttype;
                        var lead_salestype;
                        var lead_email_id;
                        var gl_customername;
                        var gl_productname;
                        //var leadlistdataAdapter;
                        var listdataAdapter;
                        var g_noofleads;
                        var jqxgrid_n_row;


                        var permission = <?php echo $grpperm; ?>;
                        var group_len = permission.length;
                        hide_update_button = 1;

                        var currentdate;
                        
                        $('#win_selectItemMaster').jqxWindow({ autoOpen:false}); 
                        $('#win_selectCustMaster').jqxWindow({ autoOpen:false}); 
                        $('#win_newproduct').jqxWindow({ autoOpen:false}); 
                        $('#win_selectCustMaster').jqxWindow('bringToFront');
                        $("#update_add_row").jqxButton({theme: 'black', width: '150', height: '25'});
                        $("#jqxgrid_add").jqxGrid({theme: 'energyblue'});
                        _createElements(); // to open custom popup window when edit is clicked
                        var theme = "energyblue";
                        // prepare the data
                        var commonCols = new Array();
                        var editedRows = new Array();
                        var data = <?php echo $data; ?>;

                        if (data.length > 0)
                        {
                            var username = data[0].exename;
                            var branch = data[0].branch;
                        }
                        var username = "";
                        var branch = "";
                        var source =
                                {
                                    localdata: data,
                                    datatype: "array",
                                    datafields:
                                            [
                                                {name: 'id', type:'number'},
                                                {name: 'currentdate', type: 'datetime'},
                                                {name: 'execode', type: 'string'},
                                                {name: 'exename', type: 'string'},
                                                {name: 'branch', type: 'string'},
                                                {name: 'creationdate', type: 'datetime'},
                                            ],
                                    pagenum: 0, pagesize: 35, pager: function (pagenum, pagesize, oldpagenum) {
                                        // callback called when a page or page size is changed.
                                    }
                                };
                        // initialize the input fields.
                        $("#itemgroup").addClass('jqx-input');
                        $("#customgroup").addClass('jqx-input');

                        $("#itemgroup").width(150);
                        $("#customgroup").height(23);

                        if (theme.length > 0) {
                            $("#itemgroup").addClass('jqx-input-' + theme);
                            $("#customgroup").addClass('jqx-input-' + theme);

                        }
                        $("#excelExport").jqxButton({
                                theme: 'energyblue'
                            });

                            $("#excelExport").click(function () {
                               $("#jqxgrid_n").jqxGrid('exportdata', 'xls', 'dailyactivity');
                              //   dashboard/savefile');
                            });
                var url = "dailyactivity/getcollectors";
                // prepare the data
                var collectorsource =
                {
                    datatype: "json",
                    datafields: [
                        { name: 'collector' },
                        { name: 'collector' }
                    ],
                    url: url,
                    async: false
                };
                var collectordataAdapter = new $.jqx.dataAdapter(collectorsource);

                   $("#collector").jqxDropDownList({
                    selectedIndex: -1, source: collectordataAdapter,theme: 'energyblue',
      placeHolder: "Select Collector", displayMember: "collector",autoDropDownHeight:true, valueMember: "collector", width: 200, height: 25
                });
                   $("#collector_update").jqxDropDownList({
                    selectedIndex: -1, source: collectordataAdapter,theme: 'energyblue',
      placeHolder: "Select Collector", displayMember: "collector",autoDropDownHeight:true, valueMember: "collector", width: 200, height: 25
                });
                        /* change column type dynamic start*/
                        
                        var  Results ={

                               initResultsEditor: function(row){

                                  var data = $('#jqxgrid_add').jqxGrid('getrowdata', row);
                                  //alert("item group "+data.itemgroup);
                                  if(data.itemgroup==undefined)
                                  {
                                  //  alert("yes");
                                    data.result_type='Value';
                                  }
                                  
                                  if(data.result_type === 'Value')
                                    {
                                        this.columntype = 'textbox';
                                    } 

                                   else if(data.result_type === 'Select') 
                                   {
                                    this.columntype = 'dropdownlist';
                                   }
                               },

                               initResultsEditorat: function(row){
                                  var data = $('#jqxgrid_add').jqxGrid('getrowdata', row);
                                  if(data.result_type === 'Value')
                                    {
                                        this.columntype = 'dropdownlist';

                                    } 

                                   else if(data.result_type === 'Select') 
                                   {
                                    this.columntype = 'dropdownlist';
                                   // return false;
                                   }
                               },
                               initResultsEditorst: function(row){
                                  var data = $('#jqxgrid_add').jqxGrid('getrowdata', row);
                                  if(data.result_type === 'Value')
                                    {
                                        
                                          this.columntype ='dropdownlist';

                                    } 

                                   else if(data.result_type ==='Select') 
                                   {
                                    this.columntype='textbox';
                                    return false;

                                   }
                               },
                               initResultsEditorldst: function(row){
                                  var data = $('#jqxgrid_add').jqxGrid('getrowdata', row);
                                  if(data.result_type === 'Value')
                                    {
                                          this.columntype ='dropdownlist';
                                    } 

                                   else if(data.result_type ==='Select') 
                                   {
                                      this.columntype ='dropdownlist';
                                   // return false;

                                   }
                               },

                               initResultsEditorldsubst: function(row){
                                  var data = $('#jqxgrid_add').jqxGrid('getrowdata', row);
                                  if(data.result_type === 'Value')
                                    {
                                        
                                          this.columntype ='dropdownlist';

                                    } 

                                   else if(data.result_type ==='Select') 
                                   {
                                    this.columntype='dropdownlist';
                                  //  return false;

                                   }
                               },

                               
                               initResultsEditorcon: function(row){
                                  var data = $('#jqxgrid_add').jqxGrid('getrowdata', row);
                                  if(data.result_type === 'Value')
                                    {
                                        
                                          this.columntype ='dropdownlist';
                                    } 

                                   else if(data.result_type ==='Select') 
                                   {
                                    this.columntype='textbox';
                                    return false;
                                   }
                               },
                               resultsEditor: function(row, cellvalue, editor){
                                   var data = $('#jqxgrid_add').jqxGrid('getrowdata', row);
                                   var cust_grp = $('#jqxgrid_add').jqxGrid('getcellvalue', row, "custgroup");
                                   var prod_grp = $('#jqxgrid_add').jqxGrid('getcellvalue', row, "itemgroup");
                                  switch(data.result_type){
                                     case 'Value':
                                       editor.jqxInput({ placeHolder: "No Leads" });
                                       $.ajax({
                                                type: "POST",
                                                url: base_url + 'dailyactivity/checkduplicate_product/'+encodeURIComponent(cust_grp)+"/"+encodeURIComponent(prod_grp),
                                                data: 'prodgroup=' + encodeURIComponent(prod_grp) + '&customergroup=' + encodeURIComponent(cust_grp),
                                                dataType: 'json',
                                                success: function (response)
                                                {
                                                   // alert(response.msg);
                                                    if (response.ok == false) 
                                                    {
                                                        //  datevalidation=false;
                                                        //validateProductName.html(response.msg);
                                                             //alert("This product group has been already billed for this customer")

                                                             validateProductName_add.html(response.msg);
                                                            // editor.jqxCheckBox({ checked: false, hasThreeStates:false});
                                                            $("#jqxgrid_add").jqxGrid('setcellvalue', jqxgrid_add_row_index, "create_lead",0);
                                                            $("#jqxgrid_add").jqxGrid('setcellvalue', jqxgrid_add_row_index, "statusid",'No Status');
                                                            $("#jqxgrid_add").jqxGrid('setcellvalue', jqxgrid_add_row_index, "leadsubstatusid",'No Substatus');
                                                    }
                                                    else
                                                    {
                                                        // datevalidation=true;
                                                        validateProductName_add.html(response.msg);
                                                        $("#jqxgrid_add").jqxGrid('setcellvalue', jqxgrid_add_row_index, "create_lead",1);
                                                    }

                                                }
                                            })
                                     break;
                                     case 'Select':

                                     
                                            var list = {
                                                datatype: "json",
                                                datafields:
                                                        [
                                                            {name: 'id'},
                                                            {name: 'leadid'}
                                                        ],
                                                id: 'id',
                                                root: "leadid",
                                                url: base_url + "dailyactivity/getleadids/"+encodeURIComponent(cust_grp)+"/"+encodeURIComponent(prod_grp),
                                                cache: false,
                                                async: false
                                               
                                            };

                                            listdataAdapter = new $.jqx.dataAdapter(list, {
                                                autoBind: true,
                                                buildSelect: function (suboptions)
                                                {
                                                    
                                                     console.log(suboptions);
                                                    var data = new Array();
                                                    $.each(suboptions, function (id, value)
                                                    {
                                                        var list = records[i];
                                                        list.id = list.id;
                                                        list.leadid = list.leadid;
                                                        data.push(list);
                                                    });
                                                    return data;
                                                }
                                            });
                                    
                                    
                                        editor.jqxDropDownList(
                                            {
                                                source: listdataAdapter.records, displayMember: "id",autoDropDownHeight: true, valueMember: "leadid",promptText:"No Leads",selectedIndex:1,placeHolder: 'Select Leadid',renderer: function (index, label, value) 
                                                    {
                                                    //alert("value "+value);
                                                    var hrefUrl = base_url+'leads/viewleaddetails/' + value;
                                                    var option = '<div value="' + value + '"><a href="' + hrefUrl + '" target="_blank">' + value + '</a></div>';
                                                           return option;
                                                        
                                                    }
                                            });

                                              
                                             
                                     break;
                                     case 'Cascaded':
                                     break;
                                     default:
                                        alert('Unbound result type.... I dont know how to handle this!!!');
                                     break;
                                  }
                    
                               },
                               resultsEditorst: function(row, cellvalue, editor){
                                   var data = $('#jqxgrid_add').jqxGrid('getrowdata', row);
                                 //  var data.leadid = $('#jqxgrid_add').jqxGrid('getrowdata', row);
                     
                                  var leadid =data.leadid;
                                  var createLead =data.create_lead;
                                  switch(data.result_type){
                                     case 'Value':
                                      if(createLead==1)
                                      {
                                          geturl=base_url + "dailyactivity/getleadsalestype";
        
                                   var sale_tye_list = {
                                                datatype: "json",
                                                datafields:
                                                        [
                                                            {name: 'n_value_id'},
                                                            {name: 'n_value_displayname'}
                                                        ],
                                                id: 'n_value_id',
                                                root: "saletypeid",
                                                url: geturl,
                                                cache: false,
                                                async: false
                                               
                                            };

                                            sale_tye_listdataAdapter = new $.jqx.dataAdapter(sale_tye_list, {
                                                autoBind: true,
                                                buildSelect: function (suboptions)
                                                {
                                                    
                                                     console.log(suboptions);
                                                    var data = new Array();
                                                    $.each(suboptions, function (id, value)
                                                    {
                                                        var sale_tye_list = records[i];
                                                        sale_tye_list.statusid = list.statusid;
                                                        sale_tye_list.statusname = sale_tye_list.statusname;
                                                        data.push(sale_tye_list);
                                                    });
                                                    return data;
                                                }
                                            });
                                    
                                    
                                        editor.jqxDropDownList(
                                            {
                                                source: sale_tye_listdataAdapter.records, displayMember: "n_value_displayname",autoDropDownHeight: true, valueMember: "n_value_id",promptText:"Sales Type",selectedIndex:0,placeHolder: 'Select Type',renderer: function (index, label, value) 
                                                    {
                                                         var option = '<div value="' + value + '">' + label + '</div>';
                                                           return option;
                                                    }
                                            });
                                      }
                                      else
                                      {
                                        editor.jqxDropDownList(
                                        {source: ["Tanker", "Repacked", "Container", "Textile", "Leather", "Paper", "Exxon Speciality", "Lubricant", "Polymer", "Pure Speciality", "Others"]
                                        });
                                      }
                                       
                                     break;
                                     case 'Select':

                                        } // end of switch
                                            
                               },
                               resultsEditorldst: function(row, cellvalue, editor){
                                   var data = $('#jqxgrid_add').jqxGrid('getrowdata', row);
                                   var leadid =data.leadid;
                                  // alert("leadid in resultsEditorldst "+leadid);
                                   if (leadid!="")
                                    {
                                        geturl=base_url + "dailyactivity/getldstatusfor/"+leadid;
                                    }
                                    else
                                    {
                                        geturl=base_url + "dailyactivity/getldstatus";
                                        
                                    }
                                   var stslist = {
                                                datatype: "json",
                                                datafields:
                                                        [
                                                            {name: 'statusid'},
                                                            {name: 'statusname'}
                                                        ],
                                                id: 'statusid',
                                                root: "statusid",
                                                url: geturl,
                                                cache: false,
                                                async: false
                                               
                                            };

                                            stslistdataAdapter = new $.jqx.dataAdapter(stslist, {
                                                autoBind: true,
                                                buildSelect: function (suboptions)
                                                {
                                                    
                                                     console.log(suboptions);
                                                    var data = new Array();
                                                    $.each(suboptions, function (id, value)
                                                    {
                                                        var stslist = records[i];
                                                        stslist.statusid = list.statusid;
                                                        stslist.statusname = stslist.statusname;
                                                        data.push(stslist);
                                                    });
                                                    return data;
                                                }
                                            });
                                    
                                    
                                        editor.jqxDropDownList(
                                            {
                                                source: stslistdataAdapter.records, displayMember: "statusname",autoDropDownHeight: true, valueMember: "statusid",promptText:"Status",selectedIndex:0,placeHolder: 'Select status',renderer: function (index, label, value) 
                                                    {
                                                         var option = '<div value="' + value + '">' + label + '</div>';
                                                           return option;
                                                    }
                                            });
                               },
                               resultsEditorldsubst: function(row, cellvalue, editor){
                                   var data = $('#jqxgrid_add').jqxGrid('getrowdata', row);
                                //   alert(data.toSource());
                                   var status_name = data.statusid;
                                   var leadid =data.leadid;
                                    status_name = status_name.replace(/\//gi, "-");

                                  // alert("in initeditor addform substatus "+status_name);
                                    if (leadid!="")
                                    {
                                      //  geturl=base_url + "dailyactivity/getldsubstatusforlead/"+leadid;
                                      geturl=base_url + "dailyactivity/getldsubstatusbynameid/"+status_name+"/"+leadid;
                                    }
                                    else
                                    {
                                        geturl=base_url + "dailyactivity/getldsubstatusbyname/"+status_name;
                                        
                                    }
                                   var substslist = {
                                                datatype: "json",
                                                datafields:
                                                        [
                                                            {name: 'substatusid'},
                                                            {name: 'substatusname'}
                                                        ],
                                                id: 'substatusid',
                                                root: "substatusid",
                                                /*url: base_url + "dailyactivity/getldsubstatus",*/
                                                /*url: base_url + "dailyactivity/getldsubstatusbyname/"+status_name,*/
                                                 url: geturl,
                                                cache: false,
                                                async: false
                                               
                                            };

                                            substslistdataAdapter = new $.jqx.dataAdapter(substslist, {
                                                autoBind: true,
                                                buildSelect: function (suboptions)
                                                {
                                                    
                                                     console.log(suboptions);
                                                    var data = new Array();
                                                    $.each(suboptions, function (id, value)
                                                    {
                                                        var substslist = records[i];
                                                        substslist.substatusid = list.substatusid;
                                                        substslist.substatusname = substslist.substatusname;
                                                        data.push(substslist);
                                                    });
                                                    return data;
                                                }
                                            });
                                    
                                    
                                        editor.jqxDropDownList(
                                            {
                                                source: substslistdataAdapter.records, displayMember: "substatusname",autoDropDownHeight: true, valueMember: "substatusid",promptText:"SubStatus",selectedIndex:0,placeHolder: 'Select substatus',renderer: function (index, label, value) 
                                                    {
                                                         var option = '<div value="' + value + '">' + label + '</div>';
                                                           return option;
                                                    }
                                            });
                                            
                               },
                               resultsEditorcon: function(row, cellvalue, editor){

                                   var data = $('#jqxgrid_add').jqxGrid('getrowdata', row);
                                 //  var data.leadid = $('#jqxgrid_add').jqxGrid('getrowdata', row);
                  
                                 var leadid =data.leadid;
                                  switch(data.result_type){
                                     case 'Value':
                                       editor.jqxDropDownList(
                                        {source: ["E-mail", "Phone", "Visit"],autoDropDownHeight: true
                                        });
                                     break;
                                     case 'Select':

                                        } // end of switch
                                            
                               },
                               resultsEditorat: function(row, cellvalue, editor){
                                   var data = $('#jqxgrid_add').jqxGrid('getrowdata', row);
                                 //  var data.leadid = $('#jqxgrid_add').jqxGrid('getrowdata', row);
                         
                                  switch(data.result_type){
                                     case 'Value':
                                       editor.jqxDropDownList(
                                        {source: ["NEW CUSTOEMR", "EXSISTING CUSTOMER", "ORDER FOLLOWUP", "ORDER AND PAYMENT", "TENDER", "PAYMENT FOLLOW UP", "BALANCE SHEET", "TANKER  DIVERTION", "INVOICE", "PROFORM INVOICE", "PAYMENT COLLECTION"]
                                        });
                                     break;
                                     case 'Select':
                                         editor.jqxDropDownList({source: ["LEADS"],autoDropDownHeight: true,selectedIndex: 0});
                                 }           
                               },
                               renderUnits: function(row, columnfield, value, defaulthtml, columnproperties)
                               {
                                  var data = $('#jqxgrid_add').jqxGrid('getrowdata', row);
                                  if(data.result_type === 'Value' && data.result !== ''){
                                    
                                     defaulthtml = defaulthtml.replace(/>.+<\/div>/ , '>No Leads</div>');
                                
                                 }
                                  return defaulthtml;
                               },

                               renderUnitsat: function(row, columnfield, value, defaulthtml, columnproperties)
                               {
                 

                                  var data = $('#jqxgrid_add').jqxGrid('getrowdata', row);
                                  if(data.result_type === 'Select' && data.result !== '')
                                  {

                                     defaulthtml = defaulthtml.replace(/>.+<\/div>/ , '>LEADS</div>');
                    

                                 }
                               
                                  return defaulthtml;
                               },
                               renderUnitsst: function(row, columnfield, value, defaulthtml, columnproperties){
                                
                                  var data = $('#jqxgrid_add').jqxGrid('getrowdata', row);
                                  if(data.result_type === 'Select'){
                                     defaulthtml = defaulthtml.replace(/>.+<\/div>/ , '>'+ value +'</div>');

                                 }
                                
                                  return defaulthtml;
                               },
                               renderUnitsldst: function(row, columnfield, value, defaulthtml, columnproperties){
                                  var data = $('#jqxgrid_add').jqxGrid('getrowdata', row);
                                  /*if(data.result_type === 'Select'){
                                     defaulthtml = defaulthtml.replace(/>.+<\/div>/ , '>'+ value +'</div>');

                                 }*/
                                 defaulthtml = defaulthtml.replace(/>.+<\/div>/ , '>'+ value +'</div>');
                                
                                  return defaulthtml;
                               },
                               renderUnitsldsubst: function(row, columnfield, value, defaulthtml, columnproperties){
                                  var data = $('#jqxgrid_add').jqxGrid('getrowdata', row);
                                 /* if(data.result_type === 'Select'){
                                     defaulthtml = defaulthtml.replace(/>.+<\/div>/ , '>'+ value +'</div>');

                                 }*/
                                  defaulthtml = defaulthtml.replace(/>.+<\/div>/ , '>'+ value +'</div>');
                                  return defaulthtml;
                               }
                               
                              
                              };

                        /* change column type dynamic end*/
                            var  Resultsupdate ={
                               initResultsEditor: function (row, datafield, columntype) {
                            var rowdata = $("#jqxgrid_n").jqxGrid('getrowdata', row);
                            var cust_grp = rowdata.custgroup;
                            var prod_grp = rowdata.itemgroup;
                            var curr_poten = rowdata.potentialqty;
                           
                            if(cust_grp!="" && prod_grp!="")
                            {
                                //return true;
                                    var url = "dailyactivity/get_potentialquantity/"+encodeURIComponent(cust_grp)+"/"+encodeURIComponent(prod_grp);
                                        $.ajax({
                                            dataType: "html",
                                            url: url,
                                            type: "POST",
                                            async: false,
                                            cache:false,
                                            error: function (xhr, status) {
                                                alert("check " + status + " test");
                                            },
                                            success: function (result) {
                                                var obj = jQuery.parseJSON(result);
                                                rows = obj.rows;

                                                potential_quantity = rows[0].potential;
                                                noofleads =rows[0].noofleads;
                                                g_noofleads=noofleads;
                                                resulttype =rows[0].result_type;

                                                if(noofleads>0)
                                                {
                                                 this.columntype = 'dropdownlist'; 
                                                 $("#jqxgrid_n").jqxGrid('setcellvalue', row, "potentialqty", potential_quantity); 
                                                }
                                                else
                                                {
                                                     this.columntype = 'textbox';
                                                     potential_quantity =(potential_quantity >0) ? potential_quantity :curr_poten;
                                                    $("#jqxgrid_n").jqxGrid('setcellvalue', row, "potentialqty", potential_quantity);
                                                }

                                                
 
                                                
                                            }
                                        });

                                    
                                    $("#jqxgrid_n").jqxGrid('setcellvalue', row, "noofleads", noofleads);
                                    $("#jqxgrid_n").jqxGrid('setcellvalue', row, "result_type", resulttype);


                                        var data = $('#jqxgrid_n').jqxGrid('getrowdata', row);
                                          if(data.result_type === 'Value')
                                            {
                                                this.columntype = 'textbox';
                                            } 

                                           else if(data.result_type === 'Select') 
                                           {
                                            this.columntype = 'dropdownlist';
                                           }
                                
                            }
                            else
                            {
                                return false;
                            }

                        },
                               initResultsEditorat: function(row){
                                  var data = $('#jqxgrid_n').jqxGrid('getrowdata', row);
                                  if(data.result_type === 'Value')
                                    {
                                        this.columntype = 'dropdownlist';
                                    } 

                                   else if(data.result_type === 'Select') 
                                   {
                                    this.columntype = 'dropdownlist';
                                   }
                               },
                               initResultsEditorst: function(row){
                                  var data = $('#jqxgrid_n').jqxGrid('getrowdata', row);
                                  if(data.result_type === 'Value')
                                    {
                                        
                                          this.columntype ='dropdownlist';
                                    } 

                                   else if(data.result_type ==='Select') 
                                   {
                                    this.columntype='textbox';
                                   }
                               },
                                initResultsEditorldst_update: function(row){
                                  var data = $('#jqxgrid_n').jqxGrid('getrowdata', row);
                                  var cust_grp = data.custgroup;
                                  var prod_grp = data.itemgroup;
                                  var curr_poten = data.potentialqty;
                                  var leadstatus = data.leadstatusid;
                                  alert("leadstatus "+leadstatus);
                                  if(data.result_type === 'Value')
                                    {
                                          this.columntype ='dropdownlist';
                                           if (leadstatus=='No Status')
                                            {
                                                return false;
                                            }
                                            else
                                            {
                                               /* if(cust_grp!="" && prod_grp!="")
                                                {
                                                    //return true;
                                                        var url = "dailyactivity/get_potentialquantity/"+encodeURIComponent(cust_grp)+"/"+encodeURIComponent(prod_grp);
                                                            $.ajax({
                                                                dataType: "html",
                                                                url: url,
                                                                type: "POST",
                                                                async: false,
                                                                cache:false,
                                                                error: function (xhr, status) {
                                                                    alert("check " + status + " test");
                                                                },
                                                                success: function (result) {
                                                                    var obj = jQuery.parseJSON(result);
                                                                    rows = obj.rows;

                                                                    potential_quantity = rows[0].potential;
                                                                    noofleads =rows[0].noofleads;
                                                                    g_noofleads=noofleads;
                                                                    resulttype =rows[0].result_type;

                                                                    if(noofleads>0)
                                                                    {
                                                                     this.columntype = 'dropdownlist'; 
                                                                     $("#jqxgrid_n").jqxGrid('setcellvalue', row, "potentialqty", potential_quantity); 
                                                                    }
                                                                    else
                                                                    {
                                                                         this.columntype = 'dropdownlist';
                                                                         potential_quantity =(potential_quantity >0) ? potential_quantity :curr_poten;
                                                                        $("#jqxgrid_n").jqxGrid('setcellvalue', row, "potentialqty", potential_quantity);
                                                                    }

                                                                    

                                                                    
                                                                }
                                                            });

                                                        
                                                        $("#jqxgrid_n").jqxGrid('setcellvalue', row, "noofleads", noofleads);
                                                        $("#jqxgrid_n").jqxGrid('setcellvalue', row, "result_type", resulttype);


                                                            var data = $('#jqxgrid_n').jqxGrid('getrowdata', row);
                                                              if(data.result_type === 'Value')
                                                                {
                                                                    this.columntype = 'textbox';
                                                                } 

                                                               else if(data.result_type === 'Select') 
                                                               {
                                                                this.columntype = 'dropdownlist';
                                                               }
                                                    
                                                }  */
                                            }
                                    } 

                                   else if(data.result_type ==='Select') 
                                   {
                                      this.columntype ='dropdownlist';
                                   // return false;
                                       if (leadstatus=='No Status')
                                        {
                                            return false;
                                        }
                                        else
                                        {
                                   /*   if(cust_grp!="" && prod_grp!="")
                                            {
                                                //return true;
                                                    var url = "dailyactivity/get_potentialquantity/"+encodeURIComponent(cust_grp)+"/"+encodeURIComponent(prod_grp);
                                                        $.ajax({
                                                            dataType: "html",
                                                            url: url,
                                                            type: "POST",
                                                            async: false,
                                                            cache:false,
                                                            error: function (xhr, status) {
                                                                alert("check " + status + " test");
                                                            },
                                                            success: function (result) {
                                                                var obj = jQuery.parseJSON(result);
                                                                rows = obj.rows;

                                                                potential_quantity = rows[0].potential;
                                                                noofleads =rows[0].noofleads;
                                                                g_noofleads=noofleads;
                                                                resulttype =rows[0].result_type;

                                                                if(noofleads>0)
                                                                {
                                                                 this.columntype = 'dropdownlist'; 
                                                                 $("#jqxgrid_n").jqxGrid('setcellvalue', row, "potentialqty", potential_quantity); 
                                                                }
                                                                else
                                                                {
                                                                     this.columntype = 'dropdownlist';
                                                                     potential_quantity =(potential_quantity >0) ? potential_quantity :curr_poten;
                                                                    $("#jqxgrid_n").jqxGrid('setcellvalue', row, "potentialqty", potential_quantity);
                                                                }

                                                                

                                                                
                                                            }
                                                        });

                                                    
                                                    $("#jqxgrid_n").jqxGrid('setcellvalue', row, "noofleads", noofleads);
                                                    $("#jqxgrid_n").jqxGrid('setcellvalue', row, "result_type", resulttype);


                                                        var data = $('#jqxgrid_n').jqxGrid('getrowdata', row);
                                                          if(data.result_type === 'Value')
                                                            {
                                                                this.columntype = 'textbox';
                                                            } 

                                                           else if(data.result_type === 'Select') 
                                                           {
                                                            this.columntype = 'dropdownlist';
                                                           }
                                                
                                            }*/
                                        }

                                   }
                                    /*var data = $('#jqxgrid_n').jqxGrid('getrowdata', row);
                                  //  var rowdata = $("#jqxgrid_n").jqxGrid('getrowdata', row);
                                    var cust_grp = data.custgroup;
                                    var prod_grp = data.itemgroup;
                                    var curr_poten = data.potentialqty;
                                    var leadstatus = data.leadstatusid;
                                   // alert("leadstatus "+leadstatus);
                                    if (leadstatus=='No Status')
                                    {
                                        return false;
                                    }
                                    else
                                    {
                                            if(cust_grp!="" && prod_grp!="")
                                            {
                                                //return true;
                                                    var url = "dailyactivity/get_potentialquantity/"+encodeURIComponent(cust_grp)+"/"+encodeURIComponent(prod_grp);
                                                        $.ajax({
                                                            dataType: "html",
                                                            url: url,
                                                            type: "POST",
                                                            async: false,
                                                            cache:false,
                                                            error: function (xhr, status) {
                                                                alert("check " + status + " test");
                                                            },
                                                            success: function (result) {
                                                                var obj = jQuery.parseJSON(result);
                                                                rows = obj.rows;

                                                                potential_quantity = rows[0].potential;
                                                                noofleads =rows[0].noofleads;
                                                                g_noofleads=noofleads;
                                                                resulttype =rows[0].result_type;

                                                                if(noofleads>0)
                                                                {
                                                                 this.columntype = 'dropdownlist'; 
                                                                 $("#jqxgrid_n").jqxGrid('setcellvalue', row, "potentialqty", potential_quantity); 
                                                                }
                                                                else
                                                                {
                                                                     this.columntype = 'dropdownlist';
                                                                     potential_quantity =(potential_quantity >0) ? potential_quantity :curr_poten;
                                                                    $("#jqxgrid_n").jqxGrid('setcellvalue', row, "potentialqty", potential_quantity);
                                                                }

                                                                

                                                                
                                                            }
                                                        });

                                                    
                                                    $("#jqxgrid_n").jqxGrid('setcellvalue', row, "noofleads", noofleads);
                                                    $("#jqxgrid_n").jqxGrid('setcellvalue', row, "result_type", resulttype);


                                                        var data = $('#jqxgrid_n').jqxGrid('getrowdata', row);
                                                          if(data.result_type === 'Value')
                                                            {
                                                                this.columntype = 'textbox';
                                                            } 

                                                           else if(data.result_type === 'Select') 
                                                           {
                                                            this.columntype = 'dropdownlist';
                                                           }
                                                
                                            }
                                            else
                                            {
                                                return false;
                                            }
                                    }*/
                                    
                               },

                               initResultsEditorldsubst: function(row){
                                  var data = $('#jqxgrid_n').jqxGrid('getrowdata', row);
                                   var leadsubstatus = data.leadsubstatusid;
                                  //  alert("leadsubstatus "+leadsubstatus);
                                    if (leadsubstatus=='No Substatus')
                                    {
                                        return false;
                                    }
                                    else
                                    {
                                        if(data.result_type === 'Value')
                                            {
                                                
                                                  this.columntype ='dropdownlist';

                                            } 

                                           else if(data.result_type ==='Select') 
                                           {
                                            this.columntype='dropdownlist';
                                          //  return false;

                                           }
                                    }
                                  
                               },
                               initResultsEditorcon: function(row){
                                  var data = $('#jqxgrid_n').jqxGrid('getrowdata', row);
                                  if(data.result_type === 'Value')
                                    {
                                        
                                          this.columntype ='dropdownlist';
                                    } 

                                   else if(data.result_type ==='Select') 
                                   {
                                    this.columntype='textbox';
                                   }
                               },
                               resultsEditor: function(row, cellvalue, editor){
                                var data = $('#jqxgrid_n').jqxGrid('getrowdata', row);
                                var cust_grp = $('#jqxgrid_n').jqxGrid('getcellvalue', row, "custgroup");
                                var prod_grp = $('#jqxgrid_n').jqxGrid('getcellvalue', row, "itemgroup");

                                switch(data.result_type){
                                 case 'Value':
                                editor.jqxInput({ placeHolder: "No Leads" });
                                $.ajax({
                                        type: "POST",
                                        url: base_url + 'dailyactivity/checkduplicate_product/'+encodeURIComponent(cust_grp)+"/"+encodeURIComponent(prod_grp),
                                        data: 'prodgroup=' + encodeURIComponent(prod_grp) + '&customergroup=' + encodeURIComponent(cust_grp),
                                        dataType: 'json',
                                        success: function (response)
                                        {

                                            if (response.ok == false) 
                                            {
                                                //  datevalidation=false;
                                                //validateProductName.html(response.msg);
                                                     //alert("This product group has been already billed for this customer")
                                                     validateProductName.html(response.msg);
                                                    // editor.jqxCheckBox({ checked: false, hasThreeStates:false});
                                                    $("#jqxgrid_n").jqxGrid('setcellvalue', row, "create_lead",0);
                                            }
                                            else
                                            {
                                                // datevalidation=true;
                                                validateProductName.html(response.msg);
                                                $("#jqxgrid_n").jqxGrid('setcellvalue', row, "create_lead",1);
                                            }

                                        }
                                    })
                                     break;
                                     case 'Select':

                                            var cust_grp = $('#jqxgrid_n').jqxGrid('getcellvalue', row, "custgroup");
                                            var prod_grp = $('#jqxgrid_n').jqxGrid('getcellvalue', row, "itemgroup");
                                            var list = {
                                                datatype: "json",
                                                datafields:
                                                        [
                                                            {name: 'id'},
                                                            {name: 'leadid'}
                                                        ],
                                                id: 'id',
                                                root: "leadid",
                                                url: base_url + "dailyactivity/getleadids/"+encodeURIComponent(cust_grp)+"/"+encodeURIComponent(prod_grp),
                                                cache: false,
                                                async: false
                                            };

                                            listdataAdapter = new $.jqx.dataAdapter(list, {
                                                autoBind: true,
                                                buildSelect: function (suboptions)
                                                {
                                                    
                                                     console.log(suboptions);
                                                    var data = new Array();
                                                    $.each(suboptions, function (id, value)
                                                    {
                                                        var list = records[i];
                                                        list.id = list.id;
                                                        list.leadid = list.leadid;
                                                        data.push(list);
                                                    });
                                                    return data;
                                                }
                                            });
                                   
                                        editor.jqxDropDownList(
                                            {
                                                source: listdataAdapter.records, displayMember: "id",autoDropDownHeight: true, valueMember: "leadid",promptText:"No Leads",selectedIndex:1,placeHolder: 'Select Leadid',renderer: function (index, label, value) 
                                                    {
                                                    //alert("value "+value);
                                        var hrefUrl = base_url+'leads/viewleaddetails/' + value;
                              //  var option = '<option value="'+value+'"><a href="'+hrefUrl+'" target="_blank">'+value+'</a></option>';
                                var option = '<div value="' + value + '"><a href="' + hrefUrl + '" target="_blank">' + value + '</a></div>';
                                                           return option;
                                                        
                                                    }
                                            });
                            /* load status on loading start*/

                            /* load status on loading end*/
                                            
                                             
                                     break;
                                     case 'Cascaded':
                                     break;
                                     default:
                                        alert('Unbound result type.... I dont know how to handle this!!!');
                                     break;
                                  }
                    
                               },
                                resultsEditorst: function(row, cellvalue, editor)
                                {
                                      var data = $('#jqxgrid_n').jqxGrid('getrowdata', row);
                                      var leadid =data.leadid;
                                      var createLead =data.create_lead;
                                      switch(data.result_type){
                                         case 'Value':
                                          if(createLead==1)
                                          {
                                              geturl=base_url + "dailyactivity/getleadsalestype";
                                               var sale_tye_list = {
                                                    datatype: "json",
                                                    datafields:
                                                            [
                                                                {name: 'n_value_id'},
                                                                {name: 'n_value_displayname'}
                                                            ],
                                                    id: 'n_value_id',
                                                    root: "saletypeid",
                                                    url: geturl,
                                                    cache: false,
                                                    async: false
                                                   
                                                };

                                                sale_tye_listdataAdapter = new $.jqx.dataAdapter(sale_tye_list, {
                                                    autoBind: true,
                                                    buildSelect: function (suboptions)
                                                    {
                                                        
                                                         console.log(suboptions);
                                                        var data = new Array();
                                                        $.each(suboptions, function (id, value)
                                                        {
                                                            var sale_tye_list = records[i];
                                                            sale_tye_list.statusid = list.statusid;
                                                            sale_tye_list.statusname = sale_tye_list.statusname;
                                                            data.push(sale_tye_list);
                                                        });
                                                        return data;
                                                    }
                                                });
                                        
                                        
                                            editor.jqxDropDownList(
                                                {
                                                    source: sale_tye_listdataAdapter.records, displayMember: "n_value_displayname",autoDropDownHeight: true, valueMember: "n_value_id",promptText:"Sales Type",selectedIndex:0,placeHolder: 'Select Type',renderer: function (index, label, value) 
                                                        {
                                                             var option = '<div value="' + value + '">' + label + '</div>';
                                                               return option;
                                                        }
                                                });
                                          }
                                          else
                                          {
                                            editor.jqxDropDownList(
                                            {source: ["Tanker", "Repacked", "Container", "Textile", "Leather", "Paper", "Exxon Speciality", "Lubricant", "Polymer", "Pure Speciality", "Others"]
                                            });
                                          }
                                           
                                         break;
                                         case 'Select':

                                            } // end of switch
                                                
                                   },
                               resultsEditorldst_update: function(row, cellvalue, editor){
                                 var data = $('#jqxgrid_n').jqxGrid('getrowdata', row);
                                 jqxgrid_n_row =row;
                                   var leadid =data.leadid;
                                   //alert("leadid in update resultsEditorldst "+leadid);
                                   if (leadid!="" && leadid!='No Leads') 
                                    {
                                        geturl=base_url + "dailyactivity/getldstatusfor/"+leadid;
                                    }
                                    else
                                    {
                                        geturl=base_url + "dailyactivity/getldstatus";
                                        
                                    }
                                   var stslist = {
                                                datatype: "json",
                                                datafields:
                                                        [
                                                            {name: 'statusid'},
                                                            {name: 'statusname'}
                                                        ],
                                                id: 'statusid',
                                                root: "statusid",
                                                url: geturl,
                                                cache: false,
                                                async: false
                                               
                                            };

                                            stslistdataAdapter = new $.jqx.dataAdapter(stslist, {
                                                autoBind: true,
                                                buildSelect: function (suboptions)
                                                {
                                                    
                                                     console.log(suboptions);
                                                    var data = new Array();
                                                    $.each(suboptions, function (id, value)
                                                    {
                                                        var stslist = records[i];
                                                        stslist.statusid = list.statusid;
                                                        stslist.statusname = stslist.statusname;
                                                        data.push(stslist);
                                                    });
                                                    return data;
                                                }
                                            });
                                    
                                    
                                        editor.jqxDropDownList(
                                            {
                                                source: stslistdataAdapter.records, displayMember: "statusname",autoDropDownHeight: true, valueMember: "statusid",promptText:"Status",selectedIndex:0,placeHolder: 'Select status',renderer: function (index, label, value) 
                                                    {
                                                         var option = '<div value="' + value + '">' + label + '</div>';
                                                           return option;
                                                    }
                                            });

                                       
                                            
                               },
                               resultsEditorldsubst: function(row, cellvalue, editor){
                                   var data = $('#jqxgrid_n').jqxGrid('getrowdata', row);
                                //   var substatus_name = data.leadsubstatusid;
                                    jqxgrid_n_row =row;
                                   var status_name = data.leadstatusid;
                                     status_name = status_name.replace(/\//gi, "-");

                                   var leadid =data.leadid;
                                  // alert("in initeditor for update substatus "+status_name);
                                    if (leadid!="" && leadid!='No Leads')
                                    {
                                      //  geturl=base_url + "dailyactivity/getldsubstatusforlead/"+leadid;
                                      //geturl=base_url + "dailyactivity/getldsubstatusbynameid_update/"+status_name+"/"+leadid;
                                      geturl=base_url + "dailyactivity/getldsubstatusbynameid/"+status_name+"/"+leadid;
                                      
                                    }
                                    else
                                    {
                                        geturl=base_url + "dailyactivity/getldsubstatusbyname/"+status_name;
                                        
                                    }
                                   var substslist = {
                                                datatype: "json",
                                                datafields:
                                                        [
                                                            {name: 'substatusid'},
                                                            {name: 'substatusname'}
                                                        ],
                                                id: 'substatusid',
                                                root: "substatusid",
                                                /*url: base_url + "dailyactivity/getldsubstatus",*/
                                                /*url: base_url + "dailyactivity/getldsubstatusbyname/"+status_name,*/
                                                 url: geturl,
                                                cache: false,
                                                async: false
                                               
                                            };

                                            substslistdataAdapter = new $.jqx.dataAdapter(substslist, {
                                                autoBind: true,
                                                buildSelect: function (suboptions)
                                                {
                                                    console.log(suboptions);
                                                    var data = new Array();
                                                    $.each(suboptions, function (id, value)
                                                    {
                                                        var substslist = records[i];
                                                        substslist.substatusid = list.substatusid;
                                                        substslist.substatusname = substslist.substatusname;
                                                        data.push(substslist);
                                                    });
                                                    return data;
                                                }
                                            });
                                    
                                    
                                        editor.jqxDropDownList(
                                            {
                                                source: substslistdataAdapter.records, displayMember: "substatusname",autoDropDownHeight: true, valueMember: "substatusid",promptText:"SubStatus",selectedIndex:0,placeHolder: 'Select substatus',renderer: function (index, label, value) 
                                                    {
                                                         var option = '<div value="' + value + '">' + label + '</div>';
                                                           return option;
                                                    }
                                            });
                                            
                               },
                               resultsEditorcon: function(row, cellvalue, editor){
                                   var data = $('#jqxgrid_n').jqxGrid('getrowdata', row);
                                 //  var data.leadid = $('#jqxgrid_n').jqxGrid('getrowdata', row);
                  
                                 var leadid =data.leadid;
                                  switch(data.result_type){
                                     case 'Value':
                                       editor.jqxDropDownList(
                                        {source: ["E-mail", "Phone", "Visit"],autoDropDownHeight: true});
                                     break;
                                     case 'Select':

                                        } // end of switch
                                            
                               },
                               resultsEditorat: function(row, cellvalue, editor){
                                   var data = $('#jqxgrid_n').jqxGrid('getrowdata', row);
                                  switch(data.result_type){
                                     case 'Value':
                                       editor.jqxDropDownList(
                                        {source: ["NEW CUSTOEMR", "EXSISTING CUSTOMER", "ORDER FOLLOWUP", "ORDER AND PAYMENT", "TENDER", "PAYMENT FOLLOW UP", "BALANCE SHEET", "TANKER  DIVERTION", "INVOICE", "PROFORM INVOICE", "PAYMENT COLLECTION"]
                                        });
                                     break;
                                     case 'Select':
                                         editor.jqxDropDownList({source: ["LEADS"],autoDropDownHeight: true,selectedIndex:0});
                                 }           
                               },

                               renderUnits: function(row, columnfield, value, defaulthtml, columnproperties)
                               {
                                  var data = $('#jqxgrid_n').jqxGrid('getrowdata', row);
                                  if(data.result_type === 'Value' && data.result !== ''){
                                    
                                     defaulthtml = defaulthtml.replace(/>.+<\/div>/ , '>No Leads</div>');
                                
                                 }
                                  return defaulthtml;
                               },

                               renderUnitsldst_update:function(row, columnfield, value, defaulthtml, columnproperties)
                               {
                                  var data = $('#jqxgrid_n').jqxGrid('getrowdata', row);
                                /*  if(data.result_type === 'Value' && data.result !== ''){
                                    
                                     defaulthtml = defaulthtml.replace(/>.+<\/div>/ , '>No Leads</div>');
                                
                                 }*/
                                  defaulthtml = defaulthtml.replace(/>.+<\/div>/ , '>'+ value +'</div>');
                                  return defaulthtml;
                               },
                                renderUnitsldsubst: function(row, columnfield, value, defaulthtml, columnproperties){
                                  var data = $('#jqxgrid_n').jqxGrid('getrowdata', row);
                                 /* if(data.result_type === 'Select'){
                                     defaulthtml = defaulthtml.replace(/>.+<\/div>/ , '>'+ value +'</div>');

                                 }*/
                                  defaulthtml = defaulthtml.replace(/>.+<\/div>/ , '>'+ value +'</div>');
                                  return defaulthtml;
                               },
                               renderUnitsUpdate: function(row, columnfield, value, defaulthtml, columnproperties,editor)
                               {
                                  var data = $('#jqxgrid_n').jqxGrid('getrowdata', row);

                                  if(data.result_type === 'Value' && data.result !== ''){
                                    
                                     defaulthtml = defaulthtml.replace(/>.+<\/div>/ , '>No Leads</div>');
                                
                                 }
                                 else
                                 {
                                     
                                     alert("items "+editor.toSource());
                                 }
                                  return defaulthtml;
                                 
                               },

                               renderUnitsat: function(row, columnfield, value, defaulthtml, columnproperties)
                               {
                 

                                  var data = $('#jqxgrid_n').jqxGrid('getrowdata', row);
                                  if(data.result_type === 'Select' && data.result !== '')
                                  {
                                 
                                     defaulthtml = defaulthtml.replace(/>.+<\/div>/ , '>LEADS</div>');
                    

                                 }
                               
                                  return defaulthtml;
                               },
                               renderUnitsst: function(row, columnfield, value, defaulthtml, columnproperties){
                                  var data = $('#jqxgrid_n').jqxGrid('getrowdata', row);
                                  if(data.result_type === 'Select'){
                                     defaulthtml = defaulthtml.replace(/>.+<\/div>/ , '>'+ value +'</div>');

                                 }
                                
                                  return defaulthtml;
                               }
                              };
                        /* change column type dynamic update end*/
                        
                        


                        var dataAdapter = new $.jqx.dataAdapter(source);
                        var jqxgrid_add_row_index;
                        var jqxgrid_n_row_index;
                        // initialize jqxGrid
                        // alert ("current for udpate "+currentdate);
                        //     alert ("hidden update "+hide_update_button);
                        $("#username").jqxInput({placeHolder: "User Name", height: 25, width: 200, minLength: 1, theme: theme, disabled: true});

                        $("#branch").jqxInput({placeHolder: "Branch Name", height: 25, width: 150, minLength: 1, theme: theme, disabled: true});

                        $("#jqxgrid").jqxGrid(
                                {
                                    width: 760,
                                    height: 500,
                                    source: dataAdapter,
                                    theme: 'energyblue',
                                    sortable: true,
                                    pageable: true,
                                    columnsresize: true,
                                    editable: false,
                                    showfilterrow: true,
                                    filterable: true,
                                    autoheight: true,
                                    showtoolbar: true,
                                    pageable: true,
                                    rendertoolbar: toolbarfunc,
                                    columns: [
                                        {text: 'ID', datafield: 'id', width: 60},
                                        {
                                            text: 'Visit Date', datafield: 'currentdate', columntype: 'datetimeinput', width: 110, align: 'left', cellsalign: 'left', cellsformat: 'd', formatString: 'd'
                                                    /* , validation: function (cell, value) {
                                                     if (value == "")
                                                     return true;
                                                     
                                                     var year = value.getFullYear();
                                                     if (year >= 2014) {
                                                     return { result: false, message: "Ship Date should be before 1/1/2014" };
                                                     }
                                                     return true;
                                                     }*/
                                        },
                                        {text: 'User Code', columntype: 'dropdownlist', filterable: 'enable', datafield: 'execode', width: 75},
                                        {text: 'User Name', datafield: 'exename', width: 150, cellsalign: 'left'},
                                        {text: 'Branch', datafield: 'branch', width: 150, cellsalign: 'left'},
                                        {text: 'Created Date', datafield: 'creationdate', columntype: 'datetimeinput', width: 110, align: 'left', cellsalign: 'left', cellsformat: 'd', formatString: 'd'},
                                        {text: 'Update', cellsalign: 'center', datafield: 'Update', filterable: false, width: 100, columntype: 'button', cellsrenderer: function () {
                                                return "Update";
                                            }, buttonclick: function (row)
                                            { // popup function start
                                                actionmode = "update";
                                                var rowindex = $("#jqxgrid").jqxGrid('getselectedrowindex');
                                                var headerid = $("#jqxgrid").jqxGrid('getcellvalue', rowindex, 'id');
                                                header_date = $("#jqxgrid").jqxGrid('getcellvalue', rowindex, 'currentdate');
                                                username = $("#jqxgrid").jqxGrid('getcellvalue', rowindex, 'exename');
                                                branch = $("#jqxgrid").jqxGrid('getcellvalue', rowindex, 'branch');

                                                dhdr_headerid = headerid;

                                                $('#username').jqxInput('val', username);
                                                $('#branch').jqxInput('val', branch);

                                                var t = $('#hdn_hdr_id').val();

                                                $('#hdn_hdr_id').val(dhdr_headerid);
                                                var g = $('#hdn_hdr_id').val();

                                                var rows = new Array();
                                                var columns = new Array();
                                                jQuery.ajax({
                                                    dataType: "html",
                                                    url: 'dailyactivity/get_edit_data/' + headerid,
                                                    type: "POST",
                                                    async: false,
                                                    error: function (xhr, status) {
                                                        alert("check " + status + " test");
                                                    },
                                                    success: function (result) {
                                                        var obj = jQuery.parseJSON(result);
                                                        columns = obj[0].columns;
                                                        rows = obj[1].rows;

                                                        commonCols = obj[0].columns;
                                                    }
                                                });

                                                var source =
                                                        {
                                                            datatype: "json",
                                                            datafields: [],
                                                            id: 'id',
                                                            localdata: rows
                                                        };

                                                var dataAdapter = new $.jqx.dataAdapter(source);
                                                header_date = convert(header_date);

                                                $('#update_header_date').jqxInput({width: '100px', height: '25px', disabled: true});

                                                $('#update_header_date').val(header_date);

                                                $("#jqxgrid_n").jqxGrid(
                                                        {
                                                            width: '100%',
                                                            height: 300,
                                                            source: dataAdapter,
                                                            theme: 'energyblue',
                                                            columnsresize: true,
                                                            selectionmode: 'rowselect',
                                                            editable: true,
                                                            editmode: 'click',
                                                            sortable: true,
                                                            pageable: true,
                                                            columnsresize: true,
                                                            sortable: true,
                                                            showfilterrow: false,
                                                            filterable: true,
                                                            columns: [
                                                                {text: 'UID', datafield: 'id', width: 150, cellsalign: 'left', hidden: true},
                                                                {text: 'LineId', datafield: 'line_id', width: 150, cellsalign: 'left', hidden: true},
                                                                {text: 'Customer Group', datafield: 'custgroup', width: 150, editable: false},
                                                                {text: 'Cust Id', datafield: 'custid', width: 100, editable: false,hidden: true},
                                                                {text: 'Product Group', datafield: 'itemgroup', width: 150, cellsalign: 'left', editable: false},
                                                                {text: 'Prod Id', datafield: 'itemid', width: 100, editable: false,hidden: true},
                                                                {text: 'Lead id', datafield: 'leadid',cellsformat:'n', displayfield: 'leadid', width: 127, cellsalign: 'center', cellbeginedit: Resultsupdate.initResultsEditor, initeditor: Resultsupdate.resultsEditor, cellsrenderer: Resultsupdate.renderUnits,promptText:'Select Leadid',cellvaluechanging: function (row, datafield, columntype, oldvalue, newvalue) 
                                                                        {
                                                                           // alert("oldvalue "+oldvalue); alert("newvalue "+newvalue);
                                                                              if (newvalue == 0) {
                                                                               return oldvalue;
                                                                          }
                                                                        }
                                                                },
                                                                {text: 'noofleads', datafield: 'noofleads',hidden:true, width: 20, cellsalign: 'left', editable: false},
                                                                {text: 'result_type', datafield: 'result_type',hidden:true, width: 75, cellsalign: 'left', editable: false},
                                                                { text: 'Create Lead', datafield: 'create_lead', hidden:true, width: 20, cellsalign: 'left', editable: false},
                                                                {text: 'Status', datafield: 'leadstatusid', width: 150, cellsalign: 'center', cellbeginedit:Resultsupdate.initResultsEditorldst_update, initeditor: Resultsupdate.resultsEditorldst_update, cellsrenderer: Resultsupdate.renderUnitsldst_update,promptText:'Select Status',
                                                                                    cellvaluechanging: function (row, datafield, columntype, oldvalue, newvalue) 
                                                                                    {
                                                                                       // alert("oldvalue "+oldvalue); alert("newvalue "+newvalue);
                                                                                          if (newvalue == 0)  {
                                                                                           return oldvalue;
                                                                                      } 
                                                                                       else if (newvalue!=oldvalue && newvalue!='Expanding And Build Relationship')
                                                                                       {
                                                                                       $("#jqxgrid_n").jqxGrid('setcellvalue', row, "leadsubstatusid", "Select Substatus");
                                                                                        return newvalue;
                                                                                       }
                       /*get soc number start*/
                       else if (newvalue!=oldvalue && newvalue=='Expanding And Build Relationship')
                        {
                            $("#jqxgrid_n").jqxGrid('setcellvalue', row, "leadsubstatusid", "Expanding And Build Relationship");
                           // alert("in update form to get soc number");
                            var data = $('#jqxgrid_n').jqxGrid('getrowdata', row);
                            var url;
                                var cust_grp =data.custgroup;
                                //alert("customer group "+cust_grp);
                                var prodgroup =data.itemgroup;
                              //  alert("item group "+prodgroup);
                               url= base_url + 'dailyactivity/getsynchedproducts/'+cust_grp+'/'+prodgroup;
                                 
                                            var rows = {};
                                            jQuery.ajax({
                                                dataType: "html",
                                                url: url,
                                                type: "POST",
                                                async: false,
                                                error: function (xhr, status) {
                                                    //  alert("check "+status+" test");
                                                },
                                                success: function (result) {
                                                    //  console.log(result);
                                                    var obj = jQuery.parseJSON(result);
                                                    rows = obj.rows;
                                                    //   rows = obj[1].rows;
                                                    //  commonCols=obj[0].columns;
                                                }
                                            });


                                          var source =
                                                        {
                                                            datatype: "json",
                                                            datafields:
                                                                    [
                                                                        {name: 'crm_soc_no'},
                                                                        {name: 'itemdesc'},
                                                                        {name: 'customer_id'},
                                                                        {name: 'customer_name', type: 'string'},
                                                                        {name: 'lead_cusomer_ref_id'},
                                                                        {name: 'customer_number'},
                                                                    ],
                                                            localdata: rows,
                                                            pagenum: 0, pagesize: 35, pager: function (pagenum, pagesize, oldpagenum) {
                                                                // callback called when a page or page size is changed.
                                                            }

                                                        };

                                            var dataAdapter = new $.jqx.dataAdapter(source);
                                          
                                            $("#jqxcustomergrid").jqxGrid(
                                                                {
                                                                    width: 700,
                                                                    height: 250,
                                                                    source: dataAdapter,
                                                                    selectionmode: 'singlerow',
                                                                    theme: 'classic',
                                                                    sortable: true,
                                                                    pageable: true,
                                                                    columnsresize: true,
                                                                    editable: false,
                                                                    showfilterrow: true,
                                                                    filterable: true,
                                                                    autoheight: true,
                                                                    showtoolbar: true,
                                                                    pageable: true,
                                                                            columns: [
                                                                                {text: 'SocID', datafield: 'crm_soc_no', width: 100},
                                                                                {text: 'Customer Id', datafield: 'customer_id', cellsalign: 'left', width: 100},
                                                                                {text: 'Product', datafield: 'itemdesc', cellsalign: 'left', width: 100},
                                                                                {text: 'Customer Name', datafield: 'customer_name', cellsalign: 'left', width: 200},
                                                                                {text: 'Customer Number', datafield: 'customer_number', cellsalign: 'left', width: 100}
                                                                            ]
                                                                });
                                

                             $("#popupWindowSoc").jqxWindow('show');
                             $("#jqxcustomergrid").on('celldoubleclick', function (event)
                                {
                                    var column = event.args.column;
                                    var rowindex = event.args.rowindex;
                                    var jqxcustomergrid_row_index = rowindex;
                                    var columnindex = event.args.columnindex;
                                    var columnname = column.datafield;
                                    var custgroup_val = $('#jqxcustomergrid').jqxGrid('getcellvalue', rowindex, "crm_soc_no");
                                  //  alert("custgroup_val "+custgroup_val);
                                  //  alert("jqxgrid_n_row "+jqxgrid_n_row);
                                  //  alert("row  "+row);

                                     $('#crm_soc_number').val(custgroup_val);
                                     $("#jqxgrid_n").jqxGrid('setcellvalue', jqxgrid_n_row, "crm_soc_number",custgroup_val);
                                    
                                    $("#jqxcustomergrid").on("cellselect", function (event)
                                    {
                                        var column = event.args.column;
                                        var rowindex = event.args.rowindex;
                                        var jqxcustomergrid_row_index = rowindex;
                                        var columnindex = event.args.columnindex;
                                        var columnname = column.datafield;
                                        var custgroup_val = $('#jqxcustomergrid').jqxGrid('getcellvalue', rowindex, "crm_soc_no");
                                       // alert("jqxgrid_n_row "+jqxgrid_n_row);
                                       // alert("row value is  "+row);

                                         $("#jqxgrid_n").jqxGrid('setcellvalue', jqxgrid_n_row, "crm_soc_number",custgroup_val);

                                    });
                                     $('#popupWindowSoc').jqxWindow('hide');

                                });
                             $("#save_socnumber").click(function (event){

                                
                                     //  alert("jqxgrid_n_row  in save "+jqxgrid_n_row);
                                     //   alert("row value in save   "+row);
                                    var reason_text = $('#crm_soc_number').val();
                                    if(reason_text=="")
                                    {
                                        alert("Enter SOC Number");
                                        return false;
                                    }
                                    else
                                    {
                                      //  alert("jqxgrid_n_row  in save "+jqxgrid_n_row);
                                      //  alert("row value in save   "+row);
                                        $("#jqxgrid_n").jqxGrid('setcellvalue', jqxgrid_n_row, "crm_soc_number",reason_text);
                                        $("#popupWindowSoc").jqxWindow('close');
                                    }
                               
                            });
                        
                            return newvalue;
                        } 
                        /*get soc number end*/


                                                                                    }

                                                                      
                                                                    },
                                                                    {text: 'SubStatus', datafield: 'leadsubstatusid', width: 200, cellsalign: 'left',readonly:false,cellbeginedit:Resultsupdate.initResultsEditorldsubst, initeditor: Resultsupdate.resultsEditorldsubst, cellsrenderer: Resultsupdate.renderUnitsldsubst,cellvaluechanging: function (row, datafield, columntype, oldvalue, newvalue) 
                                                                                {
                                                                                   // alert("oldvalue "+oldvalue); alert("newvalue "+newvalue);
                                                                                 //  alert(" jqxgrid_n_row_index"+jqxgrid_n_row_index);
                                                                                 //  alert(" row "+row);

                                                                                      if (newvalue == 0)  {
                                                                                       return oldvalue;
                                                                                  } 
                                                                                   else if (newvalue!=oldvalue)
                                                                                   {

                                                                                     if(newvalue=='Appointment Fixed')
                                                                                     {
                                                                                        
                                                                                        $("#appiontment_date").val(null);                                       
                                                                                        $("#popupWindow").jqxWindow('show');
                                                                                        $("#save_appdt").click(function (event){
                                                                                               
                                                                                                var date_text = $('#appiontment_date').jqxDateTimeInput('getText');
                                                                                                if(date_text=="")
                                                                                                {
                                                                                                    alert("Please select the Appointment Date");
                                                                                                    return false;
                                                                                                }
                                                                                                else
                                                                                                {
                                                                                                     //alert("in update row vlaue for date fix "+row);
                                                                                                   // alert("in update1 jqxgrid_n_row_index vlaue for date fix is "+jqxgrid_n_row);

                                                                                                     $("#jqxgrid_n").jqxGrid('setcellvalue', jqxgrid_n_row, "appiontmnt_dt",date_text);
                                                                                                    $("#popupWindow").jqxWindow('close');
                                                                                                }
                                                                                           
                                                                                        });
                                                                                        
                                                                                     }
                                                                                     /*Not able to get appointment start*/
                                                                                      if(newvalue=='Not Able to get the Appointment')
                                                                                     {
                                                                                        
                                                                                                                              
                                                                                        $("#popupWindowNot").jqxWindow('show');
                                                                                        $("#save_na2gappdt").click(function (event){
                                                                                        
                                                                                                var reason_text = $('#not_able_to_get_appointment').val();
                                                                                                if(reason_text=="")
                                                                                                {
                                                                                                    alert("Please Enter the Reason");
                                                                                                    return false;
                                                                                                }
                                                                                                else
                                                                                                {
                                                                                                    // alert("in update row value is "+row);
                                                                                                   // alert("in update jqxgrid_n_row_index value is "+jqxgrid_n_row);

                                                                                                     $("#jqxgrid_n").jqxGrid('setcellvalue', jqxgrid_n_row, "not_able_to_get_appointment",reason_text);
                                                                                                    $("#popupWindowNot").jqxWindow('close');
                                                                                                }
                                                                                           
                                                                                        });
                                                                                        
                                                                                     }
                                                                                     /* Not able to get appointment end*/
                                                                                     /*Sample rejected reason start*/
                                                                                      if(newvalue=='Sample Rejected')
                                                                                     {
                                                                                        $("#popupWindowReject").jqxWindow('show');
                                                                                        $("#save_samplerej").click(function (event){
                                                                                        
                                                                                                var reason_text = $('#sample_rejected_reason').val();
                                                                                                if(reason_text=="")
                                                                                                {
                                                                                                    alert("Please Enter the Reason");
                                                                                                    return false;
                                                                                                }
                                                                                                else
                                                                                                {

                                                                                                     $("#jqxgrid_n").jqxGrid('setcellvalue', jqxgrid_n_row, "sample_rejected_reason",reason_text);
                                                                                                    $("#popupWindowReject").jqxWindow('close');
                                                                                                }
                                                                                           
                                                                                        });
                                                                                        
                                                                                     }
                                                                                     /* Sample rejected reason End*/
                                                                                     /*Order Cancel reason start*/
                                                                                      if(newvalue=='Order Cancelled')
                                                                                     {
                                                                                        $("#popupWindowOrdercancel").jqxWindow('show');
                                                                                        $("#save_ordercancel").click(function (event){
                                                                                        
                                                                                                var reason_text = $('#order_cancelled_reason').val();
                                                                                                if(reason_text=="")
                                                                                                {
                                                                                                    alert("Please Enter the Reason");
                                                                                                    return false;
                                                                                                }
                                                                                                else
                                                                                                {

                                                                                                     $("#jqxgrid_n").jqxGrid('setcellvalue', jqxgrid_n_row, "order_cancelled_reason",reason_text);
                                                                                                    $("#popupWindowOrdercancel").jqxWindow('close');
                                                                                                }
                                                                                           
                                                                                        });
                                                                                        
                                                                                     }
                                                                                     /* Sample rejected reason End*/
                                                                                     return newvalue;
                                                                                   }

                                                                                }
                                                                   
                                                                    },
                                                                {text: 'Activity Type', datafield: 'subactivity', width: 110, cellsalign: 'left', cellbeginedit:Resultsupdate.initResultsEditorat, initeditor: Resultsupdate.resultsEditorat, cellsrenderer: Resultsupdate.renderUnitsat
                                                                },
                                                                
                                                                {text: 'Potential', datafield: 'potentialqty', width: 75, cellsalign: 'left', editable: false},
                                                                {text: 'ActualPotential', datafield: 'actualpotenqty', width: 75, cellsalign:'left', editable: true},

                                                                {text: 'Required Quantity',datafield: 'quantity', width: 75, cellsalign: 'left',
                                                                        cellbeginedit: function (row, datafield, columntype) {
                                                                                    var rowdata = $("#jqxgrid_n").jqxGrid('getrowdata', row);
                                                                                    var leadid = rowdata.leadid;
                                                                                   // alert("leadid in quantity cell rendering "+leadid);
                                                                                    if(leadid==undefined || leadid==0)
                                                                                    {
                                                                                        return true;
                                                                                    }
                                                                                    else
                                                                                    {
                                                                                        return false;
                                                                                    }

                                                                                }
                                                                    },
                                                                    {text: 'Sales Type', datafield: 'division', width: 110, cellsalign: 'left',readonly:true,cellbeginedit:Resultsupdate.initResultsEditorst, initeditor: Resultsupdate.resultsEditorst, cellsrenderer: Resultsupdate.renderUnitsst

                                                                    },
                                                                    
                                                                     {text: 'PrevStatus', datafield: 'prevstatusid', width: 150, cellsalign: 'center',readonly:true,editable:false, hidden:true
                                                                    },
                                                                     {text: 'PrevSubStatus', datafield: 'prevsubstatusid', width: 200, cellsalign: 'left',readonly:true,editable:false, hidden:true
                                                                     },

                                                                    {text: 'Apptmnt Date', datafield: 'appiontmnt_dt', columntype:'datetimeinput', width: 110, align: 'left', cellsformat: 'd',formatString: 'dd/MM/yyyy',readonly:true,editable:false, hidden:false},

                                                                    {text: 'Not Able', datafield: 'not_able_to_get_appointment', width: 110, align: 'left', hidden:false, editable:false},

                                                                    {text: 'Sample Reject', datafield: 'sample_rejected_reason', width: 110, align: 'left', hidden:false, editable:false},

                                                                     {text: 'Order Cancel', datafield: 'order_cancelled_reason', width: 110, align: 'left', hidden:false, editable:false},

                                                                     {text: 'SOC No', datafield: 'crm_soc_number', width: 110, align: 'left', hidden:false, editable:false},

                                                                     

                                                                {text: 'Mode of Contact', datafield: 'modeofcontact', width: 100, cellsalign: 'left', cellbeginedit:Resultsupdate.initResultsEditorcon, createeditor: Resultsupdate.resultsEditorcon, cellsrenderer: Resultsupdate.renderUnitsst
                                                                },
                                                                {text: 'Time Spent (Hrs)', datafield: 'hour_s', width: 75, cellsalign: 'left', columntype: 'dropdownlist',
                                                                    createeditor: function (row, cellvalue, editor) {
                                                                        editor.jqxDropDownList({source: ["00 Hr", "01 Hrs", "02 Hrs", "03 Hrs", "04 Hrs", "05 Hrs", "06 Hrs", "07 Hrs", "08 Hrs", "09 Hrs", "10 Hrs"]});
                                                                    }
                                                                },
                                                                {text: 'Time Spent (Mins)', datafield: 'minit', width: 75, cellsalign: 'left', columntype: 'dropdownlist',
                                                                    createeditor: function (row, cellvalue, editor) {
                                                                        editor.jqxDropDownList({source: ["0 mins", "5 mins", "10 mins", " 15 mins", "20 mins", "25 mins", "30 mins", " 35 mins", "40 mins", "45 mins", " 50 mins", "55 mins"]});
                                                                    }
                                                                },
                                                            {text: 'Notes / Remarks', datafield: 'remarks', width: 150, cellsalign: 'left'},

                                                            ]
                                                        });
                                                
                                            var x = ($(window).width() - $("#customWindow").jqxWindow('width')) / 2 + $(window).scrollLeft();
                                            var y = ($(window).height() - $("#customWindow").jqxWindow('height')) / 2 + $(window).scrollTop();
                                            $("#customWindow").jqxWindow({ position: { x: x, y: y} });
                                                $('#customWindow').jqxWindow('open');
                                                $('#customWindow').jqxWindow({width: "100%"});


                                            } // end of popup edit button click event
                                        },
                                    ]

                                });
                                  
                                

                        // toolbar functions start
                        var toolbarfunc = function (toolbar)
                        {
                            var me = this;
                            var theme = 'energyblue';
                            //  alert("theme "+theme);

                            var container = $("<div style='margin-top: 6px;' id='jqxWidget'></div>");
                            var span = $("<span style='float: left; margin-top: 5px; margin-right: 4px;'></span>");
                            var startdiv = $("<div>");
                            var addlog = $("<a role='button' class='jqx-link jqx-link-energyblue' style='margin-left: 25px;' target='' href='#' id='jqxButtonadd'><input type='button' class='jqx-wrapper jqx-reset jqx-reset-energyblue jqx-rc-all jqx-rc-all-energyblue jqx-button jqx-button-energyblue jqx-widget jqx-widget-energyblue jqx-fill-state-pressed jqx-fill-state-pressed-energyblue' style='width: 65px; height: 22px;' value='Add'  role='button' aria-disabled='false'></a>");
                             /*var view = $("<a role='button' class='jqx-link jqx-link-energyblue' style='margin-left: 25px;' target='' href='#' id='jqxButtonview'><input type='button' class='jqx-wrapper jqx-reset jqx-reset-energyblue jqx-rc-all jqx-rc-all-energyblue jqx-button jqx-button-energyblue jqx-widget jqx-widget-energyblue jqx-fill-state-pressed jqx-fill-state-pressed-energyblue' style='width: 65px; height: 22px;' value='View'  role='button' aria-disabled='false'></a>");
                           var update = $("<a role='button' class='jqx-link jqx-link-energyblue' style='margin-left: 25px;' target='' href='#' id='jqxButtonupdate'><input type='button' class='jqx-wrapper jqx-reset jqx-reset-energyblue jqx-rc-all jqx-rc-all-energyblue jqx-button jqx-button-energyblue jqx-widget jqx-widget-energyblue jqx-fill-state-pressed jqx-fill-state-pressed-energyblue' style='width: 65px; height: 22px;' value='Update' id='jqxWidget09c6ffa4' role='button' aria-disabled='false'></a>");*/

                            var enddiv = $("</div>");
                            toolbar.append(container);
                            container.append(addlog);
                           // container.append(view);



                            //  container.append(enddiv);

                            addlog.on('click', function (event)
                            {
                                //$('#jqxgrid_add').jqxGrid('clear');	
                                actionmode = "add";
                                $('#addWindow').jqxWindow('open');
                                //$('#addWindow').jqxWindow({width:1024});
                              $('#addWindow').jqxWindow({ width: 1024, height: 'auto' });
                            });

                           
                           
                        };

                        $("#jqxgrid").jqxGrid({rendertoolbar: toolbarfunc});
                        // toolbar functions end
                        // Source for add grid start
                        var dataadd = {};
                        var theme = 'classic';
                        jQuery.ajax({
                            dataType: "html",
                            url: 'dailyactivity/get_data_addgrid',
                            type: "POST",
                            async: false,
                            error: function (xhr, status) {
                                alert("check " + status + " test");
                            },
                            success: function (result) {
                                var obj = jQuery.parseJSON(result);
                                columns = obj[0].columns;
                                //   rows = obj[1].rows;
                                //  commonCols=obj[0].columns;
                            }
                        });

                        var generaterow = function (i) {
                            var row = {};
                            row["id"] = '';
                            row["itemgroup"] = '';
                            row["customgroup"] = '';
                            row["subactivity"] = '';
                            row["balqnty"] = '';
                            row["created_date"] = '';
                            row["division"] = '';
                            row["potentialqty"] = '0';
                            row["customgroup"] = '';
                            row["balqnty"] = '';
                            row["leadid"] = parseInt(0);
                            row["noofleads"] = '0';
                            row["result_type"] = '';
                            row["appiontmnt_dt"] = '';
                            row["not_able_to_get_appointment"] = '';
                            row['statusid']='No Status';
                            row['leadsubstatusid']='No SubStatus';
                            
                            return row;

                        }

                        for (var i = 0; i < 1; i++) {
                            var row = generaterow(i);
                            dataadd[i] = row;

                        }
                        var addgridsource =
                                {
                                    datatype: "local",
                                    cache: false,
                                    datafields: [
                                        {name: 'leadid',type:'number',datafield:'leadid'}
                                        ],
                                    /*datafields: [
                                        {name: 'id'},
                                        {name: 'CustGroup', type: 'string'},
                                        {name: 'ItemGroup', type: 'string'},
                                        {name: 'Potential Quantity', type: 'number'},
                                        {name: 'Sub Activity', type: 'number'},
                                        {name: 'Hour', type: 'date'},
                                        {name: 'minute', type: 'string'},
                                        {name: 'Mode Of Contact', type: 'string'},
                                        {name: 'Division', type: 'string'},
                                        {name: 'Quantity Requirement', type: 'number'},
                                        {name: 'Date of Requirement', type: 'number'},
                                        {name: 'Notes/ Remarks', type: 'string'},
                                        {name: 'Follow up Updation', type: 'string'},
                                        {name: 'Complaints', type: 'string'},
                                        {name: 'lmsupdate', type: 'string' },
                                       ],*/
                                    id: 'id',
                                    cache: false,
                                    //  url: 'crud/showdata',
                                    localdata: dataadd,
                                    addrow: function (rowid, rowdata, position, commit) {
                                        //alert("addrow leadid"+rowdata.leadid);
                                        //alert("rowdata"+rowdata.toSource());
                                        commit(true);
                                    },
                                    deleterow: function (rowid, commit) {
                                        commit(true);
                                    },
                                };

                        var dataAdapterAdd = new $.jqx.dataAdapter(addgridsource);
                        
                        $("#jqxgrid_add").jqxGrid(
                                {
                                    height: 200,
                                    selectionmode: 'rowselect',
                                    source: dataAdapterAdd,
                                    theme: theme,
                                    editable: true,
                                    columnsresize: true,
                                    columns: [
                                        {text: 'UID', datafield: 'uid', width: 150, cellsalign: 'left', hidden: true},
                                        {text: 'LineId', datafield: 'line_id', width: 150, cellsalign: 'left', hidden: true},
                                        {text: 'Customer Group', datafield: 'custgroup', width: 100, editable: false},
                                        {text: 'Cust Id', datafield: 'id', width: 100, editable: false,hidden: true},
                                        {text: 'Product Group', datafield: 'itemgroup', width: 150, cellsalign: 'left', editable: false},   
                                        {text: 'Prod Id', datafield: 'itemid', width: 100, editable: false,hidden: true},
                                        {text: 'Lead id', datafield: 'leadid', displayfield: 'leadid', width: 127, cellsalign: 'center', cellbeginedit:Results.initResultsEditor, initeditor: Results.resultsEditor, cellsrenderer: Results.renderUnits,promptText:'Select Leadid',
                                                        cellvaluechanging: function (row, datafield, columntype, oldvalue, newvalue) 
                                                        {
                                                            //alert("oldvalue "+oldvalue); alert("newvalue "+newvalue);
                                                              if (newvalue == 0) {
                                                               return oldvalue;
                                                          } 

                                                        }

                                          
                                        },
                                            

                                        {text: 'noofleads', datafield: 'noofleads', hidden:true, width: 20, cellsalign: 'left', editable: false},
                                        {text: 'result_type', datafield: 'result_type',hidden:true, width: 75, cellsalign: 'left', editable: false},
                                        { text: 'Create Lead', datafield: 'create_lead', hidden:true, width: 20, cellsalign: 'left', editable: false},
                                        {text: 'Status', datafield: 'statusid', width: 150, cellsalign: 'center', cellbeginedit:Results.initResultsEditorldst, initeditor: Results.resultsEditorldst, cellsrenderer: Results.renderUnitsldst,promptText:'Select Status',
                                                        cellvaluechanging: function (row, datafield, columntype, oldvalue, newvalue) 
                                                        {
                                                            
                                                          //  alert("oldvalue "+oldvalue); alert("newvalue "+newvalue);

                                                          //  alert("datafield "+datafield); 
                                                           var sid = $('#jqxgrid_add').jqxGrid('getcellvalue', row, "statusid");
                                                          // alert('statusid: ' + sid);

                                            
                                                                if (newvalue == 0)  
                                                                {
                                                                    return oldvalue;
                                                                } 
                                                               else if (newvalue!=oldvalue && newvalue!='Expanding And Build Relationship')
                                                               {
                                                               $("#jqxgrid_n").jqxGrid('setcellvalue', row, "leadsubstatusid", "Select Substatus");
                                                                return newvalue;
                                                               }
                        /*get soc number start*/
                       else if (newvalue!=oldvalue && newvalue=='Expanding And Build Relationship')
                        {
                            $("#jqxgrid_add").jqxGrid('setcellvalue', row, "leadsubstatusid", "Expanding And Build Relationship");
                           // alert("in update form to get soc number");
                            var data = $('#jqxgrid_add').jqxGrid('getrowdata', row);
                            var url;
                                var cust_grp =data.custgroup;
                                //alert("customer group "+cust_grp);
                                var prodgroup =data.itemgroup;
                              //  alert("item group "+prodgroup);
                               url= base_url + 'dailyactivity/getsynchedproducts/'+cust_grp+'/'+prodgroup;
                                 
                                            var rows = {};
                                            jQuery.ajax({
                                                dataType: "html",
                                                url: url,
                                                type: "POST",
                                                async: false,
                                                error: function (xhr, status) {
                                                    //  alert("check "+status+" test");
                                                },
                                                success: function (result) {
                                                    //  console.log(result);
                                                    var obj = jQuery.parseJSON(result);
                                                    rows = obj.rows;
                                                    //   rows = obj[1].rows;
                                                    //  commonCols=obj[0].columns;
                                                }
                                            });


                                          var source =
                                                        {
                                                            datatype: "json",
                                                            datafields:
                                                                    [
                                                                        {name: 'crm_soc_no'},
                                                                        {name: 'itemdesc'},
                                                                        {name: 'customer_id'},
                                                                        {name: 'customer_name', type: 'string'},
                                                                        {name: 'lead_cusomer_ref_id'},
                                                                        {name: 'customer_number'},
                                                                    ],
                                                            localdata: rows,
                                                            pagenum: 0, pagesize: 35, pager: function (pagenum, pagesize, oldpagenum) {
                                                                // callback called when a page or page size is changed.
                                                            }

                                                        };

                                            var dataAdapter = new $.jqx.dataAdapter(source);
                                          
                                            $("#jqxcustomergrid").jqxGrid(
                                                                {
                                                                    width: 700,
                                                                    height: 250,
                                                                    source: dataAdapter,
                                                                    selectionmode: 'singlerow',
                                                                    theme: 'classic',
                                                                    sortable: true,
                                                                    pageable: true,
                                                                    columnsresize: true,
                                                                    editable: false,
                                                                    showfilterrow: true,
                                                                    filterable: true,
                                                                    autoheight: true,
                                                                    showtoolbar: true,
                                                                    pageable: true,
                                                                            columns: [
                                                                                {text: 'SocID', datafield: 'crm_soc_no', width: 100},
                                                                                {text: 'Customer Id', datafield: 'customer_id', cellsalign: 'left', width: 100},
                                                                                {text: 'Product', datafield: 'itemdesc', cellsalign: 'left', width: 100},
                                                                                {text: 'Customer Name', datafield: 'customer_name', cellsalign: 'left', width: 200},
                                                                                {text: 'Customer Number', datafield: 'customer_number', cellsalign: 'left', width: 100}
                                                                            ]
                                                                });
                                

                             $("#popupWindowSoc").jqxWindow('show');
                             $("#jqxcustomergrid").on('celldoubleclick', function (event)
                                {
                                    var column = event.args.column;
                                    var rowindex = event.args.rowindex;
                                    var jqxcustomergrid_row_index = rowindex;
                                    var columnindex = event.args.columnindex;
                                    var columnname = column.datafield;
                                    var custgroup_val = $('#jqxcustomergrid').jqxGrid('getcellvalue', rowindex, "crm_soc_no");
                                  //  alert("custgroup_val "+custgroup_val);
                                  //  alert("jqxgrid_n_row_index "+jqxgrid_n_row_index);
                                  //  alert("row  "+row);

                                    $('#crm_soc_number').val(custgroup_val);
                                     $("#jqxgrid_n").jqxGrid('setcellvalue', row, "crm_soc_number",custgroup_val);
                                    
                                    $("#jqxcustomergrid").on("cellselect", function (event)
                                    {
                                        var column = event.args.column;
                                        var rowindex = event.args.rowindex;
                                        var jqxcustomergrid_row_index = rowindex;
                                        var columnindex = event.args.columnindex;
                                        var columnname = column.datafield;
                                        var custgroup_val = $('#jqxcustomergrid').jqxGrid('getcellvalue', rowindex, "crm_soc_no");
                                         $("#jqxgrid_add").jqxGrid('setcellvalue', row, "crm_soc_number",custgroup_val);

                                    });
                                     $('#popupWindowSoc').jqxWindow('hide');

                                });
                             $("#save_socnumber").click(function (event){

                                
                            
                                    var reason_text = $('#crm_soc_number').val();
                                    if(reason_text=="")
                                    {
                                        alert("Enter SOC Number");
                                        return false;
                                    }
                                    else
                                    {

                                         $("#jqxgrid_add").jqxGrid('setcellvalue', row, "crm_soc_number",reason_text);
                                        $("#popupWindowSoc").jqxWindow('close');
                                    }
                               
                            });
                        
                            return newvalue;
                        } 
                        /*get soc number end*/


                                                                

                                                        }
                                        },
                                        {text: 'SubStatus', datafield: 'leadsubstatusid', width: 200, cellsalign: 'left',readonly:false,cellbeginedit:Results.initResultsEditorldsubst, initeditor: Results.resultsEditorldsubst, cellsrenderer: Results.renderUnitsldsubst,cellvaluechanging: function (row, datafield, columntype, oldvalue, newvalue) 
                                                    {
                                                       // alert("current row is "+row);
                                                     //   alert("jqxgrid_add_row_index is "+jqxgrid_add_row_index);
                                                       // alert("oldvalue "+oldvalue); alert("newvalue "+newvalue);
                                                          if (newvalue == 0)  {
                                                           return oldvalue;
                                                      } 
                                                       else if (newvalue!=oldvalue)
                                                       {

                                                         if(newvalue=='Appointment Fixed')
                                                         {
                                                            
                                                            $("#appiontment_date").val(null);                                       
                                                            $("#popupWindow").jqxWindow('show');
                                                            $("#save_appdt").click(function (event){
                                                                   
                                                                    var date_text = $('#appiontment_date').jqxDateTimeInput('getText');
                                                                    if(date_text=="")
                                                                    {
                                                                        alert("Please select the Appointment Date");
                                                                        return false;
                                                                    }
                                                                    else
                                                                    {
                                                                        //alert("in side "+row);
                                                                       // alert("in side jqxgrid_add_row_index "+jqxgrid_add_row_index);

                                                                        /* $("#jqxgrid_add").jqxGrid('setcellvalue', row, "appiontmnt_dt",date_text);*/
                                                                         if(jqxgrid_add_row_index==row)
                                                                            {
                                                                                $("#jqxgrid_add").jqxGrid('setcellvalue', row, "appiontmnt_dt",date_text);
                                                                            }

                                                                        $("#popupWindow").jqxWindow('close');
                                                                    }
                                                               
                                                            });
                                                            
                                                         }
                                                         /*Not able to get appointment start*/
                                                          if(newvalue=='Not Able to get the Appointment')
                                                         {
                                                            
                                                                                                  
                                                            $("#popupWindowNot").jqxWindow('show');
                                                            $("#save_na2gappdt").click(function (event){
                                                            
                                                                    var reason_text = $('#not_able_to_get_appointment').val();
                                                                    if(reason_text=="")
                                                                    {
                                                                        alert("Please Enter the Reason");
                                                                        return false;
                                                                    }
                                                                    else
                                                                    {

                                                                         /*$("#jqxgrid_add").jqxGrid('setcellvalue', row, "not_able_to_get_appointment",reason_text);*/
                                                                         if(jqxgrid_add_row_index==row)
                                                                            {
                                                                                $("#jqxgrid_add").jqxGrid('setcellvalue', row, "not_able_to_get_appointment",reason_text);
                                                                            }


                                                                        $("#popupWindowNot").jqxWindow('close');
                                                                    }
                                                               
                                                            });
                                                            
                                                         }
                                                         /* Not able to get appointment end*/
                                                         /*Sample rejected reason start*/
                                                          if(newvalue=='Sample Rejected')
                                                         {
                                                            
                                                                                                  
                                                            $("#popupWindowReject").jqxWindow('show');
                                                            $("#save_samplerej").click(function (event){
                                                            
                                                                    var reason_text = $('#sample_rejected_reason').val();
                                                                    if(reason_text=="")
                                                                    {
                                                                        alert("Please Enter the Reason");
                                                                        return false;
                                                                    }
                                                                    else
                                                                    {
                                                                        if(jqxgrid_add_row_index==row)
                                                                            {
                                                                            $("#jqxgrid_add").jqxGrid('setcellvalue', row, "sample_rejected_reason",reason_text);
                                                                            }
                                                                        $("#popupWindowReject").jqxWindow('close');
                                                                    }
                                                               
                                                            });
                                                            
                                                         }
                                                         /* Sample rejected reason End*/
                                                         /*Order Cancelled reason start*/
                                                          if(newvalue=='Order Cancelled')
                                                         {
                                                            
                                                                                                  
                                                            $("#popupWindowOrdercancel").jqxWindow('show');
                                                            $("#save_ordercancel").click(function (event){
                                                            
                                                                    var reason_text = $('#order_cancelled_reason').val();
                                                                    if(reason_text=="")
                                                                    {
                                                                        alert("Enter Order cancel Reason");
                                                                        return false;
                                                                    }
                                                                    else
                                                                    {
                                                                         if(jqxgrid_add_row_index==row)
                                                                         {
                                                                             $("#jqxgrid_add").jqxGrid('setcellvalue', row, "order_cancelled_reason",reason_text);
                                                                         }
                                                                        
                                                                        $("#popupWindowOrdercancel").jqxWindow('close');
                                                                    }
                                                               
                                                            });
                                                            
                                                         }
                                                         /* Sample rejected reason End*/
                                                         return newvalue;
                                                       }

                                                    }
                                       
                                        },
                                        {text: 'Activity Type', datafield: 'Sub_Activity', width: 110, cellsalign: 'left', cellbeginedit:Results.initResultsEditorat, initeditor: Results.resultsEditorat, cellsrenderer: Results.renderUnitsat
                                        },
                                        {text: 'Potential', datafield: 'Potential_Quantity', width: 75, cellsalign: 'left', editable: false},
                                        {text: 'ActualPotential', datafield: 'actualpotenqty', width: 75, cellsalign: 'left', editable: true},
                                        {text: 'Required Quantity', datafield: 'Quantity_Requirement', width: 75, cellsalign: 'left',
                                            cellbeginedit: function (row, datafield, columntype) {
                                                        var rowdata = $("#jqxgrid_add").jqxGrid('getrowdata', row);
                                                        var leadid = rowdata.leadid;
                                                       // alert("leadid in quantity cell rendering "+leadid);
                                                        if(leadid==undefined || leadid==0)
                                                        {
                                                            return true;
                                                        }
                                                        else
                                                        {
                                                            return false;
                                                        }

                                                    }
                                        },
                                        {text: 'Sales Type', datafield: 'division', width: 110, cellsalign: 'left',readonly:true,cellbeginedit:Results.initResultsEditorst, initeditor: Results.resultsEditorst, cellsrenderer: Results.renderUnitsstleadsubstatusid
                                        },
                                        
                                         
                                        {text: 'PrevStatus', datafield: 'prevstatusid', width: 150, cellsalign: 'center',readonly:true,editable:false, hidden:true
                                        },
                                         {text: 'PrevSubStatus', datafield: 'prevsubstatusid', width: 200, cellsalign: 'left',readonly:true,editable:false, hidden:true
                                         },

                                        {text: 'Apptmnt Date', datafield: 'appiontmnt_dt', columntype:'datetimeinput', width: 110, align: 'left', cellsformat: 'd',formatString: 'dd/MM/yyyy',readonly:true,editable:false, hidden:false},

                                        {text: 'Not Able', datafield: 'not_able_to_get_appointment', width: 110, align: 'left', hidden:false, editable:false},
                                        {text: 'Sample Reject', datafield: 'sample_rejected_reason', width: 110, align: 'left', hidden:false, editable:false},
                                         {text: 'Order Cancel', datafield: 'order_cancelled_reason', width: 110, align: 'left', hidden:false, editable:false},
                                        {text: 'SOC No', datafield: 'crm_soc_number', width: 110, align: 'left', hidden:false, editable:false},

                                        {text: 'Mode of Contact', datafield: 'Mode_Of_Contact', width: 100, cellsalign: 'left', cellbeginedit:Results.initResultsEditorcon, initeditor: Results.resultsEditorcon, cellsrenderer: Results.renderUnitsst
                                        },
                                        {text: 'Time Spent (Hrs)', datafield: 'hour', width: 75, cellsalign: 'left', columntype: 'dropdownlist',
                                            createeditor: function (row, cellvalue, editor) {
                                                editor.jqxDropDownList({source: ["00 Hr", "01 Hrs", "02 Hrs", "03 Hrs", "04 Hrs", "05 Hrs", "06 Hrs", "07 Hrs", "08 Hrs", "09 Hrs", "10 Hrs"]});
                                            }
                                        },
                                        {text: 'Time Spent (Mins)', datafield: 'minute', width: 75, cellsalign: 'left', columntype: 'dropdownlist',
                                            createeditor: function (row, cellvalue, editor) {
                                                editor.jqxDropDownList({source: ["0 mins", "5 mins", "10 mins", " 15 mins", "20 mins", "25 mins", "30 mins", " 35 mins", "40 mins", "45 mins", " 50 mins", "55 mins"]});
                                            }
                                        },
                                        {text: 'Notes / Remarks', datafield: 'Notes_Remarks', width: 150, cellsalign: 'left'},

                                    ]

                                });
                                
                        $("#jqxgrid_add").on("celldoubleclick", function (event)
                        {


                            var column = event.args.column;
                            var rowindex = event.args.rowindex;
                            jqxgrid_add_row_index = rowindex;
                            jqxgrid_n_row_index = rowindex;
                            var columnindex = event.args.columnindex;
                            var columnname = column.datafield;
                            var collector = $("#collector").jqxDropDownList('getSelectedItem'); 
                           // alert("collector_val"+collector.value);
                            
                            if (columnname == 'itemgroup')
                            {

                                var custgroup_val = $('#jqxgrid_add').jqxGrid('getcellvalue', rowindex, "custgroup");

                                if (custgroup_val == null || custgroup_val == undefined)
                                {
                                    alert("Please select the Customer Group first");
                                }
                                else
                                {
                                        // Source for item master grid start
                                        var url = "dailyactivity/get_data_itemmaster";
                                        var rows = {};
                                        jQuery.ajax({
                                            dataType: "html",
                                            url: url,
                                            type: "POST",
                                            async: false,
                                            error: function (xhr, status) {
                                                //  alert("check "+status+" test");
                                            },
                                            success: function (result) {
                                                var obj = jQuery.parseJSON(result);
                                                rows = obj.rows;
                                                //   rows = obj[1].rows;
                                                //  commonCols=obj[0].columns;
                                            }
                                        });
                                        var item_source =
                                                {
                                                    datatype: "json",
                                                    datafields: [{name: 'itemid', type: 'string'},{name: 'itemgroup', type: 'string'}],
                                                    id: 'itemgroup',
                                                    localdata: rows
                                                };

                                        //  alert("columns "+columns.toSource());    
                                        var dataAdapterItemMaster = new $.jqx.dataAdapter(item_source);
                                        $("#jqxgrid_selectItemMaster").jqxGrid(
                                                {
                                                    width: '100%',
                                                    source: dataAdapterItemMaster,
                                                    theme: theme,
                                                    selectionmode: 'singlecell',
                                                    sortable: true,
                                                    pageable: true,
                                                    columnsresize: true,
                                                    sortable: true,
                                                    showfilterrow: true,
                                                    filterable: true,
                                                    columns: [
                                                        {text: 'Prod Id', dataField: 'itemid', width: 100, height: 600},
                                                        {text: 'Product Group', dataField: 'itemgroup', width: 500, height: 600},
                                                    ]
                                                });
                                    // Source for item master grid END
                                   // $('#addWindow').hide();
                                    $('#win_selectItemMaster').jqxWindow({theme: 'energyblue', autoOpen: false, width: 400, height: 500, resizable: true, title: 'select product'});

                                    var x = ($(window).width() - $("#win_selectItemMaster").jqxWindow('width')) / 2 + $(window).scrollLeft();
                                    var y = ($(window).height() - $("#win_selectItemMaster").jqxWindow('height')) / 2 + $(window).scrollTop();
                                    $("#win_selectItemMaster").jqxWindow({ position: { x: x, y: y} });
                                    $('#win_selectItemMaster').jqxWindow('open');
                                    $('#win_selectItemMaster').jqxWindow({ zIndex: 99999}); 
                                    $('#win_selectItemMaster').jqxWindow('bringToFront');
                                    $('#addWindow').mouseup(function () 
                                    {
                                       // alert("columnname item "+columnname);
                                        if ($('#win_selectItemMaster').jqxWindow('isOpen')) 
                                        {
                                           // alert("item true");
                                            $('#win_selectItemMaster').jqxWindow('bringToFront');
                                        }
                                        else
                                        {

                                           // alert("item false");
                                            $('#win_selectItemMaster').jqxWindow('bringToFront');
                                        }
                                    

                                    });
                                    
                                    
                                }

                            }

                            if (columnname == 'custgroup')
                            {
                                    if(collector==null)
                                    {
                                        alert("Please select the collector first");
                                    }
                                    else
                                    {
                                        $("#jqxgrid_selectCustomMaster").jqxGrid('clear');
                                         // Source for Customer Master grid start
                                            var url = "dailyactivity/get_data_customermaster_coll/"+collector.value;
                                            var rows = {};
                                            jQuery.ajax({
                                                dataType: "html",
                                                url: url,
                                                type: "POST",
                                                async: false,
                                                error: function (xhr, status) {
                                                    //  alert("check "+status+" test");
                                                },
                                                success: function (result) {
                                                    //  console.log(result);
                                                    var obj = jQuery.parseJSON(result);
                                                    rows = obj.rows;
                                                    //   rows = obj[1].rows;
                                                    //  commonCols=obj[0].columns;
                                                }
                                            });
                                            var customer_source1 =
                                                    {
                                                        datatype: "json",
                                                        datafields: [{name: 'id', type: 'number'},{name: 'customergroup', type: 'string'}],
                                                        localdata: rows
                                                    };

                                            //  alert("columns "+columns.toSource());    
                                            
                                            var dataAdapterCustomerMaster = new $.jqx.dataAdapter(customer_source1);

                                            $("#jqxgrid_selectCustomMaster").jqxGrid(
                                                    {
                                                        width: '100%',
                                                        source: dataAdapterCustomerMaster,
                                                        theme: theme,
                                                        selectionmode: 'singlecell',
                                                        sortable: true,
                                                        pageable: true,
                                                        columnsresize: true,
                                                        sortable: true,
                                                                showfilterrow: true,
                                                        filterable: true,
                                                        columns: [
                                                                  {text: 'id', dataField: 'id', width: 100, height: 600},
                                                                  {text: 'Customer Group', dataField: 'customergroup', width: 500, height: 600}
                                                            
                                                        ]
                                                    });

                        // source for Customer Master grid end
                                        // $('#addWindow').hide();
                                        $('#win_selectCustMaster').jqxWindow({theme: 'energyblue', autoOpen: false, width: 400, height: 500, resizable: true, title: 'Select Customer'});
                                        $('#win_selectCustMaster').jqxWindow('open');

                                        var x = ($(window).width() - $("#win_selectCustMaster").jqxWindow('width')) / 2 + $(window).scrollLeft();
                                        var y = ($(window).height() - $("#win_selectCustMaster").jqxWindow('height')) / 1.7 + $(window).scrollTop();
                                        $("#win_selectCustMaster").jqxWindow({ position: { x: x, y: y} });
                                        $('#win_selectCustMaster').jqxWindow({ zIndex: 99999}); 
                                        $('#win_selectCustMaster').jqxWindow('bringToFront');
                                        $('#addWindow').mouseup(function () 
                                            {
                                               
                                                if ($('#win_selectCustMaster').jqxWindow('isOpen')) 
                                                {
                                                    $('#win_selectCustMaster').jqxWindow('bringToFront');
                                                }
                                                else
                                                {

                                                    $('#win_selectCustMaster').jqxWindow('bringToFront');
                                                }
                                            

                                            });
                                    }   

                            }
                        });
                   
                            var todayDate = new Date();

                            var max_date=   todayDate.toISOString().substring(0, 10); //todayDate 2015-08-18
                            var min_date =  todayDate.setDate(todayDate.getDate() - 8);
                            //alert("max date"+max_date);
                           // alert("min date before "+min_date);
                            min_date =convert(min_date);
                          //  alert("min date after "+min_date);
                            min_date=convertmindate(min_date);
                           // alert("min date after 1 "+min_date);
                        //if (value > todayDate.toISOString().substring(0, 10))
                        $("#addcurrentdate").jqxDateTimeInput({width: '110px', height: '25px', theme: 'summer', formatString: 'dd/MM/yyyy',
                             min: new Date(min_date) ,maxDate: new Date(), readonly:true});
                        $("#addcurrentdate").on('change', function (event)
                        {
                            
                            var jsDate = event.args.date; 
                             jsDate = convert(jsDate);
                            $.ajax({
                                dataType: 'json',
                                type: "POST",
                                url: 'dailyactivity/checkentrydate/'+jsDate,
                                cache: true,
                                data: data,
                                success: function (response) {
                                   // alert("Record Added sucessfully ");
                                    //$('#addWindow').hide();
                                    //window.location.href = base_url + "dailyactivity";
                                },
                                error: function (result) {
                                    alert(result.responseText);
                                }
                            });
                        });

                        $("#addrowbutton").bind('click', function () {
                            var commit = $("#jqxgrid_add").jqxGrid('addrow', null, {});
                        });
                          $("#addnewprod, #addnewprod_add").bind('click', function () {
                            
                                        $('#temp_itemname').val(null);
                                        $('#win_newproduct').jqxWindow({theme: 'energyblue', autoOpen: false, width: 400, height: 100, resizable: true, title: 'Add New Product'});
                                        $('#win_newproduct').jqxWindow('open');

                                        var x = ($(window).width() - $("#win_newproduct").jqxWindow('width')) / 2 + $(window).scrollLeft();
                                        var y = ($(window).height() - $("#win_newproduct").jqxWindow('height')) / 1.7 + $(window).scrollTop();
                                        $("#win_newproduct").jqxWindow({ position: { x: x, y: y-200} });
                                        $('#win_newproduct').jqxWindow({ zIndex: 99999}); 
                                        $('#win_newproduct').jqxWindow('bringToFront');
                                        $('#addWindow').mouseup(function () 
                                            {
                                               
                                                if ($('#win_selectCustMaster').jqxWindow('isOpen')) 
                                                {
                                                    $('#win_selectCustMaster').jqxWindow('bringToFront');
                                                }
                                                else
                                                {

                                                    $('#win_selectCustMaster').jqxWindow('bringToFront');
                                                }
                                            

                                            });
                        });

                        $("#deleterowbutton").bind('click', function () {
                            var selectedrowindex = $("#jqxgrid_add").jqxGrid('getselectedrowindex');
                            var rowscount = $("#jqxgrid_add").jqxGrid('getdatainformation').rowscount;

                            if (selectedrowindex < 0)
                            {
                                alert("Please Select a Row to Delete");
                                return false;
                            }

                            if (selectedrowindex >= 0 && selectedrowindex < rowscount)
                            {
                                var id = $("#jqxgrid_add").jqxGrid('getrowid', selectedrowindex);
                                $("#jqxgrid_add").jqxGrid('deleterow', id);
                            }

                        });

                        $("#update_delete_row").bind('click', function () {
                            var selectedrowindex = $("#jqxgrid_n").jqxGrid('getselectedrowindex');
                            var rowscount = $("#jqxgrid_n").jqxGrid('getdatainformation').rowscount;
                            if (selectedrowindex < 0)
                            {
                                alert("Please Select a Row to Delete");
                                return false;
                            }
                            if (selectedrowindex >= 0 && selectedrowindex < rowscount)
                            {
                                var id = $("#jqxgrid_n").jqxGrid('getrowid', selectedrowindex);
                                $("#jqxgrid_n").jqxGrid('deleterow', id);
                            }
                        });
                        /*$("#addrowbutton").on('click', function () {
                         alert("second function");
                         });*/
                        // Start of Save Click function
                        $("#save").click(function (event)
                        {
                            $(".jqx-grid-validation, .jqx-grid-validation-arrow-up, .jqx-grid-validation-arrow-down").remove();
                            var rowscount = $("#jqxgrid_add").jqxGrid('getdatainformation').rowscount;
                            var col_count = $("#jqxgrid_add").jqxGrid('columns').records.length;
                            var valid_dtflag = 0;
                            var valid_pgflag = 0;
                            var valid_custgrp = 0;
                            var valid_itemgrp = 0;
                            var valid_hrs = 0;
                            var valid_mins = 0;
                            var valid_moc = 0;
                            var valid_subact = 0;
                            var valid_subgrp = 0;
                            var valid_lead_status=0;
                            var valid_lead_substatus=0;
                            var valid_crm_soc =0;
                            var entrydate = $('#addcurrentdate').val();
                            entrydate = convertdmy_ymd(entrydate);
                            for (var k = 0; k < rowscount; k++)
                            {
                                var cg_value = $('#jqxgrid_add').jqxGrid('getcellvalue', k, "custgroup");
                                if (cg_value == null || cg_value == 'undefined')
                                {
                                    $("#jqxgrid_add").jqxGrid('showvalidationpopup', k, "custgroup", "Please Select the Customer Group");
                                    valid_custgrp = 0;
                                    break;
                                }
                                else
                                {
                                    valid_custgrp = 1;
                                }

                                var subact_value = $('#jqxgrid_add').jqxGrid('getcellvalue', k, "Sub_Activity");
                              //  alert("subact_value" +subact_value);
                                if (subact_value == null || subact_value == 'undefined')
                                {
                                    $("#jqxgrid_add").jqxGrid('showvalidationpopup', k, "Sub_Activity", "Please Select the Activity Type");
                                    valid_subact = 0;
                                    break;  
                                }
                                else
                                {
                                    valid_subact = 1;
                                }

                                var sub_grp = $('#jqxgrid_add').jqxGrid('getcellvalue', k, "division");
                                if (sub_grp == null || sub_grp == 'undefined')
                                {
                                    $("#jqxgrid_add").jqxGrid('showvalidationpopup', k, "division", "Please select the Sales Type");
                                    valid_subgrp = 0;
                                    break;
                                }
                                else
                                {
                                    valid_subgrp = 1;
                                }

                                 var lead_status = $('#jqxgrid_add').jqxGrid('getcellvalue', k, "statusid");
                               // alert("status in add "+lead_status);
                                if (lead_status == null || lead_status == 'undefined')
                                {
                                    $("#jqxgrid_add").jqxGrid('showvalidationpopup', k, "statusid", "Please select the Lead status");
                                    valid_lead_status = 0;
                                    break;
                                }
                                else
                                {
                                    valid_lead_status = 1;
                                }

                                var lead_substatus = $('#jqxgrid_add').jqxGrid('getcellvalue', k, "leadsubstatusid");
                              //  alert("substatus in add "+lead_substatus);
                                if (lead_substatus == null || lead_substatus == 'undefined' || lead_substatus == 'Select Substatus')
                                {
                                    $("#jqxgrid_add").jqxGrid('showvalidationpopup', k, "leadsubstatusid", "Please select the Lead substatus");
                                    valid_lead_substatus = 0;
                                    break;
                                }
                                else
                                {
                                    valid_lead_substatus = 1;
                                }

                                var crm_soc = $('#jqxgrid_add').jqxGrid('getcellvalue', k, "crm_soc_number");
                                // alert(" lead_status "+lead_status);
                                //alert("crm_soc "+crm_soc);
                                if(lead_status=='Expanding And Build Relationship')
                                {
                                   if (crm_soc == null || crm_soc == 'undefined' || crm_soc == '')
                                    {
                                        $("#jqxgrid_add").jqxGrid('showvalidationpopup', k, "statusid", "without soc number you cannot convert this lead. Please revert back to old status");
                                        valid_crm_soc = 0;
                                        break;
                                    }
                                    else
                                    {
                                        valid_crm_soc = 1;
                                    } 
                                }
                                else
                                {
                                    valid_crm_soc = 1;
                                }
                                
                                
                                var hr_moc = $('#jqxgrid_add').jqxGrid('getcellvalue', k, "Mode_Of_Contact");
                                if (hr_moc == null || hr_moc == 'undefined') {
                                    $("#jqxgrid_add").jqxGrid('showvalidationpopup', k, "Mode_Of_Contact", "Please Select Mode of Contact");
                                    valid_moc = 0;
                                    break;
                                }
                                else
                                {
                                    valid_moc = 1;
                                }

                                
                                var hr_value = $('#jqxgrid_add').jqxGrid('getcellvalue', k, "hour");
                                if (hr_value == null || hr_value == 'undefined') {
                                    $("#jqxgrid_add").jqxGrid('showvalidationpopup', k, "hour", "Please Select the Hours");
                                    valid_hrs = 0;
                                    break;
                                }
                                else
                                {
                                    valid_hrs = 1;
                                }
                                var mins_value = $('#jqxgrid_add').jqxGrid('getcellvalue', k, "minute");
                                if (mins_value == null || mins_value == 'undefined') {
                                    $("#jqxgrid_add").jqxGrid('showvalidationpopup', k, "minute", "Please Select the Minutes");
                                    valid_mins = 0;


                                    break;
                                }
                                else
                                {
                                    valid_mins = 1;
                                }

                                var moc_value = $('#jqxgrid_add').jqxGrid('getcellvalue', k, "Mode_Of_Contact");
                                if (moc_value == null || moc_value == 'undefined') {
                                    $("#jqxgrid_add").jqxGrid('showvalidationpopup', k, "Mode_Of_Contact", "Please Select the Minutes");
                                    valid_moc = 0;
                                    break;
                                }
                                else
                                {
                                    valid_moc = 1;
                                }


                            }
                            //  alert (" date flag after k loop "+valid_dtflag);
                            //  alert (" Pg flag is after k loop"+valid_pgflag);
                            if (valid_custgrp == 0)
                            {
                                return false;
                            }
                            /* if (valid_itemgrp==0)
                             {
                             return false;
                             }*/
                            /*   if (valid_pgflag==0)
                             {
                             return false;
                             }*/
                            

                            if (valid_hrs == 0)
                            {
                                return false;
                            }
                            if (valid_mins == 0)
                            {
                                return false;
                            }
                            if (valid_moc == 0)
                            {
                                return false;
                            }
                            if (valid_crm_soc == 0)
                            {
                                return false;
                            }
                            if (valid_subact == 0)
                            {
                                return false;
                            }
                            if (valid_subgrp == 0)
                            {
                                return false;
                            }


                            var currentdate = $('#addcurrentdate').val();
                            currentdate = convertdmy_ymd(currentdate);
                            var griddata;
                            var data = {};
                            var rows = $('#jqxgrid_add').jqxGrid('getrows');
                            var actualpotenqty=0;
                            for (var i = 0; i < rowscount; i++)
                            {
                                var lead_appointmentdt=null;
                                var rowval = {};
                                griddata = $('#jqxgrid_add').jqxGrid('getrowdata', i);
                               	//alert("griddata  create_lead "+griddata.create_lead);
             /*                   alert(" gird row  "+i+" appiontmnt_dt "+griddata.appiontmnt_dt);
                                alert("type of object "+typeof(griddata.appiontmnt_dt));*/
                                var objType= typeof(griddata.appiontmnt_dt);
                                if(objType=='string')
                                {   
                             
                                    lead_appointmentdt = convertdmy_ymd(griddata.appiontmnt_dt);
                                   
                                }
                               
                                /*alert("noofleads  "+griddata.noofleads);
                                alert("actualpotenqty  "+griddata.actualpotenqty);
                                alert("prevstatusid  "+griddata.prevsubstatusid);
                                alert(" type noofleads "+typeof(griddata.noofleads));*/
                                
                                 if (typeof(griddata.line_id)=='undefined')
                                {
                                    rowval["line_id"] = 0;    
                                }
                                else
                                {
                                    rowval["line_id"] = griddata.line_id;
                                }
                                rowval["currentdate"] = currentdate;
                                rowval["custgroup"] = griddata.custgroup;
                                rowval["hdn_cust_id"] = griddata.id;
                                rowval["hdn_prod_id"] = griddata.itemid;
                                rowval["itemgroup"] = griddata.itemgroup;
                                rowval["potentialqty"] = griddata.Potential_Quantity;
                                rowval["actualpotenqty"] = griddata.actualpotenqty;
                                rowval["subactivity"] = griddata.Sub_Activity;
                                rowval["noofleads"] = griddata.noofleads;
                                //alert("currentdate  "+currentdate);
                                rowval["hour_s"] = griddata.hour;
                                rowval["minit"] = griddata.minute;
                                rowval["modeofcontact"] = griddata.Mode_Of_Contact;
                                rowval["quantity"] = griddata.Quantity_Requirement;
                                rowval["division"] = griddata.division;
                                rowval["leadid"] = griddata.leadid;
                                rowval["statusid"] = griddata.statusid;
                                if (typeof(griddata.prevstatusid)=='undefined')
                                {
                                    rowval["prevstatusid"] = 0;    
                                }
                                else
                                {
                                    rowval["prevstatusid"] = griddata.prevstatusid;
                                }
                                if (typeof(griddata.prevsubstatusid)=='undefined')
                                {
                                    rowval["prevsubstatusid"] = 0;    
                                }
                                else
                                {
                                    rowval["prevsubstatusid"] = griddata.prevsubstatusid;
                                }
                                rowval["leadsubstatusid"] = griddata.leadsubstatusid;

                                rowval["lead_appointmentdt"] = lead_appointmentdt;
                                rowval["not_able_to_get_appointment"] = griddata.not_able_to_get_appointment;
                                rowval["sample_rejected_reason"] = griddata.sample_rejected_reason;
                                rowval["order_cancelled_reason"] = griddata.order_cancelled_reason;
                                rowval["crm_soc_number"] = griddata.crm_soc_number;
                                
                                if (griddata.create_lead==undefined)
                                {
                                    rowval["create_lead"] = 0;    
                                }
                                else
                                {
                                    rowval["create_lead"] = griddata.create_lead;
                                }
                                
                                rowval["Remarks"] = griddata.Notes_Remarks;
                                data[i] = rowval;
                            }

                            var data = "save=true&" + $.param(data);
                            $.ajax({
                                dataType: 'json',
                                type: "POST",
                                url: 'dailyactivity/additemmaster',
                                cache: true,
                                data: data,
                                success: function (response) {
                                    alert("Record Added sucessfully ");
                                    $('#addWindow').hide();
                                    window.location.href = base_url + "dailyactivity";
                                },
                                error: function (result) {
                                    alert(result.responseText);
                                }
                            });
                        });
                        // end of Save Click function
                        $("#update_add_row").bind('click', function () {
                            var commit = $("#jqxgrid_n").jqxGrid('addrow', null, {});
                        });
                        // Start of Update Click function
                        $("#update_data").click(function (event)
                        {
                            $(".jqx-grid-validation, .jqx-grid-validation-arrow-up, .jqx-grid-validation-arrow-down").remove();
                            var rowscount = $("#jqxgrid_n").jqxGrid('getdatainformation').rowscount;
                            var col_count = $("#jqxgrid_n").jqxGrid('columns').records.length;
                            var valid_dtflag = 0;
                            var valid_pgflag = 0;

                            var valid_custgrp = 0;
                            var valid_itemgrp = 0;
                            var valid_hrs = 0;
                            var valid_mins = 0;
                            var valid_moc = 0;
                            var valid_subact = 0;
                            var valid_subgrp = 0;
                            var valid_lead_status=0;
                            var valid_lead_substatus=0;
                            var valid_crm_soc=0;

                            var hdr_id = $('#hdn_hdr_id').val();

                            for (var k = 0; k < rowscount; k++)
                            {

                                var cg_value = $('#jqxgrid_n').jqxGrid('getcellvalue', k, "custgroup");

                                if (cg_value == null || cg_value == 'undefined')
                                {
                                    $("#jqxgrid_n").jqxGrid('showvalidationpopup', k, "custgroup", "Please Select the Customer Group");
                                    valid_custgrp = 0;
                                    break;
                                }
                                else
                                {
                                    valid_custgrp = 1;
                                }

                                var subact_value = $('#jqxgrid_n').jqxGrid('getcellvalue', k, "subactivity");

                                if (subact_value == null || subact_value == 'undefined')
                                {
                                    $("#jqxgrid_n").jqxGrid('showvalidationpopup', k, "subactivity", "Please Select the Activity Type");
                                    valid_subact = 0;
                                    break;
                                }
                                else
                                {
                                    valid_subact = 1;
                                }

                                var sub_grp = $('#jqxgrid_n').jqxGrid('getcellvalue', k, "division");
                                if (sub_grp == null || sub_grp == 'undefined')
                                {
                                    $("#jqxgrid_n").jqxGrid('showvalidationpopup', k, "division", "Please select the Sale Type");
                                    valid_subgrp = 0;
                                    break;
                                }
                                else
                                {
                                    valid_subgrp = 1;
                                }

                                var lead_status = $('#jqxgrid_n').jqxGrid('getcellvalue', k, "leadstatusid");
                               // alert("status "+lead_status);
                                if (lead_status == null || lead_status == 'undefined')
                                {
                                    $("#jqxgrid_n").jqxGrid('showvalidationpopup', k, "leadstatusid", "Please select the Lead status");
                                    valid_lead_status = 0;
                                    break;
                                }
                                else
                                {
                                    valid_lead_status = 1;
                                }

                                var lead_substatus = $('#jqxgrid_n').jqxGrid('getcellvalue', k, "leadsubstatusid");
                               // alert("substatus "+lead_substatus);
                                if (lead_substatus == null || lead_substatus == 'undefined' || lead_substatus == 'Select Substatus')
                                {
                                    $("#jqxgrid_n").jqxGrid('showvalidationpopup', k, "leadsubstatusid", "Please select the Lead substatus");
                                    valid_lead_substatus = 0;
                                    break;
                                }
                                else
                                {
                                    valid_lead_substatus = 1;
                                }
                                var crm_soc = $('#jqxgrid_n').jqxGrid('getcellvalue', k, "crm_soc_number");
                                 //alert(" lead_status "+lead_status);
                                //alert("crm_soc "+crm_soc);
                                if(lead_status=='Expanding And Build Relationship')
                                {
                                   if (crm_soc == null || crm_soc == 'undefined' || crm_soc == '')
                                    {
                                        $("#jqxgrid_n").jqxGrid('showvalidationpopup', k, "leadstatusid", "without soc number you cannot convert this lead. Please revert back to old status");
                                        valid_crm_soc = 0;
                                        break;
                                    }
                                    else
                                    {
                                        valid_crm_soc = 1;
                                    } 
                                }
                                else
                                {
                                    valid_crm_soc = 1;
                                }
                                

                                var moc_value = $('#jqxgrid_n').jqxGrid('getcellvalue', k, "modeofcontact");
                                if (moc_value == null || moc_value == 'undefined') {
                                    $("#jqxgrid_n").jqxGrid('showvalidationpopup', k, "modeofcontact", "Please Select the Mode of contact");
                                    valid_moc = 0;
                                    break;
                                }
                                else
                                {
                                    valid_moc = 1;
                                }
                                
                                var hr_value = $('#jqxgrid_n').jqxGrid('getcellvalue', k, "hour_s");
                                if (hr_value == null || hr_value == 'undefined') {
                                    $("#jqxgrid_n").jqxGrid('showvalidationpopup', k, "hour_s", "Please Select the Hours");
                                    valid_hrs = 0;
                                    break;
                                }
                                else
                                {
                                    valid_hrs = 1;
                                }

                                

                                var mins_value = $('#jqxgrid_n').jqxGrid('getcellvalue', k, "minit");
                                if (mins_value == null || mins_value == 'undefined') {
                                    $("#jqxgrid_n").jqxGrid('showvalidationpopup', k, "minit", "Please Select the Minutes");
                                    valid_mins = 0;


                                    break;
                                }
                                else
                                {
                                    valid_mins = 1;
                                }

                               

                            }
                            //  alert (" date flag after k loop "+valid_dtflag);
                            //  alert (" Pg flag is after k loop"+valid_pgflag);
                            if (valid_custgrp == 0)
                            {
                                return false;
                            }
                           
                            if (valid_moc == 0)
                            {
                                return false;
                            }
                            if (valid_hrs == 0)
                            {
                                return false;
                            }
                            if (valid_mins == 0)
                            {
                                return false;
                            }
                            
                            if (valid_subact == 0)
                            {
                                return false;
                            }
                            if (valid_subgrp == 0)
                            {
                                return false;
                            }
                             if (valid_lead_status == 0)
                            {
                                return false;
                            }
                             if (valid_lead_substatus == 0)
                            {
                                return false;
                            }
                             if (valid_crm_soc == 0)
                            {
                                return false;
                            }
                            

                            var currentdate = $('#update_header_date').val();
                            currentdate = convert(currentdate);
                            

                            var griddata;
                            var data = {};
                            var rows = $('#jqxgrid_n').jqxGrid('getrows');
                            for (var i = 0; i < rowscount; i++)
                            {
                                
                                var rowval = {};
                                griddata = $('#jqxgrid_n').jqxGrid('getrowdata', i);
                                var lead_appointmentdt=null;
                                var objType= typeof(griddata.appiontmnt_dt);
                                if(objType=='string')
                                {   

                                    lead_appointmentdt = convertdmy_ymd(griddata.appiontmnt_dt);
                                   
                                }
                                
                                rowval["hdn_hdr_id"] = hdr_id;
                                //rowval["line_id"] = griddata.line_id;
                                if (typeof(griddata.line_id)=='undefined')
                                {
                                    rowval["line_id"] = 0;    
                                }
                                else
                                {
                                    rowval["line_id"] = griddata.line_id;
                                }
                                rowval["leadid"] = griddata.leadid;
                                rowval["currentdate"] = currentdate;
                                rowval["custgroup"] = griddata.custgroup;
                                rowval["itemgroup"] = griddata.itemgroup;
                                rowval["potentialqty"] = griddata.potentialqty;
                                rowval["actualpotenqty"] = griddata.actualpotenqty;
                                rowval["subactivity"] = griddata.subactivity;
                                rowval["hdn_cust_id"] = griddata.custid;
                                rowval["hdn_prod_id"] = griddata.itemid;
                                // alert("currentdate  "+currentdate);
                                rowval["hour_s"] = griddata.hour_s;
                                rowval["minit"] = griddata.minit;
                                rowval["modeofcontact"] = griddata.modeofcontact;
                                rowval["quantity"] = griddata.quantity;

                                rowval["division"] = griddata.division;
                                rowval["Remarks"] = griddata.remarks;
                                rowval["statusid"] = griddata.leadstatusid;
                                rowval["leadsubstatusid"] = griddata.leadsubstatusid;
                                if (typeof(griddata.prevstatusid)=='undefined')
                                {
                                    rowval["prevstatusid"] = 0;    
                                }
                                else
                                {
                                    rowval["prevstatusid"] = griddata.prevstatusid;
                                }
                                if (typeof(griddata.prevsubstatusid)=='undefined')
                                {
                                    rowval["prevsubstatusid"] = 0;    
                                }
                                else
                                {
                                    rowval["prevsubstatusid"] = griddata.prevsubstatusid;
                                }
                                rowval["lead_appointmentdt"] = lead_appointmentdt;
                                rowval["not_able_to_get_appointment"] = griddata.not_able_to_get_appointment;
                                rowval["sample_rejected_reason"] = griddata.sample_rejected_reason;
                                rowval["order_cancelled_reason"] = griddata.order_cancelled_reason;
                                rowval["crm_soc_number"] = griddata.crm_soc_number;
                                data[i] = rowval;
                            }

                            var data = "update=true&" + $.param(data);
                            $.ajax({
                                dataType: 'json',
                                type: "POST",
                                url: 'dailyactivity/updateitemmaster',
                                cache: true,
                                data: data,
                                success: function (response) {
                                    alert("Record Updated sucessfully ");
                                    $('#addWindow').hide();
                                    window.location.href = base_url + "dailyactivity";
                                },
                                error: function (result) {
                                    alert(result.responseText);
                                }
                            });
                        });
                        // end of Update Click function

                        $("#jqxgrid_n").bind('rowselect', function (event) {
                         
                             jqxgrid_n_row = event.args.rowindex;
                           // alert("in rowselect row value is "+row);
                             //  alert("in rowselect jqxgrid_n_row_index value is "+jqxgrid_n_row);
                            jqxgrid_n_row = jqxgrid_n_row;
                               //alert("in rowselect jqxgrid_n_row_index value after is "+jqxgrid_n_row);
                            
                            });

                        // view grid double click function start

                        $("#jqxgrid_n").on("celldoubleclick", function (event)
                        {
                            var column = event.args.column;
                            var rowindex = event.args.rowindex;
                            jqxgrid_n_row_index = rowindex;
                            jqxgrid_add_row_index = rowindex;
                            var columnindex = event.args.columnindex;
                            var columnname = column.datafield;
                            var collector = $("#collector_update").jqxDropDownList('getSelectedItem'); 
                            if (columnname == 'itemgroup')
                            {

                                // Source for item master grid start
                                    var url = "dailyactivity/get_data_itemmaster";
                                    var rows = {};
                                    jQuery.ajax({
                                        dataType: "html",
                                        url: url,
                                        type: "POST",
                                        async: false,
                                        error: function (xhr, status) {
                                            //  alert("check "+status+" test");
                                        },
                                        success: function (result) {
                                            var obj = jQuery.parseJSON(result);
                                            rows = obj.rows;
                                            //   rows = obj[1].rows;
                                            //  commonCols=obj[0].columns;
                                        }
                                    });
                                    var item_source =
                                            {
                                                datatype: "json",
                                                datafields: [{name: 'itemid', type: 'string'},{name: 'itemgroup', type: 'string'}],
                                                id: 'itemgroup',
                                                localdata: rows
                                            };

                                    //  alert("columns "+columns.toSource());    
                                    var dataAdapterItemMaster = new $.jqx.dataAdapter(item_source);
                                    $("#jqxgrid_selectItemMaster").jqxGrid(
                                            {
                                                width: '100%',
                                                source: dataAdapterItemMaster,
                                                theme: theme,
                                                selectionmode: 'singlecell',
                                                sortable: true,
                                                pageable: true,
                                                columnsresize: true,
                                                sortable: true,
                                                showfilterrow: true,
                                                filterable: true,
                                                columns: [
                                                    {text: 'Prod Id', dataField: 'itemid', width: 100, height: 600},
                                                    {text: 'Product Group', dataField: 'itemgroup', width: 500, height: 600},
                                                ]
                                            });
                                    // Source for item master grid END

                              //  $('#customWindow').hide();
                                $('#win_selectItemMaster').jqxWindow({theme: 'energyblue', autoOpen: false, width: 400, height: 500, resizable: true, title: 'select product'});

                                var x = ($(window).width() - $("#win_selectItemMaster").jqxWindow('width')) / 2 + $(window).scrollLeft();
                                var y = ($(window).height() - $("#win_selectItemMaster").jqxWindow('height')) / 2 + $(window).scrollTop();
                                $("#win_selectItemMaster").jqxWindow({ position: { x: x, y: y} });
                                $('#win_selectItemMaster').jqxWindow('open');
                                $('#win_selectItemMaster').jqxWindow({ zIndex: 99999}); 
                                $('#customWindow').mouseup(function () 
                                    {
                                       
                                        if ($('#win_selectItemMaster').jqxWindow('isOpen')) 
                                        {
                                           // alert("item true");
                                            $('#win_selectItemMaster').jqxWindow('bringToFront');
                                        }
                                        else
                                        {

                                           // alert("item false");
                                            $('#win_selectItemMaster').jqxWindow('bringToFront');
                                        }
                                    

                                    });
                            }

                            if (columnname == 'custgroup')
                            {
                                    if(collector==null)
                                        {
                                            alert("Please select the collector first");
                                        }
                                        else
                                        {
                                            $("#jqxgrid_selectCustomMaster").jqxGrid('clear');
                                         // Source for Customer Master grid start
                                            var url = "dailyactivity/get_data_customermaster_coll/"+collector.value;
                                            var rows = {};
                                            jQuery.ajax({
                                                dataType: "html",
                                                url: url,
                                                type: "POST",
                                                async: false,
                                                error: function (xhr, status) {
                                                    //  alert("check "+status+" test");
                                                },
                                                success: function (result) {
                                                    //  console.log(result);
                                                    var obj = jQuery.parseJSON(result);
                                                    rows = obj.rows;
                                                    //   rows = obj[1].rows;
                                                    //  commonCols=obj[0].columns;
                                                }
                                            });
                                            var customer_source1 =
                                                    {
                                                        datatype: "json",
                                                        datafields: [{name: 'id', type: 'number'},{name: 'customergroup', type: 'string'}],
                                                        localdata: rows
                                                    };

                                            //  alert("columns "+columns.toSource());    
                                            
                                            var dataAdapterCustomerMaster = new $.jqx.dataAdapter(customer_source1);

                                            $("#jqxgrid_selectCustomMaster").jqxGrid(
                                                    {
                                                        width: '100%',
                                                        source: dataAdapterCustomerMaster,
                                                        theme: theme,
                                                        selectionmode: 'singlecell',
                                                        sortable: true,
                                                        pageable: true,
                                                        columnsresize: true,
                                                        sortable: true,
                                                        showfilterrow: true,
                                                        filterable: true,
                                                        columns: [
                                                            {text: 'id', dataField: 'id', width: 100, height: 600},
                                                            {text: 'Customer Group', dataField: 'customergroup', width: 500, height: 600}
                                                        ]
                                                    });

                        // source for Customer Master grid end
                                            $('#win_selectCustMaster').jqxWindow({theme: 'energyblue', autoOpen: false, width: 400, height: 500, resizable: true, title: 'Select Customer'});
                                                $('#win_selectCustMaster').jqxWindow('open');
                                            var x = ($(window).width() - $("#win_selectCustMaster").jqxWindow('width')) / 2 + $(window).scrollLeft();
                                            var y = ($(window).height() - $("#win_selectCustMaster").jqxWindow('height')) / 2 + $(window).scrollTop();
                                                $("#win_selectCustMaster").jqxWindow({ position: { x: x, y: y} });
                                                $('#win_selectCustMaster').jqxWindow({ zIndex: 99999}); 
                                                $('#win_selectCustMaster').jqxWindow('bringToFront');
                                                $('#customWindow').mouseup(function () 
                                                {

                                                    if ($('#win_selectCustMaster').jqxWindow('isOpen')) 
                                                    {

                                                    $('#win_selectCustMaster').jqxWindow('bringToFront');
                                                    }
                                                    else
                                                    {


                                                    $('#win_selectCustMaster').jqxWindow('bringToFront');
                                                    }

                                            });
                                        }
                                
                                
                            }
                        });
                        // view grid double click function end

                        //  return value from item master start
                        $("#jqxgrid_selectItemMaster").on('cellselect', function (event) {

                            var rowindex = $("#jqxgrid_selectItemMaster").jqxGrid('getselectedrowindex', event.args.rowindex);
                            var prodName = $("#jqxgrid_selectItemMaster").jqxGrid('getcellvalue', event.args.rowindex, 'itemgroup');
                            var prodId = $("#jqxgrid_selectItemMaster").jqxGrid('getcellvalue', event.args.rowindex, 'itemid');

                             //var leadid = $("#jqxgrid_selectItemMaster").jqxGrid('getcellvalue', event.args.rowindex, 'leaid');
                            if (actionmode == 'add')
                            {
                                $('#addWindow').jqxWindow('show');
                                $('#addWindow').jqxWindow({ width: 1024, height: 'auto'});
                                $("#jqxgrid_add").jqxGrid('setcellvalue', jqxgrid_add_row_index, "itemgroup", prodName);
                                gl_customername = $("#jqxgrid_add").jqxGrid('getcellvalue', jqxgrid_add_row_index, 'custgroup');
                                gl_productname = $("#jqxgrid_add").jqxGrid('getcellvalue', jqxgrid_add_row_index, 'itemgroup');

                                $("#jqxgrid_add").jqxGrid('setcellvalue', jqxgrid_add_row_index, "Potential_Quantity", potential_quantity);
                                $("#jqxgrid_add").jqxGrid('setcellvalue', jqxgrid_add_row_index, "itemid", prodId);

                            }


                            if (actionmode == 'update')
                            {
                                var x = ($(window).width() - $("#customWindow").jqxWindow('width')) / 2 + $(window).scrollLeft();
                                var y = ($(window).height() - $("#customWindow").jqxWindow('height')) / 2 + $(window).scrollTop();
                                $("#customWindow").jqxWindow({ position: { x: x, y: y} });
                                $('#customWindow').jqxWindow('show');
                                $("#jqxgrid_n").jqxGrid('setcellvalue', jqxgrid_n_row_index, "itemgroup", prodName);
                                gl_customername = $("#jqxgrid_n").jqxGrid('getcellvalue', jqxgrid_n_row_index, 'custgroup');
                                gl_productname = $("#jqxgrid_n").jqxGrid('getcellvalue', jqxgrid_n_row_index, 'itemgroup');
                                $("#jqxgrid_n").jqxGrid('setcellvalue', jqxgrid_n_row_index, "itemid", prodId);

                            }

                            var url = "dailyactivity/get_potentialquantity/"+encodeURIComponent(gl_customername)+"/"+encodeURIComponent(gl_productname);
                            $.ajax({
                                dataType: "html",
                                url: url,
                                type: "POST",
                                async: false,
                                cache:false,
                                error: function (xhr, status) {
                                    alert("check " + status + " test");
                                },
                                success: function (result) {
                                    var obj = jQuery.parseJSON(result);
                                    rows = obj.rows;

                                    potential_quantity = rows[0].potential;
                                    noofleads =rows[0].noofleads;
                                    resulttype =rows[0].result_type;
                                    
                                }
                                //potential_quantity = rows[0].potential;
                            });
                          

                            if (actionmode == 'add')
                            {

                                $("#jqxgrid_add").jqxGrid('setcellvalue', jqxgrid_add_row_index, "Potential_Quantity", potential_quantity);
                                $("#jqxgrid_add").jqxGrid('setcellvalue', jqxgrid_add_row_index, "noofleads", noofleads);
                                $("#jqxgrid_add").jqxGrid('setcellvalue', jqxgrid_add_row_index, "result_type", resulttype);

                            }
                            if (actionmode == 'update')
                            {
                                $("#jqxgrid_n").jqxGrid('setcellvalue', jqxgrid_n_row_index, "noofleads", noofleads);
                                if(noofleads>0)
                                {
                            
                                 $("#jqxgrid_n").jqxGrid('setcellvalue', jqxgrid_n_row_index, "subactivity", "LEADS");
                                 
                                }

                                $("#jqxgrid_n").jqxGrid('setcellvalue', jqxgrid_n_row_index, "potentialqty", potential_quantity);
                                $("#jqxgrid_n").jqxGrid('setcellvalue', jqxgrid_n_row_index, "result_type", resulttype);


                            }
                            $('#win_selectItemMaster').jqxWindow('close');
                            $('#addWindow').jqxWindow('bringToFront');
                            // 

                            //   

                        });
                        //  return value from item master end

                        

                        //  return value from Customer Master start
                        $("#jqxgrid_selectCustomMaster").on('cellselect', function (event) {
                            var rowindex = $("#jqxgrid_selectCustomMaster").jqxGrid('getselectedrowindex', event.args.rowindex);

                            var gl_hdn_custid   = $("#jqxgrid_selectCustomMaster").jqxGrid('getcellvalue', event.args.rowindex, 'id'); 
                            var custid = $("#jqxgrid_selectCustomMaster").jqxGrid('getcellvalue', event.args.rowindex, 'customergroup');
                            var custName = $("#jqxgrid_selectCustomMaster").jqxGrid('getcellvalue', event.args.rowindex, 'customergroup');


                            if (actionmode == 'add')
                            {
                                $('#addWindow').jqxWindow('show');
                                $("#jqxgrid_add").jqxGrid('setcellvalue', jqxgrid_add_row_index, "custgroup", custName);
                                $("#jqxgrid_add").jqxGrid('setcellvalue', jqxgrid_add_row_index, "id", gl_hdn_custid);

                            }
                            if (actionmode == 'update')
                            {
                                $('#customWindow').jqxWindow('show');
                                $("#jqxgrid_n").jqxGrid('setcellvalue', jqxgrid_n_row_index, "custgroup", custName);
                                $("#jqxgrid_n").jqxGrid('setcellvalue', jqxgrid_n_row_index, "custid", gl_hdn_custid);
                            }

                            //  
                            $('#win_selectCustMaster').jqxWindow('close');
                            $('#addWindow').jqxWindow('bringToFront');
                        });
                        //  return value from Customer Master end

                        // initialize the popup window and buttons.

                        /* start for getting the selected leadid value from the grid */
                        $("#jqxgrid_n").on('cellendedit', function (event,value) 
                            {
                                var args = event.args;
                                var rowindex = args.rowindex;
                                var leadid =args.value;
                                var lead_poten;
                                var lead_req;

                                if(args.datafield=='leadid' && leadid!="" && leadid!="No Leads" )
                                {

                                        var url = "dailyactivity/get_leadpotential_update/"+leadid;
                                        $.ajax({
                                            dataType: "html",
                                            url: url,
                                            type: "POST",
                                            async: false,
                                            cache:false,
                                            error: function (xhr, status) {
                                                alert("check " + status + " test");
                                            },
                                            success: function (result) {
                                                var obj = jQuery.parseJSON(result);
                                                rows = obj.rows;

                                                lead_poten = rows[0].potential;
                                                lead_req = rows[0].requirement;
                                                lead_salestype =rows[0].lead_sale_type;
                                                lead_email_id =rows[0].email_id;
                                                lead_curr_stsid =rows[0].curr_stats_id;
                                                lead_curr_substsid =rows[0].curr_substats_id;
                                                lead_status_name =rows[0].leadstatusname;
                                                lead_substatus_name =rows[0].leadsubstatusname;

                                            }
                                        });
                                         $("#jqxgrid_n").jqxGrid('setcellvalue', rowindex, "potentialqty", lead_poten);
                                         $("#jqxgrid_n").jqxGrid('setcellvalue', rowindex, "quantity", lead_req);
                                         $("#jqxgrid_n").jqxGrid('setcellvalue', rowindex, "division", lead_salestype);
                                         $("#jqxgrid_n").jqxGrid('setcellvalue', rowindex, "modeofcontact", lead_email_id);
                                         $("#jqxgrid_n").jqxGrid('setcellvalue', rowindex, "subactivity", "LEADS");
                                         $("#jqxgrid_n").jqxGrid('setcellvalue', rowindex, "create_lead", 0);
                                         $("#jqxgrid_n").jqxGrid('setcellvalue', rowindex, "prevstatusid", lead_curr_stsid);
                                         $("#jqxgrid_n").jqxGrid('setcellvalue', rowindex, "prevsubstatusid", lead_curr_substsid);
                                         $("#jqxgrid_n").jqxGrid('setcellvalue', rowindex, "leadstatusid", lead_status_name);
                                         $("#jqxgrid_n").jqxGrid('setcellvalue', rowindex, "leadsubstatusid", lead_substatus_name);
                                        
                                         
                                         

                                }
                                if(args.datafield=='Sub_Activity')
                                {
                                    alert("in update cellendedit Sub_Activity");
                                }

                            });
                        $("#jqxgrid_add").on('cellendedit', function (event,value) 
                            {
                                var args = event.args;
                                var rowindex = args.rowindex;
                                var leadid =args.value;
                                var lead_poten;
                                var lead_req;
                                if(args.datafield=='leadid' && leadid!="" )
                                {

                                    var url = "dailyactivity/get_leadpotential/"+leadid;
                                        $.ajax({
                                            dataType: "html",
                                            url: url,
                                            type: "POST",
                                            async: false,
                                            cache:false,
                                            error: function (xhr, status) {
                                                alert("check " + status + " test");
                                            },
                                            success: function (result) {
                                                var obj = jQuery.parseJSON(result);
                                                rows = obj.rows;

                                                lead_poten = rows[0].potential;
                                                lead_req = rows[0].requirement;
                                                lead_salestype =rows[0].lead_sale_type;
                                                lead_email_id =rows[0].email_id;
                                                lead_curr_stsid =rows[0].curr_stats_id;
                                                lead_curr_substsid =rows[0].curr_substats_id;
                                            }
                                        });
                                         $("#jqxgrid_add").jqxGrid('setcellvalue', rowindex, "Potential_Quantity", lead_poten);
                                         $("#jqxgrid_add").jqxGrid('setcellvalue', rowindex, "Quantity_Requirement", lead_req);
                                         $("#jqxgrid_add").jqxGrid('setcellvalue', rowindex, "division", lead_salestype);
                                         $("#jqxgrid_add").jqxGrid('setcellvalue', rowindex, "Mode_Of_Contact", lead_email_id);
                                         $("#jqxgrid_add").jqxGrid('setcellvalue', rowindex, "Sub_Activity", "LEADS");
                                         $("#jqxgrid_add").jqxGrid('setcellvalue', rowindex, "create_lead", 0);
                                         $("#jqxgrid_add").jqxGrid('setcellvalue', rowindex, "prevstatusid", lead_curr_stsid);
                                         $("#jqxgrid_add").jqxGrid('setcellvalue', rowindex, "prevsubstatusid", lead_curr_substsid);
                                         

    
                                }

                                if(args.datafield=='itemgroup')
                                {
                                    //alert("in cellendedit add mode itemgroup");
                                }

                                
                            });
                        /* End for getting the selected leadid value from the grid*/

                        function convert(currentdate)
                        {
                            var date = new Date(currentdate), mnth = ("0" + (date.getMonth() + 1)).slice(-2), day = ("0" + date.getDate()).slice(-2);
                            return [date.getFullYear(), mnth, day].join("-");
                            //alert([ date.getFullYear(), mnth, day ].join("-"));
                        }
                        function convertYdm(currentdate)
                        {
                            var date = new Date(currentdate), mnth = ("0" + (date.getMonth() + 1)).slice(-2), day = ("0" + date.getDate()).slice(-2);
                            return [date.getFullYear(), day, mnth].join("-");
                            //alert([ date.getFullYear(), mnth, day ].join("-"));
                        }
                        function convertdmy_ymd(currentdate)
                        {
                           //  alert("currentdate date passed "+currentdate); //25/08/2015
                            var entrydate = currentdate.split("/"); //lead_date ["25", "08", "2015"] 
                            
                            return [entrydate[2], entrydate[1], entrydate[0]].join("-");
                        }
                        function convertmindate(currentdate)
                        {
                           //  alert("currentdate date passed "+currentdate); //25/08/2015
                            var entrydate = currentdate.split("-"); //lead_date ["25", "08", "2015"] 
                            //alert("lead_date "+entrydate.toSource());
                         //   return [entrydate[2], entrydate[1], entrydate[0]].join("-");
                         return entrydate;
                        }

                        $("#newtempitemmaster").submit(function(e) {
                                e.preventDefault();
                                }).validate({
                                errorElement: "span",
                                ignore: "input[type='text']:hidden",
                                //set the rules for the fild names
                                rules: {
                                    temp_itemname: {
                                        required: true
                                    },
                                    hdn_prod_stat: {
                                        min: 1
                                    }

                                },
                                

                                //set error messages
                                messages: {
                                    temp_itemname: {
                                        required: "Please Enter the Product Name"
                                    },
                                    hdn_prod_stat: {
                                        min: "Enter different product"
                                    }
                                },
                                //our custom error placement
                                errorElement: "span",
                                        errorPlacement: function (error, element) {
                                            error.appendTo(element.parent());
                                        },
                                submitHandler: function(form) { 
                                    //alert("Do some stuff...");
                                    //submit via ajax
                                    $.ajax({
                                            url: base_url+'dailyactivity/save_newproduct',
                                            data: 'action=save_newproduct&item_name=' + temp_itemname.value,
                                            dataType: 'json',
                                            type: 'post',
                                            success: function (response) 
                                            {
                                                // validateTempitemname.html(response.msg);
                                                response_msg = response.ok;
                                               // alert("response_msg "+response_msg);
                                                validateTempitemname.html(response.msg);
                                                //$("#hdn_prod_stat").val(response_msg);
                                                if(response_msg==true)
                                                document.getElementById("hdn_prod_stat").value = 1;
                                                else
                                                document.getElementById("hdn_prod_stat").value = 0;    
                                            }
                                        });
                                    alert("New Product Added..!");
                                    $('#win_newproduct').jqxWindow('close');
                                    return false;  //This doesn't prevent the form from submitting.
                                }



                                });


                                var validateTempitemname = $('#validateTempitemname');
                                $('#temp_itemname').keyup(function () {
                                var temp_itemname = this;
                                if (this.value != this.lastValue) {
                                    if (this.timer)
                                        clearTimeout(this.timer);
                                    validateTempitemname.removeClass('error').html('<img src="'+base_url+'public/images/ajax-loader.gif" height="16" width="16" /> checking availability...');

                                    this.timer = setTimeout(function () {
                                        $.ajax({
                                            url: base_url+'product/check_itemname',
                                            data: 'action=check_itemname&item_name=' + temp_itemname.value,
                                            dataType: 'json',
                                            type: 'post',
                                            success: function (response) 
                                            {
                                                // validateTempitemname.html(response.msg);
                                                response_msg = response.ok;
                                               // alert("response_msg "+response_msg);
                                                validateTempitemname.html(response.msg);
                                                //$("#hdn_prod_stat").val(response_msg);
                                                if(response_msg==true)
                                                document.getElementById("hdn_prod_stat").value = 1;
                                                else
                                                document.getElementById("hdn_prod_stat").value = 0;    
                                            }
                                        });
                                    }, 200);

                                    this.lastValue = this.value;
                                }
                        });

                    }); // end of document.ready function
                </script>

                <div class="announcement noprint" id="announcement">
                    <marquee direction="left" scrolldelay="10" scrollamount="3" behavior="scroll" class="marStyle" onmouseover="javascript:stop();" onmouseout="javascript:start();">LBL_NO_ANNOUNCEMENTS</marquee>
                </div>
                <input value="Leads" id="module" name="module" type="hidden">
                <input value="" id="parent" name="parent" type="hidden">
                <input value="List" id="view" name="view" type="hidden">
                <input type="hidden" id="hdn_hdr_id" name="hdn_hdr_id" value="<?php echo $this->uri->segment(3); ?>" />

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
                                <p onclick="#"  class="selectedQuickLink">
                                    <a class="quickLinks" href="<?= base_url() ?>leads"><strong>Leads List</strong>
                                    </a>
                                </p>
                                <p onclick="#"  class="unSelectedQuickLink"><a class="quickLinks" href="<?= base_url() ?>dashboard"><strong>Dashboard</strong></a></p>
                            </div>
                            <div class="clearfix"></div>
                            <div class="quickWidgetContainer accordion">
                                <div class="quickWidget">
                                    <div class="accordion-heading accordion-toggle quickWidgetHeader" data-target="#Leads_sideBar_LBL_RECENTLY_MODIFIED" data-toggle="collapse" data-parent="#quickWidgets" data-label="LBL_RECENTLY_MODIFIED" data-widget-url="#">
                                        <span class="pull-left">
                                            <img class="imageElement" data-rightimage="<?= base_url() ?>public/images/images/rightArrowWhite.png" data-downimage="<?= base_url() ?>public/images/images/downArrowWhite.png" src="<?= base_url() ?>public/images/rightArrowWhite.png">
                                        </span>
                                        <h5 class="title widgetTextOverflowEllipsis pull-right" title="Recently Modified">Recently Modified</h5>
                                        <div class="loadingImg hide pull-right"><div class="loadingWidgetMsg"><strong>Loading Widget</strong>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="widgetContainer accordion-body collapse" id="Leads_sideBar_LBL_RECENTLY_MODIFIED" data-url="module=Leads&amp;view=IndexAjax&amp;mode=showActiveRecords">
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

                                    <span class="btn-group">
                                            <!-- <button id="Leads_listView_basicAction_LBL_ADD_RECORD" class="btn addButton" onclick='window.location.href="leads/add"'><i class="icon-plus icon-white"></i>&nbsp;<strong>Add Lead</strong></button> -->
                                        <?php if ($this->session->flashdata('message') != "") { ?>
                                            <div class="alert alert-message.success"><p style="width:709px; text-align:center;font-size:18px;"><?php echo $this->session->flashdata('message'); ?></p></div>
<?php } ?>


                                    </span>
                                </span>

                                <span class="hide filterActionImages pull-right"><i title="Deny" data-value="deny" class="icon-ban-circle alignMiddle denyFilter filterActionImage pull-right"></i><i title="Approve" data-value="approve" class="icon-ok alignMiddle approveFilter filterActionImage pull-right"></i><i title="Delete" data-value="delete" class="icon-trash alignMiddle deleteFilter filterActionImage pull-right"></i><i title="Edit" data-value="edit" class="icon-pencil alignMiddle editFilter filterActionImage pull-right"></i>
                                </span>

                            </div>
                        </div>
                        <div class="listViewContentDiv" id="listViewContents" style="float: left; width:100%;">
                            <!-- Start your grid content from here --> 	
                            <div>
                                <div id="jqxgrid"></div>
                                <div style="margin-top: 30px;">
                                    <div id="cellbegineditevent"></div>
                                    <div style="margin-top: 10px;" id="cellendeditevent"></div>
                                </div>

                                <!--  This part of div contain windows Start      -->

                                <div id="customWindow" style="float: left; width:100%; display:none;">
                                    <div id="customWindowContent" style="float: left; width:1013px;">
                                        <div style="float: left; width:95%; padding-left: 7px;" >
                                         <span id="validateProductName"></span>
                                            <label style="float: left;">Entry Date: </label><label style="float: left; padding-left: 40px;">Executive Name </label>&nbsp;<label style="float: left;  padding-left: 107px;">Branch </label>
                                        </div> 

                                        <div style=" float: left; width:66%; padding-left: 7px;">
                                            <input id='update_header_date'/>&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" id="username"/>&nbsp;&nbsp;&nbsp;<input type="text" id="branch"/>
                                        </div>
                                        <div id='collector_update'></div> 
                                        <div id="jqxgrid_n" style="posistion:relative; float: left; width:100%;" ></div>
                                        <input id="update_add_row" type="hidden" value="Add New Row" />
                                        <input id="update_delete_row" type="hidden" value="Delete Selected Row" />
                                        <input id="update_data" type="hidden" value="Update" />
                                    </div>           
                                </div>
                                <!-- add popup start -->
                                <!--  This part of div contain windows for view mode Start      -->

                               
                                 <!--  This part of div contain windows for view mode End      -->
                                <!-- add popup start -->
                                        <div id="addWindow" style="width:100%; margin-left:200px; display:none;" >
                                                <div id="addWindowContent" style="float: left; width:100%;">
                                                    <span id="validateProductName_add"></span>
                                                    <div style=" float: left; "><label>Entry Date: (you can add entries for the past one week only) </label>
                                                        <div id="addcurrentdate"></div>
                                                        <div id='collector'></div>
                                                    </div>

                                                    <div id="jqxgrid_add" style="; float: left; width:100%;" ></div>
                                                    <input id="addrowbutton" type="hidden" value="Add New Row" />
                                                    <input id="deleterowbutton" type="hidden" value="Delete Selected Row" />
                                                    <input id="save" type="hidden" value="save data" />

                                                </div>           
                                            </div>

                                <!-- add popup end -->
                                <!-- Select itemmaster popup start -->
                                <div id="win_selectItemMaster" style="position: fixed; left: 50%; top: 50%;">
                                    <div style="margin: 10px">
                                        <div id="jqxgrid_selectItemMaster" style="width: 400px;"></div>
                                    </div>
                                </div>
                                <!-- Select Itemmaster popup end -->

                                <!-- Select customer master popup start -->

                                <div id="win_selectCustMaster" style="position: fixed; left: 50%; top: 50%;">
                                    <div style="margin: 10px">
                                        <div id="jqxgrid_selectCustomMaster" style="width: 400px;"></div>
                                    </div>
                                </div>
                                <!-- Select customer master popup end -->
                                <!-- Select Appiontment Date popup Start -->
                                    <div id="popupWindow">
                                        <div style="overflow: hidden; margin-top: 0px;">
                                            <table>
                                                <tr>
                                                    <td align="right">
                                                        Appiontment Date:
                                                    </td>
                                                    <td align="left">
                                                        <div id="appiontment_date" name="appiontment_date" style="margin-top: 0px;"> </div>
                                                        <input style="margin-right: 5px;" type="button" name="save_appdt" id="save_appdt" value="Save" />
                                                    </td>
                                                </tr>
                                            </table> 
                                        </div>
                                    </div>
                                <!-- Select Appiontment Date popup End -->
                                 <!-- Select Appiontment Date popup Start -->
                                    <div id="popupWindowNot">
                                        <div style="overflow: hidden; margin-top: 0px;">
                                            <table>
                                                <tr>
                                                    <td align="right">
                                                        Reason:
                                                    </td>
                                                    <td align="left">
                                                    <input type="text" id="not_able_to_get_appointment" name="not_able_to_get_appointment" style="margin-top: 0px;" />
                                                       
                                                        <input style="margin-right: 5px;" type="button" name="save_na2gappdt" id="save_na2gappdt" value="Save" />
                                                    </td>
                                                </tr>
                                            </table> 
                                        </div>
                                    </div>
                                <!-- Select Appiontment Date popup End -->
                                <!-- Select Sample Rejected Reason Start --> 
                                    <div id="popupWindowReject">
                                        <div style="overflow: hidden; margin-top: 0px;">
                                            <table>
                                                <tr>
                                                    <td align="right">
                                                        Reason:
                                                    </td>
                                                    <td align="left">
                                                    <input type="text" id="sample_rejected_reason" name="sample_rejected_reason" style="margin-top: 0px;" />
                                                       
                                                        <input style="margin-right: 5px;" type="button" name="save_samplerej" id="save_samplerej" value="Save" />
                                                    </td>
                                                </tr>
                                            </table> 
                                        </div>
                                    </div>
                                <!-- Select Sample Rejected Reason  End -->
                                 <!-- Order Cancelled Reason Start --> 
                                    <div id="popupWindowOrdercancel">
                                        <div style="overflow: hidden; margin-top: 0px;">
                                            <table>
                                                <tr>
                                                    <td align="right">
                                                        Reason:
                                                    </td>
                                                    <td align="left">
                                                    <input type="text" id="order_cancelled_reason" name="order_cancelled_reason" style="margin-top: 0px;" />
                                                       
                                                        <input style="margin-right: 5px;" type="button" name="save_ordercancel" id="save_ordercancel" value="Save" />
                                                    </td>
                                                </tr>
                                            </table> 
                                        </div>
                                    </div>
                                <!-- Order cancelled Reason  End -->
                                <!-- Start for get soc number start-->
                                    <div id="popupWindowSoc">
                                        <div style="overflow: hidden; margin-top: 0px;">
                                            <table>
                                                <tr>
                                                    <td align="left">CRM SOC Number:</td>
                                                    <td align="left">
                                                    <input type="text" id="crm_soc_number" readonly="true" name="crm_soc_number" style="margin-top: 0px;" />
                                                    </td>
                                                </tr>
                                                <tr>
                                                 <td colspan="2">
                                                       <div id="jqxcustomergrid"></div>
                                                     <input style="margin-right: 5px;" type="button" name="save_socnumber" id="save_socnumber" value="Save" />
                                                 </td>
                                                </tr>
                                            </table> 
                                        </div>
                                    </div>
                                <!-- End for get soc number start -->
                                <!-- add new product start -->
                                <div id="win_newproduct" style="position: fixed; left: 50%; top: 50%;">
                                    <div>Header</div>
                                    <div>
                                        <form action="dailyactivity/savenewitem" method="post" id="newtempitemmaster" name="newtempitemmaster">
                                               <input type="text" name="temp_itemname" id="temp_itemname" value="" size="25" />
                                               <span id="validateTempitemname"></span><?php echo form_error('newtempitemmaster'); ?>  
                                                <input class="submit" id="savenewitem" name="savenewitem" type="submit" value="Submit" />
                                                <input type="hidden" id="hdn_userid" name="hdn_userid" value="656"/>
                                                <input type="hidden" id="hdn_prod_stat" name="hdn_prod_stat" value="0"/>
                                        </form>
                                    </div>
                                </div>
                                 
                                <!-- add new product end -->

                            <!--  This part of div contain windows End      -->
                        </div>
                        <!-- End of Grid content -->						
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
    <p style="margin-top:5px;margin-bottom:0;" align="center">Powered by Pure CRM 6.0.0Beta©2013 - 2018&nbsp;
        <a href="www.pure-chemical.com" target="_blank">pure-chemical.com
        </a>&nbsp;|&nbsp;
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
