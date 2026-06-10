@extends('user.layout')

@section('content')
<div class="p-8">
    <div class="max-w-4xl mx-auto">
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-3xl font-bold text-gray-800">Lacak Pesanan Saya</h1>
            <a href="{{ route('booking.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded shadow hover:bg-blue-700 transition">
                + Buat Pesanan Baru
            </a>
        </div>

        @if($bookings->isEmpty())
            <div class="bg-white p-8 rounded-lg shadow text-center text-gray-500">
                Kamu belum memiliki riwayat pesanan cucian.
            </div>
        @else
            @foreach($bookings as $booking)
                <div class="bg-white p-6 rounded-xl shadow-md mb-8 border border-gray-100">
                    <div class="flex justify-between items-center border-b pb-4 mb-6">
                        <div>
                            <h2 class="text-xl font-extrabold text-blue-600">{{ $booking->booking_code }}</h2>
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
                                    <h3 class="flex items-center text-md font-bold {{ $index === 0 ? 'text-gray-900' : 'text-gray-500' }}">
                                        {{ $log->status }}
                                    </h3>
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