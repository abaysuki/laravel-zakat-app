<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Register - Zakat App</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    <div class="flex flex-col md:flex-row w-full max-w-5xl bg-white rounded-lg shadow-lg overflow-hidden">
        <!-- Left: Welcome Message -->
        <div class="md:w-1/2 bg-gradient-to-br from-green-500 to-pink-400 text-white p-10 flex flex-col justify-center items-center">
            <h2 class="text-3xl font-bold mb-4 text-center">Selamat Datang!</h2>
            <p class="text-center text-sm mb-6">Sudah punya akun? Silakan login sekarang.</p>
            <a href="{{ route('login') }}"
               class="bg-white text-pink-500 font-bold py-2 px-6 rounded-full hover:bg-gray-100 transition">
               SIGN IN
            </a>
        </div>

        <!-- Right: Register Form -->
        <div class="md:w-1/2 bg-white p-10 flex flex-col justify-center">
            <h2 class="text-2xl font-bold text-gray-800 text-center mb-6">Buat Akun</h2>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <input type="text" name="name" placeholder="Nama"
                       class="w-full mb-4 p-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-pink-400" required>

                <input type="email" name="email" placeholder="Email"
                       class="w-full mb-4 p-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-pink-400" required>

                <input type="password" name="password" placeholder="Password"
                       class="w-full mb-4 p-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-pink-400" required>

                <input type="password" name="password_confirmation" placeholder="Konfirmasi Password"
                       class="w-full mb-6 p-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-pink-400" required>

                <button type="submit"
                        class="w-full bg-pink-500 hover:bg-pink-600 text-white font-bold py-2 rounded-full transition duration-200">
                    SIGN UP
                </button>
            </form>
        </div>
    </div>

</body>
</html>
