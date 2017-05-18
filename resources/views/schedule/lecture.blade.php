@extends('layouts.app')

@section('content')

<section class="card">
    <section class="content">
        <div class="close"><i class="fa fa-times" aria-hidden="true"></i></div>
        <div class="lecture-info">
        <img src="../images/userimage.jpg">
        <ul id="info">
            <li>Design</li>
            <li>s.31-R104</li>
            <li>Gertie</li>
        </ul>
        <ul id="date">
        <li>17. Maj</li>
        <li>8:30-14:00</li>
        </ul>
        </div>

    <p>Theme: UI, UX and cinemagrphics</p>
</section>

     <nav>
        <ul>
            <li><a class="active-button">Students</a></li><li><a>Groups</a></li>
        </ul>
    </nav>
</section>

<!-- students tab content

    <article class="student">
        <section>
        <img src="../images/userimage.jpg">
        <p>John Doe</p>
        </section>

        <label class="switch">
          <input type="checkbox">
          <div class="slider round"></div>
        </label>
    </article>

     <article class="student">
        <section>
        <img src="../images/userimage.jpg">
        <p>John Doe</p>
        </section>

        <label class="switch">
          <input type="checkbox">
          <div class="slider round"></div>
        </label>
    </article>

 <article class="student">
        <section>
        <img src="../images/userimage.jpg">
        <p>John Doe</p>
        </section>

        <label class="switch">
          <input type="checkbox">
          <div class="slider round"></div>
        </label>
    </article>

-->

<!-- groups tab content -->


<section id="group-select">
    <p>Members pr. group</p>
    <select>
        <option>2</option>
        <option>3</option>
        <option>4</option>
        <option>5</option>
    </select>
    <button>GO!</button>
</section>

<p class="group-nr">Group 1</p>

 <article class="student">
        <section>
        <img src="../images/userimage.jpg">
        <p>John Doe</p>
        </section>
    </article>

    <article class="student">
        <section>
        <img src="../images/userimage.jpg">
        <p>John Doe</p>
        </section>
    </article>

<p class="group-nr">Group 2</p>

@endsection
