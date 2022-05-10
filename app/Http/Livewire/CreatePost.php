<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreatePost extends Component
{
    use WithFileUploads;

    protected $rules = [
        'title' => 'required|max:100',
        'content' => 'required|min:2',
        'image' => 'required|image|max:2048'
    ];

    public $open = false;
    public $title, $content, $image;

    public function update($propertyName){
        $this->validateOnly($propertyName);
    }

    public function save(){
        $this->validate();

        Post::create([
            'title' => $this->title,
            'content' => $this->content,
        
        ]);

        $this->reset(['open','title','content']);

        //Emitir eventos
        $this->emitTo('show-posts','render');  //solo un componente escucha el evento
        $this->emit('alert', 'El registro se creó satisfactoriamente');
    }

    public function render()
    {
        return view('livewire.create-post');
    }
}
