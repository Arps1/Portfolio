<!-- resources/views/profile.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h2 class="text-2xl font-semibold text-gray-800 dark:text-gray-200 leading-tight">
                    {{ __('Profil Pengguna') }}
                </h2>

                <div class="mt-6 space-y-4">
                    <!-- Menampilkan Nama Pengguna -->
                    <div>
                        <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">{{ __('Nama') }}</h3>
                        <p class="text-gray-600 dark:text-gray-400">{{ Auth::user()->name }}</p>
                    </div>

                    <!-- Menampilkan Email Pengguna -->
                    <div>
                        <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">{{ __('Email') }}</h3>
                        <p class="text-gray-600 dark:text-gray-400">{{ Auth::user()->email }}</p>
                    </div>
                </div>

                <!-- Link untuk Mengedit Profil -->
                <div class="mt-6">
                    <a href="{{ route('profile.edit') }}" class="text-indigo-600 hover:text-indigo-900 dark:text-indigo-400 dark:hover:text-indigo-300">
                        {{ __('Edit Profil') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
