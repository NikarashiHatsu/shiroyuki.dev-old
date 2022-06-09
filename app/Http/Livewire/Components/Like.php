<?php

namespace App\Http\Livewire\Components;

use App\Models\Blog;
use App\Models\Like as ModelsLike;
use Livewire\Component;

class Like extends Component
{
    public $blog;

    public function like()
    {
        $user_id = auth()->id();
        $ip_address = auth()->id() == null ? request()->ip() : null;

        if ($this->blog->likes->where('user_id', $user_id)->count() > 0) {
            auth()->id() == null
                ? ModelsLike::where('ip_address', $ip_address)->where('blog_id', $this->blog->id)->delete()
                : ModelsLike::where('user_id', $user_id)->where('blog_id', $this->blog->id)->delete();
        } else {
            auth()->id() == null
                ? ModelsLike::create([
                    'ip_address' => $ip_address,
                    'blog_id' => $this->blog->id,
                ])
                : ModelsLike::create([
                    'user_id' => $user_id,
                    'blog_id' => $this->blog->id,
                ]);
        }
    }

    public function mount(Blog $blog)
    {
        $this->blog = $blog;
    }

    public function render()
    {
        return view('livewire.components.like', [
            'liked' => auth()->id() == null
                ? ModelsLike::where('blog_id', $this->blog->id)
                    ->where('ip_address', request()->ip())
                    ->exists()
                : ModelsLike::where('blog_id', $this->blog->id)
                    ->where('user_id', auth()->id())
                    ->exists(),
            'count' => $this->blog->likes()->count(),
        ]);
    }
}
