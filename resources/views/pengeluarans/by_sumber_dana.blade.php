<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Pengeluaran</title>
    <!-- Tailwind CSS CDN untuk styling -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Inter untuk tampilan modern -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>

<body class="bg-[#002b5e] min-h-screen flex items-start justify-center p-6 sm:p-12">
    <!-- Kontainer utama dengan padding dan background yang lebih menarik -->
    <div class="container max-w-7xl">
        <!-- Card container with a professional, clean look -->
        <div class="bg-gray-50 rounded-2xl shadow-2xl overflow-hidden">
            <!-- Header section with a subtle gradient and rounded corners -->
            <div class="bg-blue-700 p-6 sm:p-8 md:p-10 text-white rounded-t-2xl">
                <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center">
                    <h1 class="text-3xl lg:text-4xl font-extrabold mb-2 sm:mb-0">
                        Laporan Pengeluaran
                    </h1>
                    <span class="text-lg font-semibold bg-white text-blue-800 px-4 py-2 rounded-full shadow-md">
                        Sumber : {{ $namaSumber }}
                    </span>
                </div>
                <p class="mt-2 text-blue-200 text-sm sm:text-base">
                    Ringkasan data pengeluaran berdasarkan sumber dana yang dipilih.
                </p>
            </div>

            <!-- Main content area -->
            <div class="p-4 sm:p-6 lg:p-8">
                <div class="overflow-x-auto rounded-lg shadow-lg border border-gray-200">
                    <table class="min-w-full divide-y divide-gray-200">
                        <!-- Table Header -->
                        <thead class="bg-blue-600">
                            <tr>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-bold text-white uppercase tracking-wider">
                                    No
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-bold text-white uppercase tracking-wider">
                                    Tanggal
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-bold text-white uppercase tracking-wider">
                                    Kegiatan
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-bold text-white uppercase tracking-wider">
                                    Nominal
                                </th>
                            </tr>
                        </thead>
                        <!-- Table Body with example data -->
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse($pengeluaran as $index => $item)
                            <tr class="bg-gray-50 hover:bg-blue-50 transition-colors duration-200">
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                    {{ $index + 1 }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                    {{ \Carbon\Carbon::parse($item->tanggal)->format('d F Y') }}
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-700">
                                    <div class="font-semibold text-gray-900">{{ $item->kegiatan->kode_kegiatan }}</div>
                                    <div class="text-gray-600">{{ $item->kegiatan->nama_kegiatan }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-bold text-green-600">
                                    Rp {{ number_format($item->nominal, 0, ',', '.') }}
                                </td>
                            </tr>
                            @empty
                             <tr>
                                    <td colspan="4" class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium text-gray-500">
                                        Tidak ada data pengeluaran yang ditemukan untuk sumber dana ini.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
