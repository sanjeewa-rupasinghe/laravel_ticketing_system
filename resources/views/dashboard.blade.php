<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                     <!-- ALERT -->
                     @include('components.alert.alert')
                     <!-- ALERT -->

                    @foreach ($tickets as $ticket)
                        <div class="p-6 mt-3 border rounded-lg">
                            <div>
                                <a href="{{route('ticket.show',['ticket'=>$ticket->id])}}"
                                    class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                        {{ $ticket->title }}
                                    </h5>
                                        <p class="font-normal text-gray-700 dark:text-gray-400">
                                            {{ $ticket->description }}
                                        </p>
                                    <small>
                                        <p>
                                            {{$ticket->created_at->diffForHumans()}} by ---
                                            {{-- {{$ticket->user->name}} --}}
                                        </p>
                                    </small>
                                </a>
                                <div class="flex">
                                    <a href="#"
                                        class="p-6 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg focus:outline-none hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                                        Resolve
                                    </a>
                                    <a href="#"
                                        class="p-6 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg focus:outline-none hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                                        Reject
                                    </a>
                                    <a href="#"
                                        class="p-6 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg focus:outline-none hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                                        Withdraw
                                    </a>
                                    @if($ticket->attachment)
                                    <a href="/storage/{{$ticket->attachment}}" target="_blank"
                                        class="p-6 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg focus:outline-none hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                                        Attachment
                                    </a>
                                    @endif
                                </div>

                            </div>
                        </div>
                    @endforeach



                </div>
            </div>
        </div>
    </div>
</x-app-layout>
