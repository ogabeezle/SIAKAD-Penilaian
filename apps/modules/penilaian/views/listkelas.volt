<h1>List Kelas Dosen dengan ID {{ parameter.dosenId }} dan Semester {{ parameter.semester }} </h1>

<table>
    <th>
        <td>Kode Matkul</td>
        <td>Nama Matkul</td>
        <td>Aksi</td>
    </th>
    {% for kelas in listkelas %}
    <tr>
        <td>{{ kelas.kode_matakuliah }}</td>
        <td>{{ kelas.nama_matakuliah }}</td>
        <td><a href='/komponenpenilaiankelas?dosenId={{ kelas.dosenId }}&kodeKelas={{ kelas.kode_matkul }}'>Komponen Penilaian Kelas</a></td>
    </tr>
    {% endfor %}
</table>