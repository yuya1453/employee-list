@extends('layouts.app')

@section('title', 'Search')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <p class="fw-bold">Search result for <span class="fw-bold"></span></p>

        <table class="table table-hover align-middle borde">
            @forelse ($users as $user)
                <thead class="table">
                    <tr>
                        <th>NAME</th>
                        <th>DEPARTMENT</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="table table-hover align-middle border">
                        <tr>
                            <td>{{$user->name}}</td>
                            <td>{{$user->department}}</td>
                            <td>
                                @if (Auth::user()->id === $user->id)
                                    <a href="{{route('user.edit')}}" class="btn btn-secondary btn-sm"><i class="fa-solid fa-pen text-secondary"></i></a>
                                    <a href="{{route('user.destroy',$user->id)}}" class="btn btn-danger btn-sm" data-bs-toggle="nodal" data-bs-target="#" ><i class="fa-solid fa-trash-can "></i></a>
                                @else
                                    <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#detail-user-{{$user->id}}">Details</button>
                                @endif
                            </td>
                            @include('users.modal.detail')
                        </tr>
                </tbody>
            @empty
                <p class="lead text-muted text-center">No users found.</p>
            @endforelse
        </table>

    </div>
</div>
@endsection