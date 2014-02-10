<?php
  namespace Service\Controller;

  use Zend\Mvc\Controller\AbstractActionController;

  use Amfphp_Core_Config;
  use Amfphp_Core_HttpRequestGatewayFactory;
  use Amfphp_Core_Common_ClassFindInfo;

  class AmfController extends AbstractActionController
  {
    private $_sPath;

    public function __construct($sPath)
    {
      $this->_sPath = $sPath;
    }

    public function serverAction()
    {
      define('AMFPHP_ROOTPATH', $this->_sPath . '/vendor/amfphp-2.2/Amfphp/');

      $oConfig = new Amfphp_Core_Config();
      $oConfig->serviceFolders   = array();
      $oConfig->serviceFolders[] = array($this->_sPath . '/module/Service/src/Service/Model/Amf/', 'Service\Model\Amf');

      $gateway = Amfphp_Core_HttpRequestGatewayFactory::createGateway($oConfig);
      $gateway->service();
      $gateway->output();

      exit;
    }
  }
?>
