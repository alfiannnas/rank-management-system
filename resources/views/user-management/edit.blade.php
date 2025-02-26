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
            {{ __('Permission Management') }}
        </h2>
    </x-slot>

    <body>
        <div style="padding: 20px;">
            <div class="d-flex justify-content-center">
                <div class="w-50">
                    <form action="{{ route('user-management.update', ['user_management' => $user->id]) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="d-flex flex-col gap-y-3">
                            <div class="d-flex flex-col">
                                <label for="name">Name</label>
                                <input type="text" name="name" placeholder="Name" value="{{ $user->name }}">  
                            </div>
                            <div class="d-flex flex-col">
                                <label for="email">Email</label>
                                <input type="email" name="email" placeholder="Email" value="{{ $user->email }}">
                            </div>
                            <div class="d-flex flex-col">
                                <label for="password">Password</label>
                                <input type="password" name="password" placeholder="Password" value="{{ $user->password }}">
                        </div>
                        <div class="d-flex justify-content-end mt-3">
                            <button type="submit" class="btn btn-primary">Update User</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</x-app-layout>

</html>