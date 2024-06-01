<?php

namespace Ktith\Laravelexceptionnotifier\Listeners;


use App\Http\Controllers\BaseAPIController;
use GuzzleHttp\Client;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Ktith\Laravelexceptionnotifier\Events\ExceptionNotifier;
use Ramsey\Uuid\Guid\Guid;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class SendApplicationExceptionNotification
{

    /**
     * @var \Symfony\Component\HttpKernel
     */
    private $exception;

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(ExceptionNotifier $event)
    {
        // Get Agent
        $user_agent = request()->header('user-agent');
        $ip         = request()->ip();

        // Get IP Info
        try {
            $ip_info = json_decode(file_get_contents("http://ipinfo.io/{$ip}/json"));
        } catch (\Exception $ex) {

        }
        $this->exception = $event->exception;
        $error_msg = $this->exception->getMessage();

        // Enable notify
        if(config('exception-notifier.enable_notify_when_access_not_found')){
            if($this->exception instanceof NotFoundHttpException){
                $error_msg = 'Route not found! URL requsted: '.url()->current();
            }
        }

        $location = $ip_info->loc ?? 'N/A';
        $region = $ip_info->region ?? 'N/A';
        $url = url()->current() ?? 'N/A';
        $title = "🚨 Exceptions from ".config('app.name')." ".config('app.env')." 🚨\n";

        $body = $error_msg."\n\n".
                "⚙️Env • ".config('app.env')."\n".
                "❗️File • ".$this->exception->getFile()." ".
                "🚀Line • ".$this->exception->getLine()."\n\n".

                "🕛 ".now('Asia/Phnom_Penh')->toRfc850String()."\n".
                "📍 ".$location."\n".
                "🔗 ".$url."\n".
                "📶 WIFI • ".$ip."\n".
                "🌍 ".$region."\n".
                "📱 ".$user_agent;

        // Check authentication
        if(auth()->check()){
            $body = $body."\n"."🤵‍♂️ ".auth()->user()->name."\n";
        }

        $message = $title."\n".$body;
        $telegram_token = config('exception-notifier.telegram-error.token');
        $telegram_chat_id = config('exception-notifier.telegram-error.chat_id');

        try{
            if(config('exception-notifier.exception_notify_enabled')){
                $client = new Client(['verify' => false]);
                $client->get('https://api.telegram.org/bot'.$telegram_token.'/sendMessage?chat_id=' . $telegram_chat_id . '&text=' . $message);
            }
        }catch(\Exception $e){

        }

    }
}
