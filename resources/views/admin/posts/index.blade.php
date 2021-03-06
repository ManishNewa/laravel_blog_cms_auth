@extends('layouts.app')

@section('content')

    <div class="panel panel-default">
        
        <div class="panel-heading">

            Published Posts
            
        </div>
    

        <div class="panel-body">

            <table class="table table-hover">

                <thead>
        
                    <th>Image</th>  

                    <th>Title</th>

                    <th>Edit</th>

                    <th>Trash</th>
        
                </thead>
        
                <tbody>
                    
                    @if($posts->count()>0)

                        @foreach ($posts as $post)

                        <tr>    

                            <td><a href="{{$post->featured}}" data-toggle="lightbox"><img src="{{$post->featured}}" width="100px" alt="Image"></a></td>  
                        
                            <td>{{ $post->title }}</td>
            
                            <td>                                
                                <a href="{{ route('post.edit', ['id' => $post->id]) }}" class="btn btn-info btn-xs">
                                    Edit
                                </a>
                            </td>                                        
            
                            <td>
                                <a href="{{ route('post.delete', ['id' => $post->id]) }}" class="btn btn-danger btn-xs">
                                    Trash
                                </a>
                            </td>                                
                        </tr>
                        
                        @endforeach
                    
                    @else

                        <tr>

                            <th colspan="5" class="text-center">No Any Posts.</th>

                        </tr>

                    @endif
        
        
                </tbody>        
            </table>
        </div>
    </div>

@endsection