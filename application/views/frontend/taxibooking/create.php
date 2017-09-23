<div class=" container-fluid inner-page"> 
 	<div class="row">
 		<div class="page-title">
 			<div class="container">
 				<h1>Book a Taxi</h1>
 			</div>
 		</div>
	</div>
	<div class="container marketing pad-top pad-bot booking-a-room">
  	<form method="post" class="bookingForm" action="" enctype="multipart/form-data">
  		<div class="row">  			
  			<div class="col-sm-4 <?=(form_error('officer_name'))?'has-error':'';?>">
    			<label for="" class="control-label">Name of the Officer </label><br />
          <input class="form-control" placeholder="" type="text" name="officer_name" value="<?=set_value('officer_name',$editdata['officer_name']);?>">
          <span class="error"><?=form_error('officer_name')?></span>
  			</div>
  			<div class="col-sm-4 <?=(form_error('driver_name'))?'has-error':'';?>">
    			<label for="" class="control-label">Driver Name </label><br />
          <input class="form-control" placeholder="" name="driver_name" type="text" value="<?=set_value('driver_name',$editdata['driver_name']);?>">
          <span class="error"><?=form_error('driver_name')?></span>
  			</div>
   			<div class="col-sm-4 <?=(form_error('rank'))?'has-error':'';?>">
        	<label for="" class="control-label">Rank</label><br />
         	<?php echo form_dropdown('rank', array('' => '-None-')+get_ranks(), set_value('rank', $editdata['rank']), 'class="form-control width_select select2"');?>
          <span class="error"><?=form_error('rank')?></span>
        </div>
		  </div>
		  <div class="row">
		  	<div class="col-sm-4 <?=(form_error('vessel'))?'has-error':'';?>">              
		      <label for="" class="control-label">Assigned Vessel </label><br />
		      <?php echo form_dropdown('vessel', array('' => '-None-')+get_vessels(), set_value('vessel', $editdata['vessel']), 'class="form-control width_select select2"');?>
					<span class="error"><?=form_error('vessel')?></span>
		    </div>
		    <div class="col-sm-4 <?=(form_error('from'))?'has-error':'';?>">
          <label for="" class="control-label">Date </label><br />
          <input class="form-control singledate" id="date" name="date" placeholder="" type="text" value="<?=set_value('date',$editdata['date']);?>" />
          <span class="error"><?=form_error('date')?></span>
  			</div>
    		<div class="col-sm-4 <?=(form_error('from'))?'has-error':'';?>">
          <label for="" class="control-label">From </label><br />
          <?php echo form_dropdown('from', array('' => '-None-')+get_locations(), set_value('from', $editdata['from_loc']), 'class="form-control width_select from_select"');?>
          <span class="error"><?=form_error('from')?></span>
  			</div>
 			</div>
  		<div class="row">
  			<div class="col-sm-4 <?=(form_error('to'))?'has-error':'';?>">
        	<label for="" class="control-label">To</label><br />
          <?php echo form_dropdown('to', array('' => '-None-')+get_locations(), set_value('to', $editdata['to_loc']), 'class="form-control width_select to_select"');?>
          <span class="error"><?=form_error('to')?></span>
    		</div>
        <div class="col-sm-4">
          <label for="" class="control-label">Cost Centre</label><br />
          <?php echo form_dropdown('cost_centre', array('' => '-None-','1' => '1',"2"=>"2"), set_value('cost_centre', $editdata['cost_centre']), 'class="form-control width_select"');?>
          <span class="error"><?=form_error('cost_centre')?></span>
        </div>
    		<div class="col-sm-4 <?=(form_error('trip_sheet'))?'has-error':'';?>">
          <label for="" class="control-label">Trip Sheet No </label><br />
          <input class="form-control" id="date" name="trip_sheet" placeholder="" type="text" value="<?=set_value('trip_sheet',$editdata['trip_sheet']);?>" />
          <span class="error"><?=form_error('trip_sheet')?></span>
  			</div>
 			</div>
 			<div class="row">
        <div class="col-sm-4">
          <label for="" class="control-label">Waiting Charge</label><br />
          <?php echo form_dropdown('waiting', array('' => '-None-','30' => '30 mins',"60"=>"1 hr","90"=>"1.30 hr","120"=>"2 hr","150"=>"2.30 hr"), set_value('waiting', $editdata['waiting']), 'class="form-control width_select waiting_charge"');?>
          <span class="error"><?=form_error('waiting')?></span>
        </div>
    		<div class="col-sm-4 <?=(form_error('kms'))?'has-error':'';?>">
        	<label for="" class="control-label">No.of KM</label><br />
          <input class="form-control taxi_kms" id="date" name="kms" placeholder="" type="text" value="<?=set_value('kms',$editdata['kms']);?>" />
          <span class="error"><?=form_error('kms')?></span>
        </div>
        <div class="col-sm-4 <?=(form_error('day_type'))?'has-error':'';?>"">
         	<label for="" class="control-label">Day/Night</label><br />
          <?php echo form_dropdown('day_type', array('' => '-None-','Day' => 'Day',"Night"=>"Night"), set_value('day_type', $editdata['day_type']), 'class="form-control width_select day_select"');?>
          <span class="error"><?=form_error('day_type')?></span>
        </div>
   		</div>
   		<div class="row">
        <div class="col-sm-4 <?=(form_error('charge'))?'has-error':'';?>">
          <label for="" class="control-label">Charge</label><br />
          <input class="form-control taxi_charge" readonly type="text" name="charge" value="<?=set_value('charge',$editdata['charge']);?>">
          <span class="error"><?=form_error('charge')?></span>
        </div>
        <div class="col-sm-4">
          <label for="" class="control-label">Toll</label><br />
          <input class="form-control" id="date" name="toll" placeholder="" type="text" value="<?=set_value('toll',$editdata['toll']);?>" />
        </div>
        <div class="col-sm-4">
         	<label for="" class="control-label">Parking</label><br />
          <input class="form-control" id="time" type="text" name="parking" value="<?=set_value('parking',$editdata['parking']);?>">
        </div>
   		</div>
      <Div class="row">
        <div class="col-sm-4 <?=(form_error('cash_received'))?'has-error':'';?>">
          <label for="" class="control-label">Cash Received * </label><br />
          <label class="radio-inline">
            <input type="radio" name="cash_received" value="Yes" <?=(isset($editdata['cash_received']) && $editdata['cash_received']=="Yes")?"checked":'';?>>Yes
          </label>
          <label class="radio-inline">
            <input type="radio" name="cash_received" value="No" <?=(isset($editdata['cash_received']) && $editdata['cash_received']=="No")?"checked":'';?>>No
          </label>
          <span class="error"><?=form_error('cash_received')?></span>
        </div>
      </div>
		  <div class="row">
		  	<div class="col-sm-4"></div>
		    <div class="col-sm-4">
		      <button type="submit" class="btn btn-block btn-primary">Save</button>
		    </div>
 			</div>
 		</form>
 	</div>
</div>
<!-- FOOTER -->