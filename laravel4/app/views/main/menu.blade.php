@extends('layouts.main')

@section('content')


<div class="contents_base">
  <div class="contents_base_color">

<table width="100%" border="0" cellpadding="5" cellspacing="1">
  <tr>
    <th colspan="2">中古機管理表</th>
    <td class="td_5">
      <button class="navi-btn" onclick="window.open('{{ route( 'oldmanager.edit', 0 ) }}', 'edit', 'width=900px,height=800px,scrollbars=yes')">新規登録</button>
            <a href="http://192.168.1.250/hiro_manager/chuukoki/list.php">
              <input type="button" class="navi-btn" value="一覧" />
            </a>
            <input type="button" class="navi-btn" value="印刷" />
    </td>
  </tr>
  <tr>
    <th rowspan="3">売上管理表</th>
      <th align="center" class="td_2" style="color:black !important;">売契業販</th>
        <td class="td_5">
          <button class="navi-btn" onclick="window.open('{{ route( 'trade.edit', 0 ) }}', 'edit', 'width=900px,height=800px,scrollbars=yes')">新規登録</button>
            <a href="http://192.168.1.250/hiro_manager/system/gyouhan/list.php">
              <input type="button" class="navi-btn" value="一覧" />
            </a>
            <input type="button" class="navi-btn" value="印刷" />
        </td>
  </tr>
  <tr>
      <th align="center" class="td_2" style="color:black !important;">売契直販新台</th>
        <td class="td_5">
          <button class="navi-btn" onclick="window.open('{{ route( 'newdirect.edit', 0 ) }}', 'edit', 'width=900px,height=800px,scrollbars=yes')">新規登録</button>
            <a href="http://192.168.1.250/hiro_manager/system/chokuhan_new/list.php">
              <input type="button" class="navi-btn" value="一覧" />
            </a>
            <input type="button" class="navi-btn" value="印刷" />
        </td>
  </tr>
  <tr>
      <th align="center" class="td_2" style="color:black !important;">売契直販中古</th>
        <td class="td_5">
          <button class="navi-btn" onclick="window.open('{{ route( 'olddirect.edit', 0 ) }}', 'edit', 'width=900px,height=800px,scrollbars=yes')">新規登録</button>
            <a href="http://192.168.1.250/hiro_manager/system/chokuhan_old/list.php">
              <input type="button" class="navi-btn" value="一覧" />
            </a>
            <input type="button" class="navi-btn" value="印刷" />
        </td>
  </tr>
  <tr>
      <th colspan="2"  align="center" class="td_2" style="color:black !important;">マスタ管理</th>
        <td class="td_5">
          <div>
                <a href="{{ route('hiro.master', 'mst_user') }}">
                <input type="button" class="navi-btn" value="ユーザー" />
                </a>
                <a href="{{ route('hiro.master', 'mst_legal') }}">
                  <input type="button" class="navi-btn" value="法人" /></a>
                <a href="{{ route('hiro.master', 'mst_oudersource') }}">
                  <input type="button" class="navi-btn" value="発注元" /></a>
          </div>
          <div>
                <a href="{{ route('hiro.master', 'mst_machine') }}">
                  <input type="button" class="navi-btn" value="機種" /></a>
                <a href="{{ route('hiro.master', 'mst_hall') }}">
                  <input type="button" class="navi-btn" value="ホール" /></a>
                <a href="{{ route('hiro.master', 'mst_ordercontact') }}">
                  <input type="button" class="navi-btn" value="発注先" /></a>
          </div>
        </td>
  </tr>

</table>
</div>
</div>
<!--
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
-->
@stop