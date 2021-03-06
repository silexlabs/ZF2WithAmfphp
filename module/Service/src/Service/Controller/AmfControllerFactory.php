<?php
  namespace Service\Controller;

  use Zend\ServiceManager\FactoryInterface;
  use Zend\ServiceManager\ServiceLocatorInterface;

  class AmfControllerFactory implements FactoryInterface
  {
    public function createService(ServiceLocatorInterface $oServiceLocator)
    {
      $sPath = realpath(__DIR__ . '/../../../../../');

      return new AmfController($sPath);
    }
  }
?>