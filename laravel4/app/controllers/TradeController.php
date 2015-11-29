<?php


class TradeController extends BaseController
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
				'order_day' => date('Y-m-d'),
				'hall' => '',
				'legal' => '',
				'machine' => '',
				'new' => '',
				'unit' => '',
				'official_oneday' => date('Y-m-d'),
				'leaving' => '',
				'deli_oneday' => date('Y-m-d'),
				'open_oneday' => date('Y-m-d'),
				'official_day' => date('Y-m-d'),
				'install_day' => date('Y-m-d'),
				'note' => '',
				'order_contact' => '',
				'order_source' => '',
				'collect_oneday' => date('Y-m-d'),
				'bill_money' => '',
				'method' => 1,
				'collect' => '',
				'collect_day' => '',
			];
		} else {
			$data = TblTrade::whereId($id)->first();
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
			'main.edit.trade',
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
		$id = TblTrade::max('id') + 1;

		$input['id'] = $id;
		unset($input['_token']);
		Log::debug(print_r($input, true));

		TblTrade::insert($input);

		return Redirect::route('trade.edit', ['id' => $id]);
	}

	/**
	 * 更新
	 *
	 */
	public function update($id) {
		$befor = TblTrade::whereId($id)->first();
		$input = Input::all();
		unset($input['_token']);
		Log::debug(print_r($input, true));

		TblTrade::find($id)->fill($input)->save();

		return Redirect::route('trade.edit', ['id' => $id]);
	}

	/**
	 * 削除
	 *
	 */
	public function delete($id) {
		TblTrade::find($id)->fill(['del'=>1])->save();

		return Redirect::route('trade.edit', ['id' => 0]);
	}

}