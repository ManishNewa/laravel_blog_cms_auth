@extends('layouts.app')

@section('content')

    <div class="panel panel-default">

        <div class="panel-body">

            <table class="table table-hover">

                <thead>
        
                    <th>Image</th>  

                    <th>Title</th>

                    <th>Edit</th>

                    <th>Delete</th>
        
                </thead>
        
                <tbody>
        
                    @foreach ($posts as $post)

                    <tr>    

                        <td><img src="{{ '/' . $post->featured }}" alt="Image" width="90px" height="90px"></td>  

                        <td>{{ $post->title }}</td>
        
                        <td>                                
                            {{-- <a href="{{ route('post.edit', ['id' => $post->id]) }}" class="btn btn-info btn-xs"> --}}
                                Edit
                            {{-- </a> --}}
                        </td>                                        
        
                        <td>
                            <a href="{{ route('post.delete', ['id' => $post->id]) }}" class="btn btn-danger btn-xs">
                                Trash
                            </a>
                        </td>                                
                    </tr>
        
                    @endforeach
        
                </tbody>        
            </table>
        </div>
    </div>

@endsection