<?php

class SuratUjiSampelsController extends \BaseController {

	/**
	 * Display a listing of suratijinstudilapanganindvs
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('suratujisampels.index')->withTitle('Surat Permohonan Uji Sampel');
	}

	/**
	 * Store a newly created suratijinstudilapanganindv in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), SuratUjiSampel::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$srt = SuratUjiSampel::create($data);

		$idsrt = $srt->id;
		$datasrt = SuratUjiSampel::whereId($idsrt)
			->with('Dataprodi')
			->with('Datapersetujuan')
			->first();
		// return $datasrt;
		return $this->exportPdf($datasrt);
	}
	
	private function exportPdf($surats)
	{
		$date = \Carbon\Carbon::now();
		$name = 'SuratUjiSampel_'.$date->day.'_'.$date->month.'_'.$date->year.'_'.Date('H:i:s', strtotime($date)).'.pdf';
		$data['datas'] = $surats;
		$pdf = PDF::loadView('srtmahasiswa.SuratUjiSampel',$data)->setPaper('a4');

		return $pdf->download($name); 
		// Redirect::route('surat_ijin_studi_lapangan_indv.index')->with("successMessage","Surat Berhasil di Buat ");
	}
}
