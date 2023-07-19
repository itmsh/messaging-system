<section class="space-y-6">
    <x-primary-button
            x-data=""
            x-on:click.prevent="$dispatch('open-modal', 'confirm-message-update-{{ $messageId }}')"
    >{{ __('Edit') }}</x-primary-button>

    <x-modal name="confirm-message-update-{{ $messageId }}" :show="$errors->messageUpdate->isNotEmpty()" focusable>
        <form method="post" action="{{ route('message', $selectedUser) . '/' . $messageId }}" class="p-6">
            @csrf
            @method('put')

            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                {{ __('Edit') }}
            </h2>

            <input type="text"
                   class="w-full form-control @error('message') is-invalid @enderror"
                   name="message" placeholder="Message">

            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-danger-button class="ml-3">
                    {{ __('Save Message') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</section>
