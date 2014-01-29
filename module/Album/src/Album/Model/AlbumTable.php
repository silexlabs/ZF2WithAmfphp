<?php
//testzf2/module/Album/src/Album/Model/AlbumTable.php
namespace Album\Model;

use Zend\Db\TableGateway\AbstractTableGateway;

class AlbumTable extends AbstractTableGateway {

    public function __construct($adapter) {
        $this->table = 'album';
        $this->adapter = $adapter;
    }

    public function fetchAll() {
        return $this->select();
    }

    /*     NEW METHODS    */
    public function deleteAlbum($id){
        $this->delete(array('id'=>$id));
    }

    public function getAlbum($id){
        $rowset = $this->select(array('id'=>$id));
        if (!$row = $rowset->current()){
            throw new \Exception ('Row not found');
        }
        return $row;
    }
    public function saveAlbum($album){
        $aData = array('title' => $album->title
                     , 'artist' => $album->artist);
        if ( $album->id == 0){
            $this->insert($aData);
        }
        else {
            $this->update($aData, array('id' => $album->id));
        }
    }
}