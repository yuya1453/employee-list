@extends('layouts.app')

@section('title', 'Home')

@section('content')
<style>
    table thead{
        background-color: rgb(14, 172, 119)
    }
</style>

    <div class="container">
        <div class="row justify-content-center">
            <h3 class="fw-bold text-center">Laravel Employee List</h3>

            <div class="mb-3 mt-5">
                <form action="{{route('user.search')}}">
                    <div class="row gx-2">
                            @csrf
                            <div class="col-3">

                            </div>
                            <div class="col-6">
                                <input type="text" name="search" id="search" class="form-control form-control-sm" placeholder="Search...">
                            </div>
                            <div class="col-auto">
                                <button type="submit" class="btn btn-outline-white"><i class="fa-solid fa-magnifying-glass"></i></button>
                            </div>
                    </div>
                </form>
            </div>
            <table class="table table-hover text-center mt-5">
                <thead class="thead">
                    <tr>
                        <th style="width: 20px"></th>
                        <th style="width: 70px">NAME</th>
                        <th style="width: 120px">DEPARTMENT</th>
                        <th style="width: 100px">Actions</th>
                    </tr>
                </thead>
                <tbody class="table table-hover align-middle border">
                    {{-- Foreach --}}
                    @foreach ($users as $user)
                        <tr>
                            <td>
                                @if ($user->avatar)
                                    <img src="{{$user->avatar}}" alt="{{$user->name}}" class="rounded-circle d-block mx-auto avatar-sm" style="height: 50px; width: 50px" >
                                @else
                                    <i class="fa-solid fa-circle-user d-block text-center icon-md"></i>
                                @endif
                            </td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->department}}</td>
                            <td>
                                @if (Auth::user()->id === $user->id)
                                    <a href="{{route('user.edit')}}" class="btn btn-secondary btn-sm"><i class="fa-solid fa-pen text-secondary"></i></a>
                                    <a href="#" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#delete-user-{{$user->id}}" ><i class="fa-solid fa-trash-can "></i></a>
                                @else
                                    <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#detail-user-{{$user->id}}">Details</button>
                                @endif
                            </td>
                            @include('users.modal.detail')
                            @include('users.modal.delete')
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-center">
                {{$users->links()}}
            </div>

    </div>
@endsection