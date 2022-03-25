<div>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Users</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item active">Users</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="d-flex justify-content-between align-items-center mb-2">

                        <div class="col-md-4 input-group">
                            <span class="input-group-text ">
                               Per Page
                            </span>
                            <select class="form-select form-select-sm " wire:model="perPage">
                                <option value="10"> 10</option>
                                <option value="20"> 20</option>
                                <option value="26"> 25</option>
                                <option value="50"> 50</option>
                                <option value="100"> 100</option>
                            </select>
                        </div>

                        <div class="col-md-4 d-flex justify-content-end">
                            <input wire:model="search" type="search" class="form-control mx-2">
                        </div>

                        <div class="col-md-4 d-flex justify-content-end">
                            <button wire:click.prevent="addNew"
                                    class="btn btn-primary  btn-sm px-2"><i class="fa fa-plus-circle mr-2"></i> Add New User
                            </button>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">

                            <table class="table table-hover table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th scope="col">SL</th>
                                    <th scope="col">Doctor Name</th>
                                    <th scope="col">Patient Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Registered Date</th>
                                    <th scope="col">Options</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <th scope="row">{{$loop->iteration}}</th>
                                        <td>{{$user->name}}</td>
                                        <td>

                                            @foreach($user->clients as $client)
                                                <span class="badge bg-info  d-block my-2">{{$client->name}}</span>
                                            @endforeach

                                        </td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->created_at->toFormattedDate() }}</td>
                                        <td>
                                            <a href="" wire:click.prevent="edit({{ $user }})">
                                                <i class="fa fa-edit mr-2"></i>
                                            </a>
                                            <a href="" wire:click.prevent="confirmUserRemoval({{ $user->id }})">
                                                <i class="fa fa-trash text-danger"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>


                        </div>
                        <div class="card-footer d-flex justify-content-end">
                            {{$users->links()}}
                        </div>
                    </div>

                </div>

            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <!-- Modal -->
    <div class="modal fade" id="userForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
         wire:ignore.self>
        <div class="modal-dialog">
            <form autocomplete="off" wire:submit.prevent="{{$showEditModal ? 'updateUser' : 'creatUser'}}">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">
                            @if($showEditModal)
                                <span>Edit User</span>
                            @else
                                <span>Add New User</span>
                            @endif
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="mb-3 form-group">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" wire:model.defer="state.name"
                                   class="form-control @error('name') is-invalid @enderror" id="name"
                                   aria-describedby="nameHelp" placeholder="Enter Your Full Name">
                            @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3 form-group">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" wire:model.defer="state.email"
                                   class="form-control @error('email') is-invalid @enderror" id="email"
                                   aria-describedby="emailHelp" placeholder="Enter Your Email">
                            @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3 form-group">
                            <label for="password">Password</label>
                            <input type="password" wire:model.defer="state.password"
                                   class="form-control @error('password') is-invalid @enderror" id="password"
                                   placeholder="Password">
                            @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3 form-group">
                            <label for="passwordConfirmation">Confirm Password</label>
                            <input type="password" wire:model.defer="state.password_confirmation"
                                   class="form-control @error('password') is-invalid @enderror"
                                   id="passwordConfirmation" placeholder="Confirm Password">
                            @error('passwordConfirmation')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i
                                class="fa fa-times mr-1"></i> Cancle
                        </button>
                        <button type="submit" class="btn btn-primary"><i class="fa fa-save mr-1"></i>
                            @if($showEditModal)
                                <span>Update</span>
                            @else
                                <span>Save</span>
                            @endif
                        </button>
                    </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="confirmationModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
     wire:ignore.self>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5>Delete User</h5>
            </div>

            <div class="modal-body">
                <h4>Are you want to delete user?</h4>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times mr-1"></i>
                    Cancle
                </button>
                <button type="submit" wire:click.prevent="deleteUser" class="btn btn-danger"><i
                        class="fa fa-trash mr-2">Delete User</i>
                </button>
            </div>
        </div>
    </div>
</div>
</div>

</div>
