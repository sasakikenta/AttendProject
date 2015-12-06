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
			$data['note'] = $this->selectEscape( $data['note'] );
			$data['official_oneday'] = ($data['official_oneday'] == "0000-00-00") ? '' : $data['official_oneday'];
			$data['deli_oneday'] = ($data['deli_oneday'] == "0000-00-00") ? '' : $data['deli_oneday'];
			$data['open_oneday'] = ($data['open_oneday'] == "0000-00-00") ? '' : $data['open_oneday'];
			$data['official_day'] = ($data['official_day'] == "0000-00-00") ? '' : $data['official_day'];
			$data['install_day'] = ($data['install_day'] == "0000-00-00") ? '' : $data['install_day'];
			$data['collect_oneday'] = ($data['collect_oneday'] == "0000-00-00") ? '' : $data['collect_oneday'];
			$data['collect_day'] = ($data['collect_day'] == "0000-00-00") ? '' : $data['collect_day'];
		}
		Log::debug(print_r($data, true));
		return View::make('main.edit.trade',compact('data'))
						->with('message', Session::pull('message', false));
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
		$input['note'] = $this->inputEscape( $input['note'] );
		unset($input['_token']);
		Log::debug(print_r($input, true));

		TblTrade::insert($input);

		return Redirect::route('trade.edit', ['id' => $id])->with('message', '正常に登録しました。');
	}

	/**
	 * 更新
	 *
	 */
	public function update($id) {
		$befor = TblTrade::whereId($id)->first();
		$input = Input::all();
		$input['note'] = $this->inputEscape( $input['note'] );
		unset($input['_token']);
		Log::debug(print_r($input, true));

		TblTrade::find($id)->fill($input)->save();

		return Redirect::route('trade.edit', ['id' => $id])->with('message', '正常に登録しました。');
	}

	/**
	 * 削除
	 *
	 */
	public function delete($id) {
		TblTrade::find($id)->fill(['del'=>1])->save();

		return Redirect::route('trade.edit', ['id' => 0])->with('message', '削除しました。');
	}

}