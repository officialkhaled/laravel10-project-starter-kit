<x-app-layout>

    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">

                @if ($errors->any())
                    <ul class="alert alert-warning mt-2">
                        @foreach ($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                @endif

                <div class="card">
                    <div class="card-header">
                        <h2 class="d-flex justify-content-between align-items-center">
                            <b>Create Permission</b>
                            <a href="{{ url('permissions') }}" class="btn btn-sm btn-danger float-end shadow-sm">
                                <i class="fa-solid fa-circle-chevron-left opacity-75"></i>&nbsp;&nbsp;Back
                            </a>
                        </h2>
                    </div>

                    <div class="card-body">
                        <form action="{{ url('permissions') }}" method="POST">
                            @csrf

                            <div class="mb-3">
                                <label class="form-label" for="name">Permission Name</label>
                                <input type="text" name="name" id="name" class="form-control rounded-md"/>
                            </div>
                            <div class="mb-2 mt-4 flex justify-center gap-1">
                                <button type="submit" class="btn btn-sm btn-success shadow-sm" onclick="formSubmit()">
                                    <i class="fa-solid fa-floppy-disk opacity-75"></i>&nbsp;&nbsp;Save
                                </button>
                                <button type="button" class="btn btn-sm btn-warning shadow-sm" onclick="pageRefresh()">
                                    <i class="fa-solid fa-arrows-rotate opacity-75"></i>&nbsp;&nbsp;Refresh
                                </button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>

</x-app-layout>
