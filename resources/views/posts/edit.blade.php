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
                <div>Редактирование записи: {{ $post->title}}
                </div>
            </div>  
        </div>
    </div>        
    <div class="tab-content">
        <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <div style="color: red">
                        @error('imageload')
                            <p>{{ $message }}</p>
                        @enderror
                    </div>
                    <form action="/post/{{ $post->id }}/update" enctype="multipart/form-data" method="POST">
                        @csrf
                        <div class="position-relative row form-group">
                            <label class="col-sm-2 col-form-label">Название</label>
                            <div class="col-sm-10">
                                <input name="title" placeholder="Введите название" type="text" class="form-control" value="{{ old('title') ?? $post->title }}">
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
                                    <option value="{{ $category->id }}" @if(old('category') == $category->id || $post->category_id == $category->id) selected @endif >{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                    @error('category_id')
                                        <p>{{ $message }}</p>
                                    @enderror
                            </div>
                        </div>
                        <div class="position-relative row form-group">
                            <label for="exampleFile" class="col-sm-2 col-form-label">Обложка товара</label>
                            <div class="col-sm-10">
                                <input multiple name="image" id="exampleFile" type="file" class="form-control-file">
                                <small class="form-text text-muted">Рекомедуемый размер изображения 245*184</small>
                                @error('image')
                                    <p>{{ $message }}</p>
                                @enderror
                                @if($post->image)
                                <div class="mt-3" style="width: 200px;">
                                    <img src="/storage/{{ $post->image }}" alt="img">
                                </div>
                                @endif
                            </div>
                        </div>
                        <div class="position-relative row form-check">
                            <div class="col-sm-10 offset-sm-2">
                                <button class="btn btn-secondary createpostbtn">Сохранить</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
