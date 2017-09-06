<!-- <div class="col-xs-12 table-sub-header text-right">
  <div class="row">
   <div class="div top-lisiting-search col-sm-12">
    <form method="post" id="simple_search_form">
      <div class="col-sm-3">
        <label class="control-label">Purchase Order No</label>
        <?php echo form_dropdown('search_type', $simple_search_fields, $search_conditions['search_type'], 'class="form-control"');?>
      </div>
      
      <div class="col-sm-4">
        <div class="input-group clearfix">
          <input type="text" class="form-control" name="search_text" value="<?php echo $search_conditions['search_text'];?>" placeholder="Search some stuff.">
          <span class="input-group-btn">
              <button class="btn" type="button" id="simple_search_button" data-placement="top" data-toggle="tooltip" data-original-title="search"><span class="fa fa-search"></span></button>
          </span>
          <a class="clear-text" href="javascript:void(0);" onclick="$.fn.clear_simple_search();" data-placement="top" data-toggle="tooltip" data-original-title="clear simple search">Clear Filter</a>
        </div>
      </div>
    </form>
     <div class="col-sm-3 text-left advanced-search">
      <button class="btn dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Advanced Search<span class="caret"></span>
  </button>
    <a class="clear-text" href="javascript:void(0);">Clear Filter</a>
    </div>
    <div class="col-sm-3 entry-text text-right">
       <span class="col-sm-6 show-entry">Show entries:</span>
       <span class="col-sm-6">
        <?php echo form_dropdown('per_page_options', $per_page_options, $per_page, 'class="form-control"');?>
        </span>
    </div>
  </div>
</div>
</div> -->
<form id="simple_search_form">
  <!-- /.row --> 
  <div class="row b-chech-in-out">
    <div class="col-sm-4">
      <label for="">Purchase Order NO </label><br />
      <input class="form-control" name="po_no" placeholder="" type="text">
    </div>
    <div class="col-sm-4">
      <div class="col-sm-6 pad-right-10">
        <label for="">Check Out Date(From)</label><br />
        <input class="form-control singledate" id="date" name="checkout_date_from" placeholder="" type="text"/>
        <span data-tooltip="" class="has-tip tip-top" data-selector="tooltipy34ixm" title="E.g., 08/30/2017">More information?</span>
      </div>
      <div class="col-sm-6">
        <label for="">Check Out Date(To)</label><br />
        <input class="form-control singledate" id="date" name="checkout_date_to" placeholder="" type="text"/>
        <span data-tooltip="" class="has-tip tip-top" data-selector="tooltipy34ixm" title="E.g., 08/30/2017">More information?</span>
      </div>
    </div>
    <div class="col-sm-4">              
      <label for="">Name of the Officer</label><br />
      <input class="form-control" name="officer_name" placeholder="" value="" type="text">
    </div>
  </div>
  <div class="row pdf-order">
    <div class="col-sm-4">
      <div class="col-sm-4  pad-right-10">              
        <label for="">PDF Link</label><br />
        <select class="form-control width_select" name="invoice_link">
          <option value=''>-Any-</option>
          <option value='enable'>Enable</option>
          <option value='disable'>Disable</option>
        </select>
      </div>
      <div class="col-sm-4 pad-right-10">              
        <label for="">Order Status</label><br />
        <select class="form-control width_select" name="status">
          <option value=''>-Any-</option>
          <option value='Open'>Open</option>
          <option value='Closed'>Closed</option>
        </select>
      </div>
      <div class="col-sm-4">              
        <label for="">PDF download</label><br />
        <select class="form-control width_select" name="pdf_downloaded">
          <option value=''>-Any-</option>
          <option value='Yes'>Yes</option>
          <option value='No'>No</option>
        </select>
      </div>
    </div>
    <div class="col-sm-4 invoice-item">
      <div class="col-sm-6 pad-right-10">
        <label for="">Invoice Number</label><br />
        <input class="search-destiny form-control" name="inv_no" placeholder="" type="text">
      </div>
      <div class="col-sm-6">
        <label for="">Items per page </label><br />
        <?php echo form_dropdown('per_page_options', $per_page_options, $per_page, 'class="form-control"');?>
      </div>
    </div>
    <div class="col-sm-4"> 
      <label for="">&nbsp;</label><br />             
      <button class="btn btn-primary" type="button" id="simple_search_button" data-placement="top" data-toggle="tooltip" data-original-title="search"><span class="fa fa-search"></span> Search</button>
    </div>
  </div>
</form>
<form method="post" action="" name="operationForm" class="operationForm">
  <fieldset style="border:1px solid #ccc;padding: 20px;">
    <legend style="width: auto;padding-left: 5px;padding-right: 5px;">Operations</legend>
    <div class="row">
      <div class="col-sm-4">
        <select class="form-control" name="order">
          <option value="">-Choose an operation-</option>
          <option value="1">Close Order</option>
          <option value="2">Generate Invoice Link</option>
          <option value="3">PDF Downloaded</option>
        </select>
      </div>
      <div class="col-sm-4">
        <button class="btn btn-primary" type="submit" data-placement="top" data-toggle="tooltip">Execute</button>
      </div>
    </div>
  </fieldset>
</form>
<br>