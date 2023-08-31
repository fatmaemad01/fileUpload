<?php

namespace App\Listeners;

use App\Models\Log;
use App\Models\File;
use App\Events\FileDownload;
use Illuminate\Support\Facades\Http;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class LogDetails
{
    /**
     * Create the event listener.
     */

    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */

    public function handle(FileDownload $event): void
    {
        $ip = request()->ip();

        $country_data = $this->getCountryFromIp($ip);

        Log::create([
            'file_id' => $event->file->id,
            'downloaded_at' => now(),
            'ip' => $ip,
            'user_agent' => request()->header("User-Agent"),
            'country' => $country_data['country_name'],
            'country_code' => $country_data['country_code'],
        ]);

        $file = File::find($event->file->id);

        if ($file->id) {
            $file->increment('total_download');
        }
    }

    protected function getCountryFromIp($ip)
    {
        $api_key = '862e191cb4284b1784d5eb05bc217388';

        $ip = request()->ip();

        $response = Http::get("https://api.ipgeolocation.io/ipgeo?apiKey={$api_key}&ip={$ip}&fields=country_name,country_code2");

        $data = $response->json();

        return [
            'country_name' => $data['country_name'] ?? 'Unknown',
            'country_code' => $data['country_code2'] ?? 'Unknown',
        ];
    }
}
