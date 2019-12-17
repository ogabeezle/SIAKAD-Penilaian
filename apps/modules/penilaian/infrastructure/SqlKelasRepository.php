<?php
namespace Siakad\Penilaian\Infrastructure;

use Phalcon\Db\Column;
use Phalcon\Di;
use Siakad\Penilaian\Domain\Model\EvaluasiPembelajaran;
use Siakad\Penilaian\Domain\Model\Kelas;
use Siakad\Penilaian\Domain\Model\KelasRepository;
use Siakad\Penilaian\Domain\Model\Dosen;
use Siakad\Penilaian\Domain\Model\Mahasiswa;
use Siakad\Penilaian\Domain\Model\MataKuliah;
use Siakad\Penilaian\Domain\Model\NilaiEvaluasiPembelajaran;
use Siakad\Penilaian\Domain\Model\Semester;


class SqlKelasRepository implements KelasRepository{

    private $connection;
    private $statement;
    private $statementTypes;

    const INDEX_KELAS_ID=0, INDEX_SEMESTER_ID=1, INDEX_MATAKULIAH_ID=2,
        INDEX_NAMA_KELAS=3, INDEX_TAHUN_AJARAN=5,INDEX_SEMESTER=6, INDEX_NAMA_MATAKULIAH=8,
        INDEX_KODE_MATA_KULIAH=9, INDEX_SKS_MATAKULIAH=10, INDEX_DOSEN_ID=12,
        INDEX_MAHASISWA_ID=11, INDEX_NILAI_1=13, INDEX_NILAI_2=14, INDEX_NILAI_3=15,
        INDEX_NILAI_4=16, INDEX_NILAI_5=17, INDEX_NILAI_6=18, INDEX_NILAI_7=19,
        INDEX_NILAI_8=20,INDEX_NILAI_ANGKA=21, INDEX_NILAI_HURUF=22,
        INDEX_NAMA_MAHASISWA=24, INDEX_JUMLAH_PENILAIAN=13, INDEX_NAMA_EVALUASI_1=14,
        INDEX_BOBOT_1=15, INDEX_NAMA_EVALUASI_2=16, INDEX_BOBOT_2=17, INDEX_NAMA_EVALUASI_3=18,
        INDEX_BOBOT_3=19, INDEX_NAMA_EVALUASI_4=20, INDEX_BOBOT_4=21, INDEX_NAMA_EVALUASI_5=22,
        INDEX_BOBOT_5=23, INDEX_NAMA_EVALUASI_6=24, INDEX_BOBOT_6=25, INDEX_NAMA_EVALUASI_7=26,
        INDEX_BOBOT_7=27, INDEX_NAMA_EVALUASI_8=28, INDEX_BOBOT_8=29, INDEX_ISFIXED=30,
        INDEX_NAME_DOSEN=32;

    public function __construct(Di $di)
    {
        $this->connection = $di->get('db');

        $this->statement = array(
            'all' => $this->connection->prepare("
                SELECT * FROM `kelas` 
                    inner join `semester` on `kelas`.`semester_id` = `semester`.`id` 
                    inner join `mata_kuliah` on `kelas`.`mata_kuliah_id` = `mata_kuliah`.`id`
                    inner join `aktivitas_mengajar` on `kelas`.`id` = `aktivitas_mengajar`.`kelas_id`;
            "),
            'byDosenAndSemester' =>$this->connection->prepare("
                SELECT * FROM `kelas` 
                    inner join `semester` on `kelas`.`semester_id` = `semester`.`id` 
                    inner join `mata_kuliah` on `kelas`.`mata_kuliah_id` = `mata_kuliah`.`id` 
                    inner join `aktivitas_mengajar` on `kelas`.`id` = `aktivitas_mengajar`.`kelas_id`
                where `aktivitas_mengajar`.`dosen_id` = :dosenId 
                  and `kelas`.`semester_id` = :semesterId
            "),
            'getNilai' => $this->connection->prepare("
                Select * from `kelas` 
                    inner join `semester` on `kelas`.`semester_id` = `semester`.`id` 
                    inner join `mata_kuliah` on `kelas`.`mata_kuliah_id` = `mata_kuliah`.`id` 
                    inner join `nilai_evaluasi_pembelajaran` 
                        on `kelas`.`id` = `nilai_evaluasi_pembelajaran`.`kelas_id` 
                    inner join `mahasiswa` 
                        on `mahasiswa`.`nrp` = `nilai_evaluasi_pembelajaran`.`mahasiswa_id`
                where `kelas`.`id`=:kelasId
            "),
            'getKomponen' => $this->connection->prepare("
                Select * from `kelas` 
                    inner join `semester` on `kelas`.`semester_id` = `semester`.`id` 
                    inner join `mata_kuliah` on `kelas`.`mata_kuliah_id` = `mata_kuliah`.`id` 
                    inner join `evaluasi_pembelajaran` 
                        on `evaluasi_pembelajaran`.`kelas_id` = `kelas`.`id` 
                    inner join `dosen` on `dosen`.`id` = `evaluasi_pembelajaran`.`dosen_id`
                where `kelas`.`id` = :kelasId
            ")
        );

        $this->statementTypes = [
            'all' => [],
            'byDosenAndSemester' =>[
                'dosenId' => Column::BIND_PARAM_STR,
                'semesterId' => Column::BIND_PARAM_STR
            ],
            'getNilai' => [
                'kelasId' => Column::BIND_PARAM_STR
            ],
            'getKomponen' => [
                'kelasId' => Column::BIND_PARAM_STR
            ]
        ];
    }

    public function getKomponen(Kelas $kelas)
    {
        $statementData = [
            'kelasId' => $kelas->getId()
        ];
        $result = $this->connection->executePrepared(
            $this->statement['getKomponen'],
            $statementData,
            $this->statementTypes['getKomponen']
        );
        $komponenArray = array();
        foreach ($result as $item){
            array_push($komponenArray, new EvaluasiPembelajaran(
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
                new Dosen(
                    $item[self::INDEX_DOSEN_ID],
                    $item[self::INDEX_NAME_DOSEN]
                ),
                $item[self::INDEX_JUMLAH_PENILAIAN],
                array(
                    $item[self::INDEX_NAMA_EVALUASI_1],
                    $item[self::INDEX_NAMA_EVALUASI_2],
                    $item[self::INDEX_NAMA_EVALUASI_3],
                    $item[self::INDEX_NAMA_EVALUASI_4],
                    $item[self::INDEX_NAMA_EVALUASI_5],
                    $item[self::INDEX_NAMA_EVALUASI_6],
                    $item[self::INDEX_NAMA_EVALUASI_7],
                    $item[self::INDEX_NAMA_EVALUASI_8]
                ),
                array(
                    $item[self::INDEX_BOBOT_1],
                    $item[self::INDEX_BOBOT_2],
                    $item[self::INDEX_BOBOT_3],
                    $item[self::INDEX_BOBOT_4],
                    $item[self::INDEX_BOBOT_5],
                    $item[self::INDEX_BOBOT_6],
                    $item[self::INDEX_BOBOT_7],
                    $item[self::INDEX_BOBOT_8]
                ),
                $item[self::INDEX_ISFIXED]
            ));
        }
        return $komponenArray;
    }

    public function getNilai(Kelas $kelas){
        $statementData = [
            'kelasId' => $kelas->getId()
        ];
        $result = $this->connection->executePrepared(
            $this->statement['getNilai'],
            $statementData,
            $this->statementTypes['getNilai']
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
    public function byDosenAndSemseter(Dosen $dosen,Semester $semester)
    {
        $statementData = [
            'dosenId' => $dosen->getId(),
            'semesterId' => $semester->getId()
        ];
        $result = $this->connection->executePrepared(
            $this->statement['byDosenAndSemester'],
            $statementData,
            $this->statementTypes['byDosenAndSemester']
        );
        $kelasArray = array();
        foreach ($result as $item){
            array_push($kelasArray,new Kelas(
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
            ));
        }
        return $kelasArray;
    }
}