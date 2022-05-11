<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Post;
use App\Models\Archivo;
use Illuminate\Support\Fecades\Storage;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class ShowPosts extends Component
{
    use WithFileUploads;
    use WithPagination;

    //Escuchar el evento
    /* protected $listeners = ['renders' => 'render']; */
    protected $listeners = ['render', 'delete']; //Cuando tienen el mismo nombre solo se coloca el nombre de la función
    public $search, $post, $image, $identificador, $sort = "id", $direction = "desc", $masArchivos;

    public $open_edit = false;

    public function mount(){
        $this->identificador = rand();
        $this->post = new Post();
    }    

    public function updatingSearch(){
        $this->resetPage();
    }

    protected $rules = [
        'post.title' => 'required',
        'post.content' => 'required',        
    ];   

    public function render()
    {
        $posts = Post::where('title', 'like', '%'. $this->search.'%')
                        ->orwhere('content', 'like', '%'. $this->search.'%')
                        ->orderBy($this->sort, $this->direction)
                        ->paginate(10);
                        
        return view('livewire.show-posts',compact('posts'));
    }

    public function delete(Post $post)
    {        
        $post->delete();   
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
    
    public function save()
    {


        if(!empty($this->masArchivos)){
            foreach($this->masArchivos as $archivo){
                
            }
        }
    }
    

    public function edit(Post $post){
        $this->post = $post;
        $this->open_edit = true;
    }  
    
    public function update(){
        $this->validate();
        if($this->image)
        {
            //Eliminar la imagen anterior del post
            Storage::delete([$this->post->image]);
            //Cambiar a la nueva imagen y ponerla en el post
            $this->post->image = $this->image->store('posts');
        }

        $this->post->save(); //Guardar cambios de el post
        $this->reset(['open_edit', 'image']);
        $this->identificador = rand();
              
        $this->emit('alert', 'El registro se actualizó satisfacoriamente');
    }
        
}