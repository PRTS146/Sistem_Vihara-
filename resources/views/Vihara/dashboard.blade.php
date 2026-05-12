@extends('template.dash')

@section('dashcontent')


<div class="container-fluid">
  <div class="row min-vh-100">

<div class="col-md-2 bg-light border-end py-4 px-3" style="height: 100vh; overflow-y: auto;">
  <h5 class="fw-bold mb-4">📅 Upcoming Events</h5>


      <a href="#" class="text-decoration-none text-dark" 
      data-bs-toggle="modal" 
      data-bs-target="#joinModal"
       data-route="#">
      <div class="card mb-3 shadow-sm border-0 event-card">
      <img src="{{ asset('mainpage/placeholder.jpg') }}" class="card-img-top" style="height: 120px; object-fit: cover;">
      <div class="card-body p-2">
        <p class="fw-bold mb-0 small">Perayaan Waisak 2025</p>
        <p class="text-muted mb-0" style="font-size: 0.75rem;">12 Mei 2025</p>
    </div>
  </div>
</a>


<a href="#" class="text-decoration-none text-dark" 
      data-bs-toggle="modal" 
      data-bs-target="#joinModal"
       data-route="#">
      <div class="card mb-3 shadow-sm border-0 event-card">
      <img src="{{ asset('mainpage/placeholder.jpg') }}" class="card-img-top" style="height: 120px; object-fit: cover;">
      <div class="card-body p-2">
        <p class="fw-bold mb-0 small">Perayaan Waisak 2025</p>
        <p class="text-muted mb-0" style="font-size: 0.75rem;">12 Mei 2025</p>
    </div>
  </div>
</a>

<a href="#" class="text-decoration-none text-dark" 
      data-bs-toggle="modal" 
      data-bs-target="#joinModal"
       data-route="#">
      <div class="card mb-3 shadow-sm border-0 event-card">
      <img src="{{ asset('mainpage/placeholder.jpg') }}" class="card-img-top" style="height: 120px; object-fit: cover;">
      <div class="card-body p-2">
        <p class="fw-bold mb-0 small">Perayaan Waisak 2025</p>
        <p class="text-muted mb-0" style="font-size: 0.75rem;">12 Mei 2025</p>
    </div>
  </div>
</a>
    

<a href="#" class="text-decoration-none text-dark" 
      data-bs-toggle="modal" 
      data-bs-target="#joinModal"
       data-route="#">
      <div class="card mb-3 shadow-sm border-0 event-card">
      <img src="{{ asset('mainpage/placeholder.jpg') }}" class="card-img-top" style="height: 120px; object-fit: cover;">
      <div class="card-body p-2">
        <p class="fw-bold mb-0 small">Perayaan Waisak 2025</p>
        <p class="text-muted mb-0" style="font-size: 0.75rem;">12 Mei 2025</p>
    </div>
  </div>
</a>

<a href="#" class="text-decoration-none text-dark" 
      data-bs-toggle="modal" 
      data-bs-target="#joinModal"
       data-route="#">
      <div class="card mb-3 shadow-sm border-0 event-card">
      <img src="{{ asset('mainpage/placeholder.jpg') }}" class="card-img-top" style="height: 120px; object-fit: cover;">
      <div class="card-body p-2">
        <p class="fw-bold mb-0 small">Perayaan Waisak 2025</p>
        <p class="text-muted mb-0" style="font-size: 0.75rem;">12 Mei 2025</p>
    </div>
  </div>
</a>

</div>

  <div class="col-md-10 py-4 px-4">
  <div class="card shadow-sm border-0 mb-4">
    <div class="card-header bg-warning fw-bold">
      📆 Kalender Acara — Mei 2025
    </div>
    <div class="card-body">
      <table class="table table-bordered text-center mb-0">
        <thead class="table-light">
          <tr>
            <th>Min</th><th>Sen</th><th>Sel</th><th>Rab</th><th>Kam</th><th>Jum</th><th>Sab</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td></td><td></td><td></td><td>1</td><td>2</td><td>3</td><td>4</td>
          </tr>
          <tr>
            <td>5</td><td>6</td><td>7</td><td>8</td><td>9</td><td>10</td><td>11</td>
          </tr>
          <tr>
            <td class="bg-warning fw-bold">12</td><td>13</td><td>14</td><td>15</td><td>16</td><td>17</td><td>18</td>
          </tr>
          <tr>
            <td>19</td><td>20</td><td class="bg-warning fw-bold">21</td><td>22</td><td>23</td><td>24</td><td>25</td>
          </tr>
          <tr>
            <td>26</td><td>27</td><td>28</td><td>29</td><td>30</td><td>31</td><td></td>
          </tr>
        </tbody>
      </table>
      <small class="text-muted mt-2 d-block">🟡 = Ada acara</small>
    </div>
  </div>

</div> 
</div>
</div>


@endsection
