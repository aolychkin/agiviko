<div class="m-t-10 m-b-10 p-l-10 p-r-10 p-t-10 p-b-10">
    <div class="row">
        <div class="col-md-6">
            <h5>Электронная почта:</h5>
            <p>Адрес почты: {{ $email }}
            <br>
            <h5>Социальные сети:</h5>
            <p>Ссылка на страницу: <a href="{{ $social['link'] }}">{{$social['name']}}</a></p>
            <p>Ссылка на страницу: <a href="{{ $social[0] }}">Instagram</a></p>
        </div>
        <div class="col-md-6">
           <h5>Режим работы:</h5>
            <p>Понедельник: с {{$workTime[0][0]}} до {{$workTime[0][1]}}</p>
            <p>Вторник: с {{$workTime[1][0]}} до {{$workTime[1][1]}}</p>
            <p>Среда: с {{$workTime[2][0]}} до {{$workTime[2][1]}}</p>
            <p>Четверг: с {{$workTime[3][0]}} до {{$workTime[3][1]}}</p>
            <p>Пятница: с {{$workTime[4][0]}} до {{$workTime[4][1]}}</p>
            <p>Суббота: с {{$workTime[5][0]}} до {{$workTime[5][1]}}</p>
            <p>Воскресенье: с {{$workTime[6][0]}} до {{$workTime[6][1]}}</p>
        </div>
    </div>
</div>
<div class="clearfix"></div>
