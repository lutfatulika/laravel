<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sparepart Detail</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
        }

        .table th,
        .table td {
            border: 1px solid #ddd;
            padding: 8px;
        }

        .table th {
            text-align: left;
        }

        .photo {
            text-align: center;
            margin-top: 10px;
        }

        .photo img {
            max-width: 150px;
            height: auto;
        }
    </style>
</head>

<body>
    <div class="header">
        <h1>Detail Alat Outdor</h1>
    </div>
    <table class="table">
        @if ($categories->photo)
            <div class="photo">
                <h3>Alat Outdoor</h3>
                <img src="{{ public_path('storage/' . $categories->photo) }}" alt="{{ $categories->name }}">
            </div>
        @endif

        <tr>
            <th>Kategori</th>
            <td>{{ $categories->categories }}</td>
        </tr>
        <tr>
            <th>Deskripsi</th>
            <td>{{ $categories->description }}</td>
        </tr>
        <tr>
            <th>Price</th>
            <td>{{ $categories->price }}</td>
        </tr>
    </table>
</body>

</html>