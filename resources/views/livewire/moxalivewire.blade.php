<div>
    {{-- <button class="btn btn-wide bg-blue-400 text-white" wire:click="check" wire:loading.attr="disabled">
        check!
        <span wire:loading>Loading</span>
    </button> --}}


    <div class="tabs tabs-lift">
        {{-- --------------------------------------------------------------------------- --}}
        {{-- *  CONTENT 1 - AGV --}}
        {{-- ---------------------------------------------------------------------------- --}}
        <input type="radio" name="my_tabs_3" class="tab" aria-label="AGV" checked="checked" />
        <div class="tab-content bg-base-100 border-base-300 p-6">
            <div class="overflow-x-auto rounded-box border border-base-content/5 bg-base-100 mt-5">
                <table class="table">
                    <!-- head -->
                    <thead>
                        <tr class="bg-slate-800 text-white">
                            <th colspan="100%" class="text-center text-2xl">AGV TRAINS</th>
                        </tr>
                        <tr class="text-center bg-slate-700 text-white">
                            <th class="text-start">Train</th>
                            <th>Switch 1</th>
                            <th>Switch 2</th>
                            <th>Switch 3</th>
                            <th>Switch 4</th>
                            <th>Switch 5</th>
                            <th>Switch 6</th>
                            <th>Switch 7</th>
                            <th>Switch 8</th>
                            <th>Switch 9</th>
                            <th>Switch 10</th>
                            <th>Switch 11</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- row 1 -->
                        @forelse ($trainsiobagv as $train)
                            <tr class="hover:bg-slate-300 border-b-1 border-slate-400 text-[12px]">
                                <th>
                                    <div class="flex flex-col items-center gap-2">
                                        <span>{{ $train->name }}</span>
                                        <button type="submit" wire:click="check({{$train->id}})" wire:loading.attr="disabled"
                                                class="btn btn-sm bg-sky-500 text-white hover:bg-sky-700 border-none shadow-md">
                                                <span wire:loading.remove>Check</span>
                                                <span wire:loading>Checking</span>
                                        </button>
                                    </div>
                                </th>
                                <td>
                                    <div class="flex flex-col gap-1">

                                        <div class="text-center flex">
                                            <span class="w-1/3 border border-slate-400 rounded-s-md">P1</span>
                                            <span class="w-2/3 border border-slate-400 rounded-e-md bg-emerald-500 text-white"> 10 Gbps</span>
                                        </div>
                                        <div class="text-center flex">
                                            <span class="w-1/3 border border-slate-400 rounded-s-md">P2</span>
                                            <span class="w-2/3 border border-slate-400 rounded-e-md bg-yellow-400 text-white"> 10 Gbps</span>
                                        </div>

                                        <div class="text-center flex">
                                            <span class="w-1/3 border border-slate-400 rounded-s-md">P13</span>
                                            <span class="w-2/3 border border-slate-400 rounded-e-md bg-emerald-500 text-white"> 10 Gbps</span>
                                        </div>

                                        <div class="text-center flex">
                                            <span class="w-1/3 border border-slate-400 rounded-s-md">P14</span>
                                            <span class="w-2/3 border border-slate-400 rounded-e-md bg-emerald-500 text-white"> 10 Gbps</span>
                                        </div>

                                    </div>
                                </td>
                                <td>
                                    <div class="flex flex-col gap-1">

                                        <div class="text-center flex">
                                            <span class="w-1/3 border border-slate-400 rounded-s-md">P1</span>
                                            <span class="w-2/3 border border-slate-400 rounded-e-md bg-emerald-500 text-white"> 10 Gbps</span>
                                        </div>
                                        <div class="text-center flex">
                                            <span class="w-1/3 border border-slate-400 rounded-s-md">P2</span>
                                            <span class="w-2/3 border border-slate-400 rounded-e-md bg-emerald-500 text-white"> 10 Gbps</span>
                                        </div>

                                        <div class="text-center flex">
                                            <span class="w-1/3 border border-slate-400 rounded-s-md">P13</span>
                                            <span class="w-2/3 border border-slate-400 rounded-e-md bg-rose-400 text-white"> 10 Gbps</span>
                                        </div>

                                        <div class="text-center flex">
                                            <span class="w-1/3 border border-slate-400 rounded-s-md">P14</span>
                                            <span class="w-2/3 border border-slate-400 rounded-e-md bg-emerald-500 text-white"> 10 Gbps</span>
                                        </div>

                                    </div>
                                </td>
                                <td>
                                    <div class="flex flex-col gap-1">
                                        
                                        <div class="text-center flex">
                                            <span class="w-1/3 border border-slate-400 rounded-s-md">P1</span>
                                            <span class="w-2/3 border border-slate-400 rounded-e-md bg-emerald-500 text-white"> 10 Gbps</span>
                                        </div>
                                        <div class="text-center flex">
                                            <span class="w-1/3 border border-slate-400 rounded-s-md">P2</span>
                                            <span class="w-2/3 border border-slate-400 rounded-e-md bg-emerald-500 text-white"> 10 Gbps</span>
                                        </div>

                                        <div class="text-center flex">
                                            <span class="w-1/3 border border-slate-400 rounded-s-md">P13</span>
                                            <span class="w-2/3 border border-slate-400 rounded-e-md bg-rose-400 text-white"> 10 Gbps</span>
                                        </div>

                                        <div class="text-center flex">
                                            <span class="w-1/3 border border-slate-400 rounded-s-md">P14</span>
                                            <span class="w-2/3 border border-slate-400 rounded-e-md bg-emerald-500 text-white"> 10 Gbps</span>
                                        </div>

                                    </div>
                                </td>

                                <td>
                                    <div class="flex flex-col gap-1">
                                        
                                        <div class="text-center flex">
                                            <span class="w-1/3 border border-slate-400 rounded-s-md">P1</span>
                                            <span class="w-2/3 border border-slate-400 rounded-e-md bg-emerald-500 text-white"> 10 Gbps</span>
                                        </div>
                                        <div class="text-center flex">
                                            <span class="w-1/3 border border-slate-400 rounded-s-md">P2</span>
                                            <span class="w-2/3 border border-slate-400 rounded-e-md bg-emerald-500 text-white"> 10 Gbps</span>
                                        </div>

                                        <div class="text-center flex">
                                            <span class="w-1/3 border border-slate-400 rounded-s-md">P13</span>
                                            <span class="w-2/3 border border-slate-400 rounded-e-md bg-rose-400 text-white"> 10 Gbps</span>
                                        </div>

                                        <div class="text-center flex">
                                            <span class="w-1/3 border border-slate-400 rounded-s-md">P14</span>
                                            <span class="w-2/3 border border-slate-400 rounded-e-md bg-emerald-500 text-white"> 10 Gbps</span>
                                        </div>

                                    </div>
                                </td>
                                <td>
                                    <div class="flex flex-col gap-1">
                                        
                                        <div class="text-center flex">
                                            <span class="w-1/3 border border-slate-400 rounded-s-md">P1</span>
                                            <span class="w-2/3 border border-slate-400 rounded-e-md bg-emerald-500 text-white"> 10 Gbps</span>
                                        </div>
                                        <div class="text-center flex">
                                            <span class="w-1/3 border border-slate-400 rounded-s-md">P2</span>
                                            <span class="w-2/3 border border-slate-400 rounded-e-md bg-emerald-500 text-white"> 10 Gbps</span>
                                        </div>

                                        <div class="text-center flex">
                                            <span class="w-1/3 border border-slate-400 rounded-s-md">P13</span>
                                            <span class="w-2/3 border border-slate-400 rounded-e-md bg-rose-400 text-white"> 10 Gbps</span>
                                        </div>

                                        <div class="text-center flex">
                                            <span class="w-1/3 border border-slate-400 rounded-s-md">P14</span>
                                            <span class="w-2/3 border border-slate-400 rounded-e-md bg-emerald-500 text-white"> 10 Gbps</span>
                                        </div>

                                    </div>
                                </td>
                                <td>
                                    <div class="flex flex-col gap-1">
                                        
                                        <div class="text-center flex">
                                            <span class="w-1/3 border border-slate-400 rounded-s-md">P1</span>
                                            <span class="w-2/3 border border-slate-400 rounded-e-md bg-emerald-500 text-white"> 10 Gbps</span>
                                        </div>
                                        <div class="text-center flex">
                                            <span class="w-1/3 border border-slate-400 rounded-s-md">P2</span>
                                            <span class="w-2/3 border border-slate-400 rounded-e-md bg-emerald-500 text-white"> 10 Gbps</span>
                                        </div>

                                        <div class="text-center flex">
                                            <span class="w-1/3 border border-slate-400 rounded-s-md">P13</span>
                                            <span class="w-2/3 border border-slate-400 rounded-e-md bg-rose-400 text-white"> 10 Gbps</span>
                                        </div>

                                        <div class="text-center flex">
                                            <span class="w-1/3 border border-slate-400 rounded-s-md">P14</span>
                                            <span class="w-2/3 border border-slate-400 rounded-e-md bg-emerald-500 text-white"> 10 Gbps</span>
                                        </div>

                                    </div>
                                </td>

                                <td>
                                    <div class="flex flex-col gap-1">
                                        
                                        <div class="text-center flex">
                                            <span class="w-1/3 border border-slate-400 rounded-s-md">P1</span>
                                            <span class="w-2/3 border border-slate-400 rounded-e-md bg-emerald-500 text-white"> 10 Gbps</span>
                                        </div>
                                        <div class="text-center flex">
                                            <span class="w-1/3 border border-slate-400 rounded-s-md">P2</span>
                                            <span class="w-2/3 border border-slate-400 rounded-e-md bg-emerald-500 text-white"> 10 Gbps</span>
                                        </div>

                                        <div class="text-center flex">
                                            <span class="w-1/3 border border-slate-400 rounded-s-md">P13</span>
                                            <span class="w-2/3 border border-slate-400 rounded-e-md bg-rose-400 text-white"> 10 Gbps</span>
                                        </div>

                                        <div class="text-center flex">
                                            <span class="w-1/3 border border-slate-400 rounded-s-md">P14</span>
                                            <span class="w-2/3 border border-slate-400 rounded-e-md bg-emerald-500 text-white"> 10 Gbps</span>
                                        </div>

                                    </div>
                                </td>

                                <td>
                                    <div class="flex flex-col gap-1">
                                        
                                        <div class="text-center flex">
                                            <span class="w-1/3 border border-slate-400 rounded-s-md">P1</span>
                                            <span class="w-2/3 border border-slate-400 rounded-e-md bg-emerald-500 text-white"> 10 Gbps</span>
                                        </div>
                                        <div class="text-center flex">
                                            <span class="w-1/3 border border-slate-400 rounded-s-md">P2</span>
                                            <span class="w-2/3 border border-slate-400 rounded-e-md bg-emerald-500 text-white"> 10 Gbps</span>
                                        </div>

                                        <div class="text-center flex">
                                            <span class="w-1/3 border border-slate-400 rounded-s-md">P13</span>
                                            <span class="w-2/3 border border-slate-400 rounded-e-md bg-rose-400 text-white"> 10 Gbps</span>
                                        </div>

                                        <div class="text-center flex">
                                            <span class="w-1/3 border border-slate-400 rounded-s-md">P14</span>
                                            <span class="w-2/3 border border-slate-400 rounded-e-md bg-emerald-500 text-white"> 10 Gbps</span>
                                        </div>

                                    </div>
                                </td>

                                <td>
                                    <div class="flex flex-col gap-1">
                                        
                                        <div class="text-center flex">
                                            <span class="w-1/3 border border-slate-400 rounded-s-md">P1</span>
                                            <span class="w-2/3 border border-slate-400 rounded-e-md bg-emerald-500 text-white"> 10 Gbps</span>
                                        </div>
                                        <div class="text-center flex">
                                            <span class="w-1/3 border border-slate-400 rounded-s-md">P2</span>
                                            <span class="w-2/3 border border-slate-400 rounded-e-md bg-emerald-500 text-white"> 10 Gbps</span>
                                        </div>

                                        <div class="text-center flex">
                                            <span class="w-1/3 border border-slate-400 rounded-s-md">P13</span>
                                            <span class="w-2/3 border border-slate-400 rounded-e-md bg-rose-400 text-white"> 10 Gbps</span>
                                        </div>

                                        <div class="text-center flex">
                                            <span class="w-1/3 border border-slate-400 rounded-s-md">P14</span>
                                            <span class="w-2/3 border border-slate-400 rounded-e-md bg-emerald-500 text-white"> 10 Gbps</span>
                                        </div>

                                    </div>
                                </td>

                                <td>
                                    <div class="flex flex-col gap-1">
                                        
                                        <div class="text-center flex">
                                            <span class="w-1/3 border border-slate-400 rounded-s-md">P1</span>
                                            <span class="w-2/3 border border-slate-400 rounded-e-md bg-emerald-500 text-white"> 10 Gbps</span>
                                        </div>
                                        <div class="text-center flex">
                                            <span class="w-1/3 border border-slate-400 rounded-s-md">P2</span>
                                            <span class="w-2/3 border border-slate-400 rounded-e-md bg-emerald-500 text-white"> 10 Gbps</span>
                                        </div>

                                        <div class="text-center flex">
                                            <span class="w-1/3 border border-slate-400 rounded-s-md">P13</span>
                                            <span class="w-2/3 border border-slate-400 rounded-e-md bg-rose-400 text-white"> 10 Gbps</span>
                                        </div>

                                        <div class="text-center flex">
                                            <span class="w-1/3 border border-slate-400 rounded-s-md">P14</span>
                                            <span class="w-2/3 border border-slate-400 rounded-e-md bg-emerald-500 text-white"> 10 Gbps</span>
                                        </div>

                                    </div>
                                </td>

                                <td>
                                    <div class="flex flex-col gap-1">

                                        <div class="text-center flex">
                                            <span class="w-1/3 border border-slate-400 rounded-s-md">P1</span>
                                            <span class="w-2/3 border border-slate-400 rounded-e-md bg-emerald-500 text-white"> 10 Gbps</span>
                                        </div>

                                        <div class="text-center flex">
                                            <span class="w-1/3 border border-slate-400 rounded-s-md">P2</span>
                                            <span class="w-2/3 border border-slate-400 rounded-e-md bg-emerald-500 text-white"> 10 Gbps</span>
                                        </div>

                                        <div class="text-center flex">
                                            <span class="w-1/3 border border-slate-400 rounded-s-md">P9</span>
                                            <span class="w-2/3 border border-slate-400 rounded-e-md bg-emerald-500 text-white"> 10 Gbps</span>
                                        </div>

                                        <div class="text-center flex">
                                            <span class="w-1/3 border border-slate-400 rounded-s-md">P10</span>
                                            <span class="w-2/3 border border-slate-400 rounded-e-md bg-emerald-500 text-white"> 10 Gbps</span>
                                        </div>

                                        <div class="text-center flex">
                                            <span class="w-1/3 border border-slate-400 rounded-s-md">P11</span>
                                            <span class="w-2/3 border border-slate-400 rounded-e-md bg-emerald-500 text-white"> 10 Gbps</span>
                                        </div>

                                        <div class="text-center flex">
                                            <span class="w-1/3 border border-slate-400 rounded-s-md">P12</span>
                                            <span class="w-2/3 border border-slate-400 rounded-e-md bg-emerald-500 text-white"> 10 Gbps</span>
                                        </div>

                                        <div class="text-center flex">
                                            <span class="w-1/3 border border-slate-400 rounded-s-md">P13</span>
                                            <span class="w-2/3 border border-slate-400 rounded-e-md bg-emerald-500 text-white"> 10 Gbps</span>
                                        </div>

                                        <div class="text-center flex">
                                            <span class="w-1/3 border border-slate-400 rounded-s-md">P14</span>
                                            <span class="w-2/3 border border-slate-400 rounded-e-md bg-emerald-500 text-white"> 10 Gbps</span>
                                        </div>

                                    </div>
                                </td>



                            </tr>

                        @empty
                            <tr>
                                <th>
                                    No trains
                                </th>
                            </tr>
                        @endforelse

                    </tbody>
                </table>
            </div>
        </div>




        {{-- --------------------------------------------------------------------------- --}}
        {{-- *  CONTENT 2 evo --}}
        {{-- ---------------------------------------------------------------------------- --}}

        <input type="radio" name="my_tabs_3" class="tab" aria-label="EVO" />
        <div class="tab-content bg-base-100 border-base-300 p-6">
            {{-- ! EVO TRAINS --}}
            <div class="overflow-x-auto rounded-box border border-base-content/5 bg-base-100 mt-5">
                <table class="table">
                    <!-- head -->
                    <thead>
                        <tr class="bg-slate-800 text-white">
                            <th colspan="100%" class="text-center text-2xl">EVO TRAINS</th>
                        </tr>
                        <tr class="text-center bg-slate-700 text-white">
                            <th class="text-start">Train</th>
                            <th>Switch 1</th>
                            <th>Switch 2</th>
                            <th>Switch 3</th>
                            <th>Switch 4</th>
                            <th>Switch 5</th>
                            <th>Switch 6</th>
                            <th>Switch 7</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- row 1 -->
                        @forelse ($trainsiobevo as $train)
                            <tr class="hover:bg-slate-300 border-b-1 border-slate-400 text-[12px]">
                                <th>{{ $train->name }}</th>
                                <td>
                                    <div class="flex flex-col gap-1">

                                        <div class="text-center flex">
                                            <span class="w-1/3 border border-slate-400 rounded-s-md">P1</span>
                                            <span class="w-2/3 border border-slate-400 rounded-e-md bg-emerald-500 text-white"> 10 Gbps</span>
                                        </div>
                                        <div class="text-center flex">
                                            <span class="w-1/3 border border-slate-400 rounded-s-md">P2</span>
                                            <span class="w-2/3 border border-slate-400 rounded-e-md bg-emerald-500 text-white"> 10 Gbps</span>
                                        </div>

                                        <div class="text-center flex">
                                            <span class="w-1/3 border border-slate-400 rounded-s-md">P13</span>
                                            <span class="w-2/3 border border-slate-400 rounded-e-md bg-rose-400 text-white"> 10 Gbps</span>
                                        </div>

                                        <div class="text-center flex">
                                            <span class="w-1/3 border border-slate-400 rounded-s-md">P14</span>
                                            <span class="w-2/3 border border-slate-400 rounded-e-md bg-emerald-500 text-white"> 10 Gbps</span>
                                        </div>

                                    </div>
                                </td>

                                <td>
                                    <div class="flex flex-col gap-1">

                                        <div class="text-center flex">
                                            <span class="w-1/3 border border-slate-400 rounded-s-md">P1</span>
                                            <span class="w-2/3 border border-slate-400 rounded-e-md bg-emerald-500 text-white"> 10 Gbps</span>
                                        </div>
                                        <div class="text-center flex">
                                            <span class="w-1/3 border border-slate-400 rounded-s-md">P2</span>
                                            <span class="w-2/3 border border-slate-400 rounded-e-md bg-emerald-500 text-white"> 10 Gbps</span>
                                        </div>

                                        <div class="text-center flex">
                                            <span class="w-1/3 border border-slate-400 rounded-s-md">P13</span>
                                            <span class="w-2/3 border border-slate-400 rounded-e-md bg-rose-400 text-white"> 10 Gbps</span>
                                        </div>

                                        <div class="text-center flex">
                                            <span class="w-1/3 border border-slate-400 rounded-s-md">P14</span>
                                            <span class="w-2/3 border border-slate-400 rounded-e-md bg-emerald-500 text-white"> 10 Gbps</span>
                                        </div>

                                    </div>
                                </td>

                                <td>
                                    <div class="flex flex-col gap-1">

                                        <div class="text-center flex">
                                            <span class="w-1/3 border border-slate-400 rounded-s-md">P1</span>
                                            <span class="w-2/3 border border-slate-400 rounded-e-md bg-emerald-500 text-white"> 10 Gbps</span>
                                        </div>
                                        <div class="text-center flex">
                                            <span class="w-1/3 border border-slate-400 rounded-s-md">P2</span>
                                            <span class="w-2/3 border border-slate-400 rounded-e-md bg-emerald-500 text-white"> 10 Gbps</span>
                                        </div>

                                        <div class="text-center flex">
                                            <span class="w-1/3 border border-slate-400 rounded-s-md">P13</span>
                                            <span class="w-2/3 border border-slate-400 rounded-e-md bg-rose-400 text-white"> 10 Gbps</span>
                                        </div>

                                        <div class="text-center flex">
                                            <span class="w-1/3 border border-slate-400 rounded-s-md">P14</span>
                                            <span class="w-2/3 border border-slate-400 rounded-e-md bg-emerald-500 text-white"> 10 Gbps</span>
                                        </div>

                                    </div>
                                </td>

                                <td>
                                    <div class="flex flex-col gap-1">
                                        
                                        <div class="text-center flex">
                                            <span class="w-1/3 border border-slate-400 rounded-s-md">P1</span>
                                            <span class="w-2/3 border border-slate-400 rounded-e-md bg-emerald-500 text-white"> 10 Gbps</span>
                                        </div>
                                        <div class="text-center flex">
                                            <span class="w-1/3 border border-slate-400 rounded-s-md">P2</span>
                                            <span class="w-2/3 border border-slate-400 rounded-e-md bg-emerald-500 text-white"> 10 Gbps</span>
                                        </div>

                                        <div class="text-center flex">
                                            <span class="w-1/3 border border-slate-400 rounded-s-md">P13</span>
                                            <span class="w-2/3 border border-slate-400 rounded-e-md bg-rose-400 text-white"> 10 Gbps</span>
                                        </div>

                                        <div class="text-center flex">
                                            <span class="w-1/3 border border-slate-400 rounded-s-md">P14</span>
                                            <span class="w-2/3 border border-slate-400 rounded-e-md bg-emerald-500 text-white"> 10 Gbps</span>
                                        </div>

                                    </div>
                                </td>

                                <td>
                                    <div class="flex flex-col gap-1">

                                        <div class="text-center flex">
                                            <span class="w-1/3 border border-slate-400 rounded-s-md">P1</span>
                                            <span class="w-2/3 border border-slate-400 rounded-e-md bg-emerald-500 text-white"> 10 Gbps</span>
                                        </div>
                                        <div class="text-center flex">
                                            <span class="w-1/3 border border-slate-400 rounded-s-md">P2</span>
                                            <span class="w-2/3 border border-slate-400 rounded-e-md bg-emerald-500 text-white"> 10 Gbps</span>
                                        </div>

                                        <div class="text-center flex">
                                            <span class="w-1/3 border border-slate-400 rounded-s-md">P13</span>
                                            <span class="w-2/3 border border-slate-400 rounded-e-md bg-rose-400 text-white"> 10 Gbps</span>
                                        </div>

                                        <div class="text-center flex">
                                            <span class="w-1/3 border border-slate-400 rounded-s-md">P14</span>
                                            <span class="w-2/3 border border-slate-400 rounded-e-md bg-emerald-500 text-white"> 10 Gbps</span>
                                        </div>

                                </td>

                                <td>
                                    <div class="flex flex-col gap-1">

                                        <div class="text-center flex">
                                            <span class="w-1/3 border border-slate-400 rounded-s-md">P1</span>
                                            <span class="w-2/3 border border-slate-400 rounded-e-md bg-emerald-500 text-white"> 10 Gbps</span>
                                        </div>
                                        <div class="text-center flex">
                                            <span class="w-1/3 border border-slate-400 rounded-s-md">P2</span>
                                            <span class="w-2/3 border border-slate-400 rounded-e-md bg-emerald-500 text-white"> 10 Gbps</span>
                                        </div>

                                        <div class="text-center flex">
                                            <span class="w-1/3 border border-slate-400 rounded-s-md">P13</span>
                                            <span class="w-2/3 border border-slate-400 rounded-e-md bg-rose-400 text-white"> 10 Gbps</span>
                                        </div>

                                        <div class="text-center flex">
                                            <span class="w-1/3 border border-slate-400 rounded-s-md">P14</span>
                                            <span class="w-2/3 border border-slate-400 rounded-e-md bg-emerald-500 text-white"> 10 Gbps</span>
                                        </div>

                                    </div>
                                </td>

                                <td>
                                    <div class="flex flex-col gap-1">

                                        <div class="text-center flex">
                                            <span class="w-1/3 border border-slate-400 rounded-s-md">P1</span>
                                            <span class="w-2/3 border border-slate-400 rounded-e-md bg-emerald-500 text-white"> 10 Gbps</span>
                                        </div>
                                        <div class="text-center flex">
                                            <span class="w-1/3 border border-slate-400 rounded-s-md">P2</span>
                                            <span class="w-2/3 border border-slate-400 rounded-e-md bg-emerald-500 text-white"> 10 Gbps</span>
                                        </div>

                                        <div class="text-center flex">
                                            <span class="w-1/3 border border-slate-400 rounded-s-md">P13</span>
                                            <span class="w-2/3 border border-slate-400 rounded-e-md bg-rose-400 text-white"> 10 Gbps</span>
                                        </div>

                                        <div class="text-center flex">
                                            <span class="w-1/3 border border-slate-400 rounded-s-md">P14</span>
                                            <span class="w-2/3 border border-slate-400 rounded-e-md bg-emerald-500 text-white"> 10 Gbps</span>
                                        </div>

                                    </div>
                                </td>

                            </tr>

                        @empty
                            <tr>
                                <th>
                                    No trains
                                </th>
                            </tr>
                        @endforelse

                    </tbody>
                </table>
            </div>
        </div>

    </div>
















</div>
