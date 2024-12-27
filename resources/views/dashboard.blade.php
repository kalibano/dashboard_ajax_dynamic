<x-app-layout>
    <div class="container mx-auto p-4" x-data="dashboard">
        <h1 class="text-xl font-bold mb-4">Welcome to {{ Auth()->user()->name }}</h1>
        <button class="bg-blue-500 text-white px-4 py-2 rounded" @click="openModal()">Add New Item</button>

        <!-- Modal -->
        <div x-show="showModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
            <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-md">
                <h2 class="text-lg font-bold mb-4">Add New Item</h2>
                <form @submit.prevent="addItem">
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                        <input type="text" id="name" x-model="form.name" class="mt-1 block w-full border-gray-300 rounded-md" />
                        <small class="text-red-500" x-text="errors.name"></small>
                    </div>
                    <div class="mt-4">
                        <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                        <textarea id="description" x-model="form.description" class="mt-1 block w-full border-gray-300 rounded-md"></textarea>
                        <small class="text-red-500" x-text="errors.description"></small>
                    </div>
                    <div class="mt-4">
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Add Item</button>
                        <button type="button" @click="closeModal" class="ml-2 bg-gray-300 text-gray-700 px-4 py-2 rounded">Cancel</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Table -->
        <table class="min-w-full divide-y divide-gray-200 mt-4">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Name</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Description</th>
                </tr>
            </thead>
            <tbody id="itemsTable" class="bg-white divide-y divide-gray-200">
                <template x-for="item in items" :key="item.id">
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap" x-text="item.name"></td>
                        <td class="px-6 py-4 whitespace-nowrap" x-text="item.description"></td>
                    </tr>
                </template>
            </tbody>
        </table>
    </div>
</x-app-layout>
