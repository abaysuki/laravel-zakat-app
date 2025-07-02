<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login - Zakat App</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    <div class="flex flex-col md:flex-row w-full max-w-5xl bg-white rounded-lg shadow-lg overflow-hidden">
    <!-- Left: Welcome Panel with Background Image -->
<div class="md:w-1/2 relative bg-cover bg-center" style="background-image: url(https://th.bing.com/th/id/OIP.ukjLfO-BGUHDmUN6NShkVwHaEK?w=323&h=182&c=7&r=0&o=7&dpr=2&pid=1.7&rm=3);">
    <div class="absolute inset-0 bg-gradient-to-br from-green-600/80 to-pink-500/80"></div>
    <div class="relative z-10 flex flex-col justify-center items-center h-full p-10 text-white">
        <div class="bg-white/20 backdrop-blur-md px-6 py-4 rounded-lg shadow-md">
            <h2 class="text-3xl font-bold text-center">Selamat Datang</h2>
            <p class="text-sm text-center mt-2">Silakan login untuk melanjutkan</p>
        </div>
    </div>
</div>


        <!-- Right: Login Form -->
        <div class="md:w-1/2 bg-white p-10 flex flex-col justify-center">
            <h2 class="text-2xl font-bold text-gray-800 text-center mb-6">Login</h2>

            @if (session('status'))
                <div class="mb-4 text-sm text-green-600 text-center">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <input type="email" name="email" placeholder="Email"
                       class="w-full mb-4 p-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-pink-400" required>

                <input type="password" name="password" placeholder="Password"
                       class="w-full mb-6 p-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-pink-400" required>

                <button type="submit"
                        class="w-full bg-pink-500 hover:bg-pink-600 text-white font-bold py-2 rounded-full transition duration-200">
                    SIGN IN
                </button>
            </form>

            <div class="mt-4 text-center text-sm space-y-2">
                <a href="{{ route('password.request') }}" class="text-pink-500 hover:underline">Lupa Password?</a><br>
                <span class="text-gray-500">Belum punya akun?</span>
                <a href="{{ route('register') }}" class="text-pink-500 font-semibold hover:underline">Daftar Sekarang</a>
            </div>
        </div>
    </div>

</body>
</html>
