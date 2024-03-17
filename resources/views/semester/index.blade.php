<x-app-layout>
    <x-slot name="header">
        <h2
            class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight flex justify-between items-center">
            {{ __('Semester') }}
            <div class="flex items-center">
                <x-primary-button-link :href="route('semester.create')">
                    {{ __('Create') }}
                </x-primary-button-link>
            </div>
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if (session('status') === 'deleted')
                        <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                            class="text-sm text-gray-600 dark:text-gray-400">{{ __('Item Deleted.') }}</p>
                    @endif
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead class="text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        ID
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Name
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Year
                                    </th>

                                    <th scope="col" class="px-6 py-3">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                    <tr
                                        class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                        <td scope="row"
                                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $item->id }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $item->name }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $item->year }}
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="flex justify-end">

                                                <form action="{{ route('semester.destroy', $item->id) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <x-secondary-button-link :href="route('semester.edit', $item->id)">
                                                        {{ __('Edit') }}
                                                    </x-secondary-button-link>
                                                    <x-danger-button
                                                        onclick="return confirm('Are you sure you want to delete this item?');">Delete</x-danger-button>
                                                    @if (session('status') === 'result')
                                                        <p x-data="{ show: true }" x-show="show" x-transition
                                                            x-init="setTimeout(() => show = false, 2000)"
                                                            class="text-sm text-gray-600 dark:text-gray-400">
                                                            {{ __('Saved.') }}</p>
                                                    @endif
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
