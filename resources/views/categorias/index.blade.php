@extends('layouts.app',[
    'class' => '',
    'elementActive' => 'categorias'
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
          <li class="breadcrumb-item"><a href="{{ url('categorias') }}"><i class="fas fa-dot-circle"></i> categorias</a></li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
  </div>
  <section class="content">
      <div class="container-fluid">
          <categoria-component url='{{url('categorias')}}' csrf='{!! csrf_field('POST') !!}'></categoria-component>
      </div>
  </section>

</div>
<!-- /.content-wrapper -->
@endsection

@push('scripts')
<script>
    
</script>
@endpush
