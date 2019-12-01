<?php

namespace Siakad\Scheduling\Controllers\Web;

use Phalcon\Mvc\Controller;
use Phalcon\Di;

class SchedulingController extends Controller
{
    public function jadwalKuliahAction()
    {
        $periodeKuliahTipe = $this->dispatcher->getParam('tipe');
        $periodeKuliahTahun = $this->dispatcher->getParam('tahun');

        $jadwalKuliahRepository = $this->di->get('sql_jadwal_kuliah_repository');
        $service = new MelihatJadwalKuliahProdiService($jadwalKuliahRepository);
        $response = $service->execute(
            new MelihatJadwalKuliahProdiRequest(
                $periodeKuliahTipe,
                $periodeKuliahTipe
            )
        );

        $this->view->setVar('jadwalKuliah', $response->data);
        return $this->view->pick('jadwal-kuliah/index');
    }


}