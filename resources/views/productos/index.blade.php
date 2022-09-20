@extends('layouts.app',[
    'class' => '',
    'elementActive' => 'productos'
])

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" id="app">
<!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">      
      <div class="col-sm-12">
        <ol class="breadcrumb float-sm-left">
          <li class="breadcrumb-item"><a href="{{ url('productos') }}"><i class="fas fa-dot-circle"></i> productos</a></li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
  </div>
  <section class="content">
      <div class="container-fluid">
          <producto-component url='{{url('productos')}}' csrf='{!! csrf_field('POST') !!}' :categorias='{{$categorias}}'></producto-component>
      </div>
  </section>

</div>
<!-- /.content-wrapper -->
@endsection

@push('scripts')
<script>
    
</script>
@endpush
