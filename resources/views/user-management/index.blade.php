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

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow-sm rounded-lg">
                <div class="d-flex justify-between mb-4">
                    <h1 class="text-lg">Create User</h1>
                    <a href="{{ route('user-management.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white px-4 py-2 rounded">
                        Add User
                    </a>
                </div>
                
                <table class="min-w-full">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="p-3">No</th>
                            <th class="p-3">Name</th>
                            <th class="p-3">Email</th>
                            <th class="p-3">Created</th>
                            <th class="p-3">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($user as $users)
                        <tr class="border-b">
                            <td class="p-3">{{ $loop->iteration }}</td>
                            <td class="p-3">{{ $users->name }}</td>
                            <td class="p-3">{{ $users->email }}</td>
                            <td class="p-3">{{ $users->created_at->format('d-m-Y') }}</td>
                            <td class="p-3 space-x-2">
                                <a href="{{ route('user-management.edit', $users->id) }}" 
                                   class="bg-yellow-500 hover:bg-yellow-700 text-white px-3 py-1 rounded inline-block w-20 text-center">
                                   Edit</a>
                                <form action="{{ route('user-management.destroy', $users->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 hover:bg-red-700 text-white px-3 py-1 rounded w-20">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="mt-4">
                    {{ $user->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

</html>