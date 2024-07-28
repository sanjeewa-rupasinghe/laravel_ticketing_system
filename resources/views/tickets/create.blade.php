<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            Create a new ticket
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <!-- ALERT -->
                    @include('components.alert.alert')
                    <!-- ALERT -->

                    <form action="{{ route('ticket.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div>
                            <x-input-label for="name" :value="'Title'" class="mt-3" />
                            <x-text-input class="block w-full mt-1" type="text" name="title" required />
                            <x-input-label for="description" :value="'Description'" class="mt-3" />
                            <x-text-area name="description" />
                            <x-input-label for="email" :value="'Title'" class="mt-3" />
                            <x-text-input class="block w-full mt-1" type="file" name="file" />
                            <x-primary-button class="mt-6">
                                Create
                            </x-primary-button>
                        </div>
                    </form>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>
