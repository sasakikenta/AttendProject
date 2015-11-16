@extends('layouts.main')

@section('content')


<div class="contents_base">
  <div class="contents_base_color">

<table width="100%" border="0" cellpadding="5" cellspacing="1">
  <tr>
    <th colspan="2">中古機管理表</th>
    <td class="td_5">
      <button href="#oldmanager-edit" class="navi-btn oldmanager-edit">新規登録</button>
            <input type="button" class="navi-btn" value="一覧" />
            <input type="button" class="navi-btn" value="印刷" />
    </td>
  </tr>
  <tr>
    <th rowspan="3">売上管理表</th>
      <th align="center" class="td_2" style="color:black !important;">売契業販</th>
        <td class="td_5">
          <a href="#trade-edit" class="trade-edit"><input type="button" class="navi-btn" value="新規登録" /></a>
                <input type="button" class="navi-btn" value="一覧" />
                <input type="button" class="navi-btn" value="印刷" />
        </td>
  </tr>
  <tr>
      <th align="center" class="td_2" style="color:black !important;">売契直販新台</th>
        <td class="td_5">
          <a href="#newdirect-edit" class="newdirect-edit"><input type="button" class="navi-btn" value="新規登録" /></a>
                <input type="button" class="navi-btn" value="一覧" />
                <input type="button" class="navi-btn" value="印刷" />
        </td>
  </tr>
  <tr>
      <th align="center" class="td_2" style="color:black !important;">売契直販中古</th>
        <td class="td_5">
          <a href="#olddirect-edit" class="olddirect-edit"><input type="button" class="navi-btn" value="新規登録" /></a>
                <input type="button" class="navi-btn" value="一覧" />
                <input type="button" class="navi-btn" value="印刷" />
        </td>
  </tr>
  <tr>
      <th colspan="2"  align="center" class="td_2" style="color:black !important;">マスタ管理</th>
        <td class="td_5">
          <div>
                <input type="button" class="navi-btn" value="ユーザー" />
                <input type="button" class="navi-btn" value="法人" />
                <input type="button" class="navi-btn" value="発注元" />
          </div>
          <div>
                <input type="button" class="navi-btn" value="機種" />
                <input type="button" class="navi-btn" value="ホール" />
                <input type="button" class="navi-btn" value="発注先" />
          </div>
        </td>
  </tr>

</table>
</div>
</div>
<div style="display:none;">
  <div id="oldmanager-edit">
  @include('main.partials.create.oldmanager')
  </div>
</div>
<div style="display:none;">
  <div id="trade-edit">
@include('main.partials.create.trade')
  </div>
</div>
<div style="display:none;">
  <div id="newdirect-edit">
@include('main.partials.create.newdirect')
  </div>
</div>
<div style="display:none;">
  <div id="olddirect-edit">
@include('main.partials.create.olddirect')
  </div>
</div>

@stop