@extends('admin.layout')

@section('title')
    daftares |
@endsection

@section('content')
<section class="section">
    <div class="section-header">
        <h1>daftares</h1>

        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item">
                <a href="{{ route('admin.index') }}">Dashboard</a>
            </div>
            <div class="breadcrumb-item active">
                <a href="{{ route('admin.daftars.index') }}">daftares</a>
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
            <form class="form-horizontal" action="{{ route('admin.daftars.update', $model->id) }}" method="post">
                {{ method_field('put') }}
                {{ csrf_field() }}
                <div class="form-group">
                    <label class="col-form-label" for="name">Name</label>
                    <div class="controls">
                        <input class="form-control" id="name" size="16" type="text" name="name" value="{{ $model->name }}" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-form-label" for="hp">Phone</label>
                    <div class="controls">
                        <input class="form-control" id="hp" size="16" type="text" name="hp" value="{{ $model->hp }}" readonly>
                    </div>
                </div>
<!--               
                <div class="form-group">
                    <label class="col-form-label" for="respond">Respond</label>
                    <div class="controls">
                        <textarea class="form-control" id="respond" name="respond" cols="30" rows="10" placeholder="What is your respond" required>{{ $model->respond }}</textarea>
                    </div>
                </div> -->
                <div class="form-actions">
                    <button class="btn btn-primary" type="submit">Send Reply</button>
                    <a href="{{ route('admin.daftars.index') }}" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</section>
@stop