<!DOCTYPE html>
<html>

<head>
    <style>
        #tabel {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #tabel td,
        #tabel th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #tabel tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #tabel tr:hover {
            background-color: #ddd;
        }

        #tabel th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #f1a000;
            color: white;
        }
    </style>
</head>

<body>

    <h3 align="center">Data Hasil Keputusan</h3>

    <table id="tabel" >
        <tr>
            <th class="col-1">No</th>
            <th class="col-1">Nama</th>
            <th class="col-2">NIM</th>
            <th class="col-2">Skor</th>
        </tr>
        <?php $i = 1; ?>
            <tr>
                <td class="col-1">{{ $i }}</td>
                <td class="col-1"> 2118060</td>
                <td class="col-2">Cornelia</td>
                <td class="col-2">1</td>
            </tr>
            <tr>
                <td class="col-1">{{ $i }}</td>
                <td class="col-1"> 2118061</td>
                <td class="col-2">Kevin</td>
                <td class="col-2">0.68</td>
            </tr>
    </table>

</body>

</html>