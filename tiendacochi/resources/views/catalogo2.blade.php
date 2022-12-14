@extends('layouts.header')

<div class="container pl-3 mt-5">
    <form action="pedido" method="POST">
        @csrf
        <div class="row g-3">
            <div class="col">
                <h2 class="text-center">NUESTROS PRODUCTOS</h2>
                <p class="text-center"><i>el catálogo cuenta con el {{ $dto }}% de descuento.</i></p>
            </div>
        </div>
        <div class="row">
            @foreach ($productos as $producto)
                <li class="col list-group-item"
                    style=" font-family: 'Montserrat', sans-serif; background: #a58f5c47; border: none; border-radius: 20px 20px; margin-bottom: 3px;">
                    <div class="row">
                        <div class="col-6 mx-auto text-center">
                            <img alt="Image placeholder" src="{{ asset('assets/img/' . $producto->imagen) }}"
                                class="img-fluid" style="border-radius:20px; min-height: 3.5rem; height: 6rem;">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <h6 class="mb-0 text-sm pb-0"
                                style="font-weight: bold; width: max-content; color: ##ff5765;">
                                {{ $producto->titulo }} <small></small></h6>
                            <p class="text-sm mt-0 mb-0" style="line-height: 10px;">
                                <small>{{ $producto->sub_titulo }}</small>
                            </p>
                            <p class="text-sm mt-2 mb-0" style="line-height: 10px;"><small>Detalle:
                                    {{ $producto->description }}</small></p>

                            <h4 class="text-uppercase mt-3">
                                ${{ $producto->precio * $d }}.00 <br><span
                                    style="text-decoration:line-through; font-size:initial; color: #7a6031;
                                        font-style: italic;">$
                                    {{ $producto->precio }}.00 </i></span>
                            </h4>
                            <a href="#" class="btn btn-sm btn-default float-right"><i
                                    class="ni ni-diamond"></i></a>
                            @if ($producto->stock == 'si')
                                <input type="number" class="form-control text-center"
                                    onchange="document.querySelector('#pedir').disabled = false;"name="cantidad[{{ $producto->id }}]"
                                    placeholder="0"
                                    style="border: none;float: right;width: 5rem;margin-top: -4.5rem;background: #e6e0d2;color: #bd583f;font-size: x-large;"
                                    min="0">
                            @else
                                <img src="{{ asset('assets/img/SINSTOCK.png') }}" alt=""
                                    style="width:4rem; float: right; margin-top: -5.5rem;"class="img-fluid">
                            @endif
                        </div>

                    </div>
                </li>
            @endforeach

            <div class="row g-3">
                <div class="col">
                    <h5><input class="form-check-input" type="hidden" name="retiroBodega" id="retiroBodega"
                            value="retiroBodega" onchange="javascript:showContent()"><b></b></h5>
                </div>
            </div>
        </div>

        <div class="d-grid gap-2">
            <button type="submit" class="btn btn-danger m-5" id="pedir"
                style="border-radius:50px; background: ##ff5765;" disabled>PEDIR</a>
        </div>
    </form>
</div>
@extends('layouts.sidebar')
@extends('layouts.footer')
