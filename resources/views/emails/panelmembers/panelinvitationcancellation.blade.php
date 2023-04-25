<!DOCTYPE html>
<html>
<head>
    <title>[Cancelled] Invitation to Interview</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body style="font-family: Arial, sans-serif; font-size: 16px; line-height: 1.5; color: #333; margin: 0; padding: 0;">
<table style="width: 100%; max-width: 600px; margin: 0 auto; background-color: #f5f5f5; border-collapse: collapse; border-spacing: 0;">
    <tr>
        <td style="padding: 20px;">
            <img style="display: block; margin: 0 auto;" src="{{ asset('bg-logo/logo.png') }}" alt="Logo Image">
            <h1 style="font-size: 24px; margin: 0;">Invitation to Interview [Cancelled]</h1>
            <p style="margin: 20px 0;">Dear {{ $interviewpanel->panelistname }},</p>
            <p style="margin: 20px 0;">We regret to inform you that we have decided to cancel the interview for the <strong>{{ $staffrequistionform->jobtitle }}</strong> position at our University, which was scheduled to take place on <strong>{{ $interviewpanel->interviewdate }}</strong> at <strong>{{ $interviewpanel->interviewtime }}</strong> located at <strong>{{ $interviewpanel->interviewlocation }}</strong>.</p>
            <p style="margin: 20px 0;">We apologize for any inconvenience this may cause you.</p>
            <p style="margin: 20px 0;">If you have any questions or concerns, please feel free to contact us.</p>
            <p style="margin: 20px 0;">Best regards,</p>
            <p style="margin: 20px 0;">People and Culture Department<br>Strathmore University</p>
        </td>
    </tr>
</table>
</body>
</html>
