<?php

namespace App\Http\Livewire\Components;

use App\Models\Blog;
use App\Models\Comment as ModelsComment;
use Livewire\Component;

class Comment extends Component
{
    public $comments = [];
    public $comment;
    public $blog;

    protected $rules = [
        'comment.user_id' => ['nullable', 'integer', 'exists:users,id'],
        'comment.ip_address' => ['nullable', 'string'],
        'comment.user_agent' => ['nullable', 'string'],
        'comment.name' => ['nullable', 'string'],
        'comment.email' => ['nullable', 'email', 'string'],
        'comment.comment' => ['required', 'string'],
        'comment.is_approved' => ['required', 'boolean'],
    ];

    public function store()
    {
        $this->validate();

        try {
            if ($this->comment->name != "" && $this->comment->email != "") {
                $this->comment->is_approved = true;
            }

            $this->comment->created_at = now();
            $this->blog->comments()->create($this->comment->toArray());
        } catch (\Throwable $th) {
            return session()->flash('error', 'Gagal menambahkan komentar: ' . $th->getMessage());
        }

        if ($this->comment->is_approved) {
            $this->comments = collect($this->blog->comments)->push($this->comment);
        }

        $this->_initiateComment();
        $this->emit('commentStored');
        return session()->flash('success', 'Berhasil menambahkan komentar.');
    }

    public function mount(Blog $blog)
    {
        $blog->load('comments');
        $this->blog = $blog;
        $this->comments = $blog->comments->where('is_approved', true);
        $this->_initiateComment();
    }

    public function render()
    {
        return view('livewire.components.comment');
    }

    public function _initiateComment()
    {
        if (auth()->user()) {
            $this->comment = new ModelsComment([
                'user_id' => auth()->id(),
                'is_approved' => false,
            ]);
        } elseif (($ip = request()->ip()) && ($userAgent = request()->userAgent())) {
            $this->comment = new ModelsComment([
                'ip_address' => $ip,
                'user_agent' => $userAgent,
                'is_approved' => false,
            ]);
        }
    }
}
