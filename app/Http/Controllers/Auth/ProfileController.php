<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use V1\Users\Services\UserService;
use V1\Users\Requests\UserRequest;
use App\Traits\SaveImage;
use Illuminate\Support\Facades\Hash;
use Auth;

class ProfileController extends Controller
{
    use SaveImage;
    private UserService $userService;

    public function __construct(UserService $userService){
        $this->userService = $userService;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $user)
    {
        try{
            $data = request()->all();
            if($request->has('image'))
                $data['image'] = $this->saveImage($request->image, 'images/users');
            $this->userService->update($data,$user);
            toastr()->success(__('language.data_updated_sucessfully'), __('language.edit'));
            return redirect()->route('dashboard.profile');
        }catch(\Exception $ex){
            return redirect()->back()->withErrors(['error' => $ex->getMessage()]);
        }
    }


    public function show()
    {
        try{
            $user = Auth::user();
            return view('auth.profile',compact('user'));
        }catch(\Exception $ex){
            return redirect()->back()->withErrors(['error' => $ex->getMessage()]);
        }
    }

    public function changePassword(Request $request) {

        if (!(Hash::check($request->current_password, Auth::user()->password))) {
            toastr()->error(__('language.your_current_password_does_not_matches_with_the_password'), __('language.error'));
            return redirect()->back();
        }

        if(strcmp($request->current_password, $request->new_password) == 0){
            toastr()->error(__('new_password_cannot_be_same_as_your_current_password'), __('language.error'));
            return redirect()->back();
        }

        $validatedData = $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|string|min:6',
        ]);

        $user = Auth::user();
        $user->password = bcrypt($request->new_password);
        $user->save();
        toastr()->success(__('language.password_changed'), __('language.edit'));
        return redirect()->back();
    }

}
