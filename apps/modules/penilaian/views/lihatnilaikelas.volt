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
    #error-container{
        border: 1px solid red;
        background-color: rgb(251, 118, 140);
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
    <tr id="persentase">
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
<div id="error-container">
{% if isset(error) && error != NULL && error != "" %}
<strong>{{ error }}</strong>
{% endif %}
</div>
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
        <form action="/lihatnilaikelas" method="post">
        <input type="hidden" name="kelasId" value="{{ parameter.kelasId }}">
        <input type="hidden" name="mahasiswaId" value="{{ evaluasi.mahasiswa.nrp }}">
        <input type="hidden" name="nilaiAngka" value="{{ evaluasi.nilaiAngka }}">
        <input type="hidden" name="nilaiHuruf" value="{{ evaluasi.nilaiHuruf }}">
        <td><center>{{ evaluasi.mahasiswa.nrp }}</center></td>
        <td><center>{{ evaluasi.mahasiswa.nama }}</center></td>
        <td><center><input oninput="reSum(this)" style="width:64px;" type="text" name="nilaiArray[]" value="{{ evaluasi.nilaiArray[0] }}"></center></td>
        <td><center><input style="width:64px;" type="text" name="nilaiArray[]" value="{{ evaluasi.nilaiArray[1] }}"></center></td>
        <td><center><input style="width:64px;" type="text" name="nilaiArray[]" value="{{ evaluasi.nilaiArray[2] }}"></center></td>
        <td><center><input style="width:64px;" type="text" name="nilaiArray[]" value="{{ evaluasi.nilaiArray[3] }}"></center></td>
        <td><center><input style="width:64px;" type="text" name="nilaiArray[]" value="{{ evaluasi.nilaiArray[4] }}"></center></td>
        <td><center><input style="width:64px;" type="text" name="nilaiArray[]" value="{{ evaluasi.nilaiArray[5] }}"></center></td>
        <td><center><input style="width:64px;" type="text" name="nilaiArray[]" value="{{ evaluasi.nilaiArray[6] }}"></center></td>
        <td><center><input style="width:64px;" type="text" name="nilaiArray[]" value="{{ evaluasi.nilaiArray[7] }}"></center></td>
        <td style="width:64px;"><center><input style="width:64px;" type="text" name="nilaiAngka" value="{{ evaluasi.nilaiAngka }}" readonly></center></td>
        <td style="width:64px;" ><center>{{ evaluasi.nilaiHuruf }}</center></td>
        </form>
    </tr>
    {% endfor %}
</table>
</center>

<script>
    "use strict";

    function getPersentase(){
        var node = document.getElementById('persentase').children;
        var len = node.length;
        var ret = [];
        //console.log(node[1].childNodes[0].childNodes[0].wholeText);
        for(var i = 1; i < len; i+=1){
            ret.push(parseFloat( node[i].childNodes[0].childNodes[0].wholeText ))
        }
        return ret;
    }

    function reSum(node){
        var percentage = getPersentase();
        node = node.parentNode.parentNode.parentNode.children[0];
        var sum = 0, buf;
        var len = node.length;
        var sumNode = node[len-1];
        for(var i = 4; i < len-1; i+=1){
            //console.log(percentage[i-4]);
            //console.log(parseFloat(node[i].value) * percentage[i-4]);
            buf = parseFloat(node[i].value) * percentage[i-4];
            if(buf == "Nan"){
                sum = "Nan";
                break;
            }
            sum += buf;
        }
        sumNode.value = sum/100;
    }
</script>