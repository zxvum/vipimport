<div>
    @section('title', 'Все обращения')

    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center gap-2 flex-wrap">
                    <h5 class="mb-0">Все ваши обращения</h5>
                </div>
                <a href="{{ route('support.create') }}" class="btn btn-primary">
                    Новое
                    <i class="bx bx-plus"></i>
                </a>
            </div>
            <div class="card-body">
                <div class="table-responsive text-nowrap">
                    <table class="table">
                        <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Название</th>
                            <th class="text-center">Тема</th>
                            <th class="text-center">Статус</th>
                            <th class="text-center">Действия</th>
                        </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                        @if($supports->count() < 1)
                            <tr>
                                <td colspan="6" class="text-center">У вас еще нет обращений, <a href="{{ route('support.create') }}" class="link-info">создайте новое</a>, чтобы оно тут появилось.</td>
                            </tr>
                        @else
                            @foreach($supports as $support)
                                <tr>
                                    <td class="text-center">{{ $support->id }}</td>
                                    <td class="text-center">{{ $support->title }}</td>
                                    <td class="text-center">{{ $support->theme->name }}</td>
                                    <td class="text-center" style="color: {{ $support->status->hex }}">{{ $support->status->name }}</td>
                                    <td class="text-center">
                                        <a href="#" class="btn btn-primary btn-sm"><i class="bx bx-show"></i></a>
                                        <a href="#" type="button" class="btn btn-success btn-sm"><i class="bx bx-edit"></i></a>
                                        <a href="#" onclick="confirm('Вы действительно хотите удалить заказ?')" class="btn btn-danger btn-sm"><i class="bx bx-trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
