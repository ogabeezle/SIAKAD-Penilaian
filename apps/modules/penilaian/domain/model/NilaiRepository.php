<?php

namespace Siakad\Penilaian\Domain\Model;

interface NilaiRepository{
    public function all();
    public function save($nilai);
}