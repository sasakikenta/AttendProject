
@include('headers.main')

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
                                <td class="td_6">{{ Form::select("buy_hall", $halls, "", ["id"=>"name1"]) }}</td>
                            </tr>
                            <tr>
                                <td class="td_4">機種名</td>
                                <td class="td_6">{{ Form::select("machine", $machines, "", ["id"=>"name1"]) }}</td>
                            </tr>
                            <tr>
                                <td class="td_4">適用</td>
                                <td class="td_6">
                                    {{ Form::label('stock','在庫') }}{{ Form::radio("delivery", "1", true, array('id' => 'stock')) }}
                                    &nbsp;
                                    {{ Form::label('deli','出庫済') }}{{ Form::radio("delivery", "2", false, array('id' => 'deli')) }}
                                </td>
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
                                <td class="td_4">発注先</td><td class="td_6"></td>
                            </tr>
                            <tr>
                                <td class="td_4">発注日</td><td class="td_6"></td>
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
                                <td class="td_4" width="50%">担当者</td><td class="td_6"></td>
                            </tr>
                            <tr>
                                <td class="td_4">法人名</td><td class="td_6">自動表示</td>
                            </tr>
                            <tr>
                                <td class="td_4">請求額</td><td class="td_6"></td>
                            </tr>
                            <tr>
                                <td class="td_4">方法</td><td class="td_6"></td>
                            </tr>
                            <tr>
                                <td class="td_4">集金予定日</td><td class="td_6"></td>
                            </tr>
                            <tr>
                                <td class="td_4">集金済み</td><td class="td_6"></td>
                            </tr>
                            <tr>
                                <td class="td_4">集金日</td><td class="td_6"></td>
                            </tr>
                            <tr>
                                <td class="td_4">備考</td><td class="td_6"></td>
                            </tr>
                        </tbody>
                    </table>
            </div>
                
                <div class="listBtn" style="margin:60px 0 0 0;">
                        <div class="submit"><input name="done" value="保存" type="submit"></div>
                                                <div class="submit"><input name="delete" onclick="return confirm(&quot;削除してもよろしいですか？&quot;, true)" value="削除" type="submit"></div>
                                        </div>
        </td>
    </tr></tbody>
    </table>
</div>