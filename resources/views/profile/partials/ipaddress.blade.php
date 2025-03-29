<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Save IP Address') }}
        </h2>
    </header>

    <form method="post" action="#" class="mt-6">
    {{-- <form method="post" action="{{ route('ip.store') }}" class="mt-6"> --}}
        @csrf

        <div>
            <x-input-label for="ip_address" :value="__('IP Address')" />
            <x-text-input id="ip_address" name="ip_address" type="text" class="mt-1 block w-full" placeholder="Enter IP address" required />
            <x-input-error :messages="$errors->ip_address" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>
        </div>
    </form>
</section>
