@extends('layouts.main')

@section('css-link')
    @parent

      <style>
        .td_6 {
            text-align: left;
        }
      </style>
@stop

@section('content')
@if ($data['id'] == '')
    {{ Form::open(['url' => route( 'newdirect.create' )]) }}
@else
    {{ Form::open(['url' => route( 'newdirect.update', $data['id'] )]) }}
@endif
<div class="contents_base">

    <table border="0" cellpadding="0" cellspacing="10" width="100%">
    <tbody><tr>

        <td valign="top">
            <div class="table_base2">
                    <table border="0" cellpadding="5" cellspacing="1" width="100%">
                        <tbody>
                            <tr>
                                <td class="td_4" width="50%">ID</td>
                                <td class="td_6">{{ $data['id'] }}</td>
                            </tr>
                            <tr>
                                <td class="td_4">ホール名</td>
                                <td class="td_6">{{ Form::select("hall", $halls, Input::old("hall", $data['hall']), ["data-placeholder"=>"ホールを選択してください"]) }}</td>
                            </tr>
                            <tr>
                                <td class="td_4">機種名</td>
                                <td class="td_6">{{ Form::select("machine", $machines, Input::old("machine", $data['machine']), ["data-placeholder"=>"機種を選択してください"]) }}</td>
                            </tr>
                            <tr>
                                <td class="td_4">適用</td>
                                <td class="td_6">
                                    {{ Form::radio("app", "1", (Input::old("method", $data['method']) == "1"), array('id' => 'machine')) }}
                                    {{ Form::label('machine','機械代') }}
                                    &nbsp;
                                    {{ Form::radio("app", "2", (Input::old("method", $data['method']) == "2"), array('id' => 'paper')) }}
                                    {{ Form::label('paper','書類代') }}
                                    &nbsp;
                                    {{ Form::radio("app", "3", (Input::old("method", $data['method']) == "3"), array('id' => 'multi')) }}
                                    {{ Form::label('multi','機械/書類代') }}
                                </td>
                            </tr>
                            <tr>
                                <td class="td_4">新台</td>
                                <td class="td_6">{{ Form::text("new", Input::old("new", $data['new'])) }}</td>
                            </tr>
                            <tr>
                                <td class="td_4">ユニット</td>
                                <td class="td_6">{{ Form::text("unit", Input::old("unit", $data['unit'])) }}</td>
                            </tr>
                            <tr>
                                <td class="td_4">納品予定</td>
                                <td class="td_6">{{ Form::text("deli_oneday", Input::old("deli_oneday", $data['deli_oneday']), ["class"=>"datepicker"]) }}</td>
                            </tr>
                            <tr>
                                <td class="td_4">開店予定</td>
                                <td class="td_6">{{ Form::text("open_oneday", Input::old("open_oneday", $data['open_oneday']), ["class"=>"datepicker"]) }}</td>
                            </tr>
                            <tr>
                                <td class="td_4" width="50%">発注先</td>
                                <td class="td_6">{{ Form::select("order_contact", $contacts, Input::old("order_contact", $data['order_contact']), ["data-placeholder"=>"発注先を選択してください"]) }}</td>
                            </tr>
                            <tr>
                                <td class="td_4">発注日</td>
                                <td class="td_6">{{ Form::text("order_day", Input::old("order_day", $data['order_day']), ["class"=>"datepicker"]) }}</td>
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
                                <td class="td_4">担当者</td>
                                <td class="td_6">{{ Form::select("user", $users, Input::old("user", $data['user']), ["data-placeholder"=>"担当者を選択してください"]) }}</td>
                            </tr>
                            <tr>
                                <td class="td_4">法人名</td><td class="td_6">自動表示</td>
                            </tr>
                            <tr>
                                <td class="td_4">請求額</td>
                                <td class="td_6">{{ Form::text("bill_money", Input::old("bill_money", $data['bill_money'])) }}</td>
                            </tr>
                            <tr>
                                <td class="td_4">方法</td>
                                <td class="td_6">
                                    {{ Form::radio("method", "1", (Input::old("method", $data['method']) == "1"), array('id' => 'stock')) }}
                                    {{ Form::label('stock','集金') }}
                                    &nbsp;
                                    {{ Form::radio("method", "3", (Input::old("method", $data['method']) == "3"), array('id' => 'deli')) }}
                                    {{ Form::label('deli','リース') }}
                                    &nbsp;
                                    {{ Form::radio("method", "2", (Input::old("method", $data['method']) == "2"), array('id' => 'deli')) }}
                                    {{ Form::label('deli','振込') }}
                                </td>
                            </tr>
                            <tr>
                                <td class="td_4">集金予定日</td>
                                <td class="td_6">{{ Form::text("collect_oneday", Input::old("collect_oneday", $data['collect_oneday']), ["class"=>"datepicker"]) }}</td>
                            </tr>
                            <tr>
                                <td class="td_4">集金済</td>
                                <td class="td_6">{{ Form::checkbox("collect", "2", (Input::old("collect", $data['collect']) == "2")) }}</td>
                            </tr>
                            <tr>
                                <td class="td_4">集金日</td>
                                <td class="td_6">{{ Form::text("collect_day", Input::old("collect_day", $data['collect_day']), ["class"=>"datepicker"]) }}</td>
                            </tr>
                            <tr>
                                <td class="td_4">備考</td>
                                <td class="td_6">{{ Form::textarea("note", Input::old("note", $data['note']), ["rows" => "2", "cols" => "25"]) }}</td>
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
            onClick="if(window.confirm('削除してもよろしいですか?')){form.action='{{ route('newdirect.delete', $data['id']) }}';return true} else {return false}" value="削除" />
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
                <input  type="submit" onClick="form.action='{{ route('newdirect.create') }}';return true" value="複製" />
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