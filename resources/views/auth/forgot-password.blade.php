<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Lupa Password - Zakat App</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    <div class="w-full max-w-md bg-white rounded-lg shadow-lg p-8">
        <h2 class="text-2xl font-bold text-center text-pink-600 mb-4">Reset Password</h2>

        @if (session('status'))
            <div class="mb-4 text-green-600 text-center text-sm">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <input type="email" name="email" placeholder="Masukkan email Anda"
                   class="w-full mb-4 p-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-pink-400" required>

            <button type="submit"
                    class="w-full bg-pink-500 hover:bg-pink-600 text-white font-bold py-2 rounded-full transition">
                Kirim Link Reset
            </button>
        </form>

        <div class="mt-4 text-center text-sm">
            <a href="{{ route('login') }}" class="text-gray-600 hover:underline">Kembali ke Login</a>
        </div>
    </div>

</body>
</html>
