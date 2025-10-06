<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/pesat.png" type="image/x-icon" />
    <title>Filter Pengeluaran</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

        /* Gaya kustom untuk cincin fokus emas */
        .input-focus-ring:focus {
            outline: 2px solid #FFD700;
            outline-offset: 2px;
        }
    </style>
</head>

<body class="bg-gray-200 min-h-screen antialiased">
    <main class="py-10 px-4 sm:px-6 lg:px-8">
        <div class="mb-8 md:mb-10 max-w-4xl mx-auto mt-12 md:mt-16">
            <h1 class="text-4xl lg:text-5xl font-extrabold text-black tracking-tight leading-tight text-center">
                Filter Pengeluaran
            </h1>
            <p class="mt-2 text-lg text-gray-800 text-center">
                Pilih sumber dana dan rentang tanggal untuk melihat data pengeluaran.
            </p>
        </div>

        <form action="{{ route('pengeluarans.bySumberDana') }}" method="GET"
            class="bg-[#004AAD] p-8 md:p-10 lg:p-12 rounded-2xl shadow-2xl space-y-6 md:space-y-8 max-w-4xl mx-auto">
            @csrf

            <div>
                <label for="sumber_dana_id" class="block text-sm font-semibold text-gray-200 mb-2 uppercase tracking-wide">
                    Sumber Dana
                </label>
                <select name="sumber_dana_id" id="sumber_dana_id"
                    class="w-full rounded-xl border-2 border-transparent p-3 text-gray-800 bg-white font-medium shadow-sm transition-all duration-300 input-focus-ring"
                    required>
                    <option value="">-- Pilih Sumber Dana --</option>
                    @foreach($sumberDanas as $sumber)
                        <option value="{{ $sumber->id }}">{{ $sumber->nama_sumber }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="tanggal_mulai" class="block text-sm font-semibold text-gray-200 mb-2 uppercase tracking-wide">
                    Tanggal Mulai
                </label>
                <input type="date" name="tanggal_mulai" id="tanggal_mulai"
                    class="w-full rounded-xl border-2 border-transparent p-3 text-gray-800 bg-white font-medium shadow-sm transition-all duration-300 input-focus-ring">
            </div>

            <div>
                <label for="tanggal_selesai" class="block text-sm font-semibold text-gray-200 mb-2 uppercase tracking-wide">
                    Tanggal Selesai
                </label>
                <input type="date" name="tanggal_selesai" id="tanggal_selesai"
                    class="w-full rounded-xl border-2 border-transparent p-3 text-gray-800 bg-white font-medium shadow-sm transition-all duration-300 input-focus-ring">
            </div>

            <div class="flex justify-end pt-4">
                <button type="submit"
                    class="px-8 py-3 rounded-xl shadow-lg font-bold text-[#004AAD] bg-[#FFD700] hover:bg-yellow-400 focus:outline-none focus:ring-4 focus:ring-yellow-300 transition-all duration-300 transform hover:scale-105">
                    Tampilkan Data
                </button>
            </div>
        </form>
    </main>
</body>

</html>