@extends('layouts.app')

@section('content')

    @include('admin.includes.errors')

    <div class="panel panel-default">

        <div class="panel-heading">

            Create a new category

        </div>

        <div class="panel-body">
        
            <form action="{{ route('category.store') }}" method="post">
                            
                <!-- {{ csrf_field() }} -->
                <input type = "hidden" name = "_token" value = "{{ csrf_token() }}">

                <div class="form-group">
                
                    <label for="name">Name</label>
                    
                    <input type="text" name="name" class="form-control">

                </div>

                <div class="form-group">
                                    
                    <div class="text-center">

                        <button class="btn btn-success" type="submit">
                            Store Category
                        </button>

                    </div>

                </div>

            </form>

        </div>

    </div>
    
@endsection