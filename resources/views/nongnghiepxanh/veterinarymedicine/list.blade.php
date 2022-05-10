@extends('nongnghiepxanh.main')

@section('nongnghiep')
<main class="container s-mainnew">
    <div>
        <h4 class="heading">
            <a href="#" class="heading__link link link--bold">
                <i class="link__icon fas fa-tree "></i>
                {{$title}}
            </a>
        </h4>
    </div>
    <section class="veterinary-medicine-category-feature grid grid--12">

        <article class="article grid--span-4">
            <a href="/veterinary-medicine/detail/{{$veterinarymedicine[0]->vm_id}}" class="article__link"><img src="{{ $veterinarymedicine[0]->vm_img_1}}" alt="img" class="article__img" /></a>
            <div class="article__info">
                <h2 class="article__heading">
                    <a href="/veterinary-medicine/detail/{{$veterinarymedicine[0]->vm_id}}" class="article__link ">{{$veterinarymedicine[0]->vm_name }}</a>
                </h2>
                <div class="article__category">
                    <a href="#" class="article__link link">{{$veterinarymedicine[0]->category_vm->category_vm}}</a>
                </div>
                <div class="article__intro mota">
                    {!! $veterinarymedicine[0]->vm_description !!}
                </div>
            </div>
        </article>
        <article class="article grid--span-4">
        <a href="/veterinary-medicine/detail/{{$veterinarymedicine[1]->vm_id}}" class="article__link"><img src="{{ $veterinarymedicine[1]->vm_img_1}}" alt="img" class="article__img" /></a>
            <div class="article__info">
                <h2 class="article__heading">
                    <a href="/veterinary-medicine/detail/{{$veterinarymedicine[1]->vm_id}}" class="article__link ">{{$veterinarymedicine[1]->vm_name }}</a>
                </h2>
                <div class="article__category">
                <a href="#" class="article__link link">{{$veterinarymedicine[1]->category_vm->category_vm}}</a>
                </div>
                <div class="article__intro mota">
                    {!! $veterinarymedicine[1]->vm_description !!}
                </div>
            </div>
        </article>
        <article class="article grid--span-4">
        <a href="/veterinary-medicine/detail/{{$veterinarymedicine[2]->vm_id}}" class="article__link"><img src="{{ $veterinarymedicine[2]->vm_img_1}}" alt="img" class="article__img" /></a>
            <div class="article__info">
                <h2 class="article__heading">
                    <a href="/veterinary-medicine/detail/{{$veterinarymedicine[2]->vm_id}}" class="article__link ">{{$veterinarymedicine[2]->vm_name }}</a>
                </h2>
                <div class="article__category">
                <a href="#" class="article__link link">{{$veterinarymedicine[2]->category_vm->category_vm}}</a>
                </div>
                <div class="article__intro mota">
                    {!! $veterinarymedicine[2]->vm_description !!}
                </div>
            </div>
        </article>

    </section>
    <section class="article-list grid grid--12 grid--no-gap">
        @foreach($veterinarymedicine as $key => $data)
        <article class="article article--medium grid--span-7">
            <a href="/veterinary-medicine/detail/{{$data->vm_id}}" class="article__link"><img src="{{ $data->vm_img_1}}" alt="img" class="article__img" /></a>
            <div class="article__info">
                <h2 class="article__heading">
                    <a href="/veterinary-medicine/detail/{{$data->vm_id}}" class="article__link ">{{$data->vm_name }}</a>
                </h2>
                <div class="article__category">
                    <a href="#" class="article__link link">{{$data->category_vm->category_vm}}</a>
                </div>
                <div class="article__intro mota">
                    {!! $data->vm_description !!}
                </div>
            </div>
        </article>
        @endforeach

    </section>
    <div class="grid grid--12">
        <div class="more grid--span-7">
            <button class="btn btn--medium btn--primary btn--round" title="Xem thêm">
                <i class="fas fa-arrow-down"></i>
            </button>
        </div>
    </div>
</main>
@endsection