<?php

namespace App\Http\Controllers;

use App\Models\Hosting;
use Illuminate\Http\Request;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class DomainController extends Controller
{

    public function hostingIndex()
    {
        $host = Hosting::all();
        return view('pages.hosting')->with('host',$host);
    }

    public function domainIndex()
    {
        return view('pages.domain');
    }

    public function hostReservationIndex($id)
    {
        $host = Hosting::where('id',$id)->get();
        return view('pages.hostreserve')->with('host',$host);
    }

    public function hostReserveEmail(Request $request)
    {
        require base_path("vendor/autoload.php");
        $mail = new PHPMailer(true);     // Passing `true` enables exceptions
        $body = '<html>
					<head>
                    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                        <title></title>
                    </head>
                    <body style="direction:rtl;text-align:right;">
                        <div id="email-wrap">
                        <p>اسم العميل: '.$request->name.'</p><br>
                        <p>البريد الالكتروني: '.$request->email.'</p><br>
                        <p>رقم الجوال: '.$request->phone.'</p><br>
                        <p>الرسالة: '.$request->message.'</p><br>
                        <p>نوع الباقة: <b>'.$request->package.'</b></p><br>
                        </div>
                    </body>
                </html>
                        ';
        try {

            // Email server settings
            $mail->SMTPDebug = 0;
            $mail->isSMTP();
            $mail->Host = 'mail.sitksa.com';             //  smtp host
            $mail->SMTPAuth = true;
            $mail->Username = 'info@sitksa.com';   //  sender username
            $mail->Password = 'M01008281513';       // sender password
            $mail->SMTPSecure = 'ssl';                  // encryption - ssl/tls
            $mail->Port = 465;                          // port - 587/465
            $mail->CharSet = 'UTF-8';
            $mail->setFrom('info@sitksa.com', $request->name);
            $mail->addAddress('info@sitksa.com');
            // $mail->addCC($request->emailCc);
            // $mail->addBCC($request->emailBcc);

            // $mail->addReplyTo('sender@example.com', 'SenderReplyName');

            // if(isset($_FILES['emailAttachments'])) {
            //     for ($i=0; $i < count($_FILES['emailAttachments']['tmp_name']); $i++) {
            //         $mail->addAttachment($_FILES['emailAttachments']['tmp_name'][$i], $_FILES['emailAttachments']['name'][$i]);
            //     }
            // }


            $mail->isHTML(true);                // Set email content format to HTML

            $mail->Subject = "طلب باقة استضافة";
            $mail->Body    = $body;

            // $mail->AltBody = plain text version of email body;

            if( !$mail->send() ) {
                return back()->with("error", "Email not sent.")->withErrors($mail->ErrorInfo);
            }
            
            else {
                return back()->with("msg", "Email has been sent.");
            }

        } catch (Exception $e) {
            return back()->with('error','Message could not be sent.');
        }
    }

    public function domainReserveEmail(Request $request)
    {
        require base_path("vendor/autoload.php");
        $mail = new PHPMailer(true);     // Passing `true` enables exceptions
        $body = '<html>
					<head>
                    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                        <title></title>
                    </head>
                    <body style="direction:rtl;text-align:right;">
                        <div id="email-wrap">
                        <p>اسم العميل: '.$request->name.'</p><br>
                        <p>البريد الالكتروني: '.$request->email.'</p><br>
                        <p>رقم الجوال: '.$request->phone.'</p><br>
                        <p>الدومين المطلوب: <b>'.$request->domain.'</b></p><br>
                        <p>الرسالة: '.$request->message.'</p><br>
                        </div>
                    </body>
                </html>
                        ';
        try {

            // Email server settings
            $mail->SMTPDebug = 0;
            $mail->isSMTP();
            $mail->Host = 'mail.sitksa.com';             //  smtp host
            $mail->SMTPAuth = true;
            $mail->Username = 'info@sitksa.com';   //  sender username
            $mail->Password = 'M01008281513';       // sender password
            $mail->SMTPSecure = 'ssl';                  // encryption - ssl/tls
            $mail->Port = 465;                          // port - 587/465
            $mail->CharSet = 'UTF-8';
            $mail->setFrom('info@sitksa.com', $request->name);
            $mail->addAddress('info@sitksa.com');

            $mail->isHTML(true);                // Set email content format to HTML

            $mail->Subject = "طلب حجز دومين";
            $mail->Body    = $body;

            // $mail->AltBody = plain text version of email body;

            if( !$mail->send() ) {
                return back()->with("error", "Email not sent.")->withErrors($mail->ErrorInfo);
            }
            
            else {
                return back()->with("msg", "Email has been sent.");
            }

        } catch (Exception $e) {
            return back()->with('error','Message could not be sent.');
        }
    }
}
