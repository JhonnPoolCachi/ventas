<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use App\Models\EvaluacionDeporte;
use DB;

class NotasExportExcel implements FromView
{
	protected $curso;

	public function __construct(int $curso)
	{
		$this->curso = $curso;
	}


	public function view(): View
    {
    	$planilla = DB::table('evaluacion_deportes')
                ->join('cadetes','cadetes.cad_cod','=','evaluacion_deportes.evdpte_cad_cod')
                ->join('grados','grados.grad_cod','=','cadetes.cad_grad_cod')
                ->join('cursos','cursos.curso_cod','=','cadetes.cad_curso_cod')
                ->join('armas','armas.arma_cod','=','cadetes.cad_arma_cod')
                ->where('cadetes.cad_curso_cod','=',$this->curso)
                ->where('evaluacion_deportes.evdpte_periodo','=',2)
                ->where('evaluacion_deportes.evdpte_estado','=','A')
                ->orderBy('cadetes.cad_ap_paterno','asc')
                ->get();
        return view('reportes.excel.planillaDeportes', [
            'planilla' => $planilla
        ]);
    }
}