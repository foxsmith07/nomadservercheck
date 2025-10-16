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
        <label class="tab text-slate-700 hover:text-slate-700">
            <input type="radio" name="my_tabs_4" checked="checked" />

            <i class="fa-solid fa-clipboard-list me-2 text-lg"></i>
            Inventory
        </label>

        {{--? INVENTORY CONTENT --}}
        <div class="tab-content bg-base-100 border-base-300 p-6">
            <livewire-inventorylivewire />
        </div>


        {{--? SUMMARY TAB --}}
        <label class="tab text-slate-700 hover:text-slate-700">
            <input type="radio" name="my_tabs_4" />
            <i class="fa-solid fa-cart-flatbed me-2 text-lg"></i>
            Summary
        </label>

        {{--? SUMMARY CONTENT --}}
        <div class="tab-content bg-base-100 border-base-300 p-6">
            {{-- @dd($item_count) --}}
            <x-stock_tab.summary 
                :item_count="$item_count"
                :esauriti_count=$esauriti_count 
                :ordinati_count=$ordinati_count
                :arrivo_count=$arrivo_count
                :esauriti=$esauriti 
                :ordinati=$ordinati 
                :arrivo=$arrivo 
            />
        </div>


        {{--! TAB 3 --}}
        {{-- <label class="tab text-slate-700 hover:text-slate-700">
            <input type="radio" name="my_tabs_4" />
            <i class="fa-solid fa-question"></i>
            <i class="fa-solid fa-question me-2"></i>
            Qualcosa
        </label>
        <div class="tab-content bg-base-100 border-base-300 p-6">Tab content 3</div> --}}
    </div>

</x-layout>

@session('success')
    <script>
        Swal.fire({
            position: "center",
            icon: "success",
            title: "{{ session('success') }}",
            showConfirmButton: false,
            timer: 3000
        });
    </script>
@endsession
