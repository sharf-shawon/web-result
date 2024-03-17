<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('result.public.show') }}">
        @csrf

        <!-- student_id -->
        <div>
            <x-input-label for="student_id" :value="__('Student ID')" />
            <x-text-input id="student_id" class="block mt-1 w-full" type="text" name="student_id" :value="old('student_id')"
                required autofocus autocomplete="disabled" />
            <x-input-error :messages="$errors->get('student_id')" class="mt-2" />
        </div>
        <br>
        <!-- date_of_birth -->
        <div>
            <x-input-label for="date_of_birth" :value="__('Date of Birth')" />
            <x-text-input id="date_of_birth" class="block mt-1 w-full" type="date" name="date_of_birth"
                :value="old('date_of_birth')" required autofocus autocomplete="disabled" />
            <x-input-error :messages="$errors->get('date_of_birth')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="ms-3">
                {{ __('Search Result') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
