<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ReportMail extends Mailable
{
    use Queueable, SerializesModels;

    public $totalCities;
    public $totalCitizens;
    public $citiesWithCitizens;

    public function __construct(
        $totalCities,
        $totalCitizens,
        $citiesWithCitizens,
        $subject = 'Reporte de Ciudadanos y Ciudades'
    ) {
        $this->totalCities        = $totalCities;
        $this->totalCitizens      = $totalCitizens;
        $this->citiesWithCitizens = $citiesWithCitizens;
        $this->subject($subject);
    }

    public function build()
    {
        return $this
            ->view('emails.report')
            ->with([
                'totalCities'        => $this->totalCities,
                'totalCitizens'      => $this->totalCitizens,
                'citiesWithCitizens' => $this->citiesWithCitizens,
            ]);
    }
}
