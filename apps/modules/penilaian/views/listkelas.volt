<center>
<h1>List Kelas Dosen dengan ID {{ parameter.dosenId }} dan Semester {{ parameter.semester }} </h1>
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
        <td><center>Kode Matkul</center></td>
        <td><center>Nama Matkul</center></td>
        <td><center>Kelas</center></td>
        <td><center>Semester</center></td>
        <td><center>Tahun Ajaran</center></td>
        <td><center>SKS</center></td>
        <td><center>Aksi</center></td>
    </tr>
    {% for kelas in listkelas %}
    <tr>
        <td><center>{{ kelas.mataKuliah.kodeMatkul }}</center></td>
        <td>{{ kelas.mataKuliah.nama }}</td>
        <td><center>{{ kelas.nama }}</center></td>
        <td><center>{{ kelas.semester.semester }}</center></td>
        <td><center>{{ kelas.semester.tahunAjaran }}</center></td>
        <td><center>{{ kelas.mataKuliah.SKS }}</center></td>
        <td><center>
            <form action="/komponenpenilaiankelas" method="get">
                <input value="<?php echo $kelas->id; ?>" type="hidden" name="kelasId">
                <button type="submit">Komponen Penilaian Kelas</button>
            </form>
        </center></td>
    </tr>
    {% endfor %}
</table>
</center>