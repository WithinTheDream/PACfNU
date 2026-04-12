<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sistem Informasi Fatayat NU</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style> body { font-family: 'Plus Jakarta Sans', sans-serif; } </style>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    <div class="bg-white p-8 rounded-xl shadow-lg w-full max-w-md border-t-4 border-green-600">
        <div class="text-center mb-8">
            <div class="w-12 h-12 bg-green-600 rounded-full flex items-center justify-center text-white font-bold text-2xl mx-auto mb-3">F</div>
            <h2 class="text-2xl font-bold text-gray-800">Login Pengurus</h2>
            <p class="text-sm text-gray-500 mt-1">Sistem Informasi PAC Fatayat NU Tahunan</p>
        </div>

        @if ($errors->any())
            <div class="bg-red-50 text-red-500 p-3 rounded-lg text-sm mb-4 border border-red-200">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ url('/login') }}">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-semibold mb-2" for="email">Alamat Email</label>
                <input class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-green-500 focus:ring-1 focus:ring-green-500" id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>
            </div>
            
            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-semibold mb-2" for="password">Password</label>
                <input class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-green-500 focus:ring-1 focus:ring-green-500" id="password" type="password" name="password" required>
            </div>

            <button class="w-full bg-green-600 hover:bg-green-700 text-white font-bold py-2.5 px-4 rounded-lg transition duration-200" type="submit">
                Masuk ke Sistem
            </button>
        </form>

        <div class="text-center mt-6">
            <a href="{{ url('/') }}" class="text-sm text-green-600 hover:text-green-800 font-medium">&larr; Kembali ke Beranda</a>
        </div>
    </div>

</body>
</html>