<!DOCTYPE html>
<html>
<head>
    <title>Requisition Approval</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body style="font-family: Arial, sans-serif; font-size: 16px; line-height: 1.5; color: #333; margin: 0; padding: 0;">
<table style="width: 100%; max-width: 600px; margin: 0 auto; background-color: #f5f5f5; border-collapse: collapse; border-spacing: 0;">
    <tr>
        <td style="padding: 20px;">
            <img style="display: block; margin: 0 auto;" src="{{ asset('bg-logo/logo.png') }}" alt="Logo Image">
            <h1 style="font-size: 24px; margin: 0;">Requisition Approval</h1>
            <p style="margin: 20px 0;">Greetings,</p>
            <p style="margin: 20px 0;">A new requisition for {{ $staffRequistionForm->jobtitle }} is awaiting your approval.</p>
            <p style="margin: 20px 0;">Business Partner Comments : <strong>{!! $comment !!}</strong></p>
            <p style="text-align: center; margin: 30px 0;"><a href="{{ route('financeofficer.forequistions.edit', $staffRequistionForm) }}" style="display: inline-block; padding: 10px 20px; background-color: #4caf50; color: #fff; text-decoration: none; border-radius: 5px;">More Information</a></p>

            <p style="margin: 20px 0;">Best regards,</p>
            <p style="margin: 20px 0;">People and Culture Department<br>Strathmore University</p>
        </td>
    </tr>
</table>
</body>
</html>
