<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Teklif Detayı - {{ $offer->offer_code }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div class="bg-gray-50 p-4 rounded-lg border">
                            <h3 class="text-lg font-semibold text-gray-900 underline underline-offset-4 mb-3">Teklif Bilgileri</h3>
                            <p><strong>Kod:</strong> {{ $offer->offer_code }}</p>
                            <p><strong>Geçerlilik Tarihi:</strong> {{ $offer->valid_until->format('d-m-Y') }}</p>
                        </div>

                        <div class="bg-gray-50 p-4 rounded-lg border">
                            <h3 class="text-lg font-semibold text-gray-900 underline underline-offset-4 mb-3">Müşteri Bilgileri</h3>
                            <p><strong>Ad:</strong> {{ $offer->customer_name }}</p>
                            <p><strong>E-posta:</strong> {{ $offer->customer_email }}</p>
                            <p><strong>Telefon:</strong> {{ $offer->customer_phone }}</p>
                            <p><strong>Adres:</strong> {{ $offer->customer_address }}</p>
                        </div>

                        <div class="bg-gray-50 p-4 rounded-lg border">
                            <h3 class="text-lg font-semibold text-gray-900 underline underline-offset-4 mb-3">Vergi Bilgileri</h3>
                            <p><strong>Vergi Numarası:</strong> {{ $offer->tax_id }}</p>
                            <p><strong>Ticaret Sicil Numarası:</strong> {{ $offer->trade_registry_number }}</p>
                        </div>
                    </div>

                    <div class="mt-6">
                        <h3 class="text-lg font-semibold text-gray-900">Ürünler</h3>
                        <div class="overflow-x-auto">
                            <table class="min-w-full border border-gray-300 bg-white">
                                <thead>
                                    <tr class="bg-gray-100">
                                        <th class="border px-4 py-2 text-left">Ürün Adı</th>
                                        <th class="border px-4 py-2 text-left">Açıklama</th>
                                        <th class="border px-4 py-2 text-right">Birim Fiyat</th>
                                        <th class="border px-4 py-2 text-right">Miktar</th>
                                        <th class="border px-4 py-2 text-right">Toplam</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($offer->products as $product)
                                        <tr>
                                            <td class="border px-4 py-2">{{ $product->product_name }}</td>
                                            <td class="border px-4 py-2">{{ $product->product_description }}</td>
                                            <td class="border px-4 py-2 text-right">{{ number_format($product->unit_price, 2) }} ₺</td>
                                            <td class="border px-4 py-2 text-right">{{ $product->quantity }}</td>
                                            <td class="border px-4 py-2 text-right font-semibold">
                                                {{ number_format($product->unit_price * $product->quantity, 2) }} ₺
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="mt-6 flex justify-end">
                        <h3 class="text-xl font-semibold text-gray-900 underline underline-offset-4">
                            <p class="float-right">Toplam: {{ number_format($offer->products->sum(fn($p) => $p->unit_price * $p->quantity), 2) }} ₺</p>
                            <p class="text-sm clear-both">#{{ $offer->bid_text }}#</p>
                        </h3>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
