<div>
    {{-- Nothing in the world is as soft and yielding as water. --}}
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <h1>Hola amigos</h1>
    <x-table>
        <p class="text-lg text-center font-bold m-5">Gradient Table Design</p>
        <table class="rounded-t-lg m-5 w-5/6 mx-auto text-gray-100 bg-gradient-to-l from-indigo-500 to-indigo-800">
            <tr class="text-left border-b-2 border-indigo-300">
                <th class="px-4 py-3">Firstname</th>
                <th class="px-4 py-3">Lastname</th>
                <th class="px-4 py-3">Age</th>
                <th class="px-4 py-3">Sex</th>
            </tr>
            <tr class="border-b border-indigo-400">
                <td class="px-4 py-3">Jill</td>
                <td class="px-4 py-3">Smith</td>
                <td class="px-4 py-3">50</td>
                <td class="px-4 py-3">Male</td>
            </tr>
            <!-- each row -->
            <tr class="border-b border-indigo-400">
                <td class="px-4 py-3">Jill</td>
                <td class="px-4 py-3">Smith</td>
                <td class="px-4 py-3">50</td>
                <td class="px-4 py-3">Male</td>
            </tr>
            <!-- each row -->
            <tr class="border-b border-indigo-400">
                <td class="px-4 py-3">Jill</td>
                <td class="px-4 py-3">Smith</td>
                <td class="px-4 py-3">50</td>
                <td class="px-4 py-3">Male</td>
            </tr>
            <!-- each row -->
    </x-table>
</div>
