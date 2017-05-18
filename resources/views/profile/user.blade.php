@extends('layouts.app')

@section('content')

<section id="userinfo">
    <img id="userimage" src="../images/userimage.jpg">
    <h2>John Doe</h2>
</section>

<nav id="user-nav">
<ul>
<li><a href="" class="active-button">History</a></li><li><a href="">Stats</a></li><li><a href="">Bagdes</a></li>
</ul>
</nav>
        

<!-- history content 
<section id="history">
    <article>
        <div>
        <h5>Attended</h5><p class="balance">+10</p>
        </div>
        <div>
        <h6>15. May 2017</h6><p class="sum">446</p>
        </div>
    </article>
     <article>
        <div>
        <h5>Attended</h5><p class="balance">+10</p>
        </div>
        <div>
        <h6>15. May 2017</h6><p class="sum">446</p>
        </div>
    </article>
</section>
-->


<!-- stats content 
<section id="stats">
<div id="top-stats">
<p>curent</p><p>max</p>
</div>
    <article>
        <div><i class="fa fa-bolt" aria-hidden="true"></i>
</div>
        <h5>Streak on lessons</h5>
        <p class="current">3</p>
        <p class="max">18</p>
    </article>

        <article>
        <div><i class="fa fa-bolt" aria-hidden="true"></i>
</div>
        <h5>Streak on lessons</h5>
        <p class="current">3</p>
        <p class="max">18</p>
    </article>
</section>
-->

<!-- bagdes content -->
<section id="bagdes">
    <article>
    <div><i class="fa fa-bolt" aria-hidden="true"></i>
</div>
        <h5>Patent your imune system (1/5)
        <br>
Attend lessons on 5 consecutive days.</h5>
    </article>

    <article>
    <div class="inactive-bagde"><i class="fa fa-shopping-basket" aria-hidden="true"></i>
</div>
        <h5>Freebie hunter (0/5) <br>
Spend 400 points in the point shop.</h5>
    </article>
</section>


@endsection
