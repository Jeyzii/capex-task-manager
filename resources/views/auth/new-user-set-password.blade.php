@extends('layouts.app')

@section('content')
<div class="max-w-md mx-auto bg-white p-6 rounded shadow-lg">
    <form class="form theme-form" action="{{ route('add.password') }}" method="POST">
        @csrf
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <div class="form-group" data-validate="Please enter password">
                        <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Password</label>
                        <input class="form-control @error('password') border-red-500 @enderror
                            w-full px-3 py-2 border rounded-lg focus:outline-none focus:shadow-outline"
                            id="password" type="password" name="password" required autocomplete="new-password"
                            placeholder="Password">
                        <span class="focus-form-control"></span>
                        @error('password')
                            <span class="text-red-500 text-sm mt-1" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <div class="form-group" data-validate="Please enter password">
                        <label for="password-confirm" class="block text-gray-700 text-sm font-bold mb-2">Confirm Password</label>
                        <input class="form-control @error('password_confirmation') border-red-500 @enderror 
                            w-full px-3 py-2 border rounded-lg focus:outline-none focus:shadow-outline"
                            id="password-confirm" type="password" name="password_confirmation" required
                            autocomplete="new-password" placeholder="Confirm Password">
                        <span class="focus-form-control"></span>
                        @error('password_confirmation')
                            <span class="text-red-500 text-sm mt-1" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>
        </div>

        <div class="card-footer">
            <br>
            <button class="btn btn-primary w-full px-4 py-2 bg-blue-500 text-white rounded-full font-bold hover:bg-blue-700 
                        focus:outline-none focus:shadow-outline" type="submit" data-original-title="" title="">
                {{ __('Submit') }}
            </button>
        </div>
    </form>
</div>
@endsection
