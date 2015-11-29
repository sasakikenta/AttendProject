<?php


class OldmanagerController extends BaseController
{

	public function Index()
	{
		$data = TblOldmanager::get();
		Log::debug(print_r($data, true));

		return View::make('home.index', compact('data'));
	}

	/**
	 * 編集画面アクセスしたときのアクション
	 *
	 */
	public function edit($id)
	{
		$data;
		if ($id == 0) {
			$data = [
				'id' => '',
				'c_s' => '1',
				'class' => '1',
				'no' => '---',
				'day' => date('Y-m-d'),
				'storage_day' => date('Y-m-d'),
				'user' => '',
				'bill_no' => '',
				'serial_slot' => '',
				'serial_case' => '',
				'serial_basea' => '',
				'machine' => '',
				'note' => '',
				'buy_legal' => '',
				'buy_hall' => '',
				'buy_money' => '',
				'deli_money' => '',
				'pay_day' => date('Y-m-d'),
				'settle' => '',
				'sell_legal' => '',
				'sell_money' => '',
				'deli_oneday' => date('Y-m-d'),
				'deli_day' => '',
				'delivery' => '0',
			];
		} else {
			$data = TblOldmanager::whereId($id)->first();
		}
		Log::debug(print_r($data, true));
		$default = ['' => ''];
		$users = $default + MstUser::select('id', DB::raw('CONCAT(id, ".", name1) AS name1'))->lists('name1','id');
		$halls = $default + MstHall::select('id', DB::raw('CONCAT(id, ".", name1) AS name1'))->lists('name1','id');
		$machines = $default + MstMachine::select('id', DB::raw('CONCAT(id, ".", name1) AS name1'))->lists('name1','id');
		$legals = $default + MstLegal::select('id', DB::raw('CONCAT(id, ".", name1) AS name1'))->lists('name1','id');
		$sources = $default + MstOrdersource::select('id', DB::raw('CONCAT(id, ".", name1) AS name1'))->lists('name1','id');
		$contacts = $default + MstOrdercontact::select('id', DB::raw('CONCAT(id, ".", name1) AS name1'))->lists('name1','id');
		return View::make(
			'main.edit.oldmanager',
			compact('data', 'users', 'halls', 'machines', 'legals', 'sources', 'contacts')
			);
	}

	/**
	 * 新規作成
	 *
	 */
	public function create()
	{
		$input = Input::all();
		$id = TblOldmanager::max('id') + 1;
		$no = $this->getNewNo($input);

		$input['id'] = $id;
		$input['no'] = $no;
		unset($input['_token']);
		Log::debug(print_r($input, true));

		TblOldmanager::insert($input);

		return Redirect::route('oldmanager.edit', ['id' => $id]);
	}

	/**
	 * 更新
	 *
	 */
	public function update($id) {
		$befor = TblOldmanager::whereId($id)->first();
		$input = Input::all();
		$input['id'] = $id;
		unset($input['_token']);

		if ($befor['c_s'] != $input['c_s'] ||
			$befor['class'] != $input['class'] ||
			$befor['user'] != $input['user'])
		{
			$input['no'] = $this->getNewNo($input);
		}

		Log::debug(print_r($input, true));

		TblOldmanager::find($id)->fill($input)->save();

		return Redirect::route('oldmanager.edit', ['id' => $id]);
	}

	/**
	 * 削除
	 *
	 */
	public function delete($id) {
		TblOldmanager::find($id)->fill(['del'=>1])->save();

		return Redirect::route('oldmanager.edit', ['id' => 0]);
	}

	private function getNewNo($input)
	{
		$no = TblOldmanager::whereC_s($input['c_s'])
							->whereClass($input['class'])
							->whereUser($input['user'])
							->max('no') + 1;

		return $no;
	}

	/**
	 * ajaxでの新規登録。動くけどつかってない。
	 * 一応うごくからちゅういして
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
}