@php
    $user = filament()->auth()->user();
@endphp

<div class="bottom-0 left-0 z-20 w-full p-4 bg-white border-t border-gray-200 md:flex md:items-center md:justify-between md:p-6 dark:bg-gray-800 dark:border-gray-600">
    <x-filament::avatar
        :src="filament()->getUserAvatarUrl($user)"
        class="fi-user-avatar rounded-full"
        style="margin-right: 1rem;"
    />

    <div class="space-y-1">
        <div class="text-gray-700 dark:text-gray-200 font-medium text-sm">
            {{ filament()->getUserName($user) }}
        </div>
        <form
            action="{{ filament()->getLogoutUrl() }}"
            method="post"
            class="my-auto -me-2.5 sm:me-0"
        >
            @csrf

            <x-filament::button
                color="gray"
                icon="heroicon-m-arrow-left-on-rectangle"
                icon-alias="panels::widgets.account.logout-button"
                labeled-from="sm"
                tag="a"
                type="submit"
                size="xs"
                outlined
            >
                {{ __('filament-panels::widgets/account-widget.actions.logout.label') }}
            </x-filament::button>
        </form>
    </div>
</div>
