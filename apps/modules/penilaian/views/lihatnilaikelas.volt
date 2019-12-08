<h1>Lihat nilai kelas dengan ID {{ parameter.kelasId }} </h1>
<style>
    table, th, tr, td{
        border: 1px solid black;
        border-collapse: collapse;
    }

    form{
        vertical-align: middle;
        margin: 10px;
    }
</style>
<center>

<table width="95%">
    <form action="/ubahkomponenpenilaiankelas" method="post"></form>
    <tr>
        <td></td>
        <td><center>{{ komponenpenilaian.namaEvaluasiArray[0] }}</center></td>
        <td><center>{{ komponenpenilaian.namaEvaluasiArray[1] }}</center></td>
        <td><center>{{ komponenpenilaian.namaEvaluasiArray[2] }}</center></td>
        <td><center>{{ komponenpenilaian.namaEvaluasiArray[3] }}</center></td>
        <td><center>{{ komponenpenilaian.namaEvaluasiArray[4] }}</center></td>
        <td><center>{{ komponenpenilaian.namaEvaluasiArray[5] }}</center></td>
        <td><center>{{ komponenpenilaian.namaEvaluasiArray[6] }}</center></td>
        <td><center>{{ komponenpenilaian.namaEvaluasiArray[7] }}</center></td>
        <td><center>Aksi</center></td>
    </tr>
    <tr>
        <td>Persentase Nilai</td>
        <td><center>{{ komponenpenilaian.bobotEvaluasiArray[0] }}</center></td>
        <td><center>{{ komponenpenilaian.bobotEvaluasiArray[1] }}</center></td>
        <td><center>{{ komponenpenilaian.bobotEvaluasiArray[2] }}</center></td>
        <td><center>{{ komponenpenilaian.bobotEvaluasiArray[3] }}</center></td>
        <td><center>{{ komponenpenilaian.bobotEvaluasiArray[4] }}</center></td>
        <td><center>{{ komponenpenilaian.bobotEvaluasiArray[5] }}</center></td>
        <td><center>{{ komponenpenilaian.bobotEvaluasiArray[6] }}</center></td>
        <td><center>{{ komponenpenilaian.bobotEvaluasiArray[7] }}</center></td>
        <td><center><button type="submit">Simpan</button></center></td>
    </tr>
    </form>
</table>

<table width="95%">
    <tr>
        <td><center>NRP</center></td>
        <td><center>Nama Mahasiswa</center></td>
        <td><center>Nilai 1</center></td>
        <td><center>Nilai 2</center></td>
        <td><center>Nilai 3</center></td>
        <td><center>Nilai 4</center></td>
        <td><center>Nilai 5</center></td>
        <td><center>Nilai 6</center></td>
        <td><center>Nilai 7</center></td>
        <td><center>Nilai 8</center></td>
        <td><center>Nilai Angka</center></td>
        <td><center>Nilai Huruf</center></td>
        <td><center>Aksi</center></td>
    </tr>
    {% for mhs in listmhs %}
    <tr>
        <form action="/lihatnilaikelas" method="post">
        <td><center>{{ mhs.mahasiswa.nrp }}</center></td>
        <td><center>{{ mhs.mahasiswa.nama }}</center></td>
        <td><center><input type="text" name="nilaiArray[]" value="<?php //echo mhs->nilaiArray[0]; ?>"></center></td>
        <td><center><input type="text" name="nilaiArray[]" value="<?php //echo mhs->nilaiArray[1]; ?>"></center></td>
        <td><center><input type="text" name="nilaiArray[]" value="<?php //echo mhs->nilaiArray[2]; ?>"></center></td>
        <td><center><input type="text" name="nilaiArray[]" value="<?php //echo mhs->nilaiArray[3]; ?>"></center></td>
        <td><center><input type="text" name="nilaiArray[]" value="<?php //echo mhs->nilaiArray[4]; ?>"></center></td>
        <td><center><input type="text" name="nilaiArray[]" value="<?php //echo mhs->nilaiArray[5]; ?>"></center></td>
        <td><center><input type="text" name="nilaiArray[]" value="<?php //echo mhs->nilaiArray[6]; ?>"></center></td>
        <td><center><input type="text" name="nilaiArray[]" value="<?php //echo mhs->nilaiArray[7]; ?>"></center></td>
        <td><center>{{ mhs.nilaiAngka }}</center></td>
        <td><center>{{ mhs.nilaiHuruf }}</center></td>
        <td><center><button type="submit">Simpan</button></center></td>
        </form>
    </tr>
    {% endfor %}
</table>
</center>