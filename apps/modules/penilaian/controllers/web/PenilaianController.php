<?php

namespace Siakad\Penilaian\Controllers\Web;

use Phalcon\Mvc\Controller;
use Phalcon\Di;

use Siakad\Common\Exception\PersentaseKomponenNilaiException;
use Siakad\Penilaian\Application\MelihatKomponenPenilaianKelasRequest;
use Siakad\Penilaian\Application\MelihatKomponenPenilaianKelasService;
use Siakad\Penilaian\Application\MelihatListKelasRequest;
use Siakad\Penilaian\Application\MelihatListKelasResponse;
use Siakad\Penilaian\Application\MelihatListKelasService;
use Siakad\Penilaian\Application\MelihatNilaiKelasRequest;
use Siakad\Penilaian\Application\MelihatNilaiKelasService;
use Siakad\Penilaian\Application\MelihatNilaiService;
use Siakad\Penilaian\Application\MelihatTranskripMahasiswaRequest;
use Siakad\Penilaian\Application\MelihatTranskripMahasiswaService;
use Siakad\Penilaian\Application\MenyimpanKomponenPenilaianRequest;
use Siakad\Penilaian\Application\MenyimpanKomponenPenilaianService;
use Siakad\Penilaian\Application\MenyimpanNilaiEvaluasiRequest;
use Siakad\Penilaian\Application\MenyimpanNilaiEvaluasiService;

use Phalcon\Http\Response;

class PenilaianController extends Controller
{

    public $kelasRepository;
    public $nilaiEvaluasiPembelajaranRepository;
    public $nilaiRepository;

    public function indexAction()
    {
        return $this->view->pick('home');
    }

    public function listKelasAction()
    {
//        print_r("adjfhbajsd");
//        die(0);
        # yang perlu diinject di set di penilaian/config/services.php
        $this->kelasRepository = $this->di->getShared('sql_kelas_repository');

        # yang liat kelas (misal) butuh id dosen. Buat testing dosenId kubuat get
        $dosenId = $this->request->get('dosenId');
        $semester = $this->request->get('semester');

        $service = new MelihatListKelasService($this->kelasRepository);
        # parameter request pake id dosen sama bilangan semester, kalo parameternya class dosen sama class semester model dosen sama semester harus diexpose ke controller
        $request = new MelihatListKelasRequest($dosenId, $semester);
        $response = $service->execute($request);
        // echo "<pre>";
        // print_r($response->data);
        // echo "</pre>";
        // // die();
        // $this->view->listkelas = $response->data;
        // testing aja, force create object
        $this->view->parameter = json_decode(json_encode(['dosenId' => $dosenId, 'semester' => $semester]));
        $this->view->listkelas = $response->data;

        return $this->view->pick('listkelas');

    }

    public function komponenPenilaianKelasAction()
    {
        $this->nilaiEvaluasiPembelajaranRepository = $this->di->getShared('sql_kelas_repository');
        $kelasId = $this->request->get('kelasId');

        $service = new MelihatKomponenPenilaianKelasService($this->nilaiEvaluasiPembelajaranRepository);
        $request = new MelihatKomponenPenilaianKelasRequest($kelasId);
        $response = $service->execute($request);
        $this->view->error = false;
        $this->view->komponenpenilaian = $response->data[0];

        $this->view->parameter = json_decode(json_encode(['kelasId' => $kelasId]));
        return $this->view->pick('komponenpenilaiankelas');

    }

    public function ubahKomponenPenilaianKelasAction()
    {
        $this->nilaiEvaluasiPembelajaranRepository = $this->di->getShared('sql_evaluasi_pembelajaran_repository');
        $data = $this->request->get();
        $service = new MenyimpanKomponenPenilaianService($this->nilaiEvaluasiPembelajaranRepository);
        $request = new MenyimpanKomponenPenilaianRequest($data);
        $this->view->parameter = json_decode(json_encode(['kelasId' => $_POST]));
        $kelasId = $_POST['kelasId'];
        try {
            $service->execute($request);
            $this->view->error = false;
            $this->flash->success("Komponen Nilai telah Terupdate");
            $this->response->redirect("/komponenpenilaiankelas?kelasId=".$kelasId);
        } catch (PersentaseKomponenNilaiException $e) {
            $this->flash->error($e);
            $this->response->redirect("/komponenpenilaiankelas?kelasId=".$kelasId);
        }
    }

    public function lihatNilaiKelasAction()
    {
        // show komponen penilaian
        $this->nilaiEvaluasiPembelajaranRepository = $this->di->getShared('sql_kelas_repository');
        $kelasId = $this->request->get('kelasId');

        $service = new MelihatKomponenPenilaianKelasService($this->nilaiEvaluasiPembelajaranRepository);
        $request = new MelihatKomponenPenilaianKelasRequest($kelasId);
        $response = $service->execute($request);
        $this->view->komponenpenilaian = $response->data[0];

        $this->nilaiEvaluasiPembelajaranRepository = $this->di->getShared('sql_kelas_repository');
        $service = new MelihatNilaiKelasService($this->nilaiEvaluasiPembelajaranRepository);
        $request = new MelihatNilaiKelasRequest($kelasId);
        $response = $service->execute($request); 
        $this->view->listevaluasi = $response->data;

        $this->view->parameter = json_decode(json_encode(['kelasId' => $kelasId]));
        return $this->view->pick('lihatnilaikelas');

    }

    public function ubahNilaiKelasAction()
    {
        $this->nilaiEvaluasiPembelajaranRepository = $this->di->getShared('sql_nilai_evaluasi_pembelajaran_repository');
        $data = $this->request->get();
        unset($data['_url']);
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        $service = new MenyimpanNilaiEvaluasiService($this->nilaiEvaluasiPembelajaranRepository);
//        foreach ($data as $each){
//            print_r($each);
            $request = new MenyimpanNilaiEvaluasiRequest($data);
            $response = $service->execute($request);
//        }
    }

    public function lihatTranskripMahasiswaAction()
    {
        $this->nilaiEvaluasiPembelajaranRepository = $this->di->getShared('sql_nilai_evaluasi_pembelajaran_repository');

        $mahasiswaId = $this->request->get('mahasiswaId');

        $service = new MelihatTranskripMahasiswaService($this->nilaiEvaluasiPembelajaranRepository);
        $request = new MelihatTranskripMahasiswaRequest($mahasiswaId);
        $response = $service->execute($request);

        $this->view->nilaitranskrip = $response->data;

        $this->view->parameter = json_decode(json_encode(['mahasiswaId' => $mahasiswaId]));
        return $this->view->pick('lihattranskripmahasiswa');
    }

    public function lihatSkalaNilaiAction()
    {
        $this->nilaiRepository = $this->di->getShared('sql_nilai_repository');

//        $id =
        $service = new MelihatNilaiService($this->nilaiRepository);
        $response = $service->execute();

        var_dump($response);

        $this->view->listskalanilai = $response->data;

//        $this->view->parameter = json_decode(json_encode(['mahasiswaId' => $mahasiswaId]));
        return $this->view->pick('skalanilai');
    }


}