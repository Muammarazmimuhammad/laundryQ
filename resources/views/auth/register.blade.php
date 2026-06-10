<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - LaundryQ</title>
    @vite(['resources/css/app.css'])
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">
    <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md">
        <h2 class="text-2xl font-bold text-center text-blue-600 mb-6">Daftar Akun LaundryQ</h2>
        
        <form action="{{ route('register.submit') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700">Nama Lengkap</label>
                <input type="text" name="name" class="w-full border p-2 rounded mt-1" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Nomor HP/WA</label>
                <input type="text" name="phone" class="w-full border p-2 rounded mt-1" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Email</label>
                <input type="email" name="email" class="w-full border p-2 rounded mt-1" required>
            </div>
            <div class="mb-6">
                <label class="block text-gray-700">Password</label>
                <input type="password" name="password" class="w-full border p-2 rounded mt-1" required minlength="6">
            </div>
            <button type="submit" class="w-full bg-blue-600 text-white font-bold py-2 rounded hover:bg-blue-700">Daftar</button>
        </form>
        <p class="text-center mt-4 text-sm">Sudah punya akun? <a href="{{ route('login') }}" class="text-blue-500 underline">Login di sini</a></p>
    </div>
</body>
</html>