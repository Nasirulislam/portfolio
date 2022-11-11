<?php

namespace App\Http\Livewire;

use App\Models\Index as ModelsIndex;
use Illuminate\Database\QueryException;
use Livewire\Component;

class Index extends Component
{
    public $search='';
    public $index = [];

    public function openEditUser($index)
    {
        $this->index = $index;
        $this->dispatchBrowserEvent("openEditModal");
    }

    public function openDeleteModal($userID)
    {
        $this->userId = $userID;
    }

    public function deleteUser()
    {
        $deleted = ModelsIndex::where('id', $this->userId)->delete();
        if ($deleted) {
            session()->flash('success', 'User deleted successfully');
        } else {
            session()->flash('error', 'Something went wrong');
        }
    }

    public function updateIndex()
    {
        $validate = $this->validateInput($this->index);
        if ($validate->fails()) {
            session()->flash('error', $validate->errors()->first());
            return $this->addError('message', $validate->errors()->first());
        }

        try {
            ModelsIndex::where('id', $this->index['id'])->update($validate->validated());
        } catch (QueryException $e) {
            return $this->addError('error', $e->getMessage());
        }
        return back()->with('success', 'Portfolio updated successfully..!');
    }

    protected function validateInput($payload)
    {
        $validate = validator($payload, [
            'title' => ['required', 'string', 'min:2'],
            'status' => ['required', 'in:1,0'],
            'banners' => ['required', 'array']
        ]);
        return $validate;
    }

    public function render()
    {
        $search = '%' . trim($this->search) . '%';
        $columns = ['id', 'title', 'slug', 'status', 'banners'];
        $indexes = ModelsIndex::select($columns)
            ->when($this->search, function ($q) use ($search) {
                return $q->where('title', 'like', $search);
            })->latest()->paginate(10);

        return view('livewire.index', ['indexes' => $indexes]);
    }
}
