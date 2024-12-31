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

body {
    background-color: #f0f0f0;
}
</style>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Participant Management') }}
        </h2>
    </x-slot>

    <body>
        <div style="padding: 20px;">
            <div class="d-flex justify-content-center">
                <div class="w-50">
                    <?php
                        $count = 1;
                    ?>
                    <table>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Rank</th>
                            <th>Status</th>
                        </tr>
                        @foreach($participant as $participants)
                        <tr>
                            <td>{{ $count++}}</td>
                            <td>{{ $participants->name }}</td>
                            <td>{{ $participants->rank }}</td>
                            <td>{{ $participants->status }}</td>
                        </tr>
                        @endforeach
                    </table>

                    <nav style="margin: 20px 0px">
                        {!! $participant->appends($_GET)->links() !!}
                    </nav>
                </div>
            </div>
        </div>

    </body>
</x-app-layout>

</html>