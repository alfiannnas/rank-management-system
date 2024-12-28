<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<style>
    table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>

<body>
    <h1>Rank Management System (Kemenkumham Pranata Komputer Kantor Wilayah)</h1>

    <form action="{{ route('rank-management.create') }}">
        <button type="submit" class="ml-2 btn btn-primary">Masukkan Data Anda!</button>
    </form>

    <form method="GET" action="{{ route('rank-management.index') }}" class="mb-4">
        <label for="location" class="form-label">Pilih Provinsi</label>
        <select id="location" name="location" class="form-control">
            <option value="">Semua Lokasi</option>
            @foreach($locations as $location)
                <option value="{{ $location }}" {{ request('location') == $location ? 'selected' : '' }}>
                    {{ $location }}
                </option>
            @endforeach
        </select>
        <button type="submit" class="btn btn-primary mt-2">Filter</button>
    </form>


    <?php
        $count=1;
    ?>
    <table>
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Rank</th>
            <th>Location</th>
        </tr>
        @foreach($rank as $ranks)
        <tr>
            <td>{{ $count++}}</td>
            <td>{{ $ranks->name }}</td>
            <td>{{ $ranks->rank }}</td>
            <td>{{ $ranks->location }}</td>
        </tr>
        @endforeach
    </table>
</body>
</html>