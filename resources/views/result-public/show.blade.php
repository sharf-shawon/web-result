<x-guest-layout>
    <section style="font-family: Montserrat" class=" bg-[#071e34]font-medium items-center justify-center">

        <div class="mt-3">
            <span class="text-xl tracking-wide text-black dark:text-white">Name: {{ $student->name }}</span>
            <p>
                <span class="text-black dark:text-white">Student ID: {{ $student->student_id }}</span><br>
                <span class="text-black dark:text-white">Date of Birth: {{ $student->date_of_birth }}</span><br>
                <span class="text-black dark:text-white">CGPA: {{ $student->cgpa }}</span><br>
            </p>
        </div>

        <div class="mt-3">
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-500 rtl:text-right dark:text-gray-400">
                    <thead class="text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Course
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Semester
                            </th>
                            <th scope="col" class="px-6 py-3">
                                GPA
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($student->results as $item)
                            <tr
                                class="border-b odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 dark:border-gray-700">
                                <td scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $item->course->code }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $item->course->semester->name }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $item->gpa }}
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>

    </section>
</x-guest-layout>
