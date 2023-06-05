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

    <h3 align="center">Data Asisten Laboratorium</h3>

    <table id="tabel">
        <tr>
            <th class="col-1">No</th>
            <th class="col-2">NIM</th>
            <th class="col-2">Nama</th>
            <th class="col-2">Jenis Kelamin</th>
            <th class="col-2">IPK</th>
        </tr>
        <?php $i = 1; ?>
        @foreach ($data as $item)
            <tr>
                <td class="col-1">{{ $i }}</td>
                <td class="col-2">{{ $item->nim }}</td>
                <td class="col-2">{{ $item->nama }}</td>
                <td class="col-2">{{ $item->jenis_kelamin }}</td>
                <td class="col-2">{{ $item->ipk }}</td>
            </tr>
        <?php $i++; ?>
        @endforeach
    </table>

</body>

</html>