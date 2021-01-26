@extends('vendor.notifications.layouts.mail')
@section('content')
    <table style="width:100%;max-width:620px;margin:0 auto;background-color:#ffffff;">
        <tbody>
        <tr>
            <td style="padding: 30px 30px 15px 30px;">
                <h2 style="color: #6576ff; margin: 0; text-align: center">
                    New Withdrawal Request
                </h2>
            </td>
        </tr>
        <tr>
            <td style="padding: 30px 30px 20px">
                <h5 style="margin-bottom: 24px; color: #526484; font-size: 20px; font-weight: 400; line-height: 28px;">Hi,</h5>
                <p style="margin-bottom: 15px; color: #526484; font-size: 16px;">
                    You have a new withdrawal request from a user with the following details.
                    Please login to the Portal to approve this request
                </p>
                <div style="margin-bottom: 15px;">
                    <p>Full Name - {{ $data->full_name }}</p>
                    <p>Wallet Address - {{ $data->wallet_address }}</p>
                </div>
                <div style="text-align: center;">
                    <a href="{{ route('admin.login') }}" style="background-color:#6576ff;border-radius:4px;color:#ffffff;display:inline-block;line-height:44px;text-transform:uppercase;padding: 0 30px">Login</a>
                </div>
            </td>
        </tr>
        </tbody>
    </table>
@endsection()