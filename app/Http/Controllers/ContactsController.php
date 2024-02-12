<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Newsletter;
use Illuminate\Http\Request;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use Illuminate\Support\Facades\Validator;
use App\Models\MetaTag;
use App;

class ContactsController extends Controller
{
    public function careersIndex()
    {
        return view('pages.careers');
    }
     public function polices()
    {
          $metaKeywords = MetaTag::where('type','keyword')->get();
        $metaDescription = MetaTag::where('type','description')->get();
        // dd('ss');
        return view('pages.polices',['metaKeywords'=>$metaKeywords,'metaDescription'=>$metaDescription]);
    }

    public function contactIndex()
    {
        return view('pages.contact');
    }

    public function careersEmail(Request $request)
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
                        <p>الاسم: '.$request->name.'</p><br>
                        <p>البريد الالكتروني: '.$request->email.'</p><br>
                        <p>رقم الجوال: '.$request->phone.'</p><br>
                        <p>نوع الوظيفة: <b>'.$request->positionname.'</b></p><br><br>
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
            $mail->Username = 'info@sitksa-eg.com';   //  sender username
            $mail->Password = 'M01008281513';       // sender password
            $mail->SMTPSecure = 'ssl';                  // encryption - ssl/tls
            $mail->Port = 465;                          // port - 587/465
            $mail->CharSet = 'UTF-8';
            $mail->setFrom('info@sitksa-eg.com', $request->name);
            $mail->addAddress('info@sitksa-eg.com');
            // $mail->addCC($request->emailCc);
            // $mail->addBCC($request->emailBcc);

            // $mail->addReplyTo('sender@example.com', 'SenderReplyName');

            if(isset($_FILES['cv'])) {

                $mail->addAttachment($_FILES['cv']['tmp_name'], $_FILES['cv']['name']);
            }


            $mail->isHTML(true);                // Set email content format to HTML

            $mail->Subject = "طلب وظيفة";
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

    public function contactEmail(Request $request)
    {
        // Contact::create([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'phone' => $request->phone,
        //     'reason' => $request->contactreason,
        //     'message' => $request->message,
        // ]);
        // dd($request->all());
       require base_path("vendor/autoload.php");
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
                        <p>سبب التواصل: '.$request->contactreason.'</p><br>
                        <p>الرسالة: '.$request->message.'</p><br>
                        </div>
                    </body>
                </html>
                        ';
        try {
        $mail = new PHPMailer(true);
        $mail->isSMTP();                                            //Send using SMTP
        $mail->CharSet = 'UTF-8';
        $mail->Host       = 'mail.sitksa-eg.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'sales@sitksa-eg.com';                     //SMTP username
        $mail->Password   = 'Sit@sales@ksa1234';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
       //Recipients
        $mail->setFrom($request->email);
        $mail->addAddress('sales@sitksa-eg.com'); 
        $mail->isHTML(true); 
         $mail->Subject = $request->contactreason;
         $mail->Body    = $body;
         
          if( !$mail->send() ) {
                return back()->with("error", "Email not sent.")->withErrors($mail->ErrorInfo);
            }
            
            else {
                $locale = App::getLocale();

               if (App::isLocale('en')) {
                return back()->with("msg", "Email has been sent.");
               }
               else
               {
                return back()->with("msg", "تم ارسال طلبك بنجاح .");   
               }
            }

        } catch (Exception $e) {
            return back()->with('error','Message could not be sent.');
        }
       
    }

    public function newsletter(Request $request)
    {
        Newsletter::create([
            'email' => $request->newsletteremail,
        ]);
        return back()->with("msg", "تم التسجيل بنجاح");
    }
}
