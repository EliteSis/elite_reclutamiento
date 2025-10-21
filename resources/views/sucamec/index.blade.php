@extends('layouts.app')
@section('title', 'SUCAMEC')

@section('content')
<div class="card shadow-sm border-0">
    <div class="card-body p-0" style="height: 80vh;">
        <iframe 
            src="https://www.sucamec.gob.pe/sel/faces/login.xhtml?faces-redirect=true" 
            width="100%" 
            height="100%" 
            style="border: none;"
            loading="lazy">
        </iframe>
    </div>
</div>
@endsection
