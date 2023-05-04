<x-welcome-layout>
<!-- component -->
    <div class="font-sans bg-white flex flex-col min-h-screen w-full">
    <div>
        <div class="bg-gray-200 px-4 py-4">
            <div class="w-full md:max-w-6xl md:mx-auto md:flex md:items-center md:justify-between">
                <div>
                    <a href="/">
                        <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                    </a>
                    <span class="">Strathmore University People and Culture Department.</span>
                </div>
{{--                <div>--}}
{{--                    <a href="#" class="inline-block py-2 text-gray-800 text-2xl font-bold">Strathmore University People and Culture Department.</a>--}}
{{--                </div>--}}

                <div>
                    <div class="hidden md:block">
                        <a
                            href="#"
                            class="inline-block py-1 md:py-4 text-gray-600 mr-6 font-bold"
                        >How it Works</a
                        >
{{--                        <a--}}
{{--                            href="#"--}}
{{--                            class="inline-block py-1 md:py-4 text-gray-500 hover:text-gray-600 mr-6"--}}
{{--                        >Solutions</a--}}
{{--                        >--}}

{{--                        <a--}}
{{--                            href="#"--}}
{{--                            class="inline-block py-1 md:py-4 text-gray-500 hover:text-gray-600 mr-6"--}}
{{--                        >Pricing</a--}}
{{--                        >--}}
{{--                        <a--}}
{{--                            href="#"--}}
{{--                            class="inline-block py-1 md:py-4 text-gray-500 hover:text-gray-600 mr-6"--}}
{{--                        >Desktop</a--}}
{{--                        >--}}
                    </div>
                </div>
                <div class="hidden md:block">
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/dashboard') }}" class="inline-block py-2 px-4 text-gray-700 bg-white hover:bg-gray-100 rounded-lg">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="inline-block py-1 md:py-4 text-gray-500 hover:text-gray-600 mr-6">Login</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="inline-block py-2 px-4 text-gray-700 bg-white hover:bg-gray-100 rounded-lg">Get Started</a>
                            @endif
                        @endauth
                    @endif
                </div>
            </div>
        </div>

        <div class="bg-gray-200 md:overflow-hidden">
            <div class="px-4 py-16">
                <div class="relative w-full md:max-w-2xl md:mx-auto text-center">
                    <h1 class="font-bold text-gray-700 text-xl sm:text-2xl md:text-5xl leading-tight mb-6">
                        To join our team, explore the different openings below:
                    </h1>

                    <p class="text-gray-600 md:text-xl md:px-18">
                        Strathmore University is home to exceptional individuals who possess academic excellence, creativity, leadership skills, and commitment to ethical and moral values.
                    </p>

                    <div class="hidden md:block h-40 w-40 rounded-full bg-blue-800 absolute right-0 bottom-0 -mb-64 -mr-48"></div>

                    <div class="hidden md:block h-5 w-5 rounded-full bg-yellow-500 absolute top-0 right-0 -mr-40 mt-32"></div>
                </div>
            </div>

            <svg class="fill-current bg-gray-200 text-white hidden md:block" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                <path fill-opacity="1" d="M0,64L120,85.3C240,107,480,149,720,149.3C960,149,1200,107,1320,85.3L1440,64L1440,320L1320,320C1200,320,960,320,720,320C480,320,240,320,120,320L0,320Z"></path>
            </svg>
        </div>

        <div class="max-w-4xl mx-auto bg-white shadow-lg relative z-20 hidden md:block" style="margin-top: -320px; border-radius: 20px;">
            <div class="h-20 w-20 rounded-full bg-yellow-500 absolute top-0 left-0 -ml-10 -mt-10" style="z-index: -1;"></div>

            <div class="h-5 w-5 rounded-full bg-blue-500 absolute top-0 left-0 -ml-32 mt-12" style="z-index: -1;"></div>
            <!-- component -->
            <section class="mx-auto max-w-6xl py-12">
                <div class="flex flex-col">
                    <div class="flex flex-col md:flex-row justify-center items-center">
                        <div class="transition-all ease-in-out duration-1000 flex flex-col justify-center"></div>
                        <div class="transition-all ease-in-out duration-1000 flex flex-col justify-center"></div>
                        <div class="transition-all ease-in-out duration-1000 flex flex-col justify-center"></div>
                    </div>
                    <div class="flex flex-col md:flex-row justify-center items-center">
                        <div class="transition-all ease-in-out duration-1000 flex flex-col justify-center">
                            <div slot="middle-left" class="max-w-2xl">
                                <div class="flex flex-row">
                                    <div class="w-2/3 bg-orange-600 p-5 text-teal-100 flex justify-center items-center h-48 text-3xl font-black uppercase">Awesome Opportunities</div>
                                    <div class="w-1/3 bg-teal-600 text-orange-100 p-5 flex justify-center items-center">Great working environment</div>
                                </div>
                            </div>
                        </div>
                        <div class="transition-all ease-in-out duration-1000 flex flex-col justify-center"></div>
                        <div class="transition-all ease-in-out duration-1000 flex flex-col justify-center">
                            <div slot="middle-right" class="max-w-xs">
                                <div class="flex flex-col justify-center h-48 p-3">
                                    <div class="text-xl font-black text-teal-700">Discover Opportunities</div>
                                    <div class="text-sm my-3 font-bold rounded-md shadow-lg">
                                        Find Jobs By Keyword
                                    </div>
                                    <div class="text-sm text-teal-700 cursor-pointer">
                                        <form method="GET" action="{{ route('search') }}">
                                            <input type="text" name="query" placeholder="Search..." class="rounded-md backdrop-filter">
                                            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 mt-4">Search</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if ($submitted)
                        @if(count($results)>0)
                            <div class="flex flex-wrap">
                                @foreach ($results as $result)
                                    <div class="w-full md:w-1/2 lg:w-1/3 p-4">
                                        <div class="p-5 shadow-md m-2 mt-4">
                                            <img class="object-scale-down h-30" src="{{ asset('bg-logo/logo.png') }}" alt="logo image">
{{--                                            <div class="text-xs font-bold uppercase text-teal-700 mt-1 mb-2">{{ $result->department->name }}</div>--}}
                                            <div class="text-xl font-bold mb-2"><a href="{{ route('job', $result->slug) }}">{{ $result->jobtitle }}</a></div>
                                            <div class="flex items-center">
                                                <a href="{{ route('job', $result->slug) }}" class="inline-flex items-center px-4 py-2 border border-transparent text-base font-medium rounded-md text-white bg-blue-500 hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                                    <svg class="h-5 w-5 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                        <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                                        <path fill-rule="evenodd" d="M2 5a2 2 0 012-2h12a2 2 0 012 2v6a2 2 0 01-2 2h-1.172l-1.414 1.414A2 2 0 0110.828 16H9.172a2 2 0 01-1.414-.586L6.758 14H5a2 2 0 01-2-2V5zm2-1a1 1 0 00-1 1v6h14V5a1 1 0 00-1-1H4z" clip-rule="evenodd" />
                                                    </svg>
                                                    <span class="">View Details</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <p class="text-red-800 font-bold">No results were found. You can explore other available opportunities below:</p>
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24">
                                <path d="M7 10l5 5 5-5z" />
                                <path d="M0 0h24v24H0z" fill="none"/>
                            </svg>
                            <h2 class="font-bold">Open Vacancies</h2>
                        @endif
                    @endif
                    <div class="flex flex-wrap">
                        @foreach(\App\Models\StaffRequistionForm::where('status',4)->where('active', true)->orderBy('id','desc')->limit(6)->get() as $index => $vacancy)
                            <div class="w-full md:w-1/2 lg:w-1/3 p-4">
                                <div class="p-5 shadow-md m-2 mt-4">
                                    <img class="object-scale-down h-30" src="{{ asset('bg-logo/logo.png') }}" alt="logo image">
                                    <div class="text-xs font-bold uppercase text-teal-700 mt-1 mb-2">{{ $vacancy->department->name }}</div>
                                    <div class="text-xl font-bold mb-2"><a href="{{ route('job', $vacancy->slug) }}">{{ $vacancy->jobtitle }}</a></div>
                                    <div class="flex items-center">
                                        <a href="{{ route('job', $vacancy->slug) }}" class="inline-flex items-center px-4 py-2 border border-transparent text-base font-medium rounded-md text-white bg-blue-500 hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                            <svg class="h-5 w-5 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                                <path fill-rule="evenodd" d="M2 5a2 2 0 012-2h12a2 2 0 012 2v6a2 2 0 01-2 2h-1.172l-1.414 1.414A2 2 0 0110.828 16H9.172a2 2 0 01-1.414-.586L6.758 14H5a2 2 0 01-2-2V5zm2-1a1 1 0 00-1 1v6h14V5a1 1 0 00-1-1H4z" clip-rule="evenodd" />
                                            </svg>
                                            <span class="">View Details</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
            <div class="h-10 bg-white rounded-t-lg border-b border-gray-100"></div>

        <p class="text-center p-4 text-gray-600 mt-10">
            Created by Strathmore University ICTS-EAS Department
        </p>
    </div>
</div>
</x-welcome-layout>
