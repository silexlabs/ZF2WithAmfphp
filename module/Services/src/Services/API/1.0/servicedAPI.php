<?php
class servicesAPI {
    /**
     * This method takes a value and gives back the md5 hash of the value
     * 
     * @param String $value
     * @return String
     */
    public function md5Value($value) {
        return md5($value);
    }

}