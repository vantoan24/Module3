<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\Message;
use Telegram\Bot\Laravel\Facades\Telegram;

class ProcessMessage implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $message;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Message $message)
    {
        $this->message = $message;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //gửi cho các thành viên ở chi nhánh qua telegram
        $telegram_channel_id = env('TELEGRAM_CHANNEL_ID', '');
        if($telegram_channel_id){
            $arg = [
                'chat_id' => $telegram_channel_id,
                'parse_mode' => 'HTML',
                'text' => '[THÔNG BÁO] '.$this->message->content
            ];
            if( isset($this->message->photo) ){
                $arg['photo'] = env('APP_URL').$this->message->photo;
            }
            Telegram::sendMessage($arg);
        }
        //cập nhật trạng thái đã gửi
        $this->message->status = 'sent';
        $this->message->save();
    }
}
