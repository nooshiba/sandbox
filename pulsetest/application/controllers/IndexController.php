<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // get option
        $bootstrap = $this->getInvokeArg('bootstrap');
        $option = $bootstrap->getOptions();
        /*
        if ($bootstrap->getResource('smarty')) {
            error_log('smarty!');
        }*/
    }

}
?>
