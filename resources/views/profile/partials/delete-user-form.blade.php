<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Delete Account') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
        </p>
    </header>

    <button
        data=""
        onclick.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
    >{{ __('Delete Account') }}</button>

    <div name="confirm-user-deletion" show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
            @csrf
            @method('delete')

            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Are you sure you want to delete your account?') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600">
                {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
            </p>

            <div class="mt-6">
                <label for="password">Password</label>
                <input type="password" name="password" placeholder="password">
                <small>{{$errors->userDeletion->first('password')}}</small>

            </div>

            <div class="mt-6 flex justify-end">
                <button onclick="$dispatch('close')">
                    {{ __('Cancel') }}
                </button>

                <button type="submit" class="ml-3">
                    {{ __('Delete Account') }}
                </button>
            </div>
        </form>
    </div>
</section>