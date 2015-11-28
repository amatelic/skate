<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Redirect;
use App\Notification;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class NotificationController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $notifications = Notification::all();
        return view('admin.notification', compact('notifications'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
      $v = Validator::make($request->all(), ['title' => 'required','body' => 'required']);

      if ($v->fails())
      {
          return redirect()->back()->withErrors($v->errors());
      }
        $notification = Notification::create($request->all());
        return Redirect::to('admin/notifications');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $notification = Notification::find($id);
        $notification->delete();
        return 'deleted';
    }

    /**
     * Show notifications
     */
    public function showNotification()
    {
      $notifications = Notification::all()->take(5);
      return view('index', compact('notifications'));
    }
}
