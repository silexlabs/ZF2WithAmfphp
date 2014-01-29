<?php
  class Test
  {
    /**
     * Get Altersstufe list
     *
     * @return array
     */
    public function getList()
    {
      // @TODO Access to the DB-Model or other Classes about the service locator
      return ServiceLocatorFactory::getInstance()->get('DB-MODEL')->getList();
    }
  }
?>
