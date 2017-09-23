<div class=" container-fluid inner-page"> 
<div class="row">
 <div class="page-title"><div class="container"><h1>Taxi Booking Logs</h1></div></div></div>
<div class="container marketing pad-top pad-bot booking-a-log"> 
 <?php display_flashmsg($this->session->flashdata()); ?>
 <div class="row pad-bot">
	<div class="col-md-6"></div>
	<div class="col-md-6 pull-right">
		<a href="<?=base_url();?>taxi/create" class="pull-right btn btn-primary margin-left-20">+ Book a Taxi</a>
		<a href="#" class="pull-right btn btn-primary margin-left-20" data-remodal-target="modal2">+ Settings</a>
		 <a href="#" class="pull-right btn btn-primary margin-left-20" data-remodal-target="modal">+ Location</a>
	</div>
</div>
	<?=$grid;?>

<div class="remodal" data-remodal-id="modal">
  <a data-remodal-action="close" class="remodal-close"></a>
  <form method="post" id="LocationForm" action="">
  	<h2>Add Location</h2>
		<div class="row">  			
			<div class="col-sm-12">
  			<label for="" class="col-md-2 pull-left control-label">Location </label>
  			<div class="col-md-10 pull-left">
        	<input class="form-control" placeholder="" type="text" name="location" value="">
        	<div class="msg"></div>
        </div>
			</div>
		</div>
  	<br>
  	<a data-remodal-action="cancel" class="btn btn-primary pull-right" href="#">Cancel</a>
  	<button type="submit" class="btn btn-success pull-right margin-right-20">Save</button>
  </form>
</div>

<div class="remodal" data-remodal-id="modal2">
  <a data-remodal-action="close" class="remodal-close"></a>
  <form method="post" id="ChargeForm" action="">
  	<h2>Add Charge</h2>
		<div class="row">
			<div class="col-sm-12">
  			<label for="" class="col-md-3 pull-left control-label">Day Charge </label>
  			<div class="col-md-8 pull-left">
        	<input class="form-control" placeholder="" type="text" name="day_charge" value="<?=$charge['day_charge'];?>">
        	<div class="msg"></div>
        </div>
        <div class="col-md-1 pull-left">
        	(/kms)
        </div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12">
  			<label for="" class="col-md-3 pull-left control-label">Night Charge </label>
  			<div class="col-md-8 pull-left">
        	<input class="form-control" placeholder="" type="text" name="night_charge" value="<?=$charge['night_charge'];?>">
        	<div class="msg "></div>
        </div>
        <div class="col-md-1 pull-left">
        	(/kms)
        </div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12">
  			<label for="" class="col-md-3 pull-left control-label">Waiting Charge </label>
  			<div class="col-md-8 pull-left">
        	<input class="form-control" placeholder="" type="text" name="waiting_charge" value="<?=$charge['waiting_charge'];?>">
        	<div class="msg last-msg"></div>
        </div>
        <div class="col-md-1 pull-left">
        	(/hr)
        </div>
			</div>
		</div>
  	<br>
  	<a data-remodal-action="cancel" class="btn btn-primary pull-right" href="#">Cancel</a>
  	<button type="submit" class="btn btn-success pull-right margin-right-20">Save</button>
  </form>
 </div>