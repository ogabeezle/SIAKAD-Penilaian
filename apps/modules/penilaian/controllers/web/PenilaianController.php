<?php

namespace Siakad\Penilaian\Controllers\Web;

use Phalcon\Mvc\Controller;
use Phalcon\Di;

use Siakad\Penilaian\Application\MelihatListKelasRequest;
use Siakad\Penilaian\Application\MelihatListKelasResponse;
use Siakad\Penilaian\Application\MelihatListKelasService;
class PenilaianController extends Controller
{

    public $kelasRepository;
    public $nilaiEvaluasiPembelajaranRepository;

    public function indexAction()
    {
        return $this->view->pick('home');
    }

    public function listKelasAction()
    {
        # yang perlu diinject di set di penilaian/config/services.php
        // $this->kelasRepository = $this->di->getShared('sql_kelas_repository');

        # yang liat kelas (misal) butuh id dosen. Buat testing dosenId kubuat get
        $dosenId = $this->request->get('dosenId');
        $semester = $this->request->get('semester');

        // $service = new MelihatListKelasService($this->kelasRepository);
        # parameter request pake id dosen sama bilangan semester, kalo parameternya class dosen sama class semester model dosen sama semester harus diexpose ke controller
        // $request = new MelihatListKelasRequest($dosenId, $semester);
        // $response = $service->execute($request)

        // $this->view->listkelas = $response->data;
        // testing aja, force create object
        $this->view->parameter = json_decode(json_encode(['dosenId' => $dosenId, 'semester' => $semester]));
        
        return $this->view->pick('listkelas');

    }

    public function komponenPenilaianKelasAction()
    {

        # yang perlu diinject di set di penilaian/config/services.php
        // $this->nilaiEvaluasiPembelajaranRepository = $this->di->getShared('nama SqlNilaiEvaluasiPembelajaranRepository');

        $dosenId = $this->request->get('dosenId');
        $kodematkul = $this->request->get('kodeMatkul');
        $semester = $this->request->get('semester');

        // $service = new MelihatKomponenPenilaianKelasService($this->nilaiEvaluasiPembelajaranRepository);
        // $request = new MelihatListKelasRequest($dosenId, $semester, $kodematkul);
        // $response = $service->execute($request)

        // $this->view->listkelas = $response->data;
        // testing aja, force create object
        $this->view->parameter = json_decode(json_encode(['dosenId' => $dosenId, 'semester' => $semester, 'kodeMatkul' => $kodematkul]));
        
        return $this->view->pick('komponenpenilaiankelas');

    }

    public function lihatNilaiKelasAction()
    {


        return $this->view->pick('lihatnilaikelas');

    }

    public function lihatTranskripMahasiswaAction()
    {


        return $this->view->pick('lihattranskripmahasiswa');

    }



}