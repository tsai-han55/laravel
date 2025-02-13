@if($errors AND count($errors) > 0)<!-- $error判斷存在 count($errors) 值 -->
<ul>
    @foreach($errors->all() as $error)   <!--foreach 循環每訊息 $errors->all()獲取訊息的陣列 as $error:在遍歷時，每錯誤訊息會被存到 $error 變數中-->
    <li>{{ $error }}</li>    <!--輸出實際的錯誤訊息文字-->
    @endforeach
</ul>
@endif

