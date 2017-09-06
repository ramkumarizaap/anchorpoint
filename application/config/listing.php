<?php
/*
 * view - the path to the listing view that you want to display the data in
 * 
 * base_url - the url on which that pagination occurs. This may have to be modified in the 
 * 			controller if the url is like /product/edit/12
 * 
 * per_page - results per page
 * 
 * order_fields - These are the fields by which you want to allow sorting on. They must match
 * 				the field names in the table exactly. Can prefix with table name if needed
 * 				(EX: products.id)
 * 
 * OPTIONAL
 * 
 * default_order - One of the order fields above
 * 
 * uri_segment - this will have to be increased if you are paginating on a page like 
 * 				/product/edit/12
 * 				otherwise the pagingation will start on page 12 in this case 
 * 
 * 
 */
 

$config['booking_logs'] = array(
	"view"		=> 	'listing/listing',
	"init_scripts" => 'listing/init_scripts',
	"advance_search_view" => 'booking/filter',
	"base_url"	=> 	'/booking/logs/',
	"per_page"	=>	"20",
	"fields"	=> array(   
					'inv_no'=>array('name'=>'Invoice No', 'data_type' => 'String', 'sortable' => FALSE, 'default_view'=>1),
					'po_no'=>array('name'=>'Po No', 'data_type' => 'String', 'sortable' => FALSE, 'default_view'=>1),
					'officer_name'=>array('name'=>'Officer Name', 'data_type' => 'String', 'sortable' => FALSE, 'default_view'=>1),
					'rank'=>array('name'=>'Rank', 'data_type' => 'String', 'sortable' => FALSE, 'default_view'=>1),
					'executive'=>array('name'=>'Booking Executive', 'data_type' => 'string', 'sortable' => FALSE, 'default_view'=>1),
					'purpose'=>array('name'=>'Purpose Of Visit', 'data_type' => 'String', 'sortable' => FALSE, 'default_view'=>1),
					'course_name'=>array('name'=>'Course Name', 'data_type' => 'String', 'sortable' => FALSE, 'default_view'=>1),
					'vessel'=>array('name'=>'Assigned Vessel', 'data_type' => 'String', 'sortable' => FALSE, 'default_view'=>1),
					'checkin_date'=>array('name'=>'Check In Date', 'data_type' => 'date', 'sortable' => FALSE, 'default_view'=>1),
					'checked_in'=>array('name'=>'Checked In', 'data_type' => 'String', 'sortable' => FALSE, 'default_view'=>1),
					'checkout_date'=>array('name'=>'Checkout Date', 'data_type' => 'date', 'sortable' => FALSE, 'default_view'=>1),
					'occupancy'=>array('name'=>'Occupancy', 'data_type' => 'string', 'sortable' => FALSE, 'default_view'=>1),
					'room'=>array('name'=>'Room', 'data_type' => 'string', 'sortable' => FALSE, 'default_view'=>1),
					'lunch'=>array('name'=>'No.of Room Nights', 'data_type' => 'String', 'sortable' => FALSE, 'default_view'=>1),
					'tariff'=>array('name'=>'Room Tariff', 'data_type' => 'String', 'sortable' => FALSE, 'default_view'=>1),
					'breakfast'=>array('name'=>'Breakfast', 'data_type' => 'String', 'sortable' => FALSE, 'default_view'=>1),
					'lunch'=>array('name'=>'Lunch', 'data_type' => 'string', 'sortable' => FALSE, 'default_view'=>1),
					'snacks'=>array('name'=>'Snacks', 'data_type' => 'string', 'sortable' => FALSE, 'default_view'=>1),
					'printout'=>array('name'=>'Printout', 'data_type' => 'string', 'sortable' => FALSE, 'default_view'=>1),
					'laundry'=>array('name'=>'Laundry', 'data_type' => 'string', 'sortable' => FALSE, 'default_view'=>1),
					'logistics'=>array('name'=>'Logistics', 'data_type' => 'string', 'sortable' => FALSE, 'default_view'=>1),
					'discount'=>array('name'=>'Discount Amt', 'data_type' => 'string', 'sortable' => FALSE, 'default_view'=>1),
					'invoice_amount'=>array('name'=>'Invoice Amt', 'data_type' => 'string', 'sortable' => FALSE, 'default_view'=>1),
					'invoice_link'=>array('name'=>'Invoice', 'data_type' => 'link', 'sortable' => FALSE, 'default_view'=>1),
					'pdf_downloaded'=>array('name'=>'PDF Downloaded', 'data_type' => 'string', 'sortable' => FALSE, 'default_view'=>1),
					),
	"default_order"	=> "a.id",
	"default_direction" => "DESC"
);


$config['room_status'] = array(
	"view"		=> 	'listing/listing',
	"init_scripts" => 'listing/init_scripts',
	"advance_search_view" => 'room/filter',
	"base_url"	=> 	'/room/status/',
	"per_page"	=>	"20",
	"fields"	=> array(
						'room'=>array('name'=>'Room', 'data_type' => 'string', 'sortable' => FALSE, 'default_view'=>1),
						'occupancy'=>array('name'=>'Type', 'data_type' => 'String', 'sortable' => FALSE, 'default_view'=>1),
						'officer_name'=>array('name'=>'Officer Name', 'data_type' => 'String', 'sortable' => FALSE, 'default_view'=>1),
						'rank'=>array('name'=>'Rank', 'data_type' => 'String', 'sortable' => FALSE, 'default_view'=>1),
						'checkin_date'=>array('name'=>'Check In Date', 'data_type' => 'date', 'sortable' => FALSE, 'default_view'=>1),
						'e_checkout_date'=>array('name'=>'Expected Check Out', 'data_type'=> 'String', 'sortable' => FALSE, 'default_view'=>1),
						'checked_in'=>array('name'=>'Checked In', 'data_type' => 'String', 'sortable' => FALSE, 'default_view'=>1),),
	"default_order"	=> "a.checkin_date",
	"default_direction" => "desc"
);

$config['timesheet_index'] = array(
	"view"		=> 	'listing/listing',
	"init_scripts" => 'listing/init_scripts',
	"advance_search_view" => 'frontend/timesheet/filter',
	"base_url"	=> 	'/timesheet/index/',
	"per_page"	=>	"25",
	"fields"	=> array(   
						'emp_name'=>array('name'=>'Name', 'data_type' => 'String', 'sortable' => FALSE, 'default_view'=>1),					
						'emp_code'=>array('name'=>'Emp Code', 'data_type' => 'String', 'sortable' => FALSE, 'default_view'=>1),					
						'date'=>array('name'=>'Date', 'data_type' => 'date', 'sortable' => FALSE, 'default_view'=>1),
						'hour'=>array('name'=>'Hours', 'data_type' => 'String', 'sortable' => FALSE, 'default_view'=>1),
						'type'=>array('name'=>'Type', 'data_type' => 'timesheet_type', 'sortable' => FALSE, 'default_view'=>1),
						'project'=>array('name'=>'Project', 'data_type' => 'String', 'sortable' => FALSE, 'default_view'=>1)
						),
	"default_order"	=> "emp_name,date",
	"default_direction" => "ASC"
);


$config['reports_index'] = array(
	"view"		=> 	'listing/listing',
	"init_scripts" => 'listing/init_scripts',
	"advance_search_view" => 'frontend/reports/filter',
	"base_url"	=> 	'/reports/index/',
	"per_page"	=>	"20",
	"fields"	=> array(   
						'emp_name'=>array('name'=>'Name', 'data_type' => 'String', 'sortable' => FALSE, 'default_view'=>1),					
						'emp_code'=>array('name'=>'Emp Code', 'data_type' => 'String', 'sortable' => FALSE, 'default_view'=>1),					
						'designation'=>array('name'=>'Designation', 'data_type' => 'string', 'sortable' => FALSE, 'default_view'=>1),
						'organization'=>array('name'=>'Organization', 'data_type' => 'string', 'sortable' => FALSE, 'default_view'=>1),),
	"default_order"	=> "emp_name",
	"default_direction" => "ASC"
);


