<div>
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">Обращение: {{ $support->title }}</h5>
            </div>
            <div class="card-body">
                <div class="item__text row fw-semibold">
                    <div class="col-md-6">
                        <div>Название: {{ $support->title }}</div>
                        <div>Тема: {{ $support->theme->name }}</div>
                        <div>Статаус: <span @if($support->status->is_custom) class="badge me-1" style="color: {{ $support->status->text_color }} !important; background: {{ $support->status->bg_color }};" @else class="badge bg-label-{{ $support->status->color_name }} me-1" @endif>{{ $support->status->name }}</span></div>
                        <div>Трек номер: US34SDA67ASD76</div>
                        <div class="item__description"></div>
                    </div>
                    <div class="col-md-6">
                        <div class="item__title">Данные доставки:</div>
                        <div class="item__fio">ФИО: Тимур Ващенко</div>
                        <div class="item__address text-truncate" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="top" title="" data-bs-original-title="352380, Russia, Краснодарский край, Кропоткин, Красная 250">Адрес: 352380, Russia, Краснодарский край, Кропоткин, Красная 250</div>
                        <div class="item__phone">Телефон: 89181243115</div>
                    </div>
                </div>
                <div class="d-flex">
                    @foreach($support->attachments as $image)
                        <img src="{{ asset('storage/'.$image->path) }}" alt="">
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
