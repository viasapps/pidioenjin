{{ Theme::partial('header')}}
{{ Theme::partial('nav')}}
<div class="container">
    <div class="row" >
        {{ Theme::place('content')}}
    </div>
</div>
{{ Theme::partial('footer')}}