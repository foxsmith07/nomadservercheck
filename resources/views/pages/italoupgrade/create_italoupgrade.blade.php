<x-layout>
    <a href="{{ route('italoupgrade.index') }}" class="btn btn-sm bg-slate-300 border-slate-400 hover:bg-slate-400 mb-5">
        <i class="fa-regular fa-circle-left me-2 text-lg"></i>
        <span class="text-lg">back</span>
    </a>
    <h1 class="text-3xl mb-8">Aggiungi treno iob upgrade</h1>

    <form method="POST" action="{{ route('italoupgrade.store') }}"
        class="bg-white p-8 max-w-[600px] rounded-md shadow-xl">

        @csrf
        <div class="flex justify-between">
            <div class="flex flex-col text-slate-600">
                <label>Select Train</label>
                <select name="train_id"
                    class="bg-slate-100 p-2 rounded-md outline-0 focus:outline-2 focus:outline-blue-500">
                    <option disabled selected>select train</option>
                    @foreach ($trains as $train)
                        <option value="{{ $train->id }}">{{ $train->name }}</option>
                    @endforeach
                </select>
                @error('train_id')
                    <small class="text-red-500">{{ $message }}</small>
                @enderror
            </div>

            <div class="flex flex-col text-slate-600">
                <label>CCU serial number</label>
                <input type="text" name="serial"
                    class="bg-slate-100 p-2 rounded-md outline-0 focus:outline-2 focus:outline-blue-500">
                @error('serial')
                    <small class="text-red-500">{{ $message }}</small>
                @enderror
            </div>
        </div>


        <div class="flex justify-between my-10">
            <div class="flex flex-col text-slate-600">
                <label>Data start</label>
                <input type="text" name="start" placeholder="es. 10/09/2025"
                    class="bg-slate-100 p-2 rounded-md outline-0 focus:outline-2 focus:outline-blue-500">
                @error('start')
                    <small class="text-red-500">{{ $message }}</small>
                @enderror
            </div>

            <div class="flex flex-col text-slate-600">
                <label>Data end</label>
                <input type="text" name="end" placeholder="es. 10/09/2025"
                    class="bg-slate-100 p-2 rounded-md outline-0 focus:outline-2 focus:outline-blue-500">
                @error('end')
                    <small class="text-red-500">{{ $message }}</small>
                @enderror
            </div>
        </div>

        <div class="flex justify-between">
            <div class="flex flex-col text-slate-600">
                <label>Fluke Test</label>
                <select name="fluke"
                    class="bg-slate-100 outline-0 focus:outline-2 focus:outline-blue-500 p-2 rounded-md">
                    <option selected value="todo">To do</option>
                    <option value="done">Done</option>
                </select>
                @error('fluke')
                    <small class="text-red-500">{{ $message }}</small>
                @enderror
            </div>

            <div class="flex flex-col text-slate-600">
                <label>Commissioning Location</label>
                <select name="location"
                    class="bg-slate-100 p-2 rounded-md outline-0 focus:outline-2 focus:outline-blue-500">
                    <option value="nola">Nola</option>
                    <option value="mestre">Mestre</option>
                </select>
                {{-- <input type="text" name="location" placeholder="es. Nola" class="bg-slate-100 p-2 rounded-md outline-0 focus:outline-2 focus:outline-blue-500"> --}}
                @error('location')
                    <small class="text-red-500">{{ $message }}</small>
                @enderror
            </div>
        </div>

        <div class="flex flex-col text-slate-600 my-5">
            <label>Note</label>
            <textarea name="note" cols="30" rows="10"
                class="bg-slate-100 outline-0 focus:outline-2 focus:outline-blue-500 rounded-md resize-none p-3"></textarea>
        </div>

        <div class="flex justify-end">
            <button class="btn bg-blue-500 text-white hover:bg-blue-700 btn-wide">Aggiungi</button>
        </div>

    </form>
</x-layout>
