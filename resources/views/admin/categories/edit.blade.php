@extends('layouts.app')

@section('content')


    <div class="panel panel-default">

        <div class="panel-heading">

            Update category : {{ $category->name }}

        </div>

        <div class="panel-body">
        
            <form action="{{ route('category.update',['id' => $category->id]) }}" method="post">
                            
                <!-- {{ csrf_field() }} -->
                <input type = "hidden" name = "_token" value = "{{ csrf_token() }}">

                <div class="form-group">
                
                    <label for="name">Name</label>
                    
                <input type="text" name="name" class="form-control" value="{{ $category->name }}">

                </div>

                <div class="form-group">
                                    
                    <div class="text-center">

                        <button class="btn btn-success" type="submit">
                            Update Category
                        </button>

                    </div>

                </div>

            </form>

        </div>

    </div>
    
@endsection