<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>New Lead Notification</title>
</head>
<body style="font-family: 'Helvetica Neue', Arial, sans-serif; background-color: #f6f9ff; margin: 0; padding: 40px 0; color: #444444;">
    <div style="max-width: 600px; margin: 0 auto; background: #ffffff; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 20px rgba(1, 41, 112, 0.1);">
        
        <!-- Header -->
        <div style="background-color: #1a1a2e; padding: 30px; text-align: center;">
            <p style="margin: 0; color: #ffffff; font-size: 28px; font-weight: bold; letter-spacing: 1px;">Capstone<span style="color: #2bbfbf;">Global</span></p>
            <p style="margin: 5px 0 0 0; color: #899bbd; font-size: 12px; text-transform: uppercase; letter-spacing: 2px;">Lead Management System</p>
        </div>

        <!-- Body -->
        <div style="padding: 40px 30px;">
            <h2 style="color: #1a1a2e; margin-top: 0; font-size: 22px;">New Inquiry Received!</h2>
            <p style="font-size: 15px; line-height: 1.6; color: #444444;">You have a new lead submission from the website. Here are the details:</p>
            
            <table style="width: 100%; border-collapse: collapse; margin: 30px 0; font-size: 15px;">
                <tr>
                    <td style="padding: 12px 0; border-bottom: 1px solid #ebeef4; width: 120px; font-weight: bold; color: #000000;">Name</td>
                    <td style="padding: 12px 0; border-bottom: 1px solid #ebeef4; color: #000000;">{{ $name }}</td>
                </tr>
                <tr>
                    <td style="padding: 12px 0; border-bottom: 1px solid #ebeef4; font-weight: bold; color: #000000;">Email</td>
                    <td style="padding: 12px 0; border-bottom: 1px solid #ebeef4; color: #000000;"><a href="mailto:{{ $email }}" style="color: #000000; text-decoration: none;">{{ $email }}</a></td>
                </tr>
                <tr>
                    <td style="padding: 12px 0; border-bottom: 1px solid #ebeef4; font-weight: bold; color: #000000;">Phone</td>
                    <td style="padding: 12px 0; border-bottom: 1px solid #ebeef4; color: #000000;">{{ $phone ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <td style="padding: 12px 0; border-bottom: 1px solid #ebeef4; font-weight: bold; color: #000000;">Service</td>
                    <td style="padding: 12px 0; border-bottom: 1px solid #ebeef4; color: #000000;">
                        <span style="font-weight: normal; color: #000000;">{{ $service ?? 'General' }}</span>
                    </td>
                </tr>
            </table>

            <div style="background-color: #f6f9ff; border-left: 4px solid #2bbfbf; padding: 20px; border-radius: 4px; margin-bottom: 30px;">
                <p style="margin: 0 0 10px 0; font-weight: bold; color: #1a1a2e;">Message Details:</p>
                <p style="margin: 0; font-size: 14px; line-height: 1.6; color: #444;">{{ $leadMessage }}</p>
            </div>

            <div style="text-align: center;">
                <a href="{{ url('/admin/crm') }}" style="display: inline-block; background-color: #2bbfbf; color: #ffffff; text-decoration: none; padding: 14px 28px; border-radius: 4px; font-weight: bold; font-size: 15px; box-shadow: 0 4px 6px rgba(43, 191, 191, 0.2);">View inside Dashboard</a>
            </div>
        </div>

        <!-- Footer -->
        <div style="background-color: #fcfcfd; padding: 20px; text-align: center; border-top: 1px solid #ebeef4;">
            <p style="margin: 0; color: #899bbd; font-size: 12px;">This is an automated notification from Capstone Global.<br>&copy; {{ date('Y') }} Capstone Global. All rights reserved.</p>
        </div>

    </div>
</body>
</html>
