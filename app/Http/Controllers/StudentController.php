<?php

namespace App\Http\Controllers;


use App\Jobs\SendEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
//use Mail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use function Sodium\add;

class StudentController extends Controller
{
    public function queue(){
        dispatch(new SendEmail('975324980@qq.com'));
    }

    public function  error()
    {
//        $name = "youhuazi";
//        var_dump($name);
//        return view('student.error');
//        $student  = null;
//        if ($student == null){
//            abort('404');
//        }
        Log::info('this is info larve ');
        Log::warning('this is warning larve ');
        Log::error('this is warning larve ', ['name'=>'youhuazi','age'=>'18']);

    }

    public function  cache1()
    {
        // put
        Cache::put('key1','val1',10);
        // add()
        Cache::add('key2','val2',10);
        // forever
        Cache::forever('key3','val3');
        Cache::add('key4','val4',10);


    }
    public function  cache2()
    {
//        $val = Cache::get('key1');
//        var_dump($val);
//        $val = Cache::get('key2');
//        var_dump($val);
//        $val = Cache::get('key3');
//        var_dump($val);
//        if (Cache::has('key3')){
//            $val = Cache::get('key3');
//            var_dump($val);
//        }else{
//            echo '0';
//        }
//        $val4 = Cache::pull('key4');
//        var_dump($val4);
//        $bool = Cache::forget('key1');
//        $num = 10/4;
//        $seperated = (int) explode('.', $num);
//        $seperated = array_map('intval',explode('.', $num));
//        var_dump($num);
        if (null){
            var_dump(1);
        }else{
            var_dump(2);
        }


    }


    public function mail()
    {
//        // 纯文本邮件发送成功
//        Mail::raw('邮件内容 test', function ($message){
//            $message->from('youhuazi4@gmail.com','yyh');
//            $message->subject('邮件内容 test');
//            $message->to('975324980@qq.com');
//        });
        //发送·html模板文件
        Mail::send('student.mail', ['name' => 'youhuazi'],function ($message){
            $message->to('975324980@qq.com');
        });
    }
    //
    public function upload(Request $request)
    {
        if ($request->isMethod('POST')){
//            var_dump($_FILES);
            $file = $request->file('source');
            // 文件是否上传成功
            if ($file ->isValid()){
                // ファイル名前
                $originalName = $file->getClientOriginalName();
                // Extension name
                $ext = $file->getClientOriginalExtension();
                // MimeType
                $flieType = $file->getClientMimeType();
                // path
                $realPath = $file->getRealPath();
                // upload
                $fileName = date('Y-m-d-h-i-s'). '-'.uniqid().$ext;
                $bool = Storage::disk('uploads')->put($fileName, file_get_contents($realPath));
                var_dump($bool);


            }
            dd($file);
            exit;
        }
        return view('student.upload');

    }
}
