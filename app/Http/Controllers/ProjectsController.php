<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Project_Details;
use App\Models\Projects;
use App\Models\Services;
use Illuminate\Http\Request;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use Illuminate\Support\Facades\Storage;

class ProjectsController extends Controller
{
    public function index()
    {
        $services = Services::where('category_id','1')->get();
        $projects = Projects::all();
        
        return view('pages.projects',[
            "services" => $services,
            "projects" => $projects,
        ]);
    }

    public function gallery($slug)
    {
        $projects = Projects::where('slug',$slug)->get();
        $details = Project_Details::where('project_id',$projects[0]['id'])->get();
        
        return view('pages.projectgallery',[
            'projects' => $projects,
            'details' => $details,
        ]);
    }

    public function projectEmail(Request $request,$title)
    {
        Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'reason' => $title,
            'message' => 'null'
        ]);
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
                        <p>النظام المطلوب: '.$title.'</p><br>
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

            $mail->Subject = "طلب ".$title;
            $mail->Body    = $body;

            // $mail->AltBody = plain text version of email body;

            if( !$mail->send() ) {
                return back()->with("error", "حدث خطأ يرجى اعادة المحاولة")->withErrors($mail->ErrorInfo);
            }
            
            else {
                return back()->with("msg", "تم ارسال طلبكم بنجاح");
            }

        } catch (Exception $e) {
            return back()->with('error','Message could not be sent.');
        }
    }

    public function fileDownload($id)
    {
        $file = Projects::where('id',$id)->get();
        return Storage::download('/storage/'.$file[0]['file_path']);
    }
}
