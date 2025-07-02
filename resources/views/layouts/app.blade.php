<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Zakat App')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Chart.js untuk statistik -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body class="bg-gray-100 text-gray-800 min-h-screen flex">

    <!-- Sidebar -->
    <aside class="w-64 bg-gray-800 text-white flex flex-col">
        <div class="p-4 text-xl font-bold bg-orange-500 text-center">Lembaga Zakat</div>

        <div class="p-4 flex-grow">
            <div class="mb-6 text-center">
                <img src="https://media-cgk1-1.cdn.whatsapp.net/v/t61.24694-24/506260611_1736826863588178_9056769134447562412_n.jpg?ccb=11-4&oh=01_Q5Aa1wHsvTVBSUQhllU4tXSyWEN5clV-DKHHD5aN8mOQGNpT2w&oe=6870F366&_nc_sid=5e03e0&_nc_cat=105" alt="User" class="w-16 h-16 rounded-full mx-auto mb-2">
                <p class="font-semibold">Admin</p>
                <span class="text-green-400 text-sm">● Online</span>
            </div>

            <nav class="space-y-2 text-sm">
                <a href="{{ route('dashboard') }}"
                   class="block px-3 py-2 rounded {{ request()->routeIs('dashboard') ? 'bg-gray-700' : 'hover:bg-gray-700' }}">
                   Dashboard
                </a>
                <a href="{{ route('muzakki.create') }}"
                   class="block px-3 py-2 rounded {{ request()->routeIs('muzakki.create') ? 'bg-gray-700' : 'hover:bg-gray-700' }}">
                   Tambah Muzakki
                </a>
                <a href="{{ route('muzakki.index') }}"
                   class="block px-3 py-2 rounded {{ request()->routeIs('muzakki.index') ? 'bg-gray-700' : 'hover:bg-gray-700' }}">
                   Daftar Muzakki
                </a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="w-full text-left px-3 py-2 rounded hover:bg-gray-700">Logout</button>
                </form>
            </nav>
        </div>
    </aside>

    <!-- Main Content -->
    <div class="flex flex-col flex-1 min-h-screen">
        <main class="flex-1 p-6">
            <!-- Header -->
            <div class="mb-6 flex justify-between items-center">
                <h1 class="text-2xl font-bold">@yield('title', 'Dashboard')</h1>
                <div class="text-sm text-gray-600">
                    📅 {{ \Carbon\Carbon::now('Asia/Jakarta')->format('d M Y, H:i') }}
                </div>
            </div>

            <!-- Statistik dan Kartu Info (khusus dashboard) -->
            @if (request()->routeIs('dashboard'))
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
                <div class="bg-blue-500 text-white rounded p-4 shadow">
                    <p class="text-sm">Total Muzakki</p>
                    <p class="text-2xl font-bold">{{ $totalMuzakki ?? 0 }}</p>
                </div>
                <div class="bg-green-500 text-white rounded p-4 shadow">
                    <p class="text-sm">Total Jiwa</p>
                    <p class="text-2xl font-bold">{{ $totalJiwa ?? 0 }}</p>
                </div>
                <div class="bg-yellow-500 text-white rounded p-4 shadow">
                    <p class="text-sm">Total Zakat (Rp)</p>
                    <p class="text-xl font-bold">Rp {{ number_format($totalZakat ?? 0, 0, ',', '.') }}</p>
                </div>
                <div class="bg-red-500 text-white rounded p-4 shadow">
                    <p class="text-sm">Tahun Pembayaran</p>
                    <p class="text-2xl font-bold">{{ \Carbon\Carbon::now('Asia/Jakarta')->year }}</p>
                </div>
            </div>

            <!-- Chart Statistik -->
            <div class="bg-white rounded shadow p-6 mb-6">
                <h3 class="text-lg font-semibold mb-4">Statistik Pembayaran Zakat</h3>
                <canvas id="zakatChart" height="100"></canvas>
            </div>

            <script>
                const ctx = document.getElementById('zakatChart').getContext('2d');
                new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: {!! json_encode($chartLabels ?? ['Jan', 'Feb', 'Mar', 'Apr']) !!},
                        datasets: [{
                            label: 'Total Zakat Bulanan (Rp)',
                            data: {!! json_encode($chartData ?? [1200000, 1500000, 1000000, 1800000]) !!},
                            backgroundColor: 'rgba(255, 99, 132, 0.6)',
                            borderRadius: 6
                        }]
                    },
                    options: {
                        responsive: true,
                        scales: {
                            y: {
                                beginAtZero: true,
                                ticks: {
                                    callback: function(value) {
                                        return 'Rp ' + value.toLocaleString();
                                    }
                                }
                            }
                        }
                    }
                });
            </script>
            @endif

            <!-- Konten -->
            @yield('content')
        </main>

        <!-- Footer -->
        <footer class="text-xs text-gray-500 text-center border-t py-4 mt-auto">
            © 2025 Zakat App - Yayasan Amanah Umat.
        </footer>
    </div>
</body>
</html>
