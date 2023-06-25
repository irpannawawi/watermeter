@extends('layouts.app')
@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <h2 class="text-lg font-medium text-gray-900">
                        {{ __('Profile Information') }}
                    </h2>
                    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
                        @csrf
                        @method('patch')
                        <div class="form-group mb-2">
                            <label for="name">Full Name</label>
                            <input type="text" id="name" name="name"  class="mt-1 block form-control" value="{{$user->name}}" required autofocus autocomplete="name" >
                        </div>

                        
                        <div class="form-group mb-2">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" class="mt-1 block form-control" value="{{$user->email}}" required >
                        </div>

                        <x-primary-button>{{ __('Save') }}</x-primary-button>

                    </form>
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>
        </div>
    </div>
@endsection
