@extends('user.layout')

@section('content')
<div class="max-w-4xl mx-auto py-10 px-4">

    <div class="bg-white p-8 rounded-xl shadow-md border border-gray-100 mb-12">
        <h2 class="text-2xl font-bold mb-6 text-blue-600">Pesan Antrean Baru</h2>

        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
                {{ session('success') }}
            </div>
        @endif
        @if(session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('booking.store') }}" method="POST">
            @csrf
            
            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2">Pilih Layanan</label>
                <select name="service_id" class="w-full border p-3 rounded-lg focus:ring-blue-500 focus:border-blue-500" required>
                    <option value="">-- Pilih Paket Layanan --</option>
                    @foreach($services as $service)
                        <option value="{{ $service->id }}">{{ $service->service_name }} (Rp{{ number_format($service->price_per_kg, 0, ',', '.') }}/kg)</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-6">
                <label class="block text-gray-700 font-bold mb-2">Pilih Waktu (Slot)</label>
                <select name="slot_id" class="w-full border p-3 rounded-lg focus:ring-blue-500 focus:border-blue-500" required>
                    <option value="">-- Pilih Jam Antrean --</option>
                    @foreach($slots as $slot)
                        <option value="{{ $slot->id }}">
                            {{ \Carbon\Carbon::parse($slot->available_date)->format('d M Y') }} | {{ $slot->time_slot }} 
                            (Sisa Kuota: {{ $slot->max_quota - $slot->current_quota }})
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="w-full bg-blue-600 text-white font-bold py-3 px-4 rounded-lg shadow-lg hover:bg-blue-700 transition">
                Submit Booking
            </button>
        </form>
    </div>

    <div>
        <h2 class="text-2xl font-bold mb-6 text-gray-800 border-b pb-2">Riwayat Pesanan Saya</h2>

        @if($bookings->isEmpty())
            <div class="bg-gray-50 p-8 rounded-lg border border-dashed border-gray-300 text-center text-gray-500">
                Kamu belum memiliki riwayat pesanan cucian.
            </div>
        @else
            @foreach($bookings as $booking)
                <div class="bg-white p-6 rounded-xl shadow-sm mb-6 border border-gray-200">
                    <div class="flex justify-between items-center border-b pb-4 mb-6">
                        <div>
                            <h3 class="text-xl font-extrabold text-blue-600">{{ $booking->booking_code }}</h3>
                            <p class="text-sm text-gray-500 mt-1">
                                {{ $booking->service->service_name ?? 'Layanan Tidak Diketahui' }} | 
                                <span class="font-semibold text-gray-700">Rp{{ number_format($booking->total_price, 0, ',', '.') }}</span>
                            </p>
                        </div>
                        <div class="text-right">
                            <span class="px-3 py-1 bg-blue-100 text-blue-800 rounded-full text-sm font-bold border border-blue-200">
                                {{ $booking->status }}
                            </span>
                            <p class="text-sm text-gray-500 mt-2 font-medium">Berat: {{ $booking->weight }} Kg</p>
                        </div>
                    </div>

                    <div class="relative border-l-2 border-blue-200 ml-3">
                        @if($booking->trackingLogs->isEmpty())
                            <div class="ml-6 text-sm text-gray-400 italic">Belum ada riwayat pelacakan.</div>
                        @else
                            @foreach($booking->trackingLogs as $index => $log)
                                <div class="mb-6 ml-6">
                                    <span class="absolute flex items-center justify-center w-5 h-5 rounded-full -left-[11px] ring-4 ring-white {{ $index === 0 ? 'bg-blue-600' : 'bg-gray-300' }}"></span>
                                    <h4 class="flex items-center text-md font-bold {{ $index === 0 ? 'text-gray-900' : 'text-gray-500' }}">
                                        {{ $log->status }}
                                    </h4>
                                    <p class="text-sm text-gray-500 mt-1">{{ $log->description }}</p>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            @endforeach
        @endif
    </div>

</div>
@endsection