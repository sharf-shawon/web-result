<x-app-layout>
    <x-slot name="header">
        <h2
            class="flex items-center justify-between text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Student') }}
            <div class="flex items-center">
                <x-primary-button-link :href="route('student.index')">
                    {{ __('Back') }}
                </x-primary-button-link>
            </div>
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                {{ __('Edit student') }}
                            </h2>
                        </header>

                        <form method="post" enctype="multipart/form-data"
                            action="{{ route('student.update', $student->id) }}" class="mt-6 space-y-6">
                            @csrf
                            @method('put')

                            <div>
                                <x-input-label for="name" :value="__('Name')" />
                                <x-text-input id="name" name="name" type="text" class="block w-full mt-1"
                                    autocomplete="name" value="{{ old('name', $student->name) }}" autofocus />
                                <x-input-error :messages="$errors->createstudent->get('name')" class="mt-2" />
                            </div>

                            <div>
                                <x-input-label for="student_id" :value="__('Student ID')" />
                                <x-text-input id="student_id" name="student_id" type="text" class="block w-full mt-1"
                                    autocomplete="student_id" autofocus
                                    value="{{ old('student_id', $student->student_id) }}" />
                                <x-input-error :messages="$errors->student->get('student_id')" class="mt-2" />
                            </div>

                            <div>
                                <x-input-label for="email" :value="__('Email')" />
                                <x-text-input id="email" name="email" type="email" class="block w-full mt-1"
                                    autocomplete="email" value="{{ old('email', $student->email) }}" />
                                <x-input-error :messages="$errors->student->get('email')" class="mt-2" />
                            </div>

                            <div>
                                <x-input-label for="phone" :value="__('Phone')" />
                                <x-text-input id="phone" name="phone" type="text" class="block w-full mt-1"
                                    autocomplete="phone" value="{{ old('phone', $student->phone) }}" />
                                <x-input-error :messages="$errors->student->get('phone')" class="mt-2" />
                            </div>

                            <div>
                                <x-input-label for="address" :value="__('Address')" />
                                <x-text-input id="address" name="address" type="text" class="block w-full mt-1"
                                    autocomplete="address" value="{{ old('address', $student->address) }}" />
                                <x-input-error :messages="$errors->student->get('address')" class="mt-2" />
                            </div>

                            <div>
                                <x-input-label for="date_of_birth" :value="__('Date Of Birth')" />
                                <x-text-input id="date_of_birth" name="date_of_birth" type="date"
                                    class="block w-full mt-1" autocomplete="date_of_birth"
                                    value="{{ old('date_of_birth', $student->date_of_birth) }}" />
                                <x-input-error :messages="$errors->student->get('date_of_birth')" class="mt-2" />
                            </div>

                            <div>
                                <x-input-label for="date_of_issue" :value="__('Date Of Issue')" />
                                <x-text-input id="date_of_issue" name="date_of_issue" type="date"
                                    class="block w-full mt-1" autocomplete="date_of_issue"
                                    value="{{ old('date_of_issue', $student->date_of_issue) }}" />
                                <x-input-error :messages="$errors->student->get('date_of_issue')" class="mt-2" />
                            </div>

                            <div>
                                <x-input-label for="department" :value="__('Department')" />
                                <x-text-input id="department" name="department" type="text" class="block w-full mt-1"
                                    autocomplete="department" value="{{ old('department', $student->department) }}" />
                                <x-input-error :messages="$errors->student->get('department')" class="mt-2" />
                            </div>

                            <div>
                                <x-input-label for="session" :value="__('Session')" />
                                <x-text-input id="session" name="session" type="text" class="block w-full mt-1"
                                    autocomplete="session" value="{{ old('session', $student->session) }}" />
                                <x-input-error :messages="$errors->student->get('session')" class="mt-2" />
                            </div>

                            <div>
                                <x-input-label for="cgpa" :value="__('CGPA')" />
                                <x-text-input id="cgpa" name="cgpa" type="number" class="block w-full mt-1"
                                    autocomplete="cgpa" step="0.01" value="{{ old('cgpa', $student->cgpa) }}" />
                                <x-input-error :messages="$errors->student->get('cgpa')" class="mt-2" />
                            </div>

                            <div>
                                @if ($student->image)
                                    <figure class="max-w-lg">
                                        <img class="h-auto max-w-full rounded-lg"
                                            src="{{ url("uploads/{$student->image}") }}" alt="current image">
                                        <figcaption class="mt-2 text-sm text-center text-gray-500 dark:text-gray-400">
                                            Current Image
                                        </figcaption>
                                    </figure>
                                @endif

                                <x-input-label for="image" :value="__('Change Image')" />
                                <input
                                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                    id="image" name="image" type="file" accept="image/*">
                                <x-input-error :messages="$errors->student->get('image')" class="mt-2" />
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
