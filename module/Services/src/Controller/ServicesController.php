<?php

namespace Services\Controller;

ini_set("soap.wsdl_cache_enabled", 0);

use Zend\Mvc\Controller\AbstractActionController;
use Zend\Soap\AutoDiscover;
use Zend\Soap\Server;

require_once __DIR__ . '/../API/1.0/servicesAPI.php';

class ServicesController extends AbstractActionController {

    private $_options;
    private $_URI = "http-LINK/services";
    private $_WSDL_URI = "http-LINK/services?wsdl";

    public function indexAction() {
        if (isset($_GET['wsdl'])) {
            $this->handleWSDL();
        } else {
            $this->handleSOAP();
        }
    }

    private function handleWSDL() {

        $autodiscover = new AutoDiscover();
        $autodiscover->setClass('servicesAPI')
                ->setUri($this->_URI);
        $autodiscover->handle();
    }

    private function handleSOAP() {

        $soap = new Server($this->_WSDL_URI);
        $soap->setClass('servicesAPI');
        $soap->handle();
    }

}