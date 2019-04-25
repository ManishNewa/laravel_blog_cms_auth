@extends('layouts.app')

@section('content')

    <div class="panel panel-default">

        <div class="panel-body">

                <table class="table table-hover">

                        <thead>
                
                            <th>Category Name</th>
                
                            <th>Editing</th>

                            <th>Deleting</th>
                
                        </thead>
                
                        <tbody>
                
                            @foreach ($categories as $category)
                                <tr>
                
                                        <td>
                
                                            {{ $category->name }}
                        
                                        </td>
                        
                                        <td>
                                            
                                            <a href="{{ route('category.edit', ['id' => $category->id]) }}" class="btn btn-info btn-xs">
                                            
                                                Edit

                                            </a>
                                        
                                        </td>                                        
                        
                                        <td>
                                            
                                            <a href="{{ route('category.delete', ['id' => $category->id]) }}" class="btn btn-danger btn-xs">
                                            
                                                Delete

                                            </a>
                                            
                                        </td>
                                            
                                </tr>
                
                            @endforeach
                
                        </tbody>
                
                    </table>

        </div>

    </div>

@endsection