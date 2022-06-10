<?php

namespace App\Http\Livewire\Components;

use App\Models\Blog;
use App\Models\Like as ModelsLike;
use Livewire\Component;

class Like extends Component
{
    public $blog;

    public function like(): void
    {
        if ($this->blog->isLiked()) {
            $this->blog->removeLike();
        } elseif (auth()->user()) {
            $this->blog->likes()->create([
                'user_id' => auth()->id(),
            ]);
        } elseif (($ip = request()->ip()) && ($userAgent = request()->userAgent())) {
            $this->blog->likes()->create([
                'ip_address' => $ip,
                'user_agent' => $userAgent,
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
