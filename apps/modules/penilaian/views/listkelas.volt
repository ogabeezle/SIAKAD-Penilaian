<h1>List Kelas Dosen dengan ID {{ parameter.dosenId }} dan Semester {{ parameter.semester }} </h1>
<style>
    table, th, tr, td{
        border: 1px solid black;
        border-collapse: collapse;
    }
</style>
<table>
    <th>
        <td>Kode Matkul</td>
        <td>Nama Matkul</td>
        <td>Kelas</td>
        <td>Semester</td>
        <td>Tahun Ajaran</td>
        <td>SKS</td>
        <td>Aksi</td>
    </th>
    {% for kelas in listkelas %}
    <tr>
        <td>{{ kelas.mataKuliah.kodeMatkul }}</td>
        <td>{{ kelas.mataKuliah.nama }}</td>
        <td>{{ kelas.nama }}</td>
        <td>{{ kelas.semester.semester }}</td>
        <td>{{ kelas.semester.tahunAjaran }}</td>
        <td>{{ kelas.mataKuliah.SKS }}</td>
        <td><a href='/komponenpenilaiankelas?dosenId='>Komponen Penilaian Kelas</a></td>
    </tr>
    {% endfor %}
</table>