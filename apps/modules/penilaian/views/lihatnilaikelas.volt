<center>
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


<table width="95%">
    <tr>
        <td>Nama Penilaian</td>
        <td><center>{{ komponenpenilaian.namaEvaluasiArray[0] }}</center></td>
        <td><center>{{ komponenpenilaian.namaEvaluasiArray[1] }}</center></td>
        <td><center>{{ komponenpenilaian.namaEvaluasiArray[2] }}</center></td>
        <td><center>{{ komponenpenilaian.namaEvaluasiArray[3] }}</center></td>
        <td><center>{{ komponenpenilaian.namaEvaluasiArray[4] }}</center></td>
        <td><center>{{ komponenpenilaian.namaEvaluasiArray[5] }}</center></td>
        <td><center>{{ komponenpenilaian.namaEvaluasiArray[6] }}</center></td>
        <td><center>{{ komponenpenilaian.namaEvaluasiArray[7] }}</center></td>
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
    </tr>
</table>
<br/>
<table width="95%">
    <tr>
        <td><center>NRP</center></td>
        <td><center>Nama Mahasiswa</center></td>
        <td><center>{{ komponenpenilaian.namaEvaluasiArray[0] }}</center></td>
        <td><center>{{ komponenpenilaian.namaEvaluasiArray[1] }}</center></td>
        <td><center>{{ komponenpenilaian.namaEvaluasiArray[2] }}</center></td>
        <td><center>{{ komponenpenilaian.namaEvaluasiArray[3] }}</center></td>
        <td><center>{{ komponenpenilaian.namaEvaluasiArray[4] }}</center></td>
        <td><center>{{ komponenpenilaian.namaEvaluasiArray[5] }}</center></td>
        <td><center>{{ komponenpenilaian.namaEvaluasiArray[6] }}</center></td>
        <td><center>{{ komponenpenilaian.namaEvaluasiArray[7] }}</center></td>
        <td><center>Nilai Angka</center></td>
        <td><center>Nilai Huruf</center></td>
        <td><center>Aksi</center></td>
    </tr>
    {% for evaluasi in listevaluasi %}
    <tr>
        <form action="/lihatnilaikelas" method="post">
        <input type="hidden" name="kelasId" value="{{ parameter.kelasId }}">
        <input type="hidden" name="mahasiswaId" value="{{ evaluasi.mahasiswa.nrp }}">
        <input type="hidden" name="nilaiAngka" value="{{ evaluasi.nilaiAngka }}">
        <input type="hidden" name="nilaiHuruf" value="{{ evaluasi.nilaiHuruf }}">
        <td><center>{{ evaluasi.mahasiswa.nrp }}</center></td>
        <td><center>{{ evaluasi.mahasiswa.nama }}</center></td>
        <td><center><input type="text" name="nilaiArray[]" value="{{ evaluasi.nilaiArray[0] }}"></center></td>
        <td><center><input type="text" name="nilaiArray[]" value="{{ evaluasi.nilaiArray[1] }}"></center></td>
        <td><center><input type="text" name="nilaiArray[]" value="{{ evaluasi.nilaiArray[2] }}"></center></td>
        <td><center><input type="text" name="nilaiArray[]" value="{{ evaluasi.nilaiArray[3] }}"></center></td>
        <td><center><input type="text" name="nilaiArray[]" value="{{ evaluasi.nilaiArray[4] }}"></center></td>
        <td><center><input type="text" name="nilaiArray[]" value="{{ evaluasi.nilaiArray[5] }}"></center></td>
        <td><center><input type="text" name="nilaiArray[]" value="{{ evaluasi.nilaiArray[6] }}"></center></td>
        <td><center><input type="text" name="nilaiArray[]" value="{{ evaluasi.nilaiArray[7] }}"></center></td>
        <td><center>{{ evaluasi.nilaiAngka }}</center></td>
        <td><center>{{ evaluasi.nilaiHuruf }}</center></td>
        <td><center><button type="submit">Simpan</button></center></td>
        </form>
    </tr>
    {% endfor %}
</table>
</center>