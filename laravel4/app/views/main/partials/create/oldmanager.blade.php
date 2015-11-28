
@include('headers.main')

@section('css-link')

@parent

  <style>
    .td_6 {
        text-align: left;
    }
  </style>

@stop

@section('js-link')
@parent
{{ HTML::script('js/main/detail/oldmanager.js') }}
{{ HTML::script('js/main/edit/ajaxSubmitOldmanager.js') }}
@stop

{{ Form::open(['url' => route('oldmanager.update', 1)]) }}
<div class="contents_base"width="100%">

    <table border="0" cellpadding="0" cellspacing="10" width="100%">
    <tbody><tr>

        <td valign="top">
            <div class="table_base2">
                    <table border="0" cellpadding="5" cellspacing="1" width="100%">
                        <tbody>
                            <tr>
                                <td class="td_4" width="30%">ID</td>
                                <td id="oldmanager-id" class="td_6"></td>
                            </tr>
                            <tr>
                                <td class="td_4">適用</td>
                                <td class="td_6">
                                    {{ Form::radio("c_s", "1", true, array('id' => 'c')) }}
                                    {{ Form::label('c',' C ') }}
                                    &nbsp;
                                    {{ Form::radio("c_s", "2", false, array('id' => 's')) }}
                                    {{ Form::label('s',' S ') }}
                                </td>
                            </tr>
                            <tr>
                                <td class="td_4">種別</td>
                                <td class="td_6">
                                    {{ Form::radio("class", "1", true, array('id' => 'keep')) }}
                                    {{ Form::label('keep','預かり') }}
                                    &nbsp;
                                    {{ Form::radio("class", "2", false, array('id' => 'buy')) }}
                                    {{ Form::label('buy','購入') }}
                                </td>
                            </tr>
                            <tr>
                                <td class="td_4">No.</td><td id="oldmanager-no" class="td_6"></td>
                            </tr>
                            <tr>
                                <td class="td_4">年月日</td><td class="td_6">{{ Form::text("day", "", ["class"=>"datepicker"]) }}</td>
                            </tr>
                            <tr>
                                <td class="td_4">入庫日</td><td class="td_6">{{ Form::text("storage_day", "", ["class"=>"datepicker"]) }}</td>
                            </tr>
                            <tr>
                                <td class="td_4">担当者</td>
                                <td class="td_6">{{ Form::select("user", $users, null, ["data-placeholder"=>"担当者を選択してください"]) }}</td>
                            </tr>
                            <tr>
                                <td class="td_4">請求No.</td><td class="td_6">{{ Form::text("bill_no") }}</td>
                            </tr>
                            <tr>
                                <td class="td_4">製造番号</td>
                                <td class="td_6">
                                    <div>回胴・セル{{ Form::text("serial_slot") }}</div>
                                    <div>筐体{{ Form::text("serial_case") }}</div>
                                    <div>基盤{{ Form::text("serial_basea") }}</div>
                                </td>
                            </tr>
                            <tr>
                                <td class="td_4">機種名</td>
                                <td class="td_6">{{ Form::select("machine", $machines, null, ["data-placeholder"=>"機種を選択してください"]) }}</td>
                            </tr>
                            <tr>
                                <td class="td_4">備考</td>
                                <td class="td_6">{{ Form::textarea("note", "", ["rows" => "2", "cols" => "25"]) }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
        </td>

        <td valign="top" width="50%">
            <div class="table_base2">
                <table border="0" cellpadding="5" cellspacing="1" width="100%">
                        <tbody>
                            <tr>
                                <td class="td_4" width="50%">買取先・預り先（法人名）</td>
                                <td class="td_6">{{ Form::select("buy_legal", $legals, null, ["data-placeholder"=>"買取・預り先法人を選択してください"]) }}</td>
                            </tr>
                            <tr>
                                <td class="td_4">買取先・預り先（ホール名）</td>
                                <td class="td_6">{{ Form::select("buy_hall", $halls, null, ["data-placeholder"=>"買取・預り先ホールを選択してください"]) }}</td>
                            </tr>
                            <tr>
                                <td class="td_4">購入金額</td><td class="td_6">{{ Form::text("buy_money") }}</td>
                            </tr>
                            <tr>
                                <td class="td_4">運賃</td><td class="td_6">{{ Form::text("deli_money") }}</td>
                            </tr>
                            <tr>
                                <td class="td_4">購入合計</td><td id="oldmanager-buytotal" class="td_6"></td>
                            </tr>
                            <tr>
                                <td class="td_4">支払決済日</td><td class="td_6">{{ Form::text("pay_day", "", ["class"=>"datepicker"]) }}</td>
                            </tr>
                            <tr>
                                <td class="td_4">決済済み</td><td class="td_6">{{ Form::checkbox("settle", "2") }}</td>
                            </tr>
                            <tr>
                                <td class="td_4">売却先・出庫先（法人名）</td>
                                <td class="td_6">{{ Form::select("sell_legal", $legals, null, ["data-placeholder"=>"売却・出庫先法人を選択してください"]) }}</td>
                            </tr>
                            <tr>
                                <td class="td_4">売却代金</td><td class="td_6">{{ Form::text("sell_money") }}</td>
                            </tr>
                            <tr>
                                <td class="td_4">差額</td><td id="oldmanager-arari" class="td_6"></td>
                            </tr>
                            <tr>
                                <td class="td_4">出庫予定日</td><td class="td_6">{{ Form::text("deli_oneday", "", ["class"=>"datepicker"]) }}</td>
                            </tr>
                            <tr>
                                <td class="td_4">出庫日</td><td class="td_6">{{ Form::text("deli_day", "", ["class"=>"datepicker"]) }}</td>
                            </tr>
                            <tr>
                                <td class="td_4">状態</td>
                                <td class="td_6">
                                    {{ Form::radio("delivery", "1", true, array('id' => 'stock')) }}
                                    {{ Form::label('stock','在庫') }}
                                    &nbsp;
                                    {{ Form::radio("delivery", "2", false, array('id' => 'deli')) }}
                                    {{ Form::label('deli','出庫済') }}
                                    &nbsp;
                                    {{ Form::radio("delivery", "3", false, array('id' => 'dis')) }}
                                    {{ Form::label('dis','廃棄') }}
                                    &nbsp;
                                    {{ Form::radio("delivery", "4", false, array('id' => 'return')) }}
                                    {{ Form::label('return','返却') }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
            </div>
                
            
        </td>
    </tr></tbody>
    </table>

    <table border="0" cellpadding="0" cellspacing="10" width="100%">
    <tbody><tr>
        <td valign="top">
        <div class="listBtn">
            <div class="submit"></div>
            <div class="submit"></div>
        </div>
        <div class="updatebuttons">
            <input  type="submit" id="submit-oldmanager-delete" data-url="{{ route('oldmanager.delete') }}" value="削除" />
        </div>
        </td>

        <td valign="top" width="50%">
            <div class="listBtn">
                <div class="createbuttons" class="submit">
                <input type="submit" id="submit-oldmanager" data-url="{{ route('oldmanager.store') }}" value="登録" />
                </div>
                <div class="updatebuttons" class="submit">
                <input  type="submit" id="submit-oldmanager-clone" data-url="{{ route('oldmanager.store') }}" value="複製" />
                <input  type="submit" id="submit-oldmanager-update" data-url="{{ route('oldmanager.update') }}" value="更新" />
                </div>
            </div>
        </td>
    </tr>
    </tbody>
    </table>
</div>
{{ Form::close() }}