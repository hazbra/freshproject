<?php

namespace App\Http\Controllers;

use App\Reply;
use Illuminate\Http\Request;

class ConversationBestReplyController extends Controller
{
    public function store(Reply $reply)
    {
        $this->authorize('update', $reply->conversation);

        $reply->conversation->setBestReply($reply);
        return back();
    }
}
