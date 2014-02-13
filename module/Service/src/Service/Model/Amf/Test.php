<?php
  namespace Service\Model\Amf;

  use Service\Model\Vo\TestVO;

  class Test
  {
    /**
     * Get Altersstufe list
     *
     * @return array
     */
    public function getList()
    {
      $oVO          = new TestVO();
      $oVO->subject = 'Test-Subject';
      $oVO->message = 'This is a test.';

      return $oVO;
    }
  }
?>
