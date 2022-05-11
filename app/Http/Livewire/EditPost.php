<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Post;
use Livewire\WithFileUploads;
use Illuminate\Support\Fecades\Storage;

class EditPost extends Component
{
    use WithFileUploads;

    public $open = false;
    public $post;
    public $image, $identificador;

    protected $rules = [
        'post.title' => 'required',
        'post.content' => 'required',     
    ];

    //Recibe el parametro
    public function mount(Post $post){
        $this->post = $post;
        $this->identificador = rand();
    }
    
    public function render()
    {      
        return view('livewire.edit-post');
    }
   
    public function save()
    {
        $this->validate();
        if($this->image)
        {
            //Eliminar la imagen anterior del post
            Storage::delete([$this->post->image]);
            //Cambiar a la nueva imagen y ponerla en el post
            $this->post->image = $this->image->store('posts');
        }

        $this->post->save(); //Guardar cambios de el post
        $this->reset(['open', 'image']);
        $this->identificador = rand();
       
        $this->emitTo('show-posts','render');  //solo un componente escucha el evento
        $this->emit('alert', 'El registro se actualizó satisfacoriamente');
    }
}
