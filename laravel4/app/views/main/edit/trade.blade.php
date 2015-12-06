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
    {{ HTML::script('js/main/getLegal.js') }}
@stop

@section('title')
売上管理 入力(業販)
@stop

@section('content')
@if ($data['id'] == '')
    {{ Form::open(['url' => route( 'trade.create' )]) }}
@else
    {{ Form::open(['url' => route( 'trade.update', $data['id'] )]) }}
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
                                <td class="td_4">新台</td>
                                <td class="td_6">{{ Form::number("new", Input::old("new", $data['new'])) }}</td>
                            </tr>
                            <tr>
                                <td class="td_4">ユニット</td>
                                <td class="td_6">{{ Form::number("unit", Input::old("unit", $data['unit'])) }}</td>
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
                                <td class="td_4">発注</td>
                                <td class="td_6">{{ Form::text("order_day", Input::old("order_day", $data['order_day']), ["class"=>"datepicker"]) }}</td>
                            </tr>
                            <tr>
                                <td class="td_4">法人名</td>
                                <td class="td_6" id="legal" data-url="{{ route('hiro.getlegal') }}"></td>
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
                                <td class="td_4" width="50%">発注先</td>
                                <td class="td_6">{{ Form::select("order_contact", $contacts, Input::old("order_contact", $data['order_contact']), ["data-placeholder"=>"発注先を選択してください"]) }}</td>
                            </tr>
                            <tr>
                                <td class="td_4">発注元</td>
                                <td class="td_6">{{ Form::select("order_source", $sources, Input::old("order_source", $data['order_source']), ["data-placeholder"=>"発注元を選択してください"]) }}</td>
                            </tr>
                            <tr>
                                <td class="td_4">請求額</td>
                                <td class="td_6">{{ Form::number("bill_money", Input::old("bill_money", $data['bill_money'])) }}</td>
                            </tr>
                            <tr>
                                <td class="td_4">方法</td>
                                <td class="td_6">
                                    {{ Form::radio("method", "1", (Input::old("method", $data['method']) == "1"), array('id' => 'stock')) }}
                                    {{ Form::label('stock','集金') }}
                                    &nbsp;
                                    {{ Form::radio("method", "2", (Input::old("method", $data['method']) == "2"), array('id' => 'deli')) }}
                                    {{ Form::label('deli','振込/リース') }}
                                </td>
                            </tr>
                            <tr>
                                <td class="td_4">集金予定日</td>
                                <td class="td_6">{{ Form::text("collect_oneday", Input::old("collect_oneday", $data['collect_oneday']), ["class"=>"datepicker"]) }}</td>
                            </tr>
                            <tr>
                                <td class="td_4">集金済</td>
                                <td class="td_6">{{ Form::checkbox("collect", "2", (Input::old("collect", $data['collect']) == "1")) }}</td>
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
            onClick="if(window.confirm('削除してもよろしいですか?')){form.action='{{ route('trade.delete', $data['id']) }}';return true} else {return false}" value="削除" />
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
                <input  type="submit" onClick="form.action='{{ route('trade.create') }}';return true" value="複製" />
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