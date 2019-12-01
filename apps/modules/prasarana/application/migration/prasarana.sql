create table jenisprasarana(
    id int not null primary key,
    nama varchar(100)
);

create table prasarana(
    id int not null primary key,
    nama varchar(20),
    kode varchar(10),
    keterangan varchar(255),
    panjang decimal(10,2),
    lebar decimal(10,2),
    luas decimal(12,2),
    kapasitas int(4),
    kapasitas_ujian int(4),
    tahun_pengadaan int(4),
    status_keaktifan boolean
);