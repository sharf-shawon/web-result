<x-app-layout>
    <x-slot name="header">
        <h2
            class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight flex justify-between items-center">
            {{ __('Semester') }}
            <div class="flex items-center">
                <x-primary-button-link :href="route('semester.index')">
                    {{ __('Back') }}
                </x-primary-button-link>
            </div>
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                {{ __('Edit Semester') }}
                            </h2>
                        </header>

                        <form method="post" action="{{ route('semester.update', $semester->id) }}"
                            class="mt-6 space-y-6">
                            @csrf
                            @method('put')

                            <div>
                                <x-input-label for="name" :value="__('Name')" />
                                <x-text-input id="name" name="name" type="text" class="mt-1 block w-full"
                                    autocomplete="name" value="{{ old('name', $semester->name) }}" autofocus />
                                <x-input-error :messages="$errors->semester->get('name')" class="mt-2" />
                            </div>

                            <div>
                                <x-input-label for="year" :value="__('Year')" />
                                <x-text-input id="year" name="year" type="text" class="mt-1 block w-full"
                                    autocomplete="year" value="{{ old('year', $semester->year) }}" />
                                <x-input-error :messages="$errors->semester->get('year')" class="mt-2" />
                            </div>

                            <div class="flex items-center gap-4">
                                <x-primary-button>{{ __('Save') }}</x-primary-button>
                                <x-secondary-button-link :href="route('semester.index')">
                                    {{ __('Back') }}
                                </x-secondary-button-link>

                                @if (session('status') === 'result')
                                    <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                                        class="text-sm text-gray-600 dark:text-gray-400">{{ __('Saved.') }}</p>
                                @endif
                            </div>
                        </form>
                    </section>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
