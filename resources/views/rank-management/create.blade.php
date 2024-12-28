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
    .form-group {
        display: flex;
        flex-direction: column;
        margin-bottom: 1em;
        padding: 10px;
    }

    label {
        margin-bottom: 0.5em;
        font-weight: bold;
    }

    input {
        padding: 0.5em;
        border: 1px solid #ccc;
        border-radius: 4px;
    }
</style>
<body>
    <h1>Rank Management System (Kemenkumham Pranata Komputer Kantor Wilayah)</h1>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    <form action="{{ route('rank-management.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name">
        </div>

        <div class="form-group">
            <label for="rank">Peringkat (Peringkat Berdasarkan QC)</label>
            <input type="number" name="rank" id="rank">
        </div>

        <div class="form-group">
        <label for="location">Pilih Wilayah</label>
        <select id="location" name="location">
            <option value="">Pilih Provinsi</option>
            <option value="Aceh">Aceh</option>
            <option value="Sumatera Utara">Sumatera Utara</option>
            <option value="Sumatera Barat">Sumatera Barat</option>
            <option value="Riau">Riau</option>
            <option value="Jambi">Jambi</option>
            <option value="Sumatera Selatan">Sumatera Selatan</option>
            <option value="Bengkulu">Bengkulu</option>
            <option value="Lampung">Lampung</option>
            <option value="Kepulauan Bangka Belitung">Kepulauan Bangka Belitung</option>
            <option value="Kepulauan Riau">Kepulauan Riau</option>
            <option value="DKI Jakarta">DKI Jakarta</option>
            <option value="Jawa Barat">Jawa Barat</option>
            <option value="Jawa Tengah">Jawa Tengah</option>
            <option value="DI Yogyakarta">DI Yogyakarta</option>
            <option value="Jawa Timur">Jawa Timur</option>
            <option value="Banten">Banten</option>
            <option value="Bali">Bali</option>
            <option value="Nusa Tenggara Barat">Nusa Tenggara Barat</option>
            <option value="Nusa Tenggara Timur">Nusa Tenggara Timur</option>
            <option value="Kalimantan Barat">Kalimantan Barat</option>
            <option value="Kalimantan Tengah">Kalimantan Tengah</option>
            <option value="Kalimantan Selatan">Kalimantan Selatan</option>
            <option value="Kalimantan Timur">Kalimantan Timur</option>
            <option value="Kalimantan Utara">Kalimantan Utara</option>
            <option value="Sulawesi Utara">Sulawesi Utara</option>
            <option value="Sulawesi Tengah">Sulawesi Tengah</option>
            <option value="Sulawesi Selatan">Sulawesi Selatan</option>
            <option value="Sulawesi Tenggara">Sulawesi Tenggara</option>
            <option value="Gorontalo">Gorontalo</option>
            <option value="Sulawesi Barat">Sulawesi Barat</option>
            <option value="Maluku">Maluku</option>
            <option value="Maluku Utara">Maluku Utara</option>
            <option value="Papua">Papua</option>
            <option value="Papua Barat">Papua Barat</option>
        </select>
        </div>

        <button type="submit" class="ml-2 btn btn-primary"> Submit </button>
    </form>
</body>
</html>