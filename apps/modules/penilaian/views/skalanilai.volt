<center>
<h1>Skala Nilai</h1>
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

<form action="/ubahskalanilai" method="post">
<table>
    <tr>
        <th width="150px">Nilai Huruf</th>
        <th>Nilai Angka</th>
        <th colspan="2">Rentang Nilai</th>
    </tr>
    {% for data in listskalanilai %}
    <tr>
            <input type='hidden' value="{{data.id}}" name="id[]" readonly>
            <td><center><input type="number" name="nilaiHuruf" value="{{ data.nilaiHuruf }}" readonly></center></td>
            <td><center><input type="number" name="nilaiNumerik" value="{{ data.nilaiNumerik }}" readonly></center></td>
            <td><center><input type="number" name="batasBawah[]" min="0" max="100" value="{{ data.batasBawah }}"></center></td>
            <td><center><input type="number" name="batasAtas[]" min="0" max="100" value="{{ data.batasAtas }}"></center></td>
    </tr>
    {% else %}
    <tr>
        <td colspan="4">No Data</td>
    </tr>
    {% endfor %}
</table>
<br/>
<button type="submit">Simpan</button>
</form>
</center>