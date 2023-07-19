<section class="space-y-6">
    <x-danger-button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-message-deletion-{{ $messageId }}')"
    >{{ __('Delete') }}</x-danger-button>

    <x-modal name="confirm-message-deletion-{{ $messageId }}" :show="$errors->messageDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('message', $selectedUser) . '/' . $messageId }}" class="p-6">
            @csrf
            @method('delete')

            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                {{ __('Are you sure?') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                {{ __('Are you sure you want to delete your message?') }}
            </p>

            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-danger-button class="ml-3">
                    {{ __('Delete Message') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</section>
