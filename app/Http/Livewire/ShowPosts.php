<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Post;
class ShowPosts extends Component
{
    //Escuchar el evento
    /* protected $listeners = ['renders' => 'render']; */
    protected $listeners = ['render']; //Cuando tienen el mismo nombre solo se coloca el nombre de la función
    protected $fillable = ['title', 'content', 'image'];
    public $search;
    public $sort = "id";
    public $direction = "desc";
    public $post;
    public $title, $content, $image, $id_post;
    public $modal = false;

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

    public function edit($id){
        $post = Post::findOrFail($id);
        $this->validateOnly($post);
        $this->id_post = $id;
        $this->title = $post->title;
        $this->content = $post->content;
        $this->image = $post->image;
        $this->validate();
        $this->abrirModal();
    }

    public function abrirModal()
    {
        $this->modal = true;
    }

    public function cerrarModal(){
        $this->modal = false;
    }

    public function guardar()
    {
        $this->validate();
        Post::updateOrCreate(['id'=>$this->id_bodega],
            [
                'title' => $this->title,
                'content' => $this->content,
                'image' => $this->image,
            ]);
         
         session()->flash('message',
            $this->id_bodega ? '¡Actualización exitosa!' : '¡Alta Exitosa!');
         
         $this->cerrarModal();
         $this->limpiarCampos();
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