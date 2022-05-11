<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Post;
class ShowPosts extends Component
{
    //Escuchar el evento
    /* protected $listeners = ['renders' => 'render']; */
    protected $listeners = ['render']; //Cuando tienen el mismo nombre solo se coloca el nombre de la función
    public $search;
    public $sort = "id";
    public $direction = "desc";
    

    protected $rules = [
        'title' => 'required|max:100',
        'content' => 'required|min:2',
        'image' => 'required|image|max:2048'
    ];

    public function render()
    {
        $posts = Post::where('title', 'like', '%'. $this->search.'%')
                        ->orwhere('content', 'like', '%'. $this->search.'%')
                        ->orderBy($this->sort, $this->direction)
                        ->get();
                        
        return view('livewire.show-posts',compact('posts'));
    }


    public function order($sort){
        if($this->sort == $sort){
            if($this->direction == 'desc'){
                $this->direction = 'asc';
            }
            else {
                $this->direction = 'desc';
            }
        }
        else{
            $this->sort = $sort;
            $this->direction = 'asc';
        }
    }
}