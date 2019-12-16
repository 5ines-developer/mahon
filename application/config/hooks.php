<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$hook['post_controller_constructor'][] = array(
    'class'    => 'Counterscheck',
    'function' => 'webCount',
    'filename' => 'Counterscheck.php',
    'filepath' => 'hooks',
    'params'   => []
);