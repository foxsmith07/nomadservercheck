<x-layout>
{{-- @dd($train->train()) --}}
    <a href="{{route('obn.index')}}" class="btn bg-slate-400 rounded-md btn-sm hover:bg-slate-500 mb-4 text-white">
        <i class="fa-regular fa-circle-left"></i>
        Back
    </a>
    <h1 class="text-4xl mb-5">TRAIN {{$train->train}} </h1>

    <h2>Devices on board</h2>
    <div class="overflow-x-auto">
        <table class="table">
            <!-- head -->
            <thead>
                <tr class="bg-slate-200">
                    <th class="w-1/12">Type</th>
                    <th class="w-1/12">Coach</th>
                    <th class="w-1/12">Device</th>
                    <th class="w-3/12">IP</th>
                    <th class="w-3/12">Firmware</th>
                    <th class="w-3/12">Configuration</th>
                </tr>
            </thead>
            <tbody>
                <!-- row 1 -->
                <tr>
                    <th>{{$train['sw']}}</th>
                    <td>1</td>
                    <td>1</td>
                    <td>10.226.32.203</td>
                    <td>6.11.4-beta3</td>
                    <td>IBX1510-00145a048fde-v10-AP</td>
                </tr>
            </tbody>
        </table>
    </div>


    <h2 class="mt-10">Modem infos</h2>
    <div class="overflow-x-auto">
        <table class="table">
            <!-- head -->
            <thead>
                <tr class="bg-slate-200">
                    <th class="w-1/12">Modem</th>
                    <th class="w-1/12">Status</th>
                    <th class="w-1/12">Slot</th>
                    <th class="w-1/12">Tech</th>
                    <th class="w-3/12">Provider</th>
                    <th class="w-3/12">ICCID</th>
                </tr>
            </thead>
            <tbody>
                <!-- row 1 -->
                <tr>
                    <th>ce0p0</th>
                    <td class="text-green-500">Connected</td>
                    <td>7</td>
                    <td>LTE</td>
                    <td>VodaIT</td>
                    <td>8939105656568584</td>
                </tr>
                <!-- row 2 -->
                <tr>
                    <th>ce1p0</th>
                    <td class="text-red-500">Missing</td>
                    <td>11</td>
                    <td>LTE</td>
                    <td>VodaIT</td>
                    <td>8939105656568584</td>
                </tr>
                <!-- row 3 -->
                <tr>
                    <th>ce2p0</th>
                    <td class="text-green-500">Connected</td>
                    <td>10</td>
                    <td>LTE</td>
                    <td>TIM</td>
                    <td>8939105656568584</td>
                </tr>
                <tr>
                    <th>ce3p0</th>
                    <td class="text-red-500">Not active</td>
                    <td>12</td>
                    <td>LTE</td>
                    <td>WindTre</td>
                    <td>8939105656568584</td>
                </tr>
            </tbody>
        </table>
    </div>


</x-layout>
