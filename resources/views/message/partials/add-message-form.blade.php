<form class="w-px-500 p-3 p-md-3" action="{{ route('message', $selectedUser->id) }}"
      method="post" enctype="multipart/form-data">
    @csrf
    <div class="grid grid-cols-3 gap-4 mt-2">
        <div class="p-2 col-span-2">
            <div class="col-sm-12">
                <input type="text"
                       class="w-full form-control @error('message') is-invalid @enderror"
                       name="message" placeholder="Message">
            </div>
        </div>
        <div class="p-2">
            <div class="col-sm-9">
                <button type="submit" class="bg-blue-400 p-2 w-full">
                    {{ __('Send') }}
                </button>
            </div>
        </div>
    </div>
</form>