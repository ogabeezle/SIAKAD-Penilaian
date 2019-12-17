<?php
namespace Siakad\Penilaian\Application;

use Siakad\Penilaian\Domain\Model\NilaiRepository;

class MelihatSkalaNilaiService{
    private $nilaiRepository;
    public function __construct(NilaiRepository $nilaiRepository)
    {
        $this->nilaiRepository=$nilaiRepository;
    }
    public function execute(){
        $nilai = $this->nilaiRepository->all();
        return new MelihatSkalaNilaiResponse($nilai);
    }

}