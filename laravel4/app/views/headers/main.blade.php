<div class="ttl_back">
<table width="100%" height="100" border="0" cellspacing="10">
  <tr>
    <td><div align="left" class="title_h1">
      <div align="center">
      @section('title')
      タイトル
      @show
      </div></div></td>
    <td width="200">
    <table width="100%" border="0" cellspacing="1" cellpadding="3">
      <tr>
        <th width="50%">権限</th>
        <th width="50%">ログイン者</th>
      </tr>
      <tr>
        <td width="50%" align="center" class="td_2">{{ MstTrusty::select('name')->whereId(Auth::user()->trusty)->first()['name'] }}</td>
        <td width="50%" align="center" class="td_2">{{ Auth::user()->name1 }}</td>
      </tr>
    </table></td>
    <td width="80">
    <a href="{{ route('logout') }}">
      <button type="button" style="width:150px;height:50px;margin:5px;">ログアウト</button></a></td>
  </tr>
</table>
</div>