@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="bg-white shadow rounded-lg p-6">
        <h1 class="text-3xl font-bold mb-4 text-center">Escanear Código QR</h1>
        <video id="preview" class="w-full rounded-lg shadow-md mb-4" style="transform: scaleY(-1);"></video>
        <div id="qr-reader-results" class="mt-4 text-lg text-center text-gray-700"></div>
    </div>
</div>

<script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        let scanner = new Instascan.Scanner({ video: document.getElementById('preview') });
        
        scanner.addListener('scan', function(content) {
            console.log('Escaneado:', content);
            
            const qrResultElement = document.getElementById('qr-reader-results');
            qrResultElement.textContent = `Resultado: ${content}`;
            
            setTimeout(() => {
                window.location.href = content; 
            }, 1000); 
        });
        
        Instascan.Camera.getCameras().then(function(cameras) {
            if (cameras.length > 0) {
                scanner.start(cameras[0]);
            } else {
                console.error('No hay cámaras disponibles.');
            }
        }).catch(function(e) {
            console.error(e);
        });
    });
</script>
@endsection
