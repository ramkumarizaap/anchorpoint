<?php
  $date1 = date("Y-m-d H:i:s",strtotime($invoice['checkin_date']." ".$invoice['checkin_time']));
  $date2 = date("Y-m-d H:i:s",strtotime($invoice['checkout_date']." ".$invoice['checkout_time']));
  $days = ceil(abs(strtotime($date2) - strtotime($date1)) / 86400);
  $total = $days * $invoice['tariff'];
?>

            <table width="100%" border="1" cellspacing="0" cellpadding="0" class="billing-cztm-t1 invoicetable" >
              <tr style="background: #fff;border: 1px solid black;border-bottom: none; ">
                <td style="padding: 5px;" colspan="6" align="center" valign="middle">
                  <h6 style="font-size:1.40rem;padding-top: 12px;">ANCHORPOINT HOSPITALITY PRIVATE LIMITED</h6>
                </td>
              </tr>
              <tr align="center" style="background: rgb(227, 224, 255);border: 1px solid #000;border-top: none;border-bottom: none;">
                <td style="padding: 5px;font-size: 12px;" colspan="6" align="center" valign="middle">3A,3B & 3C Aiswarya Prapancha Apartments, Madha Koil Street, Thoraipakkam,Chennai.</td>
              </tr>
              <tr align="center" style="border: 1px solid #000;border-top: none;border-bottom: none;">
                <td style="padding: 5px;font-size: 12px;" colspan="6" align="center" valign="middle">
                  <strong>CIN - U55101KA2014PTC076899</strong>
                </td>
              </tr>
              <tr align="center" style="background: rgb(227, 224, 255);">
                <td style="padding: 5px;font-size: 12px;" colspan="6" align="center" valign="middle"> <strong>INVOICE</strong></td>
              </tr>
              <tr style="">
                <td style="padding: 5px;" colspan="2" align="center" valign="middle"><strong>Invoice Details</strong></td>
                <td style="padding: 5px;" colspan="2" align="center" valign="middle"><strong>Details of Receiver / Billed to</strong> </td>
                <td style="padding: 5px;" colspan="2" align="center" valign="middle"><strong>Details</strong></td>
              </tr>
              <tr align="left" style="padding: 0 !important;border-top: 1px solid #000;border-bottom: none;">
                <td style="font-size: 10px;;padding: 5px;border-right: none;border-bottom: none;" width="15%" align="left" valign="middle">Invoice Date </td>
                <td style="font-size: 10px;padding: 5px;border-left: none;border-right:1px solid #000;border-bottom: none; " width="17%" align="left" valign="middle">31 July 2017 </td>
                <td style="font-size: 10px;padding: 5px;border-right: none;border-bottom: none;" width="12%" align="left" valign="middle">GSTIN </td>
                <td style="font-size: 10px;padding: 5px;border-left: none;border-right:1px solid #000;border-bottom: none;" width="25%" align="left" valign="middle">33AAUCS6460K1ZQ</td>
                <td style="font-size: 10px;padding: 5px;border-right: none;border-bottom: none;" width="11%" align="left" valign="middle">Guest name</td>
                <td style="font-size: 10px;padding: 5px;border-left: none;border-bottom: none;" width="20%" align="left" valign="middle">Sandeep Kumar Chowdhary</td>
              </tr>
              <tr style="border-top: none;border-bottom: none;">
                <td style="font-size: 10px;border-right:none;border-top: none;border-bottom:none;padding: 5px;" align="left" valign="middle">Invoice No</td>
                <td style="font-size: 10px;border-left: none;border-top: none;border-bottom:none;padding: 5px;" align="left" valign="middle">APH-1718-INV-517</td>
                <td style="font-size: 10px;border-top: none;border-right:none;border-bottom:none;padding: 5px;" align="left" valign="middle">Billed to </td>
                <td style="font-size: 10px;border-top: none;border-left:none;border-bottom:none;padding: 5px;" align="left" valign="middle">Synergy Maritime Recruitment</td>
                <td style="font-size: 10px;border-top: none;border-right:none;border-bottom:none;padding: 5px;" align="left" valign="middle">Rank</td>
                <td style="font-size: 10px;border-top: none;border-left:none;border-bottom:none;padding: 5px;" align="left" valign="middle">C/O</td>
              </tr>
              <tr style="border-top: none;border-bottom: none;">
                <td style="font-size: 10px;border-right:none;border-top: none;border-bottom:none;padding: 5px;" align="left" valign="middle">State of Supply & State code</td>
                <td style="font-size: 10px;padding: 5px;border-bottom:none;border-top: none;border-left: none;" align="left" valign="middle">Tamil Nadu & 33</td>
                <td style="font-size: 10px;padding: 5px;border-bottom:none;border-top: none;border-right: none;" align="left" valign="middle">&nbsp;</td>
                <td style="font-size: 10px;padding: 5px;border-bottom:none;border-left: none;border-top: none;" align="left" valign="middle">Services Private Limited,  3/381 Rajiv Gandhi Salai,  Mettukuppam; Chennai,  600097, Chennai Tamil Nadu </td>
                <td style="font-size: 10px;padding: 5px;border-bottom:none;border-top: none;border-right: none;" align="left" valign="middle">Type of Room</td>
                <td style="font-size: 10px;padding: 5px;border-bottom:none;border-top: none;border-left: none;" align="left" valign="middle">Single</td>
              </tr>
              <tr style="border-top: none;border-bottom: none;">
                <td style="font-size: 10px;padding:5px;border-top: none;border-bottom: none;border-right: none;" align="left" valign="middle">GSTIN </td>
                <td style="font-size: 10px;padding:5px;border-top: none;border-bottom: none;border-left: none;" align="left" valign="middle">33AAMCA9719R1ZU</td>
                <td style="font-size: 10px;padding:5px;border-top: none;border-bottom: none;border-right: none;" align="left" valign="middle">&nbsp;</td>
                <td style="font-size: 10px;padding:5px;border-top: none;border-bottom: none;border-left: none;" align="left" valign="middle">&nbsp;</td>
                <td style="font-size: 10px;padding:5px;border-top: none;border-bottom: none;border-right: none;" align="left" valign="middle">Booked by</td>
                <td style="font-size: 10px;padding:5px;border-top: none;border-bottom: none;border-left: none;" align="left" valign="middle">Chandra Sekar D</td>
              </tr>
              <tr style="border-top: none;border-bottom: none;">
                <td style="font-size: 10px;padding:5px;border-top: none;border-bottom: none;border-right: none;" align="left" valign="middle">&nbsp;</td>
                <td style="font-size: 10px;padding:5px;border-top: none;border-bottom: none;border-left: none;" align="left" valign="middle">&nbsp;</td>
                <td style="font-size: 10px;padding:5px;border-top: none;border-bottom: none;border-right: none;" align="left" valign="middle">&nbsp;</td>
                <td style="font-size: 10px;padding:5px;border-top: none;border-bottom: none;border-left: none;" align="left" valign="middle">&nbsp;</td>
                <td style="font-size: 10px;padding:5px;border-top: none;border-bottom: none;border-right: none;" align="left" valign="middle">Vessel Name</td>
                <td style="font-size: 10px;padding:5px;border-top: none;border-bottom: none;border-left: none;" align="left" valign="middle">TBD</td>
              </tr>
              <tr style="border-top: none;border-bottom: none;">
                <td style="font-size: 10px;padding:5px;border-top: none;border-bottom: none;border-right: none;" align="left" valign="middle">&nbsp;</td>
                <td style="font-size: 10px;padding:5px;border-top: none;border-bottom: none;border-left: none;" align="left" valign="middle">&nbsp;</td>
                <td style="font-size: 10px;padding:5px;border-top: none;border-bottom: none;border-right: none;" align="left" valign="middle">&nbsp;</td>
                <td style="font-size: 10px;padding:5px;border-top: none;border-bottom: none;border-left: none;" align="left" valign="middle">&nbsp;</td>
                <td style="font-size: 10px;padding:5px;border-top: none;border-bottom: none;border-right: none;" align="left" valign="middle">PO No</td>
                <td style="font-size: 10px;padding:5px;border-top: none;border-bottom: none;border-left: none;" align="left" valign="middle">PO/04232/17/19411 </td>
              </tr>
              <tr style="border-top: none;border-bottom: none;">
                <td style="font-size: 10px;padding:5px;border-top: none;border-bottom: none;border-right: none;" align="left" valign="middle">&nbsp;</td>
                <td style="font-size: 10px;padding:5px;border-top: none;border-bottom: none;border-left: none;" align="left" valign="middle">&nbsp;</td>
                <td style="font-size: 10px;padding:5px;border-top: none;border-bottom: none;border-right: none;" align="left" valign="middle">&nbsp;</td>
                <td style="font-size: 10px;padding:5px;border-top: none;border-bottom: none;border-left: none;" align="left" valign="middle">&nbsp;</td>
                <td style="font-size: 10px;padding:5px;border-top: none;border-bottom: none;border-right: none;" align="left" valign="middle">Check in Date/Time</td>
                <td style="font-size: 10px;padding:5px;border-top: none;border-bottom: none;border-left: none;" align="left" valign="middle">2017-06-26 21:45:00 </td>
              </tr>
              <tr style="border-top: none;border-bottom: none;">
                <td style="font-size: 10px;padding:5px;border-top: none;border-right: none;" align="left" valign="middle">&nbsp;</td>
                <td style="font-size: 10px;padding:5px;border-top: none;border-left: none;" align="left" valign="middle">&nbsp;</td>
                <td style="font-size: 10px;padding:5px;border-top: none;border-right: none;" align="left" valign="middle">&nbsp;</td>
                <td style="font-size: 10px;padding:5px;border-top: none;border-left: none;" align="left" valign="middle">&nbsp;</td>
                <td style="font-size: 10px;padding:5px;border-top: none;border-right: none;" align="left" valign="middle">Check out Date/Time</td>
                <td style="font-size: 10px;padding:5px;border-top: none;border-left: none;" align="left" valign="middle">2017-07-05 04:00:00 </td>
              </tr>
            </table>
          </div>
          <h2 class="text-center" >Billing Details</h2>
          <div class="billing-details1-orflw">
            <table width="100%" border="1" cellspacing="0" cellpadding="0" class="billing-cztm-t2 invoicetable">
                <tr align="center">
                  <td width="6%" align="center" valign="middle"><strong>Sr.  No.</strong></td>
                  <td width="10%" valign="middle"><strong>Service</strong></td>
                  <td width="5%" valign="middle"><strong>SAC </strong></td>
                  <td width="3%" valign="middle"><strong>UOM</strong></td>
                  <td width="6%" valign="middle"><strong>Rate </strong></td>
                  <td width="8%" valign="middle"><strong>Rs.</strong></td>
                  <td width="4%" valign="middle"><strong>Discount%</strong></td>
                  <td width="9%" valign="middle"><strong>Taxable  value </strong></td>
                  <td colspan="2" valign="middle"><strong>CGST</strong></td>
                  <td colspan="2" valign="middle"><strong>SGST</strong></td>
                  <td colspan="2" valign="middle"><strong>IGST</strong></td>
                  <td width="12%" valign="middle"><strong>Total</strong></td>
                </tr>
                <tr style="background: rgb(227, 224, 255);">
                  <td align="center" valign="middle">1</td>
                  <td valign="middle"><strong>Room Rent</strong></td>
                  <td valign="middle">&nbsp;</td>
                  <td align="center" valign="middle">&nbsp;</td>
                  <td align="right" valign="middle">&nbsp;</td>
                  <td align="right" valign="middle">&nbsp;</td>
                  <td align="right" valign="middle">&nbsp;</td>
                  <td align="right" valign="middle">&nbsp;</td>
                  <td width="6%" valign="middle"><strong>Rate(%) </strong></td>
                  <td width="6%" valign="middle"><strong>Rs.</strong></td>
                  <td width="5%" valign="middle"><strong>Rate(%) </strong></td>
                  <td width="5%" valign="middle"><strong>Rs.</strong></td>
                  <td width="6%" valign="middle"><strong>Rate(%) </strong></td>
                  <td width="9%" valign="middle"><strong>Rs.</strong></td>
                  <td valign="middle"><strong>Rs.</strong></td>
                </tr>
                <tr>
                  <td align="center" valign="middle">&nbsp;</td>
                  <td align="center" valign="middle">Room Charges </td>
                  <td valign="middle">00441070</td>
                  <td align="center" valign="middle">95</td>
                  <td align="right" valign="middle"><?=displayData($invoice['tariff'],"money");?></td>
                  <td align="right" valign="middle"><?=displayData($total,"money");?></td>
                  <td align="right" valign="middle"><?=$dis=displayData($invoice['discount'],"money");?></td>
                  <td align="right" valign="middle">
                    <?php
                      $tt = ($total / 100 ) * $dis;
                      $t_value = $total - $tt;
                      echo displayData($t_value,"money");
                    ?>
                  </td>
                  <td align="right" valign="middle">6% </td>
                  <td align="right" valign="middle">
                    <?php
                      $cgst=($t_value / 100 ) * 6;
                      echo displayData($cgst,"money");
                    ?>
                  </td>
                  <td align="right" valign="middle">6%</td>
                  <td align="right" valign="middle">
                    <?php
                      $sgst=($t_value / 100 ) * 6;
                      echo displayData($sgst,"money");
                    ?>
                  </td>
                  <td align="right" valign="middle">-</td>
                  <td align="right" valign="middle">-</td>
                  <td align="right" valign="middle">
                    <?php
                      $r_total = $t_value + $cgst + $sgst;
                      echo displayData(ceil($r_total),"money");
                    ?>
                  </td>
                </tr>
                <tr style="background: rgb(227, 224, 255);">
                  <td align="center" valign="middle">&nbsp;</td>
                  <td valign="middle"><strong>TOTAL </strong></td>
                  <td valign="middle">&nbsp;</td>
                  <td align="center" valign="middle">&nbsp;</td>
                  <td align="right" valign="middle">&nbsp;</td>
                  <td align="right" valign="middle">
                    <strong>
                      <?php echo displayData($total,"money");?>
                    </strong>
                  </td>
                  <td align="right" valign="middle">&nbsp;</td>
                  <td align="right" valign="middle">
                    <strong>
                      <?php
                        $tt = ($total / 100 ) * $dis;
                        $t_value = $total - $tt;
                        echo displayData($t_value,"money");
                      ?>
                    </strong>
                  </td>
                  <td align="right" valign="middle">&nbsp;</td>
                  <td align="right" valign="middle">
                    <strong>
                       <?php
                          $cgst=($t_value / 100 ) * 6;
                          echo displayData($cgst,"money");
                        ?>
                    </strong>
                  </td>
                  <td align="right" valign="middle">&nbsp;</td>
                  <td align="right" valign="middle">
                    <strong>
                       <?php
                          $sgst=($t_value / 100 ) * 6;
                          echo displayData($sgst,"money");
                        ?>
                    </strong>
                  </td>
                  <td align="right" valign="middle">&nbsp;</td>
                  <td align="right" valign="middle">&nbsp;</td>
                  <td align="right" valign="middle">
                    <strong>
                      <?php
                        $r_total = $t_value + $cgst + $sgst;
                        echo displayData(ceil($r_total),"money");
                      ?>
                    </strong>
                  </td>
                </tr>
                <tr>
                  <td colspan="9" valign="bottom" style="padding: 5px;">
                    <p>Amount in Words(Rs.) <strong><?=displayData(ceil($r_total),"word_money");?></strong> </p>
                  </td>
                  <td colspan="6" rowspan="2" valign="middle"><table width="200" border="1" align="right" cellpadding="0" cellspacing="0">
                    <tr>
                      <td width="109" align="left">Taxable Value</td>
                      <td width="85" align="right"><strong><?=displayData($t_value,"money");?></strong></td>
                    </tr>
                    <tr>
                      <td align="left">CGST</td>
                      <td align="right"><strong><?=displayData($cgst,"money");?></strong></td>
                    </tr>
                    <tr>
                      <td align="left">SGST</td>
                      <td align="right"><strong><?=displayData($sgst,"money");?></strong></td>
                    </tr>
                    <tr>
                      <td align="left">IGST</td>
                      <td align="right">-</td>
                    </tr>
                    <tr>
                      <td align="left">Total</td>
                      <td align="right"><strong><?=displayData(ceil($r_total),"money");?></strong></td>
                    </tr>
                    <tr>
                      <td align="left" nowrap>Reverse Charge</td>
                      <td align="right"><strong>No</strong></td>
                    </tr>
                  </table></td>
                </tr>
                <tr>
                  <td height="106" colspan="9"><strong>BENEFICIARY BANK DETAILS:</strong> ANCHORPOINT HOSPITALITY SERVICES PRIVATE LIMITED.   Axis Bank, Thoraipakkam Branch, Plot No. 172 - 173, Chandrasekaran Avenue, Old  Mahaballipurm Road, Okkiyam Thuraipakkam, Chennai, Tamil Nadu, Pin 600097. Bank A.c  No: 914020052063794 IFSC CODE: UTIB0 001566 SWIFT CODE: AXISBBA75</td>
                </tr>
            </table>
          </div>
      
<!--<div class=" container-fluid inner-page">
  <div class="container marketing pad-top pad-bot room-status invoice-page">
    <div class="inner-page"> 
      <!-- Three columns of text below the carousel -
      <div class="row">
        <div class="col-lg-12">
          <table width="100%" border="1" cellspacing="0" cellpadding="0" class="billing-cztm-t1 invoicetable" >
            <tr>
              <td colspan="6" align="center"><h2>ANCHORPOINT HOSPITALITY PRIVATE LIMITED</h2></td>
            </tr>
            <tr align="center">
              <td colspan="6"><h4>3A,3B & 3C Aiswarya Prapancha Apartments, Madha Koil Street, Thoraipakkam,Chennai.</h4></td>
            </tr>
            <tr align="center">
              <td colspan="6"><h5>CIN - U55101KA2014PTC076899 </h5></td>
            </tr>
            <tr align="center">
              <td colspan="6"> <h5>INVOICE</h5></td>
            </tr>
            <!-- <tr>
              <td align="left">Invoice Date  Invoice No  State of Supply & State code  GSTIN</td>
              <td><?=date("d M Y",strtotime($invoice['invoice_date']));?>  <?=$invoice['inv_no'];?>  Tamil Nadu & 33  33AAMCA9719R1ZU </td>
              <td>GSTIN  Billed to</td>
              <td>33AAUCS6460K1ZQ  <?=$invoice['address'];?></td>
              <td>Guest name  Rank  Type of Room  Booked by  Vessel Name  PO No  Check in Date/Time  Check out Date/Time</td>
              <td><?=$invoice['officer_name'];?>  <?=$invoice['rank'];?>  <?=$invoice['occupancy'];?>  <?=$invoice['executives'];?> <?=$invoice['vessel'];?>  <?=$invoice['po_no'];?>  <?=$invoice['checkin_date']." ".$invoice['checkin_time'];?>  <?=$invoice['checkout_date']." ".$invoice['checkout_time'];?></td>
            </tr> -
          </table>
          <div style="border: 1px solid black;display: table;width: 100%;">
            <div style="display: table;width: 33%;float: left;">
              <table class="inv_table">
              <tbody>
                <tr><td colspan="2" align="center"><b>Invoice Details</b></td></tr>
                <tr>
                  <td>Invoice Date</td><td><?=date("d M Y",strtotime($invoice['invoice_date']));?></td>
                </tr>
                <tr>
                  <td>Invoice No</td><td><?=$invoice['inv_no'];?></td>
                </tr>
                <tr>
                  <td>State of Supply & State Code</td>
                  <td>Tamilnadu & 33</td>
                </tr>
                <tr>
                  <td>GSTIN</td><td>33AAMCA9719R1ZU</td>
                </tr>
              </tbody>
              </table>
            </div>
            <div style="display: table;width: 33%;float: left;">
              <table class="inv_table">
                <tbody>
                  <tr>
                    <td colspan="2" align="center"><b>Details of Receiver/Billed To</b></td>
                  </tr>
                  <tr>
                    <td>GSTIN</td><td>33AAUCS6460K1ZQ</td>
                  </tr>
                  <tr>
                    <td>Billed To</td><td width="150"><?=$invoice['address'];?></td>
                  </tr>
                  
                </tbody>
              </table>
            </div>
            <div style="display: table;width: 34.1%;float: left;">
              <table class="inv_table">
                <tbody>
                  <tr><td colspan="2" align="center"><b>Details</b></td></tr>
                  <tr>
                    <td>Guset Name</td><td><?=$invoice['officer_name'];?></td>
                  </tr>
                  <tr>
                    <td>Rank</td><td><?=$invoice['rank'];?></td>
                  </tr>
                  <tr>
                    <td>Type of Room</td><td><?=$invoice['room'];?></td>
                  </tr>
                  <tr>
                    <td>Booked By</td><td><?=$invoice['executives'];?></td>
                  </tr>
                  <tr>
                    <td>Vessel Name</td><td><?=$invoice['officer_name'];?></td>
                  </tr>
                  <tr>
                    <td>PO NO</td><td><?=$invoice['po_no'];?></td>
                  </tr>
                  <tr>
                    <td>Checkin Date</td><td><?=$invoice['checkin_date']." ".$invoice['checkin_time'];?></td>
                  </tr>
                  <tr>
                    <td>Checkout Date</td><td><?=$invoice['checkout_date']." ".$invoice['checkout_time'];?></td>
                  </tr>           
                </tbody>
              </table>
            </div>
          </div>
          <div class="clear" style="clear: both;"></div>
          <h2 class="text-center" >Billing Details</h2>
          <table width="100%" border="1" cellspacing="0" cellpadding="0" class="billing-cztm-t2 invoicetable">
            <tr align="center">
              <td width="8%"><strong>Sr.  No.</strong></td>
              <td width="12%"><strong>Service</strong></td>
              <td width="6%"><strong>SAC </strong></td>
              <td width="7%"><strong>UOM</strong></td>
              <td width="6%"><strong>Rate </strong></td>
              <td width="4%"><strong>Rs.</strong></td>
              <td width="9%"><strong>Discount</strong></td>
              <td width="15%"><strong>Taxable  value </strong></td>
              <td colspan="2"><strong>CGST</strong></td>
              <td colspan="2"><strong>SGST</strong></td>
              <td colspan="2"><strong>IGST</strong></td>
              <td width="6%"><strong>Total</strong></td>
            </tr>
            <tr>
              <td>1</td>
              <td><strong>Room Rent</strong></td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td align="right">&nbsp;</td>
              <td align="right">&nbsp;</td>
              <td align="right">&nbsp;</td>
              <td align="right">&nbsp;</td>
              <td width="7%"><strong>Rate(%) </strong></td>
              <td width="7%"><strong>Rs.</strong></td>
              <td width="7%"><strong>Rate(%) </strong></td>
              <td width="7%"><strong>Rs.</strong></td>
              <td width="6%"><strong>Rate(%) </strong></td>
              <td width="6%"><strong>Rs.</strong></td>
              <td><strong>Rs.</strong></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td><strong>Room Charges </strong></td>
              <td>996311</td>
              <td>9</td>
              <td align="right"><?=displayData($invoice['tariff'],"money");?></td>
              <td align="right"><?=displayData($total,"money");?></td>
              <td align="right">-</td>
              <td align="right"><?=displayData($total,"money");?></td>
              <td align="right">6% </td>
              <td align="right"><?=$cgst=displayData(($total/100) *6,"money");?></td>
              <td align="right">6%</td>
              <td align="right"><?=$sgst=displayData(($total/100) *6,"money");?></td>
              <td align="right">-</td>
              <td align="right">-</td>
              <td align="right"><?=$tot=displayData($total+$cgst+$sgst,"money");?></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td align="right">&nbsp;</td>
              <td align="right">&nbsp;</td>
              <td align="right">&nbsp;</td>
              <td align="right">&nbsp;</td>
              <td align="right">&nbsp;</td>
              <td align="right">&nbsp;</td>
              <td align="right">&nbsp;</td>
              <td align="right">&nbsp;</td>
              <td align="right">&nbsp;</td>
              <td align="right">&nbsp;</td>
              <td align="right">&nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td align="right">&nbsp;</td>
              <td align="right">&nbsp;</td>
              <td align="right">&nbsp;</td>
              <td align="right">&nbsp;</td>
              <td align="right">&nbsp;</td>
              <td align="right">&nbsp;</td>
              <td align="right">&nbsp;</td>
              <td align="right">&nbsp;</td>
              <td align="right">&nbsp;</td>
              <td align="right">&nbsp;</td>
              <td align="right">&nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td><strong>TOTAL </strong></td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td align="right">&nbsp;</td>
              <td align="right"><strong><?=displayData($total,"money");?></strong></td>
              <td align="right">&nbsp;</td>
              <td align="right"><strong><?=displayData($total,"money");?></strong></td>
              <td align="right">&nbsp;</td>
              <td align="right"><strong><?=displayData($cgst,"money");?></strong></td>
              <td align="right">&nbsp;</td>
              <td align="right"><strong><?=displayData($sgst,"money");?></strong></td>
              <td align="right">&nbsp;</td>
              <td align="right">&nbsp;</td>
              <td align="right"><strong><?=$tot;?></strong></td>
            </tr>
            <tr>
              <td colspan="7" rowspan="6"> <p>Amount in Words(Rs.) twenty four thousand six hundred and ninety six Rupees </p>
              <p> <strong>BENEFICIARY BANK DETAILS:</strong> 
              ANCHORPOINT HOSPITALITY SERVICES PRIVATE LIMITED.   Axis Bank, Thoraipakkam Branch, Plot No. 172 - 173, Chandrasekaran Avenue, Old  Mahaballipurm Road, Okkiyam Thuraipakkam, Chennai, Tamil Nadu, Pin 600097. Bank A.c  No: 914020052063794 IFSC CODE: UTIB0 001566 SWIFT CODE: AXISBBA75 </p></td>
              <td colspan="4">Taxable Value </td>
              <td colspan="4" align="right"><?=displayData($total,"money");?></td>
            </tr>
            <tr>
              <td colspan="4">CGST </td>
              <td colspan="4" align="right"><?=displayData($cgst,"money");?> </td>
            </tr>
            <tr>
              <td colspan="4">SGST</td>
              <td colspan="4" align="right"><?=displayData($sgst,"money");?></td>
            </tr>
            <tr>
              <td colspan="4">IGST</td>
              <td colspan="4" align="right">-</td>
            </tr>
            <tr>
              <td colspan="4"><strong>Total </strong></td>
              <td colspan="4" align="right"><strong><?=$tot;?></strong></td>
            </tr>
            <tr>
              <td colspan="4">Reverse Charge</td>
              <td colspan="4" align="right"><b>NO</b></td>
            </tr>
          </table>
        </div>
      </div>
      <!-- /.row -
    </div>
  </div>
</div>
  <!-- FOOTER -->

