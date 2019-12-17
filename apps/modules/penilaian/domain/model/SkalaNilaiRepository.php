<?php

namespace Siakad\Penilaian\Domain\Model;

interface SkalaNilaiRepository{
    public function all();
    public function save(SkalaNilaiRoot $skalaNilaiRoot);
}