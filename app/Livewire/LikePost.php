<?php

namespace App\Livewire;

use Livewire\Component;

class LikePost extends Component
{
    public $post;
    public $isLike;
    public $likes;

    ///funcion para se va ejecutar automaticamente cuando se instancia likePost es parecido al constructor
    public function mount($post)
    {
        $this->isLike = $post->checkLike(auth()->user());
        $this->likes = $post->likes->count();
    }
    public function like()
    {
        if($this->post->checkLike(auth()->user()))
        {
             $this->post->likes()->where('post_id', $this->post->id)->delete();
             ///reiscribir el codigo para el corazonsito
             $this->isLike = false;
             $this->likes--;
        }else
        {
            //ALMACENAR EL LIKE
            $this->post->likes()->create([
                'user_id' => auth()->user()->id
            ]);
            $this->isLike = true;
            $this->likes++;
            
        }
    }
    public function render()
    {
        return view('livewire.like-post');
    }
}
