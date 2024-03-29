<?php

namespace Siakad\Penilaian\Controllers\Web;

use Phalcon\Mvc\Controller;
use Phalcon\Di;

use Siakad\Common\Exception\NilaiKomponenMahasiswaException;
use Siakad\Common\Exception\NilaiSudahPermanenException;
use Siakad\Common\Exception\PersentaseKomponenNilaiException;
use Siakad\Common\Exception\SkalaNilaiException;
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
use Siakad\Penilaian\Application\MenyimpanNilaiRequest;
use Siakad\Penilaian\Application\MenyimpanNilaiService;

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
        $this->kelasRepository = $this->di->getShared('sql_kelas_repository');

        $dosenId = $this->request->get('dosenId');
        $semester = $this->request->get('semester');

        $service = new MelihatListKelasService($this->kelasRepository);

        $request = new MelihatListKelasRequest($dosenId, $semester);
        $response = $service->execute($request);

        $this->view->dosenId = $dosenId;
        $this->view->semester = $semester;
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

        $this->view->kelasId = $kelasId;
        return $this->view->pick('komponenpenilaiankelas');

    }

    public function ubahKomponenPenilaianKelasAction()
    {
        $this->nilaiEvaluasiPembelajaranRepository = $this->di->getShared('sql_evaluasi_pembelajaran_repository');
        $data = $this->request->get();
        $service = new MenyimpanKomponenPenilaianService($this->nilaiEvaluasiPembelajaranRepository);
        $request = new MenyimpanKomponenPenilaianRequest($data);
        $this->view->kelasId = $_POST['kelasId'];
        $kelasId = $_POST['kelasId'];
        try {
            $service->execute($request);
            $this->view->error = false;
            $this->flash->success("Komponen Nilai telah Terupdate");
            $this->response->redirect("/komponenpenilaiankelas?kelasId=".$kelasId, true);
        } catch (PersentaseKomponenNilaiException $e) {
            $this->flash->error($e->getMessage());
            $this->response->redirect("/komponenpenilaiankelas?kelasId=".$kelasId, true);
        }catch(NilaiSudahPermanenException $e){
            $this->flash->error($e->getMessage());
            $this->response->redirect("/komponenpenilaiankelas?kelasId=".$kelasId, true);
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

        $this->nilaiRepository = $this->di->getShared('sql_nilai_repository');
        $service = new MelihatNilaiService($this->nilaiRepository);
        $response = $service->execute();
        $this->view->listskalanilai = $response->data;

        $this->nilaiEvaluasiPembelajaranRepository = $this->di->getShared('sql_kelas_repository');
        $service = new MelihatNilaiKelasService($this->nilaiEvaluasiPembelajaranRepository);
        $request = new MelihatNilaiKelasRequest($kelasId);
        $response = $service->execute($request); 
        $this->view->listevaluasi = $response->data;

        $this->view->kelasId = $kelasId;
        return $this->view->pick('lihatnilaikelas');

    }

    public function ubahNilaiKelasAction()
    {
        $this->nilaiEvaluasiPembelajaranRepository = $this->di->getShared('sql_nilai_evaluasi_pembelajaran_repository');
        $data = $this->request->get();
        $service = new MenyimpanNilaiEvaluasiService($this->nilaiEvaluasiPembelajaranRepository);
        $request = new MenyimpanNilaiEvaluasiRequest($data);
        $this->view->kelasId = $_POST['kelasId'];
        $kelasId = $_POST['kelasId'];
        try {
            $service->execute($request);
            $this->view->error = false;
            $this->flash->success("Komponen Nilai telah Terupdate");
            $this->response->redirect("/lihatnilaikelas?kelasId=".$kelasId, true);
        } catch(NilaiKomponenMahasiswaException $e){
            $this->flash->error($e->getMessage());
            $this->response->redirect("/lihatnilaikelas?kelasId=".$kelasId, true);
        }
    }

    public function lihatTranskripMahasiswaAction()
    {
        $this->nilaiEvaluasiPembelajaranRepository = $this->di->getShared('sql_nilai_evaluasi_pembelajaran_repository');

        $mahasiswaId = $this->request->get('mahasiswaId');

        $service = new MelihatTranskripMahasiswaService($this->nilaiEvaluasiPembelajaranRepository);
        $request = new MelihatTranskripMahasiswaRequest($mahasiswaId);
        $response = $service->execute($request);

        $this->view->nilaitranskrip = $response->data;

        $this->view->mahasiswaId = $mahasiswaId;
        return $this->view->pick('lihattranskripmahasiswa');
    }

    public function lihatSkalaNilaiAction()
    {
        $this->nilaiRepository = $this->di->getShared('sql_nilai_repository');

        $service = new MelihatNilaiService($this->nilaiRepository);
        $response = $service->execute();
        $this->view->listskalanilai = $response->data;

        return $this->view->pick('skalanilai');
    }

    public function ubahSkalaNilaiAction(){
        $this->nilaiRepository = $this->di->getShared('sql_nilai_repository');
        $data = $this->request->get();
        $service = new MenyimpanNilaiService($this->nilaiRepository);
        $request = new MenyimpanNilaiRequest($data);
        try {
            $service->execute($request);
            $this->view->error = false;
            $this->flash->success("Skala Nilai telah Terupdate");
            $this->response->redirect("/lihatskalanilai", true);
        } catch(SkalaNilaiException $e){
            $this->flash->error($e->getMessage());
            $this->response->redirect("/lihatskalanilai", true);
        }
    }


}