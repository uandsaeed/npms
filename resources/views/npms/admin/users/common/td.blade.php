<td>{{ $item->id }}</td>
<td>{{ $item->name. ' '.$item->last_name }}</td>
<td>{{ $item->email }}</td>
@if($item->role == USER_ROLE_VISITOR)
<td>{{ isset($item->gender) ? $item->gender : '' }}</td>
<td>{{ isset($item->date_of_birth) ? $item->date_of_birth->diffForHumans() : ''  }}</td>
<td>{{ isset($item->skin_tone) ? $item->skin_tone : '' }}</td>
@endif
<td>{{ isset($item->last_login) ? $item->last_login->diffForHumans() : ''}}</td>