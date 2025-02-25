<x-app-layout>
    <x-slot name="title">Teklifler</x-slot>
    <div class="container mx-auto px-4 py-6">

        @if(session('success'))
            <div class="alert alert-success bg-green-100 border-t-4 border-green-500 text-green-700 p-4 mb-4">
                <div class="flex items-center">
                    <svg class="w-5 h-5 mr-3" xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path>
                    </svg>
                    <span class="flex-1">{{ session('success') }}</span>
                    <button class="ml-4 text-green-500 hover:text-green-700" onclick="closeAlert(this)">
                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
            </div>
        @endif

        <h1 class="text-2xl font-bold text-gray-800 mb-4">Teklifler</h1>

        <a href="{{ route('offers.create') }}" class="inline-flex items-center px-4 py-2 bg-green-600 text-white text-sm font-medium rounded-md hover:bg-green-700 transition-colors duration-150 ease-in-out shadow-sm hover:shadow-md gap-2 mb-4 ">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
            </svg>
            Yeni Teklif Oluştur
        </a>


        <div class="mb-6 p-6 bg-white shadow-md rounded-lg" x-data="{ open: false }">
            <button 
                @click="open = !open" 
                class="w-full text-left bg-sky-400 text-white font-semibold py-3 px-4 rounded-md focus:outline-none"
            >
                Filtrele
                <span x-show="!open" class="ml-2 text-sm">▼</span>
                <span x-show="open" class="ml-2 text-sm">▲</span>
            </button>

            <form method="GET" action="{{ route('offers.index') }}" class="mt-4" x-show="open" x-transition>
                <div class="flex flex-wrap justify-between gap-4">
                    <div class="flex flex-col w-full sm:w-1/3">
                        <label for="offer_code" class="text-sm font-semibold text-gray-600">Teklif Kodu</label>
                        <input type="text" id="offer_code" name="offer_code" placeholder="Teklif Kodu" class="px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ request('offer_code') }}">
                    </div>
                    
                    <div class="flex flex-col w-full sm:w-1/3">
                        <label for="customer_name" class="text-sm font-semibold text-gray-600">Müşteri Adı</label>
                        <input type="text" id="customer_name" name="customer_name" placeholder="Müşteri Adı" class="px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ request('customer_name') }}">
                    </div>

                    <div class="flex flex-col w-full sm:w-1/3">
                        <label for="min_bid_value" class="text-sm font-semibold text-gray-600">Min. Bedel</label>
                        <input type="number" id="min_bid_value" name="min_bid_value" placeholder="Min. Bedel" class="px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ request('min_bid_value') }}">
                    </div>

                    <div class="flex flex-col w-full sm:w-1/3">
                        <label for="max_bid_value" class="text-sm font-semibold text-gray-600">Max. Bedel</label>
                        <input type="number" id="max_bid_value" name="max_bid_value" placeholder="Max. Bedel" class="px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ request('max_bid_value') }}">
                    </div>

                    <div class="flex flex-col w-full sm:w-1/3">
                        <label for="valid_until" class="text-sm font-semibold text-gray-600">Geçerlilik Tarihi</label>
                        <input type="date" id="valid_until" name="valid_until" class="px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ request('valid_until') }}">
                    </div>

                    <div class="flex flex-col w-full sm:w-1/3">
                        <button type="submit" class="px-6 py-2 mt-6 bg-sky-500 text-white font-semibold rounded-md hover:bg-sky-600 focus:outline-none">Filtrele</button>
                    </div>
                </div>
            </form>
        </div>

        <div class="overflow-x-auto bg-white shadow-lg rounded-lg">
            <table class="min-w-full table-auto">
                <thead>
                    <tr class="bg-gray-100 text-left">
                        <th class="px-6 py-3 text-sm font-medium text-gray-600">Teklif Kodu</th>
                        <th class="px-6 py-3 text-sm font-medium text-gray-600">Müşteri Adı</th>
                        <th class="px-6 py-3 text-sm font-medium text-gray-600">Geçerlilik Tarihi</th>
                        <th class="px-6 py-3 text-sm font-medium text-gray-600">Toplam Bedel</th>
                        <th class="px-6 py-3 text-sm font-medium text-gray-600">Detay</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($offers as $offer)
                        <tr class="border-b hover:bg-gray-50">
                            <td class="px-6 py-4 text-sm text-gray-800">{{ $offer->offer_code }}</td>
                            <td class="px-6 py-4 text-sm text-gray-800">{{ $offer->customer_name }}</td>
                            <td class="px-6 py-4 text-sm {{ \Carbon\Carbon::parse($offer->valid_until)->isFuture() ? 'text-green-500' : 'text-red-500' }}">
                                {{ \Carbon\Carbon::parse($offer->valid_until)->format('d-m-Y') }}
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-800">{{ number_format($offer->bid_value, 2) }} ₺</td>
                            <td class="px-6 py-4 text-sm">
                                <a href="{{ route('offers.show', $offer->id) }}" class="text-blue-500 hover:text-blue-700">İncele</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            {{ $offers->appends(request()->query())->links() }}
        </div>
    </div>
</x-app-layout>

<script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>

<script>
    function closeAlert(button) {
        button.closest('.alert').remove();
    }
</script>