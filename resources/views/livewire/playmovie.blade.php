<div>

    {{-- ? FORM TRENO / SEARCH --}}

    <form wire:submit="play" method="POST" class="bg-white p-8 max-w-[500px] rounded-md shadow-xl">
        <div class="mb-5">
            <label class="block mb-3">Train</label>
            <select wire:model="train" class="rounded-md p-2 w-full bg-slate-100 input-custom">
                <option value="">seleziona treno</option>
                @foreach ($cinema as $train)
                    <option value="{{ $train }}">AGV {{ $train }}</option>
                @endforeach
            </select>
        </div>

        <div class="my-10">
            <label class="block mb-3">Insert Movie to search</label>
            <input type="text" wire:model="search" class="bg-slate-100 w-full p-2 rounded-sm input-custom"
                placeholder="vuoto per lista completa">
        </div>

        <button type="submit" class="btn bg-blue-500 text-white rounded-sm w-1/2" onclick="search.showModal()">
            <span>Search movie</span>
        </button>
    </form>



    {{-- ? MODALE MOVIE --}}

    <dialog id="search" class="modal" wire:ignore.self>
        <div class="modal-box w-11/12 max-w-5xl text-center">
            <div wire:loading wire:target="play">
                <p class="text-lg mt-10">Caricamento <span class="ms-3 loading loading-dots loading-md"></span></p>
            </div>
            <div wire:loading wire:target="run">
                <p class="text-lg mt-10">Lanciando il film <span class="ms-3 loading loading-dots loading-md"></span></p>
            </div>

            <div wire:loading.remove wire:target="play,run" class="{{ $output ? 'hidden' : '' }}">
                @if ($movies)
                    <h3 class="text-lg font-bold mb-7">Seleziona movies</h3>
                    @php
                        // $moviesArray = explode("\n", $movies);
                        $moviesArray = array_filter(explode("\n", $movies));
                    @endphp
                    {{-- <small>trovati {{$moviesArray->count()}} film</small> --}}
                    <ul>
                        @foreach ($moviesArray as $movie)
                            {{-- <li class=" cursor-pointer hover:bg-red-100 p-2"
                                onclick="selectMovie('{{ trim($movie) }}')">{{ trim($movie) }}
                            </li> --}}
                            <li class=" cursor-pointer hover:bg-red-100 p-2"
                                onclick="selectMovie('{{ trim($movie) }}')" x-data
                                @click="$wire.film = '{{ trim($movie) }}'" 
                                {{-- wire:click="$set('film', '{{ trim($movie) }}')" --}}
                                >{{ trim($movie) }}
                            </li>
                        @endforeach
                    </ul>

                    <form method="POST" wire:submit='run'>

                        <div class="mt-8">
                            <input type="text" id="selectedMovie" wire:model="film"
                                class="shadow-lg rounded-md p-2 w-full sm:w-96 input-custom" readonly
                                value="{{ trim($movie) }}" placeholder="Clicca sul film per selezionarlo">
                        </div>

                        <input type="text" wire:model="train" class="hidden" value="{{ $train }}">
                        {{-- <input type="text" wire:model="film" class="hidden" value="{{ trim($movie) }}"> --}}

                        <button type="submit"
                            class="btn bg-red-400 hover:bg-red-600 text-white mt-10 rounded-sm text-xl w-48 shadow-xl"><i
                                class="fa-solid fa-play"></i> play
                        </button>

                    </form>
                @endif

                @if ($unreachable)
                    <h3 class="text-lg font-bold mb-7">Train {{ $this->train }}</h3>
                    <p class="text-red-400">{{ $unreachable }}</p>
                @endif

                @if ($this->train == null)
                    <p class="text-lg text-red-500">Devi selezionare il treno</p>
                @endif

                {{-- @if ($output)
                    <div>
                        <p class="text-lg">Output:</p>
                        <p class="text-lg">{{ $output }}</p>
                    </div>
                @endif --}}

            </div>
            <div wire:loading.remove wire:target="play,run">
                @if ($output)
                    <p class="text-xl font-bold mb-5">Output Treno {{$this->train}}:</p>
                    <p>{{ $output }}</p>
                @endif
            </div>
            <div class="modal-action">
                <form method="dialog" wire:loading.remove>
                    <!-- if there is a button, it will close the modal -->
                    <button class="btn">Close</button>
                </form>
            </div>
        </div>
    </dialog>


    {{-- <script>
        function selectMovie(movieName) {
            document.getElementById('selectedMovie').value = movieName;
        }
    </script> --}}

    <script>
        function selectMovie(movieName) {
            document.getElementById('selectedMovie').value = movieName;
            window.Livewire.find('{{ $this->getId() }}').set('film', movieName);
        }
    </script>
</div>
