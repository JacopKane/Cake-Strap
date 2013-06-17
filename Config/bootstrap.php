<?php
App::build(array_merge_recursive(App::paths(), array(
    'View'  => dirname(dirname(__FILE__)) . DS . 'View' . DS
)));
?>