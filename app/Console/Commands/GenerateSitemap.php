<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;

class GenerateSitemap extends Command
{
    protected $signature = 'sitemap:generate';
    protected $description = 'Genera la sitemap del sito La Casa di MiDa';

    public function handle(): void
    {
        $base = config('app.url');

        $sitemap = Sitemap::create()
            ->add("{$base}/")
            ->add("{$base}/camere")
            ->add("{$base}/camere/pink-room")
            ->add("{$base}/camere/green-room")
            ->add("{$base}/camere/grey-room")
            ->add("{$base}/prenotazione")
            ->add("{$base}/cosa-fare-a-roma")
            ->add("{$base}/struttura")
            ->add("{$base}/contatti")
            ->add("{$base}/termini-e-condizioni");

        $sitemap->writeToFile(public_path('sitemap.xml'));

        $this->info('✅ Sitemap generata con successo in public/sitemap.xml');
    }
}
