@extends('layouts.app')
@section('title', 'VERI.ANTE.POLIC')

@section('content')
<div class="card shadow-sm border-0">
    <div class="card-body p-0" style="height: 80vh;">
        <iframe 
            src="https://certificados.policia.gob.pe/cerapdigital/validar_cerapdigital.xhtml" 
            width="100%" 
            height="100%" 
            style="border: none;"
            loading="lazy">
        </iframe>
    </div>
</div>
@endsection
