<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="min-w-0 flex-1">
                <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:truncate sm:text-3xl sm:tracking-tight">About Us</h2>
            </div>
            @if($about)
            @else
                <div class="flex justify-end">
                    <a href="{{ route('admin.about.create') }}" class="px-4 py-2 bg-green-800 hover:bg-green-300 rounded-md p-2">Add About Information</a>
                </div>
            @endif
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-2">
                <div class="p-6 text-gray-900">
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                                    Company Name
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Title
                                </th>
                                <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                                    Content
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    University Website
                                </th>
                                <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                                    <span class="flex justify-end">Actions</span>
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                                <tr class="border-b border-gray-200 dark:border-gray-700">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                                        {{ $about->companyName ?? 'Strathmore University' }}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ $about->aboutTitle ?? 'People and Culture Department' }}
                                    </td>
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                                        {{ Str::limit($about->aboutContent ?? 'Strathmore University', 30) }}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ $about->mainUrl ?? 'People and Culture Department' }}
                                    </td>
                                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                                        <div class="flex justify-end">
                                            <div class="flex space-x-2">
                                                <a href="{{ route('admin.about.edit', $about ?? 0) }}" class="px-4 py-2 bg-blue-500 hover:bg-blue-800 text-white rounded-md">Edit</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
