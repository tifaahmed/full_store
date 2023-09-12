<table class="table">
    <thead>
        <tr class="fw-500">
            <td>{{ trans('labels.requested_domain') }}</td>
            <td>{{ trans('labels.current_domain') }}</td>
            <td>{{ trans('labels.status') }}</td>
        </tr>
    </thead>
    <tbody>
        <tr class="border">

            <td>{{ empty(@$domain->requested_domain) ? '-' : @$domain->requested_domain }}</td>
            <td>{{ empty(@$domain->current_domain) ? '-' : @$domain->current_domain }}</td>
            <td>
                @if (@$domain->status == 1)
                <span class="badge bg-warning cursor-pointer" tooltip="Pending">{{ trans('labels.pending') }} </span>
                @elseif(@$domain->status == 2)
                <span class="badge bg-success cursor-pointer" tooltip="Connected">{{ trans('labels.connected') }} </span>
                @else
                -

                @endif
            </td>
        </tr>
    </tbody>
</table>