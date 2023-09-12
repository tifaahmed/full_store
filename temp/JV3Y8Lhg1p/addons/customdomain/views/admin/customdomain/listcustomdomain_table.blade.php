
<table class="table table-striped table-bordered py-3 zero-configuration w-100 dataTable no-footer">
    <thead>
        <tr class="fw-500">
            <td>{{ trans('labels.srno') }}</td>
            <td>{{ trans('labels.name') }}</td>
            <td>{{ trans('labels.requested_domain') }}</td>
            <td>{{ trans('labels.current_domain') }}</td>
            <td>{{ trans('labels.status') }}</td>
            <td>{{ trans('labels.action') }}</td>
        </tr>
    </thead>
    <tbody>
        @php
            $i = 1;
        @endphp
        @foreach ($customdomaindata as $ddata)
            <tr class="fs-7">
                <td>@php
                    
                    echo $i++;
                    
                @endphp</td>
                <td>{{ $ddata['users']->name }}</td>
                <td>{{ $ddata->requested_domain }}</td>
                <td>{{ $ddata->current_domain }}</td>
                <td>
                    @if ($ddata->status == 1)
                        <span class="badge bg-warning cursor-pointer" tooltip="Pending">{{ trans('labels.pending') }} </span>
                    @else
                        <span class="badge bg-success cursor-pointer" tooltip="Connected">{{ trans('labels.connected') }} </span>
                    @endif
                </td>
               
                <td>
                    
					@if ($ddata->status == 1)
                    <a class="btn btn-sm btn-success btn-size" tooltip="Active" @if (env('Environment') == 'sendbox') onclick="myFunction()"
                    @else
                        onclick="statusupdate('{{ URL::to('/admin/custom_domain/status_change-' . $ddata['users']->id) . '/2' }}') @endif"><i
                            class="fas fa-check"></i></a>
					@else
                    <a class="btn btn-sm btn-danger btn-xmark" tooltip="Inactive" @if (env('Environment') == 'sendbox') onclick="myFunction()"
                    @else
                        onclick="statusupdate('{{ URL::to('/admin/custom_domain/status_change-' . $ddata['users']->id) . '/1' }}') @endif"><i
                            class="fas fa-close"></i></a>
					@endif
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
