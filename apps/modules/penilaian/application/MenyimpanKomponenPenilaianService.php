<?php
namespace Siakad\Penilaian\Application;

use Siakad\Penilaian\Domain\Model\EvaluasiPembelajaran;
use Siakad\Penilaian\Domain\Model\EvaluasiPembelajaranRepository;
use Siakad\Common\Exception\PersentaseKomponenNilaiException;

class MenyimpanKomponenPenilaianService{
    private $komponenRepository;
    public function __construct(EvaluasiPembelajaranRepository $evaluasiPembelajaranRepository){
        $this->komponenRepository=$evaluasiPembelajaranRepository;
    }

    public function execute(MenyimpanKomponenPenilaianRequest $request){
        $jumlah_nilai_komponen = 0;
        foreach ($request->komponenEvaluasi['bobotEvaluasiArray'] as $bobot) {
            $jumlah_nilai_komponen += floatval($bobot);
        }
        if ($jumlah_nilai_komponen !== 100.00) {
            throw new PersentaseKomponenNilaiException("Total bobot nilai tidak 100 persen");
        }
        $transkrip = $this->komponenRepository->save(
            $request->komponenEvaluasi
        );
        return new MenyimpanKomponenPenilaianResponse($transkrip);
    }

}