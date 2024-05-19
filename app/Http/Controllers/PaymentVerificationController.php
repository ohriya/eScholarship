<?php

namespace App\Http\Controllers;


use App\Models\User;
use App\Models\College;
use App\Models\Profile;
use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentVerificationController extends Controller
{
    public function verify(Request $request)
    {
        $status = $request->q;
        // dd($status);
        $oid = "papamama123";
        $refId = $request->refId;
        $amt = $request->amt;
        // dump($oid, $refId, $amt);

            $url = "https://uat.esewa.com.np/epay/transrec";
            $data = [
                'amt' => 100,
                'rid' => $refId,
                'pid' => $oid,
                'scd' => 'EPAYTEST',
            ];

            $curl = curl_init($url);
            curl_setopt($curl, CURLOPT_POST, true);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($curl);
            curl_close($curl);

            if (strpos($response, "Success") == true) {
                $user = User::findOrFail(Auth::user()->id);
                $user->has_applied = 1;
                $user->save();

                return redirect('/home')->withStatus('You have applied for the scholarship successfully.');
            } else {
                // dd('transaction failed');
                return redirect('/home')->withDangerstatus('Payment Unsuccessful. Make payment again!');
            }
    }

}
