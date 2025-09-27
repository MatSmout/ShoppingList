<div>

    <table class="table-auto">
        <thead>
        <tr>
            <th>{{__('Item')}}</th>
            <th>{{__('Quantity')}}</th>
            <th>{{__('Price')}}</th>
            <th>{{__('Acquired')}}</th>
            <th>{{__('Actions')}}</th>
        </tr>
        </thead>
        <tbody>
        @foreach($data->listItems as $item)
            <tr>
                <td>{{$item->item->name}}</td>
                <td>{{$item->item->price}}</td>
                <td>{{$item->quantity}}</td>
                <td>{{$item->acquired}}</td>
                <td>inputs</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
