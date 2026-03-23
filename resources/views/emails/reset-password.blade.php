<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Your Password</title>
</head>
<body style="margin:0;padding:0;background-color:#0f172a;font-family:'Segoe UI',Tahoma,Geneva,Verdana,sans-serif;">
    <table role="presentation" width="100%" cellspacing="0" cellpadding="0" style="background-color:#0f172a;padding:40px 20px;">
        <tr>
            <td align="center">
                <table role="presentation" width="600" cellspacing="0" cellpadding="0" style="background-color:#1e293b;border-radius:16px;overflow:hidden;border:1px solid #334155;">
                    {{-- Header --}}
                    <tr>
                        <td style="background: linear-gradient(135deg, #6366f1, #4f46e5); padding: 32px 40px; text-align: center;">
                            <h1 style="color:#ffffff;margin:0;font-size:24px;font-weight:700;">🔒 Password Reset</h1>
                            <p style="color:#c7d2fe;margin:8px 0 0;font-size:14px;">{{ config('app.name') }}</p>
                        </td>
                    </tr>

                    {{-- Body --}}
                    <tr>
                        <td style="padding:40px;">
                            <p style="color:#e2e8f0;font-size:16px;margin:0 0 16px;">
                                Hello <strong style="color:#ffffff;">{{ $user->ho_ten }}</strong>,
                            </p>
                            <p style="color:#94a3b8;font-size:14px;line-height:1.7;margin:0 0 24px;">
                                We received a request to reset the password for your account <strong style="color:#a5b4fc;">{{ $user->username }}</strong>. Click the button below to set a new password:
                            </p>

                            {{-- CTA Button --}}
                            <table role="presentation" width="100%" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td align="center" style="padding:8px 0 24px;">
                                        <a href="{{ $resetLink }}"
                                           style="display:inline-block;padding:14px 40px;background:linear-gradient(135deg,#6366f1,#4f46e5);color:#ffffff;text-decoration:none;font-weight:600;font-size:15px;border-radius:12px;box-shadow:0 4px 14px rgba(99,102,241,0.4);">
                                            Reset Password
                                        </a>
                                    </td>
                                </tr>
                            </table>

                            <p style="color:#94a3b8;font-size:13px;line-height:1.6;margin:0 0 16px;">
                                This link will expire in <strong style="color:#e2e8f0;">60 minutes</strong>. If you did not request a password reset, please ignore this email.
                            </p>

                            {{-- Fallback link --}}
                            <div style="background-color:#0f172a;border-radius:8px;padding:16px;margin-top:16px;">
                                <p style="color:#64748b;font-size:12px;margin:0 0 8px;">If the button doesn't work, copy and paste this link into your browser:</p>
                                <p style="color:#818cf8;font-size:12px;margin:0;word-break:break-all;">{{ $resetLink }}</p>
                            </div>
                        </td>
                    </tr>

                    {{-- Footer --}}
                    <tr>
                        <td style="background-color:#0f172a;padding:24px 40px;text-align:center;border-top:1px solid #334155;">
                            <p style="color:#475569;font-size:12px;margin:0;">
                                © {{ date('Y') }} {{ config('app.name') }}. All rights reserved.
                            </p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
