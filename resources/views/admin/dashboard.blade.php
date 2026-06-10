<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - LaundryQ</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 p-8">

    <div class="max-w-7xl mx-auto">
        <h1 class="text-3xl font-bold text-gray-800 mb-6">Dashboard Admin LaundryQ</h1>

        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <table class="min-w-full leading-normal">
                <thead>
                    <tr>
                        <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Kode Booking</th>
                        <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Pelanggan</th>
                        <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Layanan</th>
                        <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Aksi Update</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($bookings as $booking)
                    <tr>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                            <p class="text-gray-900 whitespace-no-wrap font-bold">{{ $booking->booking_code }}</p>
                            <p class="text-gray-500 text-xs">{{ $booking->slot->time_slot ?? 'N/A' }}</p>
                        </td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                            <p class="text-gray-900 whitespace-no-wrap">{{ $booking->user->name ?? 'Dummy User' }}</p>
                        </td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                            <p class="text-gray-900 whitespace-no-wrap">{{ $booking->service->service_name ?? 'N/A' }}</p>
                            <p class="text-blue-600 text-xs font-bold">Rp{{ number_format($booking->total_price, 0, ',', '.') }}</p>
                        </td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                            <form action="{{ route('admin.booking.update', $booking->id) }}" method="POST" class="flex items-center gap-2">
                                @csrf
                                <input type="number" step="0.1" name="weight" value="{{ $booking->weight }}" placeholder="Berat (Kg)" class="w-24 border p-1 rounded text-sm" required>
                                
                                <select name="status" class="border p-1 rounded text-sm">
                                    @php $statuses = ['Menunggu Antrean', 'Diterima', 'Proses Cuci', 'Pengeringan', 'Siap Diambil', 'Selesai']; @endphp
                                    @foreach($statuses as $status)
                                        <option value="{{ $status }}" {{ $booking->status == $status ? 'selected' : '' }}>{{ $status }}</option>
                                    @endforeach
                                </select>
                                
                                <button type="submit" class="bg-blue-500 text-white px-3 py-1 rounded text-sm hover:bg-blue-600">Update</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @if($bookings->isEmpty())
                <div class="p-5 text-center text-gray-500">Belum ada antrean masuk.</div>
            @endif
        </div>
    </div>

</body>
</html>