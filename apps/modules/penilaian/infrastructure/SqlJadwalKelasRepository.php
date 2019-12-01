<?php

namespace Siakad\Scheduling\Infrastructure;

use Phalcon\Db\Column;
use Siakad\Scheduling\Domain\Model\JadwalKelas;
use Siakad\Scheduling\Domain\Model\JadwalKelasRepository;
use Siakad\Scheduling\Domain\Model\Kelas;
use Siakad\Scheduling\Domain\Model\MataKuliah;
use Siakad\Scheduling\Domain\Model\PeriodeKuliah;
use Siakad\Scheduling\Domain\Model\Prasarana;
use Siakad\Scheduling\Domain\Model\Semester;

class SqlJadwalKelasRepository implements JadwalKelasRepository
{
    private $connection;
    private $statement;
    private $statementTypes;

    public function __construct($di)
    {
        $this->connection = $di->get('db');

        $this->statement = [
            'find_by_periode_kuliah' => $this->connection->prepare("
                SELECT *
                FROM `jadwal_kelas` INNER JOIN `kelas` ON `jadwal_kelas`.`id_kelas` = `kelas`.`id`
                                    INNER JOIN `periode_kuliah` ON `jadwal_kelas`.`id_periode_kuliah` = `periode_kuliah`.`id`
                                    INNER JOIN `semester` ON `semester`.`id` = `kelas`.`id_semester`
                                    INNER JOIN `mata_kuliah` ON `mata_kuliah`.`id` = `kelas`.`id_mata_kuliah`
                                    INNER JOIN `prasarana` ON `prasarana`.`id` = `jadwal_kelas`.`id_prasarana`
                WHERE `semester`.`semester` = :semester AND `semester`.`tahun_ajaran` = :tahunAjaran;
            "),
        ];

        $this->statementTypes = [
            'find_by_periode_kuliah' => [
                'semester' => Column::BIND_PARAM_INT,
                'tahunAjaran' => Column::BIND_PARAM_INT,
            ]
        ];

    }

    public function byPeriodeKuliah($tipe, $tahun)
    {
        $statementData = [
            'semester' => $tipe,
            'tahunAjaran' => $tahun 
        ];

        $result = $this->connection->executePrepared(
            $this->statement['find_by_periode_kuliah'],
            $statementData,
            $this->statementTypes['find_by_periode_kuliah']
        );

        $jadwalKelas = array();
        foreach ($result as $item) {
            array_push($jadwalKelas, new JadwalKelas(
                $result[0],             // jadwal_kelas.id
                new Kelas(              // jadwal_kelas.id_kelas
                    $result[5],         // kelas.id
                    new Semester(       // kelas.id_semester
                        $result[20],    // semezter.id
                        $result[21],    // semester.nama
                        $result[22],    // semester.singkatan
                        $result[23],    // semester.tahun_ajaran
                        $result[24],    // semester.semester
                        $result[25],    // semester.aktif
                        $result[26],    // semester.tanggal_mulai
                        $result[27]     // semester.tanggal_selesai
                    ),
                    new MataKuliah(     // kelas.id_mata_kuliah
                        $result[28],    // mata_kuliah.id
                        $result[29],    // mata_kuliah.kode_mata_kuliah
                        $result[30],    // mata_kuliah.nama
                        $result[31],    // mata_kuliah.nama_inggris
                        $result[32],    // mata_kuliah.sks
                        $result[33]     // mata_kuliah.deskripsi
                    ),
                    $result[8],         // kelas.nama
                    $result[9],         // kelas.nama_inggris
                    $result[10],        // kelas.daya_tampung
                    $result[11],        // kelas.jumlah_terisi
                    $result[12],        // kelas.sks_kelas
                    $result[13],        // kelas.rencana_tatap_muka
                    $result[15],        // kelas.kelas_jarak_jauh
                    $result[16]         // kelas.validasi_tatap_muka
                ),
                new PeriodeKuliah(      // jadwal_kelas.id_periode_kuliah
                    $result[17],        // periode_kuliah.id
                    $result[18],        // periode_kuliah.mulai
                    $result[19]         // periode_kuliah.selesai
                ),
                new Prasarana(          // jadwal_kelas.id_prasarana
                    $result[34],        // prasarana.id
                    $result[35]         // prasarana.nama
                ),
                $result[4]              // jadwal_kelas.hari
            ));
        }

        return $jadwalKelas;
    }
}