<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Models\ActiveCode;
use App\Notifications\ActiveCodeNotification;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class TwoFactorAuthController extends Controller
{
    public function ManageTwoFactor()
    {
        return view('profile.two-factor-auth');
    }

    public function postManageTwoFactor(Request $request)
    {
        $data = $this->validateRequestData($request);

        if($this->isRequestTypeSms($data)){

            if($request->user()->phone_number !== $data['phone']){

                return $this->createCodeAndSendSms($request, $data);

            }else{
                $request->user()->update([
                    'two_factor_type'=>'sms'
                ]);
            }
        }
        if($this->isRequestTypeOff($data)){
            $request->user()->update([
                'two_factor_type'=>'off'
            ]);
        }
        return back();
    }

    private function validateRequestData(Request $request)
    {
        $data = $request->validate([
            'type' => 'required|in:sms,off',
            'phone' => ['required_unless:type,off', Rule::unique('users', 'phone_number')->ignore($request->user()->id)]
        ]);
        return $data;
    }

    private function isRequestTypeSms($data)
    {
        return $data['type'] === 'sms';
    }

    private function createCodeAndSendSms(Request $request, array $data)
    {
        $request->session()->flash('phone', $data['phone']);

        $code = ActiveCode::generateCode($request->user());

        $request->user()->notify(new ActiveCodeNotification($code, $data['phone']));

        return redirect(route('profile.2fa.phone'));
    }

    private function isRequestTypeOff(array $data)
    {
        return $data['type'] === 'off';
    }

}
