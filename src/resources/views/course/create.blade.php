<x-app-layout>
    <x-slot name="header">
        <h2
            class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight flex justify-between items-center">
            {{ __('Course') }}
            <div class="flex items-center">
                <x-primary-button-link :href="route('course.index')">
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
                                {{ __('Add New Course') }}
                            </h2>
                        </header>

                        <form method="post" action="{{ route('course.store') }}" class="mt-6 space-y-6">
                            @csrf
                            {{-- @method('put') --}}

                            <div>
                                <x-input-label for="name" :value="__('Name')" />
                                <x-text-input id="name" name="name" type="text" class="mt-1 block w-full"
                                    autocomplete="name" autofocus value="{{ old('name') }}" />
                                <x-input-error :messages="$errors->course->get('name')" class="mt-2" />
                            </div>

                            <div>
                                <x-input-label for="code" :value="__('Code')" />
                                <x-text-input id="code" name="code" type="text" class="mt-1 block w-full"
                                    autocomplete="code" value="{{ old('code') }}" />
                                <x-input-error :messages="$errors->course->get('code')" class="mt-2" />
                            </div>

                            <div>
                                <x-input-label for="semester_id" :value="__('Semester')" />
                                <select id="semester_id" name="semester_id" required
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option selected>Select an Option</option>
                                    @foreach ($semesters as $semester)
                                        <option {{ old('semester_id') == $semester->id ? 'selected' : '' }}
                                            value="{{ $semester->id }}">{{ $semester->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="flex items-center gap-4">
                                <x-primary-button>{{ __('Save') }}</x-primary-button>
                                <x-secondary-button-link :href="route('course.index')">
                                    {{ __('Back') }}
                                </x-secondary-button-link>

                                @if (session('status') === 'course')
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
