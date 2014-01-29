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
      // @TODO Set the path to AMFPHP_ROOT
      define('AMFPHP_ROOTPATH', $this->_sPath . '../library/Amfphp/' . VERSION_AMF . '/Amfphp/');

      $oConfig = new Amfphp_Core_Config();
      $oConfig->serviceFolders   = array();
      $oConfig->serviceFolders[] = $this->_sPath . 'module/Service/src/Service/Model/Amf/';
      
      $gateway = Amfphp_Core_HttpRequestGatewayFactory::createGateway($oConfig);
      $gateway->service();
      $gateway->output();

      exit;
    }
  }
?>
