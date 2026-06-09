@extends('layout.head')
@extends('layout.body')

@section('body')
<link rel="stylesheet" href="{{ asset('css/monitoring.css') }}">
<link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
    @include('components.navbar')

<div class="monitoring-container d-flex">

  {{-- SIDEBAR --}}
  <div class="bg-white d-flex flex-column p-3 monitoring-sidebar">
    <div class="mb-4 px-2 pt-2">
      <div class="fw-bold text-uppercase text-warning monitoring-title">Monitoring Room</div>
      <div class="text-muted small">Admin Dashboard</div>
    </div>
    <nav class="d-flex flex-column gap-1">
      <a href="#" onclick="showSection('overview')"  class="sidebar-link rounded-3 px-3 py-2 text-decoration-none fw-semibold" id="link-overview">Overview</a>
      <a href="#" onclick="showSection('events')"    class="sidebar-link rounded-3 px-3 py-2 text-decoration-none fw-semibold" id="link-events">Events</a>
      <a href="#" onclick="showSection('slots')"     class="sidebar-link rounded-3 px-3 py-2 text-decoration-none fw-semibold" id="link-slots">Rumah Abu Slots</a>
      <a href="#" onclick="showSection('donations')" class="sidebar-link rounded-3 px-3 py-2 text-decoration-none fw-semibold" id="link-donations">Donations</a>
    </nav>
  </div>

  {{-- MAIN CONTENT --}}
  <div class="flex-grow-1 p-4">
    @include('template.monitoring.overview')
    @include('template.monitoring.events')
    @include('template.monitoring.slots')
    @include('template.monitoring.donations')
  </div>

</div>

@if(session('success'))
<div id="flash-message-success" data-message="{{ session('success') }}" style="display: none;"></div>
@endif

<script src="{{ asset('js/monitoring.js') }}"></script>
@endsection