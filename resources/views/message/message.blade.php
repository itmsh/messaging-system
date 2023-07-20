<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Message center') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("Select user to start messaging!") }}
                    <div class="grid grid-cols-3 gap-4 mt-2">
                        @include('message.partials.list-user', ['user' => $users])

                        <div class="col-span-2 bg-blue-100 p-2 dark:bg-gray-900">
                            <div class="row-auto">
                                @include('message.partials.list-message', ['messages' => $messages])
                            </div>
                            @include('message.partials.add-message-form', ['selectedUser' => $selectedUser])
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
