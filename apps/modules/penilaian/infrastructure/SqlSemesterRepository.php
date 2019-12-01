<?php

namespace Siakad\Scheduling\Infrastructure;

use Phalcon\Db\Column;
use Siakad\Scheduling\Domain\Model\Semester;
use Siakad\Scheduling\Domain\Model\SemesterRepository;

class SqlSemesterRepository implements SemesterRepository
{
    private $connection;
    private $statement;
    private $statementTypes;

    public function __construct($di)
    {
        $this->connection = $di->get('db');

        $this->statement = [
            'all' => $this->connection->prepare("
                SELECT * FROM `semester`;
            "),
        ];

        $this->statementTypes = [
            'all' => [],
        ];
    }

    public function all()
    {
        $result = $this->connection->executePrepared(
            $this->statement['all']
        );

        $semester = array();
        foreach ($result as $item) {
            array_push($semester, new Semester(
                $result[0],     // semester.id
                $result[1],     // semester.nama
                $result[2],     // semester.singkatan
                $result[3],     // semester.tahun_ajaran
                $result[4],     // semester.semester
                $result[5],     // semester.aktif
                $result[6],     // semester.tanggal_mulai
                $result[7]      // semester.tanggal_selesai
            ));
        }
        
        return $semester;
    }
}