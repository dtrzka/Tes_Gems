<?php

namespace App\Http\Livewire;

use Livewire\WithPagination;
use App\Models\Spb_req;
use Livewire\Component;

class PopUpFile extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $file_path;

    protected function rules()
    {
        return [
            'name' => 'required|string|min:6',
            'email' => ['required','email'],
            'course' => 'required|string',
        ];
    }

    public function render()
    {
        return view('livewire.pop-up-file');
    }
}
