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
        @foreach($shoppingList->listItems as $item)

            <tr wire:key="{{$item->id}}">
                <td>{{$item->item->name}}</td>
                <td>{{$item->item->price}}</td>
                <td>{{$item->quantity}}</td>
                <td><input type="checkbox" wire:model="acquired" @if($item->acquired) checked @endif/> </td>
                <td>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

