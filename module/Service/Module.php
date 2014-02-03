<?php
  namespace Service;

  use Service\Model\ServiceLocatorFactory;
  use Zend\EventManager\EventInterface;
  use Zend\ModuleManager\Feature\AutoloaderProviderInterface;
  use Zend\ModuleManager\Feature\BootstrapListenerInterface;
  use Zend\ModuleManager\Feature\ConfigProviderInterface;

  class Module implements AutoloaderProviderInterface,
                          BootstrapListenerInterface,
                          ConfigProviderInterface
  {
    public function getAutoloaderConfig()
    {
      // @TODO In the first line you need the path to the AMFphp Classmap-File. This can you generate about /vendor/bin/classmap_generator.php
      return array('Zend\Loader\ClassMapAutoloader' => array(__DIR__ . '/../../vendor/amfphp-2.2/autoload_classmap.php'),
                   'Zend\Loader\StandardAutoloader' => array('namespaces' => array(__NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__)));
    }

    public function onBootstrap(EventInterface $oEvent)
    {
      $oServiceManager = $oEvent->getApplication()->getServiceManager();

      ServiceLocatorFactory::setInstance($oServiceManager);
    }

    public function getConfig()
    {
      return include __DIR__ . '/config/module.config.php';
    }
  }
?>
