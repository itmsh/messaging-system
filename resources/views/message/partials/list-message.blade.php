@foreach($messages as $message)
    <div class="bg-gray-100 text-sm text-gray-500 mt-2 p-2 dark:bg-gray-800">
        <div class="flex">
            <div class="flex-1">
                {{$message->created_at->diffForHumans()}}
            </div>
            <div class="flex-initial w-22 text-center">
                @if(auth()->user()->id == $message->from_user_id)
                    @include('message.partials.delete-message-form', [
                        'messageId' => $message->id,
                        'selectedUser'=> $selectedUser->id
                    ])
                @endif
            </div>
            <div class="flex-initial w-20 text-center">
                @if(auth()->user()->id == $message->from_user_id)
                    @include('message.partials.edit-message-form', [
                        'messageId' => $message->id,
                        'selectedUser'=> $selectedUser->id
                    ])
                @endif
            </div>
        </div>
    </div>
    <div class="bg-gray-100 p-2 dark:bg-gray-800 {{auth()->user()->id == $message->from_user_id ? "text-right": ""}}">
        {{$message->message}}
    </div>
@endforeach