<?php
App::build(array_merge_recursive(array(
    'View'  => dirname(dirname(__FILE__)) . DS . 'View' . DS
), App::paths()));
?>