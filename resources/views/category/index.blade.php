@extends('layouts.app')

@section('content')
<div class="container mt-2">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Admin Panel - Product Category List </h2>
            </div>
            <div class="pull-right mb-2">
            <a class="btn btn-dark" href="{{ route('category.create') }}"> <i class="fa fa-plus"></i> Create New Category</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif
    <table class="table table-bordered">
        <tr>
            <th>Product.No</th>
            <th>Product Category Name</th>
            <th>Parent ID</th>
            <th>Status</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($category as $catego)
        <tr>
            <td>{{ $catego->id }}</td>
            <td>{{ $catego->name }}</td>
            <td>{{ $catego->parent_id }}</td>
            <td>{{ $catego->status }}</td>
            <td>
                <form action="{{ route('category.destroy',$catego->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <!-- <input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}"> -->
                    <a class="btn btn-success" href="{{ route('category.show',$catego->id) }}"><i class="fa fa-eye"></i>  Show</a>
                    <a class="btn btn-info" href="{{ route('category.edit',$catego->id) }}"><i class="fa fa-pencil"></i>  Edit</a>
                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i>  Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

    {!! $category->links() !!}
</div>
@endsection