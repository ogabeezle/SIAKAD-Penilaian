<?php

namespace Siakad\Scheduling\Infrastructure;

use Phalcon\Db\Column;
use Siakad\Scheduling\Domain\Model\PeriodeKuliah;
use Siakad\Scheduling\Domain\Model\PeriodeKuliahRepository;

class SqlPeriodeKuliahRepository implements PeriodeKuliahRepository
{
    private $connection;
    private $statement;
    private $statementTypes;

    public function __construct($di)
    {
        $this->connection = $di->get('db');

        $this->statement = [
            'all' => $this->connection->prepare("
                SELECT * FROM `periode_kuliah`;
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

        $periodeKuliah = array();
        foreach ($result as $item) {
            array_push($periodeKuliah, new PeriodeKuliah(
                $result[0],     // periode_kuliah.id
                $result[1],     // periode_kuliah.mulai
                $result[2]      // periode_kuliah.selesai
            ));
        }
        
        return $periodeKuliah;
    }
}