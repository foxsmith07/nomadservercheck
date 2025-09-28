<x-layout>
    <div class="flex justify-between mb-5">
        <h1 class="text-3xl">STOCK MANAGEMENT</h1>
        {{-- <a href="{{ route('siv.create') }}" class="btn border-none shadow-xl bg-blue-500 hover:bg-blue-700 text-white rounded-md">
            <i class="fa-solid fa-circle-plus me-2 text-lg"></i>
            Add Siv Request
        </a> --}}
        <div></div>
    </div>

    {{--? TABS --}}
    <!-- name of each tab group should be unique -->
    <div class="tabs tabs-lift">

        {{--? INVENTORY TAB--}}
        <label class="tab">
            <input type="radio" name="my_tabs_4" />

            <i class="fa-solid fa-clipboard-list me-2 text-lg"></i>
            Inventory
        </label>

        {{--? INVENTORY CONTENT --}}
        <div class="tab-content bg-base-100 border-base-300 p-6">Tab content 1</div>


        {{--? SUMMARY TAB --}}
        <label class="tab">
            <input type="radio" name="my_tabs_4" checked="checked" />
            <i class="fa-solid fa-cart-flatbed me-2 text-lg"></i>
            Summary
        </label>

        {{--? SUMMARY CONTENT --}}
        <div class="tab-content bg-base-100 border-base-300 p-6">
            
            <x-stock_tab.summary 
                :count=$item_count 
                :esauriti=$esauriti 
                :ordinati=$ordinati 
                :arrivo=$arrivo 
                
            />

        </div>


        {{--! TAB 3 --}}
        <label class="tab">
            <input type="radio" name="my_tabs_4" />
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="size-4 me-2">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
            </svg>
            Love
        </label>
        <div class="tab-content bg-base-100 border-base-300 p-6">Tab content 3</div>
    </div>

</x-layout>
