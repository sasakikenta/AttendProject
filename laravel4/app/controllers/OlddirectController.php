<?php


class OlddirectController extends BaseController
{
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
				'no' => '',
				'hall' => '',
				'legal' => '',
				'machine' => '',
				'app' => 1,
				'new' => '',
				'unit' => '',
				'deli_oneday' => date('Y-m-d'),
				'open_oneday' => date('Y-m-d'),
				'collect_oneday' => date('Y-m-d'),
				'bill_money' => '',
				'user' => '',
				'method' => 1,
				'collect' => '',
				'collect_day' => '',
				'note' => '',
			];
		} else {
			$data = TblOlddirect::whereId($id)->first();
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
			'main.edit.olddirect',
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
		$id = TblOlddirect::max('id') + 1;

		$input['id'] = $id;
		unset($input['_token']);
		Log::debug(print_r($input, true));

		TblOlddirect::insert($input);

		return Redirect::route('olddirect.edit', ['id' => $id]);
	}

	/**
	 * 更新
	 *
	 */
	public function update($id) {
		$befor = TblOlddirect::whereId($id)->first();
		$input = Input::all();
		unset($input['_token']);
		Log::debug(print_r($input, true));

		TblOlddirect::find($id)->fill($input)->save();

		return Redirect::route('olddirect.edit', ['id' => $id]);
	}

	/**
	 * 削除
	 *
	 */
	public function delete($id) {
		TblOlddirect::find($id)->fill(['del'=>1])->save();

		return Redirect::route('olddirect.edit', ['id' => 0]);
	}

}