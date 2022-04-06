@extends('layouts.base')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <h2 class="text-center mb-5">Usuarios admin</h2>
            <a class="btn btn-success mb-4" href="{{ url('/form') }}">Agregar USUARIO</a>
            {{-- Es es mensaje flash --}}
            @if (session('usuarioEliminado'))
                <div class="alert alert-success">
                    {{ session('usuarioEliminado') }}
                </div>
            @endif




            <table class="table bordered table-striped text-center">
                <thead>
                    <tr>
                        <th>NOmbre</th>
                        <th>Email</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->nombre }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <a href="{{route('editform',$user->id)}}" class="btn btn-primary mb-1">
                                <i class="fas fa-pencil-alt"></i>
                                </a>




                                <form action="{{ route('destroy', $user->id) }}" method="POST">
                                    @csrf @method("DELETE")
                                    <button type="submit" onclick="return confirm('¿Borrar?');" class="btn btn-danger">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>

                        </tr>
                    @endforeach

                </tbody>
            </table>
            {{ $users->links() }}
        </div>
    </div>
</div>
