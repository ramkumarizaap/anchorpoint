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
	"per_page"	=>	"1",
	"fields"	=> array(   
					'inv_no'=>array('name'=>'Invoice No', 'data_type' => 'String', 'sortable' => FALSE, 'default_view'=>1,"width"=>"15"),
					'po_no'=>array('name'=>'Po No', 'data_type' => 'String', 'sortable' => FALSE, 'default_view'=>1,"width"=>"15"),
					'officer_name'=>array('name'=>'Officer Name', 'data_type' => 'String', 'sortable' => FALSE, 'default_view'=>1,"width"=>"15"),
					'rank'=>array('name'=>'Rank', 'data_type' => 'String', 'sortable' => FALSE, 'default_view'=>1,"width"=>"15"),
					'executive'=>array('name'=>'Booking Executive', 'data_type' => 'string', 'sortable' => FALSE, 'default_view'=>1,"width"=>"15"),
					'purpose'=>array('name'=>'Purpose Of Visit', 'data_type' => 'String', 'sortable' => FALSE, 'default_view'=>1,"width"=>"15"),
					'course_name'=>array('name'=>'Course Name', 'data_type' => 'String', 'sortable' => FALSE, 'default_view'=>1,"width"=>"15"),
					'vessel'=>array('name'=>'Assigned Vessel', 'data_type' => 'String', 'sortable' => FALSE, 'default_view'=>1,"width"=>"15"),
					'checkin_date'=>array('name'=>'Check In Date', 'data_type' => 'date', 'sortable' => FALSE, 'default_view'=>1,"width"=>"15"),
					'checked_in'=>array('name'=>'Checked In', 'data_type' => 'String', 'sortable' => FALSE, 'default_view'=>1,"width"=>"15"),
					'checkout_date'=>array('name'=>'Checkout Date', 'data_type' => 'date', 'sortable' => FALSE, 'default_view'=>1,"width"=>"15"),
					'occupancy'=>array('name'=>'Occupancy', 'data_type' => 'string', 'sortable' => FALSE, 'default_view'=>1,"width"=>"15"),
					'room'=>array('name'=>'Room', 'data_type' => 'string', 'sortable' => FALSE, 'default_view'=>1,"width"=>"15"),
					'lunch'=>array('name'=>'No.of Room Nights', 'data_type' => 'String', 'sortable' => FALSE, 'default_view'=>1,"width"=>"15"),
					'tariff'=>array('name'=>'Room Tariff', 'data_type' => 'String', 'sortable' => FALSE, 'default_view'=>1,"width"=>"15"),
					'breakfast'=>array('name'=>'Breakfast', 'data_type' => 'String', 'sortable' => FALSE, 'default_view'=>1,"width"=>"15"),
					'lunch'=>array('name'=>'Lunch', 'data_type' => 'string', 'sortable' => FALSE, 'default_view'=>1,"width"=>"15"),
					'snacks'=>array('name'=>'Snacks', 'data_type' => 'string', 'sortable' => FALSE, 'default_view'=>1,"width"=>"15"),
					'printout'=>array('name'=>'Printout', 'data_type' => 'string', 'sortable' => FALSE, 'default_view'=>1,"width"=>"15"),
					'laundry'=>array('name'=>'Laundry', 'data_type' => 'string', 'sortable' => FALSE, 'default_view'=>1,"width"=>"15"),
					'logistics'=>array('name'=>'Logistics', 'data_type' => 'string', 'sortable' => FALSE, 'default_view'=>1,"width"=>"15"),
					'discount'=>array('name'=>'Discount Amt', 'data_type' => 'string', 'sortable' => FALSE, 'default_view'=>1,"width"=>"15"),
					'invoice_amount'=>array('name'=>'Invoice Amt', 'data_type' => 'string', 'sortable' => FALSE, 'default_view'=>1,"width"=>"15"),
					'invoice_link'=>array('name'=>'Invoice', 'data_type' => 'link', 'sortable' => FALSE, 'default_view'=>1,"width"=>"15"),
					'pdf_downloaded'=>array('name'=>'PDF Downloaded', 'data_type' => 'string', 'sortable' => FALSE, 'default_view'=>1,"width"=>"15"),
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
						'room'=>array('name'=>'Room', 'data_type' => 'string', 'sortable' => FALSE, 'default_view'=>1,"width"=>"15"),
						'occupancy'=>array('name'=>'Type', 'data_type' => 'String', 'sortable' => FALSE, 'default_view'=>1,"width"=>"15"),
						'officer_name'=>array('name'=>'Officer Name', 'data_type' => 'String', 'sortable' => FALSE, 'default_view'=>1,"width"=>"15"),
						'rank'=>array('name'=>'Rank', 'data_type' => 'String', 'sortable' => FALSE, 'default_view'=>1,"width"=>"15"),
						'checkin_date'=>array('name'=>'Check In Date', 'data_type' => 'date', 'sortable' => FALSE, 'default_view'=>1,"width"=>"15"),
						'e_checkout_date'=>array('name'=>'Expected Check Out', 'data_type'=> 'String', 'sortable' => FALSE, 'default_view'=>1,"width"=>"15"),
						'checked_in'=>array('name'=>'Checked In', 'data_type' => 'String', 'sortable' => FALSE, 'default_view'=>1,"width"=>"15"),),
	"default_order"	=> "a.checkin_date",
	"default_direction" => "desc"
);




$config['taxi_logs'] = array(
	"view"		=> 	'listing/listing',
	"init_scripts" => 'listing/init_scripts',
	"advance_search_view" => 'taxi/filter',
	"base_url"	=> 	'/taxi/logs/',
	"per_page"	=>	"1",
	"fields"	=> array(   
					'inv_no'=>array('name'=>'Invoice No', 'data_type' => 'String', 'sortable' => FALSE, 'default_view'=>1,"width"=>"15"),
					'driver_name'=>array('name'=>'Driver Name', 'data_type' => 'String', 'sortable' => FALSE, 'default_view'=>1,"width"=>"15"),
					'officer_name'=>array('name'=>'Officer Name', 'data_type' => 'String', 'sortable' => FALSE, 'default_view'=>1,"width"=>"15"),
					'rank'=>array('name'=>'Rank', 'data_type' => 'String', 'sortable' => FALSE, 'default_view'=>1,"width"=>"15"),
					'vessel'=>array('name'=>'Assigned Vessel', 'data_type' => 'String', 'sortable' => FALSE, 'default_view'=>1,"width"=>"15"),
					'date'=>array('name'=>'Date', 'data_type' => 'date', 'sortable' => FALSE, 'default_view'=>1,"width"=>"15"),
					'from'=>array('name'=>'From', 'data_type' => 'String', 'sortable' => FALSE, 'default_view'=>1,"width"=>"15"),
					'to'=>array('name'=>'To', 'data_type' => 'String', 'sortable' => FALSE, 'default_view'=>1,"width"=>"15"),
					'trip_sheet'=>array('name'=>'Trip Sheet', 'data_type' => 'String', 'sortable' => FALSE, 'default_view'=>1,"width"=>"15"),
					'kms'=>array('name'=>'No of KM', 'data_type' => 'String', 'sortable' => FALSE, 'default_view'=>1,"width"=>"15"),
					'waiting'=>array('name'=>'Waiting Charge', 'data_type' => 'String', 'sortable' => FALSE, 'default_view'=>1,"width"=>"15"),
					'amount'=>array('name'=>'Amount', 'data_type' => 'String', 'sortable' => FALSE, 'default_view'=>1,"width"=>"15"),
					'cgst'=>array('name'=>'CGST 2.5%', 'data_type' => 'String', 'sortable' => FALSE, 'default_view'=>1,"width"=>"15"),
					'sgst'=>array('name'=>'SGST 2.5%', 'data_type' => 'String', 'sortable' => FALSE, 'default_view'=>1,"width"=>"15"),
					'toll'=>array('name'=>'Toll', 'data_type' => 'String', 'sortable' => FALSE, 'default_view'=>1,"width"=>"15"),
					'parking'=>array('name'=>'Parking', 'data_type' => 'String', 'sortable' => FALSE, 'default_view'=>1,"width"=>"15"),
					'invoice_sent'=>array('name'=>'Invoice Sent', 'data_type' => 'String', 'sortable' => FALSE, 'default_view'=>1,"width"=>"15"),
					'cash_received'=>array('name'=>'Cash Received', 'data_type' => 'String', 'sortable' => FALSE, 'default_view'=>1,"width"=>"15"),
					'total'=>array('name'=>'Total', 'data_type' => 'String', 'sortable' => FALSE, 'default_view'=>1,"width"=>"15"),
					'grand_total'=>array('name'=>'Grand Total', 'data_type' => 'String', 'sortable' => FALSE, 'default_view'=>1,"width"=>"15"),),
	"default_order"	=> "a.id",
	"default_direction" => "DESC"
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


