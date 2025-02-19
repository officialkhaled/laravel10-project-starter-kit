<x-app-layout>

    <div class="container mt-2">
        <div class="row">
            <div class="col-md-12">

                @if (session('status'))
                    <div class="alert alert-success mt-2">{{ session('status') }}</div>
                @endif

                <div class="card mt-3 mb-6">
                    <div class="card-header">
                        <h2 class="d-flex justify-content-between align-items-center">
                            <b>Roles</b>
                            @can('create role')
                                <a href="{{ route('roles.create') }}" class="btn btn-sm btn-primary float-end shadow-sm">
                                    <i class="fa-solid fa-plus opacity-75"></i>&nbsp;&nbsp;Add
                                </a>
                            @endcan
                        </h2>
                    </div>

                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                            <tr class="table-info">
                                <th class="text-center" width="10%">ID</th>
                                <th>Name</th>
                                <th width="40%" class="text-center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($roles as $role)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td>{{ $role->name }}</td>
                                    <td class="text-center">
                                        <a href="{{ url('roles/'.$role->id.'/give-permissions') }}" class="btn btn-sm btn-warning shadow-sm">
                                            <i class="fa-solid fa-plus opacity-75"></i>&nbsp;&nbsp;Add / Edit Role Permission
                                        </a>

                                        @can('update role')
                                            <a href="{{ url('roles/'.$role->id.'/edit') }}" class="btn btn-sm btn-success shadow-sm">
                                                <i class="fa-solid fa-pen-to-square opacity-75"></i>
                                            </a>
                                        @endcan

                                        @can('delete role')
                                            <a href="{{ url('roles/'.$role->id.'/delete') }}" class="btn btn-sm btn-danger shadow-sm">
                                                <i class="fa-solid fa-trash opacity-75"></i>
                                            </a>
                                        @endcan
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

</x-app-layout>
