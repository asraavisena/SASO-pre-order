<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseEvents" aria-expanded="true" aria-controls="collapseTwo">
      <i class="fas fa-calendar-week"></i>
      <span>Events</span>
    </a>
    <div id="collapseEvents" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Events</h6>
        <a class="collapse-item" href="{{route('events.create')}}">Create an Event</a>
        <a class="collapse-item" href="{{route('events.index')}}">View Events</a>
      </div>
    </div>
  </li>