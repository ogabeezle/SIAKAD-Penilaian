<?php
namespace Siakad\Penilaian\Application;

use Siakad\Penilaian\Domain\Model\NilaiRepository;

class MelihatNilaiService{
    private $nilaiRepository;
    public function __construct(NilaiRepository $nilaiRepository)
    {
        $this->nilaiRepository=$nilaiRepository;
    }
    public function execute(){
        $nilai = $this->nilaiRepository->all();
        return new MelihatNilaiResponse($nilai);
    }

}