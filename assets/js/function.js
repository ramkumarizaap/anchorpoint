$(document).ready(function(){
	//$('a,button').tooltip();

 
	$('.singledate').daterangepicker({
	  singleDatePicker: true,
	  showDropdowns: true,
    autoUpdateInput: false,
	  locale: {
	    format: 'YYYY-MM-DD',
	  }
	});
$('.timepicker').wickedpicker();
   
   $('.select2').select2();
  $('.singledate').on('apply.daterangepicker', function(ev, picker) {
      $(this).val(picker.startDate.format('YYYY-MM-DD'));
  });


  init_daterangepicker();

	$('input[id=base-input]').change(function() {
        $('#fake-input').val($(this).val().replace("C:\\fakepath\\", ""));
    });
$("#pdfForm").dropzone({
    maxFiles: 1,
    addRemoveLinks:true,
    acceptedFiles:"application/pdf",
    dictRemoveFile:"Remove",
    dictDefaultMessage:"Drag or Drop pdf here",
    url:base_url+'booking/pdfupload',
    success:function(data)
    {
      data = JSON.parse(data.xhr.response);
      console.log(data);
       $("input[name='officer_name']").val(data['officer_name']);
        $("input[name='po_no']").val(data['po_no']);
        $("input[name='checkin_date']").val(data['checkin_date']);
        $("input[name='checkin_time']").val(data['checkin_time']);
        $("select[name='rank']").val(data['rank']).change();
        $("select[name='executive']").val(data['executive']).change();
        $("select[name='vessel']").val(data['vessel']).change();
    },
    reset:function()
    {
      $("form.bookingForm")[0].reset();
      $(".dz-message").show();
      $('.select2').val(null).trigger("change");
    },
    complete:function()
    {
      $(".dz-message").hide();
    },
    processing:function()
    {
      $(".dz-message").hide();
    }
  });

  // $(".date_range_max").daterangepicker({
  //      maxDate: 
  // });

  // $("form#pdfForm").submit(function(){
  //   form = new FormData();
  //   form.append('file', $('#pdffile')[0].files[0]);
  //   console.log($('#pdffile')[0].files[0]);
  //   $.ajax({
  //     url:base_url+'booking/pdfupload',
  //     data:form,
  //     processData: false, 
  //     contentType: false,
  //     type:"POST",
  //     success:function(data)
  //     {
  //       data = JSON.parse(data);
  //       $("input[name='officer_name']").val(data['officer_name']);
  //       $("input[name='po_no']").val(data['po_no']);
  //       $("input[name='checkin_date']").val(data['checkin_date']);
  //       $("input[name='checkin_time']").val(data['checkin_time']);
  //       $("select[name='rank']").val(data['rank']).change();
  //       $("select[name='executive']").val(data['executive']).change();
  //       $("select[name='vessel']").val(data['vessel']).change();
  //       $("form#pdfForm")[0].reset();
  //     },
  //     error:function(data)
  //     {
  //       console.log("Error :"+data);
  //     }
  //   });
  //    return false;
  // });

  $("form#LocationForm").submit(function(e){
      e.preventDefault();
      form = $(this).serializeArray();
      if(form[0].value=="")
      {
        $(".msg").addClass("red");
        $(".msg").html("Please Enter Location Name");
        return false;
      }      
      $.ajax({
      type:"POST",
      url:base_url+"taxi/add_location",
      data:form,
      success:function(data)
      {
        data = JSON.parse(data);
        $(".msg").addClass(data.class);
        $(".msg").html(data.msg);
        $("form#LocationForm")[0].reset();
      },
      error:function(data)
      {
        refresh_grid();
      }
    });
  });
  $("form#ChargeForm").submit(function(e){
      e.preventDefault();
      valid = 0;
      form = $(this).serializeArray();
      $("form#ChargeForm input,form#ChargeForm select").each(function(i,ele){
        if($(this).val()=="")
        {
          $(ele).next(".msg").addClass("red");
          str = $(this).attr("name").replace("_"," ");
          $(ele).next(".msg").html("The "+str+" field is required");
          valid++;
        }
        else if($(this).val()!="")
        {
          $(ele).next(".msg").html("");
          $(ele).next(".msg").removeClass("red");
        }
      });
      if(valid==0 || valid=="0")
      { 
        $.ajax({
          type:"POST",
          url:base_url+"taxi/add_charge",
          data:form,
          success:function(data)
          {
            console.log(data);
            data = JSON.parse(data);
            $("form#ChargeForm .msg.last-msg").addClass(data.class);
            $("form#ChargeForm .msg.last-msg").html(data.msg);
            $("form#ChargeForm")[0].reset();
          },
          error:function(data)
          {
            refresh_grid();
          }
        });
      }
  });

  $("select.waiting_charge,input.taxi_kms,select.day_select").on('change keyup',function(){
    ch = $("input.taxi_charge");
    waiting = $("select.waiting_charge").val();
    kms = $("input.taxi_kms").val();
    day = $("select.day_select").val();
    if(kms!="" && day!="")
    {
      $.ajax({
        type:"POST",
        url:base_url+"taxi/get_charge",
        data:{waiting:waiting,kms:kms,day:day},
        success:function(data)
        {
          // console.log(data);
          data = JSON.parse(data);
          ch.val(data.amount);
        },
        error:function(data)
        {
          console.log(data);
        }
      });
    }
  });



 $("form.operationForm").submit(function(e){
  e.preventDefault();
  form = $(this).serializeArray();
  var val = $.map($('input[name="op_select[]"]:checked'), function(c){return c.value; })
  form.push({name:"opt",value:val});
  // console.log(form);
  $.ajax({
    type:"POST",
    url:base_url+"booking/operation",
    data:form,
    success:function(data)
    {
      console.log(data);
      $.fn.init_progress_bar();
      $("form.operationForm")[0].reset();
      refresh_grid();
    },
    error:function(data)
    {
      refresh_grid();
    }
  });
 });

$("input[name='check-all']").click(function(){
  st = $(this).prop('checked');
  if(st)
    $("input[name='op_select[]']").prop('checked',true);
  else
    $("input[name='op_select[]']").prop('checked',false);
});


$(".export-excel").click(function(){
  $.ajax({
    type:"POST",
    url:base_url+"taxi/export_excel",
    data:"",
    success:function(data)
    {
      console.log(data);
    },
    error:function(data)
    {
      console.log(data);
    }
  });
});


});	
function getFormatDate(d){
    return d.getMonth()+1 + '/' + d.getDate() + '/' + d.getFullYear()
}

function init_daterangepicker(seldate)
{

	var seldate = seldate?seldate:'';

    $('.date_range').daterangepicker({
    	showDropdowns: true,
    	ranges: {
           'Today': [moment(), moment()],
           'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
           'Last 7 Days': [moment().subtract(6, 'days'), moment()],
           'Last 30 Days': [moment().subtract(29, 'days'), moment()],
           'This Month': [moment().startOf('month'), moment().endOf('month')],
           'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        locale: {
		    format: 'YYYY-MM-DD',
		    separator: " | ",
		},
        startDate: moment().startOf('month'),
        endDate: moment().endOf('month'),        
		alwaysShowCalendars: true,
		opens: "right"
        
    }, function(start, end, label) {
	  	//console.log("New date range selected: ' + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD') + ' (predefined range: ' + label + ')");
	});


	if(seldate){
		var splitdat = seldate.split("|");
		$(".date_range").data('daterangepicker').setStartDate(splitdat[0]);
		$(".date_range").data('daterangepicker').setEndDate(splitdat[1]);
		$(".date_range").data('daterangepicker').updateView();
	}		
}

function init_checkbox(selval){

	selval = selval?selval:'';

	if(selval){		
		$.each(selval, function( index, value ) {
			$('#checkbox-'+value).attr('checked', true);
		});	
	}

	$(".checkbox").checkboxradio({ icon: false });

}

function numbersonly(e) {
  var unicode=e.charCode? e.charCode : e.keyCode
  //alert(unicode)
  if (unicode!=8 && unicode != 46){ //if the key isn't the backspace key (which we should allow)
  if (unicode<48||unicode>57) //if not a number
    {
      if(unicode==8 || unicode==46 || unicode == 37 || unicode == 39)//To  enable tab index in firefox and mac.(TAB, Backspace and DEL from the keyboard)
      return true
        else
      return false //disable key press
    }
  }
}

//to delete selected record from list.
function delete_record(del_url,elm){

	$("#div_service_message").remove();
    
    	retVal = confirm("Are you sure to remove?");

        if( retVal == true ){
   
            $.post(base_url+del_url,{},function(data){           
                
                if(data.status == "success"){
                //success message set.
                service_message(data.status,data.message);
                
                //grid refresh
                refresh_grid();
    
            }
            else if(data.status == "error"){
                 //error message set.
                service_message(data.status,data.message);
            }
            
            },"json");
       }  
      
      
}


function create_timesheet(elm)
{
	
	var hour = $("#working_hours").val();
  var timesheet_type = $("#timesheet_type").val();
  var empproject = $("#empproject").val();
	
  if(!hour && !empproject){
    alert("Please enter hours or select project!");
    return false;
  }

	if(!hour)
		hour = 0;
	
	var data = {};

	data = $("#advance_search_form").serialize();

	data += "&hours="+hour+"&empproject="+empproject+"&timesheet_type="+timesheet_type;

	$.post(base_url+'timesheet/create',data,function(rdata){
					
		if(rdata.status == 'success'){
			refresh_grid();
			service_message(rdata.status,rdata.message);
		}
		else
		{
			service_message(rdata.status,rdata.message);
		}	

	}, 'json');			
	
}

function edit_timesheet(action_type,edit_id)
{
  
  action_type = action_type?action_type:'form';
  
  data = {};

  if(action_type == 'process')
    data = $("#timesheet_edit").serialize();


  $.post(base_url+'timesheet/edit/'+edit_id,data,function(rdata){
          
      if(rdata.status == 'success')
      {
        $("#TimesheetEdit").modal('hide');
        refresh_grid();
        service_message(rdata.status,rdata.message);
        
      }
      else
      {
        $("#TimesheetEdit").html(rdata.content);
        $("#TimesheetEdit").modal('show');
      } 

  }, 'json');     
  
}

function create_project(action_type)
{
  
  action_type = action_type?action_type:'form';
  
  data = {};

  if(action_type == 'process')
    data = $("#create_project_form").serialize();


  $.post(base_url+'timesheet/project',data,function(rdata){
          
      if(rdata.status == 'success')
      {
        $("#CreateProject").modal('hide');
        refresh_grid();
        
        $('.empproject').html(rdata.projects);

        service_message(rdata.status,rdata.message);
        
      }
      else
      {
        $("#CreateProject").html(rdata.content);
        $("#CreateProject").modal('show');
      } 

  }, 'json');     
  
}

function export_timesheet(type){

	$("#advance_search_form").attr("action",base_url+'/'+current_controller+'/export/'+type);
	$("#advance_search_form").submit();
}

/* refresh grid after ajax submitting form */
function refresh_grid(data_tbl){
     
     data_tbl =(data_tbl)?data_tbl:"data_table";
     var cur_page = $("#base_url").val()+$("#cur_page").val();
     $.fn.init_progress_bar();
     $.fn.display_grid(cur_page,data_tbl);
}

function service_message(err_type,message,div_id){
    
    div_id = (div_id)?div_id:false; 	

    $("#div_service_message").remove();
    
    var str  ='<div id="div_service_message" class="alert alert-'+err_type+' alert-dismissible">';
        str +='<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>';
	    str +='<strong>'+capitaliseFirstLetter(err_type)+':&nbsp;</strong>';
	    str += message;
        str +='</div>';
        
        if(div_id){
             $("#"+div_id).html(str);
        }
        else
        {
            $(".blue-mat").after(str);
            scroll_to("div_service_message");
        }
            
}

function scroll_to(jump_id){
    //page scroll
    if(jump_id !=""){
       $(window).scrollTop($('#'+jump_id).offset().top); 
    }
}

function capitaliseFirstLetter(string)
{
    return string.charAt(0).toUpperCase() + string.slice(1);
}

function get_employeeslist(val,selval){

  $.post(base_url+'timesheet/org_employees/'+val,{},function(rdata){
          
      if(rdata.status == 'success')
      {
        $(".filter_employee_list").html(rdata.content);
        init_checkbox(selval);
        
      }
      

  }, 'json');
}
