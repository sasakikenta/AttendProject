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
			$data['note'] = $this->selectEscape( $data['note'] );
			$data['deli_oneday'] = ($data['deli_oneday'] == "0000-00-00") ? '' : $data['deli_oneday'];
			$data['open_oneday'] = ($data['open_oneday'] == "0000-00-00") ? '' : $data['open_oneday'];
			$data['collect_oneday'] = ($data['collect_oneday'] == "0000-00-00") ? '' : $data['collect_oneday'];
			$data['collect_day'] = ($data['collect_day'] == "0000-00-00") ? '' : $data['collect_day'];
		}
		Log::debug(print_r($data, true));
		return View::make('main.edit.olddirect', compact('data'))
						->with('message', Session::pull('message', false));
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
		$input['note'] = $this->inputEscape( $input['note'] );
		unset($input['_token']);
		Log::debug(print_r($input, true));

		TblOlddirect::insert($input);

		return Redirect::route('olddirect.edit', ['id' => $id])->with('message', '正常に登録しました。');
	}

	/**
	 * 更新
	 *
	 */
	public function update($id) {
		$befor = TblOlddirect::whereId($id)->first();
		$input = Input::all();
		$input['note'] = $this->inputEscape( $input['note'] );
		unset($input['_token']);
		Log::debug(print_r($input, true));

		TblOlddirect::find($id)->fill($input)->save();

		return Redirect::route('olddirect.edit', ['id' => $id])->with('message', '正常に登録しました。');
	}

	/**
	 * 削除
	 *
	 */
	public function delete($id) {
		TblOlddirect::find($id)->fill(['del'=>1])->save();

		return Redirect::route('olddirect.edit', ['id' => 0])->with('message', '削除しました。');
	}

}