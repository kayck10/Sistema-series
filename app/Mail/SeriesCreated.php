<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class SeriesCreated extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct(
        public string $nomeSerie,
        public int $idSerie,
        public int $qtdTemporadas,
        public int $episodiosPorTemporada,
    )
    {
        $this->subject = "Série " . $nomeSerie . " Criada";
    }

     /**
     * Build the message.
     *
     * @return $this
     */
    public function build() {


        $data = [
            'nomeSerie' => $this->nomeSerie,
            'idSerie' => $this->idSerie,
            'qtdTemporadas' => $this->qtdTemporadas,
           'episodiosPorTemporada' => $this->episodiosPorTemporada,
        ];

        return $this->markdown('email/series-created', $data);
    }

}
