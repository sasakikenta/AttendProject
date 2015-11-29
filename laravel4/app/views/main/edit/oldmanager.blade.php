@extends('layouts.main')

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

@section('content')

@if ($data['id'] == '')
    {{ Form::open(['url' => route( 'oldmanager.create' )]) }}
@else
    {{ Form::open(['url' => route( 'oldmanager.update', $data['id'] )]) }}
@endif
<div class="contents_base"width="100%">

    <table border="0" cellpadding="0" cellspacing="10" width="100%">
    <tbody><tr>

        <td valign="top">
            <div class="table_base2">
                    <table border="0" cellpadding="5" cellspacing="1" width="100%">
                        <tbody>
                            <tr>
                                <td class="td_4" width="30%">ID</td>
                                <td id="oldmanager-id" class="td_6">{{ $data['id'] }}</td>
                            </tr>
                            <tr>
                                <td class="td_4">適用</td>
                                <td class="td_6">
                                    {{ Form::radio("c_s", "1", (Input::old("c_s", $data['c_s']) == "1"), array('id' => 'c')) }}
                                    {{ Form::label('c',' C ') }}
                                    &nbsp;
                                    {{ Form::radio("c_s", "2", (Input::old("c_s", $data['c_s']) == "2"), array('id' => 's')) }}
                                    {{ Form::label('s',' S ') }}
                                </td>
                            </tr>
                            <tr>
                                <td class="td_4">種別</td>
                                <td class="td_6">
                                    {{ Form::radio("class", "1", (Input::old("c_s", $data['class']) == "1"), array('id' => 'keep')) }}
                                    {{ Form::label('keep','預かり') }}
                                    &nbsp;
                                    {{ Form::radio("class", "2", (Input::old("c_s", $data['class']) == "2"), array('id' => 'buy')) }}
                                    {{ Form::label('buy','購入') }}
                                </td>
                            </tr>
                            <tr>
                                <td class="td_4">No.</td>
                                <td id="oldmanager-no" class="td_6">
                                    {{ ($data['c_s'] == TblOldmanager::STATUS_C) ? 'C' : 'S' }}{{ ($data['class'] == TblOldmanager::STATUS_KEEP) ? 'A' : 'K' }}{{ $data['user'] }}{{ str_pad($data['no'], 3,  0, STR_PAD_LEFT) }}
                                </td>
                            </tr>
                            <tr>
                                <td class="td_4">年月日</td><td class="td_6">{{ Form::text("day", Input::old("day", $data['day']), ["class"=>"datepicker"]) }}</td>
                            </tr>
                            <tr>
                                <td class="td_4">入庫日</td><td class="td_6">{{ Form::text("storage_day", Input::old("storage_day", $data['storage_day']), ["class"=>"datepicker"]) }}</td>
                            </tr>
                            <tr>
                                <td class="td_4">担当者</td>
                                <td class="td_6">{{ Form::select("user", $users, Input::old("user", $data['user']), ["data-placeholder"=>"担当者を選択してください"]) }}</td>
                            </tr>
                            <tr>
                                <td class="td_4">請求No.</td><td class="td_6">{{ Form::text("bill_no", Input::old("bill_no", $data['bill_no'])) }}</td>
                            </tr>
                            <tr>
                                <td class="td_4">製造番号</td>
                                <td class="td_6">
                                    <div>回胴・セル{{ Form::text("serial_slot", Input::old("serial_slot", $data['serial_slot'])) }}</div>
                                    <div>筐体{{ Form::text("serial_case", Input::old("serial_case", $data['serial_case'])) }}</div>
                                    <div>基盤{{ Form::text("serial_basea", Input::old("serial_basea", $data['serial_basea'])) }}</div>
                                </td>
                            </tr>
                            <tr>
                                <td class="td_4">機種名</td>
                                <td class="td_6">{{ Form::select("machine", $machines, Input::old("machine", $data['machine']), ["data-placeholder"=>"機種を選択してください"]) }}</td>
                            </tr>
                            <tr>
                                <td class="td_4">備考</td>
                                <td class="td_6">{{ Form::textarea("note", Input::old("note", $data['note']), ["rows" => "2", "cols" => "25"]) }}</td>
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
                                <td class="td_6">{{ Form::select("buy_legal", $legals, Input::old("buy_legal", $data['buy_legal']), ["data-placeholder"=>"買取・預り先法人を選択してください"]) }}</td>
                            </tr>
                            <tr>
                                <td class="td_4">買取先・預り先（ホール名）</td>
                                <td class="td_6">{{ Form::select("buy_hall", $halls, Input::old("buy_hall", $data['buy_hall']), ["data-placeholder"=>"買取・預り先ホールを選択してください"]) }}</td>
                            </tr>
                            <tr>
                                <td class="td_4">購入金額</td><td class="td_6">{{ Form::text("buy_money", Input::old("buy_money", $data['buy_money'])) }}</td>
                            </tr>
                            <tr>
                                <td class="td_4">運賃</td><td class="td_6">{{ Form::text("deli_money", Input::old("deli_money", $data['deli_money'])) }}</td>
                            </tr>
                            <tr>
                                <td class="td_4">購入合計</td><td id="oldmanager-buytotal" class="td_6"></td>
                            </tr>
                            <tr>
                                <td class="td_4">支払決済日</td><td class="td_6">{{ Form::text("pay_day", Input::old("pay_day", $data['pay_day']), ["class"=>"datepicker"]) }}</td>
                            </tr>
                            <tr>
                                <td class="td_4">決済済み</td><td class="td_6">{{ Form::checkbox("settle", "2", Input::old("settle", $data['settle'])) }}</td>
                            </tr>
                            <tr>
                                <td class="td_4">売却先・出庫先（法人名）</td>
                                <td class="td_6">{{ Form::select("sell_legal", $legals, Input::old("sell_legal", $data['sell_legal']), ["data-placeholder"=>"売却・出庫先法人を選択してください"]) }}</td>
                            </tr>
                            <tr>
                                <td class="td_4">売却代金</td><td class="td_6">{{ Form::text("sell_money", Input::old("sell_money", $data['sell_money'])) }}</td>
                            </tr>
                            <tr>
                                <td class="td_4">差額</td><td id="oldmanager-arari" class="td_6"></td>
                            </tr>
                            <tr>
                                <td class="td_4">出庫予定日</td><td class="td_6">{{ Form::text("deli_oneday", Input::old("deli_oneday", $data['deli_oneday']), ["class"=>"datepicker"]) }}</td>
                            </tr>
                            <tr>
                                <td class="td_4">出庫日</td><td class="td_6">{{ Form::text("deli_day", Input::old("deli_day", $data['deli_day']), ["class"=>"datepicker"]) }}</td>
                            </tr>
                            <tr>
                                <td class="td_4">状態</td>
                                <td class="td_6">
                                    {{ Form::radio("delivery", "0", (Input::old("delivery", $data['delivery']) == "0"), array('id' => 'stock')) }}
                                    {{ Form::label('stock','在庫') }}
                                    &nbsp;
                                    {{ Form::radio("delivery", "1", (Input::old("delivery", $data['delivery']) == "1"), array('id' => 'deli')) }}
                                    {{ Form::label('deli','出庫済') }}
                                    &nbsp;
                                    {{ Form::radio("delivery", "2", (Input::old("delivery", $data['delivery']) == "2"), array('id' => 'dis')) }}
                                    {{ Form::label('dis','廃棄') }}
                                    &nbsp;
                                    {{ Form::radio("delivery", "3", (Input::old("delivery", $data['delivery']) == "3"), array('id' => 'return')) }}
                                    {{ Form::label('return','返却') }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
            </div>
                
            
        </td>
    </tr></tbody>
    </table>

{{-- ▼▼▼▼▼ボタンゾーン▼▼▼▼▼ --}}
    <table border="0" cellpadding="0" cellspacing="10" width="100%">
    <tbody><tr>
        <td valign="top">
        <div class="listBtn">
            <div class="submit"></div>
            <div class="submit"></div>
        </div>
        <div class="updatebuttons">
        @if ( $data['id'] != '' )
            <input  type="submit"
            onClick="if(window.confirm('削除してもよろしいですか?')){form.action='{{ route('oldmanager.delete', $data['id']) }}';return true} else {return false}" value="削除" />
        @endif
        </div>
        </td>

        <td valign="top" width="50%">
            <div class="listBtn">
                <div class="createbuttons" class="submit">
                @if ( $data['id'] == '' )
                <input type="submit" value="登録" />
                @endif
                </div>
                <div class="updatebuttons" class="submit">

                @if ( $data['id'] != '' )
                <input  type="submit" onClick="form.action='{{ route('oldmanager.create') }}';return true" value="複製" />
                <input  type="submit" value="更新" />
                @endif
                </div>
            </div>
        </td>
    </tr>
    </tbody>
    </table>
{{-- ▲▲▲▲▲ボタンゾーン▲▲▲▲▲ --}}
</div>
{{ Form::close() }}
@stop