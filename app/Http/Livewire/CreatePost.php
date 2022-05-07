<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;

class CreatePost extends Component
{
    protected $rules = [
        'title' => 'required|max:100',
        'content' => 'required|min:2',
    ];

    public $open = false;
    public $title, $content;

    public function update($propertyName){
        $this->validateOnly($propertyName);
    }

    public function save(){
        $this->validate();

        Post::create([
            'title' => $this->title,
            'content' => $this->content
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
