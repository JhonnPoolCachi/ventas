@extends('layouts.app',[
    'class' => '',
    'elementActive' => 'notasDeportes'
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
          <li class="breadcrumb-item"><a href="#"><i class="fas fa-dot-circle"></i> Planilla calificaciones</a></li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
  </div>
  <section class="content">
      <div class="container-fluid">
          <notasdeportes-component url='{{url('notasDeportes')}}' :cursos='{{$cursos}}' csrf='{!! csrf_field('POST') !!}'></notasdeportes-component>
      </div>
  </section>

</div>
<!-- /.content-wrapper -->
@endsection

@push('scripts')
<script>
    
</script>
@endpush