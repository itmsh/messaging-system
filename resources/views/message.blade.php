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
                        <div class="bg-gray-200 p-2">
                            @foreach($users as $user)
                                <a href="{{ route('message', $user->id) }}">
                                    <div class="{{ $user->id === $selectedUser->id ? "bg-white" : "bg-gray-100" }} p-2 mt-2 cursor-pointer">
                                        {{$user->name}}
                                    </div>
                                </a>
                            @endforeach
                        </div>

                        <div class="col-span-2 bg-gray-100 p-2">
                            <div class="row-auto">
                                @foreach($messages as $message)
                                    <div class="bg-gray-200 p-2 mt-2 {{(auth()->user()->id == $message->from_user_id or auth()->user()->id == $message->to_user_id) ? "text-right": ""}}">
                                        {{$message->message}}
                                    </div>
                                @endforeach
                            </div>
                            <form class="w-px-500 p-3 p-md-3" action="{{ route('message', $selectedUser->id) }}"
                                  method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="grid grid-cols-3 gap-4 mt-2">
                                    <div class="p-2 col-span-2">
                                        <div class="col-sm-12">
                                            <input type="text"
                                                   class="form-control @error('message') is-invalid @enderror"
                                                   name="message" placeholder="Message">
                                        </div>
                                    </div>
                                    <div class="p-2">
                                        <div class="col-sm-9">
                                            <button type="submit" class="btn btn-success btn-block">Send</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
