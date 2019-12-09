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
    </style>

<form action="/skalanilai" method="post">
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
            <td><center><input type="number" name="batasBawah[]" min="0" max="100" value="{{ data.batasBawah }}"></center></td>
            <td><center><input type="number" name="batasAtas[]" min="0" max="100" value="{{ data.batasAtas }}"></center></td>
    </tr>
    {% endfor %}
</table>
<br/>
<button type="submit">Simpan</button>
</form>
</center>