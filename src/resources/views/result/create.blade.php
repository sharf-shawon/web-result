<x-app-layout>
    <x-slot name="header">
        <h2
            class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight flex justify-between items-center">
            {{ __('Result') }}
            <div class="flex items-center">
                <x-primary-button-link :href="route('result.index')">
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
                                {{ __('Add New Result') }}
                            </h2>
                        </header>

                        <form method="post" action="{{ route('result.store') }}" class="mt-6 space-y-6">
                            @csrf
                            {{-- @method('put') --}}

                            <div>
                                <x-input-label for="student_id" :value="__('Student')" />
                                <select id="student_id" name="student_id" required
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option selected>Select an Option</option>
                                    @foreach ($students as $student)
                                        <option {{ old('student_id') == $student->id ? 'selected' : '' }}
                                            value="{{ $student->id }}">{{ "{$student->id} - {$student->name}" }}
                                        </option>
                                    @endforeach
                                </select>
                                <x-input-error :messages="$errors->result->get('student_id')" class="mt-2" />

                            </div>

                            <div>
                                <x-input-label for="course_id" :value="__('Course')" />
                                <select id="course_id" name="course_id" required
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option selected>Select an Option</option>
                                    @foreach ($courses as $course)
                                        <option {{ old('course_id') == $course->id ? 'selected' : '' }}
                                            value="{{ $course->id }}">{{ "{$course->code} - {$course->name}" }}
                                        </option>
                                    @endforeach
                                </select>
                                <x-input-error :messages="$errors->result->get('course_id')" class="mt-2" />
                            </div>

                            <div>
                                <x-input-label for="gpa" :value="__('GPA')" />
                                <x-text-input id="gpa" name="gpa" type="number" class="mt-1 block w-full"
                                    autocomplete="gpa" value="{{ old('gpa') }}" step="0.01" />
                                <x-input-error :messages="$errors->result->get('gpa')" class="mt-2" />
                            </div>

                            <div class="flex items-center gap-4">
                                <x-primary-button>{{ __('Save') }}</x-primary-button>
                                <x-secondary-button-link :href="route('result.index')">
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
