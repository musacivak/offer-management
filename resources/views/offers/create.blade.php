<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Yeni Teklif Oluştur
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <form method="POST" action="{{ route('offers.store') }}" class="space-y-8">
                        @csrf

                        @if ($errors->any())
                            <div class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded-md">
                                <strong>Hata! Lütfen aşağıdaki sorunları düzeltin:</strong>
                                <ul class="mt-2 list-disc list-inside text-sm text-red-600">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="bg-white rounded-xl shadow border border-gray-200">
                            <div class="border-b border-gray-200 px-6 py-4 bg-gray-50">
                                <h2 class="text-lg font-medium text-gray-900">Teklif Bilgileri</h2>
                            </div>
                            <div class="p-6">
                                <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                                    <div class="space-y-1">
                                        <label for="offer_code" class="block text-sm font-medium text-gray-700">
                                            Teklif Kodu*
                                        </label>
                                        <input type="text" 
                                            name="offer_code" 
                                            id="offer_code"
                                            value="{{ old('offer_code') }}"
                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                            placeholder="TEK-2024-001"
                                            required>
                                    </div>

                                    <div class="space-y-1">
                                        <label for="valid_until" class="block text-sm font-medium text-gray-700">
                                            Geçerlilik Tarihi*
                                        </label>
                                        <input type="date" 
                                            name="valid_until" 
                                            id="valid_until"
                                            value="{{ old('valid_until') }}"
                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                            required>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="bg-white rounded-xl shadow border border-gray-200">
                            <div class="border-b border-gray-200 px-6 py-4 bg-gray-50">
                                <h2 class="text-lg font-medium text-gray-900">Müşteri Bilgileri</h2>
                            </div>
                            <div class="p-6">
                                <div class="grid grid-cols-1 gap-6 md:grid-cols-3">
                                    <div class="space-y-1">
                                        <label for="customer_name" class="block text-sm font-medium text-gray-700">
                                            Müşteri Adı*
                                        </label>
                                        <input type="text" 
                                            name="customer_name" 
                                            id="customer_name"
                                            value="{{ old('customer_name') }}"
                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                            placeholder="Örnek Şirket Ltd. Şti."
                                            required>
                                    </div>

                                    <div class="space-y-1">
                                        <label for="customer_email" class="block text-sm font-medium text-gray-700">
                                            E-posta*
                                        </label>
                                        <input type="email" 
                                            name="customer_email" 
                                            id="customer_email"
                                            value="{{ old('customer_email') }}"
                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                            placeholder="Email adresi"
                                            required>
                                    </div>

                                    <div class="space-y-1">
                                        <label for="customer_phone" class="block text-sm font-medium text-gray-700">
                                            Telefon*
                                        </label>
                                        <input type="tel" 
                                            name="customer_phone" 
                                            id="customer_phone"
                                            value="{{ old('customer_phone') }}"
                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                            placeholder="Telefon numarası"
                                            maxlength="11"
                                            minlength="10"
                                            required>
                                    </div>

                                    <div class="md:col-span-2 w-full space-y-1">
                                        <label for="customer_address" class="block text-sm font-medium text-gray-700">
                                            Adres*
                                        </label>
                                        <textarea 
                                            name="customer_address" 
                                            id="customer_address"
                                            rows="3"
                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                            placeholder="Adres bilgileri"
                                            required>{{ old('customer_address') }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="bg-white rounded-xl shadow border border-gray-200">
                            <div class="border-b border-gray-200 px-6 py-4 bg-gray-50">
                                <h2 class="text-lg font-medium text-gray-900">Vergi Bilgileri</h2>
                            </div>
                            <div class="p-6">
                                <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                                    <div class="space-y-1">
                                        <label for="tax_id" class="block text-sm font-medium text-gray-700">
                                            Vergi Numarası*
                                        </label>
                                        <input type="number" 
                                            name="tax_id" 
                                            id="tax_id"
                                            value="{{ old('tax_id') }}"
                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                            placeholder="Vergi numarası"
                                            minlength="10"
                                            maxlength="11"
                                            required>
                                    </div>

                                    <div class="space-y-1">
                                        <label for="trade_registry_number" class="block text-sm font-medium text-gray-700">
                                            Ticaret Sicil Numarası*
                                        </label>
                                        <input type="text" 
                                            name="trade_registry_number" 
                                            id="trade_registry_number"
                                            value="{{ old('trade_registry_number') }}"
                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                            placeholder="Ticaret sicil numarası"
                                            maxlength="16"
                                            required>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="bg-white rounded-xl shadow border border-gray-200">
                            <div class="border-b border-gray-200 px-6 py-4 bg-gray-50 flex justify-between items-center">
                                <h2 class="text-lg font-medium text-gray-900">Ürünler</h2>
                                <button type="button" onclick="addProductField()"
                                    class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                    </svg>
                                    Ürün Ekle
                                </button>
                            </div>

                            <div class="p-6">
                                <div id="product-section" class="space-y-4">
                                @if(old('product_name'))
                                        @foreach(old('product_name') as $key => $value)
                                            <div class="relative bg-gray-50 p-4 rounded-lg border border-gray-200 product-field">
                                                @if($key > 0)
                                                    <button type="button" 
                                                        class="absolute top-0 right-0 text-gray-400 hover:text-red-500"
                                                        onclick="this.closest('.product-field').remove()">
                                                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                                        </svg>
                                                    </button>
                                                @endif
                                                <div class="flex items-center gap-4">
                                                    <div class="flex-1">
                                                        <label class="block text-sm font-medium text-gray-700">Ürün Adı</label>
                                                        <input type="text" name="product_name[]"
                                                            value="{{ $value }}"
                                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                                            placeholder="Ürün adı" required>
                                                    </div>

                                                    <div class="flex-1">
                                                        <label class="block text-sm font-medium text-gray-700">Ürün Açıklaması</label>
                                                        <textarea name="product_description[]" rows="1"
                                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                                            placeholder="Ürün açıklaması" required>{{ old('product_description')[$key] }}</textarea>
                                                    </div>

                                                    <div class="w-32">
                                                        <label class="block text-sm font-medium text-gray-700">Birim Fiyat</label>
                                                        <div class="relative mt-1">
                                                            <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                                                                <span class="text-gray-500 sm:text-sm">₺</span>
                                                            </div>
                                                            <input type="number" name="product_price[]"
                                                                value="{{ old('product_price')[$key] }}"
                                                                class="block w-full rounded-md border-gray-300 pl-8 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                                                placeholder="0.00" required>
                                                        </div>
                                                    </div>

                                                    <div class="w-24">
                                                        <label class="block text-sm font-medium text-gray-700">Miktar</label>
                                                        <input type="number" name="product_quantity[]"
                                                            value="{{ old('product_quantity')[$key] }}"
                                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                                            min="1" placeholder="1" required>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                        @else
                                    <div class="relative bg-gray-50 p-4 rounded-lg border border-gray-200 product-field">
                                        <div class="flex items-center gap-4">
                                            <div class="flex-1">
                                                <label class="block text-sm font-medium text-gray-700">Ürün Adı</label>
                                                <input type="text" name="product_name[]"
                                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                                    placeholder="Ürün adı" required>
                                            </div>

                                            <div class="flex-1">
                                                <label class="block text-sm font-medium text-gray-700">Ürün Açıklaması</label>
                                                <textarea name="product_description[]" rows="1"
                                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                                    placeholder="Ürün açıklaması" required></textarea>
                                            </div>

                                            <div class="w-32">
                                                <label class="block text-sm font-medium text-gray-700">Birim Fiyat</label>
                                                <div class="relative mt-1">
                                                    <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                                                        <span class="text-gray-500 sm:text-sm">₺</span>
                                                    </div>
                                                    <input type="number" name="product_price[]"
                                                        class="block w-full rounded-md border-gray-300 pl-8 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                                        placeholder="0.00" required>
                                                </div>
                                            </div>

                                            <div class="w-24">
                                                <label class="block text-sm font-medium text-gray-700">Miktar</label>
                                                <input type="number" name="product_quantity[]"
                                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                                    min="1" placeholder="1" required>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="flex justify-end">
                            <button type="submit" 
                                class="inline-flex items-center px-6 py-3 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                <svg xmlns="http://www.w3.org/2000/svg" class="-ml-1 mr-3 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                Teklif Oluştur
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function addProductField() {
            const section = document.getElementById('product-section');
            const newField = document.createElement('div');
            newField.className = 'relative bg-gray-50 p-6 rounded-lg border border-gray-200 product-field';
            
            newField.innerHTML = `
                <button type="button" 
                    class="absolute top-0 right-0 text-gray-400 hover:text-red-500"
                    onclick="this.closest('.product-field').remove()">
                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>

                <div class="relative bg-gray-50 p-4 rounded-lg border border-gray-200 product-field">
                                        <div class="flex items-center gap-4">
                                            <div class="flex-1">
                                                <label class="block text-sm font-medium text-gray-700">Ürün Adı</label>
                                                <input type="text" name="product_name[]"
                                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                                    placeholder="Ürün adı" required>
                                            </div>

                                            <div class="flex-1">
                                                <label class="block text-sm font-medium text-gray-700">Ürün Açıklaması</label>
                                                <textarea name="product_description[]" rows="1"
                                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                                    placeholder="Ürün açıklaması" required></textarea>
                                            </div>

                                            <div class="w-32">
                                                <label class="block text-sm font-medium text-gray-700">Birim Fiyat</label>
                                                <div class="relative mt-1">
                                                    <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                                                        <span class="text-gray-500 sm:text-sm">₺</span>
                                                    </div>
                                                    <input type="number" name="product_price[]"
                                                        class="block w-full rounded-md border-gray-300 pl-8 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                                        placeholder="0.00" required>
                                                </div>
                                            </div>

                                            <div class="w-24">
                                                <label class="block text-sm font-medium text-gray-700">Miktar</label>
                                                <input type="number" name="product_quantity[]"
                                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                                    min="1" placeholder="1" required>
                                            </div>
                                        </div>
                                    </div>
            `;
            
            section.appendChild(newField);
        }
    </script>
</x-app-layout>