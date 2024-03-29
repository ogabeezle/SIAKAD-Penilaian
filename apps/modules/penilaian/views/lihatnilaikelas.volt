<center>
<h1>Lihat nilai kelas dengan ID {{ kelasId }} </h1>
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

<table>
    <tr>
        <th width="150px">Nilai Huruf</th>
        <th>Nilai Angka</th>
        <th colspan="2">Rentang Nilai</th>
    </tr>
    {% for data in listskalanilai %}
    <tr>
            <td><center>{{ data.nilaiHuruf }}</center></td>
            <td><center>{{ data.nilaiNumerik }}</center></td>
            <td><center>{{ data.batasBawah }}</center></td>
            <td><center>{{ data.batasAtas }}</center></td>
    </tr>
    {% else %}
    <tr>
        <td colspan="4">No Data</td>
    </tr>
    {% endfor %}
</table>
<br/>

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
{{ flash.output() }}
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
        <form action="/ubahnilaikelas" method="post">
        <input type="hidden" name="kelasId" value="{{ kelasId }}">
        <input type="hidden" name="mahasiswaId" value="{{ evaluasi.mahasiswa.nrp }}">
        <input type="hidden" name="nilaiAngka" value="{{ evaluasi.nilaiAngka }}">
        <input type="hidden" name="nilaiHuruf" value="{{ evaluasi.nilaiHuruf }}">
        <td><center>{{ evaluasi.mahasiswa.nrp }}</center></td>
        <td><center>{{ evaluasi.mahasiswa.nama }}</center></td>
        <td><center><input oninput="reSum(this)" style="width:64px;" type="text" name="nilaiArray[]" value="{{ evaluasi.nilaiArray[0] }}"></center></td>
        <td><center><input oninput="reSum(this)" style="width:64px;" type="text" name="nilaiArray[]" value="{{ evaluasi.nilaiArray[1] }}"></center></td>
        <td><center><input oninput="reSum(this)" style="width:64px;" type="text" name="nilaiArray[]" value="{{ evaluasi.nilaiArray[2] }}"></center></td>
        <td><center><input oninput="reSum(this)" style="width:64px;" type="text" name="nilaiArray[]" value="{{ evaluasi.nilaiArray[3] }}"></center></td>
        <td><center><input oninput="reSum(this)" style="width:64px;" type="text" name="nilaiArray[]" value="{{ evaluasi.nilaiArray[4] }}"></center></td>
        <td><center><input oninput="reSum(this)" style="width:64px;" type="text" name="nilaiArray[]" value="{{ evaluasi.nilaiArray[5] }}"></center></td>
        <td><center><input oninput="reSum(this)" style="width:64px;" type="text" name="nilaiArray[]" value="{{ evaluasi.nilaiArray[6] }}"></center></td>
        <td><center><input oninput="reSum(this)" style="width:64px;" type="text" name="nilaiArray[]" value="{{ evaluasi.nilaiArray[7] }}"></center></td>
        <td style="width:64px;"><center><input style="width:64px;" type="text" name="nilaiAngka" value="{{ evaluasi.nilaiAngka }}" readonly></center></td>
        <td style="width:64px;" ><center><input style="width:64px;" type="text" name="nilaiHuruf" value="{{ evaluasi.nilaiHuruf }}" readonly></center></td>
        <td><center><button type="submit">Simpan</button></center></td>
        </form>
    </tr>
    {% else %}
    <tr>
        <td colspan="13">No Data</td>
    </tr>
    {% endfor %}
</table>
</center>

<script>
    "use strict";

    var skalaNilai = [];
    
    {% for data in listskalanilai %}
    skalaNilai.push( [
        parseFloat({{ data.batasBawah }}),
        parseFloat({{ data.batasAtas }}),
        parseFloat({{ data.nilaiNumerik }}),
        "{{ data.nilaiHuruf }}"
    ] );
    {% endfor %}

    function getPersentase(){
        var node = document.getElementById('persentase').children;
        var len = node.length;
        var ret = [];
        for(var i = 1; i < len; i+=1){
            ret.push(parseFloat( node[i].childNodes[0].childNodes[0].wholeText ))
        }
        return ret;
    }
    var percentage = getPersentase();
    function reSum(node){
        node = node.parentNode.parentNode.parentNode.children[0];
        var sum = 0, buf;
        var len = node.length;
        var sumNode = node[len-3];
        var nilaiHurufNode = node[len-2];
        for(var i = 4; i < len-3; i+=1){
            buf = parseFloat(node[i].value) * percentage[i-4];
            // console.log(node[i]);
            if(buf == "NaN"){
                sum = "NaN";
                break;
            }
            sum += buf;
        }
        if(sum != "NaN"){
            sumNode.value = Math.round(sum/100);
            nilaiHurufNode.value = reScale(sum/100)[0];
        } else {
            sumNode.value = "NaN";
            nilaiHurufNode.value = "";
        }
    }

    function reScale(sum){
        var len = skalaNilai.length;
        // 0 => nilai huruf; 1 => nilai numerik
        var ret = ["Undefined Nilai", 0];
        for (var i = 0; i < len; i+=1){
            if ( (sum >= skalaNilai[i][0]) && (sum <= skalaNilai[i][1]) ){
                ret[0] = skalaNilai[i][3];
                ret[1] = skalaNilai[i][2];
                return ret;
            }
        }
        return ret;
    }

</script>