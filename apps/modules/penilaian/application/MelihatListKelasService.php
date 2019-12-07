<?php
namespace Siakad\Penilaian\Application;

use Siakad\Penilaian\Domain\Model\KelasRepository;

class MelihatListKelasService{
    private $kelasRepository;
    public function __construct(KelasRepository $kelasRepository){
        $this->kelasRepository=$kelasRepository;
    }
    public function execute(MelihatListKelasRequest $request){
        $kelasByDosenAndSemester=$this->kelasRepository->byDosenAndSemseter(
            $request->dosen,
            $request->semester
        );
        return new MelihatListKelasResponse($kelasByDosenAndSemester);
    }
}