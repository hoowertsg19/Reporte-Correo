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
    public $fileContent;
    public $fileName;
    public $subjectLine;

    public function __construct($totalCities, $totalCitizens, $citiesWithCitizens, $fileContent, $fileName = 'reporte.pdf', $subjectLine = 'Reporte de Ciudadanos y Ciudades')
    {
        $this->totalCities        = $totalCities;
        $this->totalCitizens      = $totalCitizens;
        $this->citiesWithCitizens = $citiesWithCitizens;
        $this->fileContent        = $fileContent;
        $this->fileName           = $fileName;
        $this->subjectLine        = $subjectLine;
    }

    public function build()
    {
        $email = $this->view('emails.report')
            ->subject($this->subjectLine)
            ->with([
                'totalCities'        => $this->totalCities,
                'totalCitizens'      => $this->totalCitizens,
                'citiesWithCitizens' => $this->citiesWithCitizens,
            ]);

        // Adjunta solo si hay archivo
        if ($this->fileContent && $this->fileName) {
            $email->attachData($this->fileContent, $this->fileName, [
                'mime' => 'application/pdf',
            ]);
        }

        return $email;
    }
}
