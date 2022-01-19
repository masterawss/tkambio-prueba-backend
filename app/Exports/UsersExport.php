<?php

namespace App\Exports;

use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class UsersExport implements FromView, ShouldQueue, ShouldAutoSize
{
    use Exportable;

    private $fecha_inicio;
    private $fecha_final;
    public function __construct($fecha_inicio, $fecha_final){
        $this->fecha_inicio = $fecha_inicio;
        $this->fecha_final = $fecha_final;
    }
    public function view(): View
    {
        return view('exports.reports', [
            'users' => User::whereDate('birth_date', '>=', $this->fecha_inicio)
                ->whereDate('birth_date', '<=', $this->fecha_final)
                ->get()
        ]);
    }
}
