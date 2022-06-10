<?php

namespace App\Http\Livewire\Components;

use App\Models\Blog;
use App\Models\Like as ModelsLike;
use Livewire\Component;

class Like extends Component
{
    public $blog;
    public $likes_count;

    public function like(): void
    {
        if ($this->blog->isLiked()) {
            $this->blog->removeLike();
            $this->likes_count--;
        } elseif (auth()->user()) {
            $this->blog->likes()->create([
                'user_id' => auth()->id(),
            ]);
            $this->likes_count++;
        } elseif (($ip = request()->ip()) && ($userAgent = request()->userAgent())) {
            $this->blog->likes()->create([
                'ip_address' => $ip,
                'user_agent' => $userAgent,
            ]);
            $this->likes_count++;
        }
    }

    public function mount(Blog $blog)
    {
        $blog->loadCount('likes');
        $this->blog = $blog;
        $this->likes_count = $blog->likes_count;
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
        ]);
    }
}
