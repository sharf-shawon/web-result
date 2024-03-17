<x-guest-layout>
    <section style="font-family: Montserrat" class=" bg-[#071e34]font-medium items-center justify-center h-screen">

        <div class="mt-8">
            <span class="text-black dark:text-white text-xl tracking-wide">Name: {{ $student->name }}</span>
            <p>
                <span class="text-black dark:text-white">Student ID: {{ $student->student_id }}</span><br>
                <span class="text-black dark:text-white">Date of Birth: {{ $student->date_of_birth }}</span><br>
                <span class="text-black dark:text-white">CGPA: {{ $student->cgpa }}</span><br>
            </p>
        </div>

    </section>
</x-guest-layout>
