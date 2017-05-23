@extends('layouts.app')

@section('content')

<section class="card">
    <section class="content">
        <div class="close"><a href="/"><i class="fa fa-times" aria-hidden="true"></i></a></div>
        <div class="lecture-info">
            @foreach($lecture->users as $teacher)
                <img src="{{$teacher->image}}">
            @endforeach
            <ul id="info">
                <li>{{$lecture->subject}}</li>
                <li>{{$lecture->location}}</li>
                <li>@foreach($lecture->users as $teacher){{$teacher->name}}@endforeach</li>
            </ul>
            <ul id="date">
                <li>{{date('d. M', strtotime($lecture->start))}}</li>
                <li>{{date('H:i', strtotime($lecture->start))}} - {{date('H:i', strtotime($lecture->end))}}</li>
            </ul>
        </div>
        <p>{{$lecture->description}}</p>
    </section>

     <nav>
        <ul class="tabs">
            <li class="tab"><a href="#students" class="active">Students</a></li><li class="tab"><a href="#groups" >Groups</a></li>
        </ul>
    </nav>
</section>

<!-- students tab content-->
<section id="students" class="dont_show">
@foreach($students as $student)
    <article class="student student--notAttend">
        <section>
        <img src="{{$student->image}}">
        <p>{{ucfirst($student->name)}}</p>
        </section>
{{--         <label class="switch">
          <input type="checkbox" >
          <div class="slider round"></div>
        </label> --}}
    </article>
@endforeach
</section>

<!-- groups tab content -->
<section id="groups" class="dont_show">
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
</section>
</section>
@endsection
