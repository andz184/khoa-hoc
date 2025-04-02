<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<style>
    body {
        background: linear-gradient(135deg, #8e44ad 0%, #9b59b6 100%);
    }
    .form-control:focus {
        border-color: #8e44ad;
        box-shadow: 0 0 0 0.25rem rgba(142, 68, 173, 0.25);
    }
    .btn-primary {
        background: linear-gradient(135deg, #8e44ad 0%, #9b59b6 100%);
        border: none;
        box-shadow: 0 4px 15px rgba(142, 68, 173, 0.4);
    }
    .btn-outline-primary {
        border-color: #8e44ad;
        color: #8e44ad;
    }
    .btn-outline-primary:hover {
        background: linear-gradient(135deg, #8e44ad 0%, #9b59b6 100%);
        border-color: #8e44ad;
        color: #fff;
    }
    a {
        color: #8e44ad;
    }
    a:hover {
        color: #9b59b6;
    }
    .icon {
        color: #8e44ad;
    }
</style>
