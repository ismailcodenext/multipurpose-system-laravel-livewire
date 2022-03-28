<?php

namespace App\Http\Livewire\Admin\Users;

use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;


use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Livewire\WithFileUploads;
use Livewire\WithPagination;


class ListUser extends Component
{
    use WithFileUploads;
    use WithPagination;

    public $perPage = 10;
    public $search = '';
    protected $paginationTheme = 'bootstrap';
    public $state = [];
    public $user;
    public $showEditModal = false;
    public $userIdBeingRemoved = null;
    public $photo;
    private $userList=[];
    public function addNew()
    {
        $this->reset();
        $this->dispatchBrowserEvent('show-form');
    }


    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function render()
    {

        $this->userList =  User::search($this->search)->with('clients')->orderBy('id')->paginate($this->perPage);

        return view('livewire.admin.users.list-users', [
            'users' =>  $this->userList,
        ]);
    }

    public function creatUser()
    {


        $this->showEditModal = false;

        $validatedData = Validator::make($this->state, [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
        ])->validate();

        $validatedData['password'] = bcrypt($validatedData['password']);

        if($this->photo) {
            $validatedData['avatar'] = $this->photo->store('/', 'avatars');
        }

        User::create($validatedData);

        $this->dispatchBrowserEvent('hide-form', ['message' => 'User added sucessfully!']);



    }

    public function edit(User $user)
    {
        $this->showEditModal = true;
        $this->user = $user;
        $this->state = $user->toArray();

        $this->dispatchBrowserEvent('show-form');
    }

    public function updateUser()
    {
        $this->showEditModal = false;
        $validatedData = Validator::make($this->state, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $this->user->id,
            'password' => 'sometimes|confirmed',
        ])->validate();

        if (!empty($validatedData['password'])) {
            $validatedData['password'] = bcrypt($validatedData['password']);
        }

        if($this->photo) {
//            Storage::disk('avatars')->delete($this->user->avatar);
            $validatedData['avatar'] = $this->photo->store('/', 'avatars');
        }

        $this->user->update($validatedData);
        $this->reset();

        $this->dispatchBrowserEvent('hide-form', ['message' => 'User Updated sucessfully!']);
    }

    public function confirmUserRemoval($userId)
    {
        $this->userIdBeingRemoved = $userId;
        $this->dispatchBrowserEvent('show-delete-modal');
    }

    public function deleteUser()
    {
        $user = User::findOrFail($this->userIdBeingRemoved);
        $user->delete();
        $this->dispatchBrowserEvent('hide-delete-modal', ['message' => 'User Deleted Successfully!']);
    }


}
