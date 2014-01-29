<?php
//testzf2/module/Album/src/Album/Controller/AlbumComtroller.php
namespace Album\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Album\Model\AlbumTable;

use Album\Form\AlbumForm; // <--- Add
use Album\Model\Album;  // <--- Add

class AlbumController extends AbstractActionController
{
    public function indexAction()
    {
        return new ViewModel (array('valueA'=>555
                                    ,'propertyB'=>888
                                    ,'albums' => $this->getAlbumTable()->fetchAll(),));
    }

    public function getAlbumTable(){
            return $this->getServiceLocator()->get('Album\Model\AlbumTable');
    }
    /*     NEW METHODS    */
    public function deleteAction(){

        $id = (int) $this->params()->fromRoute('id', 0);
        if ($id) {
            $request = $this->getRequest();
            if (!$request->isPost()) {
                return array('id'    => $id,
                             'album' => $this->getAlbumTable()->getAlbum($id));
            }
            else {
                $del = $request->getPost('del', 'No');

                if ($del == 'Yes') {
                    $id = (int) $request->getPost('id');
                    $this->getAlbumTable()->deleteAlbum($id);
                }
            }
        }

        return $this->redirect()->toRoute('album');
    }
    public function addAction(){
        $form = new AlbumForm();
        $form->get('submit')->setValue('Add');

        $request = $this->getRequest();
        if ($request->isPost()) {
            $album = new Album();
            $form->setInputFilter($album->getInputFilter());
            $form->setData($request->getPost());

            if ($form->isValid()) {
                $album->exchangeArray($form->getData());
                $this->getAlbumTable()->saveAlbum($album);

                return $this->redirect()->toRoute('album');
            }
        }
        return array('form' => $form);
    }

}