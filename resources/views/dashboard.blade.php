<x-app-layout>

    <x-slot name="header">
        <nav class="flex w-full" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse w-full">
                @foreach ($breadcrumbs as $index => $breadcrumb)
                    <li class="inline-flex items-center">
                        @if (isset($breadcrumb['route']))
                            <a href="{{ route($breadcrumb['route']) }}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-indigo-600 dark:text-gray-400 dark:hover:text-white">
                                <svg class="w-3 h-3 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
                                </svg>
                                {{ $breadcrumb['label'] }}
                            </a>
                        @else
                            <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">{{ $breadcrumb['label'] }}</span>
                        @endif
                    </li>

                    @if (!$loop->last)
                        <li>
                            <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
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
                    <p class="dark:text-white">{{ Carbon\Carbon::greetings() }}<span class="font-bold text-indigo-700 dark:text-indigo-500">{{ userName() }}</span>!</p>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
