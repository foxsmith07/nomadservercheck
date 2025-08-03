<div>
    <form wire:submit.prevent="check" method="POST" class="bg-white rounded-md shadow-xl p-5 flex flex-col gap-8">
        {{-- max-w-[500px] --}}
        <div class="flex flex-col">
            <label class="mb-3">Command to run</label>
            <input type="text" name="cmd" wire:model="cmd" class="input-custom @error('cmd') outline! outline-red-500!  @enderror">
        </div>
        
        <div class="mb-3 flex flex-col">
            <label class="mb-3">Select 1 train or all</label>
            {{-- <select name="train" wire:model="train" class="input-custom {{ $treno == null ? 'outline! outline-red-500!' : ''}}"> --}}
            <select name="train" wire:model="train" class="input-custom">
                <option value="" disabled class="text-gray-400">select train or typology</option>
                <option value="all">All Fleet</option>
                <option value="iob">All Trains IOB</option>
                <option value="deb10">All Trains deb10</option>
                @foreach ($trains as $train)
                <option value="{{ $train->number }}">{{ $train->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn bg-blue-500 text-white" onclick="check.showModal()">
            <span wire:loading wire:target='check'>
                <p class="text-lg">Caricamento <span class="loading loading-dots loading-md ms-3"></span></p>
            </span>
            <span wire:loading.remove wire:target='check'>
                <p class="text-lg">Run command </p>
            </span>
        </button>

    </form>

    <!--? Modale-->
    <dialog id="check" class="modal" wire:ignore.self>

        <div class="bg-white rounded-md shadow-xl p-7 w-full md:w-2/3 h-auto max-h-screen overflow-y-scroll">
            {{-- <div class="modal-box text-center"> --}}
            <h3 class="text-lg font-bold w-full text-center">Check</h3>
            {{-- <p class="py-4">Press ESC key or click the button below to close</p> --}}

            <div wire:loading wire:target='check' class="text-center w-full mt-10">
                <p class="text-lg text-center">Caricamento <span class="loading loading-dots loading-md ms-3"></span></p>
                {{-- <p class="mt-4" wire:poll wire:text>Treni da processare: {{$progress}} di {{$count}}</p> --}}
            </div>
            <div wire:loading.remove wire:target='check' class="mt-10">
                @if ($output)
                    <div class="overflow-x-scroll">
                        <p class="my-5 text-3xl text-blue-500 font-bold">Treno {{ $treno }}</p>
                        <pre class=""{{ $nok == true ? 'text-red-500' : '' }}">{{ $output }}</pre>
                        <hr class="my-6 text-blue-600">
                    </div>
                @elseif ($outputs)
                    <div class="overflow-x-scroll">
                        @foreach ($outputs as $output)
                            <p class="my-5 text-3xl text-blue-500 font-bold">Treno {{ $output['number'] }}</p>
                            <pre class="{{ $output['nok'] == true ? 'text-red-500' : '' }}">{{ $output['output'] }}</pre>
                            <hr class="my-6 text-blue-600">
                        @endforeach

                    </div>
                @endif

                @if (empty($cmd))
                {{-- @if ($cmd == '') --}}
                    <div>
                        <p class=" text-red-500 text-lg">Devi Aggiungere il comando</p>
                    </div>
                @endif
                @if ($treno == null and !$output and !$outputs)
                    <div>
                        <p class=" text-red-500 text-lg">Devi selezionare un treno o una tipologia</p>
                    </div>
                @endif

            </div>
            <div class="modal-action">
                <form method="dialog">
                    <!-- if there is a button in form, it will close the modal -->
                    <button class="btn" wire:loading.remove wire:target="check">Close</button>
                </form>
            </div>
        </div>
    </dialog>
</div>