<x-app-layout>
    <x-slot name="header">
        <h2
            class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight flex justify-between items-center">
            {{ __('Student') }}
            <div class="flex items-center">
                <x-primary-button-link :href="route('student.index')">
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
                                {{ __('Edit student') }}
                            </h2>
                        </header>

                        <form method="post" action="{{ route('student.update', $student->id) }}" class="mt-6 space-y-6">
                            @csrf
                            @method('put')

                            <div>
                                <x-input-label for="name" :value="__('Name')" />
                                <x-text-input id="name" name="name" type="text" class="mt-1 block w-full"
                                    autocomplete="name" value="{{ old('name', $student->name) }}" autofocus />
                                <x-input-error :messages="$errors->createstudent->get('name')" class="mt-2" />
                            </div>

                            <div>
                                <x-input-label for="student_id" :value="__('Student ID')" />
                                <x-text-input id="student_id" name="student_id" type="text" class="mt-1 block w-full"
                                    autocomplete="student_id" autofocus
                                    value="{{ old('student_id', $student->student_id) }}" />
                                <x-input-error :messages="$errors->student->get('student_id')" class="mt-2" />
                            </div>

                            <div>
                                <x-input-label for="email" :value="__('Email')" />
                                <x-text-input id="email" name="email" type="email" class="mt-1 block w-full"
                                    autocomplete="email" value="{{ old('email', $student->email) }}" />
                                <x-input-error :messages="$errors->student->get('email')" class="mt-2" />
                            </div>

                            <div>
                                <x-input-label for="phone" :value="__('Phone')" />
                                <x-text-input id="phone" name="phone" type="text" class="mt-1 block w-full"
                                    autocomplete="phone" value="{{ old('phone', $student->phone) }}" />
                                <x-input-error :messages="$errors->student->get('phone')" class="mt-2" />
                            </div>

                            <div>
                                <x-input-label for="address" :value="__('Address')" />
                                <x-text-input id="address" name="address" type="text" class="mt-1 block w-full"
                                    autocomplete="address" value="{{ old('address', $student->address) }}" />
                                <x-input-error :messages="$errors->student->get('address')" class="mt-2" />
                            </div>

                            <div>
                                <x-input-label for="date_of_birth" :value="__('Date Of Birth')" />
                                <x-text-input id="date_of_birth" name="date_of_birth" type="date"
                                    class="mt-1 block w-full" autocomplete="date_of_birth"
                                    value="{{ old('date_of_birth', $student->date_of_birth) }}" />
                                <x-input-error :messages="$errors->student->get('date_of_birth')" class="mt-2" />
                            </div>

                            <div>
                                <x-input-label for="cgpa" :value="__('CGPA')" />
                                <x-text-input id="cgpa" name="cgpa" type="number" class="mt-1 block w-full"
                                    autocomplete="cgpa" step="0.01" value="{{ old('cgpa', $student->cgpa) }}" />
                                <x-input-error :messages="$errors->student->get('cgpa')" class="mt-2" />
                            </div>

                            <div class="flex items-center gap-4">
                                <x-primary-button>{{ __('Save') }}</x-primary-button>
                                <x-secondary-button-link :href="route('student.index')">
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
