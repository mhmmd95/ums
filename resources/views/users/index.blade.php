<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }} | Users
        </h2>
    </x-slot>

    <div class="py-1 mt-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div>
                        <form method='get' action="{{route('dashboard.users.index')}}" class='md:flex md:justify-between'>
                            <div>
                                <label for='perpage'>Number of rows: </label>
                                <x-text-input class="mt-1" type="number" name="perpage" :value="request('perpage', 8)" autocomplete="perpage" />
                            </div>
                            <div>
                                <x-text-input class="mt-1" type="text" name="name" :value="request('name')" placeholder="Search for a name" autocomplete="name" />
                                <x-text-input class="mt-1" type="text" name="email" :value="request('email')" placeholder="Search for an email" autocomplete="email" />
                            </div>
                            <x-primary-button>{{ __('filter') }}</x-primary-button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <x-users.index_table :users="$users" />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
