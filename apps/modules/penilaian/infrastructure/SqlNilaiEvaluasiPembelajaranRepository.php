<?php
namespace Siakad\Penilaian\Infrastructure;

use Phalcon\Db\Column;
use Phalcon\Di;
use Siakad\Penilaian\Domain\Model\Kelas;
use Siakad\Penilaian\Domain\Model\Mahasiswa;
use Siakad\Penilaian\Domain\Model\MataKuliah;
use Siakad\Penilaian\Domain\Model\NilaiEvaluasiPembelajaran;
use Siakad\Penilaian\Domain\Model\NilaiEvaluasiPembelajaranRepository;
use Siakad\Penilaian\Domain\Model\Semester;

class SqlNilaiEvaluasiPembelajaranRepository implements NilaiEvaluasiPembelajaranRepository {
    private $connection;
    private $statement;
    private $statementTypes;
    const INDEX_KELAS_ID=0, INDEX_SEMESTER_ID=1, INDEX_MATAKULIAH_ID=2,
        INDEX_NAMA_KELAS=3, INDEX_TAHUN_AJARAN=5,INDEX_SEMESTER=6, INDEX_NAMA_MATAKULIAH=8,
        INDEX_KODE_MATA_KULIAH=9, INDEX_SKS_MATAKULIAH=10, INDEX_DOSEN_ID=11,
        INDEX_MAHASISWA_ID=1, INDEX_NILAI_1=13, INDEX_NILAI_2=14, INDEX_NILAI_3=15,
        INDEX_NILAI_4=16, INDEX_NILAI_5=17, INDEX_NILAI_6=18, INDEX_NILAI_7=19,
        INDEX_NILAI_8=20,INDEX_NILAI_ANGKA=21, INDEX_NILAI_HURUF=22,
        INDEX_NAMA_MAHASISWA=24;

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
            'byMahasiswa' => $this->connection->prepare("
                Select * from `kelas` 
                    inner join `semester` on `kelas`.`semester_id` = `semester`.`id` 
                    inner join `mata_kuliah` on `kelas`.`mata_kuliah_id` = `mata_kuliah`.`id` 
                    inner join `nilai_evaluasi_pembelajaran` 
                        on `kelas`.`id` = `nilai_evaluasi_pembelajaran`.`kelas_id` 
                    inner join `mahasiswa` 
                        on `mahasiswa`.`nrp` = `nilai_evaluasi_pembelajaran`.`mahasiswa_id`
                where `mahasiswa`.`nrp`=:mahasiswaId
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
            ],
            'byMahasiswa' => [
                'mahasiswaId' => Column::BIND_PARAM_STR
            ]
        ];
    }

    public function byMahasiswa($mahasiswaId)
    {
        $statementData = [
            'mahasiswaId' => $mahasiswaId
        ];
        $result = $this->connection->executePrepared(
            $this->statement['byMahasiswa'],
            $statementData,
            $this->statementTypes['byMahasiswa']
        );
        $nilaiArray = array();
        foreach ($result as $item){
            array_push($nilaiArray, new NilaiEvaluasiPembelajaran(
                new Mahasiswa(
                    $item[self::INDEX_MAHASISWA_ID],
                    $item[self::INDEX_NAMA_MAHASISWA]
                ),
                new kelas(
                    $item[self::INDEX_KELAS_ID],
                    new Semester(
                        $item[self::INDEX_SEMESTER_ID],
                        $item[self::INDEX_TAHUN_AJARAN],
                        $item[self::INDEX_SEMESTER]
                    ),
                    new MataKuliah(
                        $item[self::INDEX_MATAKULIAH_ID],
                        $item[self::INDEX_KODE_MATA_KULIAH],
                        $item[self::INDEX_NAMA_MATAKULIAH],
                        $item[self::INDEX_SKS_MATAKULIAH]
                    ),
                    $item[self::INDEX_NAMA_KELAS]
                ),
                array(
                    $item[self::INDEX_NILAI_1],
                    $item[self::INDEX_NILAI_2],
                    $item[self::INDEX_NILAI_3],
                    $item[self::INDEX_NILAI_4],
                    $item[self::INDEX_NILAI_5],
                    $item[self::INDEX_NILAI_6],
                    $item[self::INDEX_NILAI_7],
                    $item[self::INDEX_NILAI_8]
                ),
                $item[self::INDEX_NILAI_ANGKA],
                $item[self::INDEX_NILAI_HURUF]
            ));
        }
        return $nilaiArray;
    }

    public function save($nilaiEvaluasiPembelajaran)
    {
        $checkStatementData=[
            'mahasiswaId' => $nilaiEvaluasiPembelajaran['mahasiswaId'],
            'kelasId' => $nilaiEvaluasiPembelajaran['kelasId']
        ];
        $statementData = [
            'mahasiswaId' => $nilaiEvaluasiPembelajaran['mahasiswaId'],
            'kelasId' => $nilaiEvaluasiPembelajaran['kelasId'],
            'nilai1' =>$nilaiEvaluasiPembelajaran['nilaiArray'][0],
            'nilai2' =>$nilaiEvaluasiPembelajaran['nilaiArray'][1],
            'nilai3' =>$nilaiEvaluasiPembelajaran['nilaiArray'][2],
            'nilai4' =>$nilaiEvaluasiPembelajaran['nilaiArray'][3],
            'nilai5' =>$nilaiEvaluasiPembelajaran['nilaiArray'][4],
            'nilai6' =>$nilaiEvaluasiPembelajaran['nilaiArray'][5],
            'nilai7' =>$nilaiEvaluasiPembelajaran['nilaiArray'][6],
            'nilai8' =>$nilaiEvaluasiPembelajaran['nilaiArray'][7],
            'nilaiAngka' => $nilaiEvaluasiPembelajaran['nilaiAngka'],
            'nilaiHuruf' => $nilaiEvaluasiPembelajaran['nilaiHuruf']
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