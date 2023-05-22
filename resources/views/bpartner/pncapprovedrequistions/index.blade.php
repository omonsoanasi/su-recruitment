<x-bpartner-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 w-full">
        <div class="w-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class = "content ml-12 transform ease-in-out duration-500 pt-20 px-2 md:px-5 pb-4 ">
                        <nav class = "flex px-5 py-3 text-gray-700  rounded-lg bg-gray-50 dark:bg-[#1E293B] " aria-label="Breadcrumb">
                            <ol class = "inline-flex items-center space-x-1 md:space-x-3">
                                <li class = "inline-flex items-center">
                                    <a href="{{ route('bpartner.index') }}" class = "inline-flex items-center text-sm font-medium text-gray-700 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">
                                        <svg class = "w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg>
                                        Home
                                    </a>
                                </li>
                                <li>
                                    <div class = "flex items-center">
                                        <svg class = "w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fillRule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clipRule="evenodd"></path></svg>
                                        <a href="#" class = "ml-1 text-sm font-medium text-gray-700 hover:text-gray-900 md:ml-2 dark:text-gray-400 dark:hover:text-white">Publish Vacancy</a>
                                    </div>
                                </li>
                            </ol>
                        </nav>
                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-2">
                            <div class="p-6 text-gray-900">
                                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 display" id="businessPartnerRequisitions">
                                        <thead class="text-xs text-gray-700 uppercase dark:text-gray-400">
                                        <tr>
                                            <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                                                Job Title
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Job Type
                                            </th>
                                            <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                                                Application Status
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Status
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                <span class="flex justify-end">Action</span>
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($pncapprovedrequistions as $pncapprovedrequistion)
                                            <tr class="border-b border-gray-200 dark:border-gray-700">
                                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                                                    {{ $pncapprovedrequistion->jobtitle }}
                                                </th>
                                                <td class="px-6 py-4">
                                                    {{ $pncapprovedrequistion->jobType->name }}
                                                </td>
                                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                                                    @if($pncapprovedrequistion->active == 1)
                                                        <span class="text-emerald-700">Active</span>
                                                    @else
                                                        <span class="text-indigo-700">Inactive</span>
                                                    @endif
                                                </th>
                                                <td class="px-6 py-4">
                                                    @if($pncapprovedrequistion->status == 3)
                                                        <span class="text-emerald-600 font-semibold">New</span>
                                                    @elseif($pncapprovedrequistion->status == 4)
                                                        <span class="text-emerald-600 font-semibold">Published</span>
                                                    @endif
                                                </td>
                                                <td class="px-6 py-4">
                                                    <div class="flex justify-end">
                                                        <div class="flex space-x-2">
                                                            @if($pncapprovedrequistion->status == 3)
                                                                <a href="{{ route('bpartner.pncapprovedrequistions.edit', $pncapprovedrequistion->id) }}" class="px-4 py-2 bg-orange-300 hover:bg-red-300 text-white rounded-md">Take Action</a>
                                                            @elseif($pncapprovedrequistion->status == 4)
                                                                <a href="{{ route('bpartner.pncapprovedrequistions.edit', $pncapprovedrequistion->id) }}" class="px-4 py-2 bg-blue-500 hover:bg-blue-800 text-white rounded-md">Published</a>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-bpartner-layout>
