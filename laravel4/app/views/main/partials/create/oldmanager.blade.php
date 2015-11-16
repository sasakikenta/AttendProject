
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
    <script src="/js/main/edit/ajaxSubmitOldmanager.js" type="text/javascript"></script>
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
                                <td class="td_6"></td>
                            </tr>
                            <tr>
                                <td class="td_4">適用</td>
                                <td class="td_6">
                                    {{ Form::label('c',' C ') }}{{ Form::radio("c_s", "1", true, array('id' => 'c')) }}
                                    &nbsp;
                                    {{ Form::label('s',' S ') }}{{ Form::radio("c_s", "2", false, array('id' => 's')) }}
                                </td>
                            </tr>
                            <tr>
                                <td class="td_4">種別</td>
                                <td class="td_6">
                                    {{ Form::label('keep','預かり') }}{{ Form::radio("class", "1", true, array('id' => 'keep')) }}
                                    &nbsp;
                                    {{ Form::label('buy','購入') }}{{ Form::radio("class", "2", false, array('id' => 'buy')) }}
                                </td>
                            </tr>
                            <tr>
                                <td class="td_4">No.</td><td class="td_6">自動ででるよ</td>
                            </tr>
                            <tr>
                                <td class="td_4">年月日</td><td class="td_6">{{ Form::text("day", "", ["class"=>"datepicker"]) }}</td>
                            </tr>
                            <tr>
                                <td class="td_4">入庫日</td><td class="td_6">{{ Form::text("storage_day", "", ["class"=>"datepicker"]) }}</td>
                            </tr>
                            <tr>
                                <td class="td_4">担当者</td>
                                <td class="td_6">{{ Form::select("user", $users, null, ["data-placeholder"=>"法人名を選択してください"]) }}</td>
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
                                <td class="td_4">機種名</td><td class="td_6">{{ Form::select("machine", $machines, "", ["id"=>"name1"]) }}</td>
                            </tr>
                            <tr>
                                <td class="td_4">備考</td><td class="td_6">{{ Form::textarea("note", "", ["rows" => "2", "cols" => "25"]) }}</td>
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
                                <td class="td_6">{{ Form::select("buy_legal", $legals, "", ["data-placeholder"=>"法人名を選択してください"]) }}</td>
                            </tr>
                            <tr>
                                <td class="td_4">買取先・預り先（ホール名）</td>
                                <td class="td_6">{{ Form::select("buy_hall", $halls, "", ["id"=>"name1"]) }}</td>
                            </tr>
                            <tr>
                                <td class="td_4">購入金額</td><td class="td_6">{{ Form::text("buy_money") }}</td>
                            </tr>
                            <tr>
                                <td class="td_4">運賃</td><td class="td_6">{{ Form::text("deli_money") }}</td>
                            </tr>
                            <tr>
                                <td class="td_4">購入合計</td><td class="td_6"></td>
                            </tr>
                            <tr>
                                <td class="td_4">支払決済日</td><td class="td_6">{{ Form::text("pay_day", "", ["class"=>"datepicker"]) }}</td>
                            </tr>
                            <tr>
                                <td class="td_4">決済済み</td><td class="td_6">{{ Form::checkbox("settle", "2") }}</td>
                            </tr>
                            <tr>
                                <td class="td_4">売却先・出庫先（法人名）</td>
                                <td class="td_6">{{ Form::select("sell_legal", $legals, "", ["id"=>"name1"]) }}</td>
                            </tr>
                            <tr>
                                <td class="td_4">売却代金</td><td class="td_6">{{ Form::text("sell_money") }}</td>
                            </tr>
                            <tr>
                                <td class="td_4">差額</td><td class="td_6"></td>
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
                                    {{ Form::label('stock','在庫') }}{{ Form::radio("delivery", "1", true, array('id' => 'stock')) }}
                                    &nbsp;
                                    {{ Form::label('deli','出庫済') }}{{ Form::radio("delivery", "2", false, array('id' => 'deli')) }}
                                    &nbsp;
                                    {{ Form::label('dis','廃棄') }}{{ Form::radio("delivery", "3", false, array('id' => 'dis')) }}
                                    &nbsp;
                                    {{ Form::label('return','返却') }}{{ Form::radio("delivery", "4", false, array('id' => 'return')) }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
            </div>
                
                <div class="listBtn" style="margin:60px 0 0 0;">
                    <button id="submit-oldmanager" data-url="{{ route('oldmanager.store') }}">登録</button>
                                        </div>
        </td>
    </tr></tbody>
    </table>
</div>
{{ Form::close() }}