@extends('vendor.notifications.layouts.mail')
@section('content')
    <table style="width:100%;max-width:620px;margin:0 auto;background-color:#ffffff;">
        <tbody>
        <tr>
            <td style="text-align:center;padding: 30px 30px 20px">
                <h5 style="margin-bottom: 24px; color: #526484; font-size: 20px; font-weight: 400; line-height: 28px;">Hi {{ $name }}<br>Purchase and get lifetime update!</h5>
                <p style="margin-bottom: 15px; color: #526484; font-size: 16px;">Say hello to version 1.1. Introducing email template with massaging application concept and as always modern, clean and easier to use.</p>
                <p style="margin-bottom: 15px;">Hope you'll enjoy the experience, we're here if you have any questions, drop us a line at info@yourwebsite.com anytime. </p>
            </td>
        </tr>
        </tbody>
    </table>
@endsection()