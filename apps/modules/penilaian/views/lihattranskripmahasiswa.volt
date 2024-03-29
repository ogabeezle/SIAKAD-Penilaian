<center>
<h1>lihat transkrip mahasiswa dengan ID {{ mahasiswaId }} </h1>
<style>
    table, th, tr, td{
        border: 1px solid black;
        border-collapse: collapse;
    }

    form{
        vertical-align: middle;
        margin: 10px;
    }
    .errorMessage{
        border: 1px solid red;
        background-color: rgb(251, 118, 140);
        width: 20vw;
    }
    .successMessage{
        border: 1px solid green;
        background-color: rgb(123, 255, 123);
        width: 20vw;
    }
</style>

{{ flash.output() }}

Nama: <?php echo reset($nilaitranskrip)->mahasiswa->nama; ?> <br/>
NRP: <?php echo reset($nilaitranskrip)->mahasiswa->nrp; ?><br/><br/>

<table width="95%">
    <tr>
        <td><center>Kode Matkul</center></td>
        <td><center>Nama Matkul</center></td>
        <td><center>Kelas</center></td>
        <td><center>SKS</center></td>
        <td><center>Nilai Angka</center></td>
        <td><center>Nilai Huruf</center></td>
    </tr>
    {% for nilai in nilaitranskrip %}
    <tr>
        <td><center>{{ nilai.kelas.mataKuliah.kodeMatkul }}</center></td>
        <td><center>{{ nilai.kelas.mataKuliah.nama }}</center></td>
        <td><center>{{ nilai.kelas.nama }}</center></td>
        <td><center>{{ nilai.kelas.mataKuliah.SKS }}</center></td>
        <td><center>{{ nilai.nilaiAngka }}</center></td>
        <td><center>{{ nilai.nilaiHuruf }}</center></td>
    </tr>
    {% else %}
    <tr>
        <td colspan="6">No Data</td>
    </tr>
    {% endfor %}
</table>
</center>