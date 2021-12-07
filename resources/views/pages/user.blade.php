
@extends('layouts.app')

@section('content')

    @include('layouts.headers.global')
        <!-- Page content -->
        <div class="container-fluid mt--6">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <!-- Card header -->
                        <div class="card-header border-0">
                            @if(session('addedSuccessfully'))

                                <div class="alert alert-success" role="alert">
                                    <strong>Success!</strong> User added
                                </div>

                            @endif

                            @if($errors->any())
                                <div class="alert alert-warning" role="alert">
                                    <strong>Danger!</strong> Introduce valid characters
                                </div>
                            @endif
                            @if(session('deletedSuccessfully'))
                                <div class="alert alert-danger" role="alert">
                                    <strong>Warning!</strong> User was deleted successfully
                                </div>
                            @endif
                            <div class="d-flex justify-content-between">
                                <h3 class="mb-0">Light table</h3>

                                <button data-toggle="modal" data-target="#exampleModal"  class="btn alert-primary">Add new User</button>
                            </div>

                        </div>
                        <!-- Light table -->
                        <div class="table-responsive">
                            <table class="table align-items-center table-flush">
                                <thead class="thead-light">
                                <tr>
                                    <th scope="col" class="sort" data-sort="name">User</th>
                                    <th scope="col" class="sort" data-sort="budget">Id</th>
                                    <th scope="col" class="sort" data-sort="status">Name</th>
                                    <th scope="col" class="sort" data-sort="status">Email</th>
                                    <th scope="col" class="sort" data-sort="status">Rol</th>

                                    <th scope="col">Action</th>

                                    <th scope="col"></th>
                                </tr>
                                </thead>
                                <tbody class="list">


                                @foreach($data as $user)


                                    <tr>
                                        <th scope="row">
                                            <div class="media align-items-center">
                                                <a href="#" class="avatar rounded-circle mr-3">
                                                    <img alt="Image placeholder" src="../assets/img/theme/vue.jpg">
                                                </a>
                                                <div class="media-body">
                                                    <span class="name mb-0 text-sm">Users</span>
                                                </div>
                                            </div>
                                        </th>
                                        <td class="budget">
                                            {{$user->id}}
                                        </td>
                                        <td>
                                                <span class="badge badge-dot mr-4">
                                                      <i class="bg-success"></i>
                                                 <span class="status">{{$user->name}}</span>
                                                </span>
                                        </td>
                                        <td>
                                                <span class="badge badge-dot mr-4">
                                                      <i class="bg-success"></i>
                                                 <span class="status">{{$user->email}}</span>
                                                </span>
                                        </td>
                                        <td>
                                                <span class="badge badge-dot mr-4">
                                                      <i class="bg-success"></i>
                                                 <span class="status">{{$user->rol}}</span>
                                                </span>
                                        </td>

                                        <td class="text-right">
                                            <div class="dropdown">
                                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                    <a data-toggle="modal" data-target="#modal-update-{{$user->id}}" class="dropdown-item" href="{{route('user.update',$user->id)}}">Editar</a>

                                                    <form action="{{ route('user.destroy', $user) }}" method="post">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button class="dropdown-item" href="#">Eliminar</button>
                                                    </form>

                                                </div>
                                            </div>
                                        </td>
                                    </tr>

                                    @include('alerts.user.update')
                                @endforeach

                                </tbody>

                            </table>

                        </div>
                        <div class="d-flex justify-content-center">
                            {{ $data->links() }}
                        </div>
                    </div>
                </div>
            </div>

            @include('layouts.footers.guest')
        </div>

@endsection

