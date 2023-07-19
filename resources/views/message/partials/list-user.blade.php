<div class="bg-gray-200 p-2">
    @foreach($users as $user)
        <a href="{{ route('message', $user->id) }}">
            <div class="{{ $user->id === $selectedUser->id ? "bg-white" : "bg-gray-100" }} p-2 mt-2 cursor-pointer">
                {{$user->name}}
            </div>
        </a>
    @endforeach
</div>