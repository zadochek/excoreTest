@extends('layouts.admin')

@section('content')

<div class="app-main__inner">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-drawer icon-gradient bg-happy-itmeo">
                    </i>
                </div>
                <div>Записи</div>
            </div>   
        </div>
    </div>           
    <div class="row">
        <div class="col-lg-12">
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <h5 class="card-title">Записи</h5>
                    @if(session()->has('message'))
                        <div class="alert alert-success">
                            {{ session()->get('message') }}
                        </div>
                    @endif
                    <table class="mb-0 table">
                        <thead>
                            <tr>
                                <th>id</th>
                                @cannot('create-post', auth()->user())
                                <th class="text-center">Сотрудник</th>
                                @endcan
                                <th class="text-center">Название</th>
                                <th class="text-center">Категория</th>
                                <th class="text-right">Управление</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $post)
                                <tr>
                                    <td> {{ $post->id }}</td>
                                    @cannot('create-post', auth()->user())
                                    <td class="text-center"><a href="/posts/employee/{{ $post->user_id }}">{{ $post->user->email }}</a></td>
                                    @endcan
                                    <td class="text-center"> {{ $post->title }}</td>
                                    <td class="text-center"> <a href="/posts/category/{{ $post->category->id }}">{{ $post->category->name }}</a> </td>
                                    <td class="text-right">
                                        @can('create-post', auth()->user())
                                        <a class="btn btn-warning" href="/post/{{ $post->id }}/edit">Изменить</a>
                                        @endcan
                                        <a class="btn btn-danger" href="/post/{{ $post->id }}/delete">Удалить</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="d-flex justify-content-center">
                {{ $posts->appends(request()->except('page'))->links('vendor.pagination.bootstrap-4') }}
            </div>
        </div>
    </div>
</div>

@endsection