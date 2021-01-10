@extends('vendor.notifications.layouts.mail')
@section('content')
    <table style="width:100%;max-width:620px;margin:0 auto;background-color:#ffffff;">
        <tbody>
        <tr>
            <td style="text-align:center;padding: 50px 30px;">
                <img style="width:88px; margin-bottom:24px;" src="{{ asset('img/kyc-success.png') }}" alt=Confirmed">
                <h2 style="font-size: 18px; font-weight: 400; margin-bottom: 8px;">
                    Your Deposit Transaction has been confirmed.
                </h2>
            </td>
        </tr>
        </tbody>
    </table>
@endsection()