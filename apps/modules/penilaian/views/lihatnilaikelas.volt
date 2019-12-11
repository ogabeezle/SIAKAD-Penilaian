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
        <th>Nama Penilaian</th>
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
        <th>Persentase Nilai</th>
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
        <th><center>NRP</center></th>
        <th><center>Nama Mahasiswa</center></th>
        <th><center>{{ komponenpenilaian.namaEvaluasiArray[0] }}</center></th>
        <th><center>{{ komponenpenilaian.namaEvaluasiArray[1] }}</center></th>
        <th><center>{{ komponenpenilaian.namaEvaluasiArray[2] }}</center></th>
        <th><center>{{ komponenpenilaian.namaEvaluasiArray[3] }}</center></th>
        <th><center>{{ komponenpenilaian.namaEvaluasiArray[4] }}</center></th>
        <th><center>{{ komponenpenilaian.namaEvaluasiArray[5] }}</center></th>
        <th><center>{{ komponenpenilaian.namaEvaluasiArray[6] }}</center></th>
        <th><center>{{ komponenpenilaian.namaEvaluasiArray[7] }}</center></th>
        <th><center>Nilai Angka</center></th>
        <th><center>Nilai Huruf</center></th>
        <th><center>Aksi</center></th>
    </tr>
    {% for evaluasi in listevaluasi %}
    <tr>
        <form oninput="reSum(this)" action="/lihatnilaikelas" method="post">
        <input type="hidden" name="kelasId" value="{{ parameter.kelasId }}">
        <input type="hidden" name="mahasiswaId" value="{{ evaluasi.mahasiswa.nrp }}">
        <input type="hidden" name="nilaiAngka" value="{{ evaluasi.nilaiAngka }}">
        <input type="hidden" name="nilaiHuruf" value="{{ evaluasi.nilaiHuruf }}">
        <td><center>{{ evaluasi.mahasiswa.nrp }}</center></td>
        <td><center>{{ evaluasi.mahasiswa.nama }}</center></td>
        <td><center><input style="width:64px;" type="text" name="nilaiArray[]" value="{{ evaluasi.nilaiArray[0] }}"></center></td>
        <td><center><input style="width:64px;" type="text" name="nilaiArray[]" value="{{ evaluasi.nilaiArray[1] }}"></center></td>
        <td><center><input style="width:64px;" type="text" name="nilaiArray[]" value="{{ evaluasi.nilaiArray[2] }}"></center></td>
        <td><center><input style="width:64px;" type="text" name="nilaiArray[]" value="{{ evaluasi.nilaiArray[3] }}"></center></td>
        <td><center><input style="width:64px;" type="text" name="nilaiArray[]" value="{{ evaluasi.nilaiArray[4] }}"></center></td>
        <td><center><input style="width:64px;" type="text" name="nilaiArray[]" value="{{ evaluasi.nilaiArray[5] }}"></center></td>
        <td><center><input style="width:64px;" type="text" name="nilaiArray[]" value="{{ evaluasi.nilaiArray[6] }}"></center></td>
        <td><center><input style="width:64px;" type="text" name="nilaiArray[]" value="{{ evaluasi.nilaiArray[7] }}"></center></td>
        <td style="width:64px;"><center><input style="width:64px;" type="text" name="nilaiAngka" value="{{ evaluasi.nilaiAngka }}" readonly></center></td>
        <td style="width:64px;" ><center>{{ evaluasi.nilaiHuruf }}</center></td>
        <td><center><button type="submit">Simpan</button></center></td>
        </form>
    </tr>
    {% endfor %}
</table>
</center>

<script>
    "use strict";
    function reSum(node){
        console.log("test");
        var sum = 0, buf;
        var len = node.children.length;
        var sumNode = node.children[len-1];
        for(var i = 0; i < len-1; i+=1){
            buf = parseFloat(node.children[i].value);
            if(buf == "Nan"){
                sum = "Nan";
                break;
            }
            sum += buf;
        }
        sumNode.value = sum;
        console.log(sum);
    }
</script>