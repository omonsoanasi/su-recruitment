<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="min-w-0 flex-1">
                <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:truncate sm:text-3xl sm:tracking-tight">About Information</h2>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-2">
                <div class="flex p-2">
                    <a href="{{ route('admin.about.index') }}" class="px-4 py-2 bg-green-800 hover:bg-green-300 rounded-md p-2 text-slate-100">About Information</a>
                </div>

                <form method="POST" action="{{ route('admin.about.store') }}">
                    @csrf
                    <div class="mb-6">
                        <label for="companyName" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name<span class="text-red-500" > * </span></label>
                        <input type="text" name="companyName"  id="companyName" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="Strathmore University, ..." required>
                        @error('companyName') <span class="text-red-500 text-sm"> {{ $message }}</span> @enderror
                    </div>
                    <div class="mb-6">
                        <label for="aboutTitle" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title<span class="text-red-500" > * </span></label>
                        <input type="text" name="aboutTitle"  id="aboutTitle" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="People and Culture Department" required>
                        @error('aboutTitle') <span class="text-red-500 text-sm"> {{ $message }}</span> @enderror
                    </div>
                    <div class="mb-6">
                        <label for="aboutContent" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Content<span class="text-red-500" > * </span></label>
                        <textarea type="text" name="aboutContent"  id="aboutContent" rows="5" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="we offer equal opprotunity ...." required></textarea>
                        @error('aboutContent') <span class="text-red-500 text-sm"> {{ $message }}</span> @enderror
                    </div>
                    <div class="mb-6">
                        <label for="mainUrl" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Main URL<span class="text-red-500" > * </span></label>
                        <input type="text" name="mainUrl"  id="mainUrl" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="People and Culture Department" required>
                        @error('mainUrl') <span class="text-red-500 text-sm"> {{ $message }}</span> @enderror
                    </div>
                    <button type="submit" class="text-white bg-green-800 hover:bg-green-300 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Save</button>
                </form>

            </div>
        </div>
    </div>
</x-admin-layout>
