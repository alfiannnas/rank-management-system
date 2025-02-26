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
            {{ __('User Management') }}
        </h2>
    </x-slot>

    <body>
        <div style="padding: 20px;">
            <div class="d-flex justify-content-center">
                <div class="w-50">
                <div class="d-flex justify-content-end mb-3">
                <form action="{{ route('user-management.create') }}" method="get">
                        <button class="btn btn-primary">Add User</button>
                    </form>
                </div>
                    <?php
                        $count = 1;
                    ?>
                    <table>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Created At</th>
                            <th>Action</th>
                        </tr>
                        @foreach($user as $users)
                        <tr>
                            <td>{{ $count++}}</td>
                            <td>{{ $users->name }}</td>
                            <td>{{ $users->email }}</td>
                            <td>{{ $users->created_at->format('d-m-Y') }}</td>
                            <td class="d-flex gap-x-2">
                                <form action="{{ route('user-management.edit', ['user_management' => $users->id]) }}" method="GET">
                                    <button type="submit" class="btn btn-warning">Edit</button>
                                </form>
                                <form action="{{ route('user-management.destroy', ['user_management' => $users->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </table>

                    <nav style="margin: 20px 0px">
                        {!! $user->appends($_GET)->links() !!}
                    </nav>
                </div>
            </div>
        </div>

    </body>
</x-app-layout>

</html>