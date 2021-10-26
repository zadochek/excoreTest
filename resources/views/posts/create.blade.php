@extends('layouts.admin')

@section('content')

<div class="app-main__inner">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-graph text-success">
                    </i>
                </div>
                <div>Добавление записи
                </div>
            </div>  
        </div>
    </div>        
    <div class="tab-content">
        <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <form action="/post/store" enctype="multipart/form-data" method="POST">
                        @csrf
                        <div class="position-relative row form-group">
                            <label class="col-sm-2 col-form-label">Название</label>
                            <div class="col-sm-10">
                                <input name="title" placeholder="Введите название" type="text" class="form-control" value="{{ old('title') }}">
                            </div>
                            @error('title')
                                <p>{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="position-relative row form-group">
                            <label class="col-sm-2 col-form-label">Категория</label>
                            <div class="col-sm-10">
                                <select name="category_id" class="mb-2 form-control">
                                    @foreach($categories as $category)
                                    <option value="{{ $category->id }}" @if(old('category') == $category->id) selected @endif >{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                    @error('category_id')
                                        <p class="alert alert-danger">{{ $message }}</p>
                                    @enderror
                            </div>
                        </div>
                        <div class="position-relative row form-group">
                            <label for="exampleFile" class="col-sm-2 col-form-label">Изображение</label>
                            <div class="col-sm-10">
                                <input multiple name="image" id="exampleFile" type="file" class="form-control-file">
                                @error('image')
                                    <p>{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="position-relative row form-check">
                            <div class="col-sm-10 offset-sm-2">
                                <button class="btn btn-secondary createpostbtn">Создать</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
