<h1>Komponen Kelas dengan ID {{parameter.kelasId}} </h1>
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
        <td>Aksi</td>
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
        <td><button type="submit">Simpan</button></td>
    </tr>
    </form>
</table>