<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SIAKAD Penilaian Navigation</title>
    <style>
        .bordered{
            border: 1px solid black;
            border-collapse: collapse;
            padding: 10px;
        }
    </style>
</head>
<body>
<h2>List of (View)Service</h2>
<table class="bordered">
    
    <tr class="bordered">
        <td class="bordered">List Kelas</td>
        <td class="bordered">
            <form action="/listkelas" method="get">
                <table>
                    <tr>
                        <td>ID Dosen</td>
                        <td><input type="text" name="dosenId"></td>
                    </tr>
                    <tr>
                        <td>Semester</td>
                        <td><input type="text" name="semester"></td>
                    </tr>
                    <tr>
                        <td><button type="submit">Submit</button></td>
                    </tr>
                </table>
            </form>
        </td>
    </tr>

    <tr class="bordered">
        <td class="bordered">Komponen Penilaian Kelas</td>
        <td class="bordered">
            <form action="/komponenpenilaiankelas" method="get">
                <table>
                    <tr>
                        <td>ID Dosen</td>
                        <td><input type="text" name="dosenId"></td>
                    </tr>
                    <tr>
                        <td>Semester</td>
                        <td><input type="text" name="semester"></td>
                    </tr>
                    <tr>
                        <td>Kode Matkul</td>
                        <td><input type="text" name="kodeMatkul"></td>
                    </tr>
                    <tr>
                        <td><button type="submit">Submit</button></td>
                    </tr>
                </table>
            </form>
        </td>
    </tr>

    <tr class="bordered">
        <td class="bordered">Lihat Nilai Kelas</td>
        <td class="bordered">
            <form action="/lihatnilaikelas" method="get">
                <table>
                    <tr>
                        <td>ID Dosen</td>
                        <td><input type="text" name="dosenId"></td>
                    </tr>
                    <tr>
                        <td>Semester</td>
                        <td><input type="text" name="semester"></td>
                    </tr>
                    <tr>
                        <td>Kode Matkul</td>
                        <td><input type="text" name="kodeMatkul"></td>
                    </tr>
                    <tr>
                        <td><button type="submit">Submit</button></td>
                    </tr>
                </table>
            </form>
        </td>
    </tr>

    <tr class="bordered">
        <td class="bordered">Lihat Transkrip Mahasiswa</td>
        <td class="bordered">
            <form action="/lihattranskripmahasiswa" method="get">
                <table>
                    <tr>
                        <td>ID Mahasiswa</td>
                        <td><input type="text" name="mahasiswaId"></td>
                    </tr>
                    <tr>
                        <td><button type="submit">Submit</button></td>
                    </tr>
                </table>
            </form>
        </td>
    </tr>

</table>

</body>
</html>