
@include('headers.main')

{{ Form::open(['url' => route('oldmanager.update', 1)]) }}
<div class="contents_base">

    <table border="0" cellpadding="0" cellspacing="10" width="100%">
    <tbody><tr>

        <td valign="top">
            <div class="table_base2">
                    <table border="0" cellpadding="5" cellspacing="1" width="100%">
                        <tbody>
                            <tr>
                                <td class="td_4" width="50%">ID</td><td class="td_6"></td>
                            </tr>
                            <tr>
                                <td class="td_4">ホール名</td>
                                <td class="td_6">{{ Form::select("buy_hall", $halls, null, ["data-placeholder"=>"ホールを選択してください"]) }}</td>
                            </tr>
                            <tr>
                                <td class="td_4">機種名</td>
                                <td class="td_6">{{ Form::select("machine", $machines, null, ["data-placeholder"=>"機種を選択してください"]) }}</td>
                            </tr>
                            <tr>
                                <td class="td_4">新台</td>
                                <td class="td_6">{{ Form::text("new", "") }}</td>
                            </tr>
                            <tr>
                                <td class="td_4">ユニット</td>
                                <td class="td_6">{{ Form::text("unit", "") }}</td>
                            </tr>
                            <tr>
                                <td class="td_4">納品予定</td>
                                <td class="td_6">{{ Form::text("deli_oneday", "", ["class"=>"datepicker"]) }}</td>
                            </tr>
                            <tr>
                                <td class="td_4">開店予定</td>
                                <td class="td_6">{{ Form::text("open_oneday", "", ["class"=>"datepicker"]) }}</td>
                            </tr>
                            <tr>
                                <td class="td_4">発注</td>
                                <td class="td_6">{{ Form::text("open_oneday", "", ["class"=>"datepicker"]) }}</td>
                            </tr>
                            <tr>
                                <td class="td_4">法人名</td>
                                <td class="td_6">自動表示</td>
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
                                <td class="td_6">{{ Form::select("buy_hall", $contacts, null, ["data-placeholder"=>"発注先を選択してください"]) }}</td>
                            </tr>
                            <tr>
                                <td class="td_4">発注元</td>
                                <td class="td_6">{{ Form::select("buy_hall", $sources, null, ["data-placeholder"=>"発注元を選択してください"]) }}</td>
                            </tr>
                            <tr>
                                <td class="td_4">請求額</td>
                                <td class="td_6">{{ Form::text("new", "") }}</td>
                            </tr>
                            <tr>
                                <td class="td_4">方法</td>
                                <td class="td_6">
                                    {{ Form::label('stock','在庫') }}{{ Form::radio("delivery", "1", true, array('id' => 'stock')) }}
                                    &nbsp;
                                    {{ Form::label('deli','出庫済') }}{{ Form::radio("delivery", "2", false, array('id' => 'deli')) }}
                                </td>
                            </tr>
                            <tr>
                                <td class="td_4">集金予定日</td>
                                <td class="td_6">{{ Form::text("open_oneday", "", ["class"=>"datepicker"]) }}</td>
                            </tr>
                            <tr>
                                <td class="td_4">集金済</td>
                                <td class="td_6">{{ Form::checkbox("settle", "2") }}</td>
                            </tr>
                            <tr>
                                <td class="td_4">集金日</td>
                                <td class="td_6">{{ Form::text("open_oneday", "", ["class"=>"datepicker"]) }}</td>
                            </tr>
                            <tr>
                                <td class="td_4">備考</td>
                                <td class="td_6">{{ Form::textarea("note", "", ["rows" => "2", "cols" => "25"]) }}</td>
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