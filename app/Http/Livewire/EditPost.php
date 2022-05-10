<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Post;

class EditPost extends Component
{
    public $open = false;
    public $post;

    protected $rules = [];

    //Recibe el parametro
    public function mount(Post $post){
        $this->post = $post;          
    }
    
    public function render()
    {      
        return view('livewire.edit-post');
    }
}
