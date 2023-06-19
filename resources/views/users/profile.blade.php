@extends('layouts.app')

@section('title', 'Edit Profile')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-8">
                <h3>Edit Profile</h3>

                <div class="mb-3">
                    <div class="row">
                        <form action="#" method="post" enctype="multipart/form-data">
                            @csrf
    
                            @if ($user->avatar)
                                <img src="{{$user->avatar}}" alt="{{$user->name}}" class="avatar-lg">
                            @else
                                <i class="fa-solid fa-circle-user text-secondary d-block text-center icon-lg"></i>
                            @endif

                            <label for="image" class="form-label"></label>
                            <input type="file" name="image" id="image" class="form-control">
    
    
                        </form>
                    </div>
                </div>
            </div>
            </div>
    </div>
@endsection