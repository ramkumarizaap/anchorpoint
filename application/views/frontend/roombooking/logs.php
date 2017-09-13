<div class=" container-fluid inner-page"> 
<div class="row">
 <div class="page-title"><div class="container"><h1>Room Booking Logs</h1></div></div></div>
<div class="container marketing pad-top pad-bot booking-a-log"> 
 <?php display_flashmsg($this->session->flashdata()); ?>
<div class="row">
	<div class="col-md-10"></div>
	<div class="col-md-2">
		<a href="<?=base_url();?>booking/create" class="pull-right btn btn-primary">+ Book a Room</a>
	</div>
</div>
<?=$grid;?>
				