<center>
<h1>Komponen Kelas dengan ID {{parameter.kelasId}} </h1>
<style>
        table, th, tr, td{
            border: 1px solid black;
            border-collapse: collapse;
        }
    
        form{
            vertical-align: middle;
            margin: 10px;
        }
        input{
            min-height: 40px;
        }
    </style>

<form action="/penilaian/komponenpenilaiankelas" method="post">
<input type="text" name="kelasId" value="{{ parameter.kelasId }}">
<input type="text" name="dosenId" value="{{ komponenpenilaian.dosenId }}">
<table>
    <tr>
        <th width="150px">Nama Evaluasi</th>
        <th>Persentase Nilai</th>
    </tr>
    <tr>
            <td><center><input type="text" name="namaEvaluasiArray[]" value="{{ komponenpenilaian.namaEvaluasiArray[0] }}"></center></td>
            <td><center><input type="number" name="bobotEvaluasiArray[]" min="0" max="100" value="{{ komponenpenilaian.bobotEvaluasiArray[0] }}"></center></td>
           
    </tr>
    <tr>
            <td><center><input type="text" name="namaEvaluasiArray[]" value="{{ komponenpenilaian.namaEvaluasiArray[1] }}"></center></td>
            <td><center><input type="number" name="bobotEvaluasiArray[]" min="0" max="100" value="{{ komponenpenilaian.bobotEvaluasiArray[1] }}"></center></td>
          
    </tr>
    <tr>
            <td><center><input type="text" name="namaEvaluasiArray[]" value="{{ komponenpenilaian.namaEvaluasiArray[2] }}"></center></td>
            <td><center><input type="number" name="bobotEvaluasiArray[]" min="0" max="100" value="{{ komponenpenilaian.bobotEvaluasiArray[2] }}"></center></td>
           
    </tr>
    <tr>
            <td><center><input type="text" name="namaEvaluasiArray[]" value="{{ komponenpenilaian.namaEvaluasiArray[3] }}"></center></td>
            <td><center><input type="number" name="bobotEvaluasiArray[]" min="0" max="100" value="{{ komponenpenilaian.bobotEvaluasiArray[3] }}"></center></td>
            
    </tr>
    <tr>
            <td><center><input type="text" name="namaEvaluasiArray[]" value="{{ komponenpenilaian.namaEvaluasiArray[4] }}"></center></td>
            <td><center><input type="number" name="bobotEvaluasiArray[]" min="0" max="100" value="{{ komponenpenilaian.bobotEvaluasiArray[4] }}"></center></td>
            
    </tr>
    <tr>
            <td><center><input type="text" name="namaEvaluasiArray[]" value="{{ komponenpenilaian.namaEvaluasiArray[5] }}"></center></td>
            <td><center><input type="number" name="bobotEvaluasiArray[]" min="0" max="100" value="{{ komponenpenilaian.bobotEvaluasiArray[5] }}"></center></td>
           
    </tr>
    <tr>
            <td><center><input type="text" name="namaEvaluasiArray[]" value="{{ komponenpenilaian.namaEvaluasiArray[6] }}"></center></td>
            <td><center><input type="number" name="bobotEvaluasiArray[]" min="0" max="100" value="{{ komponenpenilaian.bobotEvaluasiArray[6] }}"></center></td>
           
    </tr>
    <tr>
            <td><center><input type="text" name="namaEvaluasiArray[]" value="{{ komponenpenilaian.namaEvaluasiArray[7] }}"></center></td>
            <td><center><input type="number" name="bobotEvaluasiArray[]" min="0" max="100" value="{{ komponenpenilaian.bobotEvaluasiArray[7] }}"></center></td>
    </tr>
    <tr>
            <td><center><input type="text" value="isFixed"></center></td>
            <td><center><input type="boolean" name="isFixed" value="{{ komponenpenilaian.isFixed }}"></center></td>
    </tr>
    
</table>
<br/>
<button type="submit">Simpan</button>
</form>
</form>
</center>