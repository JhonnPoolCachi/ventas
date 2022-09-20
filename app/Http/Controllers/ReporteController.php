<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Curso;
use App\Models\EvaluacionDeporte;
use App\Exports\NotasExportExcel;
use Maatwebsite\Excel\Facades\Excel;
use PDF;
use DB;

class ReporteController extends Controller
{
    public function reporteNotasDeportes()
    {
    	$cursos = Curso::where('curso_estado','A')->get();
    	return view('reportes.notasDeportes',compact('cursos'));
    }

    public function planillaNotasDeportes($curso)
    {
    	$planilla = DB::table('evaluacion_deportes')
                ->join('cadetes','cadetes.cad_cod','=','evaluacion_deportes.evdpte_cad_cod')
                ->join('grados','grados.grad_cod','=','cadetes.cad_grad_cod')
                ->join('cursos','cursos.curso_cod','=','cadetes.cad_curso_cod')
                ->join('armas','armas.arma_cod','=','cadetes.cad_arma_cod')
                //->select('evaluacion_deportes.*')
                ->where('cadetes.cad_curso_cod','=',$curso)
                ->where('evaluacion_deportes.evdpte_periodo','=',2)
                ->where('evaluacion_deportes.evdpte_estado','=','A')
                ->orderBy('cadetes.cad_ap_paterno','asc')
                ->get();
       //dd($planilla);
        /*$planilla = EvaluacionDeporte::with('cadete')
                    ->whereHas('cadete', function ($query) use($curso) {
				        $query->where('cad_curso_cod', '=', "{$curso}");
				        $query->orderBy('cad_ap_paterno','desc');
				    })   			
                    ->get();*/
        $pdf = PDF::loadView('reportes.pdf.planillaDeportes',compact('planilla','curso')); 
        $customPaper = array(0,0,611.7342519685,938.9409448819);
        //$pdf->setPaper('legal', 'landscape'); 
        $pdf->setPaper($customPaper,'landscape');
        return $pdf->stream('planilla.pdf');
    }

    public function planillaNotasDeportesExcel()
    {
        $cursos = Curso::where('curso_estado','A')->get();
        return view('reportes.notasDeportes',compact('cursos'));
    }

    public function exportNotasDeportesExcel($curso)
    {
        return Excel::download(new NotasExportExcel($curso), 'planillaDeportes.xlsx');
    }

}
