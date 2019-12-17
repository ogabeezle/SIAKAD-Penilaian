<?php
namespace Siakad\Penilaian\Infrastructure;

use Phalcon\Db\Column;
use Phalcon\Di;
use Siakad\Common\Exception\NilaiSudahPermanenException;
use Siakad\Penilaian\Domain\Model\EvaluasiPembelajaran;
use Siakad\Penilaian\Domain\Model\EvaluasiPembelajaranRepository;

class SqlEvaluasiPembelajaranRepository implements EvaluasiPembelajaranRepository {
    private $connection;
    private $statement;
    private $statementTypes;

    public function __construct(Di $di)
    {
        $this->connection=$di->get('db');
        $this->statement = array(
            'get' => $this->connection->prepare("
                select * from `evaluasi_pembelajaran` 
                where `evaluasi_pembelajaran`.`kelas_id`=:kelasId 
                  and `evaluasi_pembelajaran`.`dosen_id` = :dosenId
            "),
            'save' => $this->connection->prepare("
                INSERT INTO `evaluasi_pembelajaran`
                    (`kelas_id`, `dosen_id`, `jumlah_penilaian`, 
                     `nama_evaluasi_1`, `persentase_1`, `nama_evaluasi_2`, 
                     `persentase_2`, `nama_evaluasi_3`, `persentase_3`,
                     `nama_evaluasi_4`, `persentase_4`, `nama_evaluasi_5`,
                     `persentase_5`, `nama_evaluasi_6`, `persentase_6`, 
                     `nama_evaluasi_7`, `persentase_7`, `nama_evaluasi_8`, 
                     `persentase_8`, `is_fixed`) 
                     VALUES (:kelasId,:dosenId,:jumlahPenilaian,
                             :nama1,:bobot1,:nama2,:bobot2,
                             :nama3,:bobot3,:nama4,:bobot4,
                             :nama5,:bobot5,:nama6,:bobot6,
                             :nama7,:bobot7,:nama8,:bobot8,:isFixed)
            "),
            'update'=>$this->connection->prepare("
                UPDATE `evaluasi_pembelajaran` 
                SET 
                  `jumlah_penilaian`=:jumlahPenilaian,
                  `nama_evaluasi_1`=:nama1,`persentase_1`=:bobot1,`nama_evaluasi_2`=:nama2,
                  `persentase_2`=:bobot2,`nama_evaluasi_3`=:nama3,`persentase_3`=:bobot3,
                  `nama_evaluasi_4`=:nama4,`persentase_4`=:bobot4,`nama_evaluasi_5`=:nama5,
                  `persentase_5`=:bobot5,`nama_evaluasi_6`=:nama6,`persentase_6`=:bobot6,
                  `nama_evaluasi_7`=:nama7,`persentase_7`=:bobot7,`nama_evaluasi_8`=:nama8,
                  `persentase_8`=:bobot8,`is_fixed`=:isFixed
                WHERE `kelas_id`=:kelasId and `dosen_id`=:dosenId
            ")
        );

        $this->statementTypes = [
            'save' => [
                'kelasId' => Column::BIND_PARAM_STR,
                'dosenId' => Column::BIND_PARAM_STR,
                'jumlahPenilaian' => Column::BIND_PARAM_INT,
                'nama1' => Column::BIND_PARAM_STR,
                'bobot1' =>Column::BIND_PARAM_DECIMAL,
                'nama2' => Column::BIND_PARAM_STR,
                'bobot2' =>Column::BIND_PARAM_DECIMAL,
                'nama3' => Column::BIND_PARAM_STR,
                'bobot3' =>Column::BIND_PARAM_DECIMAL,
                'nama4' => Column::BIND_PARAM_STR,
                'bobot4' =>Column::BIND_PARAM_DECIMAL,
                'nama5' => Column::BIND_PARAM_STR,
                'bobot5' =>Column::BIND_PARAM_DECIMAL,
                'nama6' => Column::BIND_PARAM_STR,
                'bobot6' =>Column::BIND_PARAM_DECIMAL,
                'nama7' => Column::BIND_PARAM_STR,
                'bobot7' =>Column::BIND_PARAM_DECIMAL,
                'nama8' => Column::BIND_PARAM_STR,
                'bobot8' =>Column::BIND_PARAM_DECIMAL,
                'isFixed' =>Column::BIND_PARAM_BOOL
            ],
            'update' => [
                'kelasId' => Column::BIND_PARAM_STR,
                'dosenId' => Column::BIND_PARAM_STR,
                'jumlahPenilaian' => Column::BIND_PARAM_INT,
                'nama1' => Column::BIND_PARAM_STR,
                'bobot1' =>Column::BIND_PARAM_DECIMAL,
                'nama2' => Column::BIND_PARAM_STR,
                'bobot2' =>Column::BIND_PARAM_DECIMAL,
                'nama3' => Column::BIND_PARAM_STR,
                'bobot3' =>Column::BIND_PARAM_DECIMAL,
                'nama4' => Column::BIND_PARAM_STR,
                'bobot4' =>Column::BIND_PARAM_DECIMAL,
                'nama5' => Column::BIND_PARAM_STR,
                'bobot5' =>Column::BIND_PARAM_DECIMAL,
                'nama6' => Column::BIND_PARAM_STR,
                'bobot6' =>Column::BIND_PARAM_DECIMAL,
                'nama7' => Column::BIND_PARAM_STR,
                'bobot7' =>Column::BIND_PARAM_DECIMAL,
                'nama8' => Column::BIND_PARAM_STR,
                'bobot8' =>Column::BIND_PARAM_DECIMAL,
                'isFixed' =>Column::BIND_PARAM_BOOL
            ],
            'get' => [
                'dosenId' => Column::BIND_PARAM_STR,
                'kelasId' => Column::BIND_PARAM_STR
            ]
        ];
    }

    public function save(EvaluasiPembelajaran $evaluasiPembelajaran)
    {
        $checkStatementData = [
            'kelasId' => $evaluasiPembelajaran->getKelas()->getId(),
            'dosenId' => $evaluasiPembelajaran->getDosen()->getId()
        ];
        $evaluasiPembelajaran->validate();
        $statementData = [
            'kelasId' => $evaluasiPembelajaran->getKelas()->getId(),
            'dosenId' => $evaluasiPembelajaran->getDosen()->getId(),
            'jumlahPenilaian' => $evaluasiPembelajaran->getJumlahPenilaian(),
            'nama1' => $evaluasiPembelajaran->getKomponenArray()[0]->getNama(),
            'bobot1' =>$evaluasiPembelajaran->getKomponenArray()[0]->getBobot(),
            'nama2' => $evaluasiPembelajaran->getKomponenArray()[1]->getNama(),
            'bobot2' =>$evaluasiPembelajaran->getKomponenArray()[1]->getBobot(),
            'nama3' => $evaluasiPembelajaran->getKomponenArray()[2]->getNama(),
            'bobot3' =>$evaluasiPembelajaran->getKomponenArray()[2]->getBobot(),
            'nama4' => $evaluasiPembelajaran->getKomponenArray()[3]->getNama(),
            'bobot4' =>$evaluasiPembelajaran->getKomponenArray()[3]->getBobot(),
            'nama5' => $evaluasiPembelajaran->getKomponenArray()[4]->getNama(),
            'bobot5' =>$evaluasiPembelajaran->getKomponenArray()[4]->getBobot(),
            'nama6' => $evaluasiPembelajaran->getKomponenArray()[5]->getNama(),
            'bobot6' =>$evaluasiPembelajaran->getKomponenArray()[5]->getBobot(),
            'nama7' => $evaluasiPembelajaran->getKomponenArray()[6]->getNama(),
            'bobot7' =>$evaluasiPembelajaran->getKomponenArray()[6]->getBobot(),
            'nama8' => $evaluasiPembelajaran->getKomponenArray()[7]->getNama(),
            'bobot8' =>$evaluasiPembelajaran->getKomponenArray()[7]->getBobot(),
            'isFixed' =>$evaluasiPembelajaran->getIsFixed()
        ];

        $result = $this->connection->executePrepared(
            $this->statement['get'],
            $checkStatementData,
            $this->statementTypes['get']
        );
        $count =0;
        foreach ($result as $item){
            if($item[19]==1) throw new NilaiSudahPermanenException("Tidak Bisa Mengubah Komponen yang Sudah Difinalisasi");
            $count++;
        }


        if($count>0){
            $result = $this->connection->executePrepared(
                $this->statement['update'],
                $statementData,
                $this->statementTypes['update']
            );
        }
        else{
            $result = $this->connection->executePrepared(
                $this->statement['save'],
                $statementData,
                $this->statementTypes['save']
            );
        }
    }
}