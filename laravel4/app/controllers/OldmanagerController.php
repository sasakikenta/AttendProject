<?php


class OldmanagerController extends BaseController
{

	public function Index()
	{
		$data = TblOldmanager::get();
		Log::debug(print_r($data, true));

		return View::make('home.index', compact('data'));
	}

	public function edit($id)
	{
		if ($id != 0) {
			
		}
	}

	/**
	 *
	 *
	 */
	public function store() {
		$input = Input::all();
		Log::debug(print_r($input, true));

		$data = $input;
		Log::debug(print_r($data, true));

		$id = TblOldmanager::whereDel(TblOldmanager::STATUS_NOT_DELETE)->max('id') + 1;
		$no = TblOldmanager::whereC_s($data['c_s'])
							->whereClass($data['class'])
							->whereDel(TblOldmanager::STATUS_NOT_DELETE)
							->max('no') + 1;
		$data['id'] = $id;
		$data['no'] = $no;
		Log::debug(print_r($data, true));

		TblOldmanager::insert($data);

		return Response::json(['result' => 'OK', 'id' => $id, 'no' => $no], 200);
	}

	public function update() {
		$input = Input::all();
		Log::debug(print_r($input, true));

		$data = $input;
		Log::debug(print_r($data, true));

		$id = $data['id'];
		TblOldmanager::whereId($id)
					 ->whereDel(TblOldmanager::STATUS_NOT_DELETE);

		$no = TblOldmanager::whereC_s($data['c_s'])
							->whereClass($data['class'])
							->whereDel(TblOldmanager::STATUS_NOT_DELETE)
							->max('no') + 1;
		$data['no'] = $no;
		Log::debug(print_r($data, true));

		TblOldmanager::insert($data);

		return Response::json(['result' => 'OK', 'id' => $id, 'no' => $no], 200);
	}

}