<?php

//
// Layout config for the site admin 
//
                                        

$config['layout']['default']['template'] = 'layouts/frontend';
$config['layout']['default']['title']    = 'Anchorpoint';
$config['layout']['default']['js_dir']   = 'assets/js/';
$config['layout']['default']['css_dir']  = 'assets/css/';
$config['layout']['default']['img_dir']     = 'assets/images/';


$config['layout']['default']['javascripts'] = array('jquery-3.2.1.min','bootstrap.min','build/global.min','moment','daterangepicker',"jquery.dataTables.min",'function','wickedpicker','select2.min','remodal',"dropzone",'allinone_bannerRotator','jquery.touchSwipe.min');
 
$config['layout']['default']['stylesheets'] = array('bootstrap.min','styles','custom','daterangepicker','wickedpicker','select2.min','ram','font-awesome.min','remodal','remodal-default-theme','responsive',"dropzone",'jquery.dataTables.min','allinone_bannerRotator');

$config['layout']['default']['description'] = '';
$config['layout']['default']['keywords']    = '';

$config['layout']['default']['http_metas'] = array(
    'Content-Type' => 'text/html; charset=utf-8',
	'viewport'     => 'width=device-width, initial-scale=1.0',
    'author' => 'Anchorpoint',
);

?>
