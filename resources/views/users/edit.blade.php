@extends('layouts.app')

@section('title', 'Edit User')

@section('content')
    <div class="container">
        <div class="row-justify-content-center">
            <form action="{{route('user.update')}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PATCH')


                <h3 class="fw-bold">Edit Employee</h3>

                {{-- Name --}}
                <div class="row mb-3">
                    <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>
    
                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name',$user->name) }}" required autocomplete="name" autofocus>
    
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                {{-- avatar --}}

                <div class="row mb-3">
                    <div class="col-4">
                        @if ($user->avatar)
                            <img src="{{$user->avatar}}" alt="{{$user->name}}" class="img-thumbnail rounded-circle d-block mx-auto avatar-lg" style="height: 100px; width: 100px">
                        @else
                            <i class="fa-solid fa-circle-user text-secondary d-block text-center icon-lg"></i>
                        @endif
                    </div>
                    <div class="col-auto">
                        <input type="file" name="avatar" id="avatar" class="form-control-sm" aria-describedby="avatar-info">
                        <div class="form-text" id="avatar-info">
                            Acceptable formats: jpeg, jpg, png, gif only <br>
                            Max file size is 1048kb
                        </div>
                    </div>
                </div>

                {{-- department --}}
                <div class="row mb-3">
                    <label for="department" class="col-md-4 col-form-label text-md-end">Department</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" id="department" name="department" value="{{old('department', $user->department)}}">
                    </div>
                </div>
    
                {{-- salary --}}
                <div class="row mb-3">
                    <label for="salary" class="col-md-4 col-form-label text-md-end">Salary</label>
                    <div class="col-md-6">
                        <input type="number" class="form-control" id="salary" name="salary" step="0.1" value="{{old('salary', $user->salary)}}">
                    </div>
                </div>
                
                {{-- Email --}}
                <div class="row mb-3">
                    <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>
    
                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email',$user->email) }}"  autocomplete="email">
    
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-8">

                    </div>
                    <div class="col-md-4">
                        <a href="{{route('user.index')}}" class="btn btn-secondary">Back</a>
                        <button type="submit" class="btn btn-warning">Save</button>
                    </div>
                </div>


            </form>
        </div>
    </div>
@endsection