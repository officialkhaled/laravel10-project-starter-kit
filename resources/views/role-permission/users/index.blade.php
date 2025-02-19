<x-app-layout>

    <div class="container mt-2">
        <div class="row">
            <div class="col-md-12">

                @if (session('status'))
                    <div class="alert alert-success mt-2">{{ session('status') }}</div>
                @endif

                <div class="card mt-3">
                    <div class="card-header">
                        <h2 class="d-flex justify-content-between align-items-center">
                            <b>Users</b>
                            @can('create user')
                                <a href="{{ url('users/create') }}" class="btn btn-sm btn-primary float-end shadow-sm">
                                    <i class="fa-solid fa-plus opacity-75"></i>&nbsp;&nbsp;Add User
                                </a>
                            @endcan
                        </h2>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                            <tr class="table-info">
                                <th class="text-center" width="6%">ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Roles</th>
                                <th width="20%" class="text-center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td class="text-center">
                                        @if (!empty($user->getRoleNames()))
                                            @foreach ($user->getRoleNames() as $rolename)
                                                <label class="badge bg-primary mx-1">{{ $rolename }}</label>
                                            @endforeach
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        @can('update user')
                                            <a href="{{ url('users/'.$user->id.'/edit') }}" class="btn btn-sm btn-success shadow-sm">
                                                <i class="fa-solid fa-pen-to-square opacity-75"></i>
                                            </a>
                                        @endcan
                                        @can('delete user')
                                            <a href="{{ url('users/'.$user->id.'/delete') }}" class="btn btn-sm btn-danger shadow-sm">
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
