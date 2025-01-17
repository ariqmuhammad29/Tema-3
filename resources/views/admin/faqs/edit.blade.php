@extends('admin.layout')

@section('title')
Create Faq |
@endsection

@section('content')
<section class="section">
    <div class="section-header">
        <h1>faqs</h1>

        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item">
                <a href="{{ route('admin.index') }}">Dashboard</a>
            </div>
            <div class="breadcrumb-item">
                <a href="{{ route('admin.faqs.index') }}">faqs</a>
            </div>
            <div class="breadcrumb-item">
                {{ $model->name }}
            </div>
            <div class="breadcrumb-item active">
                Edit
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            @if (Session::has('status'))
            <div class="alert alert-{{ session('status') }}" role="alert">{{ session('message') }}</div>
            @endif
            @if ($errors->any())
            @foreach($errors->all() as $error)
            <div class="alert alert-danger" role="alert">{{ $error }}</div>
            @endforeach
            @endif
            <form class="form-horizontal" action="{{ route('admin.faqs.update', $model->id) }}" method="post">
                {{ method_field('put') }}
                {{ csrf_field() }}
                <div class="form-group">
                    <label class="col-form-label" for="question">question</label>
                    <div class="controls">
                        <input class="form-control" id="question" size="16" type="text" name="question" placeholder="question" value="{{ $model->question }}" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-form-label" for="desc">answer</label>
                    <div class="controls">
                        <textarea class="form-control" id="desc" name="answer" cols="30" rows="10" style="min-height: 60px;" placeholder="answer" required>{{ $model->answer }}</textarea>
                    </div>
                </div>
                <div class="form-actions">
                    <a href="{{ route('admin.faqs.index') }}" tabindex="-1" class="btn btn-secondary">
                        <i class="fa fa-arrow-left"></i> Back
                    </a>
                    <button class="btn btn-primary ml-2" type="submit">
                        <i class="fa fa-save"></i> Update
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>
@stop
