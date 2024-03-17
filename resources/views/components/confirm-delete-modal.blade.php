<!-- confirm-delete-modal.blade.php -->

<div x-data="{ showModal: false }">
    <!-- Delete Button -->
    <button @click="showModal = true" type="button" class="text-red-500 hover:text-red-700">Delete</button>

    <!-- Modal -->
    <div x-show="showModal" class="fixed inset-0 z-10 overflow-y-auto">
        <div class="flex items-center justify-center min-h-screen">
            <!-- Overlay -->
            <div class="fixed inset-0 bg-black bg-opacity-50"></div>

            <!-- Modal Content -->
            <div class="bg-white dark:bg-gray-800 rounded-lg overflow-hidden shadow-xl p-6 max-w-md w-full">
                <!-- Modal Header -->
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200">Confirm Deletion</h3>
                    <button @click="showModal = false" class="text-gray-500 hover:text-gray-700">&times;</button>
                </div>

                <!-- Modal Body -->
                <div class="text-gray-700 dark:text-gray-300">
                    <p>{{ $slot }}</p> <!-- Confirmation message passed as slot -->
                </div>

                <!-- Modal Footer -->
                <div class="mt-4 flex justify-end">
                    <button @click="showModal = false"
                        class="px-4 py-2 text-gray-500 hover:text-gray-700">Cancel</button>
                    <form action="{{ $action }}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit"
                            class="px-4 py-2 ml-2 bg-red-500 text-white rounded hover:bg-red-700">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
