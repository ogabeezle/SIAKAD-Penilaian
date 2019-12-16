<?php

namespace Siakad\Penilaian\Infrastructure;

use Phalcon\Db\Column;
use Phalcon\Di;
use Siakad\Penilaian\Domain\Model\Nilai;
use Siakad\Penilaian\Domain\Model\NilaiRepository;

class SqlNilaiRepository implements NilaiRepository
{
    private $connection;
    private $statement;
    private $statementTypes;

    const INDEX_ID=0,INDEX_NILAI_NUEMRIK=1, INDEX_NILAI_HURUF=2,INDEX_BATAS_ATAS=3, INDEX_BATAS_BAWAH=4;
    public function __construct(Di $di)
    {
        $this->connection = $di->get('db');
        $this->statement = array(
            'save' => $this->connection->prepare("
                INSERT INTO `nilai`(`id`, `batas_atas`, `batas_bawah`) 
                VALUES (:id,:batasAtas,:batasBawah)
                
            "),
            'update' => $this->connection->prepare("
                UPDATE `nilai` 
                SET `batas_atas`=:batasAtas,
                  `batas_bawah`=:batasBawah 
                WHERE `nilai`.`id`=:id
            "),
            'all' => $this->connection->prepare("
                select * from `nilai` 
            "),
            'check' => $this->connection->prepare("
                select * from `nilai` 
                where `nilai`.`id`=:id
            ")
        );

        $this->statementTypes = [
            'save' => [
                'id' => Column::BIND_PARAM_STR,
                'batasAtas' => Column::BIND_PARAM_DECIMAL,
                'batasBawah' => Column::BIND_PARAM_DECIMAL
            ],
            'update' => [
                'id' => Column::BIND_PARAM_STR,
                'batasAtas' => Column::BIND_PARAM_DECIMAL,
                'batasBawah' => Column::BIND_PARAM_DECIMAL
            ],
            'all' => [],
            'check' => [
                'id' => Column::BIND_PARAM_STR
            ]
        ];
    }

    public function all()
    {
        $result = $this->connection->executePrepared(
            $this->statement['all'],
            [],
            $this->statementTypes['all']
        );
        $nilaiArray = array();
        foreach ($result as $item){
            array_push($nilaiArray, new Nilai(
                $item[self::INDEX_ID],
                $item[self::INDEX_NILAI_NUEMRIK],
                $item[self::INDEX_NILAI_HURUF],
                $item[self::INDEX_BATAS_ATAS],
                $item[self::INDEX_BATAS_BAWAH]

            ));
        }
        return $nilaiArray;
    }

    public function save($nilai)
    {
        var_dump($nilai);
//        die(0);
        $checkStatementData = [
            'id' => $nilai['id']
        ];
        $statementData = [
            'id' => $nilai['id'],
            'batasAtas' => $nilai['batasAtas'],
            'batasBawah' => $nilai['batasBawah']
        ];
        $result = $this->connection->executePrepared(
            $this->statement['check'],
            $checkStatementData,
            $this->statementTypes['check']
        );

        $count = 0;
        foreach ($result as $item) {
            $count++;
        }
        if ($count > 0) {
            $result = $this->connection->executePrepared(
                $this->statement['update'],
                $statementData,
                $this->statementTypes['update']
            );
        } else {
            $result = $this->connection->executePrepared(
                $this->statement['save'],
                $statementData,
                $this->statementTypes['save']
            );
        }
    }
}