<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>New Enquiry Lead</title>
  <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">
</head>
<body style="margin:0; padding:0; background-color: #f9f9f9; font-family: 'Nunito', Arial, sans-serif;">
  <table width="100%" cellpadding="0" cellspacing="0" border="0" bgcolor="#f9f9f9">
    <tr>
      <td align="center">
        <table width="600" cellpadding="20" cellspacing="0" border="0" style="background-color: #ffffff; margin-top: 40px; border: 1px solid #ddd; font-family: 'Nunito', Arial, sans-serif;">
          <tr>
            <td align="center" style="background-color: #EE7705; color: #ffffff; font-size: 22px; font-weight: bold;">
              Enquiry Details
            </td>
          </tr>
          <tr>
            <td style="font-size: 16px; color: #333333;">
              <p>Hello Team,</p>
              <p>You have received a new Enquiry lead. Please find the details below:</p>
              
              <table width="100%" cellpadding="10" cellspacing="0" border="0" style="border-collapse: collapse; font-family: 'Nunito', Arial, sans-serif;">
                @if(!empty($data['fullname']))
                <tr style="background-color: #f2f2f2;">
                  <td width="30%" style="border: 1px solid #ddd;"><strong>Name</strong></td>
                  <td style="border: 1px solid #ddd;">{{ $data['fullname'] }}</td>
                </tr>
                @endif
                @if(!empty($data['email']))
                <tr style="background-color: #f2f2f2;">
                  <td style="border: 1px solid #ddd;"><strong>Email</strong></td>
                  <td style="border: 1px solid #ddd;">{{ $data['email'] }}</td>
                </tr>
                @endif
                @if(!empty($data['furnishing']))
                <tr>
                  <td style="border: 1px solid #ddd;"><strong>Furnishings</strong></td>
                  <td style="border: 1px solid #ddd;">{{ $data['furnishing'] }}</td>
                </tr>
                @endif
                @if(!empty($data['furnishing']))
                <tr>
                  <td style="border: 1px solid #ddd;"><strong>Reason for inquiry</strong></td>
                  <td style="border: 1px solid #ddd;">{{ $data['reason'] }}</td>
                </tr>
                @endif
             
                @if(!empty($data['message']))
                <tr style="background-color: #f2f2f2;">
                  <td style="border: 1px solid #ddd;"><strong>Message</strong></td>
                  <td style="border: 1px solid #ddd;">{{ $data['message'] }}</td>
                </tr>
                @endif
              </table>

              <p style="margin-top: 20px;">Please reach out to the lead as soon as possible.</p>

              <p>Best regards,<br>
              Futurebox</p>
            </td>
          </tr>
          <tr>
            <td align="center" style="background-color: #0a0707; font-size: 12px; color: #666;">
              © 2025 Futurebox. All rights reserved.
            </td>
          </tr>
        </table>
      </td>
    </tr>
  </table>
</body>
</html>