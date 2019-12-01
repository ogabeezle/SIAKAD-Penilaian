<?php

namespace Siakad\Prasarana\Domain\Model;

class JenisPrasarana {
    private $id;
    private $nama;
    
    public function setNama($nama) {
        $this->nama = $nama;
    }

    public function getNama() {
        return $this->nama;
    }
}
?>