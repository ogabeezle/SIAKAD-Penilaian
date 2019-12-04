<?php
namespace Siakad\Penilaian\Infrastructure;

use Phalcon\Db\Column;
use Siakad\Penilaian\Domain\Model\Kelas;
use Siakad\Penilaian\Domain\Model\KelasRepository;
use Siakad\Penilaian\Domain\Model\Dosen;
use Siakad\Penilaian\Domain\Model\MataKuliah;
use Siakad\Penilaian\Domain\Model\Semester;


class SqlKelasRepository implements KelasRepository{

    private $connection;
    private $statement;
    private $statementTypes;

    const INDEX_KELAS_ID=0, INDEX_SEMESTER_ID=1, INDEX_MATAKULIAH_ID=2,
        INDEX_NAMA_KELAS=3, INDEX_TAHUN_AJARAN=5,INDEX_SEMESTER=6, INDEX_NAMA_MATAKULIAH=8,
        INDEX_KODE_MATA_KULIAH=9, INDEX_SKS_MATAKULIAH=10, INDEX_DOSEN_ID=11;

    public function __construct($di)
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
            ")
        );

        $this->statementTypes = [
            'all' => [],
            'byDosenAndSemester' =>[
                'dosenId' => Column::BIND_PARAM_STR,
                'semesterId' => Column::BIND_PARAM_STR
            ],
        ];
    }
    public function all()
    {
        // TODO: Implement all() method.
    }
    public function byDosenAndSemseter(Dosen $dosen, Semester $semester)
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