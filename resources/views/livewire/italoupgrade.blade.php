<div>
    <div class="flex justify-between items-center mb-10">
        <h1 class="text-3xl">ITALO UPGRADE ROADMAP</h1>
        <button class="btn btn-md bg-blue-500 border-none text-white hover:bg-blue-700"
            onclick="aggiungi.showModal()">Aggiungi treno</button>
    </div>

    <div class="overflow-x-auto rounded-box border border-base-content/5 bg-base-100">
        <table class="table">
            <!-- head -->
            <thead class="text-center">
                <tr class="bg-slate-300">
                    <th class="w-[100px]">Train</th>
                    <th class="w-[100px]">CCU Serial number</th>
                    <th class="w-[80px]">data start</th>
                    <th class="w-[80px]">data end</th>
                    <th class="w-[100px]">Location</th>
                    <th class="w-[80px]">Fluke Test</th>
                    <th>Note</th>
                    <th class="w-[80px]">Actions</th>
                </tr>
            </thead>
            <tbody class="text-center">
                <!-- row 1 -->
                @forelse ($roadmap as $item)
                    <tr class="hover:bg-slate-200">
                        <form method="post" wire:submit.prevent="update({{$item->id}})">
                            <th>{{ $item->train->name }}</th>

                            <td class="m-0 p-0">
                                <input type="text" wire:model.change="serial" class="p-2" placeholder="{{$item->serial}}">
                            </td>

                            <td class="m-0 p-0">
                                <input type="text" wire:model.change="start" class="p-2" placeholder="{{$item->start}}">
                            </td>

                            <td>
                                <input type="text" wire:model.change="end" class="p-2" placeholder="{{$item->end}}">
                            </td>

                            <td>
                                <input type="text" wire:model.change="location" class="p-2" placeholder="{{$item->location}}">
                            </td>
                            <td>
                                <select wire:model.change="fluke" class="p-2">
                                    <option {{$item->fluke == 'done' ? 'selected' : ''}} value="done">Done</option>
                                    <option {{$item->fluke == 'todo' ? 'selected' : ''}} value="todo">to do</option>
                                </select>
                            </td>
                            <td>
                                <input type="text" wire:model.change="note" class="p-2" placeholder="{{$item->note}}">
                            </td>
                            <td>
                                <button class="btn btn-sm bg-emerald-500 text-white hover:bg-emerald-700">Save</button>
                            </td>
                        </form>
                    </tr>
                @empty
                    <tr>
                        <th colspan="100%">No Train added yet</th>
                    </tr>
                @endforelse

            </tbody>
        </table>
    </div>



    {{-- dialog --}}
    <dialog id="aggiungi" class="modal modal-top" wire:ignore.self>
        <div class="modal-box w-6/12 mx-auto">
            <form method="dialog">
                <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
            </form>
            <h3 class="text-lg font-bold text-center my-10">Aggiungi treno iob upgrade</h3>

            <form method="POST" class="p-10" wire:submit.prevent="save">
                <div class="flex justify-between">
                    <div class="flex flex-col text-slate-600">
                        <label>Select Train</label>
                        <select wire:model="train_id" class="p-2 rounded-md border border-slate-500">
                            <option>select train</option>
                            @foreach ($trains as $train)
                                <option value="{{ $train->id }}" wire:key="{{$train->id}}">{{ $train->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="flex flex-col text-slate-600">
                        <label>CCU serial number</label>
                        <input type="text" wire:model="serial" class="p-2 rounded-md border border-slate-500">
                    </div>

                    <div class="flex flex-col text-slate-600">
                        <label>Fluke Test</label>
                        <select wire:model.live="fluke" class="border border-slate-500 p-2 rounded-md {{$fluke == 'done' ? 'bg-green-500' : 'bg-red-500'}} text-white">
                            <option>seleziona</option>
                            <option selected value="todo" class="bg-red-500 p-2">To do</option>
                            <option value="done" class=" bg-green-500 p-2">Done</option>
                        </select>
                    </div>
                </div>


                <div class="flex justify-between my-10">
                    <div class="flex flex-col text-slate-600">
                        <label>Data start</label>
                        <input type="text" wire:model="start" placeholder="es. 10/09/2025"
                            class="p-2 rounded-md border border-slate-500">
                    </div>

                    <div class="flex flex-col text-slate-600">
                        <label>Data end</label>
                        <input type="text" wire:model="end" placeholder="es. 10/09/2025"
                            class="p-2 rounded-md border border-slate-500">
                    </div>

                    <div class="flex flex-col text-slate-600">
                        <label>Commissioning Location</label>
                        <input type="text" wire:model="location" placeholder="es. Nola"
                            class="p-2 rounded-md border border-slate-500">
                    </div>
                </div>

                <div class="flex flex-col text-slate-600">
                    <label>Note</label>
                    <textarea wire:model="note" cols="30" rows="10" class="border border-slate-500 rounded-md resize-none p-3"></textarea>
                </div>

                <button class="btn bg-blue-500 text-white hover:bg-blue-700 btn-wide my-5 float-end">Aggiungi</button>

            </form>

        </div>
    </dialog>

</div>
