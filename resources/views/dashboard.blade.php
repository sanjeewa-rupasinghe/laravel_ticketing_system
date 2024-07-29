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
                                <a href="{{ route('ticket.show', ['ticket' => $ticket->id]) }}"
                                    class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">

                                        {{ $ticket->title }}
                                        <span class="px-6 uppercase border rounded ms-3">
                                            {{ $ticket->status }}
                                        </span>
                                    </h5>
                                    <p class="font-normal text-gray-700 dark:text-gray-400">
                                        {{ $ticket->description }}
                                    </p>
                                    <small>
                                        <p class="mt-3 text-gray-700 dark:text-gray-400">
                                            {{ $ticket->created_at->diffForHumans() }} by ---
                                            {{-- {{$ticket->user->name}} --}}
                                        </p>
                                    </small>
                                </a>
                                <div class="flex gap-6 mt-3">
                                    <div>
                                        <form action="{{ route('ticket.update.status', ['ticket' => $ticket->id]) }}"
                                            method="POST">
                                            @csrf
                                            @method('patch')
                                            <x-text-input type="hidden" name="status" value={{App\Enums\TicketStatus::RESOLVED}}/>
                                            <x-primary-button>
                                                Resolve
                                            </x-primary-button>
                                        </form>
                                    </div>
                                    <div>
                                        <form action="{{ route('ticket.update.status', ['ticket' => $ticket->id]) }}"
                                            method="POST">
                                            @csrf
                                            @method('patch')
                                            <x-text-input type="hidden" name="status" value={{App\Enums\TicketStatus::REJECTED}}/>
                                            <x-primary-button>
                                                Reject
                                            </x-primary-button>
                                        </form>
                                    </div>
                                    <div>
                                        <form action="{{ route('ticket.update.status', ['ticket' => $ticket->id]) }}"
                                            method="POST">
                                            @csrf
                                            @method('patch')
                                            <x-text-input type="hidden" name="status" value={{App\Enums\TicketStatus::WITHDRAW}}/>
                                            <x-primary-button>
                                                Withdraw
                                            </x-primary-button>
                                        </form>
                                    </div>
                                    @if ($ticket->attachment)
                                        <a href="/storage/{{ $ticket->attachment }}" target="_blank"
                                            class="'inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150'">
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
