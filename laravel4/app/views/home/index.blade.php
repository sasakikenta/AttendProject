@extends('layouts.main')

@section('content')


{{$data[0]['id']}}
<div class="table_base2">
<table border="0" cellpadding="5" cellspacing="1" width="100%">
                        <tbody><tr class="td_4">
                                <td width="25%">会員番号</td>
                                <td width="25%">最終来店日</td>
                                <td width="25%">会員ランク</td>
                                <td width="10%">謎解き</td>
                                <td width="15%">来店回数</td>
                                </tr>
                        <tr class="td_6">
                                <td><input name="data[Tbl_customer][no]" value="100101" id="Tbl_customerNo" required="required" type="text"></td>
                                <td><input name="data[Tbl_customer][lastvisit_date]" class="datepicker hasDatepicker" value="2015-07-13" id="Tbl_customerLastvisitDate" required="required" type="text"></td>
                                <td><select name="data[Tbl_customer][rank_id]" id="Tbl_customerRankId">
<option value=""></option>
<option value="1">ブロンズ</option>
<option value="2" selected="selected">シルバー</option>
<option value="3">ゴールド</option>
<option value="4">プラチナ</option>
<option value="5">VIP</option>
</select></td>
                                <td><input name="data[Tbl_customer][class_id]" id="Tbl_customerClassId_" value="0" type="hidden"><input name="data[Tbl_customer][class_id]" value="1" id="Tbl_customerClassId" type="checkbox"></td>
                                <td><input name="data[Tbl_customer][visit]" size="5" value="11" id="Tbl_customerVisit" type="text"></td>
                                </tr>
                </tbody></table></div>
@stop