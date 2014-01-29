<?php
  namespace Service\Controller;

  use Zend\ServiceManager\FactoryInterface;
  use Zend\ServiceManager\ServiceLocatorInterface;

  class AmfControllerFactory implements FactoryInterface
  {
    public function createService(ServiceLocatorInterface $oServiceLocator)
    {
      $sPath = $oServiceLocator->getServiceLocator()->get('BG_MAINPATH');

      return new AmfController($sPath);
    }
  }
?>