<x-app-layout>

    <x-slot name="header">
        <nav class="flex" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                @foreach ($breadcrumbs as $index => $breadcrumb)
                    <li class="inline-flex items-center">
                        @if (isset($breadcrumb['route']))
                            <a href="{{ route($breadcrumb['route']) }}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-indigo-600 dark:text-gray-400 dark:hover:text-white">
                                @if ($index === 0)
                                    <svg class="w-3 h-3 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
                                    </svg>
                                @endif
                                {{ $breadcrumb['label'] }}
                            </a>
                        @else
                            <span class="ms-1 text-sm font-medium text-gray-500 dark:text-gray-400">{{ $breadcrumb['label'] }}</span>
                        @endif
                    </li>

                    @if (!$loop->last)
                        <li>
                            <svg class="rtl:rotate-180 w-3 h-3 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                            </svg>
                        </li>
                    @endif
                @endforeach
            </ol>
        </nav>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg dark:bg-gray-800">
                <div class="p-6 text-gray-900">

                    @if (session('status'))
                        @php
                            $status = session('status');
                            $statusClasses = [
                                'success' => 'text-green-800 bg-green-50 dark:bg-gray-800 dark:text-green-400',
                                'error' => 'text-red-800 bg-red-50 dark:bg-gray-800 dark:text-red-400',
                                'warning' => 'text-yellow-800 bg-yellow-50 dark:bg-gray-800 dark:text-yellow-400',
                                'info' => 'text-blue-800 bg-blue-50 dark:bg-gray-800 dark:text-blue-400',
                            ];
                            $alertClass = $statusClasses[$status] ?? 'text-gray-800 bg-gray-50 dark:bg-gray-800 dark:text-gray-400';
                        @endphp

                        <div class="p-4 mb-4 text-sm rounded-lg {{ $alertClass }}" role="alert">
                            <span class="font-medium">{{ ucfirst($status) }}!</span> {{ session('message', 'Operation completed.') }}
                        </div>
                    @endif

                    <div class="relative overflow-x-auto">
                        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                            <div class="mb-4 flex justify-between items-center">
                                <p class="font-bold text-xl dark:text-white">Add Permission</p>
                                <a href="{{ url('permissions') }}" class="bg-indigo-500 hover:bg-indigo-600 text-white py-1 px-3 rounded-md float-end shadow-sm">
                                    <i class="fa-solid fa-circle-chevron-left opacity-75"></i>&nbsp;&nbsp;BACK
                                </a>
                            </div>

                            <hr class="my-4 dark:border-gray-600">

                            <form action="{{ route('permissions.store') }}" method="POST">
                                @csrf

                                <div class="grid gap-6 mb-6 md:grid-cols-1">
                                    <div>
                                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Permission name</label>
                                        <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-indigo-500 dark:focus:border-indigo-500"
                                               placeholder="Permission Name" required/>
                                    </div>
                                </div>

                                <div class="mb-2 mt-4 flex justify-center gap-1">
                                    <button type="submit" class="bg-lime-500 hover:bg-lime-600 text-white py-1 px-3 rounded-md float-end shadow-sm">
                                        <i class="fa-solid fa-floppy-disk opacity-75"></i>&nbsp;&nbsp;SAVE
                                    </button>
                                    <button type="button" class="bg-yellow-500 hover:bg-yellow-600 text-white py-1 px-3 rounded-md float-end shadow-sm" onclick="pageRefresh()">
                                        <i class="fa-solid fa-arrows-rotate opacity-75"></i>&nbsp;&nbsp;REFRESH
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

</x-app-layout>
