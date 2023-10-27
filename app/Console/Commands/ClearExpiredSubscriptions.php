<?php

namespace App\Console\Commands;

use App\Models\Subscription as ModelsSubscription;
use Illuminate\Console\Command;
use App\Subscription;
use Carbon\Carbon;

class ClearExpiredSubscriptions extends Command
{
    protected $signature = 'subscriptions:clear';
    protected $description = 'Clear expired subscriptions';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $currentDate = Carbon::now();
    
        // Busca y elimina las suscripciones que han vencido (fecha de vencimiento menor o igual a la fecha actual)
        ModelsSubscription::where('expires_at', '<=', $currentDate)->delete();
    
        $this->info('Expired subscriptions have been cleared.');
    }
    
}
