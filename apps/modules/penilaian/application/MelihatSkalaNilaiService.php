<?php
namespace Siakad\Penilaian\Application;

use Siakad\Penilaian\Domain\Model\SkalaNilaiRepository;

class MelihatSkalaNilaiService{
    private $nilaiRepository;
    public function __construct(SkalaNilaiRepository $nilaiRepository)
    {
        $this->nilaiRepository=$nilaiRepository;
    }
    public function execute(){
        $nilai = $this->nilaiRepository->all();
        return new MelihatSkalaNilaiResponse($nilai);
    }

}