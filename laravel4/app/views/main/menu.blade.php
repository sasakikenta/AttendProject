@extends('layouts.main')

@section('title')
メニュー
@stop

@section('content')
<div class="contents_base">
  <div class="contents_base_color">

<table width="100%" border="0" cellpadding="5" cellspacing="1">
  <tr>
    <th colspan="2">中古機管理表</th>
    <td class="td_5">
      <button class="navi-btn" onclick="window.open('{{ route( 'oldmanager.edit', 0 ) }}', 'edit', 'width=900px,height=800px,scrollbars=yes')">新規登録</button>
            <a href="{{ route( 'oldmanager.list' ) }}">
              <input type="button" class="navi-btn" value="一覧" />
            </a>
            <!-- <input type="button" class="navi-btn" value="印刷" /> -->
    </td>
  </tr>
  <tr>
    <th rowspan="3">売上管理表</th>
      <th align="center" class="td_2" style="color:black !important;">売契業販</th>
        <td class="td_5">
          <button class="navi-btn" onclick="window.open('{{ route( 'trade.edit', 0 ) }}', 'edit', 'width=900px,height=800px,scrollbars=yes')">新規登録</button>
            <a href="{{ route( 'trade.list' ) }}">
              <input type="button" class="navi-btn" value="一覧" />
            </a>
            <!-- <input type="button" class="navi-btn" value="印刷" /> -->
        </td>
  </tr>
  <tr>
      <th align="center" class="td_2" style="color:black !important;">売契直販新台</th>
        <td class="td_5">
          <button class="navi-btn" onclick="window.open('{{ route( 'newdirect.edit', 0 ) }}', 'edit', 'width=900px,height=800px,scrollbars=yes')">新規登録</button>
            <a href="{{ route( 'newdirect.list' ) }}">
              <input type="button" class="navi-btn" value="一覧" />
            </a>
            <!-- <input type="button" class="navi-btn" value="印刷" /> -->
        </td>
  </tr>
  <tr>
      <th align="center" class="td_2" style="color:black !important;">売契直販中古</th>
        <td class="td_5">
          <button class="navi-btn" onclick="window.open('{{ route( 'olddirect.edit', 0 ) }}', 'edit', 'width=900px,height=800px,scrollbars=yes')">新規登録</button>
            <a href="{{ route( 'olddirect.list' ) }}">
              <input type="button" class="navi-btn" value="一覧" />
            </a>
            <!-- <input type="button" class="navi-btn" value="印刷" /> -->
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
@stop