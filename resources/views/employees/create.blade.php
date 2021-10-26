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
                <div>Добавление сотрудника
                </div>
            </div>  
        </div>
    </div>        
    <div class="tab-content">
        <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <form action="/employee/store" enctype="multipart/form-data" method="POST">
                        @csrf
                        <div class="position-relative row form-group">
                            <label class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input name="email" placeholder="Введите email" type="email" class="form-control" value="{{ old('email') }}">
                            </div>
                            @error('email')
                                <p>{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="position-relative row form-group">
                            <label class="col-sm-2 col-form-label">Пароль</label>
                            <div class="col-sm-10">
                                <input name="password" placeholder="Введите пароль" type="password" class="form-control" value="{{ old('password') }}">
                            </div>
                            @error('password')
                                <p>{{ $message }}</p>
                            @enderror
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
