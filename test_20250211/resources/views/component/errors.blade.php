@if($errors AND count($errors) > 0)/*$error判斷存在 count($errors) 值*/值*/
<ul>
    @foreach($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
</ul>
@endif

