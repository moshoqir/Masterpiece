<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationController extends Controller
{

    public function index()
    {
        $notifications = auth()->user()->notifications()->paginate(10);
        return view('notifications.index', compact('notifications'));
    }


    public function count()
    {
        return response()->json([
            'count' => auth()->user()->unreadNotifications->count()
        ]);
    }
    public function markAsRead($id)
    {
        $notification = auth()->user()->notifications()->findOrFail($id);
        $notification->markAsRead();

        return redirect()->to($notification->data['url'] ?? route('admin.notifications'));
    }

    public function markAllAsRead()
    {
        auth()->user()->unreadNotifications->markAsRead();

        return back()->with('success', 'All notifications marked as read');
    }

    public function destroy($id)
    {
        auth()->user()->notifications()->findOrFail($id)->delete();

        return back()->with('success', 'Notification deleted');
    }
}
