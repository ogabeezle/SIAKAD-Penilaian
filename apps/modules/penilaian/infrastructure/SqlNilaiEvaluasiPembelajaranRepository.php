<?php
namespace Siakad\Penilaian\Infrastructure;

use Phalcon\Db\Column;
use Phalcon\Di;
use Siakad\Penilaian\Domain\Model\NilaiEvaluasiPembelajaran;
use Siakad\Penilaian\Domain\Model\NilaiEvaluasiPembelajaranRepository;

class SqlNilaiEvaluasiPembelajaranRepository implements NilaiEvaluasiPembelajaranRepository {
    private $connection;
    private $statement;
    private $statementTypes;

    public function __construct(Di $di)
    {
        $this->connection=$di->get('db');
        $this->statement = array(
            'save' => $this->connection->prepare("
                INSERT INTO `nilai_evaluasi_pembelajaran`
                    (`mahasiswa_id`, `kelas_id`, `nilai_1`, `nilai_2`, 
                     `nilai_3`, `nilai_4`, `nilai_5`, `nilai_6`, `nilai_7`, 
                     `nilai_8`, `nilai_angka`, `nilai_huruf`) 
                     VALUES (:mahasiswaId,:kelasID,:nilai1,:nilai2,
                             :nilai3,:nilai4,:nilai5,:nilai6,:nilai7,
                             :nilai8,:nilaiAngka,:nilaiHuruf)
                
            "),
            'update' => $this->connection->prepare("
                UPDATE `nilai_evaluasi_pembelajaran` 
                SET 
                    `nilai_1`=:nilai1,`nilai_2`=:nilai2,`nilai_3`=:nilai3,
                    `nilai_4`=:nilai4,`nilai_5`=:nilai5,`nilai_6`=:nilai6,
                    `nilai_7`=:nilai7,`nilai_8`=:nilai8,`nilai_angka`=:nilaiAngka,
                    `nilai_huruf`=:nilaiHuruf
                WHERE `mahasiswa_id`=:mahasiswaId and `kelas_id`=:kelasId
            "),
            'get' => $this->connection->prepare("
                select * from `nilai_evaluasi_pembelajaran` 
                where `mahasiswa_id`=:mahasiswaId and `kelas_id`=:kelasId
            ")
        );

        $this->statementTypes = [
            'save' => [
                'mahasiswaId' => Column::BIND_PARAM_STR,
                'kelasId' => Column::BIND_PARAM_STR,
                'nilai1' =>Column::BIND_PARAM_DECIMAL,
                'nilai2' =>Column::BIND_PARAM_DECIMAL,
                'nilai3' =>Column::BIND_PARAM_DECIMAL,
                'nilai4' =>Column::BIND_PARAM_DECIMAL,
                'nilai5' =>Column::BIND_PARAM_DECIMAL,
                'nilai6' =>Column::BIND_PARAM_DECIMAL,
                'nilai7' =>Column::BIND_PARAM_DECIMAL,
                'nilai8' =>Column::BIND_PARAM_DECIMAL,
                'nilaiAngka' => Column::BIND_PARAM_DECIMAL,
                'nilaiHuruf' => Column::BIND_PARAM_STR
            ],
            'update' => [
                'mahasiswaId' => Column::BIND_PARAM_STR,
                'kelasId' => Column::BIND_PARAM_STR,
                'nilai1' =>Column::BIND_PARAM_DECIMAL,
                'nilai2' =>Column::BIND_PARAM_DECIMAL,
                'nilai3' =>Column::BIND_PARAM_DECIMAL,
                'nilai4' =>Column::BIND_PARAM_DECIMAL,
                'nilai5' =>Column::BIND_PARAM_DECIMAL,
                'nilai6' =>Column::BIND_PARAM_DECIMAL,
                'nilai7' =>Column::BIND_PARAM_DECIMAL,
                'nilai8' =>Column::BIND_PARAM_DECIMAL,
                'nilaiAngka' => Column::BIND_PARAM_DECIMAL,
                'nilaiHuruf' => Column::BIND_PARAM_STR
            ],
            'get' => [
                'mahasiswaId' => Column::BIND_PARAM_STR,
                'kelasId' => Column::BIND_PARAM_STR
            ]
        ];
    }

    public function save(NilaiEvaluasiPembelajaran $nilaiEvaluasiPembelajaran)
    {
        $checkStatementData=[
            'mahasiswaId' => $nilaiEvaluasiPembelajaran->getMahasiswa()->getId(),
            'kelasId' => $nilaiEvaluasiPembelajaran->getKelas()->getId()
        ];
        $statementData = [
            'mahasiswaId' => $nilaiEvaluasiPembelajaran->getMahasiswa()->getId(),
            'kelasId' => $nilaiEvaluasiPembelajaran->getKelas()->getId(),
            'nilai1' =>$nilaiEvaluasiPembelajaran->getNilaiArray()[0],
            'nilai2' =>$nilaiEvaluasiPembelajaran->getNilaiArray()[1],
            'nilai3' =>$nilaiEvaluasiPembelajaran->getNilaiArray()[2],
            'nilai4' =>$nilaiEvaluasiPembelajaran->getNilaiArray()[3],
            'nilai5' =>$nilaiEvaluasiPembelajaran->getNilaiArray()[4],
            'nilai6' =>$nilaiEvaluasiPembelajaran->getNilaiArray()[5],
            'nilai7' =>$nilaiEvaluasiPembelajaran->getNilaiArray()[6],
            'nilai8' =>$nilaiEvaluasiPembelajaran->getNilaiArray()[7],
            'nilaiAngka' => $nilaiEvaluasiPembelajaran->getNilaiAngka(),
            'nilaiHuruf' => $nilaiEvaluasiPembelajaran->getNilaiHuruf()
        ];
        $result = $this->connection->executePrepared(
            $this->statement['get'],
            $checkStatementData,
            $this->statementTypes['get']
        );

        $count=0;
        foreach ($result as $item){
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