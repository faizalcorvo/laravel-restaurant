@extends('layout.main')

@section('content')
<main class="col-md-9 ml-sm-auto col-lg-10 px-md-4 py-4">
    <h1 class="h2 mb-4">Menu</h1>
        <nav aria-label="breadcrumb p-4 my-4">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/menu/index" class="text-decoration-none">Menu</a></li>
                <li class="breadcrumb-item active" aria-current="page">Overview</li>
            </ol>
        </nav>
    <div class="container">                
        <div class="row">
            <div class="col-16 mb-4 mb-lg-0">
                <h3>Menu Record</h3>
                <a href="/menu/create" class="btn btn-info btn-md"><span class="fa fa-plus"></span> Add Menu</a>
                @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show my-3" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <i class="fa fa-check"></i>
                    <strong>{{ session('success') }}</strong>
                </div>
                @endif
                <div class="row">
                    <div class="col-16 my-3">
                        <table class="table table-striped text-center">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Menu</th>
                                    <th>Description</th> 
                                    <th>Foto</th>
                                    <th>Price</th> 
                                    <th>Action</th> 
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($menus as $menu)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $menu->nameMenu }}</td>
                                    <td>{{ $menu->descMenu }}</td>
                                    <td>
                                        @if (!$menu->photoMenu)
                                            <img width="150px" height="120px" src="{{ asset("storage/images/defaultmenu.jpg") }}" alt="photo menu" class="img-thumbnail img-fluid">                                    
                                        @else
                                            <img width="150px" height="120px" src="{{ asset("storage/". $menu->photoMenu) }}" alt="photo menu" class="img-thumbnail img-fluid">
                                        @endif
                                    </td>
                                    <td>Rp.{{ number_format($menu->price,2,',','.') }}</td>
                                    <td>
                                        <a href="/menu/{{ $menu->id }}/edit" class="btn btn-warning btn-sm"><i class="fa fa-pencil-square"></i></a>
                                        <form action="/menu/{{ $menu->id }}" method="post">
                                            @method('DELETE')
                                            @csrf
                                            <button class="btn btn-danger btn-sm" onclick="return confirm('sure?')" type="submit"><i class="fa fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>    
@endsection