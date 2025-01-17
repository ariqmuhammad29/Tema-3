@extends('admin.layout')

@section('title', 'awards | ')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>awards</h1>

        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item">
                <a href="{{ route('admin.index') }}">Dashboard</a>
            </div>
            <div class="breadcrumb-item active">award</div>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <a href="{{ route('admin.awards.create') }}" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Add award</a>
        </div>
        <div class="card-body">
            @if (Session::has('status'))
                <div class="alert alert-{{ session('status') }}" role="alert">{{ session('message') }}</div>
            @endif
            <table class="table table-responsive-sm table-striped table-vertical-align">
                <thead class="thead-dark">
                <tr>
                    <th>Id</th>
                    <th>Photo</th>
                    <th>name</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($models as $key => $model)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>
                                    <div class="thumbnail">
                                    <img src="{{ $model->image->sm }}" class="rounded" style="width: 5rem">
                                    </div>
                                </td>
                                <td>
                                    <b>{{ $model->name }}</b> <br>
                                   
                                    

                                </td>
                                <td>
                                    <!-- /btn-group-->
                                    <div class="btn-group">
                                        <button class="btn btn-warning dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</button>
                                        <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 34px, 0px); top: 0px; left: 0px; will-change: transform;">
                                            <a class="dropdown-item" href="{{ route('admin.awards.edit', $model->id) }}">Edit</a>
                                            <form action="{{ route('admin.awards.destroy', $model->id) }}" method="post">
                                                {{ csrf_field() }}
                                                {{ method_field('delete') }}
                                                <button class="dropdown-item">Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                    <!-- /btn-group-->
                                </td>
                            </tr>
                        @endforeach
                        @if ($models->isEmpty())
                            <tr>
                                <td colspan="4" class="text-center"> <b>Table is empty</b> </td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                    {{ $models->links() }}
                </div>
            </div>
        </div>
        <!-- /.col-->
    </div>
</section>
@stop