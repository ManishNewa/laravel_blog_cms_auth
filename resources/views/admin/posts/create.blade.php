@extends('layouts.app')

@section('content')

    @if(count($errors)>0)

        <ul class="list-group">

            @foreach($errors->all() as $error)

                <li class="list-group-item text-danger">
                                        
                    {{$error}}

                </li>

            @endforeach

        </ul>

    @endif

    <div class="panel panel-default">

        <div class="panel-heading">

            Create a new post

        </div>

        <div class="panel-body">
        
            <form action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">
                            
                <!-- {{ csrf_field() }} -->
                <input type = "hidden" name = "_token" value = "{{ csrf_token() }}">

                <div class="form-group">
                
                    <label for="title">Title</label>
                    
                    <input type="text" name="title" class="form-control">

                </div>

                <div class="form-group">
                
                    <label for="featured">Featured Image</label>
                    
                    <input type="file" name="featured" class="form-control">

                </div>

                <div class="form-group">
                
                    <label for="content">Content</label>
                    
                    <textarea name="content" id="content" cols="5" rows="5" class="form-control"></textarea>

                </div>
                
                <div class="form-group">
                                    
                    <div class="text-center">

                        <button class="btn btn-success" type="submit">
                            Store Post
                        </button>

                    </div>

                </div>

            </form>

        </div>

    </div>
    
@endsection