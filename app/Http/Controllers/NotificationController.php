<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class NotificationController extends Controller
{
    public function index(Request $request)
    {
        return response()->json(Notification::where('user_id', Auth::id())->orderBy('created_at', 'desc')->get());
    }

    public function show(Notification $notification)
    {
        $notification->update(['is_read' => true]);
        return response()->json($notification);
    }
}
