@extends('vendor.notifications.layouts.mail')
@section('content')
    <table style="width:100%;max-width:620px;margin:0 auto;background-color:#ffffff;">
        <tbody>
        <tr>
            <td style="text-align:center;padding: 30px 30px 20px">
                <img style="width:88px; margin-bottom:24px;" src="{{ asset('img/kyc-success.png') }}" alt=Confirmed">
                <h5 style="margin-bottom: 24px; color: #526484; font-size: 20px; font-weight: 400; line-height: 28px;">Hi {{ $name ?? '' }}<br>Investment Close Successfully!</h5>
                <p style="margin-bottom: 15px; color: #526484; font-size: 16px;">
                    We have successfully close your investment of <strong>{{ $amount ?? ''}} USD</strong>
                    and your return has been added to your wallet in your account. This return will only
                    be available for withdrawal after 30days. You can either proceed to
                    reinvest or request for a withdrawal after 30days.
                    Kindly visit our portal to check your investment process.
                </p>
                <p style="margin-bottom: 15px;">
                    Hope you'll enjoy the experience, we're here if you have any questions, drop us a
                    line at <a href="mailto:support@beetpool.com">support@beetpool.com</a> anytime.
                </p>
            </td>
        </tr>
        </tbody>
    </table>
@endsection()